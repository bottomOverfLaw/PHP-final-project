<?php
Class Carrello{

    private int $carrelloId=-1;
    private int $utenteId=-1;
    private int $articoloId=-1;
    private int $qta=-1;
    private float $prezzo=-1.00;


    //carrelloId get and set functions
    public function SetCarrelloId(int $val):void{
    $this->carrelloId=$val;
    }

    public function GetCarrelloId():int{
    return $this->carrelloId;
    }

    //utenteId get and set functions
    public function SetUtenteId(int $val):void{
    $this->utenteId=$val;
    }

    public function GetUtenteId():int{
    return $this->utenteId;
    }

    //articoloId get and set functions
    public function SetArticoloId(int $val):void{
    $this->articoloId=$val;
    }

    public function GetArticoloId():int{
    return $this->articoloId;
    }

    //qta get and set functions
    public function SetQta(int $val):void{
    $this->qta=$val;
    }

    public function GetQta():int{
    return $this->qta;
    }

    //prezzo get and set functions
    public function SetPrezzo(float $val):void{
    $this->prezzo=$val;
    }

    public function GetPrezzo():float{
    return $this->prezzo;
    }

}