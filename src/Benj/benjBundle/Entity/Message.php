<?php

namespace Benj\benjBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="Benj\benjBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="messAuthor", type="string", length=150, nullable=true)
     */
    private $messAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="messEmail", type="string", length=255, nullable=true)
     */
    private $messEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="messSubject", type="string", length=255, nullable=true)
     */
    private $messSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="messContent", type="string", length=10000, nullable=true)
     */
    private $messContent;

    /**
     * @var string
     *
     * @ORM\Column(name="messPhone", type="string", length=30, nullable=true)
     */
    private $messPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="messIsRead", type="string", length=6, nullable=true)
     */
    private $messIsRead;

    /**
     * @var string
     *
     * @ORM\Column(name="messResponse", type="string", length=6, nullable=true)
     */
    private $messResponse;

    /**
     * @var string
     *
     * @ORM\Column(name="messResponseSubject", type="string", length=255, nullable=true)
     */
    private $messResponseSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="messResponseContent", type="string", length=10000, nullable=true)
     */
    private $messResponseContent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="messDate", type="datetime", nullable=true)
     */
    private $messDate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="messReadDate", type="datetime", nullable=true)
     */
    private $messReadDate;


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
     * Set messAuthor
     *
     * @param string $messAuthor
     * @return Message
     */
    public function setMessAuthor($messAuthor)
    {
        $this->messAuthor = $messAuthor;

        return $this;
    }

    /**
     * Get messAuthor
     *
     * @return string 
     */
    public function getMessAuthor()
    {
        return $this->messAuthor;
    }

    /**
     * Set messEmail
     *
     * @param string $messEmail
     * @return Message
     */
    public function setMessEmail($messEmail)
    {
        $this->messEmail = $messEmail;

        return $this;
    }

    /**
     * Get messEmail
     *
     * @return string 
     */
    public function getMessEmail()
    {
        return $this->messEmail;
    }

    /**
     * Set messSubject
     *
     * @param string $messSubject
     * @return Message
     */
    public function setMessSubject($messSubject)
    {
        $this->messSubject = $messSubject;

        return $this;
    }

    /**
     * Get messSubject
     *
     * @return string 
     */
    public function getMessSubject()
    {
        return $this->messSubject;
    }

    /**
     * Set messContent
     *
     * @param string $messContent
     * @return Message
     */
    public function setMessContent($messContent)
    {
        $this->messContent = $messContent;

        return $this;
    }

    /**
     * Get messContent
     *
     * @return string 
     */
    public function getMessContent()
    {
        return $this->messContent;
    }

    /**
     * Set messPhone
     *
     * @param string $messPhone
     * @return Message
     */
    public function setMessPhone($messPhone)
    {
        $this->messPhone = $messPhone;

        return $this;
    }

    /**
     * Get messPhone
     *
     * @return string 
     */
    public function getMessPhone()
    {
        return $this->messPhone;
    }

    /**
     * Set messIsRead
     *
     * @param string $messIsRead
     * @return Message
     */
    public function setMessIsRead($messIsRead)
    {
        $this->messIsRead = $messIsRead;

        return $this;
    }

    /**
     * Get messIsRead
     *
     * @return string 
     */
    public function getMessIsRead()
    {
        return $this->messIsRead;
    }

    /**
     * Set messResponse
     *
     * @param string $messResponse
     * @return Message
     */
    public function setMessResponse($messResponse)
    {
        $this->messResponse = $messResponse;

        return $this;
    }

    /**
     * Get messResponse
     *
     * @return string 
     */
    public function getMessResponse()
    {
        return $this->messResponse;
    }

    /**
     * Set messResponseSubject
     *
     * @param string $messResponseSubject
     * @return Message
     */
    public function setMessResponseSubject($messResponseSubject)
    {
        $this->messResponseSubject = $messResponseSubject;

        return $this;
    }

    /**
     * Get messResponseSubject
     *
     * @return string 
     */
    public function getMessResponseSubject()
    {
        return $this->messResponseSubject;
    }

    /**
     * Set messResponseContent
     *
     * @param string $messResponseContent
     * @return Message
     */
    public function setMessResponseContent($messResponseContent)
    {
        $this->messResponseContent = $messResponseContent;

        return $this;
    }

    /**
     * Get messResponseContent
     *
     * @return string 
     */
    public function getMessResponseContent()
    {
        return $this->messResponseContent;
    }

    /**
     * Set messDate
     *
     * @param \DateTime $messDate
     * @return Message
     */
    public function setMessDate($messDate)
    {
        $this->messDate = $messDate;

        return $this;
    }

    /**
     * Get messDate
     *
     * @return \DateTime 
     */
    public function getMessDate()
    {
        return $this->messDate;
    }
    
    /**
     * Set messReadDate
     *
     * @param \DateTime $messReadDate
     * @return Message
     */
    public function setMessReadDate($messReadDate)
    {
        $this->messReadDate = $messReadDate;

        return $this;
    }

    /**
     * Get messReadDate
     *
     * @return \DateTime 
     */
    public function getMessReadDate()
    {
        return $this->messReadDate;
    }
}
