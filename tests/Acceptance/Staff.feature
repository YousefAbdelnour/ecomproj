Feature: Admin Management Tasks

  Scenario: Hire more maids
    Given there are applications
    When admin hires maid
    Then a new staff member will be created

  Scenario: View transaction history
    Given admin is logged in and on the transactions screen
    When admin selects a user of the application
    Then all of the transactions related to that user will be displayed

  Scenario: View appointment history
    Given admin is logged in and on the appointment view screen
    When admin selects an appointment
    Then all of the information related to that user will be displayed

  Scenario: Respond to reports
    Given the problem has not yet been resolved
    When admin sends a response message
    Then the person who requested support should receive the message

  Scenario: Manage service pricing
    Given the current pricing needs to be adjusted
    When admin updates the service pricing in the system
    Then the new pricing will be immediately applied to future bookings and displayed to users

  Scenario: Monitor user feedback
    Given new feedback submissions are available
    When admin reviews the feedback section
    Then all recent feedback from users will be displayed, allowing for immediate action or acknowledgment