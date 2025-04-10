<?php



namespace Admin;

use database\Database;

class Setting extends Admin
{
    public function index()
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/setting/index.php');
    }


    public function edit()
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting ')->fetch();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/setting/edit.php');
        
    }
    public function update($request)
    {
        $db = new Database();
        $setting = $db->select('SELECT * FROM websetting ')->fetch();
        if ($request['logo']['tmp_name'] !== '') {

            $request['logo'] = $this->saveImage($request['logo'], 'setting', 'logo');
        } else {
            unset($request['logo']);
        }
        if ($request['icon']['tmp_name'] !== '') {

            $request['icon'] = $this->saveImage($request['icon'], 'setting', 'icon');
        } else {
            unset($request['icon']);
        }
        if ($request['background_head']['tmp_name'] !== '') {

            $request['background_head'] = $this->saveImage($request['background_head'], 'setting', 'background_head');
        } else {
            unset($request['background_head']);
        }

        if (!empty($setting)) {

            $db->update('websetting', $setting['id'], array_keys($request), $request);
        } else {
            $db->insert('websetting', array_keys($request), $request);
        }
        $this->redirect('/admin/setting');


        require_once(BASE_PATH . '/tamplate/Admin/setting/edit.php');
    }
}