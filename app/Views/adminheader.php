<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once APP_DIR . "Views/header-contents.php"; ?>
  <link rel="stylesheet" href="<?php echo ASSETS_URL . "css/adminstyle.css"; ?>">
</head>
<body>

<style>

</style>


<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class = "theme" href="<?php echo BASE_URL . "store"; ?>">
                        Return to Store
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "admin/dashboard"; ?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "admin/products/view"; ?>">View Products</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "admin/products/add"; ?>">Add Products</a>
                </li>
                <li>
                    <a href="#">Discounts</a>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        
                        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                    </div>
                </div>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>