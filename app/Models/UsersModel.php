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
    
}
