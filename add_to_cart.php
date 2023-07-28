<?php
include 'koneksi.php';

if (isset($_POST)) {
    // var_dump($_POST);die;
    // $id = $_POST['id'];
    $user_id = $_SESSION['data']['id_user'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    // var_dump($user_id, $product_id , $qty);die;

    $query = mysqli_query($connect, "INSERT INTO user_cart (user_id, product_id, qty) values ('$user_id','$product_id','$qty')") or die(mysqli_error($connect));
    
    header('Location: cart.php');
}
