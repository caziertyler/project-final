<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/3/15
 * Time: 7:20 PM
 */

use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserGroup\Admins;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

describe('Notes\Domain\Entity\UserGroup\Admins', function () {
    describe('-->__construct()', function () {
        it('should construct a new Admins object', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $admins = new Admins(new Uuid(), $groupName);

            expect($admins)->to->be->instanceof('Notes\Domain\Entity\UserGroup\Admins');
        });
    });
    describe('-->__toString()', function () {
        it('should return Admins group name', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $admins = new Admins(new Uuid(), $groupName);

            expect($admins->__toString())->equal($groupName);
        });
    });
    describe('-->getName()', function () {
        it('should return Admins group name', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $admins = new Admins(new Uuid(), $groupName);

            expect($admins->getName())->equal($groupName);
        });
    });
    describe('-->addUser()', function () {
        it('should add a new User object', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $user = new User (new Uuid(), new StringLiteral($faker->firstName),
                    new StringLiteral($faker->lastName),
                    new StringLiteral($faker->email));
            $admins = new Admins(new Uuid(), $groupName);
            $admins->addUser($user);

            expect($admins->getUsers()[0])->equal($user);
        });
    });
    describe('-->getUsers()', function () {
        it('should return User array', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $admins = new Admins(new Uuid(), $groupName);
            $users = [];

            for ($i=0;$i<10;$i++){
                $user = new User (new Uuid(), new StringLiteral($faker->firstName), new StringLiteral($faker->lastName), new StringLiteral($faker->email));
                $users[]=$user;
                $admins->addUser($user);
            }

            for ($i=0;$i<10;$i++)
            {
                expect($admins->getUsers()[$i])->equal($users[$i]);
            }
        });
    });
    describe('-->removeUser()', function () {
        it('should remove $user object from Admins', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $user = new User (new Uuid(), new StringLiteral($faker->firstName), new StringLiteral($faker->lastName), new StringLiteral($faker->email));
            $admins = new Admins(new Uuid(), $groupName);
            $admins->addUser($user);

            $key = $admins->removeUser($user);

            expect($admins->getUsers()[$key])->to->be->null;
        });
    });
});