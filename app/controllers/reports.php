<?php

class Reports extends Controller {
  
  public function index() {
    $users = $this->model('User');
    // $reminders = $this->model('Reminder');
    // $logs = $this->model('AccessLog');

    // $reminders = $reminder->getAllRemindersByUserId($userId);
    //  $this->view('reminders/index', ['reminders' => $reminders]);
    $total_users = $users->getNumberOfUsers();
    
    $this->view('reports/index', ['total_users' => $total_users]);
  }  
}

?>