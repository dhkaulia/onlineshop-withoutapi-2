<?php

include '../koneksi.php';

if(isset($_POST)){
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$id = $_SESSION['data']['id_user'];
$query = mysqli_query($connect, "UPDATE user SET nama = '$nama', email = '$email', no_hp = '$nohp', alamat = '$alamat' WHERE id_user = '$id'") or die(mysqli_error($connect));
header('Location: index.php');
}