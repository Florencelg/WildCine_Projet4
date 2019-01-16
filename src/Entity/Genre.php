<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $drama;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comedy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $triller;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $action;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fantastic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horror;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $romantic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adventure;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Movie", mappedBy="genres")
     */
    private $movies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Serie", mappedBy="genres")
     */
    private $series;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
        $this->series = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDrama(): ?string
    {
        return $this->drama;
    }

    public function setDrama(string $drama): self
    {
        $this->drama = $drama;

        return $this;
    }

    public function getComedy(): ?string
    {
        return $this->comedy;
    }

    public function setComedy(string $comedy): self
    {
        $this->comedy = $comedy;

        return $this;
    }

    public function getTriller(): ?string
    {
        return $this->triller;
    }

    public function setTriller(string $triller): self
    {
        $this->triller = $triller;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getFantastic(): ?string
    {
        return $this->fantastic;
    }

    public function setFantastic(string $fantastic): self
    {
        $this->fantastic = $fantastic;

        return $this;
    }

    public function getHorror(): ?string
    {
        return $this->horror;
    }

    public function setHorror(string $horror): self
    {
        $this->horror = $horror;

        return $this;
    }

    public function getRomantic(): ?string
    {
        return $this->romantic;
    }

    public function setRomantic(string $romantic): self
    {
        $this->romantic = $romantic;

        return $this;
    }

    public function getAdventure(): ?string
    {
        return $this->adventure;
    }

    public function setAdventure(string $adventure): self
    {
        $this->adventure = $adventure;

        return $this;
    }

    /**
     * @return Collection|Movie[]
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): self
    {
        if (!$this->movies->contains($movie)) {
            $this->movies[] = $movie;
            $movie->addGenre($this);
        }

        return $this;
    }

    public function removeMovie(Movie $movie): self
    {
        if ($this->movies->contains($movie)) {
            $this->movies->removeElement($movie);
            $movie->removeGenre($this);
        }

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Serie $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->addGenre($this);
        }

        return $this;
    }

    public function removeSeries(Serie $series): self
    {
        if ($this->series->contains($series)) {
            $this->series->removeElement($series);
            $series->removeGenre($this);
        }

        return $this;
    }
}
