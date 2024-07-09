<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel;
use App\Validation\ProductValidationRules;
use App\Controllers\CategoryController;
use CodeIgniter\I18n\Time;

class ProductController extends BaseController
{
    public $model;
    public $current_user;
    public $rules;
    public $categoryController;
    public function __construct() {
        helper('auth');
        helper('form');
        $this->model=new ProductModel();
        $this->current_user=auth()->user();
        $this->rules = new ProductValidationRules();
        $this->categoryController= new CategoryController();
    }
    
    public function index() {
        $arr = [
            'page_title'=>'Products',
            'page_heading'=>'Products',
            'current_user'=>$this->current_user
        ];
        return view('admin/product/index',$arr);
    }
    
    public function products() {
        $columns = ['id','img','name','created_at','description','active'];
        $searchColumns = ['name','description'];
        $data=$this->getFilteredData($this->model,$columns,$searchColumns);
        $data=$this->categoryController->productCategoryCombined($data);
        return $this->response->setJSON($data);
    }
    
    public function details($id) {
        $product=$this->model->find($id);
        $arr = [
            'page_title'=>'Products',
            'page_heading'=>'Details : '.$product['name'],
            'data'=>$product,
            'current_user'=>$this->current_user,
        ];
        return view('admin/product/details',$arr);
    }
    
    public function create(){
        $arr = [
            'page_title'=>'Add Product',
            'page_heading'=>'Add Product',
            'current_user'=>$this->current_user,
            'data'=>[]
        ];
        
        if (! $this->request->is('post')) {
            return view('admin/product/add',$arr);
        }
        $rules= $this->rules->getProductAddRules();
        
        if (! $this->validateData($this->request->getPost(), $rules)) {
            $arr['validation'] = $this->validator;
            return view('admin/product/add',$arr);
        }
        
        $new_product_data = $this->request->getPost(array_keys($rules));

        $file=$this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {
            $filename=$file->getRandomName();
            $new_product_data['img']=$filename;
        }
        else{
            unset($new_product_data['img']);
        }
        $insertId=$this->model->insert($new_product_data);
        
        if($insertId){
            if(isset($new_product_data['img'])){
                if ($file->isValid() && !$file->hasMoved()){
                    $file->move('./public/img/',$filename);
                }
            }
            return redirect()->to('/admin/products')->with('message', 'Product added successfully');
        }
        else{
            $arr['message']='Something error occured while adding product';
            return view('admin/product/add',$arr);
        }
    }
    
    public function update($id){
        $product = $this->model->find($id);
        $arr = [
            'page_title'=>'Update Product',
            'page_heading'=>'Update Product',
            'current_user'=>$this->current_user,
            'data'=>$product,
            'id'=>$id
        ];
        
        if (! $this->request->is('post')) {
            return view('admin/product/update',$arr);
        }
        $rules= $this->rules->getProductUpdateRules($id);
        
        if (! $this->validateData($this->request->getPost(), $rules)) {
            $arr['validation'] = $this->validator;
            return view('admin/product/update',$arr);
        }
        
        $updated_product_data = $this->request->getPost(array_keys($rules));

        $file=$this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {
            $filename=$file->getRandomName();
            $updated_product_data['img']=$filename;
        }
        else{
            unset($updated_product_data['img']);
        }
        $insertId=$this->model->update($id,$updated_product_data);
        
        if($insertId){
            if(isset($updated_product_data['img'])){
                if ($file->isValid() && !$file->hasMoved()){
                    $file->move('./public/img/',$filename);
                }
            }
            return redirect()->to('/admin/products')->with('message', 'Product updated successfully');
        }
        else{
            $arr['message']='Something error occured while updatinf product';
            return view('admin/product/update',$arr);
        }
    }
    
    public function delete(){
        $requestBody = $this->request->getBody();
        parse_str($requestBody, $parsedData);
        $id = (int)$parsedData['id'];
        
        if($this->model->delete($id, true)){
            $data=[
                'status'=>'success',
                'message'=>'Product was deleted Successfully'
            ];
        }
        else{
            $data=[
                'status'=>'failed',
                'message'=>'Failed to Delete'
            ];
        }
        return $this->response->setJSON($data);
    }
    
    public function active(){
        $requestBody = $this->request->getBody();
        parse_str($requestBody, $parsedData);
        
        $id = (int)$parsedData['id'];
        $active = (int)$parsedData['active'];
        $active = ($active == 1) ? 0 : 1;
        
        if($this->model->update($id,['active' => $active])){
            if($active==0){
                $data['message']='Product Deactivated';
            }
            else{
                $data['message']='Product Activated';
            }
            $data['status']='success';
            $data['data']=$active;
        }
        else{
            $data=[
                'status'=>'failed',
                'message'=>'Failed to change active status'
            ];
        }
        return $this->response->setJSON($data);
    }
}
