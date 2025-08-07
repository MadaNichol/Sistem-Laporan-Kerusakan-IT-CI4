<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KaryawanModel;
use App\Models\KategoriModel;
use App\Models\PengaduanModel;
use App\Models\RoleModel;
use App\Models\StaffitModel;
use App\Models\TiketModel;
use App\Models\VendorModel;
use App\Models\DepartemenModel;


class Auth extends BaseController
{
    protected $userModel;
    protected $karyawanModel;
    protected $kategoriModel;
    protected $pengaduanModel;
    protected $roleModel;
    protected $staffitModel;
    protected $tiketModel;
    protected $vendorModel;
    protected $departemenModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->karyawanModel = new KaryawanModel();
        $this->kategoriModel = new KategoriModel();
        $this->pengaduanModel = new PengaduanModel();
        $this->roleModel = new RoleModel();
        $this->staffitModel = new StaffitModel();
        $this->tiketModel = new TiketModel();
        $this->vendorModel = new VendorModel();
        $this->departemenModel = new DepartemenModel();
        helper(['form', 'url']);
    }

public function login()
{
    return view('login');
}

public function prosesLogin()
{   
    $username = trim($this->request->getPost('username'));
    $password = $this->request->getPost('password');

    $user = $this->userModel->where('username', $username)->first();

    if ($user && $password === $user['password']) {
        session()->set([
            'id_user'   => $user['id_user'],
            'username'  => $user['username'],
            'id_role'   => $user['id_role'],
            'logged_in' => true
        ]);

        switch ($user['id_role']) {
            case 1:
                return redirect()->to('/beranda_admin');
            case 2:
                return redirect()->to('/kelolatiket_staff_it');
            case 3:
                return redirect()->to('/kelolapengaduan_karyawan');
            default:
                return redirect()->to('/login')->with('error', 'Role tidak valid.');
        }
    } else {
        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }
}

