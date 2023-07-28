<?php
include 'koneksi.php';
if($_POST){
    $id = $_POST['id'];
    $query = mysqli_query($connect, "UPDATE transaction SET status = 'sudah bayar' WHERE id = '$id'") or die(mysqli_error($connect));
    header('Location: dashboard/order_status.php');
}