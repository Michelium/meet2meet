<?php

namespace App\Repository;

use App\Entity\LanguageUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LanguageUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method LanguageUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method LanguageUser[]    findAll()
 * @method LanguageUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageUserRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, LanguageUser::class);
    }

    // /**
    //  * @return LanguageUser[] Returns an array of LanguageUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LanguageUser
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
