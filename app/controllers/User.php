<?php

namespace app\controllers;

use chillerlan\Authenticator\{Authenticator, AuthenticatorOptions};
use chillerlan\QRCode\QRCode;

class User extends \app\core\Controller
{
    public function forgotPasswordCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) && !isset($_POST['totp'])) {
                $username = $_POST['username'];
                $account = new \app\models\Customer();
                $account = $account->getByUsername($username);

                if ($account) {
                    $options = new AuthenticatorOptions();
                    $authenticator = new Authenticator($options);
                    $account->secret = $authenticator->createSecret();
                    $account->add2FA(); // Save the secret to the database
                    $uri = $authenticator->getUri('Customer', 'YourAppName');
                    $QRCode = (new QRCode)->render($uri);

                    // Display the QR code and form for TOTP input
                    $this->view('User/setup2fa', [
                        'QRCode' => $QRCode,
                        'username' => $username,
                        'userType' => 'customer'
                    ]);
                } else {
                    $this->view('User/forgotPasswordCustomer', ['error' => 'Username not found']);
                }
            } elseif (isset($_POST['totp'])) {
                $username = $_POST['username'];
                $account = new \app\models\Customer();
                $account = $account->getByUsername($username);

                $options = new AuthenticatorOptions();
                $authenticator = new Authenticator($options);
                $authenticator->setSecret($account->secret); // Retrieve the secret from the database

                // Verify TOTP
                if ($authenticator->verify($_POST['totp'])) {
                    // Proceed to reset password step
                    $this->view('User/resetPassword', [
                        'username' => $username,
                        'userType' => 'customer'
                    ]);
                } else {
                    echo 'Invalid TOTP';
                }
            }
        } else {
            $this->view('User/forgotPasswordCustomer');
        }
    }

    public function forgotPasswordStaff()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) && !isset($_POST['totp'])) {
                $username = $_POST['username'];
                $account = new \app\models\Account();
                $account = $account->getByUsername($username);

                if ($account) {
                    $options = new AuthenticatorOptions();
                    $authenticator = new Authenticator($options);
                    $account->secret = $authenticator->createSecret();
                    $account->add2FA(); // Save the secret to the database
                    $uri = $authenticator->getUri('Staff', 'YourAppName');
                    $QRCode = (new QRCode)->render($uri);

                    // Display the QR code and form for TOTP input
                    $this->view('User/setup2fa', [
                        'QRCode' => $QRCode,
                        'username' => $username,
                        'userType' => 'staff'
                    ]);
                } else {
                    $this->view('User/forgotPasswordStaff', ['error' => 'Username not found']);
                }
            } elseif (isset($_POST['totp'])) {
                $username = $_POST['username'];
                $account = new \app\models\Account();
                $account = $account->getByUsername($username);

                $options = new AuthenticatorOptions();
                $authenticator = new Authenticator($options);
                $authenticator->setSecret($account->secret); // Retrieve the secret from the database

                // Verify TOTP
                if ($authenticator->verify($_POST['totp'])) {
                    // Proceed to reset password step
                    $this->view('User/resetPassword', [
                        'username' => $username,
                        'userType' => 'staff'
                    ]);
                } else {
                    echo 'Invalid TOTP';
                }
            }
        } else {
            $this->view('User/forgotPasswordStaff');
        }
    }

    public function verifyForgotPassword2FA()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $userType = $_POST['userType'];

            if ($userType === 'staff') {
                $account = new \app\models\Account();
            } else {
                $account = new \app\models\Customer();
            }

            $account = $account->getByUsername($username);

            $options = new AuthenticatorOptions();
            $authenticator = new Authenticator($options);
            $authenticator->setSecret($account->secret); // Retrieve the secret from the database

            $totp = $_POST['totp'];
            if ($authenticator->verify($totp)) {
                // 2FA verified successfully
                header('location:/User/resetPassword');
                exit();
            } else {
                $this->view('User/verifyForgotPassword2FA', ['error' => 'Invalid TOTP code']);
            }
        } else {
            $this->view('User/verifyForgotPassword2FA');
        }
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];
            $userType = $_POST['userType'];

            if ($newPassword !== $confirmPassword) {
                echo 'Passwords do not match';
                return;
            }

            // Determine user type and update password accordingly
            if ($userType === 'staff') {
                $account = new \app\models\Account();
            } else {
                $account = new \app\models\Customer();
            }

            $account = $account->getByUsername($username);

            if ($account) {
                $account->Password_Hash = password_hash($newPassword, PASSWORD_DEFAULT);
                $account->updatePassword(); // Use updatePassword() method to update the password
                echo 'Password reset successfully';
                header('location:/User/login');
            } else {
                echo 'User not found';
            }
        }
    }

    function loginStaff()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usernameLogin'];
            $password = $_POST['passwordLogin'];
            $account = new \app\models\Account();
            $account = $account->getByUsername($username);

            if ($account && $account->IsActive == 0 && password_verify($password, $account->Password_Hash)) {
                $_SESSION['AccountId'] = $account->AccountId;
                if ($account->IsAdmin === 1) {
                    $_SESSION['isAdmin'] = true;
                    header('location:/Account/display/1');
                } else {
                    $_SESSION['isAdmin'] = false;
                    header('location:/Account/home_maid');
                }
                exit(); // Ensure no further code is executed after redirection
            } else {
                $data = ['error' => 'Invalid username or password'];
                $this->view('User/loginStaff', $data);
                return;
            }
        } else {
            $this->view('User/loginStaff');
        }
    }

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usernameLogin'];
            $account = new \app\models\Customer();
            $account = $account->getByUsername($username);
            $password = $_POST['passwordLogin'];
            if ($account && $account->IsActive == 0 && password_verify($password, $account->Password_Hash)) {
                $_SESSION['CustomerId'] = $account->CustomerId;
                header('location: /Customer/home');
            } else {
                $this->view('User/login', ['error' => 'Please make sure all information is correct!']);
            }
        } else {
            $this->view('User/login' , ['error' => '']);
        }
    }

    function registerCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty(trim($_POST['usernameReg']))) {
                header('location:/User/registerCustomer');
            }
            $account = new \app\models\Customer();
            $account->Username = $_POST['usernameReg'];
            if ($_POST['passwordReg'] === $_POST['passwordConfirm'] && !empty(trim($_POST['passwordReg']))) {
                $account->Password_Hash = password_hash($_POST['passwordReg'], PASSWORD_DEFAULT);
                $account->IsActive = 0;
                $account->insert();
                $account = $account->getByUsername($account->Username);
                $_SESSION['Id'] = $account->CustomerId;
                header('location:/Profile/create_Customer');
            } else {
                header('location:/User/registerCustomer');
            }
        } else {
            $this->view('User/registerCustomer');
        }
    }

    #[\app\filters\Admin]
    function registerAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty(trim($_POST['usernameReg']))) {
                header('location:/User/registerAdmin');
            }
            $account = new \app\models\Account();
            $account->Username = $_POST['usernameReg'];
            if ($_POST['passwordReg'] === $_POST['passwordConfirm'] && !empty(trim($_POST['passwordReg']))) {
                $account->Password_Hash = password_hash($_POST['passwordReg'], PASSWORD_DEFAULT);
                $account->IsActive = 0;
                $account->IsAdmin = $_POST['isAdmin'] === 'yes' ? 1 : 0;
                $account->insert();
                header('location:/Account/display/1');
            } else {
                header('location:/User/registerAdmin');
            }
        } else {
            $this->view('User/registerAdmin');
        }
    }
}
