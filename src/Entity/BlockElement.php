<?php

namespace App\Entity;

use App\Repository\BlockElementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlockElementRepository::class)]
class BlockElement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $domElement = null;

    #[ORM\Column(length: 255)]
    private ?string $classValue = null;

    #[ORM\Column]
    private ?int $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getDomElement(): ?string
    {
        return $this->domElement;
    }

    public function setDomElement(string $domElement): static
    {
        $this->domElement = $domElement;

        return $this;
    }

    public function getClassValue(): ?string
    {
        return $this->classValue;
    }

    public function setClassValue(string $classValue): static
    {
        $this->classValue = $classValue;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }
}
