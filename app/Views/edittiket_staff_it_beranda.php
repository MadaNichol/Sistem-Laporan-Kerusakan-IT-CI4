<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center mb-6">Edit Tiket</h1>

    <form action="/auth/updatetiket_it_beranda/<?= $tiket['id_tiket'] ?>" method="post" class="space-y-4">
      <!-- Hidden ID Tiket -->
      <input type="hidden" name="id_tiket" value="<?= $tiket['id_tiket'] ?>">

      <!-- Staff IT -->
      <div>
        <label for="id_staff_it" class="block text-sm font-medium">Staff IT</label>
        <select name="id_staff_it" id="id_staff_it" required class="w-full p-2 border rounded">
          <option value="">Pilih Staff IT</option>
          <?php foreach ($staff_it as $s): ?>
            <option value="<?= $s['id_staff_it'] ?>" <?= $tiket['id_staff_it'] == $s['id_staff_it'] ? 'selected' : '' ?>>
              <?= $s['nama_staff_it'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- ID Pengaduan -->
      <div>
        <label for="id_pengaduan" class="block text-sm font-medium">ID Pengaduan</label>
        <input type="text" name="id_pengaduan" id="id_pengaduan" value="<?= $tiket['id_pengaduan'] ?>" required class="w-full p-2 border rounded">
      </div>

      <!-- Vendor -->
      <div>
        <label for="id_vendor" class="block text-sm font-medium">Vendor</label>
        <select name="id_vendor" id="id_vendor" required class="w-full p-2 border rounded">
          <option value="">Pilih Vendor</option>
          <?php foreach ($vendor as $v): ?>
            <option value="<?= $v['id_vendor'] ?>" <?= $tiket['id_vendor'] == $v['id_vendor'] ? 'selected' : '' ?>>
              <?= $v['nama_vendor'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Status Tiket -->
      <div>
        <label for="status_tiket" class="block text-sm font-medium">Status Tiket</label>
        <select name="status_tiket" id="status_tiket" required class="w-full p-2 border rounded">
          <option value="Proses" <?= $tiket['status_tiket'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
          <option value="Done" <?= $tiket['status_tiket'] == 'Done' ? 'selected' : '' ?>>Done</option>
        </select>
      </div>

      <!-- Keterangan Tindakan -->
      <div>
        <label for="keterangan_tindakan" class="block text-sm font-medium">Tindakan</label>
        <input type="text" name="keterangan_tindakan" id="keterangan_tindakan" value="<?= $tiket['keterangan_tindakan'] ?>" required class="w-full p-2 border rounded">
      </div>

      <!-- Tanggal Tiket -->
      <div>
        <label for="tgl_tiket" class="block text-sm font-medium">Tanggal Tiket</label>
        <input type="date" name="tgl_tiket" id="tgl_tiket" value="<?= $tiket['tgl_tiket'] ?>" required class="w-full p-2 border rounded">
      </div>

      <!-- Aksi -->
      <div class="flex justify-between items-center">
        <a href="/beranda_admin" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
