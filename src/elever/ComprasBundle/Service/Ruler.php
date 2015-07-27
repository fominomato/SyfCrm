<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 12/07/2015
 * Time: 17:19
 */

namespace elever\ComprasBundle\Service;

use PrincipalBundle\Entity\EbUsuario;

class Ruler {

    protected $user;

    public function __construct(EbUsuario $user)
    {
        $this->user = $user;
    }


} 