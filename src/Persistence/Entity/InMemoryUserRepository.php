<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/17/15
 * Time: 6:45 PM
 */

namespace Notes\Persistence\Entity;

use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\ValueObject\Uuid;

/**
 * Class InMemoryUserRepository
 * @package Notes\Persistence\Entity
 */
class InMemoryUserRepository implements UserRepositoryInterface
{
    /** @var array */
    protected $users;


    /**
     * InMemoryUserRepository constructor
     */
    public function __construct()
    {
        $this->users = [];
    }

    /**
     * @param User $user
     */
    public function add(User $user)
    {
        $this->users[] = $user;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->users);
    }

    /**
     * @param User $userToGet
     * @return mixed
     */
    public function get(User $userToGet)
    {
        $results = [];

        foreach($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $userToGet */
            if ($user->getId()->__toString() === $userToGet->getId()->__toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->users;
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return array
     */
    public function getById(Uuid $id)
    {
        $results = [];

        foreach($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $user */
            if ($user->getId()->__toString() === $id->__toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param \Notes\Domain\Entity\User $search
     * @param \Notes\Domain\Entity\User $newUser
     */
    public function modify(User $search, User $newUser)
    {
        $results = [];

        foreach($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $userToGet */
            if ($user->__toString() === $search->__toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            $results[0]->setFirstName($newUser->getFirstName());
            $results[0]->setLastName($newUser->getLastName());
        }

        foreach ($results as $user)
        {
            $user->setFirstName($newUser->getFirstName());
            $user->setLastName($newUser->getLastName());
        }
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $search
     * @param \Notes\Domain\Entity\User $newUser
     */
    public function modifyById(Uuid $search, User $newUser)
    {
        $results = [];

        foreach($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $userToGet */
            if ($user->getId()->__toString() === $search->__toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            $results[0]->setFirstName($newUser->getFirstName());
            $results[0]->setLastName($newUser->getLastName());
        }

        foreach ($results as $user)
        {
            $user->setFirstName($newUser->getFirstName());
            $user->setLastName($newUser->getLastName());
        }
    }

    /**
     * @param \Notes\Domain\Entity\User $userUser $user
     * @return bool
     */
    public function remove(User $user)
    {
        foreach($this->users as $i => $user) {
            /** @var \Notes\Domain\Entity\User $user */
            if ($user->getId()->__toString() === $user->getId()->__toString()) {
                unset($this->users[$i]);
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return bool
     */
    public function removeByUserId(Uuid $id)
    {
        foreach($this->users as $i => $user) {
            /** @var \Notes\Domain\Entity\User $user*/
            if ($user->getId()->__toString() === $id->__toString()) {
                unset($this->users[$i]);
                return true;
            }
        }

        return false;
    }
}