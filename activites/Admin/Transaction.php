<?php



namespace Admin;

use database\Database;

class Transaction extends Admin
{

    public function index()
    {
        $db = new Database();
        $transactions = $db->select('SELECT transactions.* , transactions.id as transaction_id , users.* FROM transactions LEFT JOIN users ON transactions.user_id=users.id WHERE type="withdraw"')->fetchAll();
        $user = $db->select('SELECT * FROM users WHERE id=?', $_SESSION['user'][0])->fetch();
        require_once(BASE_PATH . '/tamplate/Admin/transaction/index.php');
    }

    public function confirmed($id) {
        $db = new Database();
        $transaction = $db->select('SELECT * FROM transactions WHERE id=?', $id)->fetch();
        $db->update('transactions', $id, ['status'], [2]);
        $this->redirectBack();
    }
}
