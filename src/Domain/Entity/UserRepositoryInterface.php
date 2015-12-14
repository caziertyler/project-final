<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/17/15
 * Time: 5:50 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\ValueObject\Uuid;


interface UserRepositoryInterface
{
    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user);

    /**
     * @return int
     */
    public function count();

    /**
     * @param \Notes\Domain\Entity\User $ user
     * @return mixed
     */
    public function get(User $user);

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return array
     */
    public function getById(Uuid $id);

    /**
     * @param \Notes\Domain\Entity\User $search
     * @param \Notes\Domain\Entity\User $newUser
     */
    public function modify(User $search, User $newUser);

    /**
     * @param \Notes\Domain\ValueObject\Uuid $search
     * @param \Notes\Domain\Entity\User $newUser
     */
    public function modifyById(Uuid $search, User $newUser);

    /**
     * @param \Notes\Domain\Entity\User $userUser $user
     * @return bool
     */
    public function remove(User $user);

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return bool
     */
    public function removeByUserId(Uuid $id);
}