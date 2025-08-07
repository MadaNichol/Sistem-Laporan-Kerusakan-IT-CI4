<!-- views/laporan_pdf.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Bulanan IT</title>
  <style>
    body {
      font-family: sans-serif;
      padding: 20px;
      font-size: 12px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 10px;
    }
    th, td {
      border: 1px solid black;
      padding: 6px;
      text-align: left;
    }
    th {
      background-color: #e2e8f0;
      font-weight: bold;
    }
    h1 {
      font-size: 22px;
      margin-bottom: 4px;
    }
    h2 {
      font-size: 16px;
      margin-bottom: 8px;
    }
    h3 {
      font-size: 14px;
      margin-top: 20px;
      margin-bottom: 6px;
    }
  </style>
</head>
<body>
  <h1>Laporan Bulanan IT</h1>
  <h2>Hasil Laporan: <?= date("F", mktime(0, 0, 0, $bulan, 10)) ?> <?= $tahun ?></h2>

  <h3>Data Tiket & Pengaduan</h3>
  <table>
    <thead>
      <tr>
        <th>ID Tiket</th>
        <th>ID Pengaduan</th>
        <th>Nama Karyawan</th>
        <th>Nama Kategori</th>
        <th>Kategori Pengaduan</th>
        <th>Kode Tiket</th>
        <th>Staff IT</th>
        <th>Nama Vendor</th>
        <th>Tgl Pengaduan</th>
        <th>Tgl Tiket</th>
        <th>Status Tiket</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $max = max(count($tiket), count($pengaduan));
        for ($i = 0; $i < $max; $i++):
          $t = $tiket[$i] ?? null;
          $p = $pengaduan[$i] ?? null;
      ?>
        <tr>
          <td><?= $t['id_tiket'] ?? '-' ?></td>
          <td><?= $p['id_pengaduan'] ?? '-' ?></td>
          <td><?= $p['nama_karyawan'] ?? '-' ?></td>
          <td><?= $p['nama_kategori'] ?? '-' ?></td>
          <td><?= $p['keterangan_pengaduan'] ?? '-' ?></td>
          <td><?= $t['kode_tiket'] ?? '-' ?></td>
          <td><?= $t['nama_staff_it'] ?? '-' ?></td>
          <td><?= $t['nama_vendor'] ?? '-' ?></td>
          <td><?= $p['tgl_pengaduan'] ?? '-' ?></td>
          <td><?= $t['tgl_tiket'] ?? '-' ?></td>
          <td><?= $t['status_tiket'] ?? '-' ?></td>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>
</body>
</html>
