<?php

namespace App\Entity;

use App\Repository\ExportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExportRepository::class)
 */
class Export
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ExportUser::class)
     */
    private $exportUser;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class)
     */
    private $place;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExportUser(): ?ExportUser
    {
        return $this->exportUser;
    }

    public function setExportUser(?ExportUser $exportUser): self
    {
        $this->exportUser = $exportUser;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }
}
