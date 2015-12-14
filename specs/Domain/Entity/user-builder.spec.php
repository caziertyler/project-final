<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 4:54 PM
 */

Use Notes\Domain\Entity\UserBuilder;


describe('Notes\Domain\Entity\UserBuilder', function () {
    describe('->__construct()', function () {
        it('should create a new UserBuilder object', function () {
            $actual = new UserBuilder();

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\UserBuilder');
        });
    });
    describe('->build()', function () {
        it('should create a new User object', function () {
            $builder = new UserBuilder();
            $faker = \Faker\Factory::create();
            $firstname = $faker->firstName;
            $lastname = $faker->lastName;
            $email = $faker->email;
            $actual = $builder->build($firstname, $lastname, $email);

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->buildManualSet()', function () {
        it('should create a new User object', function () {
            $builder = new UserBuilder();
            $faker = \Faker\Factory::create();
            $builder->setFirstName($faker->firstName);
            $builder->setLastName($faker->lastName);
            $builder->setEmail($faker->email);
            $actual = $builder->buildManualSet();

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->setEmail()', function () {
        it('should change the email property of this UserBuilder object.', function () {
            $builder = new UserBuilder();
            $faker = \Faker\Factory::create();
            $email= $faker->email;

            $builder->setEmail($email);

            expect($builder->getEmail())->equal($email);
        });
    });
    describe('->setFirstname()', function () {
        it('should change the firstname property of this UserBuilder object.', function () {
            $builder = new UserBuilder();
            $faker = \Faker\Factory::create();
            $firstname = $faker->firstName;

            $builder->setFirstname($firstname);

            expect($builder->getFirstname())->equal($firstname);
        });
    });
    describe('->setLastname()', function () {
        it('should change the lastname property of this UserBuilder object.', function () {
            $builder = new UserBuilder();
            $faker = \Faker\Factory::create();
            $lastname = $faker->userName;

            $builder->setLastname($lastname);

            expect($builder->getLastname())->equal($lastname);
        });
    });
});