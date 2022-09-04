<?php
    if(isset($_SESSION["message"])){
   
        $message = $_SESSION["message"];
?>



<div class="container">
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>DexTech</strong> <?php echo $message; ?>
    </div>
</div>

<?php      unset($_SESSION["message"]);
    } 