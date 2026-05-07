<?php
    require_once(".." .DIRECTORY_SEPARATOR."common.php");
    //echo "Logged out successfully";
    
    Common::Logout();

    header("Location: ../home/index.php");
