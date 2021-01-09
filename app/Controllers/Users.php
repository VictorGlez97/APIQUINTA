<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;


class Users extends Controller {

    public function index(){
        
        return 'HEY';
        
    }
    
    public function login(){
        
        $data = json_decode(file_get_contents('php://input'), true);
        $user = $data[0];
        
        $email = !empty($user['email']) ? $user['email'] : false;
        $pass = !empty($user['pass']) ? $user['pass'] : false;
        
        if ( $email && $pass ){
            
            $model = new UsersModel();
            $model->setEmail($email);
            $model->setPassword($pass);
            
            $verify = $model->verifyPass();
            //var_dump($verify);
            
        } else {
            $verify['verify'] = 'false';
        }
        
        return json_encode($verify);
        
    }
    
    public function register(){
        
        $data = json_decode(file_get_contents('php://input'), true);
        $user = $data[0];
        
        $name = !empty($user['name']) ? $user['name'] : false;
        $lastname = !empty($user['lastname']) ? $user['lastname'] : false;
        $tel = !empty($user['tel']) ? $user['tel'] : false;
        $email = !empty($user['email']) ? $user['email'] : false;
        $pass = !empty($user['pass']) ? $user['pass'] : false;
        
        echo $name;
        echo $lastname;
        echo $tel;
        echo $email;
        echo $pass;
        
        if ( $name && $lastname && $email && $pass && $tel ){
            
            $model = new UsersModel();
            $model->setName($name);
            $model->setLast_name($lastname);
            $model->setTel($tel);
            $model->setEmail($email);
            $model->setPassword($pass);
            
            $register = $model->register();
            
        } else {
            
            $register['register'] = false;
            
        }
        
        return json_encode($register);
        
    }
    
}

