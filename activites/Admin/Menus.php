<?php



namespace Admin;

use database\Database;

class Menus extends Admin
{
    public function index()
    {
        $db = new Database();
        $menus = $db->select("SELECT m1.* , m2.name AS parent_name FROM menus m1 LEFT JOIN menus  m2 ON m1.parent_id = m2.id ORDER BY `id` DESC");
         $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Menus/index.php');
    }

    public function create()
    {
        $db = new Database();
        $menus = $db->select('SELECT * FROM menus WHERE  parent_id IS NULL ORDER BY id DESC ');
         $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Menus/create.php');
    }
    public function store($request)
    {
        $db = new Database();
        $db->insert('menus', array_keys(array_filter($request)), array_filter($request));
        $this->redirect('/admin/menus');
    }
    public function edit($id)
    {
        $db = new Database();
        $menus = $db->select('SELECT * FROM menus WHERE  parent_id IS NULL ORDER BY id DESC ');
        $menu = $db->select('SELECT * FROM menus WHERE id=? ', $id)->fetch();
         $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();

        require_once(BASE_PATH . '/tamplate/Admin/Menus/edit.php');
    }
    public function update($request, $id)
    {
        $db = new Database();
        $db->update('menus', $id, array_keys($request), $request);
        $this->redirect('/admin/menus');
    }
    public function delete($id)
    {
        $db = new Database();
        $db->delete('menus', $id);
        $this->redirectBack();
    }
}