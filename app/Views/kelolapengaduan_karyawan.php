<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaduan Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<!-- Navbar -->
<div class="bg-gray-200 py-4 pb-6">
  <div class="container mx-auto flex justify-between items-center px-4 relative">
    <div class="flex items-center space-x-4">
      <a href="/kelolapengaduan_karyawan" class="text-2xl font-bold block py-1 px-2 rounded hover:bg-gray-200">Pengaduan</a>
      <a href="/about_karyawan" class="text-2xl font-bold block py-1 px-2 rounded hover:bg-gray-200">About</a>
    </div>

    <!-- Karyawan Icon -->
    <div class="flex items-center space-x-2">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="admin icon" class="w-6 h-6">
      <span class="font-medium">Karyawan</span>
      <a href="/login" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Logout</a>
    </div>
  </div>
</div>

<!-- Content -->
<div class="container mx-auto px-4 py-4"> 
  <h1 class="text-4xl font-bold text-gray-800 mb-1">Pengaduan</h1>
  <p class="text-xl mb-4">Welcome, Karyawan</p>

    <div class="flex justify-between items-center mb-4">
    <!-- Tombol Tambah Pengaduan -->
    <a href="/auth/tambahpengaduan_karyawan" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
      Tambah Pengaduan
    </a>
</div>
    
  <!-- Data Pengaduan -->
  <div class="bg-white rounded-md shadow p-4 mb-4">
    <h2 class="font-semibold text-lg mb-2">Data Pengaduan</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="border-b border-gray-300 text-left">
          <tr>
            <th class="py-1 px-2">ID Pengaduan</th>
            <th class="py-1 px-2">Kategori</th>
            <th class="py-1 px-2">Karyawan</th>
            <th class="py-1 px-2">Tgl Pengaduan</th>
            <th class="py-1 px-2">Keterangan</th>
            <th class="py-1 px-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($pengaduankaryawan as $pengaduankaryawan): ?>
                 <tr>
            <td class="py-1 px-2"><?= $pengaduankaryawan['id_pengaduan'] ?></td>
            <td class="py-1 px-2"><?= $pengaduankaryawan['nama_kategori'] ?></td>
            <td class="py-1 px-2"><?= $pengaduankaryawan['nama_karyawan'] ?></td>
            <td class="py-1 px-2"><?= $pengaduankaryawan['tgl_pengaduan'] ?></td>
            <td class="py-1 px-2"><?= $pengaduankaryawan['keterangan_pengaduan'] ?></td>
            <td class="px-1 py-2 text-sm space-x-2">
            <!-- Edit -->
               <a href="/editpengaduan_karyawan/<?= $pengaduankaryawan['id_pengaduan'] ?>"
                class="text-yellow-500 hover:text-yellow-600" title="Edit">
                <i class="fas fa-edit text-lg"></i>
              </a>
              <!-- Delete -->
              <a href="/deletepengaduan_karyawan/<?= $pengaduankaryawan['id_pengaduan'] ?>"
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
