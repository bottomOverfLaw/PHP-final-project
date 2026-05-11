<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- BootstrapVue -->
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
    <style>
        /* Highlights required fields in red */
        .controlloObbligatorio {
            color: red;
        }
    </style>
</head>
<body>
<?php
// --- Dependencies ---
require_once(".." . DIRECTORY_SEPARATOR . "common.php");
require_once(Common::$PathDataDb . "dbProdotto.php");
require_once(Common::$PathDataDb . "dbCarrello.php");
require_once(Common::$PathModels . "prodotto.php");
require_once(Common::$PathModels . "carrello.php");

// --- DB handlers ---
$prodotto = new Prodotto();
$dbP      = new DbProdotto();
$cart     = new Carrello();
$dbC      = new DbCarrello();

// Remove a single cart row by CarrelloId
if (isset($_POST['id']) && isset($_POST["btnSubR"])) {
    $dbC->RemoveOC((int)$_POST['id']);
}

// Delete the entire cart for this user
if (isset($_POST['idu']) && isset($_POST["btnSubD"])) {
    $dbC->DeleteC($_POST['idu']);
}

// Fetch all cart rows for the logged-in user
$rows  = $dbC->ReturnC(Common::GetUserId());

// Initialise totals before the loop so they're always defined
$qta   = 0;
$price = 0;
$u     = "";
?>

<section class="h-100 h-custom" style="background-color: #FFD4B2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">

              <!-- LEFT COLUMN -->
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">Your order:</h6>
                  </div>
                  <hr class="my-4">

                  <?php
                  // Loop through each cart row and render a product line
                  foreach ($rows as $row => $value) {
                      $cartId   = $value["CarrelloId"];
                      $artId    = $value["ArticoloId"];
                      $qta     += $value["Qta"];
                      $u        = $value["UtenteId"];

                      // Fetch full product details from DB
                      $art      = $dbP->SelectById($artId);
                      $artName  = $art->GetProdotto();
                      $artImg   = $art->GetNomeImmagine();
                      $artPrice = $art->GetPrezzo();
                      $link     = Common::$PathViews . "prodotto.php" . "?id=" . $artId;
                      $price   += $artPrice;
                  ?>

                  <!-- Single product row -->
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="../Images/<?= $artImg ?>" width="90" height="90">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-black mb-0"><?= $artName ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <input min="0" name="quantity" value="<?= $value["Qta"] ?>"
                             type="number" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?= $artPrice ?>€</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <form action="" method="post">
                        <button type="submit" name="btnSubR" class="btn btn-warning">Remove</button>
                        <input type="hidden" name="id" value="<?= $cartId ?>">
                      </form>
                    </div>
                  </div>

                  <?php
                  }
                  if (count($rows) == 0) {
                      echo '<h6>looks like there\'s nothing in your cart</h6>';
                  }
                  ?>

                  <hr class="my-4">
                  <div class="pt-5">
                    <h6 class="mb-0">
                      <a href="../home/index.php" class="text-body">
                        <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
                      </a>
                    </h6>
                  </div>
                </div>
              </div>

              <!-- RIGHT COLUMN -->
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Items: <?= $qta ?></h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Shipping</h5>
                  <div class="mb-4 pb-2">
                    <select class="select" id="deliverySelect" onchange="updateTotal()">
                      <option value="5">Standard-Delivery - €5.00</option>
                      <option value="15">Express-Delivery - €15.00</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3">Gift Code</h5>
                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg"
                             placeholder="code" />
                    </div>
                  </div>

                  <hr class="my-4">

                  <!-- Total = product subtotal + delivery; updated live by JS -->
                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5><span id="totalPrice"><?= $price + 5 ?></span> €</h5>
                  </div>

                  <form action="" method="post">
                    <button type="submit" name="btnSubP" class="btn btn-warning">
                      <a href="..\utility\paga.php" class="link-dark link-underline-opacity-0">Pay</a>
                    </button>
                    <button type="submit" name="btnSubD" class="btn btn-warning">
                      Delete Cart
                    </button>
                    <input type="hidden" name="idu" value="<?= $u ?>">
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
<script>
  // Base price injected by PHP (products subtotal, no delivery)
  const basePrice = <?= $price ?>;

  // Recalculates the displayed total whenever the delivery option changes
  function updateTotal() {
    const delivery = parseInt(document.getElementById('deliverySelect').value);
    document.getElementById('totalPrice').textContent = (basePrice + delivery).toFixed(2);
  }
</script>
</body>
</html>