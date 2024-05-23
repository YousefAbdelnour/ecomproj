Feature: Customer Account Management and Reservation Experience

  Scenario: Create a profile
    Given I created an account
    Given I am on "http://localhost/Profile/create_Customer" page
    When I input "uzi canozi" as customer name
    And I input "1111111111" as customer phone number
    And I click "action"
    Then I see "/User/login" in url

  Scenario: Log in

    Given I am on "http://localhost/User/login" page
    When I input "test" as login customer username
    And I input "password" as login customer password
    And I click "action" in customer login
    Then I see "/Customer/home" in url
  
  Scenario: Add address

    Given I am logged in
    And I am on "http://localhost/Address/display" page
    When I click on ".button-style" button in customer address view
    And I see "/Address/add" in url
    And I input "canada" as customer country
    And I input "quebec" as customer state
    And I input "rue marchand" as customer street
    And I input "123" as customer residence number
    And I input "h9b 4c1" as customer postal code
    And I click "action" 
    Then I see "/Address/display" in url

  Scenario: Read Address

    Given I am logged in
    And I am on "http://localhost/Address/display" page
    And I see "canada" as customer country
    And I see "quebec" as customer state
    And I see "123 rue marchand" as customer address
    Then I see "h9b 4c1" as customer postal code
  
  Scenario: Edit Profile

    Given I am logged in
    And I am on "http://localhost/Profile/show_Customer" page
    And I click ".button-style" button in customer profile
    And I see "/Profile/edit_Customer" in url
    And I input "Uzi Mania" as customer new name
    And I input "1111111111" as customer new phone number
    And I click "action" button in cutomer profile edit
    Then I see "/Profile/show_Customer" in url

  Scenario: Booking

  Given I am logged in
  And I am on "http://localhost/Job/book" page
  And I select address
  And I input "3" as size
  And I input "2" as number of maids
  And I set the event date to "2024-05-25T14:30"
  And I input "Hello there" as description
  And I click "action"
  Then I see "/Customer/home" in url
  
  Scenario: View pending orders

  Given I am logged in
  And I am on "http://localhost/Customer/home" page
  And I see "2024/05/25"
  And I see "14:30 PM"
  Then I see "Hello there"
  
  Scenario: View latest services

  Given I am logged in
  And I am on "http://localhost/Customer/home" page
  And job is completed
  And I see "2024/05/25"
  And I see addres id
  Then I see "Hello there"

  Scenario: View service history

    Given I am logged in
    And I am on "http://localhost/Customer/reservation_history" page
    And I see "2024/05/25"
    And I see addres id
    Then I see "Hello there"

  Scenario: Cancel booking

    Given I am logged in
    And I am on "http://localhost/Customer/home" page
    And I click "#cancelPending"
    Then job status changes

  Scenario: Contact support button

    Given I am logged in
    And I am on "http://localhost/Customer/home" page
    And I click "#support"
    Then I see "Customer/home" in url

  Scenario: Send message

    Given I am logged in
    And I am on "http://localhost/Message/support" page
    And I select "1"
    And I input "Problem with job: 1" as customer support title
    And I input "Maid did not do the job"
    And I click ".submit-button"
    Then I see "Customer/home" in url

  Scenario: Read message

    Given I am logged in
    And I am on "http://localhost/Message/receivedByCustomer" page
    And I have recieved a message
    And I see "Understood"
    And I see "Will contact maid"
    Then I see "1"

  Scenario: Delete Address

    Given I am logged in
    And I am on "http://localhost/Address/display" page
    And I click the delete address button
    And I do not see "canada"
    And I do not see "quebec"
    And I do not see "123 rue marchand"
    Then I do not see "h9b 4c1"

  Scenario: Logout

    Given I am logged in
    And I click "#logout"
    And I see "User/login" in url
    Then I remove all
