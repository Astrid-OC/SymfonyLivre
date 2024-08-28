<?php

namespace App\DataFixtures;

use App\Entity\Autor;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $listAuthor =[];
        for ($i=0; $i <= 10 ; $i++) { 
            $author = new Autor();
            $author->setFirstName($this->faker->firstName());
            $author->setLastName($this->faker->lastName());
            $manager->persist($author);

            $listAuthor[] =$author;
        }

        for ($i=0; $i <=20 ; $i++) { 
            $book = new Book();
            $book->setTitle($this->faker->sentence());
            $book->setCoverText($this->faker->text());
            $book->setAuthor($listAuthor[array_rand($listAuthor)]);

            $manager->persist($book);
        }
        $manager->flush();
    }
}
