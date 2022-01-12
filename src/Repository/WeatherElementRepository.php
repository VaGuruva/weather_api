<?php

namespace App\Repository;

use App\Entity\WeatherElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherElement[]    findAll()
 * @method WeatherElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherElement::class);
    }

    // /**
    //  * @return WeatherElement[] Returns an array of WeatherElement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WeatherElement
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}