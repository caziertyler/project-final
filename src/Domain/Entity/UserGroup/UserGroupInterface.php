<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/3/15
 * Time: 7:23 PM
 */

namespace Notes\Domain\Entity\UserGroup;

/**
 * Interface UserGroupInterface
 * @package Notes\Domain\Entity\UserGroup
 */
interface UserGroupInterface
{
    /**
     * @return \Notes\Domain\ValueObject\Uuid
     */
    public function getId();

    /**
     * @return StringLiteral
     */
    public function getName();

    /**
     * @return array
     */
    public function getUsers();

    /**
     * @param \Notes\Domain\Entity\User $user
     */
    public function addUser($user);

    /**
     * @param \Notes\Domain\Entity\User $user
     */
    public function removeUser($user);
}