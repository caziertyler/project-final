<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 8:41 PM
 */

namespace Notes\Domain\Entity\Role;

use Notes\Domain\ValueObject\Uuid;

abstract class RoleAbstract
{
    /** @var  \Notes\Domain\ValueObject\Uuid */
    protected $roleId;

    /** @var array */
    protected $rolePermissions;

    public function __construct(Uuid $roleId)
    {
        $this->roleId = $roleId;
        $this->rolePermissions = [];
    }

}