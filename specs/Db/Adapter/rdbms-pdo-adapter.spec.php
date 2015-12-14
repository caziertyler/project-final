<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:09 PM
 */

use Notes\Db\Adapter\RdbmsPdoAdapter;
use Notes\Domain\Entity\UserBuilder;

describe('Notes\Db\Adapter\RdbmsPdoAdapter', function () {
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
    });
    describe('->__construct()', function () {
        it('should return a RdbmsPdoAdapter object', function () {
            $actual = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);

            expect($actual)->to->be->instanceof('Notes\Db\Adapter\RdbmsPdoAdapter');
        });
    });
    describe('->open()', function () {
        it('should open a connection on the specified database', function () {
            $pdoAdapter = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            expect($pdoAdapter->connect())->to->equal(true);
        });
    });
    describe('->close()', function () {
        it('should close a connection on the specified database', function () {
            $pdoAdapter = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            expect($pdoAdapter->close())->to->equal(true);
        });
    });
    describe('->count()', function () {
        it('should close a connection on the specified database', function () {
            $pdoAdapter = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            expect($pdoAdapter->connect())->to->equal(true);
            expect($pdoAdapter->count($this->table))->not->to->equal(false);
        });
    });
    describe('->delete()', function () {
        it('should remove a row or rows from the specified table', function () {
            $db = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            $db->connect();
            expect(
                $db->insert($this->table, "'{$this->user->getID()->__ToString()}', '{$this->email}', '{$this->firstName}', '{$this->lastName}'")
            )->to->equal(true);
            expect(
                $db->delete($this->table, "Id = '{$this->user->getID()->__ToString()}'")
            )->to->equal(true);
        });
    });
    describe('->insert()', function () {
        it('should insert a row or rows into the specified table', function () {
            $db = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            $db->connect();
            expect(
                $db->insert($this->table, "'{$this->user->getID()->__ToString()}', '{$this->email}', '{$this->firstName}', '{$this->lastName}'")
            )->to->equal(true);

        });
    });
    describe('->select()', function () {
        it('should select a row or rows in the specified table', function () {
            $db = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            $db->connect();
            expect(
                $db->insert($this->table, "'{$this->user->getID()->__ToString()}', '{$this->email}', '{$this->firstName}', '{$this->lastName}'")
            )->to->equal(true);
            expect(
                $db->select($this->table, "Id = '{$this->user->getID()->__ToString()}'", "firstname = '{$this->firstName}'")
            )->not->to->equal(false);
        });
    });
    describe('->update()', function () {
        it('should update a row or rows in the specified table', function () {
            $db = new RdbmsPdoAdapter($this->dsn, $this->username, $this->password);
            $db->connect();
            expect(
                $db->insert($this->table, "'{$this->user->getID()->__ToString()}', '{$this->email}', '{$this->firstName}', '{$this->lastName}'")
            )->to->equal(true);
            expect(
                $db->update($this->table, "Id = '{$this->user->getID()->__ToString()}'", "firstname = '{$this->firstName}'")
            )->to->equal(true);
        });
    });
});