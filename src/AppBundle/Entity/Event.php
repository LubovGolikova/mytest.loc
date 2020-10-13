<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeInterface;
use Exception;
/**
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Event
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $shortContent;

    /**
     * @var \DateTime
     */
    private $dataEvent;

    /**
     * @var int
     */
    private $likes;

    /**
     * @var \Datetime $created
     *
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var \Datetime $updated
     *
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected $updated;



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
     * Set path
     *
     * @param string $path
     *
     * @return Event
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Event
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set shortContent
     *
     * @param string $shortContent
     *
     * @return Event
     */
    public function setShortContent($shortContent)
    {
        $this->shortContent = $shortContent;

        return $this;
    }

    /**
     * Get shortContent
     *
     * @return string
     */
    public function getShortContent()
    {
        return $this->shortContent;
    }

    /**
     * Set dataEvent
     *
     * @param \DateTime $dataEvent
     *
     * @return Event
     */
    public function setDataEvent($dataEvent)
    {
        $this->dataEvent = $dataEvent;

        return $this;
    }

    /**
     * Get dataEvent
     *
     * @return \DateTime
     */
    public function getDataEvent()
    {
        return $this->dataEvent;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     *
     * @return Event
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return int
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime("now");
    }

}

