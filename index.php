<?php

// session start

use database\Database;
use Admin\Category;
use Admin\Menus;
use Admin\dashboard;
use Auth\Auth;
use Auth\Profile;

session_start();


// config
define("BASE_PATH", __DIR__);
define("CURRENT_DOMAIN", currentDomain() . '/jobWorld/');
define("DISPLAY_ERROR", true);
define("DB_HOST", 'localhost');
define("DB_NAME", 'jobworld');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');


// mail config
define('MAIL_HOST', 'smtp.gmail.com');
define('SMTP_AUTH', true);
define('MAIL_USERNAME', '*****@gmail.com');
define('MAIL_PASSWORD', '*********');
define('MAIL_PORT', 587);
define('SENDER_MAIL', 'jobWorld.online1@gmail.com');
define('SENDER_NAME', 'سایت فریلنسری jobWorld');


require_once(BASE_PATH . '/helpers/helper.php');

// system routing
function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{
    // current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl =  str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    // reserved url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodFiled() != $requestMethod) {
        return false;
    }

    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}") {
            array_push($parameters, $currentUrlArray[$key]);
        } else if ($reservedUrlArray[$key] !== $currentUrlArray[$key]) {
            return false;
        }
    }

    if (methodFiled() == 'POST') {
        $request = isset($_FILES) ? array_merge($_FILES, $_POST) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }


    $object = new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();
}



// user
require_once('activites/User/User.php');


// auth
require_once('activites/Auth/Auth.php');

// requires
require_once('database/Database.php');
require_once('activites/Admin/Admin.php');
require_once('activites/Admin/Dashboard.php');
require_once('activites/Admin/Category.php');
require_once('activites/Admin/Users.php');
require_once('activites/Admin/Menus.php');
require_once('activites/Admin/Setting.php');
require_once('activites/Admin/Profile.php');
require_once('activites/Admin/Pages.php');
require_once('activites/Admin/Project.php');
require_once('activites/Admin/TicketCategory.php');
require_once('activites/Admin/TicketPriority.php');
require_once('activites/Admin/Ticket.php');
require_once('activites/Admin/Project.php');
require_once('activites/Admin/Transaction.php');


// home
require_once('activites/App/Home.php');
require_once('activites/project/Project.php');
require_once('activites/Freelancer/Freelancer.php');





spl_autoload_register(function ($className) {
    $path = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
    // $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    include $path . $className . '.php';
});
function jalaliDate($date)
{
    return \Parsidev\Jalali\jdate::forge($date)->format('%B %d , %Y');
}

// helpers 

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}
function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}
function asset($src)
{
    return trim(CURRENT_DOMAIN, '/ ') . '/' . trim($src, '/ ');
}
function url($url)
{
    return trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ ');
}


function currentUrl()
{
    return trim(currentDomain(), '/ ') . $_SERVER['REQUEST_URI'];
}

function methodFiled()
{
    return $_SERVER['REQUEST_METHOD'];
}

function displayError()
{
    if (DISPLAY_ERROR) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}

global $flashMessage;
if (isset($_SESSION['flash_message'])) {

    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}


function flash($name, $value = null)
{

    if ($value === null) {
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
        return $message;
    } else {

        $_SESSION['flash_message'][$name] = $value;
    }
}

function dd($var)
{
    echo '
<pre>';
    var_dump($var);
    exit;
}


// routes reserved




// dashboard
uri('admin', 'Admin\Dashboard', 'index');
uri('admin/dataChart', 'Admin\Dashboard', 'dataChart');

// category reserved url
uri('admin/category', 'Admin\Category', 'index');
uri('admin/category/create', 'Admin\Category', 'create');
uri('admin/category/store', 'Admin\Category', 'store', 'POST');
uri('admin/category/edit/{id}', 'Admin\Category', 'edit');
uri('admin/category/update/{id}', 'Admin\Category', 'update', 'POST');
uri('admin/category/delete/{id}', 'Admin\Category', 'delete');

// users reserved url
uri('admin/users', 'Admin\Users', 'index');
uri('admin/users/edit/{id}', 'Admin\Users', 'edit');
uri('admin/users/update/{id}', 'Admin\Users', 'update', 'POST');
uri('admin/users/permission/{id}', 'Admin\Users', 'changePermision');
uri('admin/users/delete/{id}', 'Admin\Users', 'delete');

