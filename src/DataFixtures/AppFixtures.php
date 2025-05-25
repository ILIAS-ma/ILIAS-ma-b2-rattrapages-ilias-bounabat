<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


        $restaurants = [];
        for ($i = 0; $i < 7; $i++) {
            $restaurant = new Restaurant();
            $restaurant->setName($faker->company);
            $restaurant->setLocation($faker->city);
            $restaurant->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisDecade));
            $restaurant->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisYear));
            $manager->persist($restaurant);
            $restaurants[] = $restaurant;
        }

        for ($i = 0; $i < 15; $i++) {
            $employee = new Employee();
            $employee->setName($faker->name);
            $employee->setEmail($faker->unique()->safeEmail);
            $employee->setActive($faker->boolean);
            $employee->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisDecade));
            $employee->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisYear));
            $employee->setRestaurant($faker->randomElement($restaurants));
            $manager->persist($employee);
        }

        $manager->flush();
    }
}