<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlockRepository::class)]
class Block
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $free = null;

    /**
     * @var Collection<int, ClubBlock>
     */
    #[ORM\OneToMany(targetEntity: ClubBlock::class, mappedBy: 'block', orphanRemoval: true)]
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isFree(): ?bool
    {
        return $this->free;
    }

    public function setFree(bool $free): static
    {
        $this->free = $free;

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
            $clubBlock->setBlock($this);
        }

        return $this;
    }

    public function removeClubBlock(ClubBlock $clubBlock): static
    {
        if ($this->clubBlocks->removeElement($clubBlock)) {
            // set the owning side to null (unless already changed)
            if ($clubBlock->getBlock() === $this) {
                $clubBlock->setBlock(null);
            }
        }

        return $this;
    }
}
