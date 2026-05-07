<?php

Class Printer {

    public string $functionName;
    public string $functionType;

    static function Print(string $varName, string $varType){

        echo "//$varName get and set functions<br>";
        echo "public function Set".ucfirst($varName)."(".$varType.' $val):void{<br>';
        echo "    \$this->$varName=\$val;<br>}";
        echo "<br><br>";
        echo "public function Get".ucfirst($varName).'():'.$varType.'{<br>';
        echo '    return $this->'.$varName.';<br>}<br><br>';

    }

    static function PrintGetSet(string $string){
        
        $exB=explode( "/",$string);

        for($i=0; $i<count($exB); $i++){
            $ex=explode(" ",trim($exB[$i]));

            $valType=$ex[0];
            unset($ex[0]);
            foreach ($ex as $item) {
                Printer::Print(trim($item),$valType);
            }
        }
    }

    static function PrintVarDef(string $string){
        
        $exB=explode( "/",$string);
        echo "<br>";
        for($i=0; $i<count($exB); $i++){
            $ex=explode(" ",trim($exB[$i]));

            $valType=$ex[0];
            unset($ex[0]);
            foreach ($ex as $item) {
                echo "private $valType \$$item;<br>";
            }
        }
        echo "<br>";
    }

    static function PrintConstruct(string $string){

        $exB=explode( "/",$string);
        echo "<br>function __construct(){<br>";
        for($i=0; $i<count($exB); $i++){
            $ex=explode(" ",trim($exB[$i]));

            $valType=$ex[0];
            unset($ex[0]);
            foreach ($ex as $item) {
                echo "\$this->$item=null<br>";
            }
        }
        echo "}<br><br>";
    }   


    static function PrintSimpleClass(string $varNames, string $nomeClasse="NONAME"){

        $nomeClasse=ucfirst(trim($nomeClasse));
        echo "Class $nomeClasse{<br>//NB NEL COSTRUTTORE IMPOSTARE I VALORI PRIMA DI USARE";

            self::PrintVarDef($varNames);
            self::PrintConstruct($varNames);
            self::PrintGetSet($varNames);

        echo "}";
    }
}
?>

<form action="printer.php" method="post">
    <input type="text" name="input" placeholder="nome classe">
    <input type="text-area" name='input1' placeholder="crea proprieta">
    <button type="submit" name="submit">crea</button>
</form>


<?php

if(isset($_POST['submit'])){
    PRINTER::PrintSimpleClass($_POST['input1'],$_POST['input']);
}




