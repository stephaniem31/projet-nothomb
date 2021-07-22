<?php

namespace App\Entity;

use App\Repository\NovelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NovelRepository::class)
 */
class Novel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @ORM\Column(type="boolean")
     */
    private $movie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $play;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $award;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $quote;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cover;


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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getMovie(): ?bool
    {
        return $this->movie;
    }

    public function setMovie(bool $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getPlay(): ?bool
    {
        return $this->play;
    }

    public function setPlay(bool $play): self
    {
        $this->play = $play;

        return $this;
    }

    public function getAward(): ?string
    {
        return $this->award;
    }

    public function setAward(?string $award): self
    {
        $this->award = $award;

        return $this;
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(?string $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

}
