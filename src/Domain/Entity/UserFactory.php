<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/17/15
 * Time: 6:16 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\Entity;
use Notes\Domain\ValueObject\Uuid;
use Notes\Domain\FactoryInterface;

/**
 * Class UserFactory
 * @package Notes\Domain\Entity
 */
class UserFactory implements FactoryInterface
{
    /**
     * @return \Notes\Domain\Entity\User
     */
    public function create()
    {
        return new User(new Uuid());
    }
}