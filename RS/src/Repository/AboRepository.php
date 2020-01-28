<?php

namespace App\Repository;

use App\Entity\Abo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Abo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Abo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Abo[]    findAll()
 * @method Abo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abo::class);
    }

    // /**
    //  * @return Abo[] Returns an array of Abo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Abo
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
