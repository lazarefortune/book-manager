<?php
namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATS = [
        'Roman', 'Essai', 'BD', 'Poésie', 'SF',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATS as $name) {
            $cat = (new Category())->setName($name);
            $manager->persist($cat);
            $this->addReference('cat_'.$name, $cat);
        }
        $manager->flush();
    }
}
