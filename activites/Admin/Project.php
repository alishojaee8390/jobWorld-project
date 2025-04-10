<?php



namespace Admin;

use database\Database;

class Project extends Admin
{

    public function index()
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $projects = $db->select('SELECT * FROM projects ORDER BY `id` DESC');
        require_once(BASE_PATH . '/tamplate/Admin/Project/index.php');
    }

  
    public function delete($id)
    {
        $db = new Database();
        $projects = $db->select('SELECT * FROM projects WHERE id=?', $id)->fetch();

        if (!$projects) {
            $this->redirectBack();
        } else {
            $db->delete('categories', $id);
            $this->redirectBack();
        }
    }
}