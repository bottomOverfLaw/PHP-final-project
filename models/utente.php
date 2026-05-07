<?php
    class Utente{
        private int $utenteId = -1;

        private string $cognome = "";
        private string $nome = "";
        private string $mail = "";
        private string $tipoUtente = "U";
        private string $telefono = "";
        private string $cap = "";
        private string $provincia = "";
        private string $indirizzo = "";
        private string $u = "";

        static public function SetUtente(string $value):void {
            $this->u = $value;
        }
        public function GetUtente():int {
            return $this->u;
        }   
        
        public function SetUtenteId(string $value):void {
            $this->utenteId = $value;
        }  
        public function GetUtenteId():int {
            return $this->utenteId;
        }   

        public function SetCognome(string $value):void {
            $this->cognome = $value;
        }
        public function GetCognome():string {
            return $this->cognome;
        }   

        public function SetIndirizzo(string $value):void {
            $this->indirizzo = $value;
        }
        public function GetIndirizzo():string {
            return $this->indirizzo;
        }   

        public function SetProvincia(string $value):void {
            $this->provincia = $value;
        }
        public function GetProvincia():string {
            return $this->provincia;
        }  

        public function SetCap(string $value):void {
            $this->cap = $value;
        }
        public function GetCap():string {
            return $this->cap;
        }   

        public function SetNome(string $value):void {
            $this->nome = $value;
        }
        public function GetNome():string {
            return $this->nome;
        }   

        public function SetMail(string $value):void {
            $this->mail = $value;
        }
        public function GetMail():string {
            return $this->mail;
        }   

        public function SetTipoUtente(string $value):void {
            $this->tipoUtente = $value;
        }
        public function GetTipoUtente():string {
            return $this->tipoUtente;
        }   

        public function SetTelefono(string $value):void {
            $this->telefono = $value;
        }
        public function GetTelefono():string {
            return $this->telefono;
        }   

        
    }