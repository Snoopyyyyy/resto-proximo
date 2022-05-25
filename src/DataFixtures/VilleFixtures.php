<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $villes = [
            1 => [
                'name' => 'Caen',
                'zipcode' => '14000'
            ]
        ];

        foreach ($villes as $key => $value) {
            $ville = new Ville();
            $ville->setName($value['name']);
            $ville->setZipcode($value['zipcode']);
            $manager->persist($ville);
        }

        $manager->flush();

    }
}
