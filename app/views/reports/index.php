<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-5">
  <h1 class="mb-4">Admin Reports Overview</h1>

  <div class="row mb-4">
    <div class="col-md-6">
          <div class="card mb-3 border-success" style="padding-bottom: 15px;">
            <div class="card-header bg-success text-white">
              <h5 class="mb-0">Total Reminders</h5>
            </div>
            <div class="card-body">
              <?php if (!empty($data['total_reminders']["all_reminders"])): ?>
      <p class="display-6"><?php echo $data['total_reminders']["all_reminders"]; ?></p>
    <?php else: ?>
      <p class="display-6">Unknown</p>
    <?php endif; ?>
              <div class="row text-center">
                <div class="col-md-6">
                  <div class="p-3 border rounded bg-light">
                    <h6 class="text-success">Completed</h6>
                    <?php if (!empty($data['total_reminders']['completed_reminders'])): ?>
      <p class="fw-bold mb-0"><?php echo $data['total_reminders']['completed_reminders']; ?></p>
    <?php else: ?>
      <p class="fw-bold mb-0">0</p>
    <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded bg-light">
                    <h6 class="text-danger">Incomplete</h6>
                    <?php if (!empty($data['total_reminders']['incomplete_reminders'])): ?>
      <p class="fw-bold mb-0"><?php echo $data['total_reminders']['incomplete_reminders']; ?></p>
    <?php else: ?>
      <p class="fw-bold mb-0">0</p>
    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div class="col-md-6">
      <div class="card text-white bg-primary mb-2">
        <div class="card-body">
          <h5 class="card-title">Total Registered Users</h5>
          <?php if (!empty($data['total_users'])): ?>
            <p class="card-text display-6"><?php echo htmlspecialchars($data['total_users']); ?></p>
          <?php else: ?>
            <p class="card-text display-6">Unknown</p>
          <?php endif; ?>
        </div>
      </div>
      <div class="card text-white bg-dark">
        <div class="card-body">
          <h5 class="card-title">Total Logs</h5>
          <?php if (!empty($data['total_logs'])): ?>
            <p class="card-text display-6"><?php echo htmlspecialchars($data['total_logs']); ?></p>
          <?php else: ?>
            <p class="card-text display-6">Unknown</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-5">
    <div class="col-md-12">
      <div class="card border-info">
        <div class="card-body">
          <h5 class="card-title">Login Summary</h5>
          <p class="card-text">
            <strong>Most Failed Logins:</strong> jane.doe@example.com (15 failed attempts)<br>
            <strong>Most Successful Logins:</strong> admin@example.com (87 successful logins)
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <a href="/users" class="btn btn-outline-primary w-100">Go to Users Table</a>
    </div>
    <div class="col-md-4">
      <a href="/reminders" class="btn btn-outline-success w-100">View All Reminders</a>
    </div>
    <div class="col-md-4">
      <a href="/logs" class="btn btn-outline-secondary w-100">View All Logs</a>
    </div>
  </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>