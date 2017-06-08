<?php

namespace Benj\benjBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Art
 *
 * @ORM\Table(name="art")
 * @ORM\Entity(repositoryClass="Benj\benjBundle\Repository\ArtRepository")
 */
class Art
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
     * @ORM\Column(name="ArtName", type="string", length=150, unique=true)
     */
    private $artName;

    /**
     * @var string
     *
     * @ORM\Column(name="ArtComment", type="string", length=1200)
     */
    private $artComment;

    /**
     * @var int
     *
     * @ORM\Column(name="ArtYear", type="smallint")
     */
    private $artYear;

    /**
     * @var string
     *
     * @ORM\Column(name="ArtCategory", type="text", length=150)
     */
    private $artCategory;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ArtDimensions", type="text", length=50)
     */
    private $artDimensions;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ArtLocation", type="string", length=50)
     */
    private $artLocation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ArtFullLocation", type="string", length=50)
     */
    private $artFullLocation;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artName
     *
     * @param string $artName
     * @return Art
     */
    public function setArtName($artName)
    {
        $this->artName = $artName;

        return $this;
    }

    /**
     * Get artName
     *
     * @return string 
     */
    public function getArtName()
    {
        return $this->artName;
    }

    /**
     * Set artComment
     *
     * @param string $artComment
     * @return Art
     */
    public function setArtComment($artComment)
    {
        $this->artComment = $artComment;

        return $this;
    }

    /**
     * Get artComment
     *
     * @return string 
     */
    public function getArtComment()
    {
        return $this->artComment;
    }

    /**
     * Set artYear
     *
     * @param integer $artYear
     * @return Art
     */
    public function setArtYear($artYear)
    {
        $this->artYear = $artYear;

        return $this;
    }

    /**
     * Get artYear
     *
     * @return integer 
     */
    public function getArtYear()
    {
        return $this->artYear;
    }

    /**
     * Set artCategory
     *
     * @param string $artCategory
     * @return Art
     */
    public function setArtCategory($artCategory)
    {
        $this->artCategory = $artCategory;

        return $this;
    }

    /**
     * Get artCategory
     *
     * @return string 
     */
    public function getArtCategory()
    {
        return $this->artCategory;
    }
    
    /**
     * Set artDimensions
     *
     * @param string $artDimensions
     * @return Art
     */
    public function setArtDimensions($artDimensions)
    {
        $this->artDimensions = $artDimensions;

        return $this;
    }

    /**
     * Get artDimensions
     *
     * @return string 
     */
    public function getArtDimensions()
    {
        return $this->artDimensions;
    }
    
    /**
     * Set artLocation
     *
     * @param string $artLocation
     * @return Art
     */
    public function setArtLocation($artLocation)
    {
        $this->artLocation = $artLocation;

        return $this;
    }

    /**
     * Get artLocation
     *
     * @return string 
     */
    public function getArtLocation()
    {
        return $this->artLocation;
    }
    
    /**
     * Set artFullLocation
     *
     * @param string $artFullLocation
     * @return Art
     */
    public function setArtFullLocation($artFullLocation)
    {
        $this->artFullLocation = $artFullLocation;

        return $this;
    }

    /**
     * Get artFullLocation
     *
     * @return string 
     */
    public function getArtFullLocation()
    {
        return $this->artFullLocation;
    }
        
    public function __toString()
    {
        return $this->name;
    }
}
