<?php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
	redirect('login');
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('includes/header'); ?>
	<title>Edit Post</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 my-5">
				<h2 class="text-center mb-3">Edit Post</h2>
				<a class="btn btn-warning" href="<?php echo base_url('post'); ?>"> <i class="fas fa-angle-left"></i> Back</a>
			</div>

			<div class="col-lg-12">
				<?php echo $this->session->flashdata('message'); ?>

				<form action="<?= base_url('post/update/' . $editData[0]->id) ?>" method="post">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" name="title"
							value="<?= $editData[0]->title ?>">
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" id="description"
							name="description"><?= $editData[0]->description ?></textarea>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email"
							value="<?= $editData[0]->email ?>">
					</div>
					<button type="submit" class="btn btn-primary">Update Post</button>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('includes/footer'); ?>
</body>

</html>
