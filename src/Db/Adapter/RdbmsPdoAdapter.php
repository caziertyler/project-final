<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:14 PM
 */

namespace Notes\Db\Adapter;

use Notes\Db\Adapter\PDO;


/**
 * Class PdoAdapter
 * @package Notes\Db\Adapter
 */
class RdbmsPdoAdapter implements RdbmsAdapterInterface
{
    /** @var  string */
    protected $dsn;

    /** @var  string */
    protected $password;

    /** @var  string */
    protected $username;

    /** @var  \PDO */
    protected $db;

    /**
     * @param $dsn
     * @param $username
     * @param $password
     */
    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->password = $password;
        $this->db = null;
        $this->username = $username;
    }

    /**
     * @return bool
     */
    public function connect()
    {
        try{
            $this->db = new \PDO($this->dsn, $this->username, $this->password);
            return true;
        } catch (\PDOException $e) {
            die($e->getCode() . '; ' . $e->getMessage());
            return false;
        }

    }

    /**
     * @param $table
     * @return int
     */
    public function count($table)
    {
        try {
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $statement = $this->db->prepare("SELECT * FROM {$table}");
            $statement->execute();
            $count = $statement->rowCount();
            $this->db->commit();
            return $count;
        }  catch(Exception $e)  {
            die($e->getCode() . '; ' . $e->getMessage());
            return false;
        }

    }

    /**
     * @return bool
     */
    public function close()
    {
        try {
            unset($this->db);
            return true;
        }  catch(Exception $e)  {
            die($e->getCode() . '; ' . $e->getMessage());
            return false;
        }

    }

    /**
     * @param $table
     * @param $criteria
     * @return mixed
     */
    public function delete($table, $criteria)
    {
        try {
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->db->beginTransaction();
            $statement = $this->db->prepare("DELETE FROM {$table} WHERE {$criteria}");
            $this->db->exec($statement);
            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            echo $e->getCode() . '; ' . $e->getMessage();
            return false;
        }
    }

    /**
     * @param $table
     * @param $data
     * @return mixed
     */
    public function insert($table, $data)
    {
        try {
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->db->beginTransaction();
            $statement = $this->db->prepare("INSERT INTO {$table} VALUES ({$data})");
            $this->db->exec($statement);
            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            echo $e->getCode() . '; ' . $e->getMessage();
            return false;
        }
    }

    /**
     * @param $table
     * @param $criteria
     * @return mixed
     */
    public function select($table, $criteria)
    {
        try {
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $statement = $this->db->prepare("SELECT * FROM {$table} WHERE {$criteria}");
            $statement->execute(array(':name' => "Jimbo"));
            $results = $statement->fetchAll($statement->fetch());
            $this->db->commit();
            return $results;

        } catch (Exception $e) {
            $this->db->rollBack();
            echo $e->getCode() . '; ' . $e->getMessage();
            return false;
        }
    }

    /**
     * @param $table
     * @param $data
     * @param $criteria
     * @return mixed
     */
    public function update($table, $data, $criteria)
    {
        try {
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $statement = $this->db->prepare("UPDATE {$table} SET {$data} WHERE {$criteria}");
            $this->db->exec($statement);
            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            echo $e->getCode() . '; ' . $e->getMessage();
            return false;
        }
    }
}