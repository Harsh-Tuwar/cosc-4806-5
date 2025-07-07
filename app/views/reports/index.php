<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-5">
  <div class="page-header mb-4">
    <h1>Admin Reports</h1>
  </div>

  <!-- View All Reminders -->
  <div class="card mb-4">
    <div class="card-header">
      <h5>All Reminders</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Reminder 1: Meeting at 10 AM</li>
      <li class="list-group-item">Reminder 2: Submit report by EOD</li>
      <li class="list-group-item">Reminder 3: Team lunch on Friday</li>
    </ul>
  </div>

  <!-- Most Reminders by User -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">User With the Most Reminders</h5>
      <p class="card-text"><strong>JohnDoe</strong> with <strong>12 reminders</strong></p>
    </div>
  </div>

  <!-- Total Logins Table -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">Total Logins by Username</h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Total Logins</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>JohnDoe</td><td>34</td></tr>
          <tr><td>JaneSmith</td><td>28</td></tr>
          <tr><td>Admin</td><td>45</td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bonus Chart -->
  <div class="card mb-5">
    <div class="card-body">
      <h5 class="card-title">Login Frequency Chart</h5>
      <canvas id="loginChart" height="100"></canvas>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('loginChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['JohnDoe', 'JaneSmith', 'Admin'],
      datasets: [{
        label: 'Total Logins',
        data: [34, 28, 45],
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 5
          }
        }
      }
    }
  });
</script>

<?php require_once 'app/views/templates/footer.php' ?>
