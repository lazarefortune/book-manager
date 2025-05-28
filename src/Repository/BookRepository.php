<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findByCategoryName(string $name): array
    {
        return $this->createQueryBuilder('b')
            ->leftJoin('b.category', 'c')
            ->addSelect('c')
            ->andWhere('c.name = :name')
            ->setParameter('name', $name)
            ->orderBy('b.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

}
