<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- BootstrapVue -->
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
    <!-- FontAwesome icons -->
    <script src="https://kit.fontawesome.com/6ec9c7cfba.js" crossorigin="anonymous"></script>
    <title>Cambio dati</title>
    <style>
        /* Highlights required fields label in red */
        .controlloObbligatorio {
          color: red;
        }
        /* Highlight input on focus */
        .ctrlinput:focus {
          background-color: antiquewhite;
        }
        /* Red border if input fails validation */
        .ctrlinput:invalid {
          border-color: red;
        }
        /* Green border if input passes validation */
        .ctrlinput:valid {
          border-color: green;
        } 

        /* Set an img as background */
        body {
          background-image: url('../Images/draw1.webp');
          background-size: cover;        /* stretches to fill the screen */
          background-position: center;   /* centres the image */
          background-repeat: no-repeat;  /* no tiling */
          background-attachment: fixed;  /* stays still while scrolling */
        }
        body::before {
          content: '';
          position: fixed;
          inset: 0;
          background: rgba(0, 0, 0, 0.4); /* dark tint — adjust 0.4 to taste */
          z-index: 0;
        }
        form {
          position: relative;
          z-index: 1;
        }
    </style>
</head>
<body>

    <?php
        // --- Dependencies ---
        require_once(".." . DIRECTORY_SEPARATOR . "common.php");
        require_once(Common::$PathDataDb . "dbUtente.php");
        require_once(Common::$PathModels . "utente.php");

        // --- DB handler ---
        $db = new DbUtente();
        $u  = new Utente();

        // Fetch current user data to pre-fill the form
        $rows = $db->SelectU(Common::GetUserId());
        foreach ($rows as $row => $value) {
            $uId  = $value["UtenteId"];
            $uN   = $value["Nome"];
            $uM   = $value["Mail"];
            $uC   = $value["Cognome"];
            $uT   = $value["Telefono"];
            $uCap = $value["Cap"];
            $uI   = $value["Indirizzo"];
            $uP   = $value["Provincia"];
        ?>

            <!-- User data edit form — submits to changeData.php -->
            <form action="changeData.php" method="post">

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="nome" name="nome"
                               placeholder="Enter name" value="<?= $uN ?>">
                        <label class="form-label">Name <span class="controlloObbligatorio">*</span></label>
                        <div id="erNome"></div>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="cognome" name="cognome"
                               placeholder="Enter surname" value="<?= $uC ?>"> 
                        <label class="form-label ">Surname <span class="controlloObbligatorio">*</span></label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="mail" name="mail"
                               placeholder="Enter a valid mail" value="<?= $uM ?>">
                        <label class="form-label ">Mail <span class="controlloObbligatorio">*</span></label>
                        <div id="erMail"></div>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-phone-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="tel" name="tel"
                               placeholder="Enter phone number" maxlength="50" value="<?= $uT ?>">
                        <label class="form-label">Phone</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-map-pin fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="cap" name="cap"
                               placeholder="Enter postal code" maxlength="5" value="<?= $uCap ?>">
                        <label class="form-label">Postal Code</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-home fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="indirizzo" name="indirizzo"
                               placeholder="Enter address" maxlength="50" value="<?= $uI ?>">
                        <label class="form-label">Address</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="far fa-map fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input class="form-control ctrlinput" type="text" id="provincia" name="provincia"
                               placeholder="Enter district" maxlength="3" value="<?= $uP ?>">
                        <label class="form-label">District</label>
                    </div>
                </div>

        <?php } ?>

                <!-- Action buttons -->
                <div class="d-flex justify-content-center gap-2 mx-4 mb-3 mb-lg-4">
                    <!-- Submit changes -->
                    <button class="btn btn-primary" type="submit" value="btnSub" name="btnSub">
                        Change data
                    </button>
                    <!-- Go back without saving — browser history back -->
                    <a href="javascript:history.back()" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Cancel
                    </a>
                </div>

            </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    // --- Validates the Nome field ---
    function convalidaNome() {
        ok = true;
        try { 
            ctrlEr = document.getElementById("erNome");
            ctrlEr.textContent = "";

            ctrl = document.getElementById("nome");
            ctrl.style.borderColor = "black";

            n = ctrl.value;
            regEx = /(?=^.{3,25}$)[A-Za-z0-9]/g;

            if (regEx.test(n)) return ok;

            ok = false;
            ctrl.style.borderColor = "red";
            ctrlEr.textContent = "inserire nome valido";
            ctrlEr.style.color = "red";
        } catch(e) {
            alert("si è verificato un errore" + e);
            ok = false;
        } finally {
            return ok;
        }
    }

    // --- Validates the Mail field ---
    // Must match standard email format (x@x.x)
    function convalidaMail() {
        ok = true;
        try {
            ctrlEr = document.getElementById("erMail");
            ctrlEr.textContent = "";

            ctrl = document.getElementById("mail");
            ctrl.style.borderColor = "black";

            m = ctrl.value;
            mRegEx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (mRegEx.test(m)) return ok;

            ok = false;
            ctrl.style.borderColor = "red";
            ctrlEr.textContent = "enter valid mail";
            ctrlEr.style.color = "red";
        } catch (e) {
            alert("si è verificato un errore" + e);
            ok = false;
        } finally {
            return ok;
        }
    }

</script>
</body>
</html>