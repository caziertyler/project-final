<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 8:36 PM
 */

namespace Notes\Domain\Entity\Role;

/**
 * Class OwnerRole
 * @package Notes\Domain\Entity\Role
 */
class OwnerRole extends RoleAbstract implements RoleInterface
{
    public function __construct(Uuid $roleId)
    {
        parent::__construct($roleId);

        $this->rolePermissions[] = Permissions::ADD_NOTES;
        $this->rolePermissions[] = Permissions::GET_NOTES;
        $this->rolePermissions[] = Permissions::MODIFY_NOTES;
        $this->rolePermissions[] = Permissions::REMOVE_NOTES;
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