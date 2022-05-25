<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $raw = file_get_contents('./src/DataFixtures/villes.json');
        $villes = json_decode($raw, true);

        foreach ($villes as $key => $value) {
            $ville = new Ville();
            $ville->setName($value['name']);
            $ville->setZipcode($value['zipcode']);
            $this->addReference('ville_' . ($key + 1), $ville);
            $manager->persist($ville);
        }
        $manager->flush();
    }
}
