Feature: Customer Account Management and Reservation Experience

  Scenario: Create an account
    Given the customer is on the register screen
    When they enter a unique username and strong password
    Then the account will be created

  Scenario: Access account via Forgot Password
    Given the customer is on the login screen and selects the "Forgot Password" link
    When they enter their email address associated with the account
    And the email address format is valid
    Then they should receive a password reset link via email
    And see a confirmation message "A password reset link has been sent to your email."

  Scenario: Forget password
    Given the customer is on the login screen
    When they click on the "Forgot Password" link and provide their email
    Then they should receive a password reset link via email

  Scenario: Update account information
    Given the customer is logged into their account and on the account settings page
    When they update their information and confirm
    Then the changes should be saved successfully

  Scenario: Add payment method
    Given the customer is logged in and navigates to the payment screen
    When they attempt to add a payment method by entering their credit card information
    And the credit card is valid and not expired
    Then the payment method should be successfully saved
    And the customer receives a confirmation message "Your payment method has been added successfully."

  Scenario: Remove payment method
    Given the customer is logged in and on the payment method settings
    When the customer selects the payment method removal button
    Then the payment method should be removed

  Scenario: Successfully reserve a maid
    Given the customer is on the reservation page
    When the customer selects a maid, chooses a date, and valid payment method
    Then the reservation should be confirmed

  Scenario: Cancel reservation
    Given the customer has a confirmed booking and is on the cancellation page
    When the customer selects the reservation they wish to cancel
    And confirms their intention to cancel by pressing the "Confirm Cancellation" button
    Then the reservation should be canceled without penalty if done 24 hours before the appointment
    And the customer should see a message "Your reservation has been successfully canceled."

  Scenario: Contact support
    Given the customer is logged into their account and has a problem with the app or service
    When they navigate to the "Help & Support" section and select "Contact Support"
    And submit their query through the contact form
    Then they should receive an automated acknowledgment email
    And a support representative should contact them within 24 hours.

  Scenario: View reservation history
    Given the customer is logged into their account
    When they navigate to the reservation history page
    Then they should see a list of their past reservations
