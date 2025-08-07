<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Tambah Tiket</h1>
        <form action="/simpantiket_it" method="post" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
               <label for="nama_staff_it" class="block text-sm font-medium text-gray-700">Staff IT</label>
               <select id="nama_staff_it" name="nama_staff_it" class="border p-2 w-full" onchange="isiNamaStaff()">
               <option value="">Pilih Nama Staff IT</option>
               <?php foreach ($staff_it as $staff_it): ?>
               <option value="<?= $staff_it['nama_staff_it'] ?>" data-id="<?= $staff_it['id_staff_it'] ?>"><?= $staff_it['nama_staff_it'] ?></option>
               <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
                <label for="id_staff_it" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_staff_it" id="id_staff_it" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
               <label for="id_pengaduan" class="block text-sm font-medium text-gray-700">ID Pengaduan</label>
               <select id="id_pengaduan" name="id_pengaduan" class="border p-2 w-full" onchange="isiNamaIdPengaduan()">
               <option value="">Pilih ID Pengaduan</option>
               <?php foreach ($pengaduan as $pengaduan): ?>
               <option value="<?= $pengaduan['id_pengaduan'] ?>" data-id="<?= $pengaduan['id_pengaduan'] ?>"><?= $pengaduan['id_pengaduan'] ?></option>
               <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
    <label for="status_tiket" class="block text-sm font-medium text-gray-700">Status Tiket</label>
    <select name="status_tiket" id="status_tiket" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        <option value="">Pilih Status</option>
        <option value="Proses">Proses</option>
        <option value="Done">Done</option>
    </select>
</div>


            <div class="mb-4">
               <label for="nama_vendor" class="block text-sm font-medium text-gray-700">Vendor</label>
               <select id="nama_vendor" name="nama_vendor" class="border p-2 w-full" onchange="isiNamaVendor()">
               <option value="">Pilih Nama Vendor</option>
               <?php foreach ($vendor as $vendor): ?>
               <option value="<?= $vendor['nama_vendor'] ?>" data-id="<?= $vendor['id_vendor'] ?>"><?= $vendor['nama_vendor'] ?></option>
               <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
                <label for="id_vendor" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_vendor" id="id_vendor" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="keterangan_tindakan" class="block text-sm font-medium text-gray-700">Tindakan</label>
                <input type="text" name="keterangan_tindakan" id="keterangan_tindakan" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="tgl_tiket" class="block text-sm font-medium text-gray-700">Tanggal Tindakan</label>
                <input type="date" name="tgl_tiket" id="tgl_tiket" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>

        <script>
            function isiNamaStaff() {
                const select = document.getElementById('nama_staff_it');
                const idInput = document.getElementById('id_staff_it');
                const selectedOption = select.options[select.selectedIndex];
                const idStaff = selectedOption.getAttribute('data-id');
                idInput.value = idStaff || '';
            }
        
            function isiNamaVendor() {
            const select = document.getElementById('nama_vendor');
            const idInput = document.getElementById('id_vendor');
            const selectedOption = select.options[select.selectedIndex];
            const idVendor = selectedOption.getAttribute('data-id');
            idInput.value = idVendor || '';
            }

            function isiNamaIdPengaduan() {
                const select = document.getElementById('id_pengaduan');
                const idInput = document.getElementById('id_pengaduan');
                const selectedOption = select.options[select.selectedIndex];
                const idPengaduan = selectedOption.getAttribute('data-id');
                idInput.value = idPengaduan || '';
            }

            function isiNamaStatus() {
                const select = document.getElementById('status_pengaduan');
                const idInput = document.getElementById('id_pengaduan');
                const selectedOption = select.options[select.selectedIndex];
                const idPengaduan = selectedOption.getAttribute('data-id');
                idInput.value = idPengaduan || '';
            }
        </script>
    </div>
</body>
</html>
