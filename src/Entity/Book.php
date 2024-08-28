<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Length;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length:255)]
    private ?string $title =null;

    #[ORM\Column(type: Types::TEXT, nullable:true)]
    private ?string $coverText =null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Autor $author = null;

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle(string $title): self{
        $this->title = $title;
        return $this;
    }
    public function getCoverText(): string{
        return $this->coverText;
    }
    public function setCoverText(string $coverText):self{
        $this->coverText =$coverText;
        return $this;
    }

    public function getAuthor(): ?Autor
    {
        return $this->author;
    }

    public function setAuthor(?Autor $author): static
    {
        $this->author = $author;

        return $this;
    }
}
//id
//title
//coverText