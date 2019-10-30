<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//  règles de validation, ou contraintes, 
//  utiliser les annotations * 
use Symfony\Component\Validator\Constraints as Assert;
// On rajoute ce use pour la contrainte :
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 * @UniqueEntity(fields="email", message="Un contact existe déjà avec cet email.")
 */
class Contact
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
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\Length(min=2, minMessage="Le titre doit faire au moins {{ limit }} caractères.")
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\Length(min=2, minMessage="Le prenom doit faire au moins {{ limit }} caractères.")
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Length(min=2)
     */
    private $email;

    /**
     * @var int
     ** Pour rendre le champ entrepise facultatif, il suffit de le notifier dans annotations
     * @ORM\Column(name="entreprise", type="integer", nullable=true, unique=true)
     */
    private $entreprise; 

    /** public function __construct()
    *{  Initialize entreprise a blanc
    *    $this->setEntreprise = null;
    *} 
    **/

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Contact
     */

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set Prenom
     *
     * @param string $prenom
     *
     * @return Contact
     */
    public function setPreNom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get Prenom
     *
     * @return string
     */
    public function getPreNom()
    {
        return $this->prenom;
    }
    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Contact
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
}