// menus reserved url
uri('admin/menus', 'Admin\Menus', 'index');
uri('admin/menus/create', 'Admin\Menus', 'create');
uri('admin/menus/store', 'Admin\Menus', 'store', 'POST');
uri('admin/menus/edit/{id}', 'Admin\Menus', 'edit');
uri('admin/menus/update/{id}', 'Admin\Menus', 'update', 'POST');
uri('admin/menus/delete/{id}', 'Admin\Menus', 'delete');

// setting reserved url
uri('admin/setting', 'Admin\Setting', 'index');
uri('admin/setting/edit', 'Admin\Setting', 'edit');
uri('admin/setting/update', 'Admin\Setting', 'update', 'POST');

// profile reserved url
uri('admin/profile', 'Admin\Profile', 'index');
uri('admin/profile/edit/{id}', 'Admin\Profile', 'edit');
uri('admin/profile/update/{id}', 'Admin\Profile', 'update', 'POST');

// pages reserved url
uri('admin/about-us', 'Admin\Pages', 'aboutUs');
uri('admin/about-us/update', 'Admin\Pages', 'updateAboutUs', 'POST');
uri('admin/terms-conditions', 'Admin\Pages', 'terms');
uri('admin/terms-conditions/update', 'Admin\Pages', 'updateTerms', 'POST');

// projects reserved url
uri('admin/projects', 'Admin\Project', 'index');
uri('admin/projects/delete/{id}', 'Admin\Project', 'delete');

uri('admin/ticket-category', 'Admin\TicketCategory', 'index');
uri('admin/ticket-category/create', 'Admin\TicketCategory', 'create');
uri('admin/ticket-category/store', 'Admin\TicketCategory', 'store', 'POST');
uri('admin/ticket-category/edit/{id}', 'Admin\TicketCategory', 'edit');
uri('admin/ticket-category/update/{id}', 'Admin\TicketCategory', 'update', 'POST');
uri('admin/ticket-category/delete/{id}', 'Admin\TicketCategory', 'delete');


uri('admin/ticket-priority', 'Admin\TicketPriority', 'index');
uri('admin/ticket-priority/create', 'Admin\TicketPriority', 'create');
uri('admin/ticket-priority/store', 'Admin\TicketPriority', 'store', 'POST');
uri('admin/ticket-priority/edit/{id}', 'Admin\TicketPriority', 'edit');
uri('admin/ticket-priority/update/{id}', 'Admin\TicketPriority', 'update', 'POST');
uri('admin/ticket-priority/delete/{id}', 'Admin\TicketPriority', 'delete');

uri('admin/ticket', 'Admin\Ticket', 'index');
uri('admin/ticket/answer-create/{id}', 'Admin\Ticket', 'createAnswer');
uri('admin/ticket/answer-store/{id}', 'Admin\Ticket', 'StoreAnswer' , 'POST');
uri('admin/ticket/close/{id}', 'Admin\Ticket', 'Closed');


uri('admin/transaction', 'Admin\Transaction', 'index');
uri('admin/transaction/confirm/{id}', 'Admin\Transaction', 'confirmed');




// auth reserved url
uri('register', 'Auth\Auth', 'register');
uri('register/store', 'Auth\Auth', 'registerStore', 'POST');
uri('activation/{verify_token}', 'Auth\Auth', 'activation');
uri('login', 'Auth\Auth', 'login');
uri('check-login', 'Auth\Auth', 'checkLogin', 'POST');
uri('logout', 'Auth\Auth', 'logout');
uri('forgot', 'Auth\Auth', 'forgot');
uri('forgot/request', 'Auth\Auth', 'forgotRequest', 'POST');
uri('reset-password-form/{forgot_token}', 'Auth\Auth', 'resetPasswordView');
uri('reset-password/{forgot_token}', 'Auth\Auth', 'resetPassword', 'POST');