public function registerr()
{
    return view('register');
}

    public function register()
{
    $id_user = $this->request->getPost('id_user');
    $username = trim($this->request->getPost('username'));
    $password = $this->request->getPost('password');
    
    if (empty($username) || empty($password)) {
        return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi.');
    }

    $existingUser = $this->userModel->where('username', $username)->first();
    if ($existingUser) {
        return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
    }

    if (str_starts_with($username, 'IT_')) {
        $id_role = 2;
    } elseif (str_starts_with($username, 'Admin_')) {
        $id_role = 1;
    } else {
        $id_role = 3;
    }

    $this->userModel->save([
        'username' => $username,
        'password' => $password,
        'id_role'  => $id_role
    ]);

    return redirect()->to('/login')->with('success', 'Tambah berhasil.');
}

    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function beranda_admin()
    {
        $data['pengaduankaryawan'] = $this->pengaduanModel->findAll();
        $data['tiket_it'] = $this->tiketModel->findAll();
        return view('beranda_admin', $data);
    }

    public function edittiket_it_beranda($id_tiket)
    {
        $data['tiket'] = $this->tiketModel->find($id_tiket);
        $data['staff_it'] = $this->staffitModel->findAll();
        $data['vendor'] = $this->vendorModel->findAll();
        return view('edittiket_staff_it_beranda', $data);
    }
    
    public function updatetiket_it_beranda($id_tiket)
    {
        $staff = $this->staffitModel->find($this->request->getPost('id_staff_it'));
        $vendor = $this->vendorModel->find($this->request->getPost('id_vendor'));

        $data = [
            'id_tiket' => $this->request->getPost('id_tiket'),
            'id_staff_it' => $this->request->getPost('id_staff_it'),
            'nama_staff_it' => $staff['nama_staff_it'] ?? null, 
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
            'id_vendor' => $this->request->getPost('id_vendor'),
            'nama_vendor' => $vendor['nama_vendor'] ?? null,
            'status_tiket' => $this->request->getPost('status_tiket'),
            'keterangan_tindakan' => $this->request->getPost('keterangan_tindakan'),
            'tgl_tiket' => $this->request->getPost('tgl_tiket'),
        ];

        $this->tiketModel->update($id_tiket, $data);

        return redirect()->to('/beranda_admin');
    }

    public function deletetiket_it_beranda($id_tiket)
    {
        $this->tiketModel->delete($id_tiket);
        return redirect()->to('/beranda_admin');
    }

    public function editpengaduan_karyawan_beranda($id_pengaduan)
    {
        $data['pengaduankaryawan'] = $this->pengaduanModel->find($id_pengaduan);
        return view('editpengaduan_karyawan_beranda', $data);
    }


    public function updatepengaduan_karyawan_beranda($id_pengaduan)
    {
        $this->pengaduanModel->update($id_pengaduan, [
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'keterangan_pengaduan' => $this->request->getPost('keterangan_pengaduan'),
        ]);

        return redirect()->to('/beranda_admin');
    }

    public function deletepengaduan_karyawan_beranda($id_pengaduan)
    {
        $this->pengaduanModel->delete($id_pengaduan);
        return redirect()->to('/beranda_admin');
    }


    //Tambah Kategori
    public function kelolakategori()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('kelolakategori_admin', $data);
    }

    // Form tambah Kategori
    public function tambahkategori()
    {
        return view('tambahkategori_admin');
    }

    // Simpan data Kategori baru
    public function simpankategori()
    {
        $this->kategoriModel->insert([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        return redirect()->to('/kelolakategori_admin');
    }

    // Form edit Kategori
    public function editkategori($id_kategori)
    {
        $data['kategori'] = $this->kategoriModel->find($id_kategori);
        return view('editkategori_admin', $data);
    }

    // Update data Kategori
    public function updatekategori($id_kategori)
    {
        $this->kategoriModel->update($id_kategori, [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        return redirect()->to('/kelolakategori_admin');
    }

    // Delete Kategori
    public function deletekategori($id_kategori)
    {
        $this->kategoriModel->delete($id_kategori);
        return redirect()->to('/kelolakategori_admin');
    }

    //karyawan
    public function kelolakaryawan()
    {
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('kelolakaryawan_admin', $data);
    }

public function tambahkaryawan()
{
    $data['departemen'] = $this->departemenModel->findAll();
    return view('tambahkaryawan_admin', $data);
}


    public function simpankaryawan()
    {
        $this->karyawanModel->insert([
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'id_departemen' => $this->request->getPost('id_departemen'),
        ]);

        return redirect()->to('/kelolakaryawan_admin');
    }

   public function editkaryawan($id_karyawan)
{
    $data['karyawan'] = $this->karyawanModel->find($id_karyawan);
    $data['departemen'] = $this->departemenModel->findAll(); // kalau perlu select departemen
    return view('editkaryawan_admin', $data);
}


    public function updatekaryawan($id_karyawan)
    {
        $this->karyawanModel->update($id_karyawan, [
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'id_departemen' => $this->request->getPost('id_departemen'),
        ]);

        return redirect()->to('/kelolakaryawan_admin');
    }

    public function deletekaryawan($id_karyawan)
    {
        $this->karyawanModel->delete($id_karyawan);
        return redirect()->to('/kelolakaryawan_admin');
    }

    //role
    public function kelolarole()
    {
        $data['role'] = $this->roleModel->findAll();
        return view('kelolarole_admin', $data);
    }

    // Form tambah Role
    public function tambahrole()
    {
        return view('tambahrole_admin');
    }

    // Simpan data Role baru
    public function simpanrole()
    {
        $this->roleModel->insert([
            'id_role' => $this->request->getPost('id_role'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to('/kelolarole_admin');
    }

    // Form edit Role
    public function editrole($id_role)
    {
        $data['role'] = $this->roleModel->find($id_role);
        return view('editrole_admin', $data);
    }

    // Update data Role
    public function updaterole($id_role)
    {
        $this->roleModel->update($id_role, [
            'id_role' => $this->request->getPost('id_role'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to('/kelolarole_admin');
    }

    // Delete Role
    public function deleterole($id_role)
    {
        $this->roleModel->delete($id_role);
        return redirect()->to('/kelolarole_admin');
    }

        //User
    public function kelolauser()
    {
        $data['user'] = $this->userModel->findAll();
        return view('kelolauser_admin', $data);
    }

    // Form tambah User
    public function tambahuser()
    {
        return view('tambahuser_admin');
    }

    public function tambahuser_kelola()
{
    $id_user = $this->request->getPost('id_user');
    $username = trim($this->request->getPost('username'));
    $password = $this->request->getPost('password');
    
    if (empty($username) || empty($password)) {
        return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi.');
    }

    $existingUser = $this->userModel->where('username', $username)->first();
    if ($existingUser) {
        return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
    }

    if (str_starts_with($username, 'IT_')) {
        $id_role = 2;
    } elseif (str_starts_with($username, 'Admin_')) {
        $id_role = 1;
    } else {
        $id_role = 3;
    }

    $this->userModel->save([
        'username' => $username,
        'password' => $password,
        'id_role'  => $id_role
    ]);

    return redirect()->to('/kelolauser_admin')->with('success', 'Tambah berhasil.');
}


    // Simpan data User baru
    public function simpanuser()
    {
        $this->userModel->insert([
            'id_user' => $this->request->getPost('id_user'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'id_role' => $this->request->getPost('id_role'),
        ]);

        return redirect()->to('/kelolauser_admin');
    }

    // Form edit User
    public function edituser($id_user)
    {
        $data['user'] = $this->userModel->find($id_user);
        return view('edituser_admin', $data);
    }

    // Update data User
public function updateuser($id_user)
{
    $username = trim($this->request->getPost('username'));
    $password = $this->request->getPost('password');

    if (str_starts_with($username, 'IT_')) {
        $id_role = 2;
    } elseif (str_starts_with($username, 'Admin_')) {
        $id_role = 3;
    } else {
        $id_role = 1;
    }

    $data = [
        'username' => $username,
        'password' => $password,
        'id_role'  => $id_role,
    ];

    $this->userModel->update($id_user, $data);

    return redirect()->to('/kelolauser_admin');
}

    // Delete User
    public function deleteuser($id_user)
    {
        $this->userModel->delete($id_user);
        return redirect()->to('/kelolauser_admin');
    }


    //departemen
    public function keloladepartemen()
    {
        $data['departemen'] = $this->departemenModel->findAll();
        return view('keloladepartemen_admin', $data);
    }

    // Form tambah departemen
    public function tambahdepartemen()
    {
        return view('tambahdepartemen_admin');
    }

    // Simpan data departemen baru
    public function simpandepartemen()
    {
        $this->departemenModel->insert([
            'id_departemen' => $this->request->getPost('id_departemen'),
            'departemen' => $this->request->getPost('departemen'),
        ]);

        return redirect()->to('/keloladepartemen_admin');
    }

    // Form edit departemen
    public function editdepartemen($id_departemen)
    {
        $data['departemen'] = $this->departemenModel->find($id_departemen);
        return view('editdepartemen_admin', $data);
    }

    // Update data departemen
    public function updatedepartemen($id_departemen)
    {
        $this->departemenModel->update($id_departemen, [
            'id_departemen' => $this->request->getPost('id_departemen'),
            'departemen' => $this->request->getPost('departemen'),
        ]);

        return redirect()->to('/keloladepartemen_admin');
    }

    // Delete departemen
    public function deletedepartemen($id_departemen)
    {
        $this->departemenModel->delete($id_departemen);
        return redirect()->to('/keloladepartemen_admin');
    }


        //Tambah Vendor
    public function kelolavendor()
    {
        $data['vendor'] = $this->vendorModel->findAll();
        return view('kelolavendor_admin', $data);
    }

    // Form tambah Vendor
    public function tambahvendor()
    {
        return view('tambahvendor_admin');
    }

    // Simpan data Vendor baru
    public function simpanvendor()
    {
        $this->vendorModel->insert([
            'id_vendor' => $this->request->getPost('id_vendor'),
            'nama_vendor' => $this->request->getPost('nama_vendor'),
            'kontak_vendor' => $this->request->getPost('kontak_vendor'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            
        ]);
        //dd($this->request->getPost());

        return redirect()->to('/kelolavendor_admin');
    }

    // Form edit Vendor
    public function editvendor($id_vendor)
    {
        $data['vendor'] = $this->vendorModel->find($id_vendor);
        return view('editvendor_admin', $data);
    }

    // Update data Vendor
    public function updatevendor($id_vendor)
    {
        $this->vendorModel->update($id_vendor, [
            'id_vendor' => $this->request->getPost('id_vendor'),
            'nama_vendor' => $this->request->getPost('nama_vendor'),
            'kontak_vendor' => $this->request->getPost('kontak_vendor'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        ]);

        return redirect()->to('/kelolavendor_admin');
    }

    // Delete Vendor
    public function deletevendor($id_vendor)
    {
        $this->vendorModel->delete($id_vendor);
        return redirect()->to('/kelolavendor_admin');
    }

    //Tambah Staff IT
    public function kelolastaffit()
    {
        $data['staffit'] = $this->staffitModel->findAll();
        return view('kelolastaff_it_admin', $data);
    }

    // Form tambah Staff IT
    public function tambahstaffit()
    {
        return view('tambahstaff_it_admin');
    }

    // Simpan data Staff IT baru
    public function simpanstaffit()
    {
        $this->staffitModel->insert([
            'id_staff_it' => $this->request->getPost('id_staff_it'),
            'nama_staff_it' => $this->request->getPost('nama_staff_it'),
            'no_telp' => $this->request->getPost('no_telp'),
        ]);
        //dd($this->request->getPost());

        return redirect()->to('/kelolastaff_it_admin');
    }

    // Form edit Staff IT
    public function editstaffit($id_staff_it)
    {
        $data['staffit'] = $this->staffitModel->find($id_staff_it);
        return view('editstaff_it_admin', $data);
    }

    // Update data Staff IT
    public function updatestaffit($id_staff_it)
    {
        $this->staffitModel->update($id_staff_it, [
            'id_staff_it' => $this->request->getPost('id_staff_it'),
            'nama_staff_it' => $this->request->getPost('nama_staff_it'),
            'no_telp' => $this->request->getPost('no_telp'),
        ]);

        return redirect()->to('/kelolastaff_it_admin');
    }

    // Delete staff IT
    public function deletestaffit($id_staff_it)
    {
        $this->staffitModel->delete($id_staff_it);
        return redirect()->to('/kelolastaff_it_admin');
    }

    //Role Staff it
        public function kelolatiket_it()
    {
        $data['pengaduankaryawan'] = $this->pengaduanModel->findAll();
        $data['tiket'] = $this->tiketModel->findAll();
        return view('kelolatiket_staff_it', $data);
    }

    public function tambahtiket_it()
    {
        $data['staff_it'] = $this->staffitModel->findAll();
        $data['vendor'] = $this->vendorModel->findAll();
        $data['pengaduan'] = $this->pengaduanModel->findAll();
        $data['status'] = $this->pengaduanModel->findAll();
        return view('tambahtiket_staff_it', $data);
    }


    public function simpantiket_it()
    {
        $this->tiketModel->insert([
            'id_tiket' => $this->request->getPost('id_tiket'),
            'kode_tiket' => $this->request->getPost('kode_tiket'),
            'id_staff_it' => $this->request->getPost('id_staff_it'),
            'nama_staff_it' => $this->request->getPost('nama_staff_it'),
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
            'status_tiket' => $this->request->getPost('status_tiket'),
            'id_vendor' => $this->request->getPost('id_vendor'),
            'nama_vendor' => $this->request->getPost('nama_vendor'),
            'keterangan_tindakan' => $this->request->getPost('keterangan_tindakan'),
            'tgl_tiket' => $this->request->getPost('tgl_tiket'),
        ]);

        return redirect()->to('/kelolatiket_staff_it');
    }

   public function edittiket_it($id_tiket)
{
    $data['tiket'] = $this->tiketModel->find($id_tiket);
    $data['staff_it'] = $this->staffitModel->findAll();
    $data['vendor'] = $this->vendorModel->findAll();
    return view('edittiket_staff_it', $data);
}

public function updatetiket_it($id_tiket)
{
    $staff = $this->staffitModel->find($this->request->getPost('id_staff_it'));
    $vendor = $this->vendorModel->find($this->request->getPost('id_vendor'));

    $data = [
        'id_tiket' => $this->request->getPost('id_tiket'),
        'kode_tiket' => $this->request->getPost('kode_tiket'),
        'id_staff_it' => $this->request->getPost('id_staff_it'),
        'nama_staff_it' => $staff['nama_staff_it'] ?? null, 
        'id_pengaduan' => $this->request->getPost('id_pengaduan'),
        'id_vendor' => $this->request->getPost('id_vendor'),
        'nama_vendor' => $vendor['nama_vendor'] ?? null,
        'status_tiket' => $this->request->getPost('status_tiket'),
        'keterangan_tindakan' => $this->request->getPost('keterangan_tindakan'),
        'tgl_tiket' => $this->request->getPost('tgl_tiket'),
    ];

    $this->tiketModel->update($id_tiket, $data);

    return redirect()->to('/kelolatiket_staff_it');
}


    public function deletetiket_it($id_tiket)
    {
        $this->tiketModel->delete($id_tiket);
        return redirect()->to('/kelolatiket_staff_it');
    }

    public function about_staffit()
    {
        return view('about_staffit');
    }

    public function cetak_tiket_pengaduan_it()
{
    $bulan = $this->request->getGet('bulan');
    $tahun = $this->request->getGet('tahun');

    $tiketModel = new \App\Models\tiketModel();
    $pengaduanModel = new \App\Models\pengaduanModel();

    $data['tiket'] = $tiketModel->where('MONTH(tgl_tiket)', $bulan)
                                ->where('YEAR(tgl_tiket)', $tahun)
                                ->findAll();

    $data['pengaduan'] = $pengaduanModel->where('MONTH(tgl_pengaduan)', $bulan)
                                        ->where('YEAR(tgl_pengaduan)', $tahun)
                                        ->findAll();

    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;

    $html = view('pdf/cetak_tiket_pengaduan_it', $data); // pastikan view ini ada

    $options = new \Dompdf\Options();
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new \Dompdf\Dompdf($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('laporan_bulanan_it_' . $bulan . '_' . $tahun . '.pdf', ['Attachment' => false]);
}


   public function tampil()
{
    $bulan = $this->request->getGet('bulan');
    $tahun = $this->request->getGet('tahun');

    $tiketModel = new \App\Models\tiketModel();
    $pengaduanModel = new \App\Models\pengaduanModel();

    $data['tiket'] = [];
    $data['pengaduan'] = [];

    if ($bulan && $tahun) {
        $data['tiket'] = $tiketModel->where('MONTH(tgl_tiket)', $bulan)
                                    ->where('YEAR(tgl_tiket)', $tahun)
                                    ->findAll();

        $data['pengaduan'] = $pengaduanModel->where('MONTH(tgl_pengaduan)', $bulan)
                                            ->where('YEAR(tgl_pengaduan)', $tahun)
                                            ->findAll();
    }

    $data['bulan'] = $bulan ?? '';
    $data['tahun'] = $tahun ?? '';

    return view('laporan_filter', $data);
}

    //Role Karyawan
    
        public function kelolapengaduan_karyawan()
    {
        $data['pengaduankaryawan'] = $this->pengaduanModel->findAll();
        return view('kelolapengaduan_karyawan', $data);
    }

    public function tambahpengaduan_karyawan()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('tambahpengaduan_karyawan', $data);
    }


    public function simpanpengaduan_karyawan()
    {
    $this->pengaduanModel->insert([
    'id_pengaduan' => $this->request->getPost('id_pengaduan'),
    'id_kategori' => $this->request->getPost('id_kategori'),
    'nama_kategori' => $this->request->getPost('nama_kategori'),
    'id_karyawan' => $this->request->getPost('id_karyawan'),
    'nama_karyawan' => $this->request->getPost('nama_karyawan'),
    'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
    'keterangan_pengaduan' => $this->request->getPost('keterangan_pengaduan'),
    'status_pengaduan' => $this->request->getPost('status_pengaduan'),
    ]);
        return redirect()->to('/kelolapengaduan_karyawan');
    }

   public function editpengaduan_karyawan($id_pengaduan)
    {
        $data['pengaduankaryawan'] = $this->pengaduanModel->find($id_pengaduan);
        return view('editpengaduan_karyawan', $data);
    }


    public function updatepengaduan_karyawan($id_pengaduan)
    {
        $this->pengaduanModel->update($id_pengaduan, [
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'keterangan_pengaduan' => $this->request->getPost('keterangan_pengaduan'),
        ]);

        return redirect()->to('/kelolapengaduan_karyawan');
    }

    public function deletepengaduan_karyawan($id_pengaduan)
    {
        $this->pengaduanModel->delete($id_pengaduan);
        return redirect()->to('/kelolapengaduan_karyawan');
    }

    public function about_karyawan()
    {
        return view('about_karyawan');
    }

}