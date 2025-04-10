<?php


namespace Admin;

use database\Database;


class Dashboard extends Admin
{

    public function index()
    {

        $db = new Database();
        $categoriesCount = $db->select('SELECT COUNT(*) as categoriesCount FROM categories')->fetch();
        $menuCount = $db->select('SELECT COUNT(*) as menuCount FROM menus')->fetch();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $usersCount = $db->select('SELECT COUNT(*) as usersCount FROM users')->fetch();
        $projectCount = $db->select('SELECT COUNT(*) as projectCount FROM projects')->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Dashboard/index.php');
    }
    
    public function dataChart()
    {
        header('Content-Type: application/json');
        $db = new Database();
        $usersCountFreelancer = $db->select('SELECT COUNT(*) as usersCountFreelancer FROM users WHERE activity_user="freelancer"')->fetch();
        $usersCountEmployer = $db->select('SELECT COUNT(*) as usersCountEmployer FROM users WHERE activity_user="employer"')->fetch();
        $projectCount = $db->select('SELECT COUNT(*) as projectCount FROM projects')->fetch();
        $data = [
            ["label" => "فریلنسرها", "value" =>  $usersCountFreelancer['usersCountFreelancer'] , "barColors" => "red"],
            ["label" => "کارفرمایان", "value" => $usersCountEmployer['usersCountEmployer'] , "barColors" => "green"],
            ["label" => "پروژه ها", "value" =>  $projectCount['projectCount'] , "barColors" => "blue"],
            ["label" => "", "value" =>  0 , "barColors" => ""]
        ];
        echo json_encode($data);
    }
}
