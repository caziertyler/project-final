<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 12/1/15
 * Time: 10:03 AM
 */

namespace Notes\Domain\Entity\Role;

/**
 * Class Permissions
 * @package Notes\Domain\Entity\Role
 */
class Permissions
{
    const ADD_NOTES = 0;
    const GET_NOTES = 1;
    const MODIFY_NOTES = 2;
    const REMOVE_NOTES = 3;
    const ADD_USERS = 4;
    const GET_USERS = 5;
    const MODIFY_USERS = 6;
    const REMOVE_USERS = 7;
}