<?php

namespace Mhamed\CeciliaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advise
 *
 * @ORM\Table(name="Advise_table")
 * @ORM\Entity(repositoryClass="Mhamed\CeciliaBundle\Entity\AdviseRepository")
 */
class Advise
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="advise_name", type="string", length=255)
     */
    private $adviseName;

    /**
     * @var string
     *
     * @ORM\Column(name="head_section", type="text")
     */
    private $headSection;

    /**
     * @var string
     *
     * @ORM\Column(name="main_section", type="text")
     */
    private $mainSection;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=100)
     */
    private $topic;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100)
     */
    private $image;


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
     * Set adviseName
     *
     * @param string $adviseName
     * @return Advise
     */
    public function setAdviseName($adviseName)
    {
        $this->adviseName = $adviseName;

        return $this;
    }

    /**
     * Get adviseName
     *
     * @return string 
     */
    public function getAdviseName()
    {
        return $this->adviseName;
    }

    /**
     * Set headSection
     *
     * @param string $headSection
     * @return Advise
     */
    public function setHeadSection($headSection)
    {
        $this->headSection = $headSection;

        return $this;
    }

    /**
     * Get headSection
     *
     * @return string 
     */
    public function getHeadSection()
    {
        return $this->headSection;
    }

    /**
     * Set mainSection
     *
     * @param string $mainSection
     * @return Advise
     */
    public function setMainSection($mainSection)
    {
        $this->mainSection = $mainSection;

        return $this;
    }

    /**
     * Get mainSection
     *
     * @return string 
     */
    public function getMainSection()
    {
        return $this->mainSection;
    }

    /**
     * Set topic
     *
     * @param string $topic
     * @return Advise
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }


    /**
     * Set image
     *
     * @param string $image
     * @return Advise
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
