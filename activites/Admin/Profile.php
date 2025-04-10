<?php

namespace Admin;

use database\Database;





class Profile extends Admin
{

    public function index()
    {
        $db = new Database();
        $userID = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $user = $db->select('SELECT * FROM users WHERE id=?',$userID['id'])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/profile/index.php');
    }
    public function edit($id)
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $id)->fetch();
        if ($user == null) {
            $this->redirect('admin/profile');
        }
        require_once(BASE_PATH . '/tamplate/Admin/profile/edit.php');
    }
    public function update($request, $id)
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $id)->fetch();
        if ($user == null) {
            $this->redirect('admin/profile');
        }


        if ($request['image']['tmp_name'] != null) {

            $request['image'] = $this->saveImage($request['image'], 'profile-image');
            $this->removeImage($user['image']);
        } else {
            unset($request['image']);
        }
        $db->update('users', $id, array_keys($request), $request);
        $this->redirect('admin/profile');
    }
}