// panel user reserved url
uri('panel', 'User\User', 'index');
uri('panel/account', 'User\User', 'account');
uri('panel/account/edit-information', 'User\User', 'editInformation', 'POST');
uri('panel/account/edit-image', 'User\User', 'editImage', 'POST');
uri('panel/account/create-skills', 'User\User', 'createSkills');
uri('panel/account/store-skills', 'User\User', 'skillsStore', 'POST');
uri('panel/account/edit-skills/{id}', 'User\User', 'editSkills');
uri('panel/account/update-skills/{id}', 'User\User', 'updateSkills', 'POST');
uri('panel/account/edit-protfolio', 'User\User', 'editProtfolio', 'POST');
uri('panel/account/edit-cv', 'User\User', 'editCv', 'POST');
uri('panel/edit-profile', 'User\User', 'editProfile');
uri('panel/Balance', 'User\User', 'balance');
uri('panel/create-portfolio', 'User\User', 'createPortfolio');
uri('panel/portfolio/store', 'User\User', 'createPortfolioStore', 'POST');
uri('panel/portfolio/delete/{id}', 'User\User', 'portfolioDelete');
uri('panel/create-work-experience', 'User\User', 'createWorkExperience');
uri('panel/work-experience/store', 'User\User', 'workExperienceStore', 'POST');
uri('panel/work-experience/delete/{id}', 'User\User', 'workExperienceDelete');
uri('panel/create-education', 'User\User', 'createEducation');
uri('panel/education/store', 'User\User', 'educationStore', 'POST');
uri('panel/education/delete/{id}', 'User\User', 'educationDelete');
uri('panel/edit-profile/shaba', 'User\User', 'shabaEdit', 'POST');
uri('panel/edit-profile/change-password', 'User\User', 'ChangePassword', 'POST');
uri('panel/projects', 'User\User', 'projects');
uri('panel/create-project', 'User\User', 'createProject');
uri('panel/store-project', 'User\User', 'sotreProject', 'POST');
uri('panel/edit-project/{id}', 'User\User', 'editProject');
uri('panel/update-project/{id}', 'User\User', 'updateProject', 'POST');
uri('panel/delete-project/{id}', 'User\User', 'deleteProject');
uri('panel/messages', 'User\User', 'messages');
uri('panel/message-detils/{id}/user/{id}', 'User\User', 'messagesDetils');
// uri('panel/message-detils/store/user/{id}', 'User\User', 'messagesDetilsStore' , 'POST');
uri('panel/send-message/{id}/user/{id}', 'User\User', 'sendMessage');
uri('panel/show-message/{id}/user/{id}', 'User\User', 'showMessage');
uri('panel/seen-message/{id}/user/{id}', 'User\User', 'seenMessage');


uri('panel/Hiring-freelancer/{id}/user/{id}', 'User\User', 'hiringFreelancer');
uri('panel/milestones/{id}/user/{id}', 'User\User', 'milestones');
uri('panel/create-milestones/', 'User\User', 'createMilestone');
uri('panel/store-milestones/', 'User\User', 'storeMilestone', 'POST');
uri('panel/store-escrow-milestones/{id}', 'User\User', 'storeEscrowMilestone');
uri('panel/escrow-amount/{id}/project/{id}', 'User\User', 'escrowAmount');
uri('panel/change-status-completed/{id}', 'User\User', 'changeStatusCompleted');

// ticket
uri('panel/ticket', 'User\User', 'Ticket');
uri('panel/ticket/create', 'User\User', 'ticketCreate');
uri('panel/ticket/store', 'User\User', 'ticketStore' , 'POST');
uri('panel/ticket/show/{id}', 'User\User', 'ticketShow');


uri('panel/balance', 'User\User', 'balance');
uri('panel/balance/deposit-account', 'User\User', 'depositAccount');
uri('panel/balance/deposit-account-store', 'User\User', 'depositAccountStore', 'POST');

uri('panel/balance/withdrawal-account', 'User\User', 'withdrawalAccount');
uri('panel/balance/withdrawal-account-store', 'User\User', 'withdrawalAccountStore', 'POST');

// app reserved url
uri('/', 'App\Home', 'index');
uri('/home', 'App\Home', 'index');
uri('/about-us', 'App\Home', 'aboutUs');
uri('/contact-us', 'App\Home', 'contactUs');
uri('/contact-us-send', 'App\Home', 'contactUsSend', 'POST');
uri('/terms-conditions', 'App\Home', 'termsConditions');


uri('/show-projects', 'Project\Project', 'index');
uri('/show-projects/{id}', 'Project\Project', 'showProject');
uri('/view-project/{id}', 'Project\Project', 'viewProject');
uri('/search-projects', 'Project\Project', 'searchProject', 'POST');
uri('/register-offer-view/{id}', 'Project\Project', 'registerOfferView');
uri('/register-offer/{id}', 'Project\Project', 'registerOffer', 'POST');
uri('/show-freelancers', 'Freelancer\Freelancer', 'index');
uri('/view-freelancer/{id}', 'Freelancer\Freelancer', 'viewFreelancer');
uri('/show-portfolio/{id}', 'Freelancer\Freelancer', 'showPortfolio');
uri('/invitation-cooperate/{id}', 'Freelancer\Freelancer', 'InvitationCooperate');

uri('/show-projects-today', 'Project\Project', 'projectToday');



require_once(BASE_PATH . '/tamplate/App/errorPages/notFound-404.php');
