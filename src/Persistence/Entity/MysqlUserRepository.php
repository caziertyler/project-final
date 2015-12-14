<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:05 PM
 */

namespace Notes\Persistence\Entity;

use Notes\Db\Adapter\RdbmsPdoAdapter;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\ValueObject\Uuid;

/**
 * Class MysqlUserRepository
 * @package Notes\Persistence\Entity
 */
class MysqlUserRepository implements UserRepositoryInterface
{

    /** @var array */
    protected $db;

    /** @var array */
    protected $tableName;

    /**
     * InMemoryUserRepository constructor
     */
    public function __construct(RdbmsPdoAdapter $db, string $tableName)
    {
        $this->db = $db;
        $this->tableName = $tableName;
    }

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user)
    {
        $result = $this->db->insert($this->tableName, "'{$this->user->getID()->__ToString()}',
        '{$this->user->email}', '{$this->user->firstName}', '{$this->user->lastName}'");

        return $result;
    }

    /**
     * @return int
     */
    public function count()
    {
        $this->db->count($this->table);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @param \Notes\Domain\Entity\User $ user
     * @return mixed
     */
    public function get(User $user)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param \Notes\Domain\ValueObject $id
     * @return mixed
     */
    public function getByUserId(User $id)
    {
        // TODO: Implement getByUserId() method.
    }

    /**
     * @param \Notes\Domain\Entity\User $ search
     * @param \Notes\Domain\Entity\User $ modify
     *
     * @return mixed
     */
    public function modify(User $search, User $modify)
    {
        // TODO: Implement modify() method.
    }

    /**
     * @param \Notes\Domain\ValueObject $id
     * @return mixed
     */
    public function modifyByUserId(User $id)
    {
        // TODO: Implement modifyByUserId() method.
    }

    /**
     * @param \Notes\Domain\Entity\User $ user
     * @return mixed
     */
    public function remove(User $user)
    {
        $result = $this->db->remove($this->tableName, "'{$this->user->getID()->__ToString()}',
        '{$this->user->email}', '{$this->user->firstName}', '{$this->user->lastName}'");

        return $result;
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return bool
     */
    public function removeByUserId(Uuid $id)
    {
        // TODO: Implement removeByUserId() method.
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return array
     */
    public function getById(Uuid $id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $search
     * @param \Notes\Domain\Entity\User $newUser
     */
    public function modifyById(Uuid $search, User $newUser)
    {
        // TODO: Implement modifyById() method.
    }
}