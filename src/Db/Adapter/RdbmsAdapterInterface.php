<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:11 PM
 */

namespace Notes\Db\Adapter;

interface RdbmsAdapterInterface extends DbAdapterInterface
{
    /**
     * @param $table
     * @param $criteria
     * @return mixed
     */
    public function delete($table, $criteria);

    /**
     * @param $table
     * @param $data
     * @return mixed
     */
    public function insert($table, $data);

    /**
     * @param $table
     * @param $criteria
     * @return mixed
     */
    public function select($table, $criteria);

    /**
     * @param $table
     * @param $data
     * @param $criteria
     * @return mixed
     */
    public function update($table, $data, $criteria);
}