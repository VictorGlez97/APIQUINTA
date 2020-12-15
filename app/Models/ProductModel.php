<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ProductModel extends Model{

    private $id;
    private $product;
    private $desc;
    private $type;
    private $sex;
    private $id_category;
    private $cost;
    private $img;
    private $color;
    private $img_col;
    
    function getId() {
        return $this->id;
    }

    function getProduct() {
        return $this->product;
    }

    function getDesc() {
        return $this->desc;
    }

    function getType() {
        return $this->type;
    }

    function getSex() {
        return $this->sex;
    }

    function getId_category() {
        return $this->id_category;
    }

    function getCost() {
        return $this->cost;
    }

    function getImg() {
        return $this->img;
    }

    function getColor() {
        return $this->color;
    }

    function getImg_col() {
        return $this->img_col;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setSex($sex) {
        $this->sex = $sex;
    }

    function setId_category($id_category) {
        $this->id_category = $id_category;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setImg_col($img_col) {
        $this->img_col = $img_col;
    }

    public function AllProducts()
    {
        
        $query = $this->db->query("SELECT * FROM products AS p INNER JOIN images AS i ON p.id = i.id_product LEFT JOIN categories AS c ON c.id = p.id_category");
        $products = $query->getResult();
        return $products;

    }

    public function PerformancePro()
    {
        
        $query = $this->db->query("SELECT * FROM products AS p INNER JOIN images AS i ON i.id_product = p.id 
                                                                LEFT JOIN categories AS c ON c.id = p.id_category 
                                                                GROUP BY c.id");
        $products = $query->getResult();
        return $products;

    }

    public function AProduct()
    {
        
        $query = $this->db->query("SELECT * FROM products AS p INNER JOIN images AS i ON i.id_product = p.id 
                                                                LEFT JOIN categories AS c ON c.id = p.id_category
                                                                WHERE p.id = '{$this->getId()}'");
        $product = $query->getResult();
        return $product;

    }

    public function SaveProduct()
    {
        
        $query = $this->db->query("INSERT INTO products VALUES(null, '{$this->getProduct()}', '{$this->getDesc()}', '{$this->getType()}', '{$this->getSex()}', '{$this->getId_category()}', '{$this->getCost()}')");
        
        //var_dump( $query->connID->insert_id );

        if ($query) {
            
            $id = $query->connID->insert_id;
            $query_img = $this->db->query("INSERT INTO images VALUES(null, '{$this->getImg()}', '{$this->getColor()}', '{$this->getImg_col()}', $id)");
            
            if ( $query_img ){
                return $id;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

}