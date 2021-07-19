<?php

namespace App\DataFixtures;

use App\Entity\Book;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager){
       $faker = Faker\Factory::create('fr_FR');
       $books = Array();

       for ($i = 0; $i < 12; $i++) {
               $books[$i] = new Book();
               $books[$i]->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true));
               $books[$i]->setPrice($faker->numberBetween($min = 1, $max = 50));
               $books[$i]->setAuthor($faker->name." ".$faker->lastName);
               $books[$i]->setPicture("https://boxshot.com/support/3d-book-covers/how-to-make-a-3d-book-cover-in-photoshop/sample.jpg");

               $manager->persist($books[$i]);
           }

$manager->flush();
}
}