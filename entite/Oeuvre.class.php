<?php
class Oeuvre {

    private $id;
    private $titre;
    private $annee;
    private $technique;
    private $support;
    private $largeur;
    private $hauteur;
    private $prix;
    private $petiteImage;
    private $grandeImage;

    /**
     * Permet d'initialiser une Oeuvre
     *
     * @param int $id
     * @param string $titre
     * @param int $annee
     * @param string $technique
     * @param string $support
     * @param int $largeur
     * @param int $hauteur
     * @param int $prix
     * @param string $petiteImage
     * @param string $grandeImage
     * @return self
     */
    public function init( $id, $titre, $annee, $technique, $support, $largeur, $hauteur, $prix, $petiteImage, $grandeImage ) {

        $this->id = $id;
        $this->titre = $titre;
        $this->annee = $annee;
        $this->technique = $technique;
        $this->support = $support;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
        $this->prix = $prix;
        $this->petiteImage = $petiteImage;
        $this->grandeImage = $grandeImage;

        return $this;

    }
    
    /**
     * Formate une oeuvre en HTML
     *
     * @return string
     */
    public function exportHtml() {

        $result = '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">' ."\n";
        $result .= '<h3>[' . $this->id . '] ' . $this->titre .' - ' . $this->annee . ' - ' . $this->prix . ' euros</h3>' . "\n";
        $result = $result . '<p>' . $this->technique . ' sur ' . $this->support . ' : ' . $this->largeur . 'cm X ' . $this->hauteur . 'cm</p>' . "\n";
        $result = $result . '<p><img src="images/' . $this->petiteImage . '" height="50" alt="petite_image_'. $this->id. '"></p>' . "\n";
        $result = $result . '<p><img src="images/' . $this->grandeImage . '" height="150" alt="grande_image_'. $this->id. '"></p>' . "\n";
        $result .= '</div>';

        return $result;
    }

    /**
     * Exporte l'oeuvre en une ligne de tableau html
     *
     * @return string
     */
    public function toTableRow() {
        return "<tr id=\"oeuvre-{$this->id}\">
                    <td>
                        <input type=\"checkbox\" class=\"checkthis\" name=\"ids\" value=\"{$this->id}\"/>
                    </td>
                    <td id=\"id-{$this->id}\">{$this->id}</td>
                    <td id=\"titre-{$this->id}\">{$this->titre}</td>
                    <td id=\"annee-{$this->id}\">{$this->annee}</td>
                    <td id=\"technique-{$this->id}\">{$this->technique}</td>
                    <td id=\"support-{$this->id}\">{$this->support}</td>
                    <td id=\"largeur-{$this->id}\">{$this->largeur}</td>
                    <td id=\"hauteur-{$this->id}\">{$this->hauteur}</td>
                    <td id=\"prix-{$this->id}\">{$this->prix}</td>
                    <td><img id=\"petiteImage-{$this->id}\" src=\"images/{$this->getPetiteImage()}\" height=\"20\" alt=\"image_{$this->getGrandeImage()}\"></td>
                    <td><img id=\"grandeImage-{$this->id}\" src=\"images/{$this->getGrandeImage()}\" height=\"20\" alt=\"image_{$this->getGrandeImage()}\"></td>
                    <td style=\"display: flex; justify-content: space-around;\">
                        <p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Editer\">
                            <button id=\"edit-{$this->id}\" class=\"btn-edit btn btn-warning btn-xs\" data-title=\"Editer\" data-toggle=\"modal\" data-target=\"#edit\">
                                <span class=\"glyphicon glyphicon-pencil\"></span>
                            </button>
                        </p>
                        <p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Supprimer\">
                            <button id=\"delete-{$this->id}\" class=\"btn-del btn btn-danger btn-xs\" data-title=\"Supprimer\" data-toggle=\"modal\" data-target=\"#delete\">
                                <span class=\"glyphicon glyphicon-trash\"></span>
                            </button>
                        </p>
                    </td>
                </tr>";
    }

    public function toTableRowWithoutCheckbox()  {
        return "
                    <td id=\"id-{$this->id}\" colspan=\"2\" style=\"text-align: right;\">{$this->id}</td>
                    <td id=\"titre-{$this->id}\">{$this->titre}</td>
                    <td id=\"annee-{$this->id}\">{$this->annee}</td>
                    <td id=\"technique-{$this->id}\">{$this->technique}</td>
                    <td id=\"support-{$this->id}\">{$this->support}</td>
                    <td id=\"largeur-{$this->id}\">{$this->largeur}</td>
                    <td id=\"hauteur-{$this->id}\">{$this->hauteur}</td>
                    <td id=\"prix-{$this->id}\">{$this->prix}</td>
                    <td><img id=\"petiteImage-{$this->id}\" src=\"images/{$this->getPetiteImage()}\" height=\"20\" alt=\"image_{$this->getGrandeImage()}\"></td>
                    <td><img id=\"grandeImage-{$this->id}\" src=\"images/{$this->getGrandeImage()}\" height=\"20\" alt=\"image_{$this->getGrandeImage()}\"></td>
                    <td style=\"display: flex; justify-content: space-around;\">
                        <p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Editer\">
                            <button id=\"edit-{$this->id}\" class=\"btn-edit btn btn-warning btn-xs\" data-title=\"Editer\" data-toggle=\"modal\" data-target=\"#edit\">
                                <span class=\"glyphicon glyphicon-pencil\"></span>
                            </button>
                        </p>
                        <p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Supprimer\">
                            <button id=\"delete-{$this->id}\" class=\"btn-del btn btn-danger btn-xs\" data-title=\"Supprimer\" data-toggle=\"modal\" data-target=\"#delete\">
                                <span class=\"glyphicon glyphicon-trash\"></span>
                            </button>
                        </p>
                    </td>";
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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of technique
     */ 
    public function getTechnique()
    {
        return $this->technique;
    }

    /**
     * Set the value of technique
     *
     * @return  self
     */ 
    public function setTechnique($technique)
    {
        $this->technique = $technique;

        return $this;
    }

    /**
     * Get the value of support
     */ 
    public function getSupport()
    {
        return $this->support;
    }

    /**
     * Set the value of support
     *
     * @return  self
     */ 
    public function setSupport($support)
    {
        $this->support = $support;

        return $this;
    }

    /**
     * Get the value of largeur
     */ 
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set the value of largeur
     *
     * @return  self
     */ 
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get the value of hauteur
     */ 
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * Set the value of hauteur
     *
     * @return  self
     */ 
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of petiteImage
     */ 
    public function getPetiteImage()
    {
        return $this->petiteImage;
    }

    /**
     * Set the value of petiteImage
     *
     * @return  self
     */ 
    public function setPetiteImage($petiteImage)
    {
        $this->petiteImage = $petiteImage;

        return $this;
    }

    /**
     * Get the value of grandeImage
     */ 
    public function getGrandeImage()
    {
        return $this->grandeImage;
    }

    /**
     * Set the value of grandeImage
     *
     * @return  self
     */ 
    public function setGrandeImage($grandeImage)
    {
        $this->grandeImage = $grandeImage;

        return $this;
    }
}
?>