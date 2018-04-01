<?php

class OeuvreExposee {


    private $exposition;
    private $oeuvres = [];

    /**
     * Permet de formater une Oeuvre Exposée au format HTML 
     *
     * @return string
     */
    public function exportHtml() {

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