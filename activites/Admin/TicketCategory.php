<?php

namespace Admin;

use database\Database;

class TicketCategory extends Admin
{


    public function index()
    {
        $db = new Database();
        $ticketCategories = $db->select('SELECT * FROM ticket_categories ORDER BY `id` DESC')->fetchAll();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/TicketCategory/index.php');
    }

    public function create()
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/TicketCategory/create.php');
    }
    public function store($request)
    {
            $db = new Database();
            $db->insert('ticket_categories', array_keys($request), $request);
            $this->redirect('/admin/ticket-category');
    }

    public function edit($id)
    {
        $db = new Database();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        $ticketCategory = $db->select('SELECT * FROM ticket_categories WHERE id=?', $id)->fetch();
        if (!$ticketCategory) {
            $this->redirect('/admin/ticket-category');
        }
        require_once(BASE_PATH . '/tamplate/Admin/Ticket/TicketCategory/edit.php');
    }
    public function update($request, $id)
    {
        $db = new Database();
        $ticketCategory = $db->select('SELECT * FROM ticket_categories WHERE id=?', $id)->fetch();
        if (!$ticketCategory) {
            $this->redirectBack();
        } else {
            $db->update('ticket_categories', $id,  array_keys($request), $request);
            $this->redirect('/admin/ticket-category');
        }
    }
    public function delete($id)
    {
        $db = new Database();
        $ticketCategory = $db->select('SELECT * FROM ticket_categories WHERE id=?', $id)->fetch();

        if (!$ticketCategory) {
            $this->redirectBack();
        } else {
            $db->delete('ticket_categories', $id);
            $this->redirectBack();
        }
    }
}
