<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Vendor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Tambah Vendor</h1>

    <form action="/simpanvendor" method="post" class="space-y-4">
      <div>
        <label for="id_vendor" class="block text-sm font-medium text-gray-700">ID Vendor</label>
        <input type="text" name="id_vendor" id="id_vendor" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="nama_vendor" class="block text-sm font-medium text-gray-700">Nama Vendor</label>
        <input type="text" name="nama_vendor" id="nama_vendor" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="kontak_vendor" class="block text-sm font-medium text-gray-700">Kontak Vendor</label>
        <input type="text" name="kontak_vendor" id="kontak_vendor" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
        <input type="text" name="nama_perusahaan" id="nama_perusahaan" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="flex justify-between items-center">
        <a href="/kelolavendor_admin" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</body>
</html>
