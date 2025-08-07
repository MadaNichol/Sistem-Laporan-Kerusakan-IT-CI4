<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Karyawan</h1>

        <form action="/auth/updatekaryawan/<?= $karyawan['id_karyawan'] ?>" method="post" class="space-y-4">
            <div>
                <label for="id_karyawan" class="block text-sm font-medium text-gray-700">ID Karyawan</label>
                <input type="text" id="id_karyawan" name="id_karyawan" value="<?= $karyawan['id_karyawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" value="<?= $karyawan['nama_karyawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <input type="text" id="no_telp" name="no_telp" value="<?= $karyawan['no_telp'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
            <label for="id_departemen" class="block text-sm font-medium text-gray-700">Departemen</label>
            <select name="id_departemen" id="id_departemen" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required onchange="isiKontrak()">
                <option value="">Pilih Departemen</option>
                <?php foreach ($departemen as $departemen): ?>
                <option value="<?= $departemen['id_departemen'] ?>" data-id="<?= $departemen['id_departemen'] ?>">
                <?= $departemen['departemen'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelolakaryawan_admin"
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
