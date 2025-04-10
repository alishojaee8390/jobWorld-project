<?php




namespace Project;

use database\Database;
// use Auth\Auth;
use Auth\Auth;



class Project extends Auth
{
    public function redirect($url)
    {
        header('Location: ' . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    public function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
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


    public function saveFile($file , $filePath , $fileName){
        if($fileName){
            $extension = explode('/' , $file['type'])[1];
        }


    }

    public function index()
    {

        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * 5;
        $projects = $db->select('SELECT * FROM projects Limit 5 offset ' . $offset)->fetchAll();
        $totalProjects = $db->select('SELECT count(*) FROM projects where status = 1')->fetchColumn();
        $totalPages = ceil($totalProjects / 5);
        require_once(BASE_PATH . '/tamplate/App/projects/show-projects.php');
    }

    public function showProject($id)
    {

        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * 5;
        $totalProjects = $db->select('SELECT count(*) FROM projects WHERE cat_id=? AND status=1 ', $id)->fetchColumn();

        $totalPages = ceil($totalProjects / 5);
        $projectFilterCategory = $db->select('SELECT * FROM projects WHERE cat_id=? AND status=1 Limit 5 offset ' . $offset, $id)->fetchAll();
        $categoryName = $db->select('SELECT * FROM categories WHERE id=?  ', $id)->fetch();

        if ($categoryName == null && $projectFilterCategory == null) {
            $this->redirect('show-projects');
        }
        require_once(BASE_PATH . '/tamplate/App/projects/show-project.php');
    }
    public function viewProject($id)
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $project = $db->select('SELECT * FROM projects WHERE id=? AND status=1 ', $id)->fetch();
        $disableBtn = false;
        if (isset($_SESSION['user'])) {
            $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
            if ($user['activity_user'] === 'freelancer') {
                $disableBtn = true;
            } else {
                $disableBtn = false;
            }
        } else {
            $this->redirect('login');
        }

        if ($project == null) {
            $this->redirect('show-projects');
        }
        $tags = explode(',', $project['tags']);
        require_once(BASE_PATH . '/tamplate/App/projects/view-project.php');
    }

    public function searchProject($request)
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * 5;

        $search =  $request['search'];
        $totalProjects = $db->select("SELECT count(*) FROM projects WHERE title LIKE '%$search%' ORDER BY created_at DESC ")->fetchColumn();
        $totalPages = ceil($totalProjects / 5);

        if (empty($request['search'])) {
            $this->redirectBack();
        } else {
            $projects = $db->select("SELECT * FROM projects WHERE title LIKE '%$search%' ORDER BY created_at DESC Limit 5 offset " . $offset)->fetchAll();
            require_once(BASE_PATH . '/tamplate/app/projects/search-project.php');
        }
        require_once(BASE_PATH . '/tamplate/app/projects/search-project.php');
    }

    public function registerOfferView($id)
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $project = $db->select('SELECT * FROM projects WHERE id=? AND status=1', $id)->fetch();
    
        if (!$project) {
            $this->redirect('show-projects');
        }
        if (!isset($_SESSION['user'])) {

            $this->redirect('login');
        }
        require_once(BASE_PATH . '/tamplate/App/projects/register-offer.php');
    }
    public function registerOffer($request, $id)
    {
        $db = new Database();
        $suggestions = $db->select("SELECT * FROM suggestions WHERE user_id=?", $_SESSION['user'][0])->fetch();
        $suggestionProject = $db->select("SELECT * FROM suggestion_project WHERE user_id=? AND project_id={$id}" , $_SESSION['user'][0])->fetchAll();
      
        if (empty($request['pirce'])  || empty($request['deadline_work']) || empty($request['guaranteed_expertise'])  || empty($request['description'])) {
            flash("error_project", 'تمامی فیلد ها اجباری است!');
            $this->redirectBack();
        } else if (!preg_match('/^[0-9]*$/', $request['pirce']) || !preg_match('/^[0-9]*$/', $request['deadline_work']) || !preg_match('/^[0-9]*$/', $request['guaranteed_expertise'])) {
            flash("error_project", 'لطفا عدد وارد نمایید!');
            $this->redirectBack();
        } else if (!preg_match('/^[1-9]?[0-9]{1}$|^100$/', $request['guaranteed_expertise'])) {
            flash("error_project", 'لطفا بین 1 تا 100 عدد وارد نمایید!');
            $this->redirectBack();
        } else if ($suggestions['suggestions'] == 0) {
            flash("error_project", 'پیشنهاد های شما به اتمام رسیده است!');
            $this->redirectBack();
        } else {
            if($suggestionProject){
                flash("error_project", 'شما قبلا روی این پروژه پیشنهاد ارسال کرده اید!');
                $this->redirectBack();
            }else{
                $db->update('suggestions',  $suggestions['id'], ['suggestions', 'user_id'],  [intval($suggestions['suggestions'] -= 1), $_SESSION['user'][0]]);
                $request['user_id'] = $_SESSION['user'][0];
                $request['project_id'] = intval($id);
                $db->insert('suggestion_project', array_keys($request), array_values($request));
                flash("success_project", 'پیشنهاد با موفقیت انجام شد');
                $this->redirectBack();
            }
        }
    }
    public function projectToday()
    {

        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        $menus = $db->select('SELECT * FROM menus ')->fetchAll();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * 5;
        date_default_timezone_set('Asia/Tehran');
        $toady = date('Y-m-d');
        $totalProjects = $db->select('SELECT count(*) FROM projects where Date(created_at) = ' . "'" . $toady . "'" . ' ORDER BY created_at DESC')->fetchColumn();
        $totalPages = ceil($totalProjects / 5);
        $projectTodayAll = $db->select('SELECT * FROM projects where Date(created_at) = ' . "'" . $toady . "'" . ' ORDER BY created_at DESC  Limit 5 offset ' . $offset)->fetchAll();
        require_once(BASE_PATH . '/tamplate/App/projects/show-projects-today.php');
    }
}
