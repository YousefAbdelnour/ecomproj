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
     * @Given there are applications
     */
     public function thereAreApplications()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `there are applications` is not defined");
     }

    /**
     * @When admin hires maid
     */
     public function adminHiresMaid()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin hires maid` is not defined");
     }

    /**
     * @Then a new staff member will be created
     */
     public function aNewStaffMemberWillBeCreated()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `a new staff member will be created` is not defined");
     }

    /**
     * @Given the problem has not yet been resolved
     */
     public function theProblemHasNotYetBeenResolved()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the problem has not yet been resolved` is not defined");
     }

    /**
     * @When admin sends a response message
     */
     public function adminSendsAResponseMessage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin sends a response message` is not defined");
     }

    /**
     * @Then the person who requested support should receive the message
     */
     public function thePersonWhoRequestedSupportShouldReceiveTheMessage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the person who requested support should receive the message` is not defined");
     }

    /**
     * @Given admin is logged in and on the transactions screen
     */
     public function adminIsLoggedInAndOnTheTransactionsScreen()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin is logged in and on the transactions screen` is not defined");
     }

    /**
     * @When admin selects a user of the application
     */
     public function adminSelectsAUserOfTheApplication()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin selects a user of the application` is not defined");
     }

    /**
     * @Then all of the transactions related to that user will be displayed
     */
     public function allOfTheTransactionsRelatedToThatUserWillBeDisplayed()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `all of the transactions related to that user will be displayed` is not defined");
     }

    /**
     * @Given admin is logged in and on the appointment view screen
     */
     public function adminIsLoggedInAndOnTheAppointmentViewScreen()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin is logged in and on the appointment view screen` is not defined");
     }

    /**
     * @When admin selects an appointment
     */
     public function adminSelectsAnAppointment()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin selects an appointment` is not defined");
     }

    /**
     * @Then all of the information related to that user will be displayed
     */
     public function allOfTheInformationRelatedToThatUserWillBeDisplayed()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `all of the information related to that user will be displayed` is not defined");
     }

    /**
     * @Given the current pricing needs to be adjusted
     */
     public function theCurrentPricingNeedsToBeAdjusted()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the current pricing needs to be adjusted` is not defined");
     }

    /**
     * @When admin updates the service pricing in the system
     */
     public function adminUpdatesTheServicePricingInTheSystem()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin updates the service pricing in the system` is not defined");
     }

    /**
     * @Then the new pricing will be immediately applied to future bookings and displayed to users
     */
     public function theNewPricingWillBeImmediatelyAppliedToFutureBookingsAndDisplayedToUsers()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the new pricing will be immediately applied to future bookings and displayed to users` is not defined");
     }

    /**
     * @Given new feedback submissions are available
     */
     public function newFeedbackSubmissionsAreAvailable()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `new feedback submissions are available` is not defined");
     }

    /**
     * @When admin reviews the feedback section
     */
     public function adminReviewsTheFeedbackSection()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `admin reviews the feedback section` is not defined");
     }

    /**
     * @Then all recent feedback from users will be displayed, allowing for immediate action or acknowledgment
     */
     public function allRecentFeedbackFromUsersWillBeDisplayedAllowingForImmediateActionOrAcknowledgment()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `all recent feedback from users will be displayed, allowing for immediate action or acknowledgment` is not defined");
     }

    /**
     * @Given the customer is on the register screen
     */
     public function theCustomerIsOnTheRegisterScreen()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is on the register screen` is not defined");
     }

    /**
     * @When they enter a unique username and strong password
     */
     public function theyEnterAUniqueUsernameAndStrongPassword()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they enter a unique username and strong password` is not defined");
     }

    /**
     * @Then the account will be created
     */
     public function theAccountWillBeCreated()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the account will be created` is not defined");
     }

    /**
     * @Given the customer is on the login screen and selects the :arg1 link
     */
     public function theCustomerIsOnTheLoginScreenAndSelectsTheLink($arg1)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is on the login screen and selects the :arg1 link` is not defined");
     }

    /**
     * @When they enter their email address associated with the account
     */
     public function theyEnterTheirEmailAddressAssociatedWithTheAccount()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they enter their email address associated with the account` is not defined");
     }

    /**
     * @When the email address format is valid
     */
     public function theEmailAddressFormatIsValid()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the email address format is valid` is not defined");
     }

    /**
     * @Then they should receive a password reset link via email
     */
     public function theyShouldReceiveAPasswordResetLinkViaEmail()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they should receive a password reset link via email` is not defined");
     }

    /**
     * @Then see a confirmation message :arg1
     */
     public function seeAConfirmationMessage($arg1)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `see a confirmation message :arg1` is not defined");
     }

    /**
     * @Given the customer is on the login screen
     */
     public function theCustomerIsOnTheLoginScreen()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is on the login screen` is not defined");
     }

    /**
     * @When they click on the :arg1 link and provide their email
     */
     public function theyClickOnTheLinkAndProvideTheirEmail($arg1)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they click on the :arg1 link and provide their email` is not defined");
     }

    /**
     * @Given the customer is logged into their account and on the account settings page
     */
     public function theCustomerIsLoggedIntoTheirAccountAndOnTheAccountSettingsPage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is logged into their account and on the account settings page` is not defined");
     }

    /**
     * @When they update their information and confirm
     */
     public function theyUpdateTheirInformationAndConfirm()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they update their information and confirm` is not defined");
     }

    /**
     * @Then the changes should be saved successfully
     */
     public function theChangesShouldBeSavedSuccessfully()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the changes should be saved successfully` is not defined");
     }

    /**
     * @Given the customer is logged in and navigates to the payment screen
     */
     public function theCustomerIsLoggedInAndNavigatesToThePaymentScreen()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is logged in and navigates to the payment screen` is not defined");
     }

    /**
     * @When they attempt to add a payment method by entering their credit card information
     */
     public function theyAttemptToAddAPaymentMethodByEnteringTheirCreditCardInformation()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they attempt to add a payment method by entering their credit card information` is not defined");
     }

    /**
     * @When the credit card is valid and not expired
     */
     public function theCreditCardIsValidAndNotExpired()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the credit card is valid and not expired` is not defined");
     }

    /**
     * @Then the payment method should be successfully saved
     */
     public function thePaymentMethodShouldBeSuccessfullySaved()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the payment method should be successfully saved` is not defined");
     }

    /**
     * @Then the customer receives a confirmation message :arg1
     */
     public function theCustomerReceivesAConfirmationMessage($arg1)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer receives a confirmation message :arg1` is not defined");
     }

    /**
     * @Given the customer is logged in and on the payment method settings
     */
     public function theCustomerIsLoggedInAndOnThePaymentMethodSettings()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is logged in and on the payment method settings` is not defined");
     }

    /**
     * @When the customer selects the payment method removal button
     */
     public function theCustomerSelectsThePaymentMethodRemovalButton()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer selects the payment method removal button` is not defined");
     }

    /**
     * @Then the payment method should be removed
     */
     public function thePaymentMethodShouldBeRemoved()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the payment method should be removed` is not defined");
     }

    /**
     * @Given the customer is on the reservation page
     */
     public function theCustomerIsOnTheReservationPage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is on the reservation page` is not defined");
     }

    /**
     * @When the customer selects a maid, chooses a date, and valid payment method
     */
     public function theCustomerSelectsAMaidChoosesADateAndValidPaymentMethod()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer selects a maid, chooses a date, and valid payment method` is not defined");
     }

    /**
     * @Then the reservation should be confirmed
     */
     public function theReservationShouldBeConfirmed()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the reservation should be confirmed` is not defined");
     }

    /**
     * @Given the customer has a confirmed booking and is on the cancellation page
     */
     public function theCustomerHasAConfirmedBookingAndIsOnTheCancellationPage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer has a confirmed booking and is on the cancellation page` is not defined");
     }

    /**
     * @When the customer selects the reservation they wish to cancel
     */
     public function theCustomerSelectsTheReservationTheyWishToCancel()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer selects the reservation they wish to cancel` is not defined");
     }

    /**
     * @When confirms their intention to cancel by pressing the :arg1 button
     */
     public function confirmsTheirIntentionToCancelByPressingTheButton($arg1)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `confirms their intention to cancel by pressing the :arg1 button` is not defined");
     }

    /**
     * @Then the reservation should be canceled without penalty if done :num1:num2 hours before the appointment
     */
     public function theReservationShouldBeCanceledWithoutPenaltyIfDoneHoursBeforeTheAppointment($num1, $num2)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the reservation should be canceled without penalty if done :num1:num2 hours before the appointment` is not defined");
     }

    /**
     * @Then the customer should see a message :arg1
     */
     public function theCustomerShouldSeeAMessage($arg1)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer should see a message :arg1` is not defined");
     }

    /**
     * @Given the customer is logged into their account and has a problem with the app or service
     */
     public function theCustomerIsLoggedIntoTheirAccountAndHasAProblemWithTheAppOrService()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is logged into their account and has a problem with the app or service` is not defined");
     }

    /**
     * @When they navigate to the :arg1 section and select :arg2
     */
     public function theyNavigateToTheSectionAndSelect($arg1, $arg2)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they navigate to the :arg1 section and select :arg2` is not defined");
     }

    /**
     * @When submit their query through the contact form
     */
     public function submitTheirQueryThroughTheContactForm()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `submit their query through the contact form` is not defined");
     }

    /**
     * @Then they should receive an automated acknowledgment email
     */
     public function theyShouldReceiveAnAutomatedAcknowledgmentEmail()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they should receive an automated acknowledgment email` is not defined");
     }

    /**
     * @Then a support representative should contact them within :num1:num2 hours:num3
     */
     public function aSupportRepresentativeShouldContactThemWithinHours($num1, $num2, $num3)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `a support representative should contact them within :num1:num2 hours:num3` is not defined");
     }

    /**
     * @Given the customer is logged into their account
     */
     public function theCustomerIsLoggedIntoTheirAccount()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer is logged into their account` is not defined");
     }

    /**
     * @When they navigate to the reservation history page
     */
     public function theyNavigateToTheReservationHistoryPage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they navigate to the reservation history page` is not defined");
     }

    /**
     * @Then they should see a list of their past reservations
     */
     public function theyShouldSeeAListOfTheirPastReservations()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they should see a list of their past reservations` is not defined");
     }

    /**
     * @Given the staff member applies as :arg1 :arg2 with good qualifications
     */
     public function theStaffMemberAppliesAsWithGoodQualifications($arg1, $arg2)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member applies as :arg1 :arg2 with good qualifications` is not defined");
     }

    /**
     * @When they submit their application
     */
     public function theySubmitTheirApplication()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they submit their application` is not defined");
     }

    /**
     * @Then the admin can see the request from :arg1 :arg2
     */
     public function theAdminCanSeeTheRequestFrom($arg1, $arg2)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the admin can see the request from :arg1 :arg2` is not defined");
     }

    /**
     * @Given the staff member is logged in
     */
     public function theStaffMemberIsLoggedIn()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member is logged in` is not defined");
     }

    /**
     * @When the staff member modifies their profile
     */
     public function theStaffMemberModifiesTheirProfile()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member modifies their profile` is not defined");
     }

    /**
     * @When hits save
     */
     public function hitsSave()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `hits save` is not defined");
     }

    /**
     * @Then the profile page will be updated
     */
     public function theProfilePageWillBeUpdated()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the profile page will be updated` is not defined");
     }

    /**
     * @Given the staff member has a new bank account
     */
     public function theStaffMemberHasANewBankAccount()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member has a new bank account` is not defined");
     }

    /**
     * @When they log in
     */
     public function theyLogIn()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they log in` is not defined");
     }

    /**
     * @When navigate to the account settings
     */
     public function navigateToTheAccountSettings()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `navigate to the account settings` is not defined");
     }

    /**
     * @When update their payment information
     */
     public function updateTheirPaymentInformation()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `update their payment information` is not defined");
     }

    /**
     * @Then their payment details are updated, ensuring future earnings are deposited into the new account
     */
     public function theirPaymentDetailsAreUpdatedEnsuringFutureEarningsAreDepositedIntoTheNewAccount()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `their payment details are updated, ensuring future earnings are deposited into the new account` is not defined");
     }

    /**
     * @Given staff member selects booking
     */
     public function staffMemberSelectsBooking()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `staff member selects booking` is not defined");
     }

    /**
     * @Given agrees to time
     */
     public function agreesToTime()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `agrees to time` is not defined");
     }

    /**
     * @When staff hits accept booking button
     */
     public function staffHitsAcceptBookingButton()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `staff hits accept booking button` is not defined");
     }

    /**
     * @Then the reservation should be created and displayed to both customer and staff
     */
     public function theReservationShouldBeCreatedAndDisplayedToBothCustomerAndStaff()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the reservation should be created and displayed to both customer and staff` is not defined");
     }

    /**
     * @Given the staff member is logged into their account
     */
     public function theStaffMemberIsLoggedIntoTheirAccount()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member is logged into their account` is not defined");
     }

    /**
     * @When they navigate to the dashboard or reservation management page
     */
     public function theyNavigateToTheDashboardOrReservationManagementPage()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they navigate to the dashboard or reservation management page` is not defined");
     }

    /**
     * @Then they should see a list of upcoming reservations that they are assigned to handle
     */
     public function theyShouldSeeAListOfUpcomingReservationsThatTheyAreAssignedToHandle()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they should see a list of upcoming reservations that they are assigned to handle` is not defined");
     }

    /**
     * @Given the staff member is viewing a reservation
     */
     public function theStaffMemberIsViewingAReservation()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member is viewing a reservation` is not defined");
     }

    /**
     * @When they need to clarify details or confirm appointment times with the customer
     */
     public function theyNeedToClarifyDetailsOrConfirmAppointmentTimesWithTheCustomer()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they need to clarify details or confirm appointment times with the customer` is not defined");
     }

    /**
     * @Then they should be able to send a message or email to the customer through the system
     */
     public function theyShouldBeAbleToSendAMessageOrEmailToTheCustomerThroughTheSystem()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they should be able to send a message or email to the customer through the system` is not defined");
     }

    /**
     * @Then they should see a list of past reservations they were involved with, including details and status
     */
     public function theyShouldSeeAListOfPastReservationsTheyWereInvolvedWithIncludingDetailsAndStatus()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they should see a list of past reservations they were involved with, including details and status` is not defined");
     }

    /**
     * @Given the staff member's schedule has changed
     */
     public function theStaffMembersScheduleHasChanged()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `the staff member's schedule has changed` is not defined");
     }

    /**
     * @When they log in and update their availability in the reservation system
     */
     public function theyLogInAndUpdateTheirAvailabilityInTheReservationSystem()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `they log in and update their availability in the reservation system` is not defined");
     }

    /**
     * @Then their updated availability is reflected, and they can only be booked for times they are now available
     */
     public function theirUpdatedAvailabilityIsReflectedAndTheyCanOnlyBeBookedForTimesTheyAreNowAvailable()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `their updated availability is reflected, and they can only be booked for times they are now available` is not defined");
     }
}
