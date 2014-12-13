<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Register New User');

#email

# User enters unregistered email
$I->amOnPage('/register');
$I->fillField('username', 'amantrip4');
$I->fillField('accesscode', 'U6L8L');
$I->fillField('email', 'am4227@columbia.edu');
$I->fillField('password', '12345');
$I->fillField('repassword', '12345');
$I->fillField('name', 'Akhilesh');
$I->fillField('company', 'Columbia');
$I->click('Register');
#$I->seeCurrentUrlEquals('/register');
$I->see('Failed!!');

# User enters already existing username
$I->amOnPage('/register');
$I->fillField('username', 'amantrip');
$I->fillField('accesscode', 'U6L8L');
$I->fillField('email', 'akhimantrip@gmail.com');
$I->fillField('password', '12345');
$I->fillField('repassword', '12345');
$I->fillField('name', 'Akhilesh');
$I->fillField('company', 'Columbia');
$I->click('Register');
#$I->seeCurrentUrlEquals('/register');
$I->see('Failed!!');

# User enters incorrect access code
$I->amOnPage('/register');
$I->fillField('username', 'amantrip4');
$I->fillField('accesscode', 'U6L8Lasd');
$I->fillField('email', 'akhimantrip@gmail.com');
$I->fillField('password', '12345');
$I->fillField('repassword', '12345');
$I->fillField('name', 'Akhilesh');
$I->fillField('company', 'Columbia');
$I->click('Register');
#$I->seeCurrentUrlEquals('/register');
$I->see('Failed!!');

# User enters already verified email ID
$I->amOnPage('/register');
$I->fillField('username', 'amantrip4');
$I->fillField('accesscode', 'U6L8L');
$I->fillField('email', 'akhimantripragada@gmail.com');
$I->fillField('password', '12345');
$I->fillField('repassword', '12345');
$I->fillField('name', 'Akhilesh');
$I->fillField('company', 'Columbia');
$I->click('Register');
#$I->seeCurrentUrlEquals('/register');
$I->see('Failed!!');

# User enters correct credentials
$I->amOnPage('/register');
$I->fillField('username', 'amantrip4');
$I->fillField('accesscode', 'U6L8L');
$I->fillField('email', 'akhimantrip@gmail.com');
$I->fillField('password', '12345');
$I->fillField('repassword', '12345');
$I->fillField('name', 'Akhilesh');
$I->fillField('company', 'Columbia');
$I->click('Register');
$I->see('Failed!!');

#$I->seeCurrentUrlEquals('/login');