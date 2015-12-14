<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 5:04 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\BuilderInterface;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;
use Symfony\Component\DependencyInjection\Exception\BadMethodCallException;

class UserBuilder implements BuilderInterface
{
    /** @var  string */
    protected $email;

    /** @var  string */
    protected $firstName;

    /** @var  \Notes\Domain\ValueObject\Uuid */
    protected $id;

    /** @var  string */
    protected $lastName;

    /**
     * @param StringLiteral $firstName
     * @param StringLiteral $lastName
     * @param StringLiteral $email
     * @return User
     * @throws BadMethodCallException
     */
    public function build(StringLiteral $email, StringLiteral $firstName, StringLiteral $lastName)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        if ($this->email === null || $this->firstName === null || $this->lastName === null) {
            throw new BadMethodCallException(
                __METHOD__. '(): requires that an email address, firstname, and lastname be set for a new user.'
            );
        } else {
            return new User(new Uuid, new StringLiteral($this->firstName), new StringLiteral($this->lastName), new StringLiteral($this->email));
        }
    }

    /**
     * s@return User
     * @throws BadMethodCallException
     */
    public function buildManualSet()
    {
        if ($this->email === null || $this->firstName === null || $this->lastName === null) {
            throw new BadMethodCallException(
                __METHOD__. '(): requires that an email address, firstname, and lastname be set for a new user.'
            );
        } else {
            return new User(new Uuid, new StringLiteral($this->firstName), new StringLiteral($this->lastName), new StringLiteral($this->email));
        }
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName (string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName ()
    {
        return $this->lastName;
    }
}