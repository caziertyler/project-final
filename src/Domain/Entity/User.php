<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/10/15
 * Time: 5:42 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

/**
 * Class User
 * @package Notes\Domain\Entity
 */
class User
{
    /** @var \Notes\Domain\ValueObject\Uuid */
    protected $id;

    /** @var \Notes\Domain\ValueObject\StringLiteral */
    protected $firstName;

    /** @var \Notes\Domain\ValueObject\StringLiteral */
    protected $lastName;

    /** @var \Notes\Domain\ValueObject\StringLiteral */
    protected $email;

    /**
     * @param StringLiteral $firstName
     * @param StringLiteral $lastName
     * @param StringLiteral $email
     */
    public function __construct(Uuid $id, StringLiteral $firstName, StringLiteral $lastName, StringLiteral $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->firstName . " " . $this->lastName;
    }

    /**
     * @return \Notes\Domain\ValueObject\Uuid
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return \Notes\Domain\ValueObject\StringLiteral
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @return \Notes\Domain\ValueObject\StringLiteral
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @return \Notes\Domain\ValueObject\StringLiteral
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param StringLiteral $firstName
     * @return $this
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param StringLiteral $lastName
     * @return $this
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

}
