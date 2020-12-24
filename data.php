<?php require_once "vendor/autoload.php"; ?>

<?php 
	//Class use
	use App\Controller\Student;

	//Class instance
	$student = new Student;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

	<div class="wrap-table ">
		<a class="btn btn-sm btn-primary" href="index.php">Add new student</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$data = $student -> allStudent();

							$i = 1;
							while( $student_data = $data -> fetch_assoc() ):
						?>
						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $student_data['name']; ?></td>
							<td><?php echo $student_data['email']; ?></td>
							<td><?php echo $student_data['cell']; ?></td>
							<td><img src="media/img/students/<?php echo $student_data['photo']; ?>" alt=""></td>
							<td><?php echo $student_data['status']; ?></td>
							<td>
								<a class="btn btn-sm btn-info" href="#">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="#">Delete</a>
							</td>
						</tr>
						<?php endwhile; ?>

						
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>