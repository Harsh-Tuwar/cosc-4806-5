<?php

class Reports extends Controller {
  
  public function index() {
    $users = $this->model('User');
    $reminders = $this->model('Reminder');
    $logs = $this->model('AccessLog');

    $total_users = $users->getNumberOfUsers();
    $total_reminders = $reminders->getTotalNumberOfReminders();
    $total_logs = $logs->getTotalNumberOfLogs();

    $max_stats = $logs->getMaxStatsOfLogin();
    
    $this->view('reports/index', [
                'total_users' => $total_users, 
                'total_reminders' => $total_reminders, 
                'total_logs' => $total_logs,
                'failed_attempts' => $max_stats['bad'],
                'successful_attempts' => $max_stats['good'],
    ]);
  }

  public function all_logs() {
    $this->view('reports/all_logs', [
                'logs' => $this->model('AccessLog')->getAllLogs()
    ]);
  }

  public function reminders() {
    $reminders = $this->model('Reminder');

    $reminder_totals = $reminders->getReminderTotals();
    
    $this->view('reports/reminders_overview', [
                'reminders' => $reminders->getAllReminders(),
                'totals' => $reminder_totals,
    ]);
  }
}

?>