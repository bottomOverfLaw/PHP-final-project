<?php
    Class Prodotto{
        //NB NEL COSTRUTTORE IMPOSTARE I VALORI PRIMA DI USARE
        private int $prodottoId=-1;
        private int $produttoreId=-1;
        private int $categoriaId=-1;
        private int $attivo=-1;
        private string $prodotto="";
        private string $descrizione="";
        private string $unitaMisura="";
        private string $nomeImmagine="";
        private float $prezzo=-1.00;
        
        //prodottoId get and set functions
        public function SetProdottoId(int $val):void{
        $this->prodottoId=$val;
        }
        
        public function GetProdottoId():int{
        return $this->prodottoId;
        }
        
        //produttoreId get and set functions
        public function SetProduttoreId(int $val):void{
        $this->produttoreId=$val;
        }
        
        public function GetProduttoreId():int{
        return $this->produttoreId;
        }
        
        //categoriaId get and set functions
        public function SetCategoriaId(int $val):void{
        $this->categoriaId=$val;
        }
        
        public function GetCategoriaId():int{
        return $this->categoriaId;
        }
        
        //attivo get and set functions
        public function SetAttivo(int $val):void{
        $this->attivo=$val;
        }
        
        public function GetAttivo():int{
        return $this->attivo;
        }
        
        //prodotto get and set functions
        public function SetProdotto(string $val):void{
        $this->prodotto=$val;
        }
        
        public function GetProdotto():string{
        return $this->prodotto;
        }
        
        //descrizione get and set functions
        public function SetDescrizione(string $val):void{
        $this->descrizione=$val;
        }
        
        public function GetDescrizione():string{
        return $this->descrizione;
        }
        
        //unitaMisura get and set functions
        public function SetUnitaMisura(string $val):void{
        $this->unitaMisura=$val;
        }
        
        public function GetUnitaMisura():string{
        return $this->unitaMisura;
        }
        
        //nomeImmagine get and set functions
        public function SetNomeImmagine(string $val):void{
        $this->nomeImmagine=$val;
        }
        
        public function GetNomeImmagine():string{
        return $this->nomeImmagine;
        }
        
        //prezzo get and set functions
        public function SetPrezzo(float $val):void{
        $this->prezzo=$val;
        }
        
        public function GetPrezzo():float{
        return $this->prezzo;
        }
        
    }