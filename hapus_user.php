<?php
include 'koneksi.php';
if($_GET){
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM user WHERE id_user = '$id'") or die(mysqli_error($connect));
    header('Location: dashboard/registered-user.php');
}