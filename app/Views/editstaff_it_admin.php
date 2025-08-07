<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff IT</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Staff IT</h1>

        <form action="/auth/updatestaffit/<?= $staffit['id_staff_it'] ?>" method="post" class="space-y-4">
            <div>
                <label for="id_staff_it" class="block text-sm font-medium text-gray-700">ID Staff</label>
                <input type="text" id="id_staff_it" name="id_staff_it" value="<?= $staffit['id_staff_it'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_staff_it" class="block text-sm font-medium text-gray-700">Nama Staff</label>
                <input type="text" id="nama_staff_it" name="nama_staff_it" value="<?= $staffit['nama_staff_it'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="no_telp" class="block text-sm font-medium text-gray-700">No telepon</label>
                <input type="text" id="no_telp" name="no_telp" value="<?= $staffit['no_telp'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelolastaffit_admin"
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
