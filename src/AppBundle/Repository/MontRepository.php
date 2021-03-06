<?php

namespace AppBundle\Repository;

/**
 * MontRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MontRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * count total prices mont directory client
     */
    public function CountTotalPriceMontOfClient($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
                SELECT SUM(m.prix_mont + m.prix_verre) as totalmont FROM `mont` as m WHERE m.client_id = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    /**
     * count total prices lentil directory client
     */
    public function CountTotalPriceLentilOfClient($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
                SELECT SUM(l.lenprix) as totalentil FROM `lentile` as l WHERE l.`client_id` = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    /**
     * count total avance prices mont directory client
     */    
    public function CountAvancePriceMontOfClient($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
                SELECT SUM(avance) as totalavancemont from avance a, mont m WHERE (a.mont_id = m.id AND m.client_id = :id) 
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    /**
     * count total avance prices mont directory client
     */  
    public function CountAvancePriceLentilOfClient($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
                SELECT SUM(avance) as totalavancelentil from avance a, lentile l WHERE (l.id = a.lent_id AND l.client_id = :id) 
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function updatetotalprice($id,$newtotal)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = ' 
                UPDATE avance SET avance = :newtotal WHERE avance.id = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['newtotal' => $newtotal,'id' => $id]);
    }

    public function avance_array()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
                SELECT `mont_id`,SUM(avance) as total_avance FROM `avance` GROUP BY mont_id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

/*
    public function totalbyonedate($date)
    {

        $conn = $this->getEntityManager()->getConnection();

        $monture = '
                SELECT sum(prix_mont)- sum(Prixachat)
                FROM mont
                INNER JOIN stock
                ON  mont.ref_mont = stock.Refproduit
                WHERE mont.date = :date
            ';
        $stmt1 = $conn->prepare($monture);
        $stmt1->execute(['date' => $date]);
        $totalmont = $stmt1->fetchAll();

        $monture = '
                SELECT sum(prix_verre),sum(Prixachat)
                FROM mont
                INNER JOIN stock
                ON  mont.ref_verre = stock.Refproduit 
                WHERE mont.date = :date
            ';
        $stmt2 = $conn->prepare($monture);
        $stmt2->execute(['date' => $date]);
        $totalverre = $stmt2->fetchAll();

        return $totalmont + $totalverre;

    }

    public function totalbytowdate($startdate,$enddate)
    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT SUM(prix_mont + prix_verre) AS total FROM mont p
                WHERE p.client_id = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    
        return $stmt->fetchAll();

    }
*/  

    public function statistique()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = ' 
            SELECT m.`id`,m.client_id,m.`prix_mont`,m.`prix_verre`,s.Prixachat,`date_prestation` 
            FROM mont m , stock s where s.Refproduit = m.`ref_mont` or s.Refproduit = m.`ref_verre`
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function sumTotal()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = ' 
                SELECT SUM(`prix_mont`) + SUM(`prix_verre`) as total FROM `mont`
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function sumTotalOfDirectory($idirectory)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = ' 
                SELECT SUM(`prix_mont`) + SUM(`prix_verre`) as total FROM `mont` where id =: idirectory
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}
