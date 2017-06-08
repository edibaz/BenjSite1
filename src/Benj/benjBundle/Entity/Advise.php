<?php

namespace Benj\benjBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advise
 *
 * @ORM\Table(name="advise")
 * @ORM\Entity(repositoryClass="Benj\benjBundle\Repository\AdviseRepository")
 */
class Advise
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
     * @ORM\Column(name="adviseAuthor", type="string", length=150, nullable=true)
     */
    private $adviseAuthor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adviseDate", type="datetime", nullable=true)
     */
    private $adviseDate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adviseReadDate", type="datetime", nullable=true)
     */
    private $adviseReadDate;

    /**
     * @var string
     *
     * @ORM\Column(name="adviseIsRead", type="string", length=6, nullable=true)
     */
    private $adviseIsRead;

    /**
     * @ORM\manyToOne(targetEntity="Art")
     */
    private $adviseArt;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adviseArtLocation", type="string", length=50, nullable=true)
     */
    private $adviseArtLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="adviseContent", type="string", length=3500, nullable=true)
     */
    private $adviseContent;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adviseEmail", type="string", length=255, nullable=true)
     */
    private $adviseEmail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adviseResponse", type="string", length=6, nullable=true)
     */
    private $adviseResponse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adviseResponseContent", type="string", length=3500, nullable=true)
     */
    private $adviseResponseContent;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adviseResponseDate", type="datetime", nullable=true)
     */
    private $adviseResponseDate;


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
     * Set adviseAuthor
     *
     * @param string $adviseAuthor
     * @return Advise
     */
    public function setAdviseAuthor($adviseAuthor)
    {
        $this->adviseAuthor = $adviseAuthor;

        return $this;
    }

    /**
     * Get adviseAuthor
     *
     * @return string 
     */
    public function getAdviseAuthor()
    {
        return $this->adviseAuthor;
    }

    /**
     * Set adviseDate
     *
     * @param \DateTime $adviseDate
     * @return Advise
     */
    public function setAdviseDate($adviseDate)
    {
        $this->adviseDate = $adviseDate;

        return $this;
    }

    /**
     * Get adviseDate
     *
     * @return \DateTime 
     */
    public function getAdviseDate()
    {
        return $this->adviseDate;
    }
    
    /**
     * Set adviseReadDate
     *
     * @param \DateTime $adviseReadDate
     * @return Advise
     */
    public function setAdviseReadDate($adviseReadDate)
    {
        $this->adviseReadDate = $adviseReadDate;

        return $this;
    }

    /**
     * Get adviseReadDate
     *
     * @return \DateTime 
     */
    public function getAdviseReadDate()
    {
        return $this->adviseReadDate;
    }

    /**
     * Set adviseIsRead
     *
     * @param string $adviseIsRead
     * @return Advise
     */
    public function setAdviseIsRead($adviseIsRead)
    {
        $this->adviseIsRead = $adviseIsRead;

        return $this;
    }

    /**
     * Get adviseIsRead
     *
     * @return string 
     */
    public function getAdviseIsRead()
    {
        return $this->adviseIsRead;
    }

    /**
     * Set adviseArt
     *
     * @param integer $adviseArt
     * @return Advise
     */
    public function setAdviseArt($adviseArt)
    {
        $this->adviseArt = $adviseArt;

        return $this;
    }

    /**
     * Get adviseArt
     *
     * @return integer 
     */
    public function getAdviseArt()
    {
        return $this->adviseArt;
    }
    
    /**
     * Set adviseArtLocation
     *
     * @param string $adviseArtLocation
     * @return Advise
     */
    public function setAdviseArtLocation($adviseArtLocation)
    {
        $this->adviseArtLocation = $adviseArtLocation;

        return $this;
    }

    /**
     * Get adviseArtLocation
     *
     * @return string
     */
    public function getAdviseArtLocation()
    {
        return $this->adviseArtLocation;
    }

    /**
     * Set adviseContent
     *
     * @param string $adviseContent
     * @return Advise
     */
    public function setAdviseContent($adviseContent)
    {
        $this->adviseContent = $adviseContent;

        return $this;
    }

    /**
     * Get adviseContent
     *
     * @return string 
     */
    public function getAdviseContent()
    {
        return $this->adviseContent;
    }
    
    /**
     * Set adviseEmail
     *
     * @param string $adviseEmail
     * @return Advise
     */
    public function setAdviseEmail($adviseEmail)
    {
        $this->adviseEmail = $adviseEmail;

        return $this;
    }

    /**
     * Get adviseEmail
     *
     * @return string 
     */
    public function getAdviseEmail()
    {
        return $this->adviseEmail;
    }

    /**
     * Set adviseResponse
     *
     * @param string $adviseResponse
     * @return Advise
     */
    public function setAdviseResponse($adviseResponse) 
    {
        $this->adviseResponse = $adviseResponse;
        return $this;
    }
    
    /**
     * Get adviseResponse
     *
     * @return string 
     */
    public function getAdviseResponse() 
    {
        return $this->adviseResponse;
    }
    
    /**
     * Set adviseResponseContent
     *
     * @param string $adviseResponseContent
     * @return Advise
     */
    public function setAdviseResponseContent($adviseResponseContent) 
    {
        $this->adviseResponseContent = $adviseResponseContent;
        return $this;
    }
    
    /**
     * Get adviseResponseContent
     *
     * @return string 
     */
    public function getAdviseResponseContent() 
    {
        return $this->adviseResponseContent;
    }
    
    /**
     * Set adviseResponseDate
     *
     * @param \DateTime $adviseResponseDate
     * @return Advise
     */
    public function setAdviseResponseDate($adviseResponseDate)
    {
        $this->adviseResponseDate = $adviseResponseDate;

        return $this;
    }

    /**
     * Get adviseResponseDate
     *
     * @return \DateTime 
     */
    public function getAdviseResponseDate()
    {
        return $this->adviseResponseDate;
    }
        
    public function __toString()
    {
        return $this->name;
    }
}
