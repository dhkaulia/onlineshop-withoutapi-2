<?php
include '../koneksi.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>Report excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>
 
	<center>
		<h1>Report Order Bulanan</h1>
	</center>
 
	<table border="1">
                                    <tr>
                                        <th>Username</th>
                                        <th>Penerima</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Total Pembelian</th>
                                        <th>Status Pengiriman</th>
                                    </tr>
                                    <?php
                                    $filter = '';
                                    if(isset($_GET['filter'])){
                                        $filter = "AND MONTH(transaction.waktu) = '$filter'";
                                    }
                                    $query = mysqli_query($connect, "SELECT transaction.*, user.usn FROM transaction INNER JOIN user ON transaction.user_id = user.id_user  WHERE year(waktu) = YEAR(CURRENT_DATE()) AND status = 'sudah bayar' $filter") or die(mysqli_error($connect));

                                    while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?= $data['usn'] ?></td>
                                            <td><?= $data['penerima'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['waktu'] ?></td>
                                            <td><?= number_format($data['total'], 0) ?></td>

                                            <?php if ($data['status'] == 'menunggu') { ?>
                                                <td>
                                                    <form action="../update_transaction.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <button title="Sudah Dikirim"><i class="fas fa-check" style="color: #5bec78;"></i></button>
                                                    </form>
                                                </td>
                                            <?php } else { ?>
                                                <td> Sudah Dikirim</td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
	</table>
</body>
</html>