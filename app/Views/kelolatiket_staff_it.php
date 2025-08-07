<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tiket IT</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<!-- Navbar -->
<div class="bg-gray-200 py-4 pb-6">
  <div class="container mx-auto flex justify-between items-center px-4 relative">
    <div class="flex items-center space-x-4">
      <a href="/kelolatiket_staff_it" class="text-2xl font-bold block py-1 px-2 rounded hover:bg-gray-200">Tiket</a>
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

<!-- Content -->
<div class="container mx-auto px-4 py-4"> 
  <h1 class="text-4xl font-bold text-gray-800 mb-1">Tiket</h1>
  <p class="text-xl mb-4">Welcome, Staff IT</p>

    <div class="flex justify-between items-center mb-4">
    <!-- Tombol Tambah Tiket -->
    <a href="/auth/tambahtiket_staff_it" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
      Tambah Tiket
    </a>
</div>

  <!-- Data Pengaduan -->
  <div class="bg-white rounded-md shadow p-4 mb-4">
    <h2 class="font-semibold text-lg mb-2">Data Pengaduan</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="border-b border-gray-300 text-left">
          <tr>
            <th class="py-1 px-2 text-center">ID Pengaduan</th>
            <th class="py-1 px-2 text-center">Kategori</th>
            <th class="py-1 px-2 text-center">Karyawan</th>
            <th class="py-1 px-2 text-center">Tgl Pengaduan</th>
            <th class="py-1 px-2 text-center">Keterangan</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($pengaduankaryawan as $pengaduankaryawan) : ?>
                <tr class="hover:bg-gray-50">
                  <td class="border-b p-2 text-center"><?= esc($pengaduankaryawan['id_pengaduan']) ?></td>
                  <td class="border-b p-2 text-center"><?= esc($pengaduankaryawan['nama_kategori']) ?></td>
                  <td class="border-b p-2 text-center"><?= esc($pengaduankaryawan['nama_karyawan']) ?></td>
                  <td class="border-b p-2 text-center"><?= esc($pengaduankaryawan['tgl_pengaduan']) ?></td>
                  <td class="border-b p-2 text-center"><?= esc($pengaduankaryawan['keterangan_pengaduan']) ?></td>
                </tr>
              <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

    
  <!-- Data Pengaduan -->
  <div class="bg-white rounded-md shadow p-4 mb-4">
    <h2 class="font-semibold text-lg mb-2">Data Tiket</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="border-b border-gray-300 text-left">
          <tr>
            <th class="py-1 px-2  text-center">ID Tiket</th>
            <th class="py-1 px-2  text-center">Staff IT</th>
            <th class="py-1 px-2  text-center">ID Pengaduan</th>
            <th class="py-1 px-2  text-center">Vendor</th>
            <th class="py-1 px-2  text-center">Status</th>
            <th class="py-1 px-2  text-center">Tindakan</th>
            <th class="py-1 px-2  text-center">Tgl Tindakan</th>
            <th class="py-1 px-2  text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($tiket as $tiket): ?>
            <td class="py-1 px-2 text-center"><?= $tiket['id_tiket'] ?></td>
            <td class="py-1 px-2 text-center"><?= $tiket['nama_staff_it'] ?></td>
            <td class="py-1 px-2 text-center"><?= $tiket['id_pengaduan'] ?></td>
            <td class="py-1 px-2 text-center"><?= $tiket['nama_vendor'] ?></td>
            <td class="py-1 px-2 text-center"><?= $tiket['status_tiket'] ?></td>
            <td class="py-1 px-2 text-center"><?= $tiket['keterangan_tindakan'] ?></td>
            <td class="py-1 px-2 text-center"><?= $tiket['tgl_tiket'] ?></td>
           <td class="px-4 py-2 text-center text-sm space-x-2">
            <!-- Edit -->
               <a href="/edittiket_staff_it/<?= $tiket['id_tiket'] ?>"
                class="text-yellow-500 hover:text-yellow-600" title="Edit">
                <i class="fas fa-edit text-lg"></i>
              </a>
              <!-- Delete -->
              <a href="/deletetiket_it/<?= $tiket['id_tiket'] ?>"
                onclick="return confirm('Yakin hapus data ini?')"
                class="text-red-600 hover:text-red-700" title="Delete">
                <i class="fas fa-trash-alt text-lg"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>

<!-- Script -->
 <script>
 function toggleDropdown() {
    const menu = document.getElementById('masterMenu');
    menu.classList.toggle('hidden');
  }

  // Tutup dropdown saat klik di luar area
  window.addEventListener('click', function (e) {
    const dropdown = document.getElementById('masterMenu');
    const button = document.querySelector('button[onclick="toggleDropdown()"]');
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add('hidden');
    }
  });
</script>

</body>
</html>
