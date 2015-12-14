<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/10/15
 * Time: 7:06 PM
 */

namespace Notes\Domain\Entity\UserGroup;

use Notes\Domain\Entity\Role\OwnerRole;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

/**
 * Class Owners
 * @package Domain\Entity\UserGroup
 */
class Owners extends OwnerRole implements UserGroupInterface
{

    /** @var \Notes\Domain\ValueObject\Uuid */
    protected $id;

    /** @var \Notes\Domain\ValueObject\StringLiteral */
    protected $name;

    /** @var \Notes\Domain\Entity\User array */
    protected $users;

    /**
     * @param Uuid $id
     * @param StringLiteral $name
     */
    public function __construct(Uuid $id, StringLiteral $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->users = array();
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->name;
    }

    /**
     * @return \Notes\Domain\ValueObject\Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Notes\Domain\ValueObject\StringLiteral
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param \Notes\Domain\Entity\User $user
     */
    public function addUser($user)
    {
        $this->users[] = $user;
    }

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function removeUser($user)
    {
        if(($key = array_search($user, $this->users)) !== false) {
            unset($this->users[$key]);
        }

        return $key;
    }

}