<?php

namespace Benj\benjBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="Benj\benjBundle\Repository\EventsRepository")
 */
class Events
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
     * @var \DateTime
     *
     * @ORM\Column(name="evByDate", type="datetime", nullable=true)
     */
    private $evByDate;


    /**
     * @var string
     *
     * @ORM\Column(name="evDate", type="string", length=150, nullable=true)
     */
    private $evDate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="evMoment", type="string", length=50, nullable=true)
     */
    private $evMoment;
    
    /**
     * @var string
     *
     * @ORM\Column(name="evTitle", type="string", length=150, nullable=true)
     */
    private $evTitle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="evPlace", type="string", length=250, nullable=true)
     */
    private $evPlace;
    
    /**
     * @var string
     *
     * @ORM\Column(name="evContent", type="string", length=1000, nullable=true)
     */
    private $evContent;
    
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
     * Set evDate
     *
     * @param string $evDate
     * @return Events
     */
    public function setEvDate($evDate)
    {
        $this->evDate = $evDate;

        return $this;
    }

    /**
     * Get evDate
     *
     * @return string
     */
    public function getEvDate()
    {
        return $this->evDate;
    }
    
    /**
     * Set evMoment
     *
     * @param string $evMoment
     * @return Events
     */
    public function setEvMoment($evMoment)
    {
        $this->evMoment = $evMoment;

        return $this;
    }

    /**
     * Get evMoment
     *
     * @return string
     */
    public function getEvMoment()
    {
        return $this->evMoment;
    }
    
    /**
     * Set evTitle
     *
     * @param string $evTitle
     * @return Events
     */
    public function setEvTitle($evTitle)
    {
        $this->evTitle = $evTitle;

        return $this;
    }

    /**
     * Get evTitle
     *
     * @return string 
     */
    public function getEvTitle()
    {
        return $this->evTitle;
    }
    
    /**
     * Set evPlace
     *
     * @param string $evPlace
     * @return Events
     */
    public function setEvPlace($evPlace)
    {
        $this->evPlace = $evPlace;

        return $this;
    }

    /**
     * Get evPlace
     *
     * @return string 
     */
    public function getEvPlace()
    {
        return $this->evPlace;
    }
    
    /**
     * Set evContent
     *
     * @param string $evContent
     * @return Events
     */
    public function setEvContent($evContent)
    {
        $this->evContent = $evContent;

        return $this;
    }

    /**
     * Get evContent
     *
     * @return string 
     */
    public function getEvContent()
    {
        return $this->evContent;
    }
    
    /**
     * Set evByDate
     *
     * @param \DateTime $evByDate
     * @return Events
     */
    public function setEvByDate($evByDate)
    {
        $this->evByDate = $evByDate;

        return $this;
    }

    /**
     * Get evByDate
     *
     * @return \DateTime 
     */
    public function getEvByDate()
    {
        return $this->evByDate;
    }
}
