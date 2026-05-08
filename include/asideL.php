
<button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
 | | |
</button>
<br>
<br>
<br>
<img src="https://cdni.iconscout.com/illustration/premium/thumb/ecommerce-shopping-website-2162029-1819865.png"
                  class="img-fluid" alt="Sample image">
<img src="https://www.pngmart.com/files/11/E-Commerce-PNG-Free-Download.png"
                  class="img-fluid" alt="Sample image">
<img src="https://www.pngarts.com/files/16/E-Commerce-Transparent.png"
                  class="img-fluid" alt="Sample image">
<img src="https://www.pngarts.com/files/16/E-Commerce-PNG-Photo.png"
                  class="img-fluid" alt="Sample image">
<div class="offcanvas offcanvas-start " style="background-color: #FDA769;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" >
    <div>
    <?php
        if ($_SESSION["TipoUtente"]!="U") {
        ?>
        <!-- <button type="button" class="btn btn-outline-success"><a href="..\utenti\gestioneUtente.php" class="link-dark">Utenti</a></button> -->
        <button type="button" class="btn btn-outline-danger btn-lg"><a href="/final_project/views/login.php" class="link-dark link-underline-opacity-0">Login</a></button>
        <br>
        <button type="button" class="btn btn-outline-danger btn-lg"><a href="/final_project/views/newUtente.php" class="link-dark link-underline-opacity-0">Iscriviti</></button>
        <br>
        <?php
        }
        require_once(Common::$PathDataDb."dbUtente.php");
        $db = new DbUtente();
        if ($_SESSION["TipoUtente"]!="G") {
        ?>
        <button type="button" class="btn btn-outline-danger btn-lg"><a href="/final_project/views/logout.php" class="link-dark link-underline-opacity-0">Logout</a></button>
        <br>
        <button type="button" class="btn btn-outline-danger btn-lg"><a href="/final_project/views/changeData.php" class="link-dark link-underline-opacity-0">Cambia i tuoi dati</a></button>
        <br>
        <button type="button" class="btn btn-outline-danger btn-lg"><a href="/final_project/views/changePw.php" class="link-dark link-underline-opacity-0">Cambia la password</a></button>
        <br>
        <?php
         
         }
        ?>
        <button type="button" class="btn btn-outline-danger btn-lg"><a href="/final_project/utility/help.php" class="link-dark link-underline-opacity-0">Need help?</a></button>
        <br>
        <img src="https://assets.website-files.com/6364b6fd26e298b11fb9391f/6364b6fd26e298cf3bb93c3f_6309fc4305a883fc64b964cc_DrawKit0041_E-commerce_and_Online_Shopping_Banner.png"
                  class="img-fluid" alt="Sample image">
        <img src="https://www.pngmart.com/files/11/E-Commerce-PNG-Image.png"
                  class="img-fluid" alt="Sample image">
        <!-- <button type="button" class="btn btn-outline-success"><a href="..\login\login.php" class="link-dark">Login</a></button> -->
    </div>
  </div>
</div>