<?php

use Notes\Domain\Entity\UserBuilder;
use Notes\Persistence\Entity\InMemoryUserRepository;
use Notes\Domain\ValueObject\StringLiteral;


describe('Notes\Persistence\Entity\InMemoryUserRepository', function () {
    beforeEach(function () {
        $this->faker = \Faker\Factory::create();
        $this->repo = new InMemoryUserRepository();
        $this->userBuilder = new UserBuilder();
        $this->userBuilder->setEmail($this->faker->email);
        $this->userBuilder->setFirstName($this->faker->firstName);
        $this->userBuilder->setLastName($this->faker->lastName);
    });
    describe('->__construct()', function () {
        it('should construct an InMemoryUserRepository object', function () {
            expect($this->repo)->to->be->instanceof(
                'Notes\Persistence\Entity\InMemoryUserRepository'
            );
        });
    });
    describe('->add()', function () {
        it('should add one user to the repository', function () {
            $this->repo->add($this->userBuilder->buildManualSet());

            expect($this->repo->count())->to->equal(1);
        });
    });
    describe('->count()', function () {
        it('should return an integer count', function () {
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            $this->userBuilder->setEmail($this->faker->email);
            $this->userBuilder->setFirstName($this->faker->firstName);
            $this->userBuilder->setLastName($this->faker->lastName);
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(2);
        });
    });
    describe('->get()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $actual = $this->repo->get($user);

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getAll()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            $this->userBuilder->setEmail($this->faker->email);
            $this->userBuilder->setFirstName($this->faker->firstName);
            $this->userBuilder->setLastName($this->faker->lastName);
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(2);

            $actual = $this->repo->getAll();

            expect($actual[0])->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual[1])->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getByUserId()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->buildManualSet();
            $id = $user->getId();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $actual = $this->repo->getById($id);
            
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->modify()', function () {
        it('should update a User firstname and lastname', function () {
            $originalUser = $this->userBuilder->buildManualSet();
            $this->repo->add($originalUser);

            expect($this->repo->count())->to->equal(1);

            $testFirstname = $this->faker->firstName;
            $testLastname = $this->faker->lastName;

            $this->userBuilder->setFirstName($testFirstname);
            $this->userBuilder->setLastName($testLastname);
            $newUser = $this->userBuilder->buildManualSet();

            $this->repo->modify($originalUser, $newUser);

            expect($originalUser->getFirstName()->__toString())->to->equal($testFirstname);
            expect($originalUser->getLastName()->__toString())->to->equal($testLastname);
        });
    });
    describe('->modifyById()', function () {
        it('should update a User firstname and lastname', function () {
            $originalUser = $this->userBuilder->buildManualSet();
            $this->repo->add($originalUser);

            expect($this->repo->count())->to->equal(1);

            $testFirstname = $this->faker->firstName;
            $testLastname = $this->faker->lastName;

            $this->userBuilder->setFirstName($testFirstname);
            $this->userBuilder->setLastName($testLastname);
            $newUser = $this->userBuilder->buildManualSet();

            $this->repo->modifyById($originalUser->getId(), $newUser);

            expect($originalUser->getFirstName()->__toString())->to->equal($testFirstname);
            expect($originalUser->getLastName()->__toString())->to->equal($testLastname);
        });
    });
    describe('->remove()', function () {
        it('should remove a User from a repository', function () {
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            expect($this->repo->remove($user))->to->equal(true);
            expect($this->repo->count())->to->equal(0);
        });
    });
    describe('->removeById()', function () {
        it('should remove a User from a repository', function () {
            $user = $this->userBuilder->buildManualSet();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $this->repo->remove($user->getId());
            expect($this->repo->count())->to->equal(0);
        });
    });
});