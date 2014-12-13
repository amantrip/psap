<?php
$I = new FunctionalTester($scenario);
$I->wantTo('Test API');

# Test PSAP ID
$I->amOnPage('/public/api?id=2');
$I->see('psapid');

# Test PSAP Name
$I->amOnPage('/public/api?name=Orangetown');
$I->see('psapid');

#Test State
$I->amOnPage('/public/api?state=TX');
$I->see('psapid');

#Test County
$I->amOnPage('/public/api?county=Clay');
$I->see('psapid');

#Test City
$I->amOnPage('/public/api?city=Dallas');
$I->see('psapid');