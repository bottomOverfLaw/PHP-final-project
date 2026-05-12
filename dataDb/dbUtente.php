<?php
require_once(Common::$PathModels."utente.php");
class DbUtente extends DbRepository
{
    //convalida della password con php
    private function convalidaPassword(string $password):?bool{

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $special = preg_match('@[\W]@', $password);
        
        if(!$uppercase || !$lowercase || !$number || !$special || strlen($password) < 8)
            throw new Exception("Errore password");
            
        return true;
    }
    //controllo che pw1 e pw2 siano uguali con php
    private function controllaPw(string $conPw, string $password):?bool {
        $this->convalidaPassword($password);
        if($conPw != $password)
            throw new Exception("Errore: le password non combaciano");
        return true;
    }
    //convalida della mail con php
    private function convalidaMail(string $mail):?bool {   

        $reg="^[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,}^";
        $ok= preg_match($reg,$mail);
        //var_dump($ok);
        if($ok==1) {return true;}
        else{return false;}
        //return true; //TODO: implementa
    }
    //controllo che la mail non esista già con php
    public function MailExist(string $email):?bool  {
        $sql= "SELECT UtenteId FROM Utenti WHERE utenti.mail= :mail;";

        $ar["mail"]=$email;

        $rows=parent::Select($sql,$ar);
        if($rows!=null && count($rows)>0)
            return true;
        
        return false;
    }

    public function Register(Utente $utente, string $password, string $conPw) {
        try
        {
            
            $ok = $this->convalidaPassword($password);
            if(!$ok)
                throw new Exception("Errore: la password non soddisfa i criteri richiesti");
            
            $ok = $this->controllaPw($conPw, $password);
            if(!$ok)
                throw new Exception("Errore: la password non combaciano i criteri richiesti");

            $ok = $this->convalidaMail($utente-> GetMail()); //var_dump($ok);
            if($ok==false)
                throw new Exception("Errore: l'indirizzo mail non soddisfa i criteri richiesti");

            $ok = $this->MailExist($utente->GetMail());
            if($ok)
                throw new Exception("Errore: l'indirizzo mail esiste");

            
            $sql = "INSERT INTO utenti";
            $sql .="(Nome, Mail, Telefono, TipoUtente, Password)";
            $sql .="VALUES (";
            $sql .=":nome, :mail, :telefono,'U', :password";
            $sql .= ");";

            $data["nome"] = $utente-> GetNome();
            $data["mail"] = $utente-> GetMail();
            $data["telefono"] = $utente-> GetTelefono();
            $p = password_hash($password, PASSWORD_DEFAULT);
            $data["password"] = $p;

            parent::Insert($sql,$data);

        } catch (Exception $e) {
            die("".$e->getMessage());
        } finally {
            parent::CloseConnection();
        }
    }
    //funzione di login
    public function Login(string $mail, string $pw) {
        $sql = "SELECT * FROM Utenti WHERE mail= :mail;";
        $ar ["mail"]=$mail;

        $rows=parent::Select($sql,$ar);
        //var_dump($rows);
        if($rows==null || count($rows)==0){return false;}
            
        
        $ok = password_verify($pw, $rows[0]["Password"]);
        //var_dump($ok);
        if(!$ok) {
            return false;
        } else {
            Common::SetUserId($rows[0]["UtenteId"]);
            Common::SetUserName($rows[0]["Nome"]);
            Common::SetUserType($rows[0]["TipoUtente"]);
            //Common::SetUserMail($rows[0]["Mail"]);
            return true;
        }

    }
    
    public function Logout() {
       Common::Logout();
    }
//funzione di aggiornamento password
    public function UpdatePw(string $mail, string $oldPw, string $newPw):bool {

        try {
            $ok = $this->convalidaPassword($newPw);
        if(!$ok)
            throw new Exception("Errore: la password nuova non soddisfa i criteri richiesti");
        
        $ok = $this->convalidaPassword($oldPw);
        if(!$ok)
            throw new Exception("Errore: la password vecchia non soddisfa i criteri richiesti");

        $ok = $this->convalidaMail($mail); 
        if($ok==false)
            throw new Exception("Errore: l'indirizzo mail non soddisfa i criteri richiesti");

        $sql = "SELECT Password FROM Utenti WHERE mail= :mail;";
        $data["mail"]=$mail;

        $rows= parent::Select($sql,$data);
        $pw= $rows[0]["Password"];
        $k = password_verify($oldPw,$pw); 
        //var_dump($rows);
        if($k==true) {
            $uSql="UPDATE Utenti SET utenti.Password = :password WHERE utenti.mail= :mail;";
            $pwnewc = password_hash($newPw, PASSWORD_DEFAULT);
            $data["mail"]=$mail;
            $data["password"]=$pwnewc;
            parent::Update($uSql,$data);
            return true;
        } else {
            return false;
        }
        } catch (Exception $e) {
            throw "C'è stato un problema: ".$e;
        }
    }
//funzione aggiornamento dati
public function UpdateData(Utente $u):bool {
    try{
        $uSql="UPDATE Utenti SET utenti.Mail = :mail , utenti.Nome= :nome , utenti.cognome= :cognome, utenti.Telefono= :telefono, utenti.indirizzo= :indirizzo, utenti.cap = :cap, utenti.provincia = :provincia WHERE utenti.mail= :mail;";
        
        $data["mail"]=$u->GetMail();
        $data["nome"]=$u->GetNome();
        $data["cognome"]=$u->GetCognome();
        $data["telefono"]=$u->GetTelefono();
        $data["cap"]=$u->GetCap();
        $data["indirizzo"]=$u->GetIndirizzo();
        $data["provincia"]=$u->GetProvincia();

        parent::Update($uSql,$data);

        return true;
    } catch (Exception $e) {
        throw $e;
    }
}

    public function SelectU(int $userId):?array {
        try {
            $rows=array();
            $q=" SELECT * FROM utenti WHERE utenteId = $userId";
            $rows= parent::Select($q); //torna array
            return $rows;

        } catch (Exception $e) {
            throw "Ops, quanlcosa non è andato nel select".$e;
            return $rows=array();
        }
    }


}
?>