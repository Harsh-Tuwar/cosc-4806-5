<?php

class Reminder {
  public function __construct() {}

  public function getAllRemindersByUserId($userId)  {
    $db = db_connect();
    $query = $db->prepare("SELECT * FROM reminders where deleted = 0 and userId = :userId;");
    $query->bindParam(':userId', $userId);
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function getTotalNumberOfReminders() {
    $db = db_connect();
    $query = $db->prepare("
       SELECT 
          COUNT(*) AS all_reminders,
          COUNT(CASE WHEN completed = 1 THEN 1 END) AS completed_reminders,
          COUNT(CASE WHEN completed = 0 THEN 1 END) AS incomplete_reminders
        FROM reminders
        WHERE deleted = 0
    ");
    $query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC);    
    return $rows;
  }

  public function updateReminder($reminderId, $subject, $completed)  {
    $db = db_connect();

    $query = "UPDATE reminders SET subject = :subject, completed = :completed, completedAt = :completedAt WHERE id = :id;";

    $statement = $db->prepare($query);
    $statement->bindParam(':id', $reminderId);
    $statement->bindParam(':subject', $subject);
    $statement->bindParam(':completed', $completed);

    $completedAt = null;

    if ($completed == 1) {
        $completedAt = date('Y-m-d H:i:s');
    }
    
    $statement->bindParam(':completedAt', $completedAt);

    if ($statement->execute()) {
      header('Location: /reminders');
      unset($_SESSION['reminder_error']);
      die;
    } else {
      $_SESSION['reminder_error'] = "Error updating reminder. Probably a server error. Try again later.";
      header('Location: /reminders');
    }
  }

  public function createReminder($user_id, $subject, $completed) {
     $db = db_connect();

    if ($completed == 1) {
      $query = "INSERT INTO reminders (userId, subject, completed, completedAt) VALUES (:user_id, :subject, :completed, :completedAt);";
    } else {
      $query = "INSERT INTO reminders (userId, subject, completed) VALUES (:user_id, :subject, :completed);";
    }
    
    $statement = $db->prepare($query);
    $statement->bindParam(':user_id', $user_id);
    $statement->bindParam(':subject', $subject);
    $statement->bindParam(':completed', $completed);
    
    if ($completed == 1) {
      $statement->bindParam(':completedAt', date('Y-m-d H:i:s'));
    }

    if ($statement->execute()) {
      header('Location: /reminders');
      unset($_SESSION['reminder_error']);
      die;
    } else {
      $_SESSION['reminder_error'] = "Error creating reminder. Probably a server error. Try again later.";
      header('Location: /reminders/create');
    }
  }

  public function deleteReminder($reminderId) {
    $db = db_connect();
    $query = "UPDATE reminders SET deleted = 1, deletedAt = :deletedAt WHERE id = :id;";
    $statement = $db->prepare($query);
    $statement->bindParam(':id', $reminderId);
    $statement->bindParam(':deletedAt', date('Y-m-d H:i:s'));

    if ($statement->execute()) {
      header('Location: /reminders');
      unset($_SESSION['reminder_error']);
      die;
    } else {
      $_SESSION['reminder_error'] = "Error deleting reminder. Probably a server error. Try again later.";
      header('Location: /reminders');
      die;
    }
  }

  public function getReminderById($id) {
    $db = db_connect();
    $query = "SELECT * FROM reminders WHERE id = :id;";
    $statement = $db->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $reminder = $statement->fetch(PDO::FETCH_ASSOC);
    return $reminder;
  }
}
?>