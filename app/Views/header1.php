<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Navbar with Login Form in Dropdown</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<?php require_once APP_DIR . "Views/header-contents.php"; ?>
<style>
body {
	font-family: 'Varela Round', sans-serif;
}
.form-control {
	box-shadow: none;
	border-radius: 4px;
}	
.navbar {
	background: #fff;
	padding-left: 16px;
	padding-right: 16px;
	border-bottom: 1px solid #dfe3e8;
	border-radius: 0;
}
.nav-link img {
	border-radius: 50%;
	width: 36px;
	height: 36px;
	margin: -8px 0;
	float: left;
	margin-right: 10px;
}
.navbar .navbar-brand {
	padding-left: 0;
	font-size: 20px;
	padding-right: 50px;
}
.navbar .navbar-brand b {
	color: #5c6ac4;		
}
.navbar .form-inline {
	display: inline-block;
}
.navbar .navbar-nav {
	position: relative;
}
.navbar a, .navbar a:active {
	color: #888;
	font-size: 15px;
	background: transparent;
}
.search-box {
	position: relative;
}	
.search-box input {
	padding-right: 35px;
	border-color: #dfe3e8;
	border-radius: 4px !important;
	box-shadow: none
}
.search-box .input-group-text {
	min-width: 35px;
	border: none;
	background: transparent;
	position: absolute;
	right: 0;
	z-index: 9;
	padding: 7px;
	height: 100%;
}
.search-box i {
	color: #a0a5b1;
	font-size: 19px;
}
.navbar .btn-primary, .navbar .btn-primary:active {
	color: #fff;
	background: #5c6ac4 !important;
	padding-top: 8px;
	padding-bottom: 6px;
	border-radius: 4px;
	vertical-align: middle;
	border: none;
	min-width: 120px;
	margin: 2px 0;
}
.navbar .btn-primary:hover, .navbar .btn-primary:focus {		
	color: #fff;
	background: #5765c1 !important;
}
.navbar .action-buttons .dropdown-toggle::after {
	display: none;
}
.search-box .btn span {
	transform: scale(0.9);
	display: inline-block;
}
.navbar .nav-item i {
	font-size: 18px;
}
.navbar .dropdown-item i {
	font-size: 16px;
	min-width: 22px;
}
.navbar .dropdown-menu {
	border-radius: 1px;
	border-color: #e5e5e5;
	box-shadow: 0 2px 8px rgba(0,0,0,.05);
}
.navbar .navbar-nav .dropdown-menu a {
	padding: 8px 20px;
	line-height: normal;
}
.navbar .navbar-form {
	border: none;
}
.navbar .navbar-form-wrapper {
	padding: 0 15px;
}
.navbar .login-form label {
	color: #888;
	font-weight: normal;
}
.navbar .dropdown-menu.login-form {
	width: 280px;
	padding: 20px;
	left: auto;
	right: 0;
	font-size: 14px;
}
.navbar .navbar-nav .dropdown-menu.login-form a {
	padding: 0 !important;
	color: #5c6ac4;
	font-weight: normal;
}
.navbar .navbar-nav .dropdown-menu.login-form a:hover{
	text-decoration: underline;
}
.navbar .dropdown-menu.login-form .checkbox-inline {
	margin-top: 10px;
}
@media (min-width: 1200px){
	.form-inline .input-group {
		width: 300px;
		margin-left: 30px;
	}
}
@media (max-width: 768px){
	.navbar .dropdown-menu.login-form {
		width: 100%;
		padding: 10px 15px;
		background: transparent;
		border: none;
	}
	.navbar .form-inline {
		display: block;
	}
	.navbar .input-group {
		width: 100%;
	}
	.navbar .navbar-nav .btn-primary, .navbar .navbar-nav .btn-primary:active {
		display: block;
	}
}
</style>

</head> 
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a href="<?php echo BASE_URL . "templates"; ?>" class="navbar-brand">Dex<b>Tech</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav">
			<a href="<?php echo BASE_URL . "templates"; ?>" class="nav-item nav-link">Home</a>
			<a href="<?php echo BASE_URL . "cart"; ?>" class="nav-item nav-link">Cart</a>	
			
			
		<?php if(isset($_SESSION["current_user"]["user_id"])): ?>

			<a href="<?php echo BASE_URL . "logout"; ?>" class="nav-item nav-link active">LOGOUT</a>
			<a href="<?php echo BASE_URL . "wishlist"; ?>" class="nav-item nav-link ">Wishlist</a>

		<?php else: ?>

			<a href="<?php echo BASE_URL . "login"; ?>" class="nav-item nav-link active">Login</a>
			
			<a href="<?php echo BASE_URL . "registration"; ?>" class="nav-item nav-link">Register</a>

		<?php endif; ?>


			
        </div>
		<form action="templates" method="get" class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input name="search" type="text" id="search" class="form-control" placeholder="Search here...">
				<div class="input-group-append">
					<span class="input-group-text"><i class="material-icons">&#xE8B6;</i></span>
				</div>
			</div>
		</form>
	</div>
</nav>
</body>
</html>                            