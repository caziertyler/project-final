<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/17/15
 * Time: 6:08 PM
 */

namespace Notes\Domain;


interface FactoryInterface
{
    /**
     * @return mixed
     */
    public function create();

}