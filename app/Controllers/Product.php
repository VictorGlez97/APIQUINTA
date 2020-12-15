<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends Controller
{

    public function __construct()
    {
        session_start();
        helper('utls');
    }

    public function index()
    {

        echo view('layout/navbar');
        echo view('layout/performance');

        $model = new ProductModel();
        $Catmodel = new CategoryModel();

        //$data['products'] = $model->AllProducts();
        $data['products'] = $model->PerformancePro();

        $c = 0;
        foreach ($data['products'] as $pro) {
            $Catmodel->setId( $pro->id_category );
            //echo $pro->id_category;
            $data['colors'] = $Catmodel->ColorAccordingCat();
            $c = $c + 1;
            //echo $c;
        }

        echo view('layout/cards', $data);

        echo view('layout/footer');

    }

    public function new()
    {

        if (CloseSession()) {
            return redirect()->to('/VIC/Product');
        }

        echo view('layout/navbar');

        $category_model = new CategoryModel();
        $data['categories'] = $category_model->AllCategories();

        echo view('product/new', $data);
        
        echo view('layout/footer');
    }

    public function men()
    {

        echo view('layout/navbar');
        echo view('product/catalogue');
        echo view('layout/footer');
    }

    public function save()
    {

        if (CloseSession()) {
            return redirect()->to('/VIC/Product');
        }

        echo view('layout/navbar');

        var_dump($_POST);
        var_dump($_FILES);

        $product = !empty($_POST['product']) ? $_POST['product'] : false;
        $desc = !empty($_POST['desc']) ? $_POST['desc'] : false;
        $category = !empty($_POST['category']) ? $_POST['category'] : false;
        $cost = !empty($_POST['cost']) ? $_POST['cost'] : false;
        $type = !empty($_POST['type']) ? $_POST['type'] : false;
        $sex = !empty($_POST['sex']) ? $_POST['sex'] : false;
        $picture = $_FILES['file'];
        $color = !empty($_POST['sex']) ? $_POST['sex'] : '';
        $pic_color = $_FILES['colorimg'];

        if (!empty($picture) && !empty($pic_color)) {
            /*
            //     echo 'hello im a pic';
    
                // // GUARDA IMAGENES 
                // $validated = $this->validate([
                //     'file' => [
                //         'uploaded[file]',
                //         'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                //         'max_size[file,4096]',
                //     ],
                // ]);
    
                // if ($validated) {
                //     $pic = $this->request->getFile('file');
                //     //$pic = $_FILES['file'];
                //     $pic->move('assets/uploads/');
         
                //   $data = [
         
                //     'name' =>  $pic->getClientName(),
                //     'type'  => $pic->getClientMimeType()
                //   ];
         
                //   echo 'File has been uploaded';
                // }
                // // TERMINA GUARDA IMAGENES
            */

            if ($product && $desc && $category && $cost && $type && $sex) {

                $model = new ProductModel();
                $pic_name = $picture['name'];
                $pic_col_name = $pic_color['name'];

                if (!is_dir('root/assets/uploads/')) {
                    mkdir('root/assets/uploads/', 0777, true);
                }

                move_uploaded_file($picture['tmp_name'], 'root/assets/uploads/' . $pic_name);

                if (!is_dir('root/assets/colors/')){
                    mkdir('root/assets/colors/', 0777, true);
                }

                move_uploaded_file($pic_color['tmp_name'], 'root/assets/colors/' . $pic_col_name);

                $model->setProduct($product);
                $model->setDesc($desc);
                $model->setId_category($category);
                $model->setCost($cost);
                $model->setImg($pic_name);
                $model->setType($type);
                $model->setSex($sex);
                $model->setColor($color);
                $model->setImg_col($pic_col_name);

                $product = $model->SaveProduct();

                if ($product != false) {

                    echo 'FILE UPDATED';
                    echo $product;

                    return redirect()->to('product/' . $product);
                } else {
                    echo 'no se guardo';
                }
            } else {
                echo 'sin variables suficientes';
            }
        } else {
            echo 'sin imagen';
        }

        echo view('layout/footer');
    }

    public function product($id)
    {

        echo view('layout/Navbar');

        //var_dump($_SESSION);
        var_dump($id);

        $model = new ProductModel();
        $model->setId($id);
        $data['product'] = $model->AProduct();

        $Catmodel = new CategoryModel();
        $Catmodel->setId( $data['product'][0]->id_category );
        $data['colors'] = $Catmodel->ColorAccordingCat();

        echo view('product/product', $data);

        echo view('layout/footer');
    }

    public function list()
    {

        if (CloseSession()) {
            return redirect()->to('/VIC/Product');
        }

        echo view('layout/navbar');

        $model = new ProductModel();
        $data['products'] = $model->AllProducts();
        echo view('product/list', $data);

        echo view('layout/footer');
    }

    public function cart()
    {

        echo view('layout/navbar');

        echo view('product/cart');

        echo view('layout/footer');
    }

    public function add_cart()
    {

        //var_dump($_POST);
        var_dump($_SESSION);

        $num = !empty($_POST['num']) ? $_POST['num'] : false;
        $id = !empty($_POST['id']) && isset($_POST['id']) ? $_POST['id'] : false;

        if ($num && $id) {

            $key = array_search($id, array_column($_SESSION['cart'], 'id'));

            $model = new ProductModel();
            $model->setId($id);
            $pro = $model->AProduct();

            $_SESSION['cart'] = array(
                'id' => $pro[0]->id,
                'product' => $pro[0]->product,
                'talla' => $pro[0]->talle,
                'color' => $pro[0]->color,
                'num' => $num
            );
        }

        //return redirect()->to('/VIC/Product/product/'.$id);

    }

    public function delete_cart()
    {

        DropAnySession('cart');
    }
}
