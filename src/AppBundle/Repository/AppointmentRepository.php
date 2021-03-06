<?php

namespace AppBundle\Repository;

/**
 * AppointmentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AppointmentRepository extends \Doctrine\ORM\EntityRepository
{
    public function appointmentday($today)
    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
                SELECT COUNT(id) AS total FROM appointment a
                WHERE a.date = :today
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['today' => $today]);
    
        return $stmt->fetchAll();

    }

}
