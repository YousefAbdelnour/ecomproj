Feature: Staff Account Management and Reservation Settings

  Scenario: Create an account

    Given I am logged in as root admin
    And I am on "http://localhost/User/registerAdmin" page
    And I input "testadmin" in "username"
    And I input "password" in "password"
    And I input "password" in "retypepassword"
    And I select "Admin"
    And I click on "action"
    Then I see "Account/display/1" in url

  Scenario: Log in
    
    Given I am on "http://localhost/User/loginStaff" page
    And I input "testadmin" in "username"
    And I input "password" in "password"
    And I click on "action"
    Then I see "Account/display/1" in url

  Scenario: Create profile
    
    Given I am logged in as admin
    And I am see "Profile/create_Admin" in url
    And I input "testadmin" in "name"
    And I input "1111111111" in "phonenumber"
    And I click on "action"
    Then I see "User/loginStaff" in url

  Scenario: Profile edit

    Given I am logged in as admin
    And I am on "http://localhost/Profile/show_Admin"page
    And I click ".button-style"
    And I see "/Profile/edit_Admin" in url
    And I input "Uzi Mania" as "name"
    And I input "1111111111" as "customer new "phone number"
    And I click "action" button in cutomer profile edit
    Then I see "/Profile/show_Admin" in url

  Scenario: Read customer information

    Given I am logged in as admin
    When I am on "http://localhost/Account/display/1" page
    And there are cutomers
    And I see "test"
    And I see id
    Then I see their status

  Scenario: Read Staff information

    Given I am logged in as admin
    When I am on "http://localhost/Account/display/1" page
    And there are staff members
    And I click "#staff"
    And I see "Account/display/3" in url
    And I see "stafftest"
    And I see id
    Then I see their status

  Scenario: Read Admin information

    Given I am logged in as admin
    When I am on "http://localhost/Account/display/1" page
    And I click "#admin"
    And I see "Account/display/2" in url
    And I see "testadmin"
    And I see id
    Then I see their status

  Scenario: Read Active bookings

    Given I am logged in as admin
    When I am on "http://localhost/Account/booking/1" page
    And there are active bookings
    And I see "2024-05-24 12:20:00"
    And I see "1"
    Then I see "jacob puked in my car"

  Scenario: Read Finished bookings

    Given I am logged in as admin
    When I am on "http://localhost/Account/booking/1" page
    And there are finished bookings
    And I click "#finished"
    And I see "Account/booking/2" in url
    And I see "2024-05-24 12:20:00"
    And I see "1"
    Then I see "jacob puked in my car"

    Scenario: Read Finished bookings

      Given I am logged in as admin
      When I am on "http://localhost/Account/booking/1" page
      And there are canceled bookings
      And I click "#canceled"
      And I see "Account/booking/3" in url
      And I see "2024-05-24 12:20:00"
      And I see "1"
      Then I see "jacob puked in my car"

    Scenario: Send message

    Given I am logged in as admin
    And I am on "http://localhost/Message/sendMessageFromAccount" page
    And I select "1"
    And I input "Problem with job: 1 answer" as customer support title
    And I input "We can fix it"
    And I click ".submit-button"
    Then I see "Account/display/1" in url

  Scenario: Read message

    Given I am logged in as admin
    And I am on "http://localhost/Message/receivedAccount" page
    And I have recieved a message
    And I see ""Problem with job: 1"
    And I see "Maid did not do the job"
    Then I see "1"

  Scenario: Logout

    Given I am logged in as admin
    And I am on "http://localhost/Address/display/1" page
    And I click "#logout"
    And I see "User/loginStaff" in url
    Then I remove all
