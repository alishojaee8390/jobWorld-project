<?php



namespace Auth;

use database\Database;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Auth
{

    protected function redirect($url)
    {
        header("Location: " . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }
    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }
    private function random()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }
    private function activationMessage($username, $verifyToken)
    {
        $message = '
        
            <h1>فعال سازی حساب کاربری</h1>
            <p>'  . $username . ' برای فعال سازی حساب کاربری خود روی لینک زیر کلیک کنید </p>
            <div><a href="' . url('activation/' . $verifyToken) . '">فعال سازی حساب</a></div>
';

        return $message;
    }
    private function forgotMessage($username, $forgotToken)
    {
        $message = '
        
            <h1>فراموشی رمز عبور</h1>
            <p>'  . $username . ' برای تغییر رمز عبور حساب کاربری خود روی لینک زیر کلیک کنید </p>
            <div><a href="' . url('reset-password-form/' . $forgotToken) . '">بازیابی رمز عبور</a></div>
';

        return $message;
    }
    private function sendMail($emailAddress, $subject, $body)
    {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->CharSet = 'UTF-8'; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = MAIL_HOST; //Set the SMTP server to send through
            $mail->SMTPAuth = SMTP_AUTH; //Enable SMTP authentication
            $mail->Username = MAIL_USERNAME; //SMTP username
            $mail->Password = MAIL_PASSWORD; //SMTP password
            $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
            $mail->Port = MAIL_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(SENDER_MAIL, SENDER_NAME);
            $mail->addAddress($emailAddress);

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }


    public function register()
    {
        require_once(BASE_PATH . '/tamplate/auth/register.php');
    }
    public function registerStore($request)
    {
        if (
            empty($request) || empty($request['email']) || empty($request['username']) || empty($request['first_name']) || empty($request['last_name']) || empty($request['phone_number']) ||
            empty($request['password']) || empty($request['confirmPassword'])
        ) {
            flash('registerError', ' تمامی فیلد ها اجباری میباشند');
            $this->redirectBack();
        } else if (strlen($request['password']) < 8 && strlen($request['confirmPassword']) < 8) {
            flash('registerError', 'رمز عبور حداقل باید 8 کارکتر باشد');
            $this->redirectBack();
        } else if ($request['password'] != $request['confirmPassword']) {
            flash('registerError', 'رمز عبور با تکرار رمز عبور تطابق ندارد');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('registerError', 'ایمیل شما نامعتبر است');
            $this->redirectBack();
        } else if (!preg_match("/^(\+98|0)?9\d{9}$/", $request['phone_number'])) {
            flash('registerError', ' شماره موبایل شما نامعتبر است  مثال (09157832025)');
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = $db->select('SELECT * FROM users WHERE email=?', $request['email'])->fetch();


            if ($user != null) {
                flash('registerError', 'این ایمیل قبلا ثبت نام کرده است');
                $this->redirectBack();
            } else {
                $randomToken = $this->random();
                $activationMessage = $this->activationMessage($request['username'], $randomToken);
                $result = $this->sendMail($request['email'], 'فعال سازی حساب کاربری', $activationMessage);
                if ($result) {
                    $request['verify_token'] = $randomToken;
                    $request['password'] = $this->hash($request['password']);
                    array_splice($request, 6, 1);
                    $db->insert('users', array_keys($request), $request);
                    flash('registerSuccess', ' ایمیلی حاوی لینک فعال سازی حساب کاربری برای شما ارسال شده است (لطفا چک  نمایید)');
                    $this->redirectBack();
                } else {
                    flash('registerError', 'ارسال ایمیل با خطا مواجه شد');
                    $this->redirectBack();
                }
            }
        }
    }

    public function activation($verifyToken)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE verify_token=? AND is_active=0;", $verifyToken)->fetch();
        if ($user == null) {
            $this->redirect('/login');
        } else {
            $result = $db->update('users', $user['id'], ['is_active'], [1]);
            $this->redirect('/login');
        }
    }

    public function login()
    {
        require_once(BASE_PATH . '/tamplate/Auth/login.php');
    }
    public function checkLogin($request)
    {

        if (empty($request['email']) || empty($request['password'])) {
            flash('loginError', 'تمامی فیلد ها اجباری است');
            $this->redirectBack();
        }
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE email = ? ;', $request['email'])->fetch();
        if ($user != null) {


            if (password_verify($request['password'], $user['password']) && $user['is_active'] == 1) {


                $_SESSION['user'] = [$user['id'], $user['permission'], $user['activity_user']];
                if ($request['rememberme'] == true) {
                    $token = bin2hex(random_bytes(16));
                    setcookie('remember_me', $token, time() + (86400 * 30), "/");
                    $db->update('users', $_SESSION['user'][0], ['remember_tokens'], [$token]);
                }

                if ($user['permission'] == 'admin') {

                    $this->redirect('admin');
                } else {

                    $this->redirect('panel');
                }
            } else {
                flash('loginError', 'رمز عبور یا ایمیل شما اشتباه است');
                $this->redirectBack();
            }
        } else {
            flash('loginError', 'رمز عبور یا ایمیل شما اشتباه است');
            $this->redirectBack();
        }
    }

    public function checkAdmin()
    {
        $db = new Database();

        if (isset($_SESSION['user'])) {
            $user = $db->select('SELECT * FROM users WHERE id = ?', $_SESSION['user'][0])->fetch();


            if ($user != null) {
                if ($user['permission'] != 'admin') {
                    $this->redirect('home');
                }
            } else {
                dd('ok');
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }
    }
    public function checkUserlogin()
    {
        $db = new Database();
        if (isset($_SESSION['user'])) {
            $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();

            if ($user != null) {
                if (isset($_COOKIE['remember_me'])) {
                    $token = $_COOKIE['remember_me'];
                    if ($user['remember_tokens'] == $token) {
                        if ($user['permission'] == 'user') {
                            return true;
                        } else {

                            $this->redirect('login');
                        }
                    } else {
                        if ($user['permission'] == 'user') {
                            return true;
                        } else {

                            $this->redirect('login');
                        }
                    }
                }
            } else {

                $this->redirect('login');
            }
        } else {
            $this->redirect('login');
        }
    }

    public function logout()
    {       $db = new Database();
        if (isset($_SESSION['user'])) {
            if (isset($_COOKIE['remember_me'])) {
                $db->update('users' , $_SESSION['user'][0] , ['remember_tokens'] , ['']);
                setcookie('remember_me', '', time() - 3600, "/");
            }
            unset($_SESSION['user']);
            session_destroy();

        }
        $this->redirect('login');
    }

    public function forgot()
    {
        require_once(BASE_PATH . '/tamplate/Auth/forgot.php');
    }

    public function forgotRequest($request)
    {

        if (empty($request['email'])) {
            flash("forgotError", 'تمامی فیلد ها الزامی می باشد');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash("forgotError", 'ایمیل شما معتبر نمی باشد');
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = $db->select('SELECT * FROM users WHERE email = ?;', $request['email'])->fetch();
            if ($user == null) {
                flash("forgotError", 'کاربر یافت نشد');
                $this->redirectBack();
            } else {
                $randomToken = $this->random();
                $forgotMessage = $this->forgotMessage($user['username'], $randomToken);
                $result = $this->sendMail($request['email'], 'بازیابی رمز عبور', $forgotMessage);

                if ($result) {

                    date_default_timezone_set('Asia/Tehran');
                    $db->update('users', $user['id'], ['forgot_token', 'forgot_token_expire'], [$randomToken, date('Y-m-d H:i:s', strtotime('+15 minutes'))]);
                    flash("forgotSuccess", '  ایمیلی برای شما حاوی لینک بازیابی رمز عبور ارسال گردیده (لطفا چک نمایید)');
                    $this->redirectBack();
                } else {
                    flash("forgotError", 'بازیابی رمز عبور با خطا مواجه شد');
                    $this->redirectBack();
                }
            }
        }
    }

    public function resetPasswordView($forgot_token)
    {
        require_once(BASE_PATH . '/tamplate/Auth/resetPasswordForm.php');
    }
    public function resetPassword($request, $forgot_token)
    {
        if (empty($request['passwrod']) && empty($request['confirmPassword'])) {
            flash("resetError", 'تمامی فیلد ها الزامی می باشد');
            $this->redirectBack();
            dd($request);
        }
        if (strlen($request['passwrod']) < 8 && strlen($request['confirmPassword']) < 8) {
            flash("resetError", 'پسورد شما باید حداقل 8 کارکتر باشد');
            $this->redirectBack();
        }
        if ($request['password'] != $request['confirmPassword']) {
            flash("resetError", 'رمز عبور با تکرار رمز عبور تطابق ندارد');
            $this->redirectBack();
        } else {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE forgot_token=?;", $forgot_token)->fetch();
            if ($user == null) {
                flash("resetError", 'کاربر یافت نشد');
                $this->redirectBack();
            } else {
                date_default_timezone_set('Asia/Tehran');
                if ($user['forgot_token_expire'] < date('Y-m-d H:i:s')) {
                    flash("resetError", 'تاریخ تعویض رمز عبور منقضی شده است');
                    $this->redirectBack();
                }
                if ($user) {
                    $hashNewPassword = $this->hash($request['password']);
                    $db->update('users', $user['id'], ['password'], [$hashNewPassword]);
                    $this->redirect('/login');
                } else {
                    flash("resetError", 'کاربر یافت نشد');
                    $this->redirectBack();
                }
            }
        }
    }
}
