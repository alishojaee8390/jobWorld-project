<?php



namespace Admin;

use database\Database;

class Users extends Admin
{
    public function index()
    {
        $db = new Database();
        $users = $db->select("SELECT * FROM users ORDER BY `id` DESC");
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Users/index.php');
    }
    public function changePermision($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $id)->fetch();

        if (empty($user)) {
            $this->redirectBack();
        } else if ($user['permission'] == 'admin') {
            $db->update('users', $id, ['permission'], ['user']);
            $this->redirectBack();
        } else {
            $db->update('users', $id, ['permission'], ['admin']);
            $this->redirectBack();
        }
    }

    public function edit($id)
    {
        $db = new Database();
        $user =  $db->select('SELECT * FROM users WHERE id=?', $id)->fetch();
        if (empty($user)) {
            $this->redirect('/admin/users');
        }

        require_once(BASE_PATH . '/tamplate/Admin/Users/edit.php');
    }
    public function update($request, $id)
    {
        $db = new Database();
        $user =  $db->select('SELECT * FROM users WHERE id=?', $id)->fetch();
        $request = ['fullName' => $request['fullName'], 'username' => $request['username'], 'email' => $request['email'], 'permission' => $request['permission']];

        if (!empty($user)) {
            $db->update('users', $id, array_keys($request), $request);
            $this->redirect('/admin/users');
        } else {
            $this->redirect('/admin/users');
        }
    }

    public function delete($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id=?", $id)->fetch();

        if (empty($user)) {
            $this->redirectBack();
        } else {
            $db->delete('users', $id);
            $this->redirectBack();
        }
    }
}
