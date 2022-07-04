<?php

namespace App\Repository;

use App\Entity\Export;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Export>
 *
 * @method Export|null find($id, $lockMode = null, $lockVersion = null)
 * @method Export|null findOneBy(array $criteria, array $orderBy = null)
 * @method Export[]    findAll()
 * @method Export[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Export::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Export $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Export $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getByDateAndPlace($dateFrom, $dateTo, $place)
    {
        return $this->createQueryBuilder('e')
            ->where('e.place = :place')
            ->andWhere('e.datetime BETWEEN :dateFrom AND :dateTo')
            ->setParameter('dateFrom', $dateFrom )
            ->setParameter( 'dateTo', $dateTo)
            ->setParameter( 'place' , $place)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(30)
            ->getQuery()
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Export
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
