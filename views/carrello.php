<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Load Vue followed by BootstrapVue, and BootstrapVueIcons -->
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
    <script src="https://kit.fontawesome.com/6ec9c7cfba.js"crossorigin="anonymous"></script>
    <style>
        .controlloObbligatorio{
            color: red;
        }
    </style>
</head>
<body>
<?php
 require_once(".." .DIRECTORY_SEPARATOR."common.php");
 require_once(Common::$PathDataDb."dbProdotto.php");
 require_once(Common::$PathDataDb."dbCarrello.php");
 
 require_once(Common::$PathModels."prodotto.php");
 require_once(Common::$PathModels."carrello.php");
 $prodotto=new Prodotto();
 $dbP=new DbProdotto();

 $cart=new Carrello();
 $dbC=new DbCarrello();
 //var_dump( $_SESSION);
//  $idProduct=$_GET["id"];
//  $prodotto=$dbP->SelectById($idProduct); //var_dump( $prodotto);
//var_dump($_SESSION);
    
    
   //var_dump( $rows); 
    //$cartId=$cart->GetCarrelloId();
    if(isset($_POST['id'])){
      if(isset($_POST["btnSubR"])){
         if("btnSubR")
         {
           $dbC->RemoveOC($_POST['id']);
         }
       } 
     }

     if(isset($_POST['idu'])){
      if(isset($_POST["btnSubD"])){
       if("btnSubD")
       {
         $dbC->DeleteC($_POST['idu']);
       }
       
     } 
     }

     $rows=$dbC->ReturnC(Common::GetUserId());
 ?>
<!-- button type submit value name delete
form action method post 
if isset $post[submit]
if =nome /value bottone -> $dbC->funzione correlata al bottone  -->


<section class="h-100 h-custom" style="background-color: #FFD4B2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">I tuoi oggetti</h6>
                  </div>
                  <hr class="my-4">
                <?php
                $qta=0;
                $price=0;
                foreach ($rows as $row => $value) {
                    $cartId=$value["CarrelloId"];
                    $artId=$value["ArticoloID"];
                    $qta+=$value["Qta"];
                    $u=$value["UtenteId"];
                    $art=$dbP->SelectById($artId);
                    $artName= $art->GetProdotto();
                    $artImg= $art->GetNomeImmagine();
                    $artPrice= $art->GetPrezzo();
                    //$artQta= $art->GetQta();
                    $link=Common::$PathViews."prodotto.php"."?id=".$artId;
                    //$qta+= $artQta;
                    $price+=$artPrice;
                
            ?>
              
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                    <?php
                        echo '<img src="../Images/'.$artImg.'" width="90" height="90">';
                    ?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                    <?php
                      echo '<h6 class="text-black mb-0">'.$artName.'</h6>';
                      ?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <input id="form1" min="0" name="quantity" value="<?=$value["Qta"]?>" type="number"
                        class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <?php
                      echo '<h6 class=" mb-0">'.$artPrice.'€'.'</h6>';
                      ?>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <form action="" method="post">
                      <button type="submit" name="btnSubR" class="btn btn-warning">
                      Remove
                      </button>
                      <input id="id" min="0" name="id" value="<?=$cartId?>" type="hidden">
                    </form>
                    </div>
                  </div>
                <?php
                }
                if(count($rows)==0){
                  echo '<h6>pare non ci sia nulla nel carrello</h6>';
                  $u="";
                }
                ?>
                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="../home/index.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items <?= $qta?></h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Shipping</h5>

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Standard-Delivery- €5.00</option>
                      <option value="2">Express-Delivery- €15.00</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3">Codice regalo</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" placeholder="inserisci il codice"/>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5><?=$price ?> €</h5>
                  </div>
                <form action="" method="post">
                  <button type="submit" name="btnSubP" class="btn btn-warning"> 
                    <a href="..\utility\paga.php" class="link-dark link-underline-opacity-0">Paga</a>
                  </button>
                  <button type="submit" name="btnSubD" class="btn btn-warning" >
                      <i class="	far fa-trash-alt"></i>
                  </button>
                  <input id="idu" min="0" name="idu" value="<?=$u?>" type="hidden">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>