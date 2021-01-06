<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {
    
//    protected $table = 'Users';
//    protected $primaryKey = 'id';
//    protected $allowedFields = ['name', 'lastname', 'tel', 'email', 'password'];


    private $id;
    private $name;
    private $last_name;
    private $tel;
    private $email;
    private $password;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getTel() {
        return $this->tel;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getUsers(){
        
        $query = $this->db->query("SELECT * FROM Users");
        return $query->getResult();
        
    }
     
    function verifyPass(){
        
        $query = "SELECT * FROM users WHERE email = '{$this->getEmail()}'";
        $sql = $this->db->query( $query );

        if ( !empty( $sql->getResult() && is_array( $sql->getResult() ) && count( $sql->getResult() ) === 1 ) ){
            
            $user = $sql->getResult()[0];
            
            echo $this->getPassword() .'<br/>';
            echo $user->password .'<br/>';
            $verify['verify'] = password_verify($this->getPassword(), $user->password);
            var_dump($verify);
            
            if ( $verify['verify'] ){
                
                $verify['user'] = $user;
                return $verify;
                
            } else {
                
                return $verify;
                
            }
            
        } else {
            $verify['verify'] = false;
            return $verify['verify'];
        }
        
    }
    
    function register() {
        
        $password = password_hash($this->getPassword(), PASSWORD_BCRYPT, ['cost' => 4]);
        
        $query = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getLast_name()}', "
                                                . "'{$this->getTel()}', '{$this->getEmail()}', '{$password}')";
        
        //echo $query;                                        
                                                
        $sql = $this->db->query($query);
                        
        //var_dump($sql);
        
        if ($sql){
            
            $id = $sql->connID->insert_id;
            
            $sql = $this->db->query("SELECT * FROM users WHERE id = '$id'");
            $register['user'] = $sql->getResult();
            $register['register'] = true;
            
        } else {
            $register['register'] = false;
        }
        
        return $register;
        
    }
    
}
