<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>VeZeeTa</title>
</head>
<body>
<table class="table">
    <caption>Departments</caption>
  <thead>
    <tr>
      <th scope="col"> </th>
      <th scope="col">#</th>
      <th scope="col">Department Name</th>
      <th scope="col">No. of Doctors</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th><input type="checkbox" id="dent" name="dent"></th>
      <th scope="row">1</th>
      <td for="dent">Dentists</td>
      <td for="dent">50</td>
      <td for="dent">Active</td>
    </tr>
    <tr>
      <th><input type="checkbox" id="card" name="card"></th>
      <th scope="row">2</th>
      <td for="card">Cardiology</td>
      <td for="card">10</td>
      <td for="card">Inactive</td>
    </tr>
    <tr>
      <th><input type="checkbox" id="endo" name="endo"></th>
      <th scope="row">3</th>
      <td for="endo">Endoscopy</td>
      <td for="endo">20</td>
      <td for="endo">Active</td>
    </tr>
  </tbody>
</table>
</body>
</html>