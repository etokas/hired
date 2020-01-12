<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Type")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tags = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="jobs", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $teleworking;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $jobLink;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $salaryMin;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $salaryMax;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdditionalDescription(): ?string
    {
        return $this->additionalDescription;
    }

    public function setAdditionalDescription(string $additionalDescription): self
    {
        $this->additionalDescription = $additionalDescription;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }


    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getTeleworking(): ?bool
    {
        return $this->teleworking;
    }

    public function setTeleworking(?bool $teleworking): self
    {
        $this->teleworking = $teleworking;

        return $this;
    }

    public function getJobLink(): ?string
    {
        return $this->jobLink;
    }

    public function setJobLink(?string $jobLink): self
    {
        $this->jobLink = $jobLink;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getSalaryMin(): ?string
    {
        return $this->salaryMin;
    }

    public function setSalaryMin(string $salaryMin): self
    {
        $this->salaryMin = $salaryMin;

        return $this;
    }

    public function getSalaryMax(): ?string
    {
        return $this->salaryMax;
    }

    public function setSalaryMax(?string $salaryMax): self
    {
        $this->salaryMax = $salaryMax;

        return $this;
    }

}
