<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Pengaduan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Tambah Pengaduan</h1>

    <form action="/simpanpengaduan_karyawan" method="post" class="space-y-4">
      <div>
        <label for="id_pengaduan" class="block text-sm font-medium text-gray-700">ID Pengaduan</label>
        <input type="text" name="id_pengaduan" id="id_pengaduan" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select id="nama_kategori" name="nama_kategori"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                onchange="isiNamaKategori()">
          <option value="">Pilih Nama Kategori</option>
          <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['nama_kategori'] ?>" data-id="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" name="id_kategori" id="id_kategori">
      </div>

      <div>
        <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Karyawan</label>
        <select id="nama_karyawan" name="nama_karyawan"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                onchange="isiNamaKaryawan()">
          <option value="">Pilih Nama Karyawan</option>
          <?php foreach ($karyawan as $k): ?>
            <option value="<?= $k['nama_karyawan'] ?>" data-id="<?= $k['id_karyawan'] ?>"><?= $k['nama_karyawan'] ?></option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" name="id_karyawan" id="id_karyawan">
      </div>

      <div>
        <label for="tgl_pengaduan" class="block text-sm font-medium text-gray-700">Tanggal Pengaduan</label>
        <input type="date" name="tgl_pengaduan" id="tgl_pengaduan"
               value="<?= date('Y-m-d') ?>" readonly
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-600">
      </div>

      <div>
        <label for="keterangan_pengaduan" class="block text-sm font-medium text-gray-700">Keterangan</label>
        <input type="text" name="keterangan_pengaduan" id="keterangan_pengaduan" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
      </div>


      <div class="flex justify-between items-center">
        <a href="/kelolapengaduan_admin" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
          Simpan
        </button>
      </div>
    </form>
  </div>

  <script>
    function isiNamaKategori() {
      const select = document.getElementById('nama_kategori');
      const idInput = document.getElementById('id_kategori');
      const selectedOption = select.options[select.selectedIndex];
      idInput.value = selectedOption.getAttribute('data-id') || '';
    }

    function isiNamaKaryawan() {
      const select = document.getElementById('nama_karyawan');
      const idInput = document.getElementById('id_karyawan');
      const selectedOption = select.options[select.selectedIndex];
      idInput.value = selectedOption.getAttribute('data-id') || '';
    }
  </script>
</body>
</html>
