<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 8:28 PM
 */

namespace Notes\Domain\Entity\Role;


interface RoleInterface
{
    /**
     * @return \Notes\Domain\ValueObject\Uuid
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getPermissions();
}