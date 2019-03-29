<?php

namespace Myapp\GestionProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="Myapp\GestionProjetBundle\Repository\ClasseRepository")
 */
class Classe
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
     *@Assert\NotBlank(message="classe.", groups={"Registration", "Profile"})
     * @ORM\Column(name="classe", type="string", length=255)
     */
    private $classe;


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
     * Set classe
     *
     * @param string $classe
     *
     * @return Classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }
    
     public function __toString(){
        // to show the name of the Category in the select
        return $this->classe;
        // to show the id of the Category in the select
        // return $this->id;
    } 
}
