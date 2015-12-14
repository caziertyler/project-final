<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 8:38 PM
 */

use Notes\Domain\Entity\Role\OwnerRole;
use Notes\Domain\ValueObject\Uuid;

describe('Notes\Domain\Entity\Role\OwnerRole', function () {
    describe('-->__construct()', function () {
        it('should construct a new OwnerRole object', function () {
            $faker = \Faker\Factory::create();
            $ownerRole = new OwnerRole($faker->uuid);

            expect($ownerRole)->to->be->instanceof('Notes\Domain\Entity\Role\OwnerRole');
        });
    });
    describe('-->getId()', function () {
        it('should return the OwnerRole roleId', function () {
            $faker = \Faker\Factory::create();
            $roleId = $faker->uuid;
            $ownerRole = new OwnerRole($roleId);

            expect($ownerRole->getId())->equal($roleId);
        });
    });
    describe('-->getPermissions()', function () {
        it('should return the OwnerRole roleId', function () {
            $ownerRole = new OwnerRole(new Uuid);

            for ($i = 0; $i < 4; $i++)
                expect($ownerRole->getPermissions()[$i])->equal($i);
        });
    });
});