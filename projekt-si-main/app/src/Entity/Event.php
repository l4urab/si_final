<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Event.
 *
 * Represents an event entity in the application.
 *
 * @psalm-suppress MissingConstructor
 */
#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Table(name: 'events')]
#[ORM\UniqueConstraint(name: 'uq_events_title', columns: ['name'])]
#[UniqueEntity(fields: ['name'])]
class Event
{
    /**
     * Primary key.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * Created at.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ? DateTimeInterface $createdAt = null;

    /**
     * Updated at.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ? DateTimeInterface $updatedAt = null;

    /**
     * Name.
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * Date of the event.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ? DateTimeInterface $date = null;

    /**
     * Category.
     *
     * @var Category
     */
    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;



    #[ORM\ManyToOne]
    private ?User $author = null;


    /**
     * Getter for Id.
     *
     * @return int|null Id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for created at.
     *
     * @return DateTimeImmutable|null Created date of the event
     */
    public function getCreatedAt(): ? DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Setter for created at.
     *
     * @param DateTimeInterface $createdAt Created date of the event
     * @return static
     */
    public function setCreatedAt(DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Getter for updated at.
     *
     * @return DateTimeImmutable|null Updated date of the event
     */
    public function getUpdatedAt(): ? DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Setter for updated at.
     *
     * @param DateTimeInterface $updatedAt Updated date of the event
     * @return static
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Getter for name.
     *
     * @return string|null Name of the event
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for name.
     *
     * @param string $name Name of the event
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Getter for the date of the event.
     *
     * @return DateTimeImmutable|null Date of the event
     */
    public function getDate(): ? DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Setter for the date of the event.
     *
     * @param DateTimeInterface $date Date of the event
     * @return static
     */
    public function setDate(DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the associated Category entity.
     *
     * @return Category|null The associated Category entity or null if not set.
     */

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Set the associated Category entity.
     *
     * @param Category|null $category The Category entity to associate or null to disassociate.
     *
     * @return static Returns this entity instance to enable method chaining.
     */
    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }


}
