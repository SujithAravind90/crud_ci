<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	<title>CI CRUD Form</title>
</head>

<body>
	<div class="container my-5">
		<form class="login-form" action="<?php echo base_url('/login/do_login'); ?>" method="post">
			<h1 class="text-center">Codeignitor CRUD Form Login</h1>
			<h2 class="mt-4">Login Form</h2>
			<?php echo $this->session->flashdata('message'); ?>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1"
					aria-describedby="emailHelp" placeholder="Enter Email">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Title</label>
				<input type="text" id="title" class="form-control" name="title" placeholder="Enter title">
				<!-- <div class="invalid-feedback">
					Please fill title
				</div> -->
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-success" href="<?php echo $this->facebook->login_url(); ?>">Facebook</a>
		</form>
	</div>
</body>

</html>
