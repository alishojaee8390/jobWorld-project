<?php

namespace Admin;

use database\Database;

class Ticket extends Admin
{


    public function index()
    {
        $db = new Database();
        $tickets =  $db->select('SELECT tickets.* , tickets.id as ticket_idd , ticket_categories.* , ticket_categories.name as category_name , ticket_priorities.* ,ticket_priorities.name as priority_name , users.* FROM tickets LEFT JOIN ticket_categories ON tickets.category_id=ticket_categories.id LEFT JOIN ticket_priorities ON tickets.priority_id=ticket_priorities.id LEFT JOIN users ON tickets.user_id=users.id')->fetchAll();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
     
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/index.php');
    }
    public function createAnswer($ticket_id)
    {
        $db = new Database();
        $ticket =  $db->select('SELECT tickets.*, tickets.id as ticket_idd , ticket_categories.* , ticket_categories.name as category_name , ticket_priorities.* ,ticket_priorities.name as priority_name , users.* FROM tickets LEFT JOIN ticket_categories ON tickets.category_id=ticket_categories.id LEFT JOIN ticket_priorities ON tickets.priority_id=ticket_priorities.id LEFT JOIN users ON tickets.user_id=users.id WHERE tickets.id=?', $ticket_id)->fetch();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/answer.php');
    }
    public function StoreAnswer($request, $ticket_id)
    {
        $db = new Database();
        $ticket =  $db->select('SELECT tickets.*, tickets.id as ticket_idd , ticket_categories.* , ticket_categories.name as category_name , ticket_priorities.* ,ticket_priorities.name as priority_name , users.* FROM tickets LEFT JOIN ticket_categories ON tickets.category_id=ticket_categories.id LEFT JOIN ticket_priorities ON tickets.priority_id=ticket_priorities.id LEFT JOIN users ON tickets.user_id=users.id WHERE tickets.id=?', $ticket_id)->fetch();
        $ticketReplies = $db->select('SELECT * FROM ticket_replies')->fetchAll();
        if (empty('description')) {
            flash('ticketError', 'تمامی فیلد ها الزامی می باشد');
            return $this->redirectBack();
        } else {
            $request['user_id'] = $_SESSION['user'][0];
            $request['ticket_id'] = $ticket_id;
            $request['is_admin'] = 1;
            $db->insert('ticket_replies', array_keys($request), array_values($request));
            $db->update('tickets',$ticket_id, ['status'] , [0]);
            flash('ticketAdminSuccess', 'پاسخ با موفقیت ثبت شد');
            return $this->redirect('admin/ticket/');
        }
    }
    public function Closed($ticket_id)
    {
        
        $db = new Database();
        $tickets =  $db->select('SELECT tickets.* , ticket_categories.* , ticket_categories.name as category_name , ticket_priorities.* ,ticket_priorities.name as priority_name , users.* FROM tickets LEFT JOIN ticket_categories ON tickets.category_id=ticket_categories.id LEFT JOIN ticket_priorities ON tickets.priority_id=ticket_priorities.id LEFT JOIN users ON tickets.user_id=users.id')->fetchAll();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $db->update('tickets', $ticket_id, ['status'] , [0]);
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/index.php');
    }
}
