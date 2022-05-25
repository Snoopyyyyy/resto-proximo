<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class ProprietaireFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbProprio = 1; $nbProprio <= 20; $nbProprio++) {
            $proprietaire = new Proprietaire();
            $proprietaire->setEmail($faker->email);
            $proprietaire->setLastname($faker->lastName);
            $proprietaire->setFirstname($faker->firstName);
            $proprietaire->setBirth($faker->dateTimeBetween('-50 years', '-18 years'));
            $proprietaire->setPassword($this->encoder->hashPassword($proprietaire, $proprietaire->getFirstname()));
            $this->addReference('proprietaire_' . $nbProprio, $proprietaire);
            $manager->persist($proprietaire);
        }
        $manager->flush();
    }
}
