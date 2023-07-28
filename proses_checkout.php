<?php
include 'koneksi.php';
if(isset($_POST)){
    // var_dump($_POST);die;
    // $id = $_POST['id'];
    $user_id = $_SESSION['data']['id_user'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $penerima = $_POST['penerima'];
    $total = $_POST['total'];
    $waktu = date('Y-m-d H:i:s');
    // var_dump($user_id, $product_id , $qty);die;
    $query = mysqli_query($connect, "INSERT INTO transaction (waktu, status, user_id, total, alamat, penerima, no_hp) values ('$waktu','menunggu', '$user_id','$total', '$alamat', '$penerima', '$nohp')") or die(mysqli_error($connect));
    $id = mysqli_insert_id($connect);
    $query2 = mysqli_query($connect, "SELECT user_cart.* , product.image, product.price, product.name FROM user_cart INNER JOIN product ON user_cart.product_id = product.id WHERE user_id = '" . $_SESSION['data']['id_user'] . "'") or die(mysqli_error($connect));
    // $total = 0;
    // $totalbyproduct = 0;
    while ($data = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
        // $total += $data['price'] * $data['qty'];
        // $totalbyproduct = $data['price'] * $data['qty'];
        $query3 = mysqli_query($connect, "INSERT INTO transaction_detail (transaction_id, product_id, qty) values ('$id','" . $data['product_id'] . "','" . $data['qty'] . "')") or die(mysqli_error($connect));
    }
    $query4 = mysqli_query($connect, "DELETE FROM user_cart WHERE user_id = '" . $_SESSION['data']['id_user'] . "'") or die(mysqli_error($connect));
    // echo "<script>alert('Berhasil Checkout');window.location='index.php';</script>";
    // alertWithSweetAlert();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<!-- Generate Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    Swal.fire({
        title: 'Berhasil Checkout',
        text: 'Terima Kasih Telah Berbelanja',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'home.php';
        }
    })
</script>
</html>
