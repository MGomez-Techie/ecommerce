<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php require_once APP_DIR . "Views/header-contents.php"; ?>

</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">DexTech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL . "store"; ?>">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL . "cart"; ?>">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL . "login"; ?>">Login</a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL . "registration"; ?>">Register</a>
      </li>   
    </ul>
  </div>  
</nav>
<br>