<?php

class Buch
{

  private $BuchID;
  private $Titel;
  private $ISBN;
  private $Seitenzahl;
  private $Erschienen;
  private $Beschreibung;
  private $LagerplatzID;
  private $VerlagID;
  private $Stockwerksnummer;
  private $Regalnummer;
  private $Regalfach;
  private $Verlag;
  private $Autoren;
  private $Genres;


  function __construct($bookValuesAsArray) 
  {
    $this->BuchID = $bookValuesAsArray["BuchID"];
    $this->Titel = $bookValuesAsArray["Titel"];
    $this->ISBN = $bookValuesAsArray["ISBN"];
    $this->Seitenzahl = $bookValuesAsArray["Seitenzahl"];
    $this->Erschienen = $bookValuesAsArray["Erschienen"];
    $this->Beschreibung = $bookValuesAsArray["Beschreibung"];
    $this->LagerplatzID = $bookValuesAsArray["LagerplatzID"];
    $this->VerlagID = $bookValuesAsArray["VerlagID"];      
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
   * Get the value of Titel
   */
  public function getTitel()
  {
    return $this->Titel;
  }

  /**
   * Set the value of Titel
   */
  public function setTitel($Titel): self
  {
    $this->Titel = $Titel;

    return $this;
  }

  /**
   * Get the value of ISBN
   */
  public function getISBN()
  {
    return $this->ISBN;
  }

  /**
   * Set the value of ISBN
   */
  public function setISBN($ISBN): self
  {
    $this->ISBN = $ISBN;

    return $this;
  }

  /**
   * Get the value of Seitenzahl
   */
  public function getSeitenzahl()
  {
    return $this->Seitenzahl;
  }

  /**
   * Set the value of Seitenzahl
   */
  public function setSeitenzahl($Seitenzahl): self
  {
    $this->Seitenzahl = $Seitenzahl;

    return $this;
  }

  /**
   * Get the value of Erschienen
   */
  public function getErschienen()
  {
    return $this->Erschienen;
  }

  /**
   * Set the value of Erschienen
   */
  public function setErschienen($Erschienen): self
  {
    $this->Erschienen = $Erschienen;

    return $this;
  }

  /**
   * Get the value of Beschreibung
   */
  public function getBeschreibung()
  {
    return $this->Beschreibung;
  }

  /**
   * Set the value of Beschreibung
   */
  public function setBeschreibung($Beschreibung): self
  {
    $this->Beschreibung = $Beschreibung;

    return $this;
  }

  /**
   * Get the value of LagerplatzID
   */
  public function getLagerplatzID()
  {
    return $this->LagerplatzID;
  }

  /**
   * Set the value of LagerplatzID
   */
  public function setLagerplatzID($LagerplatzID): self
  {
    $this->LagerplatzID = $LagerplatzID;

    return $this;
  }

  /**
   * Get the value of VerlagID
   */
  public function getVerlagID()
  {
    return $this->VerlagID;
  }

  /**
   * Set the value of VerlagID
   */
  public function setVerlagID($VerlagID): self
  {
    $this->VerlagID = $VerlagID;

    return $this;
  }

  /**
   * Get the value of Stockwerksnummer
   */
  public function getStockwerksnummer()
  {
    return $this->Stockwerksnummer;
  }

  /**
   * Set the value of Stockwerksnummer
   */
  public function setStockwerksnummer($Stockwerksnummer): self
  {
    $this->Stockwerksnummer = $Stockwerksnummer;

    return $this;
  }

  /**
   * Get the value of Regalnummer
   */
  public function getRegalnummer()
  {
    return $this->Regalnummer;
  }

  /**
   * Set the value of Regalnummer
   */
  public function setRegalnummer($Regalnummer): self
  {
    $this->Regalnummer = $Regalnummer;

    return $this;
  }

  /**
   * Get the value of Regalfach
   */
  public function getRegalfach()
  {
    return $this->Regalfach;
  }

  /**
   * Set the value of Regalfach
   */
  public function setRegalfach($Regalfach): self
  {
    $this->Regalfach = $Regalfach;

    return $this;
  }

  /**
   * Get the value of Verlag
   */
  public function getVerlag()
  {
    return $this->Verlag;
  }

  /**
   * Set the value of Verlag
   */
  public function setVerlag($Verlag): self
  {
    $this->Verlag = $Verlag;

    return $this;
  }

  /**
   * Get the value of Autoren
   */
  public function getAutoren()
  {
    return $this->Autoren;
  }

  /**
   * Set the value of Autoren
   */
  public function setAutoren($Autoren): self
  {
    $this->Autoren = $Autoren;

    return $this;
  }

  /**
   * Get the value of Genres
   */
  public function getGenres()
  {
    return $this->Genres;
  }

  /**
   * Set the value of Genres
   */
  public function setGenres($Genres): self
  {
    $this->Genres = $Genres;

    return $this;
  }
}