<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;


class Users extends Controller {

    public function index(){
        
        return 'HEY';
        
    }
    
    public function login(){
        
        //var_dump( $_POST );
        
        $email = !empty($_POST['email']) ? $_POST['email'] : false;
        $pass = !empty($_POST['pass']) ? $_POST['pass'] : false;
        
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
        
        $name = !empty($_POST['name']) ? $_POST['name'] : false;
        $lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : false;
        $tel = !empty($_POST['tel']) ? $_POST['tel'] : false;
        $email = !empty($_POST['email']) ? $_POST['email'] : false;
        $pass = !empty($_POST['pass']) ? $_POST['pass'] : false;
        
        if ( $name && $lastname && $email && $pass && $tel ){
            
            //echo 'hey';
            
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

