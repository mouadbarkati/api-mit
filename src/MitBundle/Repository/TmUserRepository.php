<?php

namespace MitBundle\Repository;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \Doctrine\ORM\EntityRepository;

/**
 * Description of TmUserRepository
 *
 * @author mouad
 */
class TmUserRepository extends EntityRepository {

    public function getOneUser($id) {
        $query = $this->createQueryBuilder('u')
                ->select('u.uId', 'u.uNom', 'u.uPrenom', 'u.uMail')
                ->where('u.uId =:id')
                ->setParameter('id', $id)

        ;
        return $query->getQuery()->getOneOrNullResult(2);
    }

    public function getallusers() {
        $query = $this->createQueryBuilder('u')
                ->select('u.uId', 'u.uNom', 'u.uPrenom', 'u.uMail')
        ;
        return $query->getQuery()->getResult(2);
    }

}
