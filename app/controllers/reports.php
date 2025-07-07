<?php

class Reports extends Controller {
  
  public function index() {
    $users = $this->model('User');
    $reminders = $this->model('Reminder');
    $logs = $this->model('AccessLog');

    // $reminders = $reminder->getAllRemindersByUserId($userId);
    //  $this->view('reminders/index', ['reminders' => $reminders]);
    $total_users = $users->getNumberOfUsers();
    $total_reminders = $reminders->getTotalNumberOfReminders();
    $total_logs = $logs->getTotalNumberOfLogs();

    // echo $total_reminders["total_reminders"];
    // die;
    
    $this->view('reports/index', ['total_users' => $total_users, 'total_reminders' => $total_reminders, 'total_logs' => $total_logs]);
  }  
}

?>