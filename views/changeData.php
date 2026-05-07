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
    <title>Cambio dati</title>
    <style>
        .controlloObbligatorio{
            color: red;
        }
        .ctrlinput:focus{
            background-color: antiquewhite;
        }
        .ctrlinput:invalid{
            border-color: red;
        }
        .ctrlinput:valid{
            border-color: green;
        } 
    </style>
</head>
<body>

    <?php
        require_once(".." .DIRECTORY_SEPARATOR."common.php");
        require_once(Common::$PathDataDb."dbUtente.php");
        require_once(Common::$PathModels."utente.php");

        $db = new DbUtente();
        $u = new Utente();
      
      $rows=$db->SelectU(Common::GetUserId());
        foreach ($rows as $row => $value){
        $uId=$value["UtenteId"];
        $uN=$value["Nome"];
        $uM=$value["Mail"];
        $uC=$value["Cognome"];
        $uT=$value["Telefono"];
        $uCap=$value["Cap"];
        $uI=$value["Indirizzo"];
        $uP=$value["Provincia"];
        //$artQta= $art->GetQta();
                  
                  
                ?>
                    <form action="changeData.php" method="post" >
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Inserire nome" value= "<?=$uN?>">
                      <label class="form-label">Nome</label>
                      <div id="erNome"></div>
                    </div>
                  </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="cognome" name="cognome" placeholder="Inserire cognome" value= "<?=$uC?>">
                      <label class="form-label">Cognome</label>
                      <div id="erNome"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="mail" name="mail" placeholder="Inserire mail valida" value= "<?=$uM?>"> 
                      <label class="form-label">Mail</label>
                      <div id="erMail"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-phone-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="tel" name="tel" placeholder="Inserire numero di telefono" 
                    maxlength="50" value= "<?=$uT?>"> 
                      <label class="form-label">Telefono</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-map-pin fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="cap" name="cap" placeholder="Inserire cap" 
                    maxlength="5" value= "<?=$uCap?>"> 
                      <label class="form-label">Cap</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-home fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="indirizzo" name="indirizzo" placeholder="Inserire indirizzo" 
                    maxlength="50" value= "<?=$uI?>"> 
                      <label class="form-label">Indirizzo</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="far fa-map fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="text" id="provincia" name="provincia" placeholder="Inserire provincia" 
                    maxlength="3" value= "<?=$uP?>"> 
                      <label class="form-label">Provincia</label>
                    </div>
                  </div>
                  <?php
                }
                  ?>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary" type="submit" value="btnSub" name="btnSub">Cambia i dati</button>
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
<?php
//  }
  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    // function convalidaSub() {
    //     if( convalidaNome() & convalidaMail() & convalidaPw() & conPw()) 
    //         ok = true;
    //     else 
    //         ok = false;
            
    //     if(ok == false)
    //         event.preventDefault();
    //     // ok = convalidaMail();
    //     // a = convalidaNome();
    //     // if(ok == true) ok = a;
    //     // a = convalidaPw();
    //     // if(ok == true) ok = a;
    //     // a = conPw();
    //     // if(ok == true) ok = a;
    // } --!>

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

    // function convalidaPw() {
    //     ok = false;
    //     try {
    //         ctrlEr = document.getElementById("erPw");
    //         ctrlEr.textContent = "";

    //         ctrl = document.getElementById("pass1");
    //         ctrl.style.borderColor = "black";

    //         p = ctrl.value;
    //         pRegEx = /[(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$]/;
            
    //         if(pRegEx.test(p)) 
    //         {
    //             ctrl.style.borderColor = "red";
    //             ctrlEr.textContent = "inserire password valida, deve contenere almeno 1 lettera maiuscola, 1 lettera minuscola, 1 carattere speciale ed essere lunga minimo 8 caratteri";
    //             ctrlEr.stylecColor = "red";
    //             return ok;
    //         }
    //         ok = true;
    //     } catch (e) {
    //         alert ("si è verificato un errore" +e);
    //     } finally {
    //         return ok;
    //     }
    // }

    // function conPw() {
    //     ok = true;
    //     try {
    //         ctrlEr = document.getElementById("erConPw");
    //         ctrlEr.textContent ="";

    //         document.getElementById("pass1").style.borderColor="black";
    //         document.getElementById("pass2").style.borderColor="black";

    //         pass1 = document.getElementById("pass1").value;
    //         pass2 = document.getElementById("pass2").value;

    //         if ((pass1!=pass2) || (pass1.trim().length == 0) || (pass2.trim().length == 0)) {
    //             document.getElementById("pass1").style.borderColor="red";
    //             document.getElementById("pass2").style.borderColor="red";

    //             ctrlEr.textContent = "le password non combaciano";
    //             ctrlEr.stylecColor = "red";
    //             ok = false;
    //         }

    //     } catch (e) {
    //         alert ("si è verificato un errore" +e);
    //         ok = false;
    //     } finally {
    //         return ok;
    //     }
        
    // } 
</script>
</body>
</html>