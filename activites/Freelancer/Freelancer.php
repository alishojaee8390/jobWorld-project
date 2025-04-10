<?php




namespace Freelancer;

use database\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Exception;

class Freelancer
{
    public $userIdFreelancer;
    public $disableBtnInvitationCooperate;

    protected function redirect($url)
    {
        header("Location: " . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }
    public function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function index()
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus')->fetchAll();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * 5;
        $totalFreelancer = $db->select('SELECT count(*) FROM users')->fetchColumn();
        $totalPages = ceil($totalFreelancer / 5);
        $freelancers = $db->select('SELECT users.* , userinfo.expertise_title AS expertise_title , userinfo.skills AS userinfo_freelancer From users LEFT JOIN userinfo ON users.id = userinfo.user_id WHERE users.activity_user="freelancer" AND users.permission="user" ORDER BY users.created_at DESC  Limit 5 offset ' . $offset)->fetchAll();
        require_once(BASE_PATH . '/tamplate/App/freelancers/show-freelancers.php');
    }

    public function viewFreelancer($id)
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $freelancer = $db->select('SELECT users.* , userinfo.* From users LEFT JOIN userinfo ON users.id = userinfo.user_id WHERE users.activity_user="freelancer" AND users.id=? ', $id)->fetch();
        $portfolios = $db->select('SELECT * FROM userportfolio WHERE user_id=?', $id)->fetchAll();
        $workExperiences = $db->select('SELECT * FROM work_experience WHERE user_id=?', $id)->fetchAll();
        $educations = $db->select('SELECT * FROM education WHERE user_id=?', $id)->fetchAll();
        $skills = explode(',', $freelancer['skills']);

        $userIdFreelancerGet = $this->userIdFreelancer = $id;
        if (isset($_SESSION['user'])) {
            $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
            if ($user['activity_user'] == 'employer') {
                $disableBtnInvitationCooperate = true;

            }else{
                $disableBtnInvitationCooperate = false;
            }
        }else{
            $disableBtnInvitationCooperate = false;

        }
        if ($freelancer == null) {
            $this->redirect('show-freelancers');
        } else {

            require_once(BASE_PATH . '/tamplate/App/freelancers/view-freelancer.php');
        }
    }
    public function showPortfolio($id)
    {
        $db = new Database();
        if ($_SESSION['user']) {
            $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
            $setting = $db->select('SELECT * FROM websetting')->fetch();
            $menus = $db->select('SELECT * FROM menus ')->fetchAll();
            $portfolio = $db->select('SELECT * FROM userportfolio WHERE id=?', $id)->fetch();
            $skills = explode(',', $portfolio['skills']);
            require_once(BASE_PATH . '/tamplate/App/freelancers/show-portfolio.php');
        } else {
            $this->redirect('/login');
        }
    }

    public function InvitationCooperate($id)
    {
      
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
            if ($user['activity_user'] == 'employer') {

                $userReciver = $db->select("SELECT * FROM users WHERE id=?", $id)->fetch();
                $sendSuccess = null;
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
                    $mail->setFrom($user['email'], $user['first_name'] . $user['last_name']);
                    $mail->addAddress($userReciver['email']);

                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'دعوت به همکاری';
                    $mail->Body = '
            <h1>درخواست به همکاری</h1>
            <p>سلام خسته نباشید</p>
            <p>از سایت جاب ورلد بنده درخواست همکاری با شما را دارم جهت همکاری به همین ایمیل پیام دهید</p>
            <p>یا با این شماره تماس بگیرید ' . $user['phone_number'] . '</p>
            <p>با تشکر</p>
            ';

                    $mail->send();
                    $sendSuccess = true;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    $sendSuccess = false;
                }
                if ($sendSuccess) {
                    flash('successSendMail', 'دعوت همکاری با موفقیت به فریلنسر ایمیل شد');
                    $this->redirectBack();
                } else {
                    flash('errorSendMail', 'خطا! لطفا مجدد امتحان کنید');
                    $this->redirectBack();
                }
            } else {
                $this->redirect('login');
            }
        }
    }
}
