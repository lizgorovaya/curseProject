<?php

namespace App\Repository;

use App\Entity\Product;
use App\Filter\ProductFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);

    }
    public function getProduct(): array
    {
       return $this->createQueryBuilder('p')->setMaxResults('6')->getQuery()->getResult();
    }

    public function findByProductFilter(ProductFilter $productFilter){
        $product= $this->createQueryBuilder('p');

        if($productFilter->getUser()){
            $product
                ->where('p.user = :user')
                ->setParameter('user', $productFilter->getUser());
        }

        if($productFilter->getName()){
            $product
                ->where('p.name LIKE :name')
                ->setParameter('name', '%'.$productFilter->getName() .'%');
        }
            return $product->getQuery()->getResult();
    }
//    public function findAllSortedByTitle()
//    {
//    $qb = $this->entityManager->createQueryBuilder();
//    $qb->select('p')
//        ->from(Product::class, 'p')
//        ->orderBy('p.name', 'ASC');
//
//    return $qb->getQuery()->getResult();
//    }
    //    /**
    //     * @return Product[] Returns an array of Product objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Product
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
