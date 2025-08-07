<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//LOGIN
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/prosesLogin', 'Auth::prosesLogin');
//REGISTER
$routes->get('/registerr', 'Auth::registerr');
$routes->post('/register', 'Auth::register');
//lOGOUT
$routes->get('/logout', 'Auth::logout');
//beranda
$routes->get('/beranda_admin', 'Auth::beranda_admin');
$routes->get('/edittiket_staff_it_beranda/(:segment)', 'Auth::edittiket_it_beranda/$1');
$routes->post('/auth/updatetiket_it_beranda/(:segment)', 'Auth::updatetiket_it_beranda/$1');
$routes->get('/deletetiket_it_beranda/(:segment)', 'Auth::deletetiket_it_beranda/$1');
$routes->get('/editpengaduan_karyawan_beranda/(:segment)', 'Auth::editpengaduan_karyawan_beranda/$1');
$routes->post('/auth/updatepengaduan_karyawan_beranda/(:segment)', 'Auth::updatepengaduan_karyawan_beranda/$1');
$routes->get('/deletepengaduan_karyawan_beranda/(:segment)', 'Auth::deletepengaduan_karyawan_beranda/$1');
//kategori
$routes->get('/kelolakategori_admin', 'Auth::kelolakategori');
$routes->get('/auth/tambahkategori_admin', 'Auth::tambahkategori');
$routes->post('/simpankategori', 'Auth::simpankategori');
$routes->get('/auth/editkategori_admin/(:segment)', 'Auth::editkategori/$1');
$routes->post('/auth/updatekategori/(:segment)', 'Auth::updatekategori/$1');
$routes->get('/deletekategori/(:segment)', 'Auth::deletekategori/$1');
//karyawan
$routes->get('/kelolakaryawan_admin', 'Auth::kelolakaryawan');
$routes->get('/auth/tambahkaryawan_admin', 'Auth::tambahkaryawan');
$routes->post('/simpankaryawan', 'Auth::simpankaryawan');
$routes->get('/editkaryawan_admin/(:segment)', 'Auth::editkaryawan/$1');
$routes->post('/auth/updatekaryawan/(:segment)', 'Auth::updatekaryawan/$1');
$routes->get('/deletekaryawan/(:segment)', 'Auth::deletekaryawan/$1');
//departemen
$routes->get('/keloladepartemen_admin', 'Auth::keloladepartemen');
$routes->get('/auth/tambahdepartemen_admin', 'Auth::tambahdepartemen');
$routes->post('/simpandepartemen', 'Auth::simpandepartemen');
$routes->get('/auth/editdepartemen_admin/(:segment)', 'Auth::editdepartemen/$1');
$routes->post('/auth/updatedepartemen/(:segment)', 'Auth::updatedepartemen/$1');
$routes->get('/deletedepartemen/(:segment)', 'Auth::deletedepartemen/$1');
//role
$routes->get('/kelolarole_admin', 'Auth::kelolarole');
$routes->get('/auth/tambahrole_admin', 'Auth::tambahrole');
$routes->post('/simpanrole', 'Auth::simpanrole');
$routes->get('/auth/editrole_admin/(:segment)', 'Auth::editrole/$1');
$routes->post('/auth/updaterole/(:segment)', 'Auth::updaterole/$1');
$routes->get('/deleterole/(:segment)', 'Auth::deleterole/$1');
//user
$routes->get('/kelolauser_admin', 'Auth::kelolauser');
$routes->get('/auth/tambahuser_admin', 'Auth::tambahuser');
$routes->post('/tambahuser_kelola', 'Auth::tambahuser_kelola');
$routes->post('/simpanuser', 'Auth::simpanuser');
$routes->get('/edituser_admin/(:segment)', 'Auth::edituser/$1');
$routes->post('/auth/updateuser/(:segment)', 'Auth::updateuser/$1');
$routes->get('/deleteuser/(:segment)', 'Auth::deleteuser/$1');
//vendor
$routes->get('/kelolavendor_admin', 'Auth::kelolavendor');
$routes->get('/auth/tambahvendor_admin', 'Auth::tambahvendor');
$routes->post('/simpanvendor', 'Auth::simpanvendor');
$routes->get('/editvendor_admin/(:segment)', 'Auth::editvendor/$1');
$routes->post('/auth/updatevendor/(:segment)', 'Auth::updatevendor/$1');
$routes->get('/deletevendor/(:segment)', 'Auth::deletevendor/$1');
//staff IT
$routes->get('/kelolastaff_it_admin', 'Auth::kelolastaffit');
$routes->get('/auth/tambahstaff_it_admin', 'Auth::tambahstaffit');
$routes->post('/simpanstaffit', 'Auth::simpanstaffit');
$routes->get('/editstaff_it_admin/(:segment)', 'Auth::editstaffit/$1');
$routes->post('/auth/updatestaffit/(:segment)', 'Auth::updatestaffit/$1');
$routes->get('/deletestaffit/(:segment)', 'Auth::deletestaffit/$1');
//role IT
$routes->get('/kelolatiket_staff_it', 'Auth::kelolatiket_it');
$routes->get('/auth/tambahtiket_staff_it', 'Auth::tambahtiket_it');
$routes->post('/simpantiket_it', 'Auth::simpantiket_it');
$routes->get('/edittiket_staff_it/(:segment)', 'Auth::edittiket_it/$1');
$routes->post('/auth/updatetiket_it/(:segment)', 'Auth::updatetiket_it/$1');
$routes->get('/deletetiket_it/(:segment)', 'Auth::deletetiket_it/$1');
//about IT
$routes->get('/about_staffit', 'Auth::about_staffit');
//cetak PDF
$routes->get('/cetak_tiket_pengaduan_it', 'Auth::cetak_tiket_pengaduan_it');
$routes->get('/laporan_filter', 'Auth::tampil'); // halaman filter

//role Karyawan
$routes->get('/kelolapengaduan_karyawan', 'Auth::kelolapengaduan_karyawan');
$routes->get('/auth/tambahpengaduan_karyawan', 'Auth::tambahpengaduan_karyawan');
$routes->post('/simpanpengaduan_karyawan', 'Auth::simpanpengaduan_karyawan');
$routes->get('/editpengaduan_karyawan/(:segment)', 'Auth::editpengaduan_karyawan/$1');
$routes->post('/auth/updatepengaduan_karyawan/(:segment)', 'Auth::updatepengaduan_karyawan/$1');
$routes->get('/deletepengaduan_karyawan/(:segment)', 'Auth::deletepengaduan_karyawan/$1');
//about Karyawan
$routes->get('/about_karyawan', 'Auth::about_karyawan');

