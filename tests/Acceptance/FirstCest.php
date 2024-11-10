<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

    }

    public function frontpageWorks(AcceptanceTester $I)
    {

        $I->amOnPage('/');
        $I->resizeWindow(375, 667);
        $I->seeElement('#menu-burger');
        $I->click('#menu-burger');
        $I->wait(1); // Attendre que le menu s'ouvre
        $I->seeElement('svg[x-show="open"]'); // Vérifier que l'icône de fermeture s'affiche
        // Répéter pour fermer le menu
        $I->click('#menu-burger');
        $I->wait(1);
        $I->seeElement('svg[x-show="!open"]'); // Vérifier que l'icône de menu s'affiche
        // $I->amOnPage('/');
        // $I->click('Les indispensables');
        // $I->seeInCurrentUrl('/product');
        // $I->see('Les indispensables Pour bébé');

        // $I->amOnPage('/login');
        // $I->fillField('email', 'test.com');
        // $I->fillField('password', 'password');
        // $I->click('Se connecter');
        // $I->see('liste');

        // $I->amOnPage('/');
        // $I->resizeWindow(375, 812);
        // $I->seeElement('#menu-burger');
        // $I->resizeWindow(1920, 1080);
        // $I->dontSeeElement('#menu-burger');
    }
}
