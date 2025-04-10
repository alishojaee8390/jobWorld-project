<?php

namespace Admin;

use database\Database;

class TicketPriority extends Admin
{


    public function index()
    {
        $db = new Database();
        $ticketPriorities = $db->select('SELECT * FROM ticket_priorities ORDER BY `id` DESC')->fetchAll();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/TicketPriority/index.php');
    }

    public function create()
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/TicketPriority/create.php');
    }
    public function store($request)
    {
        $db = new Database();
        $db->insert('ticket_priorities', array_keys($request), $request);
        $this->redirect('/admin/ticket-priority');
    }

    public function edit($id)
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $ticketPriority = $db->select('SELECT * FROM ticket_priorities WHERE id=?', $id)->fetch();
        if (!$ticketPriority) {
            $this->redirect('/admin/ticket-priority');
        }
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/TicketPriority/edit.php');
    }
    public function update($request, $id)
    {
        $db = new Database();
        $ticketPriority = $db->select('SELECT * FROM ticket_priorities WHERE id=?', $id)->fetch();
        if (!$ticketPriority) {
            $this->redirectBack();
        } else {
            $db->update('ticket_priorities', $id,  array_keys($request), $request);
            $this->redirect('/admin/ticket-priority');
        }
    }
    public function delete($id)
    {
        $db = new Database();
        $ticketPriority = $db->select('SELECT * FROM ticket_priorities WHERE id=?', $id)->fetch();
        if (!$ticketPriority) {
            $this->redirectBack();
        } else {
            $db->delete('ticket_priorities', $id);
            $this->redirectBack();
        }
    }
}
