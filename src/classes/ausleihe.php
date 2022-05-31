<?php

class Ausleihe {
    private $BuchID;
    private $KundeID;
    private $Rueckgabe;

    function __construct($BuchID,$KundeID,$Rueckgabe) {
        $this->$BuchID = $BuchID;
        $this->$KundeID = $KundeID;
        $this->$Rueckgabe = $Rueckgabe;
    }
    
        
    

    /**
     * Get the value of BuchID
     */
    public function getBuchID()
    {
        return $this->BuchID;
    }

    /**
     * Set the value of BuchID
     */
    public function setBuchID($BuchID): self
    {
        $this->BuchID = $BuchID;

        return $this;
    }

    /**
     * Get the value of KundeID
     */
    public function getKundeID()
    {
        return $this->KundeID;
    }

    /**
     * Set the value of KundeID
     */
    public function setKundeID($KundeID): self
    {
        $this->KundeID = $KundeID;

        return $this;
    }

    /**
     * Get the value of Rueckgabe
     */
    public function getRueckgabe()
    {
        return $this->Rueckgabe;
    }

    /**
     * Set the value of Rueckgabe
     */
    public function setRueckgabe($Rueckgabe): self
    {
        $this->Rueckgabe = $Rueckgabe;

        return $this;
    }
}