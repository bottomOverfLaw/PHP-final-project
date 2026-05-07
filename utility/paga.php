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
<section class="p-4 p-md-5" style="background-color:#BE8FA0;">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-5">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <h3>Settings</h3>
            <h6>Payment</h6>
          </div>
          <form action="">
            <p class="fw-bold mb-4 pb-2">Saved cards:</p>

            <div class="d-flex flex-row align-items-center mb-4 pb-1">
              <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
              <div class="flex-fill mx-3">
                <div class="form-outline">
                    <label class="form-label" for="formControlLgXc">Card Number</label>
                  <input type="text" id="formControlLgXc" class="form-control form-control-lg"
                    value="**** **** **** 3193">
                </div>
              </div>
              <a href="#!">Remove card</a>
            </div>

            <p class="fw-bold mb-4">Add new card:</p>

            <div class="form-outline mb-4">
              <input type="text" id="formControlLgXsd" class="form-control form-control-lg" placeholder="Nome e Cognome">
              <label class="form-label" for="formControlLgXsd">Cardholder's Name<span class="controlloObbligatorio">*</span></label>
            </div>

            <div class="row mb-4">
              <div class="col-7">
                <div class="form-outline">
                  <input type="text" id="formControlLgXM" class="form-control form-control-lg" placeholder="Numero della carta">
                  <label class="form-label" for="formControlLgXM">Card Number<span class="controlloObbligatorio">*</span></label>
                </div>
              </div>
              <hr>
              <div class="col-3">
                <div class="form-outline">
                  <input type="password" id="formControlLgExpk" class="form-control"
                    placeholder="MM/YY">
                  <label class="form-label" for="formControlLgExpk">Expire<span class="controlloObbligatorio">*</span></label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-outline">
                  <input type="password" id="formControlLgcvv" class="form-control"
                    placeholder="Cvv">
                  <label class="form-label" for="formControlLgcvv">Cvv<span class="controlloObbligatorio">*</span></label>
                </div>
              </div>
            </div>

            <button class="btn btn-success btn-lg btn-block form-control">Add card</button>
          </form>
          <div class="pt-5">
                    <h6 class="mb-0"><a href="../views/carrello.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to cart</a></h6>
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