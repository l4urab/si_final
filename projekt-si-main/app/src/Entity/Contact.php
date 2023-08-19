<?php
/**
 * Contact entity.
 */

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Contact.
 *
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 * @ORM\Table(name="Contacts")
 */
class Contact
{
    /**
     * Primary key.
     *
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private ?int $id = null;

    /**
     * Name.
     *
     * @var string|null
     *
     * @ORM\Column(type="string", length=64)
     */
    private ?string $name = null;

    /**
     * Phone number.
     *
     * @var string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private ?string $phoneNumber = null;

    /**
     * Email.
     *
     * @var string|null
     *
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    private ?string $email = null;

    /**
     * Get the ID of the contact.
     *
     * @return int|null The contact ID
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the name of the contact.
     *
     * @return string|null The contact name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name of the contact.
     *
     * @param string|null $name The contact name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the phone number of the contact.
     *
     * @return string|null The phone number
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Set the phone number of the contact.
     *
     * @param string|null $phoneNumber The phone number
     * @return $this
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Get the email of the contact.
     *
     * @return string|null The email address
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the email of the contact.
     *
     * @param string|null $email The email address
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }
}
