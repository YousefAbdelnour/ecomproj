Feature: Customer Account Management and Reservation Experience

  Scenario: Create an account
    Given I am on "http://localhost/User/registerCustomer" page
    When I input "donutman" as register customer username
    And I input "password" as register customer password
    And I input "password" as register customer retype password
    Then I am on "http://localhost/Profile/create_Customer" page

  Scenario: Create a profile
    Given I am on "http://localhost/Profile/create_Customer" page
    When I input "uzi canozi" as customer name
    And I input "1111111111" as customer phone number
    Then I am on "http://localhost/User/login" page

  Scenario: Log in

    Given I am on "http://localhost/User/login" page
    When I input "donutman" as login customer username
    And I input "password" as login customer password
    And I click "action" in customer login
    Then I am on "http://localhost/Customer/home" page
  
  Scenario: Add address

    Given I am on "http://localhost/Address/display" page
    When I click on ".button-style" button in customer address view
    And I am on "http://localhost/Address/add" page
    And I input "canada" as customer country
    And I input "quebec" as customer state
    And I input "rue marchand" as customer street
    And I input "123" as customer residence number
    And I input "h9b 4c1" as customer postal code
    And I click on "action" button in address add
    Then I am on "http://localhost/Address/display" page

  Scenario: Read Address

    Given I am logged in
    And I am on "http://localhost/Address/display" page
    And I see "canada" as customer country
    And I see "quebec" as customer state
    And I see "123 rue marchand" as customer address
    Then I see "H9K 1X2" as customer postal code
  
  Scenario: Edit Profile

    Given I am logged in
    And I am on "http://localhost/Profile/show_Customer" page
    And I click ".button-style" button in customer profile
    And I am on "http://localhost/Profile/edit_Customer" page
    And I input "Uzi Mania" as customer new name
    And I input "1111111111" as customer new phone number
    And I click "action" button in cutomer profile edit
    Then I am on "http://localhost/Profile/show_Customer" page

  Scenario: Booking

  Given I am logged in
  And I am on "http://localhost/Job/book" page
  And I select "13"
  And I input "3" as size
  And I input "2" as number of maids
  And I set the event date to "2024-05-25T14:30"
  And I input "Hello there" as description
  And I click "action"
  Then I am on "http://localhost/Customer/home" page

  Scenario: Deleting address

  Given I am logged in
  And I am on "http://localhost/Address/display" page
  And I click ".button-style-delete" button in customer address display
  Then I am on "http://localhost/Address/display" page