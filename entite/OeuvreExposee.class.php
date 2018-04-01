<?php

class OeuvreExposee {


    private $exposition;
    private $oeuvres = [];

    /**
     * Get the value of exposition
     */ 
    public function getExposition()
    {
        return $this->exposition;
    }

    /**
     * Set the value of exposition
     *
     * @return  self
     */ 
    public function setExposition($exposition)
    {
        $this->exposition = $exposition;

        return $this;
    }

    /**
     * Get the value of oeuvre
     */ 
    public function getOeuvres()
    {
        return $this->oeuvres;
    }

    /**
     * Set the value of oeuvre
     *
     * @return  self
     */ 
    public function setOeuvres(array $oeuvres)
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }
    
}

?>