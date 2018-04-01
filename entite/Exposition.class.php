<?php

class Exposition {

    private $id;
    private $nom;
    private $lieu;
    private $adresse;
    private $dateDebut;
    private $dateFin;
    private $dateVernissage;

    /**
     * Permet d'initialiser une Exposition
     *
     * @param int $id
     * @param string $nom
     * @param string $lieu
     * @param string $adresse
     * @param date $dateDebut
     * @param date $dateFin
     * @param date $dateVernissage
     * @return self
     */
    public function init( $id, $nom, $lieu, $adresse, $dateDebut, $dateFin, $dateVernissage ) {

        $this->id = $id;
        $this->nom = $nom;
        $this->lieu = $lieu;
        $this->adresse = $adresse;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->dateFin = $dateFin;
        $this->dateVernissage = $dateVernissage;

        return $this;
    }


    /**
     * Exporte l'exposition au format html
     *
     * @return string
     */
    public function exportHtml() {

        $result  = '<div class="expo">' . "\n";
        $result .= '<h2><a href="?indexExpositions=1&amp;id=' . $this->id . '">[' . $this->id . '] : ' . $this->nom . ' - ' . $this->lieu . ' - ' . $this->adresse . '</a></h2>' . "\n";
        $result .= '<p>Date de début : ' . $this->dateDebut . '. ' . ' Date de fin : ' . $this->dateFin . '. Date du vernissage : ' . $this->dateVernissage . "\n";
        $result .= '</div>' . "\n";

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of lieu
     */ 
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set the value of lieu
     *
     * @return  self
     */ 
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of dateVernissage
     */ 
    public function getDateVernissage()
    {
        return $this->dateVernissage;
    }

    /**
     * Set the value of dateVernissage
     *
     * @return  self
     */ 
    public function setDateVernissage($dateVernissage)
    {
        $this->dateVernissage = $dateVernissage;

        return $this;
    }
}

?>