<?php


namespace Admin;

use Auth\Auth;
use database\Database;


class Admin
{

    public $basePath;
    public $currentDomain;
    public $user;


    public function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
        $db = new Database();
        $this->user =  $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $this->basePath = BASE_PATH;
        $this->currentDomain = CURRENT_DOMAIN;
    }



    public function redirect($url)
    {
        header('Location: ' . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
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

    protected function removeImage($path)
    {
        $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
