<?php
//Dopo la classe la parte di script che viene eseguito sempre

class Common
{
    static public string $PathModels = "";
    static public string $PathViews = "";
    static public string $PathDataDb = "";
    static public string $PathInclude = "";

    static public function InitPaths() {
        self::$PathModels  = __DIR__ . DIRECTORY_SEPARATOR . "models"   . DIRECTORY_SEPARATOR;
        self::$PathViews   = __DIR__ . DIRECTORY_SEPARATOR . "views"    . DIRECTORY_SEPARATOR;
        self::$PathDataDb  = __DIR__ . DIRECTORY_SEPARATOR . "dataDb"   . DIRECTORY_SEPARATOR;
        self::$PathInclude = __DIR__ . DIRECTORY_SEPARATOR . "include"  . DIRECTORY_SEPARATOR;

    }
    static public function SetSession()
    {
        if(session_status()!= PHP_SESSION_ACTIVE)
            session_start();
        Common::ReadFileConfig();   
        if(isset($_SESSION["TipoUtente"])) 
            return;         
        
        $_SESSION["TipoUtente"]="G";
    }

    static public function ReadFileConfig()
    {
        $fileConfig = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . "config.ini");

        $_SESSION["DbType"]=$fileConfig["DbType"]; //MySql
        $_SESSION["DbHost"]=$fileConfig["DbHost"];//"localhost";
        $_SESSION["DbName"]=$fileConfig["DbName"];//"tss_catalogo23_5cat";
        $_SESSION["DbUser"]=$fileConfig["DbUser"];//"root";
        $_SESSION["DbPw"]=$fileConfig["DbPw"];//"qwerty.1";
    }

    static public function Logout() {
        if(session_start() != PHP_SESSION_ACTIVE)
        {
            session_start();
        } else {
            $_SESSION=[];
        session_unset();
        session_destroy();

        }
        
        Common::SetSession();
    }

    static public function SetUserId(int $id) {
        $_SESSION["UtenteId"]=$id;
    }
    static public function GetUserId():int {
        return $_SESSION["UtenteId"];
    }

    static public function SetUserName(string $name) {
        $_SESSION["Nome"]=$name;
    }
    static public function GetUserName():string {
        return $_SESSION["Nome"];
    }

    static public function SetUserType(string $type) {
        $_SESSION["TipoUtente"]=$type;
    }
    static public function GetUserType():string {
        return $_SESSION["TipoUtente"];
    }

    static public function SetUserMail(string $mail) {
        $_SESSION["Mail"]=$mail;
    }
    static public function GetUserMail():string {
        return $_SESSION["Mail"];
    }
}
Common::InitPaths(); // initialize paths first
Common::SetSession();
require_once(Common::$PathDataDb."dbManager.php");
require_once(Common::$PathDataDb."dbRepository.php");

