<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Karyawan Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<div class="bg-gray-200 py-4 pb-6">
  <div class="container mx-auto flex justify-between items-center px-4 relative">
    <div class="flex items-center space-x-4">
      <a href="/beranda_admin" class="font-bold block py-2 px-4 rounded hover:bg-gray-200">BERANDA</a>
      <!-- Dropdown Master -->
      <div class="relative">
        <button onclick="toggleDropdown()" class="font-bold block py-2 px-4 rounded hover:bg-gray-200">
          MASTER ▼
        </button>
        <div id="masterMenu" class="hidden absolute left-0 mt-2 w-44 bg-white rounded shadow border z-10">
          <a href="/kelolauser_admin" class="block py-2 px-4 rounded hover:bg-gray-200">User</a>
          <a href="/kelolarole_admin" class="block py-2 px-4 rounded hover:bg-gray-200">Role</a>
          <a href="/kelolakategori_admin" class="block py-2 px-4 rounded hover:bg-gray-200">Kategori</a>
          <a href="/keloladepartemen_admin" class="block py-2 px-4 rounded hover:bg-gray-200">Departemen</a>
          <a href="/kelolakaryawan_admin" class="block py-2 px-4 rounded hover:bg-gray-200">Karyawan</a>
          <a href="/kelolastaff_it_admin" class="block py-2 px-4 rounded hover:bg-gray-200">Staff IT</a>
          <a href="/kelolavendor_admin" class="block py-2 px-4 rounded hover:bg-gray-200">Vendor</a>
        </div>
      </div>
    </div>

    <!-- Admin Icon -->
    <div class="flex items-center space-x-2">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="admin icon" class="w-6 h-6">
      <span class="font-medium">Admin</span>
      <a href="/login" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Logout</a>
    </div>
  </div>
</div>

<!-- Konten -->
<div class="container mx-auto px-4 py-4"> 
  <h1 class="text-4xl font-bold text-gray-800 mb-1">Karyawan</h1>
  <p class="text-xl mb-4">Welcome, Admin</p>

  <div class="flex justify-between items-center mb-4">
    <!-- Tombol Tambah Karyawan -->
    <a href="/auth/tambahkaryawan_admin" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
      Tambah Karyawan
    </a>

    <!-- Kolom Pencarian -->
    <input type="text" id="searchInput" placeholder="Cari nama karyawan"
      class="px-4 py-2 border border-gray-300 rounded-md shadow-sm w-64">
  </div>

  <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
    <table class="w-full table-auto">
      <thead class="bg-gray-100 border-b">
        <tr>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">ID Karyawan</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Nama Karyawan</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">No Telepon</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Departemen</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($karyawan as $karyawann): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $karyawann['id_karyawan'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $karyawann['nama_karyawan'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $karyawann['no_telp'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $karyawann['id_departemen'] ?></td>
            <td class="px-4 py-2 text-center text-sm space-x-2">
              <!-- Edit -->
               <a href="/editkaryawan_admin/<?= $karyawann['id_karyawan'] ?>"
                class="text-yellow-500 hover:text-yellow-600" title="Edit">
                <i class="fas fa-edit text-lg"></i>
              </a>

              <!-- Delete -->
              <a href="/deletekaryawan/<?= $karyawann['id_karyawan'] ?>"
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

<!-- Script Dropdown -->
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
