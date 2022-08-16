<?php
require 'connection.php';

if(isset($_POST["submit"])){
	$id = $_POST["id"];
	$full_name = $_POST["full_name"];
	$email = $_POST["email"];
	$course = $_POST["course"];
	$link = $_POST["link"];

	$query = "INSERT INTO tb_docs VALUES ('$id','$full_name','$email','$course','$link')";
	mysqli_query($conn, $query);
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interns Documents</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<!-- ======================== Input Data =========================== -->
		<aside class="side">
			<h3>Input Data</h3>
			<form action="" method="post">
				<label>ID Number</label><br>
				<input type="text" name="id" class="form-control" id="exampleFormControlInput1" required>
				<label>Full Name</label><br>
				<input type="text" name="full_name" class="form-control" id="exampleFormControlInput1" required>
				<label>Email</label><br>
				<input type="email" name="email" class="form-control" id="exampleFormControlInput1" required>
				<label>Course</label><br>
				<input type="text" name="course" class="form-control" id="exampleFormControlInput1" required>
				<label>Google Drive Link</label><br>
				<input type="text" name="link" class="form-control" id="exampleFormControlInput1" required><br>
				<button type="submit" name="submit" class="btn btn-secondary">Submit</button>
			</form>
		</aside>
		<!-- ============================= Interns Monitoring ====================== -->
		<main class="main">
			<div class="fixed">
				<div>
					<h1>Interns Documents Monitoring</h1>
				</div>
				<div class="input-group mb-3" id="main-search">
					  <input type="text" id="myInput" class="form-control" placeholder="Search...">
					  <button class="btn btn btn-secondary" onclick="myFunction()" name="search" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
				</div>
			</div>

			<table id="myTable" class="table table-striped mt-0">
				<thead>
				    <th>ID Number</th>
				    <th>Full Name</th>
				    <th>Email</th>
				    <th>Course</th>
				    <th>Google Drive Link</th>
				    <th>Operator</th>
				</thead>
				<?php
					$sql = "SELECT * FROM `tb_docs`";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						echo '<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['full_name'].'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['course'].'</td>
								<td><a class="link-primary" href='.$row['link'].' target="_blank" class="link-dark">'.$row['link'].'</a></td>
								<td><button class="btn btn-secondary"><a class="text-light text-decoration-none" href="delete.php?deleteId='.$row['id'].'">Delete</a></button></td>
							</tr>';
					}

				 ?>
				 
			</table>
		</main>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>