<?php
require_once 'app/models/ProductModel.php';
class ProductController
{
    private $products = [];
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['products'])){
            $this->products = $_SESSION['products'];        
        }
    }
    public function index()
    {
        $this->list();
    }
    public function list()
    {
        $products = $this->products;
        include 'app/views/product/list.php';
    }
    public function add()
    {
        $error = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if(empty($name)){
                $error['name'] = 'Bat buoc nhap ten';
            }elseif (strlen($name) < 10 || strlen($name) > 100) {
                $error['name'] = 'Ten phai tu 10 den 100 ky tu';
            }
            if(!is_numeric($price) || $price <= 0){
                $error['price'] = 'Gia phai la so duong';
            }
            if(empty($error)){
                $id = count($this->products) + 1;
                $product = new ProductModel($id, $name, $description, $price);
                $this->products[] = $product;
                $_SESSION['products'] = $this->products;
                header('Location: /PhamTrongPhuoc/Product/list');
                exit();
            }
        }
        include 'app/views/product/add.php';
    }
    public function edit($id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            foreach ($this->products as $key => $product){
                if ($product->getID() == $id){
                    $this->products[$key]->setName($_POST['name']);
                    $this->products[$key]->setDescription($_POST['description']);
                    $this->products[$key]->setPrice($_POST['price']);
                    break;
                }
            }
            $_SESSION['products'] = $this->products;
            header('Location: /PhamTrongPhuoc/Product/list');
            exit();
        }
        foreach ($this->products as $product){
            if ($product->getID() == $id){
                include 'app/views/product/edit.php';
                return;
            }
        }
        die('Product not found');
    }
    public function delete($id)
    {
        foreach ($this->products as $key => $product){
            if ($product->getID() == $id){
                unset($this->products[$key]);
                break;
            }
        }
        $this->products = array_values($this->products);
        $_SESSION['products'] = $this->products;
        header('Location: /PhamTrongPhuoc/Product/list');
        exit();
    }
}
?>