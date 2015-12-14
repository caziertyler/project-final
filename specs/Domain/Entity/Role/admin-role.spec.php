<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 8:37 PM
 */

use Notes\Domain\Entity\Role\AdminRole;
use Notes\Domain\ValueObject\Uuid;

describe('Notes\Domain\Entity\Role\AdminRole', function () {
    describe('-->__construct()', function () {
        it('should construct a new AdminRole object', function () {
            $faker = \Faker\Factory::create();
            $adminRole = new AdminRole($faker->uuid);

            expect($adminRole)->to->be->instanceof('Notes\Domain\Entity\Role\AdminRole');
        });
    });
    describe('-->getId()', function () {
        it('should return the AdminRole roleId', function () {
            $faker = \Faker\Factory::create();
            $roleId = $faker->uuid;
            $adminRole = new AdminRole($roleId);

            expect($adminRole->getId())->equal($roleId);
        });
    });
    describe('-->getPermissions()', function () {
        it('should return the AdminRole permissions list', function () {
            $adminRole = new AdminRole(new Uuid);

            for ($i = 0; $i < 4; $i++) {
                expect($adminRole->getPermissions()[$i])->equal($i + 4);
            }
        });
    });
});