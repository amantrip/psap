<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Login to PSAP Database');

# Login Admin User
$I->amOnPage('/');
$I->click('Admin Access');

$I->seeCurrentUrlEquals('/login');

$I->fillField('username', 'amantrip');
$I->fillField('password', '12345');
$I->click('Login');

$I->seeCurrentUrlEquals('/admin');

$I->amOnPage('/logout');

$I->seeCurrentUrlEquals('');

# Login Private User
$I->amOnPage('/');
$I->click('Private Access');

$I->seeCurrentUrlEquals('/login');

$I->fillField('username', 'amantrip2');
$I->fillField('password', '12345');
$I->click('Login');

$I->seeCurrentUrlEquals('/private');

$I->amOnPage('/logout');

$I->seeCurrentUrlEquals('');

# Login Bad User
$I->amOnPage('/');
$I->click('Private Access');

$I->seeCurrentUrlEquals('/login');

$I->fillField('username', 'amantrip5');
$I->fillField('password', '12345');
$I->click('Login');

$I->seeCurrentUrlEquals('/login');
