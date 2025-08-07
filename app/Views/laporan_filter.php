<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Bulanan IT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
<div class="bg-gray-200 py-4 pb-6">
  <div class="container mx-auto flex justify-between items-center px-4 relative">
    <div class="flex items-center space-x-4">
      <a href="/kelolatiket_staff_it" class="text-2xl font-bold block py-2 px-4 rounded hover:bg-gray-200">Tiket</a>
      <a href="/about_staffit" class="text-2xl font-bold block py-1 px-2 rounded hover:bg-gray-200">About</a>
      <a href="/laporan_filter" class="text-2xl font-bold block py-1 px-2 rounded hover:bg-gray-200">Laporan</a>
    </div>

    <!-- IT Icon -->
    <div class="flex items-center space-x-2">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="admin icon" class="w-6 h-6">
      <span class="font-medium">Staff IT</span>
      <a href="/login" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Logout</a>
    </div>
  </div>
</div>
  <div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Laporan Bulanan IT</h1>
    <!-- Form Filter -->
    <form method="get" action="/cetak_tiket_pengaduan_it" class="bg-white p-6 rounded shadow mb-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
        <div>
          <label class="block font-medium mb-1">Bulan</label>
          <select name="bulan" class="w-full border px-3 py-2 rounded">
            <?php for ($b = 1; $b <= 12; $b++): ?>
              <option value="<?= sprintf('%02d', $b) ?>" <?= ($bulan == sprintf('%02d', $b)) ? 'selected' : '' ?>>
                <?= date('F', mktime(0, 0, 0, $b, 10)) ?>
              </option>
            <?php endfor; ?>
          </select>
        </div>
        <div>
  <label class="block font-medium mb-1">Tahun</label>
  <select name="tahun" class="w-full border px-3 py-2 rounded">
    <?php
      $tahunSekarang = date('Y');
      for ($th = 2020; $th <= $tahunSekarang; $th++): ?>
        <option value="<?= $th ?>" <?= ($tahun == $th) ? 'selected' : '' ?>>
          <?= $th ?>
        </option>
    <?php endfor; ?>
  </select>
</div>

        <div>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
            Tampilkan Laporan
          </button>
        </div>
      </div>
    </form>

    <?php if (!empty($bulan) && !empty($tahun)): ?>
      <!-- Tombol Cetak PDF -->
      <div class="mb-4">
        <a href="/cetak_tiket_pengaduan_it?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" target="_blank"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
          Cetak PDF
        </a>
      </div>

      <!-- Tabel Tiket -->
      <div class="bg-white rounded shadow p-4 mb-6">
        <h3 class="text-lg font-semibold mb-3">Data Tiket IT</h3>
        <?php if (count($tiket) > 0): ?>
          <table class="min-w-full border text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Kode Tiket</th>
                <th class="p-2 border">Staff IT</th>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tiket as $t): ?>
                <tr>
                  <td class="p-2 border"><?= $t['id_tiket'] ?></td>
                  <td class="p-2 border"><?= $t['kode_tiket'] ?></td>
                  <td class="p-2 border"><?= $t['nama_staff_it'] ?></td>
                  <td class="p-2 border"><?= $t['tgl_tiket'] ?></td>
                  <td class="p-2 border"><?= $t['status_tiket'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p class="text-sm text-gray-600">Tidak ada data tiket bulan ini.</p>
        <?php endif; ?>
      </div>

      <!-- Tabel Pengaduan -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="text-lg font-semibold mb-3">Data Pengaduan Karyawan</h3>
        <?php if (count($pengaduan) > 0): ?>
          <table class="min-w-full border text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Kategori</th>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengaduan as $p): ?>
                <tr>
                  <td class="p-2 border"><?= $p['id_pengaduan'] ?></td>
                  <td class="p-2 border"><?= $p['nama_karyawan'] ?></td>
                  <td class="p-2 border"><?= $p['nama_kategori'] ?></td>
                  <td class="p-2 border"><?= $p['tgl_pengaduan'] ?></td>
                  <td class="p-2 border"><?= $p['keterangan_pengaduan'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p class="text-sm text-gray-600">Tidak ada data pengaduan bulan ini.</p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
