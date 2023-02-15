<?php
	
	// echo md5("Nampphaui");
	// $ssid = $_GET["ssid"];
	// var_dump($_SESSION);
	// $sid = session_id();
	

	if(isset($_COOKIE["PHPSESSID"])) {
		$s = $_COOKIE["NAMEID"];
		
		if($_COOKIE["PHPSESSID"] == $s) {
			if(session_id() === '') {
				session_start();
			}
			require "config.php";
			require "show-manage.php";
		} else {
			header("location: login.php");
		}
		
	} else {
		header("location: login.php");
	}
	// var_dump($_SESSION["PHPSESSID"]);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
    	.mmm {height: 80px};
		a	{
			display: inline-block;
			padding-left: 20px !important;
			color: red !important;
		};
		.manage {
			min-width: 800px;
		 }
    </style>
</head>
<body>
	<div class="manage container-xxl position-relative">

		<div class="dropdown border position-absolute top-0 start-40">
			<a class="nav-link  table-hover dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> USER:<?php echo $_COOKIE["user_name"] ?> </a>
			<ul class="dropdown-menu bg-warning">
				<li><a class="dropdown-item " href="index.php?product=accessory">Change Password</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="logout.php">Logout</a></li>
			</ul>
		</div>

		<h1 class="text-center mt-3">MANAGER PAGE</h1>
		<table class="table table-dark home-menu w-100">
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(0)"><i class="bi bi-person"></i>  Account Manager</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(1)"><i class="bi bi-building-add"></i>  Branch Manager</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(2)"><i class="bi bi-person-bounding-box"></i>  Employee Manager</a></td>
			</tr>
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(3)"><i class="bi bi-bookmarks"></i> Category Manager</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(4)"><i class="bi bi-apple"></i>  OS Manager</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(5)"><i class="bi bi-gift-fill"></i>  Product Manager</a></td>
			</tr>
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(6)"><i class="bi bi-microsoft"></i>  Brand Manage</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="#" onclick="isOpen(7)"><i class="bi bi-images"></i>  Galery Manage</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="index.php"><i class="bi bi-house-heart-fill"></i>  Home</a></td>
			</tr>
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="logout.php"><i class="bi bi-box-arrow-in-left"></i>  Logout</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="logout.php"></a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="logout.php"></a></td>
			</tr>
		</table>

		<!-- quan ly acount -->
		
		<form id="account" class="menu">
			<h2>Account Manager</h2>
			<!-- truyen id vao addnew.php -->
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=0">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>User Name</th>
					<th>Password</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_account();
					?>
				</tbody>
			</table>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="">Next</a></button>
		</form>

		<form id="branch" class="menu">
			<h2>Quan ly chi nhanh</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=1">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Branch Name</th>
					<th>Address</th>
					<th>Hotline</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_branch();
					?>
				</tbody>
			</table>
		</form>

		<form id="employee" class="menu">
			<h2>Quan ly nhan su</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=2">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>F Name</th>
					<th>M Name</th>
					<th>L Name</th>
					<th>Bod</th>
					<th>Address</th>
					<th>Phone Number</th>
					<th>Gender</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_employee();
					?>
				</tbody>
			</table>
		</form>

		<form id="category" class="menu">
			<h2>Quan ly phan loai</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=3">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Code</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_category();
					?>
				</tbody>
			</table>
		</form>
		
		<form id="deviceos" class="menu">
			<h2>Quan ly OS</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=4">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Version</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_os();
					?>
				</tbody>
			</table>
		</form>

		<form id="product" class="menu">
			<h2>Quan ly San Pham</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=5">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Category</th>
					<th>OS</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Description</th>
					<th>Create time</th>
					<th>Update time</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_product();
					?>
				</tbody>
			</table>
		</form>
		
		<form id="brand" class="menu">
			<h2>Brand Manage</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=6">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Country</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_brand();
					?>
				</tbody>
			</table>
		</form>

		<form id="brand" class="menu">
			<h2>Galery Manage</h2>
			<button class="btn btn-primary mb-3"> <a class="text-light" href="addnew.php?id=7">Addnew</a></button>
			
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Poduct Name</th>
					<th>Link Picture</th>
					<th>Create Time</th>
					<th>Update Time</th>
					<th colspan="2">Action</th>
				</thead>
				<tbody>
					<?php 
						show_galery();
					?>
				</tbody>
			</table>
		</form>


	</div>
	<script type="text/javascript" src="./assets/js/manage.js"></script>
</body>
</html>