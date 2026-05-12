<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodotto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <style>
        .controlloObbligatorio{
            color: red;
        }
        .checked {  
            color : #F1C93B;  
            font-size : 20px;  
        }  
        .unchecked {  
            font-size : 20px;  
        }  

    </style>
</head>
<body>
<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR."common.php");
require_once(Common::$PathDataDb."dbProdotto.php");
require_once(Common::$PathDataDb."dbCarrello.php");
require_once(Common::$PathModels."prodotto.php");
require_once(Common::$PathModels."carrello.php");

$prodotto = new Prodotto();
$dbP = new DbProdotto();
$dbC = new dbCarrello();
$cart = new Carrello();

if(isset($_GET['id'])){
    $idProduct = $_GET['id'];
    $prodotto = $dbP->SelectById($idProduct);
}

$cart->SetPrezzo($prodotto->GetPrezzo());

if($_SESSION["TipoUtente"] != "G" && isset($_SESSION['UtenteId'])) {
    $cart->SetUtenteId($_SESSION['UtenteId']);
}

if(isset($_POST["btnSub"])) {
    $cart->SetQta($_POST['qta']);
    $cart->SetArticoloId($_POST["id"]);
    $dbC->AddC($cart);
    header("Location: /final_project/home/index.php");
    exit();
}
?>

