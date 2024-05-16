<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    /**
     * @Then I see :arg1 in url
     */
    public function iSeeInUrl($arg1)
    {
        $this->seeInCurrentUrl($arg1);
    }

    /**
     * @Given I created an account
     */
    public function iCreatedAccount(){
        $this->iAmOnPage('http://localhost/User/registerCustomer');
        $this->fillField('usernameReg', 'test');
        $this->fillField('passwordReg', 'password');
        $this->fillField('passwordConfirm', 'password');
        $this->click('action');
    }

    /**
     * @Given I am on :arg1 page
     */
    public function iAmOnPage($arg1)
    {
        $this->amOnPage($arg1);
    }

    /**
     * @When I input :arg1 as register customer username
     */
    public function iInputAsRegisterCustomerUsername($arg1)
    {
        $this->fillField('usernameReg', $arg1);
    }

    /**
     * @When I input :arg1 as register customer password
     */
    public function iInputAsRegisterCustomerPassword($arg1)
    {
        $this->fillField('passwordReg', $arg1);
    }

    /**
     * @When I input :arg1 as register customer retype password
     */
    public function iInputAsRegisterCustomerRetypePassword($arg1)
    {
        $this->fillField('passwordConfirm', $arg1);
    }

    /**
     * @When I input :arg1 as customer name
     */
    public function iInputAsCustomerName($arg1)
    {
        $this->fillField('createName', $arg1);
    }

    /**
     * @When I input :arg1 as customer phone number
     */
    public function iInputAsCustomerPhoneNumber($arg1)
    {
        $this->fillField('createPhoneNumber', $arg1);
    }

    /**
     * @When I input :arg1 as login customer username
     */
    public function iInputAsLoginCustomerUsername($arg1)
    {
        $this->fillField('usernameLogin', $arg1);
    }

    /**
     * @When I input :arg1 as login customer password
     */
    public function iInputAsLoginCustomerPassword($arg1)
    {
        $this->fillField('passwordLogin', $arg1);
    }
    /**
     * @When I click :arg1 in customer login
     */
    public function iClickInCustomerLogin($arg1)
    {
        $this->click('action');
    }

    /**
     * @When I click on :arg1 button in customer address view
     */
    public function iClickOnButtonInCustomerAddressView($arg1)
    {
        $this->click($arg1);
    }

    /**
     * @When I input :arg1 as customer country
     */
    public function iInputAsCustomerCountry($arg1)
    {
        $this->fillField('addCountry', $arg1);
    }

    /**
     * @When I input :arg1 as customer state
     */
    public function iInputAsCustomerState($arg1)
    {
        $this->fillField('addState', $arg1);
    }

    /**
     * @When I input :arg1 as customer street
     */
    public function iInputAsCustomerStreet($arg1)
    {
        $this->fillField('addStreet', $arg1);
    }

    /**
     * @When I input :arg1 as customer residence number
     */
    public function iInputAsCustomerResidenceNumber($arg1)
    {
        $this->fillField('addResidenceNumber', $arg1);
    }

    /**
     * @When I input :arg1 as customer postal code
     */
    public function iInputAsCustomerPostalCode($arg1)
    {
        $this->fillField('addZipCode', $arg1);
    }

    /**
     * @When I click on :arg1 button in address add
     */
    public function iClickOnButtonInAddressAdd($arg1)
    {
        $this->click($arg1);
    }

    /**
     * @Then I see :arg1 as customer country
     */
    public function iSeeAsCustomerCountry($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Then I see :arg1 as customer state
     */
    public function iSeeAsCustomerState($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Then I see :arg1 as customer address
     */
    public function iSeeAsCustomerAddress($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Then I see :arg1 as customer postal code
     */
    public function iSeeAsCustomerPostalCode($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $this->amOnPage('http://localhost/User/login');
        $this->fillField('usernameLogin', 'DonutMan2');
        $this->fillField('passwordLogin', 'password');
        $this->click('action');
        $this->amOnPage('http://localhost/Customer/home');
    }

    /**
     * @Given I click :arg1 button in customer profile
     */
    public function iClickButtonInCustomerProfile($arg1)
    {
        $this->click($arg1);
    }

    /**
     * @Given I input :arg1 as customer new name
     */
    public function iInputAsCustomerNewName($arg1)
    {
        $this->fillField('editName', $arg1);
    }

    /**
     * @Given I input :arg1 as customer new phone number
     */
    public function iInputAsCustomerNewPhoneNumber($arg1)
    {
        $this->fillField('editPhoneNumber', $arg1);
    }

    /**
     * @Given I click :arg1 button in cutomer profile edit
     */
    public function iClickButtonInCutomerProfileEdit($arg1)
    {
        $this->click($arg1);
    }

    /**
     * @Given I select :arg1
     */
    public function iSelect($arg1)
    {
        $this->selectOption('address', $arg1);
    }

    /**
     * @Given I input :arg1 as size
     */
    public function iInputAsSize($arg1)
    {
        $this->fillField('House_Size', $arg1);
    }

    /**
     * @Given I input :arg1 as number of maids
     */
    public function iInputAsNumberOfMaids($arg1)
    {
        $this->fillField('spots', $arg1);
    }

    /**
     * @Given I set the event date to :arg1
     */
    public function iSetTheEventDateTo($arg1)
    {
        $this->fillField('date', $arg1);
    }

    /**
     * @Given I input :arg1 as description
     */
    public function iInputAsDescription($arg1)
    {
        $this->fillField('dsc', $arg1);
    }

    /**
     * @Given I click :arg1
     */
    public function iClick($arg1)
    {
        $this->click($arg1);
    }

    /**
     * @Given I click :arg1 button in customer address display
     */
    public function iClickButtonInCustomerAddressDisplay($arg1)
    {
        $this->click($arg1);
    }
}
