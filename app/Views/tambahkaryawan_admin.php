<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Tambah Karyawan</h1>

    <form action="/simpankaryawan" method="post" class="space-y-4">

      <div>
        <label for="id_karyawan" class="block text-sm font-medium text-gray-700">ID Karyawan</label>
        <input type="text" name="id_karyawan" id="id_karyawan" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
        <input type="text" name="nama_karyawan" id="nama_karyawan" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="id_departemen" class="block text-sm font-medium text-gray-700">Departemen</label>
        <select name="id_departemen" id="id_departemen" required
                onchange="isiDepartemen()"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
          <option value="">Pilih Departemen</option>
          <?php foreach ($departemen as $d): ?>
            <option value="<?= $d['id_departemen'] ?>" data-nama="<?= $d['departemen'] ?>">
              <?= $d['departemen'] ?>
            </option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" name="departemen" id="departemen">
      </div>

      <div class="flex justify-between items-center">
        <a href="/kelolakaryawan_admin" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
          Simpan
        </button>
      </div>
    </form>
  </div>

  <script>
    function isiDepartemen() {
      const select = document.getElementById('id_departemen');
      const input = document.getElementById('departemen');
      const selected = select.options[select.selectedIndex];
      input.value = selected.getAttribute('data-nama') || '';
    }
  </script>
</body>
</html>
