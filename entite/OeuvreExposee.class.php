<?php

class OeuvreExposee {


    private $exposition;
    private $oeuvres = [];

    public function addOeuvre( $oeuvre ) {

        $this->oeuvres [] = $oeuvre;

        return $this;
    }

    /**
     * Permet de formater une Oeuvre Exposée au format HTML 
     *
     * @return string
     */
    public function exportHtml() {

        if(is_null($this->exposition) or is_null($this->oeuvres) or empty($this->oevures)) {
            return "<h3>Il n'y a aucune oeuvre pour cette exposition pour le moment.</h3>\n";
        }

        $html = $this->exposition->exportHtml(). "\n";
        foreach ( $this->oeuvres as $oeuvre ) {
            $html .= $oeuvre->exportHtml(). "\n";
        }

        return $html;
    }

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