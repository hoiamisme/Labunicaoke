<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab Inventaris</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
    }
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: white;
      height: 100vh;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 15px;
      text-decoration: none;
    }
    .sidebar a:hover, .sidebar .active {
      background-color: #495057;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="p-3">
    <h4>LABUNICA</h4>
    <p>Tedi Kurniadi</p>
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <a href="#">Dashboard</a>
  <a href="#" class="active">Daftar Nama</a>
  <a href="#">&nbsp;&nbsp;&nbsp;Alat</a>
  <a href="#">&nbsp;&nbsp;&nbsp;Bahan</a>
  <a href="#">&nbsp;&nbsp;&nbsp;Instrumen</a>
  <a href="#">Input Pemakaian</a>
  <a href="#">Pemberitahuan</a>
  <a href="#">Logbook</a>
  <a href="#">Kelola User</a>
</div>

<div class="content">
  <h3>Daftar Nama Bahan</h3>
  <div class="row mb-3">
    <div class="col-md-4">
      <input type="text" class="form-control" placeholder="Nama Senyawa">
    </div>
    <div class="col-md-3">
      <select class="form-select">
        <option selected>Tersedia</option>
        <option>Tidak Tersedia</option>
      </select>
    </div>
    <div class="col-md-3">
      <select class="form-select">
        <option selected>Lemari A</option>
        <option>Lemari B</option>
      </select>
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
    </div>
  </div>

  <div class="d-flex justify-content-end mb-2">
    <button class="btn btn-success" onclick="addRow()"><i class="fas fa-plus"></i> Tambah Data</button>
  </div>

  <table class="table table-bordered" id="dataTable">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Volume</th>
        <th>Satuan</th>
        <th>Rumus Senyawa</th>
        <th>Simbol</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>125</td><td>Gelatin</td><td>5</td><td>g</td><td>-</td><td>-</td>
        <td><button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button></td>
      </tr>
    </tbody>
  </table>

  <nav>
    <ul class="pagination">
      <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</div>

<script>
  function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
  }

  function addRow() {
    const table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();
    newRow.innerHTML = `
      <td>New</td>
      <td><input class="form-control" placeholder="Nama"></td>
      <td><input class="form-control" type="number" value="0"></td>
      <td><input class="form-control" placeholder="g/ml"></td>
      <td><input class="form-control" placeholder="Rumus"></td>
      <td><input class="form-control" placeholder="Simbol"></td>
      <td><button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button></td>
    `;
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
