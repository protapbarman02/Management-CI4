<?php


namespace App\Controllers;
use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Entities\User;
use App\Validation\ValidationRules;
use \Config\AuthGroups;

class UserController extends BaseController{
    public $model;
    public $rules;
    public $current_user;
    public $authGroups;
    
    public function __construct() {
        helper('auth');
        $this->model = auth()->getProvider();
        $this->rules = new ValidationRules();
        $this->current_user=auth()->user();
        $this->authGroups=new AuthGroups();
    }
    
    public function index() {
        
        $arr = [
            'page_title'=>'Users',
            'page_heading'=>'Users',
            'current_user'=>$this->current_user
        ];
        return view('admin/user/index',$arr);
    }
    
    public function users() {
        $columns = ['id','img','username','first_name','last_name','mobile','gender','dob','created_at','status'];
        $searchColumns = ['username','first_name','last_name'];
        $data=$this->getFilteredData($this->model,$columns,$searchColumns);
        return $this->response->setJSON($data);
    }

    public function details($id) {
        $user = $this->model->findById($id);
        $arr = [
            'page_title'=>'Users',
            'page_heading'=>'Details : '.$user->first_name,
            'current_user'=>$this->current_user,
            'data'=>$user,
            'groups'=>$this->authGroups->getAllGroups()
        ];
        return view('admin/user/details',$arr);
    }
    
    public function create(){
        helper('form');
        $arr = [
            'page_title'=>'Add User',
            'page_heading'=>'Add User',
            'current_user'=>$this->current_user,
            'data'=>[]
        ];
        
        if (! $this->request->is('post')) {
            return view('admin/user/add',$arr);
        }
        
        $rules= $this->rules->getSuperAdminAddUserRules();
        
        if (! $this->validateData($this->request->getPost(), $rules)) {
            $arr['validation'] = $this->validator;
            return view('admin/user/add',$arr);
        }
        
        $allowedPostFields = array_keys($rules);
        
        $new_user_data = $this->request->getPost($allowedPostFields);
        $new_user_data['active']=1;
        
        $file=$this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {
            $filename=$file->getRandomName();
            $new_user_data['img']=$filename;
        }
        else{
            unset($new_user_data['img']);
        }
        
        
        $new_user = new User($new_user_data);
        $insertId=$this->model->insert($new_user);
        
        if($insertId){
            $added_user = $this->model->findById($insertId);
            $group = $this->request->getPost('group');
            $added_user->addGroup($group);
            if(isset($new_user_data['img'])){
                if ($file->isValid() && !$file->hasMoved()){
                    $file->move('./public/img/',$filename);
                }
            }
            
            return redirect()->to('/admin/users')->with('message', 'User added successfully');
        }
        else{
            $arr['message']='Something error occured while adding user';
            return view('admin/user/add',$arr);
        }
    }
    
    public function update($id){
        $id=(int)$id;
        helper('form');
        
        $user = $this->model->findById($id);
        
        $arr = [
            'page_title'=>'Update User',
            'page_heading'=>'Update User',
            'data'=>$user,
            'current_user'=>$this->current_user,
            'id'=>$id
        ];
        
        if (! $this->request->is('post')) {
            return view('admin/user/update',$arr);
        }
        
        $rules= $this->rules->getSuperAdminUpdateUserRules($id);
        
        if (! $this->validateData($this->request->getPost(), $rules)) {
            $arr['validation'] = $this->validator;
            return view('admin/user/update',$arr);
        }
        
        $allowedPostFields = array_keys($rules);
        
        $updated_user_data = $this->request->getPost($allowedPostFields);
        $updated_user_data['updated_at']=Time::now();
        $updated_user_data['id']=$id;
        
        $file=$this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {
            $filename=$file->getRandomName();
            $updated_user_data['img']=$filename;
        }
        else{
            unset($updated_user_data['img']);
        }
        
        $updated_user = new User($updated_user_data);
        
        if($this->model->update($id,$updated_user)){
            $group = $this->request->getPost('group');
            if($group!= $user->groups[0]){
                $user->removeGroup($user->groups[0]);
                $user->addGroup($group);
            }
            if(isset($updated_user_data['img'])){
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('./public/img/',$filename);
                }
            }
            return redirect()->to('/admin/users')->with('message', 'User updated successfully');
        }
        else{
            $arr['message']='Something error occured while adding user';
            return view('admin/user/update',$arr);
        }    
    }
    
    public function delete(){
        $requestBody = $this->request->getBody();
        parse_str($requestBody, $parsedData);
        $id = (int)$parsedData['id'];
        
        if($this->model->delete($id, true)){
            $data=[
                'status'=>'success',
                'message'=>'User was deleted Successfully'
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
    
    public function ban(){
        $requestBody = $this->request->getBody();
        parse_str($requestBody, $parsedData);
        $id = (int)$parsedData['id'];
        $user = $this->model->findById($id);
        
        if($user->isBanned()){
            $user->unBan();
            $data=[
                'status'=>'success',
                'message'=>'Ban is successfully removed from the User',
                'data'=>true
            ];
        }
        else{
            $user->ban('Sorry You are restricted to access our website');
            $data=[
                'status'=>'success',
                'message'=>'User is banned successfully',
                'data'=>false
            ];
        }
        
        return $this->response->setJSON($data);
    }
}
