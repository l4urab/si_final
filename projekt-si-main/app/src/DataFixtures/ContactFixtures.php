<?php
/**
 * Contact fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;

/**
 * Class ContactFixtures.
 */
class ContactFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     */
    public function loadData(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $contact = new Contact();
            $contact->setName($this->faker->name);
            $contact->setPhoneNumber($this->faker->phoneNumber);
            $contact->setEmail($this->faker->email);
            $this->manager->persist($contact);
        }

        $this->manager->flush();
    }
}
