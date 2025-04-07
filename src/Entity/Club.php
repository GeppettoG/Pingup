<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $clubNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $gymName = null;

    /**
     * @var Collection<int, ClubBlock>
     */
    #[ORM\OneToMany(targetEntity: ClubBlock::class, mappedBy: 'club', orphanRemoval: true)]
    private Collection $clubBlocks;

    public function __construct()
    {
        $this->clubBlocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getClubNumber(): ?string
    {
        return $this->clubNumber;
    }

    public function setClubNumber(string $clubNumber): static
    {
        $this->clubNumber = $clubNumber;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getGymName(): ?string
    {
        return $this->gymName;
    }

    public function setGymName(string $gymName): static
    {
        $this->gymName = $gymName;

        return $this;
    }

    /**
     * @return Collection<int, ClubBlock>
     */
    public function getClubBlocks(): Collection
    {
        return $this->clubBlocks;
    }

    public function addClubBlock(ClubBlock $clubBlock): static
    {
        if (!$this->clubBlocks->contains($clubBlock)) {
            $this->clubBlocks->add($clubBlock);
            $clubBlock->setClub($this);
        }

        return $this;
    }

    public function removeClubBlock(ClubBlock $clubBlock): static
    {
        if ($this->clubBlocks->removeElement($clubBlock)) {
            // set the owning side to null (unless already changed)
            if ($clubBlock->getClub() === $this) {
                $clubBlock->setClub(null);
            }
        }

        return $this;
    }
}
