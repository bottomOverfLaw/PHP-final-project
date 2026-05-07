<?php 
require_once(Common::$PathModels."carrello.php");
 class DbCarrello extends DbRepository {

    public function AddC(Carrello $cart):bool {
        //var_dump($cart);    
        try{
                if($cart->GetArticoloId()!=-1){
                    $data['articoloId']=$cart->GetArticoloId();
                }
                if($cart->GetutenteId()!=-1){
                    $data['UtenteId']=$cart->GetUtenteId();
                }
                if($cart->Getprezzo()!=-1){
                    $data['prezzo']=$cart->GetPrezzo();
                }
                if($cart->GetQta()!=-1){
                    $data['qta']=$cart->GetQta();
                }
                //echo "*********************************<br>";
                
                $i = 1;
                $colPart = '';
                $valPart = '';
                foreach ($data as $key => $value) {
                    if(count($data)>$i){
                        $colSegment =  $key.", " ;
                        $valSegment = ':'.$key.', ';
                    }else{
                        $colSegment =  $key ;
                        $valSegment = ':'.$key;
                    }
                    $i++;
                    $colPart .= $colSegment;
                    $valPart .= $valSegment;
                }
                
                $sql = "INSERT INTO Carrello ";
                $sql .= '('.$colPart.')';
                $sql .= ' VALUES ('.$valPart.');';
                //echo $sql;
    
                parent::Insert($sql, $data);
                return true;
            }catch(Exception $e){
                die('add to cart failed'.$e->getMessage());
                return false;
            }
    }

    public function RemoveOC(int $cartId):bool{
        try{
            $sql="delete from carrello where carrelloId = $cartId;"; 
            //var_dump($sql);
            $conn = parent::OpenConnection();
            $st=$conn->prepare($sql);
            $st->execute();
            return true;
        }catch(Exception $e){
            die('Ops... il remove non ha funzionato'.$e->getMessage());
            return false;
        } finally {parent::CloseConnection();}
    }

    public function DeleteC(string $u):bool{
        try{
            $sql="DELETE FROM carrello WHERE UtenteId=$u;";
            //var_dump($sql);
            $conn = parent::OpenConnection();
            $st=$conn->prepare($sql);
            $st->execute();
            return true;
        }catch(Exception $e){
            die('Ops... il delete non ha funzionato'.$e->getMessage());
            return false;
        }finally{parent::CloseConnection();}
    }

    public function UpdateQtaC(int $qta, int $cartId):bool {
        try {
            $uSql="UPDATE Carrello SET carrello.qta = $qta WHERE carrello.carrelloId= $cartId;";
            parent::Update($uSql);
            return true;
        } catch (Exception $e) {
            throw "Ops, quanlcosa non è andato nell'update".$e;
            return false;
        }
    } 

    public function ReturnC(int $userId):?array {
        try {
            $rows=array();
            $q=" SELECT * FROM carrello WHERE utenteId = $userId";
            $rows= parent::Select($q); //torna array
            return $rows;

        } catch (Exception $e) {
            throw "Ops, quanlcosa non è andato nel return".$e;
            return $rows=array();
        }
    }


 }