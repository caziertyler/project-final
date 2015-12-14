<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:31 PM
 */

namespace Notes\Db\Adapter;

/**
 * Interface DbAdapterInterface
 * @package Notes\Db\Adapter
 */
interface DbAdapterInterface
{
    /**
     * @return mixed
     */
    public function close();

    /**
     * @return mixed
     */
    public function connect();
}