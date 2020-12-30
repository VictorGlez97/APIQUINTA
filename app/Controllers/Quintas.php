<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\QuintasModel;

class Quintas extends Controller {
    
    public function index(){
        
        $model = new QuintasModel();
        $quinta = $model->getQuintas();
        
        $response['data'] = $quinta;
        $response['success'] = true;
        $response['message'] = "SUCCESS";
        
        return json_encode($response);
        //return $quinta;
        
    }

    public function quintas() {
        
        $model = new QuintasModel();
        $quinta = $model->getQuintas();
        return json_encode($quinta);
        //return $quinta;
        
    }
    
}

    