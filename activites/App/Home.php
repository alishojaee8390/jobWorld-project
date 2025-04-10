<?php

namespace App;

use database\Database;

use PHPMailer\PHPMailer\PHPMailer;

class Home
{
    public function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function index()
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        // $menus = $db->select('SELECT m1.* , m2.name AS  parent_name FROM menus m1 LEFT JOIN menus m2 ON m1.parent_id = m2.id');
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $categories = $db->select('SELECT * FROM categories')->fetchAll();
        $projects = $db->select('SELECT * FROM projects ORDER BY created_at DESC LIMIT 0,3')->fetchAll();
        $freelancers = $db->select('SELECT * FROM users WHERE activity_user="freelancer" AND permission="user" ORDER BY created_at DESC LIMIT 0,2')->fetchAll();
        $freelancersCount =  $db->select('SELECT COUNT(*) FROM users WHERE  activity_user="freelancer" ')->fetch();
        $employersCount =  $db->select('SELECT COUNT(*) FROM users WHERE  activity_user="employer" ')->fetch();
        $projectsCount =  $db->select('SELECT COUNT(*) FROM projects WHERE  status=1 ')->fetch();
        date_default_timezone_set('Asia/Tehran');
        $toady = date('Y-m-d');
        $projectTodayAllLimit = $db->select('SELECT * FROM projects where Date(created_at) = ' . "'" . $toady . "'" . ' ORDER BY created_at DESC Limit 3')->fetchAll();


        require_once(BASE_PATH . '/tamplate/App/index.php');
    }

    public function showProjects()
    {
        require_once(BASE_PATH . '/tamplate/App/projects/show-projects.php');
    }
    public function aboutUs()
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $page = $db->select('SELECT * FROM pages WHERE id=1 ')->fetch();
        require_once(BASE_PATH . '/tamplate/App/aboutUs.php');
    }
    public function contactUs()
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        require_once(BASE_PATH . '/tamplate/App/contactUs.php');
    }
    public function contactUsSend($request)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->Port = MAIL_PORT;
        $mail->SMTPAuth = SMTP_AUTH;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->setFrom(SENDER_MAIL, SENDER_NAME);
        $mail->CharSet = 'UTF-8';

        $mail->addAddress($request['email']);

        if (empty($request['first_name']) || empty($request['email'])  || empty($request['message'])) {
            flash('contactError', 'تمامی فیلد ها الزامی می باشد');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('contactError', 'لطفا ایمیل معتبر وارد نمایید');
            $this->redirectBack();
        } else {
            if ($mail->addReplyTo($_POST['email'], $_POST['first_name'])) {

                $mail->Subject = 'درخواست';

                $mail->isHTML(false);

                $mail->Body = <<<EOT
        
        Email: {$_POST['email']}
        
        Name: {$_POST['first_name']}
        
        Message: {$_POST['message']}
        
        EOT;

                if (!$mail->send()) {
                    flash('contactError', 'پیام شما ناموفق بود دوباره امتحان کنید');
                    $this->redirectBack();
                } else {

                    flash('contactSuccess', 'پیام شما با موفقیت ارسال شد');
                    $this->redirectBack();
                }
            }
        }
    }
    public function termsConditions()
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $page = $db->select('SELECT * FROM pages WHERE id=2 ')->fetch();
        require_once(BASE_PATH . '/tamplate/App/terms.php');
    }
}
