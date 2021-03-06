<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 08/01/2019
 * Time: 14:34
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type ="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type ="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type ="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type ="smallint")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="User",  inversedBy="annonces")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Contain", mappedBy="annonce")
     */
    protected $contain;

    public function __construct()
    {
        $this->contain = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $contain
     */
    public function setContain($contain)
    {
        $this->contain = $contain;
    }

    /**
     * @return array
     */
    public function getBooks()
    {
        $books = [];

        foreach ($this->contain as $contain) {
            $books[] = [
                'book' => $contain->getBook(),
                'qte'  => $contain->getQte()
            ];
        }

        return $books;
    }

    /**
     * @param Contain $contain
     */
    public function addContain(Contain $contain)
    {
        $this->contain->add($contain);
    }
}
