<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/17/15
 * Time: 6:11 PM
 */

use Notes\Domain\Entity\UserFactory;

describe('Notes\Domain\Entity\UserFactory', function () {
    describe('->__construct()', function () {
        it('should create a new UserFactory object', function () {
            $actual = new UserFactory();

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\UserFactory');
        });
    });
    describe('->__create()', function () {
        it('should be a new User object', function () {
            $factory = new UserFactory();
            $actual = $factory->create();

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
});