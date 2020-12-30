<?php

namespace App\Models;
use CodeIgniter\Model;

class QuintasModel extends Model {
    
    private $id;
    private $name;
    private $street;
    private $address;
    private $num;
    private $estado;
    private $lat;
    private $lng;
    private $costxday;
    private $costxweeknd;
    private $costxfest;
    private $id_owner;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getStreet() {
        return $this->street;
    }

    function getAddress() {
        return $this->address;
    }

    function getNum() {
        return $this->num;
    }

    function getEstado() {
        return $this->estado;
    }

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function getCostxday() {
        return $this->costxday;
    }

    function getCostxweeknd() {
        return $this->costxweeknd;
    }

    function getCostxfest() {
        return $this->costxfest;
    }

    function getId_owner() {
        return $this->id_owner;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

    function setCostxday($costxday) {
        $this->costxday = $costxday;
    }

    function setCostxweeknd($costxweeknd) {
        $this->costxweeknd = $costxweeknd;
    }

    function setCostxfest($costxfest) {
        $this->costxfest = $costxfest;
    }

    function setId_owner($id_owner) {
        $this->id_owner = $id_owner;
    }

    function getQuintas() {
        
        $query = $this->db->query("SELECT * FROM quinta");
        return $query->getResult();
        
    }
    
}