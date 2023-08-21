<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Contact.
 *
 *
 * @psalm-suppress MissingConstructor
 */
#[ORM\Entity(repositoryClass: ContactRepository::class)]
#[ORM\Table(name: 'contacts')]
class Contact
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
     * Phone number.
     *
     * @var string|null
     */
    #[ORM\Column(length: 191)]
    private ?string $phone_number = null;



    /**
     * email.
     *
     * @var string|null
     */
    #[ORM\Column(length: 191)]
    private ?string $email = null;





    /**
     * Tags.
     *
     * @var array
     *
     * @ORM\ManyToMany(
     *     targetEntity="App\Entity\Tag",
     *     inversedBy="tasks",
     *     fetch="EXTRA_LAZY",
     * )
     * @ORM\JoinTable(name="tasks_tags")
     *
     * @Assert\Type(type="Doctrine\Common\Collections\Collection")
     */
    private array $tags;


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
     * @return DateTimeImmutable|null Created date of the contact
     */
    public function getCreatedAt(): ? DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Setter for created at.
     *
     * @param DateTimeInterface $createdAt Created date of the contact
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
     * @return DateTimeImmutable|null Updated date of the contact
     */
    public function getUpdatedAt(): ? DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Setter for updated at.
     *
     * @param DateTimeInterface $updatedAt Updated date of the contact
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
     * @return string|null Name of the contact
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for name.
     *
     * @param string $name Name of the contact
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Setter for phone_number.
     *
     * @param string|null $phone_number phone_number
     * @return static
     */
    public function setphone_number(?string $phone_number): static
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * Getter for phone_number.
     *
     * @return string|null phone_number of the contact
     */
    public function getphone_number(): ?string
    {
        return $this->phone_number;
    }




    /**
     * Setter for email.
     *
     * @param string $email email
     * @return static
     */
    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Getter for email.
     *
     * @return string|null email of the contact
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

}
