<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;


class Users extends Controller {

    public function index(){
        
        return 'HEY';
        
    }
    
    public function login(){
        
        $model = new UsersModel();
        $users = $model->getUsers();
        return json_encode($users);
        
    }
    
}

