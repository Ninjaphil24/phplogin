<?php
    // To run this test series a second time, you must change email address in function checkEmailSentMSG(AcceptanceTester $I)


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class LocalCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Login');
    }
    public function mistakenEmailWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('email','test@test.com');
        $I->fillField('password','123765');
        $I->click('login');
        $I->see('Falsche Email oder Passwort!');
    }
    public function gotoRegisterPage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Registrierung');
        $I->amOnPage('/register.php');
    }
    public function checkConfirmPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->fillField('username','test@test.com');
        $I->fillField('password','123456');
        $I->fillField('confirm-password','654321');
        $I->click('Registrieren');
        $I->see('Passwort und Passwort Bestätigung sind nicht gleich!');
    }
    // To run this a second time, you must change email address
    public function checkEmailSentMSG(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->fillField('username','Test');
        $I->fillField('email','test@test.com');
        $I->fillField('password','123456');
        $I->fillField('confirm-password','123456');
        $I->click('Registrieren');
        $I->see('Wir haben einen Bestätigungslink 
        an Ihre E-Mail-Adresse gesendet. Bitte überprüfen Sie auch Ihren Spam-Ordner.');
    }
    public function checkEmailExistsMSG(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->fillField('username','Test');
        $I->fillField('email','test@test.com');
        $I->fillField('password','123456');
        $I->fillField('confirm-password','123456');
        $I->click('Registrieren');
        $I->see('Diese E-Mail-Adresse wird schon verwendet!');
    }
    public function gotoLoginAttemptUnverifiedLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->click('Login');
        $I->amOnPage('/');
        $I->fillField('email','test@test.com');
        $I->fillField('password','123456');
        $I->click('Login');
        $I->see('Bestätigen Sie zuerst Ihr Konto und versuchen Sie es erneut.');

    }
}
