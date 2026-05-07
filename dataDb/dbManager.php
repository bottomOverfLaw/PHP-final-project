<?php

    interface IDbManager {
        public function OpenConnection():?PDO;
        public function CloseConnection():void;
        public function IsConnected():bool;
        public function Delete(string $sql, ?array $ar = null):bool;
        public function Insert(string $sql, ?array $ar = null):bool;
        public function Update(string $sql, ?array $ar = null):bool;
        public function Select(string $sql, ?array $ar = null):?array;
    }
    
    class DbManager implements IDbManager{
        private ?PDO $conn = null;

        public function OpenConnection():?PDO {
            if($this->conn!=null) return null;
            //$this->conn = null;
            // $_SESSION["DbName"]="catalogo23_5cat";
            //$_SESSION["DbHost"]="localhost";
            $c=strtolower($_SESSION["DbType"]).":host=".$_SESSION["DbHost"].";";
            $c.="dbname=".$_SESSION["DbName"];
            //echo $c."<br>";

            try {
                $conn=new PDO($c,$_SESSION["DbUser"],$_SESSION["DbPw"]);

                $this->conn=$conn;
                return $conn;
            } catch (Exception $e) {
                //return null;
                die("Connessione al db non riuscita :'( " .$e->getMessage());
            }
        }

        public function CloseConnection():void {
            $this->conn = null;
        }

        public function IsConnected():bool {
            return $this->conn!=null ? true : false;
        }

        public function Delete(string $sql, ?array $ar = null):bool {

            $con = $this->OpenConnection();
            if ($con == null) 
                return false;
            try {
                $con->beginTransaction();
                if($ar==null || count($ar)==0) {
                    $con->exec($sql);
                }else {
                    $st=$con->prepare($sql);
                    $st->execute($ar);
                }
                //$nRecord = $con.exec($sql);
                $con->commit();
                return true;
            } catch (Exception $e) {
                if ($con != null && $con->inTransaction()) 
                    $con->rollBack();
                die("Eleminazione dati non riuscita [Delete]: " .$e->getMessage());
            } finally {
                $this->CloseConnection();
            }
        }

        public function Insert(string $sql, ?array $ar = null):bool {
            $con = $this->OpenConnection();
            if ($con == null) 
                return false;
            try {
                $con->beginTransaction();
                //$nRecord = $con.exec($sql);
                if($ar==null || count($ar)==0) {
                    $con->exec($sql);
                }else {
                    $st=$con->prepare($sql);
                    $st->execute($ar);
                }
                $con->commit();
                return true;
            } catch (Exception $e) {
                if ($con != null && $con->inTransaction()) 
                    $con->rollBack();
                die("Inserimento dati non riuscito [Insert]: " .$e->getMessage());
            } finally {
                $this->CloseConnection();
            }
        }

        public function Update(string $sql, ?array $ar = null):bool{
            $con = $this->OpenConnection();
            if ($con == null) 
                return false;
            try {
                $con->beginTransaction();
                //$nRecord = $con.exec($sql);
                if($ar==null || count($ar)==0) {
                    $con->exec($sql);
                }else {
                    $st=$con->prepare($sql);
                    $st->execute($ar);
                }
                $con->commit();
                return true;
            } catch (Exception $e) {
                if ($con != null && $con->inTransaction()) 
                    $con->rollBack();
                die("Update dati non riuscito [Update]: " .$e->getMessage());
            } finally {
                $this->CloseConnection();
            }
        }

        public function Select(string $sql, ?array $ar = null):?array{
            $rows = null;
            $con = $this->OpenConnection();
            if ($con == null) 
                return $rows;
            try {
                if($ar==null || count($ar)==0) {
                    $st = $con->query($sql);
                }else {
                    $st=$con->prepare($sql);
                    $st->execute($ar);
                }
                $rows = $st->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            } catch (Exception $e) {
                die("Select dati non riuscito [Select]: " .$e->getMessage());
            } finally {
                $this->CloseConnection();
            }
        }
    }

