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
  And I remove all
