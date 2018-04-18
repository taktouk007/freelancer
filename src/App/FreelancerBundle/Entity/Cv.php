<?php

namespace App\FreelancerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cv
 *
 * @ORM\Table(name="cv")
 * @ORM\Entity(repositoryClass="App\FreelancerBundle\Repository\CvRepository")
 */
class Cv
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * Many CV have Many Skills.
     * @ORM\ManyToMany(targetEntity="Skills")
     * @ORM\JoinTable(name="cv_skills",
     *      joinColumns={@ORM\JoinColumn(name="cv_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skills_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="degree", type="string", length=255, nullable=true)
     */
    private $degree;

    /**
     * @var string
     *
     * @ORM\Column(name="experiences", type="text", nullable=true)
     */
    private $experiences;

    /**
     * @var float
     *
     * @ORM\Column(name="hourlyRate", type="float", nullable=false)
     */
    private $hourlyRate;

    /**
     * @var float
     *
     * @ORM\Column(name="totalEarned", type="float", nullable=true)
     */
    private $totalEarned;

    /**
     * @var int
     *
     * @ORM\Column(name="nbOfJob", type="integer", nullable=true)
     */
    private $nbOfJob;

    /**
     * @var string
     *
     * @ORM\Column(name="profileLink", type="string", length=255, nullable=true, unique=true)
     */
    private $profileLink;

    /**
     * Many CV have Many Languages.
     * @ORM\ManyToMany(targetEntity="Languages")
     * @ORM\JoinTable(name="cv_languages",
     *      joinColumns={@ORM\JoinColumn(name="cv_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="languages_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $languages;

    /**
     * Many CV have Many Languages.
     * @ORM\ManyToMany(targetEntity="Certification")
     * @ORM\JoinTable(name="cv_certifications",
     *      joinColumns={@ORM\JoinColumn(name="cv_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="certifications_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $certifications;


    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="User", inversedBy="cv")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }



    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Cv
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
     * Set description
     *
     * @param string $description
     *
     * @return Cv
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set skills
     *
     * @param string $skills
     *
     * @return Cv
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    
        return $this;
    }

    /**
     * Get skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set degree
     *
     * @param string $degree
     *
     * @return Cv
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    
        return $this;
    }

    /**
     * Get degree
     *
     * @return string
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Set experiences
     *
     * @param string $experiences
     *
     * @return Cv
     */
    public function setExperiences($experiences)
    {
        $this->experiences = $experiences;
    
        return $this;
    }

    /**
     * Get experiences
     *
     * @return string
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Set hourlyRate
     *
     * @param float $hourlyRate
     *
     * @return Cv
     */
    public function setHourlyRate($hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
    
        return $this;
    }

    /**
     * Get hourlyRate
     *
     * @return float
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * Set totalEarned
     *
     * @param float $totalEarned
     *
     * @return Cv
     */
    public function setTotalEarned($totalEarned)
    {
        $this->totalEarned = $totalEarned;
    
        return $this;
    }

    /**
     * Get totalEarned
     *
     * @return float
     */
    public function getTotalEarned()
    {
        return $this->totalEarned;
    }

    /**
     * Set nbOfJob
     *
     * @param integer $nbOfJob
     *
     * @return Cv
     */
    public function setNbOfJob($nbOfJob)
    {
        $this->nbOfJob = $nbOfJob;
    
        return $this;
    }

    /**
     * Get nbOfJob
     *
     * @return integer
     */
    public function getNbOfJob()
    {
        return $this->nbOfJob;
    }

    /**
     * Set profileLink
     *
     * @param string $profileLink
     *
     * @return Cv
     */
    public function setProfileLink($profileLink)
    {
        $this->profileLink = $profileLink;
    
        return $this;
    }

    /**
     * Get profileLink
     *
     * @return string
     */
    public function getProfileLink()
    {
        return $this->profileLink;
    }

    /**
     * Set languages
     *
     * @param string $languages
     *
     * @return Cv
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    
        return $this;
    }

    /**
     * Get languages
     *
     * @return string
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set certifications
     *
     * @param string $certifications
     *
     * @return Cv
     */
    public function setCertifications($certifications)
    {
        $this->certifications = $certifications;
    
        return $this;
    }

    /**
     * Get certifications
     *
     * @return string
     */
    public function getCertifications()
    {
        return $this->certifications;
    }
}

