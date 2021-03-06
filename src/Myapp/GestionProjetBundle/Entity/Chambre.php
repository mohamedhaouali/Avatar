<?php

namespace Myapp\GestionProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="Myapp\GestionProjetBundle\Repository\ChambreRepository")
 */
class Chambre
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
     * @var \Date
     *
     * @ORM\Column(name="dateentree", type="datetime")
     */
    private $dateentree;

    /**
     * @var \Date
     *
     * @ORM\Column(name="datesortie", type="datetime")
     */
    private $datesortie;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrechambre", type="integer")
     */
    private $nombrechambre;

    /**
     * @var string
     *
     * @ORM\Column(name="typechambre", type="string", length=255)
     */
    private $typechambre;

    /**
     * @var string
     *
     * @ORM\Column(name="arrangement", type="string", length=255)
     */
    private $arrangement;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreadulte", type="integer")
     */
    private $nombreadulte;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreenfants", type="integer")
     */
    private $nombreenfants;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrebebes", type="integer")
     */
    private $nombrebebes;


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
     * Set nombrechambre
     *
     * @param integer $nombrechambre
     *
     * @return Chambre
     */
    public function setNombrechambre($nombrechambre)
    {
        $this->nombrechambre = $nombrechambre;

        return $this;
    }

    /**
     * Get nombrechambre
     *
     * @return int
     */
    public function getNombrechambre()
    {
        return $this->nombrechambre;
    }

    /**
     * Set typechambre
     *
     * @param string $typechambre
     *
     * @return Chambre
     */
    public function setTypechambre($typechambre)
    {
        $this->typechambre = $typechambre;

        return $this;
    }

    /**
     * Get typechambre
     *
     * @return string
     */
    public function getTypechambre()
    {
        return $this->typechambre;
    }

    /**
     * Set arrangement
     *
     * @param string $arrangement
     *
     * @return Chambre
     */
    public function setArrangement($arrangement)
    {
        $this->arrangement = $arrangement;

        return $this;
    }

    /**
     * Get arrangement
     *
     * @return string
     */
    public function getArrangement()
    {
        return $this->arrangement;
    }

    /**
     * Set nombreadulte
     *
     * @param integer $nombreadulte
     *
     * @return Chambre
     */
    public function setNombreadulte($nombreadulte)
    {
        $this->nombreadulte = $nombreadulte;

        return $this;
    }

    /**
     * Get nombreadulte
     *
     * @return int
     */
    public function getNombreadulte()
    {
        return $this->nombreadulte;
    }

    /**
     * Set nombreenfants
     *
     * @param integer $nombreenfants
     *
     * @return Chambre
     */
    public function setNombreenfants($nombreenfants)
    {
        $this->nombreenfants = $nombreenfants;

        return $this;
    }

    /**
     * Get nombreenfants
     *
     * @return int
     */
    public function getNombreenfants()
    {
        return $this->nombreenfants;
    }

    /**
     * Set nombrebebes
     *
     * @param integer $nombrebebes
     *
     * @return Chambre
     */
    public function setNombrebebes($nombrebebes)
    {
        $this->nombrebebes = $nombrebebes;

        return $this;
    }

    /**
     * Get nombrebebes
     *
     * @return int
     */
    public function getNombrebebes()
    {
        return $this->nombrebebes;
    }

   

   

    /**
     * Set dateentree
     *
     * @param \DateTime $dateentree
     *
     * @return Chambre
     */
    public function setDateentree($dateentree)
    {
        $this->dateentree = $dateentree;

        return $this;
    }

    /**
     * Get dateentree
     *
     * @return \DateTime
     */
    public function getDateentree()
    {
        return $this->dateentree;
    }

    /**
     * Set datesortie
     *
     * @param \DateTime $datesortie
     *
     * @return Chambre
     */
    public function setDatesortie($datesortie)
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    /**
     * Get datesortie
     *
     * @return \DateTime
     */
    public function getDatesortie()
    {
        return $this->datesortie;
    }
}
