Feature: Admin Management Tasks

  Scenario: Create an account

    Given I am logged in as root admin
    When I am on "http://localhost/User/registerAdmin" page
    And I input "teststaff" in "username"
    And I input "password" in "password"
    And I input "password" in "retypepassword"
    And I select "Staff"
    And I click on "action"
    Then I see "Account/display/1" in url

  Scenario: Log in
  
    Given I am on "http://localhost/User/loginStaff" page
    When I input "teststaff" in "username"
    And I input "password" in "password"
    And I click on "action"
    Then I see "Profile/create_Admin" in url

  Scenario: Creatre profile

    Given I am logged in as staff
    And I am see "Profile/create_Admin" in url
    And I input "teststaff" in "name"
    And I input "1111111111" in "phonenumber"
    And I click on "action"
    Then I see "User/loginStaff" in url
  
  Scenario: Profile edit

    Given I am logged in as staff
    And I am on "http://localhost/Profile/show_Maid"page
    And I click ".button-style"
    And I see "/Profile/edit_Maid" in url
    And I input "Uzi Mania" as "name"
    And I input "1111111111" as "staff new "phone number"
    And I click "action" button in staff profile edit
    Then I see "/Profile/show_Maid" in url

  Scenario: Accept job

    Given I am logged in as staff
    When I am on "http://localhost/Account/home_maid" page
    And there are active jobs
    And I see job
    And I click "#jobaccept"
    Then I see "Account/schedule" in url

  Scenario: View job in schedule

    Given I am logged in as staff
    When I am on "http://localhost/Account/schedule" page
    Then I see "jacob pucked in my car"

  Scenario: Send message

    Given I am logged in as staff
    And I am on "http://localhost/Message/sendMessageFromAccount" page
    And I select "1"
    And I input "Missunderstanding" as customer support title
    And I input "We can fix it"
    And I click ".submit-button"
    Then I see "Account/home_maid" in url

  Scenario: Read message

    Given I am logged in as staff
    And I am on "http://localhost/Message/receivedAccount" page
    And I have recieved a message
    And I see "Understood"
    And I see "No problem"
    Then I see "1"

  Scenario: Logout

    Given I am logged in as staff
    And I am on "http://localhost/Account/home_maid" page
    And I click "#logout"
    And I see "User/loginStaff" in url
    Then I remove all about staff

