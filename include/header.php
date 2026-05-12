<header class="row p-2 text-dark" style="background-color: #E06469 ;">
<div class="col-sm-2">
<?php $isHome = strpos($_SERVER['PHP_SELF'], 'index.php') !== false; ?>

<?php if (!$isHome): ?>
    <a href="../home/index.php">
<?php endif; ?>

        <img src="/final_project/Images/lotus.webp" style="width: 185px;" alt="logo">

<?php if (!$isHome): ?>
    </a>
<?php endif; ?>
</div>
<div class="col-sm-8 item-aling-center text-light">
<h1>TSS-Tecnico Sviluppo Software</h1>
<button type="button" class="btn btn-outline-danger"><a href="#" class="link-dark d-inline link-underline-opacity-0"><h6>News</h6></a></button>
<button type="button" class="btn btn-outline-danger"><a href="#" class="link-dark d-inline link-underline-opacity-0"><h6>About us</h6></a></button>
<?php
    //var_dump($_SESSION);
 if ($_SESSION["TipoUtente"]!="G") {
    ?>
    <button type="button" class="btn btn-outline-danger"><a href="../views/carrello.php" class="link-dark d-inline">
    <span><i class="fas fa-shopping-cart" width="16" height="16"></i></span>
    </a></button>
    <?php
  }

?>
<hr>
    <a class="btn btn-primary" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
    <a class="btn btn-primary" style="background-color: #c61118;" href="#!" role="button"><i class="far fa-envelope-open"></i></a>
    <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
    <a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
    <a class="btn btn-primary" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
</div>
</header>