<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Load Vue followed by BootstrapVue, and BootstrapVueIcons -->
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
    <script src="https://kit.fontawesome.com/6ec9c7cfba.js"crossorigin="anonymous"></script>
    <title>Nuovo Utente</title>
    <style>
        .controlloObbligatorio{
            color: #E0144C;
        }
        .ctrlinput:focus{
            background-color: #FFFAFA;
        }
        .ctrlinput:invalid{
            border-color: #820000;
        }
        .ctrlinput:valid{
            border-color: #AAC8A7;
        } 
    </style>
</head>
<body>

    <?php
        require_once(".." .DIRECTORY_SEPARATOR."common.php");
        require_once(Common::$PathDataDb."dbUtente.php");
        $utente = new Utente();

        $pw="";
        $pw2="";
        //echo $utente->GetUtenteId()."<br>";
        //echo 'bello';
        
        if (isset($_POST['btnSub'])) {
            $utente->SetNome($_POST['nome']);
            $utente->SetMail($_POST['mail']);
            $utente->SetTelefono($_POST['tel']);
            $pw = $_POST['pass1'];
            $pw2 = $_POST['pass2'];

            $db = new DbUtente();
            $db->Register($utente, $pw, $pw2);

            if ($_SESSION["TipoUtente"]!="G") {
              header("Location: ..\home\index.php");
            }
        }
    ?>

<section class="vh-100" style="background-color: #ef927e;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
              <h5><a href="../home/index.php" class="link-dark"><i class="fas fa-arrow-left fa-lg me-3 fa-fw"></i></a></h5>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                    <form action="newUtente.php" method="post" onsubmit="convalidaSub()" class="mx-1 mx-md-4">
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Inserire nome" 
                    onchange="convalidaNome()" value= "<?=$utente-> GetNome()?>">
                      <label class="form-label">Nome<span class="controlloObbligatorio">*</span></label>
                      <div id="erNome"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="mail" name="mail" placeholder="Inserire mail valida" 
                    onchange="convalidaMail()" value= "<?=$utente-> GetMail()?>"> 
                      <label class="form-label">Mail<span class="controlloObbligatorio">*</span></label>
                      <div id="erMail"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="tel" name="tel" placeholder="Inserire numero di telefono" 
                    maxlength="50" value= "<?=$utente-> GetTelefono()?>"> 
                      <label class="form-label">Telefono</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="password" id="pass1" name="pass1" placeholder="Inserire password" 
                    onchange="convalidaPw()" value= "<?=$pw?>">
                      <label class="form-label">Password<span class="controlloObbligatorio">*</span></label>
                      <div id="erPw"></div> 
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="password" id="pass2" name="pass2" placeholder="Conferma password" 
                    onchange="conPw()" value= "<?=$pw2?>"> 
                      <label class="form-label">Conferma password<span class="controlloObbligatorio">*</span></label>
                      <div id="erConPw"></div>
                    </div>
                  </div>
      
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <p>Sei già iscritto? <a href="login.php">Vai al login</a> </p>
                </div>  
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg"  value="submit" name="btnSub" >Registrati</button>
                  </div>

                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

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
    function convalidaSub() {
        if( convalidaNome() & convalidaMail() & convalidaPw() & conPw()) 
            ok = true;
        else 
            ok = false;
            
        if(ok == false)
            event.preventDefault();
        // ok = convalidaMail();
        // a = convalidaNome();
        // if(ok == true) ok = a;
        // a = convalidaPw();
        // if(ok == true) ok = a;
        // a = conPw();
        // if(ok == true) ok = a;
    }

    function convalidaNome() {
        ok = true;
        try { 
        ctrlEr = document.getElementById("erNome");
        ctrlEr.textContent = "";

        ctrl = document.getElementById("nome");
        ctrl.style.borderColor = "black";

        n = ctrl.value;
        regEx = /(?=^.{3,25}$)[A-Za-z0-9]/g;
        stringInput = ctrl.value;
        //corr = stringInput.match(regEx);
        
        if(regEx.test(n)) return ok;
        ok = false;
        ctrl.style.borderColor = "red";

        ctrlEr.textContent = "inserire nome valido";
        ctrlEr.style.Color = "red";
        } catch(e) {
            alert ("si è verificato un errore" +e);
            ok = false;
        } finally {
            return ok;
        }
    }

    function convalidaMail() {
        ok = true;
        try {
            ctrlEr = document.getElementById("erMail");
            ctrlEr.textContent = "";

            ctrl = document.getElementById("mail");
            ctrl.style.borderColor = "black";

            m = ctrl.value;
            mRegEx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if(mRegEx.test(m)) return ok;
            ok = false;
            ctrl.style.borderColor = "red";

            ctrlEr.textContent = "inserire mail valida";
            ctrlEr.stylecColor = "red";
        } catch (e) {
            alert ("si è verificato un errore" +e);
            ok = false;
        } finally {
            return ok;
        }
    }

    function convalidaPw() {
        ok = false;
        try {
            ctrlEr = document.getElementById("erPw");
            ctrlEr.textContent = "";

            ctrl = document.getElementById("pass1");
            ctrl.style.borderColor = "black";

            p = ctrl.value;
            pRegEx = /[(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$]/;
            
            if(pRegEx.test(p)) 
            {
                ctrl.style.borderColor = "red";
                ctrlEr.textContent = "inserire password valida, deve contenere almeno 1 lettera maiuscola, 1 lettera minuscola, 1 carattere speciale ed essere lunga minimo 8 caratteri";
                ctrlEr.stylecColor = "red";
                return ok;
            }
            ok = true;
        } catch (e) {
            alert ("si è verificato un errore" +e);
        } finally {
            return ok;
        }
    }

    function conPw() {
        ok = true;
        try {
            ctrlEr = document.getElementById("erConPw");
            ctrlEr.textContent ="";

            document.getElementById("pass1").style.borderColor="black";
            document.getElementById("pass2").style.borderColor="black";

            pass1 = document.getElementById("pass1").value;
            pass2 = document.getElementById("pass2").value;

            if ((pass1!=pass2) || (pass1.trim().length == 0) || (pass2.trim().length == 0)) {
                document.getElementById("pass1").style.borderColor="red";
                document.getElementById("pass2").style.borderColor="red";

                ctrlEr.textContent = "le password non combaciano";
                ctrlEr.stylecColor = "red";
                ok = false;
            }

        } catch (e) {
            alert ("si è verificato un errore" +e);
            ok = false;
        } finally {
            return ok;
        }
        
    }
</script>
</body>
</html>