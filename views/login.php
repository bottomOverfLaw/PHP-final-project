<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <script>
    function passwordErrata() {
        alert ("Inserita mail o password non valida");
    }
</script>
</head>
<body>
    <?php
         require_once(".." .DIRECTORY_SEPARATOR."common.php");
         require_once(Common::$PathDataDb."dbUtente.php");
        //var_dump($_SESSION);
        //  $db = new DbUtente();
        //  $db->Logout();
         
         $utente = new Utente();
        
         $pw="";
         //echo $utente->GetUtenteId()."<br>";
         //echo 'bello';
         
         if (isset($_POST['btnSub'])) {
             $utente->SetMail($_POST['mail']);
             $pw = $_POST['pass1'];
 
             $db = new DbUtente();
             $ok = $db->Login($utente->GetMail(), $pw);
              //var_dump ($ok);
              if ($_SESSION["TipoUtente"]!="G") {
                header("Location: ../home/index.php");
              } else {
                echo "<script>passwordErrata();</script>";
             }
         }
    ?>
   <section class="h-100 gradient-form" style="background-color: #FC4F4F;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
              <h5><a href="../home/index.php" class="link-dark"><i class="fas fa-arrow-left fa-lg me-3 fa-fw"></i></a></h5>
                <div class="text-center">
                  <a href="../home/index.php"><img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo"></a>
                    
                  <h4 class="mt-1 mb-5 pb-1">Login:</h4>
                </div>

                <form action="login.php" method="post">

                  <div class="form-outline mb-4">
                  <span><i class="fas fa-envelope"></i> 
					        <label class="form-label">Mail:<span class="controlloObbligatorio">*</span></label></span>
                    <input type="email" id="mail" name="mail" class="form-control"
                      placeholder="Email address" value= "<?=$utente-> GetMail()?>"/>
                  </div>

                  <div class="form-outline mb-4">
                  <span><i class="fas fa-lock"></i>
                  <label class="form-label">Password:<span class="controlloObbligatorio">*</span></label></span>
                    <input type="password" id="pass1" name="pass1"class="form-control" placeholder="Password" value= "<?=$pw?>"/>
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-3"  value="submit" name="btnSub">Login</button>
                    <a class="text-muted" href="changePw.php">Password dimenticata?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Non hai ancora un account?</p>
                    <button type="submit" value="submit" name="submit" class="btn btn-outline-danger"><a href="newUtente.php" class="link-dark link-underline-opacity-0">Iscriviti</a></button>
                  </div>

                </form>

              </div>
            </div>
            <div style="background-color: #F76E11;" class="col-lg-6 d-flex align-items-center bg-gradient">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just an e-commerce</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
