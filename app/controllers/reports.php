<?php

class Reports extends Controller {
  
  public function index() {
    $users = $this->model('User');
    $reminders = $this->model('Reminder');
    $logs = $this->model('AccessLog');

    $total_users = $users->getNumberOfUsers();
    $total_reminders = $reminders->getTotalNumberOfReminders();
    $total_logs = $logs->getTotalNumberOfLogs();
    
    $this->view('reports/index', [
                'total_users' => $total_users, 
                'total_reminders' => $total_reminders, 
                'total_logs' => $total_logs
    ]);
  }  
}

?>