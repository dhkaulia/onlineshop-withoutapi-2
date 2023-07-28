<?php
include '../koneksi.php';
$query = mysqli_query($connect, "SELECT * FROM user WHERE id_user = '" . $_SESSION['data']['id_user'] . "'") or die(mysqli_error($connect));
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Account Settings UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
			<form action="update_user.php" method="POST">

				<div class="bg-white shadow rounded-lg d-block d-sm-flex">
					<div class="profile-tab-nav border-right">
						<div class="p-4">
							<div class="img-circle text-center mb-3">
								<img src="img/user2.jpg" alt="Image" class="shadow">
							</div>
							<h4 class="text-center"><?= $data['nama'] ?? '' ?></h4>
						</div>
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
								<i class="fa fa-home text-center mr-1"></i>
								Account
							</a>
							<a class="nav-link" href="../home.php" <i class="fa fa-key text-center mr-1"></i>
								Home
							</a>
						</div>
					</div>
					<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
							<h3 class="mb-4">Account Settings</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?? '' ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" value="<?= $data['email'] ?? '' ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Nomor Telefon</label>
										<input type="text" name="nohp" class="form-control" value="<?= $data['no_hp'] ?? '' ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" rows="4"><?= $data['alamat'] ?></textarea>
							</div>
						</div>
					</div>
					<div>
						<button class="btn btn-primary">Update</button>
						<button class="btn btn-light">Cancel</button>
					</div>
			</form>
		</div>
		<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
			<h3 class="mb-4">Password Settings</h3>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Old password</label>
						<input type="password" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>New password</label>
						<input type="password" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Confirm new password</label>
						<input type="password" class="form-control">
					</div>
				</div>
			</div>
			<div>
				<button class="btn btn-primary">Update</button>
				<button class="btn btn-light">Cancel</button>
			</div>
		</div>
		<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
			<h3 class="mb-4">Security Settings</h3>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Login</label>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Two-factor auth</label>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="recovery">
							<label class="form-check-label" for="recovery">
								Recovery
							</label>
						</div>
					</div>
				</div>
			</div>
			<div>
				<button class="btn btn-primary">Update</button>
				<button class="btn btn-light">Cancel</button>
			</div>
		</div>
		<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
			<h3 class="mb-4">Application Settings</h3>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="app-check">
							<label class="form-check-label" for="app-check">
								App check
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
							<label class="form-check-label" for="defaultCheck2">
								Lorem ipsum dolor sit.
							</label>
						</div>
					</div>
				</div>
			</div>
			<div>
				<button class="btn btn-primary">Update</button>
				<button class="btn btn-light">Cancel</button>
			</div>
		</div>
		<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
			<h3 class="mb-4">Notification Settings</h3>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="notification1">
					<label class="form-check-label" for="notification1">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium
						accusamus, neque cupiditate quis
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="notification2">
					<label class="form-check-label" for="notification2">
						hic nesciunt repellat perferendis voluptatum totam porro eligendi.
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="notification3">
					<label class="form-check-label" for="notification3">
						commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
					</label>
				</div>
			</div>
			<div>
				<button class="btn btn-primary">Update</button>
				<button class="btn btn-light">Cancel</button>
			</div>
		</div>
		</div>
		</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>