<?php

namespace Myapp\GestionProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * Civilite
 *
 * @ORM\Table(name="civilite")
 * @ORM\Entity(repositoryClass="Myapp\GestionProjetBundle\Repository\CiviliteRepository")
 */
class Civilite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank(message="entrer votre civilite.", groups={"Registration", "Profile"})
     * @ORM\Column(name="civilite", type="string", length=255)
     */
    private $civilite;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

   

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return Civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }
    

    
    
       public function __toString(){
        // to show the name of the Category in the select
        return $this->civilite;
        // to show the id of the Category in the select
        // return $this->id;
    } 
}
