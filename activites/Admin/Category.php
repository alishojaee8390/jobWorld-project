<?php



namespace Admin;

use database\Database;

class Category extends Admin
{

    public function index()
    {
        $db = new Database();
        $categories = $db->select('SELECT * FROM categories ORDER BY `id` DESC');
     $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Category/index.php');
    }

    public function create()
    {
        $db = new Database();
     $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Category/create.php');
    }
    public function store($request)
    {



        if ($request['image']['tmp_name'] !== '') {
            $request['image'] = $this->saveImage($request['image'], 'categories');
        }


        if (empty($request['name'])) {
            $this->redirectBack();
        } else {
            $db = new Database();
            $db->insert('categories', array_keys($request), $request);
            $this->redirect('/admin/category');
        }
    }

    public function edit($id)
    {
        $db = new Database();
     $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $category = $db->select('SELECT * FROM categories WHERE id=?', $id)->fetch();
        if (!$category) {
            $this->redirect('/admin/category');
        }
        require_once(BASE_PATH . '/tamplate/Admin/Category/edit.php');
    }
    public function update($request, $id)
    {
        $db = new Database();

        if ($request['image']['tmp_name'] !== '') {
            $category = $db->select('SELECT * FROM categories WHERE id=?', $id)->fetch();
            $this->removeImage($category['image']);
            $request['image'] = $this->saveImage($request['image'], 'categories');
        } else {
            unset($request['image']);
        }


        $category = $db->select('SELECT * FROM categories WHERE id=?', $id)->fetch();
        if (!$category) {
            $this->redirectBack();
        } else {
            $db->update('categories', $id,  array_keys($request), $request);
            $this->redirect('/admin/category');
        }
    }
    public function delete($id)
    {
        $db = new Database();
        $category = $db->select('SELECT * FROM categories WHERE id=?', $id)->fetch();

        if (!$category) {
            $this->redirectBack();
        } else {
            $db->delete('categories', $id);
            $this->redirectBack();
        }
    }
}