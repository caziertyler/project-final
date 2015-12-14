<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/3/15
 * Time: 7:20 PM
 */

use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserGroup\Owners;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

describe('Notes\Domain\Entity\UserGroup\Owners', function () {
    describe('-->__construct()', function () {
        it('should construct a new Owners object', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $owners = new Owners(new Uuid(), $groupName);

            expect($owners)->to->be->instanceof('Notes\Domain\Entity\UserGroup\Owners');
        });
    });
    describe('-->__toString()', function () {
        it('should return Owners group name', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $owners = new Owners(new Uuid(), $groupName);

            expect($owners->__toString())->equal($groupName);
        });
    });
    describe('-->getName()', function () {
        it('should return Owners group name', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $owners = new Owners(new Uuid(), $groupName);

            expect($owners->getName())->equal($groupName);
        });
    });
    describe('-->addUser()', function () {
        it('should add a new User object', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $user = new User (new Uuid(), new StringLiteral($faker->firstName),
                new StringLiteral($faker->lastName),
                new StringLiteral($faker->email));
            $owners = new Owners(new Uuid(), $groupName);
            $owners->addUser($user);

            expect($owners->getUsers()[0])->equal($user);
        });
    });
    describe('-->getUsers()', function () {
        it('should return User array', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $owners = new Owners($groupName);
            $users = [];

            for ($i=0;$i<10;$i++){
                $user = new User (new Uuid(), new StringLiteral($faker->firstName), new StringLiteral($faker->lastName), new StringLiteral($faker->email));
                $users[]=$user;
                $owners->addUser($user);
            }

            for ($i=0;$i<10;$i++)
            {
                expect($owners->getUsers()[$i])->equal($users[$i]);
            }
        });
    });
    describe('-->removeUser()', function () {
        it('should remove $user object from Owners', function () {
            $faker = \Faker\Factory::create();
            $groupName = new StringLiteral($faker->name);
            $user = new User (new Uuid(), new StringLiteral($faker->firstName), new StringLiteral($faker->lastName), new StringLiteral($faker->email));
            $owners = new Owners(new Uuid(), $groupName);
            $owners->addUser($user);

            $key = $owners->removeUser($user);

            expect($owners->getUsers()[$key])->to->be->null;
        });
    });
});