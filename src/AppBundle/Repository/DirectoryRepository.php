<?php

namespace AppBundle\Repository;

/**
 * DirectoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DirectoryRepository extends \Doctrine\ORM\EntityRepository
{

    public function CountTotalPriceOfClient($id)
    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT SUM(prix_menture + prix_verre) AS total FROM directory p
                WHERE p.client_id = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    
        return $stmt->fetchAll();

    }

    public function CountAvancePriceOfClient($id)
    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT SUM(avance_price) AS avance FROM directory p
                WHERE p.client_id = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    
        return $stmt->fetchAll();

    }


}