<div class="super_container" >
  <header class="header" style="display: none;">
    <div class="row mb-4 d-flex justify-content-between align-items-center">
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #ffff; padding: 11px;">
        <nav>
        <div class="pt-5" >
            <h6 class="mb-0"><a href="../home/index.php" class="text-body">
            <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
        </div>
        </nav>
            <div class="row">
                <div class="col-md-2 col-lg-2 col-xl-2" style="margin-top:40px;">
                        <?php
                            echo '<img src="../Images/'.$prodotto->GetNomeImmagine().'" class="rounded float-start" width="300" height="300">';
                        ?>
                </div>
                <div class="col-lg-6 order-3" style="margin-left:140px;">
                    <div>
                        <hr>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                        <h4>
                        <?php 
                            echo $prodotto->GetProdotto();
                        ?>
                        </h4>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                        <i class="fas fa-star fa-sm checked" title="Bad"></i>  
                        <i class="fas fa-star fa-sm checked" title="Poor"></i>
                        <i class="fas fa-star fa-sm checked" title="OK"></i>
                        <i class="fas fa-star fa-sm checked" title="Good"></i>
                        <i class="fas fa-star fa-sm unchecked" title="Excellent"></i>
                        </div>
                        <div class="product_description">
                            <?php 
                            echo $prodotto->GetDescrizione();
                            ?>
                        </div>
                        <div> 
                            <span class="product_price">
                            <h5>
                            <?php 
                            echo $prodotto->GetPrezzo();
                            ?>
                            ,00 € (iva inclusa)</h5>
                            </span> 
                        </div>
                        
                        <hr class="singleline">
                        <div> 
                            <span class="product_info"><h6>Garanzia:</h6> 6 mesi </span>
                                <hr> 
                            <span class="product_info"><h6>Politica di ritorno:</h6> 1 settimana</span>
                                <hr> 
                            <span class="product_info"><h6>In Stock:</h6> 25 unità</span> 
                        </div>
                        <hr class="singleline">
                            <br>
                            <?php
                            if ($_SESSION["TipoUtente"]!="G") {
                            ?>
                            <form action="prodotto.php" method="post">
                              <label> <h6>Quantità:</h6> </label>
                                <input type="number" name="qta" class=" form-control ctrlInput text-center" style="max-width: 4rem;" value="1">
                                <br>
                                <input type="hidden" name="id" class=" form-control ctrlInput text-center" style="max-width: 4rem;" value="<?=$idProduct?>">
                                <br>
                                <button type="submit" name="btnSub" value="btnSub" class="form-control col-2 btn btn-primary ms-2" style="padding:10;"> Add to Cart</button>
                            </form>
                            <?php
                            }
                            ?>
                    </div>
                </div>
                </div>           
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<hr>
<h4 class="mb-0" style="margin-left:500px;">Recent rewies</h4>
<!-- sezione rewies  -->
<section style="background-color: #ad655f;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-dark">
          <div class="card-body p-4">
            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

            <div class="d-flex flex-start">
              <div>
                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 07, 2021
                    <span class="badge bg-primary">acquisto verificato</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                        <i class="fas fa-star fa-sm checked" title="Bad"></i>  
                        <i class="fas fa-star fa-sm checked" title="Poor"></i>
                        <i class="fas fa-star fa-sm checked" title="OK"></i>
                        <i class="fas fa-star fa-sm checked" title="Good"></i>
                <p class="mb-0">
                  Lorem Ipsum is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a galley of type and
                  scrambled it.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <div>
                <h6 class="fw-bold mb-1">Lara Stewart</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 15, 2021
                    <span class="badge bg-primary">acquisto verificato</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                        <i class="fas fa-star fa-sm checked" title="Bad"></i>  
                        <i class="fas fa-star fa-sm checked" title="Poor"></i>
                        <i class="fas fa-star fa-sm checked" title="OK"></i>
                        <i class="fas fa-star fa-sm checked" title="Good"></i>
                        <i class="fas fa-star fa-sm checked" title="Good"></i>
                <p class="mb-0">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                  Omnis, vero accusamus, cumque provident totam quos minus consequatur sit tenetur illo, 
                  nobis beatae tempore facere laudantium veniam? Quod dolor modi dolorem.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" style="height: 1px;" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <div>
                <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    April 24, 2021
                    <span class="badge bg-primary">acquisto verificato</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                        <i class="fas fa-star fa-sm checked" title="Bad"></i>  
                        <i class="fas fa-star fa-sm checked" title="Poor"></i>
                        <i class="fas fa-star fa-sm checked" title="OK"></i>
                <p class="mb-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                  Totam impedit culpa repellat amet omnis! At, dolorem. 
                  Tempore, quas soluta quam ipsam dolores fugit, 
                  qui autem amet inventore adipisci distinctio laudantium voluptatum voluptatem quod? 
                  Quia laboriosam neque dolore ex explicabo illo voluptatibus expedita, quo distinctio, numquam tenetur, 
                  quis hic quas dolorem voluptates? Et cupiditate consequuntur doloremque eveniet atque veritatis nobis sit 
                  velit, sed delectus excepturi fugiat iure accusantium libero asperiores nesciunt neque, 
                  ab quam, quae similique ipsa eum placeat sint suscipit?
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <div>
                <h6 class="fw-bold mb-1">Betty Walker</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    May 30, 2021
                    <span class="badge bg-primary">acquisto verificato</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                        <i class="fas fa-star fa-sm checked" title="Bad"></i>  
                        <i class="fas fa-star fa-sm checked" title="Poor"></i>
                        <i class="fas fa-star fa-sm checked" title="OK"></i>
                        <i class="fas fa-star fa-sm checked" title="Good"></i>
                        <i class="fas fa-star fa-sm checked" title="Good"></i>
                <p class="mb-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                  Impedit beatae, molestias laborum ipsam, reprehenderit quisquam a voluptatem odio architecto numquam in vitae
                  , aspernatur fuga amet perferendis quidem quam enim repudiandae cupiditate voluptates quas dolores! 
                  Eum labore suscipit numquam totam iste nobis cumque velit alias inventore repellendus dolor distinctio, 
                  quod aut corrupti atque officia dolorem non vitae, enim itaque ipsa, tenetur quasi maiores. 
                  Suscipit possimus repudiandae esse? Consequatur nulla quae tempore.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- sezione commento -->
          <div class="card-body p-4">
            <div class="d-flex flex-start w-100">
              <div class="w-100">
                <h5>Add a comment</h5>
                    <i class="fas fa-star fa-sm text-dark" title="Bad"></i>
                    <i class="fas fa-star fa-sm text-dark" title="Poor"></i>
                    <i class="fas fa-star fa-sm text-dark" title="OK"></i>
                    <i class="fas fa-star fa-sm text-dark" title="Good"></i>
                    <i class="fas fa-star fa-sm text-dark" title="Excellent"></i>
                <div class="form-outline">
                <label class="form-label" for="textAreaExample">What is your view?</label>
                  <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                </div>
                <div class="d-flex justify-content-between mt-3">
                  <button type="button" class="btn btn-danger">
                    Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>