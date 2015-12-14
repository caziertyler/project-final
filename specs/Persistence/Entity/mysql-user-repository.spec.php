<?php

use Notes\Domain\Entity\UserBuilder;
use Notes\Persistence\Entity\MysqlUserRepository;
use Notes\Db\Adapter\RdbmsPdoAdapter;


describe('Notes\Persistence\Entity\MysqlUserRepository', function () {
    beforeEach(function () {
        $this->dsn = 'mysql:host=127.0.0.1;dbname=notes_api';
        $this->username = 'caziertyler';
        $this->password = 'N0t3s4dm1n';
        $this->table = 'users';
        $this->faker = \Faker\Factory::create();
        $this->userBuilder = new UserBuilder();
        $this->email = $this->faker->email;
        $this->userBuilder->setEmail($this->email);
        $this->firstName = $this->faker->firstName;
        $this->userBuilder->setFirstName($this->firstName);
        $this->lastName = $this->faker->lastName;
        $this->userBuilder->setLastName($this->lastName);
        $this->user = $this->userBuilder->buildManualSet();
        $this->db = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
        $this->repo = new MysqlUserRepository($this->db, $this->table);

    });
    describe('->__construct()', function () {
        it('should construct an MysqlUserRepository object', function () {
            expect($this->repo)->to->be->instanceof(
                'Notes\Persistence\Entity\MysqlUserRepository'
            );
        });
    });
    describe('->add()', function () {
        it('should add one user to the repository', function () {
            $this->repo->add($this->userBuilder->build());

            expect($this->repo->count())->not->to->equal(false);
        });
    });
    describe('->count()', function () {
        it('should return an integer count', function () {
            $this->repo->add($user);

            $this->userBuilder->setEmail($this->faker->email);
            $this->userBuilder->setFirstName($this->faker->firstName);
            $this->userBuilder->setLastName($this->faker->lastName);
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(2);
        });
    });
    describe('->get()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $actual = $this->repo->get($user);

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getAll()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            $this->userBuilder->setEmail($this->faker->email);
            $this->userBuilder->setFirstName($this->faker->firstName);
            $this->userBuilder->setLastName($this->faker->lastName);
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(2);

            $actual = $this->repo->getAll();

            expect($actual[0])->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual[1])->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getByUserId()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->build();
            $id = $user->getId();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $actual = $this->repo->getById($id);

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->modify()', function () {
        it('should update a User firstname and lastname', function () {
            $originalUser = $this->userBuilder->build();
            $this->repo->add($originalUser);

            expect($this->repo->count())->to->equal(1);

            $testFirstname = $this->faker->firstName;
            $testLastname = $this->faker->lastName;

            $this->userBuilder->setFirstName($testFirstname);
            $this->userBuilder->setLastName($testLastname);
            $newUser = $this->userBuilder->build();

            $this->repo->modify($originalUser, $newUser);

            expect($originalUser->getFirstName()->__toString())->to->equal($testFirstname);
            expect($originalUser->getLastName()->__toString())->to->equal($testLastname);
        });
    });
    describe('->modifyById()', function () {
        it('should update a User firstname and lastname', function () {
            $originalUser = $this->userBuilder->build();
            $this->repo->add($originalUser);

            expect($this->repo->count())->to->equal(1);

            $testFirstname = $this->faker->firstName;
            $testLastname = $this->faker->lastName;

            $this->userBuilder->setFirstName($testFirstname);
            $this->userBuilder->setLastName($testLastname);
            $newUser = $this->userBuilder->build();

            $this->repo->modifyById($originalUser->getId(), $newUser);

            expect($originalUser->getFirstName()->__toString())->to->equal($testFirstname);
            expect($originalUser->getLastName()->__toString())->to->equal($testLastname);
        });
    });
    describe('->remove()', function () {
        it('should remove a User from a repository', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            expect($this->repo->remove($user))->to->equal(true);
            expect($this->repo->count())->to->equal(0);
        });
    });
    describe('->removeById()', function () {
        it('should remove a User from a repository', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $this->repo->remove($user->getId());
            expect($this->repo->count())->to->equal(0);
        });
    });
});