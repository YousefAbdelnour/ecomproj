Feature: Staff Account Management and Reservation Settings

  Scenario: Create an account
    Given the staff member applies with good qualifications
    When they submit their application and admin accepts
    Then the account will be created

  Scenario: Modify profile
    Given the staff member is logged in
    When the staff member modifies their profile and hits save
    Then the profile page will be updated

  Scenario: Update payment information
    Given the staff member has a new bank account
    When they log in, navigate to the account settings, and update their payment information
    Then their payment details are updated, ensuring future earnings are deposited into the new account

  Scenario: Accepts booking
    Given staff member selects booking and agrees to time
    When staff hits accept booking button
    Then the reservation should be created and displayed to both customer and staff

  Scenario: Views upcoming reservations
    Given the staff member is logged into their account
    When they navigate to the dashboard or reservation management page
    Then they should see a list of upcoming reservations that they are assigned to handle

  Scenario: Contacts customer regarding reservation
    Given the staff member is viewing a reservation
    When they need to clarify details or confirm appointment times with the customer
    Then they should be able to send a message or email to the customer through the system

  Scenario: Views past reservation history
    Given the staff member is logged into their account
    When they navigate to the reservation history page
    Then they should see a list of past reservations they were involved with, including details and status

  Scenario: Updates availability for reservations
    Given the staff member's schedule has changed
    When they log in and update their availability in the reservation system
    Then their updated availability is reflected, and they can only be booked for times they are now available
