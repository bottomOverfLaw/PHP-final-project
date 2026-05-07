<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>plz buy my site asap, i'm poor af</title> -->
    <title>Law's commerce</title>
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
</head>
<body >
    <div class="container-fluid" >
        <?php
            require_once(".." .DIRECTORY_SEPARATOR."common.php");
            require_once(Common::$PathInclude."header.php");
        ?>
    </div>
    <div class="container-fluid">
        <main class="row d-flex">
            <aside id="asideL" class="col-sm-2 p-2 text-dark" style="background-color: #FFBC80;">
                <?php
                    require_once(".." .DIRECTORY_SEPARATOR."common.php");
                    require_once(Common::$PathInclude."asideL.php");
                ?>
            </aside>
            <div class="col-sm-8" style="background-color: #F2B6A0;">
                <?php
                require_once("$c");
                ?>
            </div>
            <aside id="asideR" class="col-sm-2 p-2 text-dark" style="background-color: #F2B6A0;">
            <p></p>
            </aside> 
    </main>
    </div>
    <div class="continer-fluid mt-auto " style="background-color:#FFE7D5;">
        <?php
            require_once(".." .DIRECTORY_SEPARATOR."common.php");
            require_once(Common::$PathInclude."footer.php");
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<!-- style="bottom: 0;" -->