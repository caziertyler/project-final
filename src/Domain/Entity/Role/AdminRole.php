<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 8:36 PM
 */

namespace Notes\Domain\Entity\Role;

/**
 * Class AdminRole
 * @package Notes\Domain\Entity\Role
 */
class AdminRole extends RoleAbstract implements RoleInterface
{
    public function __construct(Uuid $roleId)
    {
        parent::__construct($roleId);

        $this->rolePermissions[] = Permissions::ADD_USERS;
        $this->rolePermissions[] = Permissions::GET_USERS;
        $this->rolePermissions[] = Permissions::MODIFY_USERS;
        $this->rolePermissions[] = Permissions::REMOVE_USERS;
    }

    /**
     * @return \Notes\Domain\ValueObject\Uuid
     */
    public function getID()
    {
        return $this->roleId;
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->rolePermissions;
    }
}