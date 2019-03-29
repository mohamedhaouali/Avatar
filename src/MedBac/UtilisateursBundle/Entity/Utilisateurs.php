<?php
// src/AppBundle/Entity/User.php
namespace MedBac\UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

   
    public function __construct()
    {
        parent::__construct();
        
        $this->enabled = false;
        $this->locked = false;
        $this->expired = false;
        $this->roles = array();
        $this->credentialsExpired = false;  
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
     
        
    }
    
      /**
   * @ORM\OneToMany(targetEntity="Myapp\GestionProjetBundle\Entity\Commande",mappedBy="utilisateur",cascade="remove")
   * @ORM\JoinColumn(nullable=true)
    */
   private $commandes; 
   
  
     /**
   * @ORM\OneToMany(targetEntity="Myapp\GestionProjetBundle\Entity\UtilisateursAdress",mappedBy="utilisateur",cascade="remove")
   * @ORM\JoinColumn(nullable=true)
    */
   private $adresses;  
   
 /**
     * Add commande
     *
     * @param \Myapp\GestionProjetBundle\Entity\Commande $commande
     *
     * @return Utilisateurs
     */
    public function addCommande(\Myapp\GestionProjetBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Myapp\GestionProjetBundle\Entity\Commande $commande
     */
    public function removeCommande(\Myapp\GestionProjetBundle\Entity\Commande $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add adress
     *
     * @param \Myapp\GestionProjetBundle\Entity\UtilisateursAdress $adress
     *
     * @return Utilisateurs
     */
    public function addAdress(\Myapp\GestionProjetBundle\Entity\UtilisateursAdress $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \Myapp\GestionProjetBundle\Entity\UtilisateursAdress $adress
     */
    public function removeAdress(\Myapp\GestionProjetBundle\Entity\UtilisateursAdress $adress)
    {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }  
   
   
   
    public function getParent() {
        return 'FOSUserBundle';
    }

}