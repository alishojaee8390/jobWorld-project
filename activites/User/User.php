<?php




namespace User;

use Auth\Auth;
use database\Database;
use Exception;
// use zarinpal;

class User
{
    public $basePath;
    public $currentDomain;
    public $projectId;
    public $milestoneId;

    public function __construct()
    {
        $db = new Database();
        $Auth = new Auth();
        $Auth->checkUserlogin();
        $this->basePath = BASE_PATH;
        $this->currentDomain = CURRENT_DOMAIN;
        $suggestions = $db->select("SELECT * FROM suggestions WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $wallet = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();
        if (!$suggestions) {
            $db->insert('suggestions', ['suggestions', 'user_id'], [10, $_SESSION['user'][0]]);
        }
        if (!$wallet) {
            $db->insert('wallets', ['balance', 'user_id'], [0, $_SESSION['user'][0]]);
        }
    }

    public function redirect($url)
    {
        header('Location: ' . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
        exit;
    }
    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
    protected function saveImage($image, $imagePath, $imageName = null)
    {

        if ($imageName) {
            $extension =  explode('/', $image['type'])[1];
            $imageName = $imageName . '.' . $extension;
            // category.png
        } else {
            $extension =  explode('/', $image['type'])[1];
            $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
        }

        $imageTemp = $image['tmp_name'];
        $imagePath = 'public/images/' . $imagePath . '/';

        if (is_uploaded_file($imageTemp)) {
            if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                return $imagePath . $imageName;
            } else {

                return false;
            }
        } else {
            return false;
        }
    }
    protected function saveFile($file, $filePath, $fileName = null)
    {

        if ($fileName) {
            $extension =  explode('/', $file['type'])[1];
            $fileName = $fileName . '.' . $extension;
            // category.png
        } else {
            $extension =  explode('/', $file['type'])[1];
            $fileName = date("Y-m-d-H-i-s") . '.' . $extension;
        }

        $fileTemp = $file['tmp_name'];
        $filePath = 'public/files/' . $filePath . '/';
        if (is_uploaded_file($fileTemp)) {
            if (move_uploaded_file($fileTemp, $filePath . $fileName)) {
                return $filePath . $fileName;
            } else {

                return false;
            }
        } else {
            return false;
        }
    }
    protected function removeImage($path)
    {
        $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
        if (file_exists($path)) {
            unlink($path);
        }
    }
    protected function removeFile($path)
    {
        $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
        if (file_exists($path)) {
            unlink($path);
        }
    }
    public function index()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $lastSuggestionProjects = $db->select("SELECT suggestion_project.* , projects.* FROM suggestion_project LEFT JOIN projects ON suggestion_project.project_id = projects.id  where suggestion_project.user_id=?", $_SESSION['user'][0])->fetchAll();
        $projectCount = $db->select("SELECT count(*) FROM projects WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $messageLastSuggestions = $db->select("SELECT suggestion_project.* ,suggestion_project.description as descriptionsuggestion , suggestion_project.user_id as fullNameFreelancer ,suggestion_project.project_id as suggestionid ,suggestion_project.user_id as userid , projects.* , users.* FROM suggestion_project LEFT JOIN projects ON suggestion_project.project_id = projects.id LEFT JOIN users ON suggestion_project.user_id = users.id where projects.user_id=? order by suggestion_project.created_at limit 0,2", $_SESSION['user'][0])->fetchAll();
        $messageLastSuggestionsFreelancers = $db->select("SELECT suggestion_project.* ,suggestion_project.description as descriptionsuggestion , suggestion_project.user_id as fullNameFreelancer ,suggestion_project.project_id as suggestionid ,suggestion_project.user_id as userid , projects.* , projects.user_id as project_userid , users.* FROM suggestion_project LEFT JOIN projects ON suggestion_project.project_id = projects.id LEFT JOIN users ON projects.user_id = users.id where suggestion_project.user_id=? order by suggestion_project.created_at limit 0,2", $_SESSION['user'][0])->fetchAll();
        $suggestions = $db->select("SELECT * FROM suggestions WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $suggestionCount = $db->select("SELECT count(*) FROM suggestion_project WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $wallet = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $dateNow = date('Y-m-d');

        require_once(BASE_PATH . '/tamplate/User/index.php');
    }
    public function account()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $userInfo = $db->select("SELECT * FROM userinfo WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $userPortfolios = $db->select("SELECT * FROM userportfolio WHERE user_id=?", $_SESSION['user'][0])->fetchAll();
        $skills = explode(',', $userInfo['skills']);
        $workExperiences = $db->select("SELECT * FROM work_experience WHERE user_id=?", $_SESSION['user'][0])->fetchAll();
        $education = $db->select("SELECT * FROM education WHERE user_id=?", $_SESSION['user'][0])->fetchAll();

        require_once(BASE_PATH . '/tamplate/User/edit-account.php');
    }
    public function editInformation($request)
    {

        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();

        $userInfo = $db->select("SELECT * FROM userinfo WHERE user_id=?", $_SESSION['user'][0])->fetch();

        if (isset($_SESSION['user'])) {
        } else {
            $this->redirect('login');
        }
        if (empty($request['first_name']) || empty($request['last_name']) || empty($request['phone_number'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/account');
        }
        if (!is_phone($request['phone_number'])) {
            flash('accountError', 'شماره موبایل اشتباه است');
            $this->redirect('panel/account');
        } else {
            if ($user != null) {
                $db->update('users', $_SESSION['user'][0], array_keys($request), array_values($request));
                flash('accountSuccess', 'اطلاعات شما با موفقیت ذخیره شد');
                $this->redirectBack();
            } else {
                $this->redirect('panel/account');
            }
        }
    }
    public function editImage($request)
    {

        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();

        $ex = pathinfo($request['image']['name'], PATHINFO_EXTENSION);
        if (!isset($_SESSION['user'])) {
            $this->redirect('login');
        }
        if (empty($request['image'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/account');
        } else {
            if ($request['image']['tmp_name'] != null) {
                if ($ex == 'png' || $ex == 'jpeg' || $ex == 'jpg' || $ex == 'webp') {

                    $request['image'] = $this->saveImage($request['image'], 'profile-image');
                    $this->removeImage($user['image']);
                } else {
                    flash('accountError', 'عکس شما باید (png , jpeg , jpg , webp) باشد');
                    $this->redirect('panel/account');
                }
            } else {
                unset($request['image']);
            }
            if ($user != null) {
                $db->update('users', $_SESSION['user'][0], array_keys($request), array_values($request));
                flash('accountSuccess', 'عکس شما با موفقیت ذخیره شد');
                $this->redirectBack();
            } else {
                $this->redirect('panel/account');
            }
        }
    }
    public function createSkills()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/create-skills.php');
    }
    public function skillsStore($request)
    {
        $db = new Database();
        if (isset($_SESSION['user'])) {
        } else {
            $this->redirect('login');
        }
        if (empty($request['skills'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/account');
        } else {
            $request['user_id'] = $_SESSION['user'][0];
            $db->insert('userinfo', ['skills', 'user_Id'], $request);
            flash('accountSuccess', 'اطلاعات شما با موفقیت ذخیره شد');
            $this->redirect('panel/account');
        }
    }
    public function editSkills($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $userInfo = $db->select("SELECT * FROM userinfo WHERE user_id=?",  $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/edit-skills.php');
    }
    public function updateSkills($request)
    {
        $db = new Database();
        $userInfo = $db->select("SELECT * FROM userinfo WHERE user_id=?", $_SESSION['user'][0])->fetch();

        $db = new Database();
        if (isset($_SESSION['user'])) {
        } else {
            $this->redirect('login');
        }
        if (empty($request['skills'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/account');
        } else {
            $db->update('userinfo',  $userInfo['id'],  ['skills'], $request);
            flash('accountSuccess', 'اطلاعات شما با موفقیت ذخیره شد');
            $this->redirect('panel/account');
        }
    }
    public function editProfile()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/edit-profile.php');
    }
    public function shabaEdit($request)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();

        if (isset($_SESSION['user'])) {
        } else {
            $this->redirect('login');
        }
        if (empty($request['number_shaba'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/edit-profile');
        } else {
            if ($user != null) {
                $db->update('users', $_SESSION['user'][0], array_keys($request), array_values($request));
                flash('accountSuccess', 'اطلاعات شما با موفقیت ذخیره شد');
                $this->redirectBack();
            } else {
                $this->redirect('panel/edit-profile');
            }
        }
    }

    public function createPortfolio()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/create-portfolio.php');
    }
    public function createPortfolioStore($request)
    {
        $db = new Database();
        if (empty($request['title']) || empty($request['description']) || empty($request['skills']) || empty($request['image'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/create-portfolio');
        } else {
            if ($request['image']['tmp_name'] !== '') {
                $request['image'] = $this->saveImage($request['image'], 'portfolio');
            }
            $db = new Database();
            $request['user_id'] = $_SESSION['user'][0];
            $db->insert('userportfolio', array_keys($request), $request);
            flash('accountSuccess', 'با موفقیت ایجاد شد');
            $this->redirect('/panel/account');
        }
    }
    public function portfolioDelete($id)
    {
        $db = new Database();
        $userPortfolio = $db->select('SELECT * FROM userportfolio WHERE id=?', $id)->fetch();

        if ($userPortfolio['image'] != null) {
            $this->removeImage($userPortfolio['image']);
        }
        if (!$userPortfolio) {
            $this->redirectBack();
        } else {
            $db->delete('userportfolio', $id);
            $this->redirectBack();
            flash('accountSuccess', 'با موفقیت جذف شد');
        }
    }



    public function createWorkExperience()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/create-work-experience.php');
    }
    public function workExperienceStore($request)
    {
        $db = new Database();
        if (empty($request['compony_name']) || empty($request['description']) || empty($request['job']) || empty($request['date_start']) || empty($request['date_end'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/create-work-experience');
        } else {
            $db = new Database();
            $request['user_id'] = $_SESSION['user'][0];
            $db->insert('work_experience', array_keys($request), $request);
            flash('accountSuccess', 'با موفقیت ایجاد شد');
            $this->redirect('/panel/account');
        }
    }
    public function workExperienceDelete($id)
    {
        $db = new Database();
        $workExperience = $db->select('SELECT * FROM work_experience WHERE id=?', $id)->fetch();

        if (!$workExperience) {
            $this->redirectBack();
        } else {
            $db->delete('work_experience', $id);
            $this->redirectBack();
            flash('accountSuccess', 'با موفقیت جذف شد');
        }
    }


    public function createEducation()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/create-education.php');
    }
    public function educationStore($request)
    {
        $db = new Database();
        if (empty($request['university_name']) || empty($request['description']) || empty($request['feild_study']) || empty($request['date_start']) || empty($request['date_end'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/create-work-experience');
        } else {
            $db = new Database();
            $request['user_id'] = $_SESSION['user'][0];
            $db->insert('education', array_keys($request), $request);
            flash('accountSuccess', 'با موفقیت ایجاد شد');
            $this->redirect('/panel/account');
        }
    }
    public function educationDelete($id)
    {
        $db = new Database();
        $education = $db->select('SELECT * FROM education WHERE id=?', $id)->fetch();

        if (!$education) {
            $this->redirectBack();
        } else {
            $db->delete('education', $id);
            $this->redirectBack();
            flash('accountSuccess', 'با موفقیت جذف شد');
        }
    }
    public function ChangePassword($request)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        if (empty($request['password']) || empty($request['newPassword']) || empty($request['confirmNewPassword'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/edit-profile');
        }
        if ($request['newPassword'] != $request['confirmNewPassword']) {
            flash('accountError', 'تکرار کلمه عبور مطابقت ندارد');
            $this->redirect('panel/edit-profile');
        }
        if (!password_verify($request['password'], $user['password'])) {
            flash('accountError', 'رمز عبور فعلی اشتباه است');
            $this->redirect('panel/edit-profile');
        } else {
            $hashPassword = password_hash($request['newPassword'], PASSWORD_DEFAULT);

            $db->update('users', $_SESSION['user'][0], ['password'], [$hashPassword]);
            flash('accountSuccess', 'اطلاعات شما با موفقیت ذخیره شد');
            $this->redirectBack();
        }
    }
    public function projects()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $projects = $db->select("SELECT * FROM projects WHERE user_id=?", $_SESSION['user'][0])->fetchAll();


        require_once(BASE_PATH . '/tamplate/User/projects.php');
    }
    public function createProject()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $categories = $db->select("SELECT * FROM Categories")->fetchAll();
        require_once(BASE_PATH . '/tamplate/User/create-project.php');
    }
    public function sotreProject($request)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $categories = $db->select("SELECT * FROM Categories")->fetchAll();
        if (empty($request['title']) || empty($request['cat_id']) || empty($request['budget']) || empty($request['suggested_time']) || empty($request['description']) || empty($request['tags'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/create-project');
        } else {
            if ($request['file']['tmp_name'] !== '') {
                $request['file'] = $this->saveFile($request['file'], 'projects');
            } else {
                $request['file'] = null;
            }
            $request['user_id'] = $_SESSION['user'][0];
            $db->insert('projects', array_keys($request), $request);
            flash('accountSuccess', 'با موفقیت ایجاد شد');
            $this->redirect('panel/projects');
        }
    }
    public function editProject($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $categories = $db->select("SELECT * FROM Categories")->fetchAll();
        $project = $db->select('SELECT * FROM projects WHERE id=?', $id)->fetch();
        require_once(BASE_PATH . '/tamplate/User/edit-project.php');
    }
    public function updateProject($request)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $project = $db->select('SELECT * FROM projects WHERE user_id=? AND status=1 ', $_SESSION['user'][0])->fetch();
        if (empty($request['title']) || empty($request['cat_id']) || empty($request['budget']) || empty($request['suggested_time']) || empty($request['description']) || empty($request['tags'])) {
            flash('accountError', 'تمامی فیلد ها اجباری می باشد');
            $this->redirect('panel/edit-project');
        } else {
            if ($request['file']['tmp_name'] != null) {
                $request['file'] = $this->saveFile($request['file'], 'projects');
                $this->removeFile($project['file']);
            } else {
                unset($request['file']);
            }
            $db->update('projects', $project['id'], array_keys($request), $request);
            flash('accountSuccess', 'با موفقیت ایجاد شد');
            $this->redirect('panel/projects');
        }
    }
    public function deleteProject($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $db->delete('projects', $id);
        flash('accountSuccess', 'با موفقیت حذف شد');
        $this->redirect('panel/projects');
    }

    public function messages()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $messageSuggestions = $db->select("SELECT suggestion_project.* ,suggestion_project.description as descriptionsuggestion , suggestion_project.user_id as fullNameFreelancer ,suggestion_project.project_id as suggestionid ,suggestion_project.user_id as userid , projects.* , users.* FROM suggestion_project LEFT JOIN projects ON suggestion_project.project_id = projects.id LEFT JOIN users ON suggestion_project.user_id = users.id where projects.user_id=?", $_SESSION['user'][0])->fetchAll();
        $messageSuggestionsFreelancers = $db->select("SELECT suggestion_project.* ,suggestion_project.description as descriptionsuggestion , suggestion_project.user_id as fullNameFreelancer ,suggestion_project.project_id as suggestionid ,suggestion_project.user_id as userid , projects.* , projects.user_id as project_userid , users.* FROM suggestion_project LEFT JOIN projects ON suggestion_project.project_id = projects.id LEFT JOIN users ON projects.user_id = users.id where suggestion_project.user_id=?", $_SESSION['user'][0])->fetchAll();
        $projectAssigned = $db->select('SELECT * FROM projects WHERE status=3 AND user_id=?', $_SESSION['user'][0])->fetch();
        $project = $db->select('SELECT * FROM projects WHERE status=3 AND freelancer_id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/messages.php');
    }

    public function messagesDetils($id, $user_id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/message-detils.php');
    }
    public function showMessage($id, $user_id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $project_id = $_GET['project_id'];
        $user_Id =  $_GET['user_id'];
        $receiver_Id =  $_GET['receiver_id'];
        $message = $db->select("SELECT * FROM messages where project_id={$project_id}")->fetchAll();

        echo json_encode($message);
    }
    public function seenMessage()
    {
        $db = new Database();
        $receiver_Id =  $_GET['receiver_id'];
        $project_id = $_GET['project_id'];
        $messageSeen = $db->select("SELECT * FROM messages where project_id={$project_id} and receiver_id={$receiver_Id}")->fetchAll();
        foreach ($messageSeen as $seen) {
            $seenMessage = $db->update('messages', $seen['id'], ['seen'], [1]);
        }
    }


    public function sendMessage($id, $user_id)
    {
        $db = new Database();
        $userId = $user_id;
        $projectId = $id;
        $message = $_GET['message'];
        $receiverId = $_GET['receiverId'];
        $messageInsert = $db->insert('messages', ['user_id', 'project_id', 'message', 'receiver_id'], [$userId, $projectId, $message, $receiverId]);
    }


    // transaction and balance 
    public function balance()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $balanceFreelancer = $db->select("SELECT users.* , wallets.* FROM users  LEFT JOIN wallets ON wallets.user_id = users.id  WHERE users.activity_user='freelancer' AND users.id=?", $_SESSION['user'][0])->fetchAll();
        $balanceEmployer = $db->select("SELECT users.* , wallets.* FROM users  LEFT JOIN wallets ON wallets.user_id = users.id  WHERE users.activity_user='employer' AND users.id=?", $_SESSION['user'][0])->fetchAll();
        $transactions = $db->select("SELECT * FROM transactions WHERE user_id=?", $_SESSION['user'][0])->fetchAll();
        $wallets = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/balance.php');
    }
    public function depositAccount()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $wallets = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();

        require_once(BASE_PATH . '/tamplate/User/deposit-account.php');
    }
    public function depositAccountStore($request)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $wallet = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();
        if (!empty($request['balance'])) {
            if ($wallet) {
                $walletsAmount = floatval($wallet['balance']);

                // try {
                //     $zarinPal = new ZarinPal('YOUR_MERCHANT_ID');

                //     // درخواست پرداخت
                //     $authority = $zarinPal->requestPayment(1000, 'http://your.callback.url', 'تست پرداخت', 12345);

                //     // هدایت کاربر به صفحه پرداخت
                //     $paymentUrl = 'https://sandbox.zarinpal.com/pg/StartPay/' . $authority;
                //     header("Location: $paymentUrl");
                //     exit;
                // } catch (Exception $e) {
                //     echo 'خطا: ' . $e->getMessage();
                // }
                $balanceRequest = floatval($request['balance']);
                $total = $walletsAmount + $balanceRequest;
                $db->update('wallets', $wallet['id'], ['balance'], [$total]);
                flash('successDesposit', 'مبلغ با موفقیت به حساب شما واریز شد');
            } else {
                $request['user_id'] = $user['id'];
                $db->insert('wallets', array_keys($request), array_values($request));
                flash('successDesposit', 'مبلغ با موفقیت به حساب شما واریز شد');
            }
            $db->insert('transactions', ['user_id', 'type', 'amount'], [$user['id'], 'deposit', $balanceRequest]);
            return $this->redirectBack();
        } else {
            flash('errorDesposit', 'تمامی فیلد ها الزامی است');
            return $this->redirectBack();
        }
    }
    public function withdrawalAccount()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $wallets = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/withdrawal-account.php');
    }
    public function withdrawalAccountStore($request)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $wallet = $db->select("SELECT * FROM wallets WHERE user_id=?", $_SESSION['user'][0])->fetch();
        if (!empty($request['balance']) && !empty($request['shaba'])) {
            if ($request['balance'] <= 0) {
                flash('errorWithdraw', 'مبلغ وارد شده باید بیشتر از 0 باشد');
                return $this->redirectBack();
            }
            if (!$wallet || $wallet['balance'] < $request['balance']) {
                flash('errorWithdraw', 'موجودی کافی نیست');
                return $this->redirectBack();
            }
            $walletsAmount = floatval($wallet['balance']);
            $balanceRequest = floatval($request['balance']);
            $total = $walletsAmount - $balanceRequest;
            $db->insert('transactions', ['user_id', 'type', 'amount'], [$user['id'], 'withdraw', $balanceRequest]);
            $transaction = $db->select('SELECT * FROM transactions WHERE user_id=?', $_SESSION['user'][0])->fetchAll();
            if ($transaction['status'] == 1) {
                $db->update('wallets', $wallet['id'], ['balance'], [$total]);
            }
            flash('successWithdraw', 'بعد از تایید مدیر مبلغ به حساب شما پرداخت میشود');
            return $this->redirectBack();
        } else {
            flash('errorWithdraw', 'تمامی فیلد ها الزامی است');
            return $this->redirectBack();
        }
    }


    public function hiringFreelancer($projectId, $freelancerId)
    {
        $db = new Database();
        $db->update('projects', $projectId, ['status', 'freelancer_id'], [3, $freelancerId]);
        return $this->redirectBack();
    }
    public function milestones($projectId, $freelancerId)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $milestones = $db->select("SELECT * FROM milestones WHERE project_id={$projectId}")->fetchAll();
        $escrow = $db->select("SELECT * FROM escrow WHERE project_id={$projectId}")->fetch();
        require_once(BASE_PATH . '/tamplate/User/milestones.php');
    }
    public function createMilestone()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $project = $db->select('SELECT * FROM projects WHERE status=3 AND user_id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/User/create-milestones.php');
    }
    public function storeMilestone($request)
    {
        $db = new Database();
        $db->insert('milestones', array_keys($request), array_values($request));
        $project = $db->select('SELECT * FROM projects WHERE status=3 AND user_id=?', $_SESSION['user'][0])->fetch();
        return $this->redirect("panel/milestones/{$project['id']}/user/{$project['freelancer_id']}");
    }
    public function storeEscrowMilestone($id)
    {
        $db = new Database();
        $wallet = $db->select('SELECT * FROM wallets WHERE user_id=?', $_SESSION['user'][0])->fetch();
        $project = $db->select('SELECT * FROM projects WHERE status=3 AND user_id=?', $_SESSION['user'][0])->fetch();
        $milestone = $db->select("SELECT * FROM milestones WHERE project_id={$project['id']} AND status=1")->fetch();
        if ($wallet['balance'] >= $milestone['amount']) {
            $db->insert('escrow', ['project_id', 'milestone_id', 'amount', 'status'], [$project['id'], $id, $milestone['amount'], 1]);
            $db->update('milestones', $milestone['id'],  ['status'], [2]);
            $total = $wallet['balance'] - $milestone['amount'];
            $db->update('wallets', $wallet['id'],  ['balance'],  [$total]);
            flash('escrowSuccess', 'مبلغ با موفقیت به حساب سایت واریز شد');
            return $this->redirectBack();
        } else {

            flash('escrowError', 'موجوی حساب شما کافی نمی باشد');
            return $this->redirectBack();
        }
    }
    public function changeStatusCompleted($id)
    {
        $db = new Database();
        $project = $db->select('SELECT * FROM projects WHERE status=3 AND freelancer_id=?', $_SESSION['user'][0])->fetch();
        $milestone = $db->select("SELECT * FROM milestones WHERE project_id={$project['id']} AND status=2")->fetch();
        $db->update('milestones', $id, ['status'], [3]);
        flash('statusSuccess', 'با تایید کارفرما مبلغ آزاد شده و به حساب شما واریز می گردد');
        return $this->redirectBack();
    }
    public function escrowAmount($id, $project_id)
    {
        $db = new Database();
        $escrow = $db->select("SELECT * FROM escrow WHERE milestone_id=? AND status='held' AND project_id={$project_id}", $id)->fetch();
        $freelancerId = $db->select('SELECT escrow.* , projects.* FROM escrow LEFT JOIN projects ON projects.id=escrow.project_id')->fetch();
        $wallet = $db->select('SELECT * FROM wallets WHERE user_id=?', $freelancerId['freelancer_id'])->fetch();
        if (!empty($escrow)) {
            $db->update('escrow', $escrow['id'], ['status', 'released_at'], [2, date('Y-m-d H:i:s')]);
            $total = $wallet['balance'] + $escrow['amount'];
            $db->update('wallets', $wallet['id'],  ['balance'],  [$total]);
        }
        return $this->redirectBack();

        // flash('statusSuccess' , 'با تایید کارفرما مبلغ آزاد شده و به حساب شما واریز می گردد');
    }

    public function ticket()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $tickets = $db->select("SELECT tickets.* ,  tickets.id as tickets_ticket_id , ticket_categories.* , ticket_categories.name as category_name , ticket_priorities.* , ticket_priorities.name as priority_name FROM tickets LEFT JOIN ticket_categories ON tickets.category_id=ticket_categories.id LEFT JOIN ticket_priorities ON tickets.priority_id=ticket_priorities.id WHERE tickets.user_id=?" , $_SESSION['user'][0])->fetchAll();
        require_once(BASE_PATH . '/tamplate/User/ticket.php');
    }
    public function ticketCreate()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $ticketCategories = $db->select("SELECT * FROM ticket_categories")->fetchAll();
        $ticketPriorities = $db->select("SELECT * FROM ticket_priorities")->fetchAll();
        require_once(BASE_PATH . '/tamplate/User/create-ticket.php');
    }
    public function ticketStore($request)
    {
        $db = new Database();
        $ticketCategories = $db->select("SELECT * FROM ticket_categories")->fetchAll();
        $ticketPriorities = $db->select("SELECT * FROM ticket_priorities")->fetchAll();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        if (empty($request['title']) || empty($request['category_id']) || empty($request['priority_id']) || empty($request['description'])) {
            flash('errorTicket', 'تمامی فیلد ها الزامی است');
            return $this->redirectBack();
        } else {
            $request['user_id'] = $_SESSION['user'][0];
            $db->insert('tickets', array_keys($request), array_values($request));
            return $this->redirect('panel/ticket/');
        }
        require_once(BASE_PATH . '/tamplate/User/create-ticket.php');
    }
    public function ticketShow($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $tickets = $db->select("SELECT tickets.* ,  tickets.id as tickets_ticket_id , ticket_categories.* , ticket_categories.name as category_name , ticket_priorities.* , ticket_priorities.name as priority_name FROM tickets LEFT JOIN ticket_categories ON tickets.category_id=ticket_categories.id LEFT JOIN ticket_priorities ON tickets.priority_id=ticket_priorities.id WHERE tickets.user_id=?" , $_SESSION['user'][0])->fetchAll();
        $ticketReplay = $db->select("SELECT * FROM ticket_replies WHERE ticket_id=?" , $id)->fetch();
        require_once(BASE_PATH . '/tamplate/User/show-ticket.php');
    }
}
