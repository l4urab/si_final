<?php
/**
 * App fixtures.
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Fixture class for loading initial data into the database.
 */
class AppFixtures extends Fixture
{
    /**
     * Load method for loading data into the database.
     *
     * @param ObjectManager $manager The Doctrine object manager
     */
    public function load(ObjectManager $manager): void
    {
        $manager->flush();
    }
}
