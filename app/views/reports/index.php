<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-5">
  <h1 class="mb-4">Reports Overview</h1>

  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Registered Users</h5>
          <?php if (!empty($data["total_users"])): ?>
            <p class="card-text display-6"><?php echo $data["total_users"]; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Reminders</h5>
          <p class="card-text display-6">123</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Logs</h5>
          <p class="card-text display-6">678</p>
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