<?php

namespace Admin;

use database\Database;





class Pages extends Admin
{

    public function aboutUs()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $_SESSION['user'][0])->fetch();
        $page = $db->select("SELECT * FROM pages WHERE id = 1")->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/pages/aboutUsEdit.php');
    }
    public function updateAboutUs($request)
    {
        $db = new Database();
        $page = $db->select("SELECT * FROM pages WHERE id = 1")->fetch();
        if ($page == null) {
            $this->redirect('admin');
        } else {

            $db->update('pages', 1, array_keys($request), $request);
            $this->redirectBack();
        }
        require_once(BASE_PATH . '/tamplate/Admin/profile/index.php');
    }
    public function terms()
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?",  $_SESSION['user'][0])->fetch();
        $page = $db->select("SELECT * FROM pages WHERE id = 2")->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/pages/termsConditionsEdit.php');
    }
    public function updateTerms($request)
    {
        $db = new Database();
        $page = $db->select("SELECT * FROM pages WHERE id = 2")->fetch();
        if ($page == null) {
            $this->redirect('admin');
        } else {

            $db->update('pages', 2, array_keys($request), $request);
            $this->redirectBack();
        }
        require_once(BASE_PATH . '/tamplate/Admin/profile/index.php');
    }
}