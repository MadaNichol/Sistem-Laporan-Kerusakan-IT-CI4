<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Pengaduan</h1>

        <form action="/auth/updatepengaduan_karyawan/<?= $pengaduankaryawan['id_pengaduan'] ?>" method="post" class="space-y-4">
            <div>
                <label for="id_pengaduan" class="block text-sm font-medium text-gray-700">ID Pengaduan</label>
                <input type="text" id="id_pengaduan" name="id_pengaduan" value="<?= $pengaduankaryawan['id_pengaduan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="<?= $pengaduankaryawan['nama_kategori'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Karyawan</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" value="<?= $pengaduankaryawan['nama_karyawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="tgl_pengaduan" class="block text-sm font-medium text-gray-700">Tgl Pengaduan</label>
                <input type="text" id="tgl_pengaduan" name="tgl_pengaduan" value="<?= $pengaduankaryawan['tgl_pengaduan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="keterangan_pengaduan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <input type="text" id="keterangan_pengaduan" name="keterangan_pengaduan" value="<?= $pengaduankaryawan['keterangan_pengaduan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelolapengaduan_karyawan"
                   class="text-sm text-blue-600 hover:underline">← Kembali</a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
