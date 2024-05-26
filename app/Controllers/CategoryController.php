<?php


namespace App\Controllers;
use App\Models\CategoryModel;
use CodeIgniter\I18n\Time;

class CategoryController extends BaseController{
    
    public $model;
    public function __construct() {
        $this->model=new CategoryModel();
    }
    
    public function index() {
        $categories=$this->model->findAll();
        $arr = [
            'page_title'=>'Categories',
            'page_heading'=>'Categories',
            'data'=>$categories
        ];
        return view('admin/category/index',$arr);
    }
    
    public function details($id) {
        $category=$this->model->find($id);
        $arr = [
            'page_title'=>'Categories',
            'page_heading'=>$category['name'],
            'data'=>$category
        ];
        return view('admin/category/details',$arr);
    }
    
    public function create(){
        helper('auth');
        helper('date');
        $data=[
            'name'=>'MOTHERBOARD',
            'img'=>'public/img/motherboard.img',
            'created_by'=>auth()->id(),
            'active'=>1
        ];
        if($this->model->insert($data,false)){
            return redirect()->to('/admin/categories');
        }
        else{
            return 'error';
        }
    }
    
    public function update($id){
        helper('auth');
        helper('date');
        $data=[
            'name'=>'CPUv2',
            'img'=>'public/img/cpu.img',
            'updated_by'=>auth()->id(),
            'updated_at'=>Time::now(),
        ];
        if($this->model->update($id,$data,false)){
            return redirect()->to('/admin/categories');
        }
        else{
            return 'error';
        }
    }
    
    public function delete($id){
        if($this->model->delete($id)){
            return redirect()->to('/admin/categories');
        }
        else{
            return 'error';
        }
    }
    
    public function active($id,$is_active){
        $this->model->where('id', $id)->set(['active' => $is_active])->update();
        return redirect()->to('/admin/categories');
    }
    
    public function productCategoryCombined($data){
        for($i=0; $i<count($data['data']); $i++){
            $data['data'][$i]['category_name']=$this->getCategroyNameApi($data['data'][$i]['category_id']);
        }
        return $data;
    }
    
    public function getCategroyNameApi($id){
        return $this->model->find($id)['name'];
    }
}
