<?php

$I = new FunctionalTester($scenario);
$I->wantTo('Access Public');

$I->amOnPage('/');
$I->click('Public Access');

$I->seeCurrentUrlEquals('/public');
