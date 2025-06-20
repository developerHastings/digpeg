<!-- competitive_analysis.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Competitive Analysis</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>
  <div class="container mt-5">
    <h1>Competitive Analysis</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Users</th>
          <th>Transactions</th>
          <th>Volume</th>
        </tr>
      </thead>
      <tbody id="competitive-analysis">
        <!-- Dynamic data will be inserted here -->
      </tbody>
    </table>
  </div>
  <script>
    fetch('api/get_competitive_analysis.php')
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('competitive-analysis');
        data.forEach(comp => {
          const tr = document.createElement('tr');
          tr.innerHTML = `<td>${comp.name}</td><td>${comp.users}</td><td>${comp.transactions}</td><td>${comp.volume}</td>`;
          tbody.appendChild(tr);
        });
      })
      .catch(error => console.error('Error fetching competitive analysis:', error));
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
