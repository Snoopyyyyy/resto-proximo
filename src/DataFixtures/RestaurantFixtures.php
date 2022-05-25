<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class RestaurantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbRestaurant = 1; $nbRestaurant <= 50; $nbRestaurant++) {
            $ville = $this->getReference('ville_' . $faker->numberBetween(1, 49));
            $proprietaire = $this->getReference('proprietaire_' . $faker->numberBetween(1, 20));

            $restaurant = new Restaurant();
            $restaurant->setProprietaireId($proprietaire);
            $restaurant->setVilleId($ville);
            $restaurant->setName($faker->company);
            $restaurant->setStreetNumber($faker->numberBetween(1, 200));
            $restaurant->setStreetName($faker->streetName);
            $restaurant->setImage('assets/img/' . $faker->numberBetween(0, 5) . '.jpg');
            $manager->persist($restaurant);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [VilleFixtures::class, ProprietaireFixtures::class];
    }
}
