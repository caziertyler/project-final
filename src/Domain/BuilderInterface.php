<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 4:56 PM
 */

namespace Notes\Domain;

use Notes\Domain\ValueObject\StringLiteral;

/**
 * Interface BuilderInterface
 * @package Notes\Domain
 */
/**
 * Interface BuilderInterface
 * @package Notes\Domain
 */
interface BuilderInterface
{
    /**
     * @param StringLiteral $firstName
     * @param StringLiteral $lastName
     * @param StringLiteral $email
     */
    public function build(StringLiteral $email, StringLiteral $firstName, StringLiteral $lastName);
}