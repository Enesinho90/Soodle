<?php

namespace App\Repository;

use App\Entity\Affectation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Affectation>
 */
class AffectationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Affectation::class);
    }
    public function findByUEId(int $id)
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.uniteEnseignement', 'ue') // On fait la jointure avec l'entité UniteEnseignement
            ->andWhere('ue.id = :id') // On filtre par l'ID de l'unité d'enseignement
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
    public function findUEByUserId(int $userId)
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.uniteEnseignement', 'ue') // On joint vers l'entité UniteEnseignement
            ->addSelect('ue')
            ->andWhere('a.utilisateur = :userId')    // On filtre sur l'utilisateur
            ->setParameter('userId', $userId)             // On récupère directement les unités d'enseignement
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Affectation[] Returns an array of Affectation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Affectation
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
