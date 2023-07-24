<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kebutuhan;
use App\Models\Kegiatan;
use App\Models\Komponen;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create(['name' => 'Admin', 'jabatan' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Manajer', 'jabatan' => 'Manajer', 'email' => 'manajer@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Teknisi1', 'jabatan' => 'Teknisi', 'email' => 'teknisi1@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Teknisi2', 'jabatan' => 'Teknisi', 'email' => 'teknisi2@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Teknisi3', 'jabatan' => 'Teknisi', 'email' => 'teknisi3@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Karyawan1', 'jabatan' => 'Karyawan', 'email' => 'karyawan1@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Karyawan2', 'jabatan' => 'Karyawan', 'email' => 'karyawan2@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        User::create(['name' => 'Karyawan3', 'jabatan' => 'Karyawan', 'email' => 'karyawan3@gmail.com', 'password' => bcrypt('1234'), 'email_verified_at' => now()]);
        // Data Kegiatan 
        Kegiatan::create(['name' => 'Pemeliharaan']);
        Kegiatan::create(['name' => 'Perbaikan']);
        Kegiatan::create(['name' => 'Penggantian']);
        Kegiatan::create(['name' => 'Operasional']);
        Kegiatan::create(['name' => 'Pengecekan']);
        Kegiatan::create(['name' => 'Pencatatan']);
        Kegiatan::create(['name' => 'Menonaktifkan']);

        //Data Komponen

        Komponen::create(['name' => 'Lift Penumpang 1', 'lokasi' => 'Lobby Lt.1']);
        Komponen::create(['name' => 'Lift Penumpang 2', 'lokasi' => 'Lobby Lt.1']);
        Komponen::create(['name' => 'Lift Penumpang 3', 'lokasi' => 'Lobby Lt.1']);
        Komponen::create(['name' => 'Lift Service', 'lokasi' => 'Koridor Evakuasi Lt.1']);
        Komponen::create(['name' => 'Gondola Plaza PP', 'lokasi' => 'Area Luar Gedung']);
        Komponen::create(['name' => 'Genset 1 Detroit', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Genset 2 Detroit', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Meter Listrik Plaza PP', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel Genset 1 Detroit', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel Genset 2 Detroit', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel Listrik Dalam Gedung', 'lokasi' => 'R. Panel Lt.1']);
        Komponen::create(['name' => 'Panel Listrik Luar Gedung', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel TM (Cubical) Plaza PP', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel LVMDP 1 & 2 Plaza PP', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel Kapasitor Bank 1 & 2', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Panel SDP 1 & 2 Plaza PP', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Travo TM 1 & 2 Plaza PP', 'lokasi' => 'R. Power House']);
        Komponen::create(['name' => 'Penerangan Dalam Gedung', 'lokasi' => 'Area Dalam Gedung Plaza PP']);
        Komponen::create(['name' => 'Penerangan Luar Gedung', 'lokasi' => 'Area Luar Gedung Plaza PP']);
        Komponen::create(['name' => 'AC Split & Casette Plaza PP', 'lokasi' => 'Area Dalam Gedung Plaza PP']);
        Komponen::create(['name' => 'Sound System Plaza PP', 'lokasi' => 'R. PABX']);
        Komponen::create(['name' => 'PABX', 'lokasi' => 'R. PABX']);
        Komponen::create(['name' => 'Lampu A01', 'lokasi' => 'R. Sekretaris Properti Lt 7']);
        Komponen::create(['name' => 'Lampu A02', 'lokasi' => 'Toilet Pria Lt.4']);
        Komponen::create(['name' => 'Lampu A03', 'lokasi' => 'Toilet Wanita Pria Lt.4']);
        Komponen::create(['name' => 'AC C01', 'lokasi' => 'R. Bangquet Lt. 4']);
        Komponen::create(['name' => 'Lampu Gantung A04', 'lokasi' => 'Bank Mandiri Lt. 2 Gd Plaza PP']);
        Komponen::create(['name' => 'Line Telephone T41', 'lokasi' => 'R. Dekom Lt. 4']);
        Komponen::create(['name' => 'Lampu A05', 'lokasi' => 'Koridor Lt.4']);
        Komponen::create(['name' => 'AC C02', 'lokasi' => 'R. Rapat Properi Lt. 7']);
        Komponen::create(['name' => 'Lampu Taman A06', 'lokasi' => 'Area Depan Superindo']);
        Komponen::create(['name' => 'Lampu Koridor A07', 'lokasi' => 'Koridor Lt.4']);
        Komponen::create(['name' => 'Lampu A08', 'lokasi' => 'Bangquet Lt.4']);
        Komponen::create(['name' => 'Lampu A09', 'lokasi' => 'R. Staff Infra Lt.4']);
        Komponen::create(['name' => 'AC C03', 'lokasi' => 'R. AHU Lt.7']);
        Komponen::create(['name' => 'Lampu A10', 'lokasi' => 'Koridor EPC Lt.3']);
        Komponen::create(['name' => 'Lampu A11', 'lokasi' => 'Area Taman R. PH']);
        Komponen::create(['name' => 'Lampu A12', 'lokasi' => 'R. Admin EPC Lt.3']);
        Komponen::create(['name' => 'Lampu A13', 'lokasi' => 'R. Kompeten 1 Lt.4']);
        Komponen::create(['name' => 'Lampu A14', 'lokasi' => 'R. Kompeten 2 Lt.4']);
        Komponen::create(['name' => 'Lampu A15', 'lokasi' => 'R. Amanah 1 Lt.4']);
        Komponen::create(['name' => 'Lampu A16', 'lokasi' => 'R. Rapat Infra Lt.4']);
        Komponen::create(['name' => 'Lampu A17', 'lokasi' => 'R. Rapat Infra 1 Lt.5']);
        Komponen::create(['name' => 'AC C04', 'lokasi' => 'R. Teknik Lt.6']);
        Komponen::create(['name' => 'Lampu A18', 'lokasi' => 'R. Rapat Infra 1 Lt.5']);
        Komponen::create(['name' => 'Lampu A19', 'lokasi' => 'Koridor Infra 1 Lt.5']);
        Komponen::create(['name' => 'AC C05', 'lokasi' => 'R. Staff Urban Lt.2']);
        Komponen::create(['name' => 'Lampu A20', 'lokasi' => 'R. SVP Infra 1 Lt.5']);
        Komponen::create(['name' => 'AC C06', 'lokasi' => 'Musholla EPC Lt.3']);
        Komponen::create(['name' => 'AC C07', 'lokasi' => 'R. Staff Urban Lt.2']);
        Komponen::create(['name' => 'Lampu A21', 'lokasi' => 'Koridor Lt.3']);
        Komponen::create(['name' => 'Lampu A22', 'lokasi' => 'R. Gudang HK']);
        Komponen::create(['name' => 'Speaker', 'lokasi' => 'Koridor Lt.7']);
        Komponen::create(['name' => 'Lampu A23', 'lokasi' => 'Koridor Lt.6']);
        Komponen::create(['name' => 'Lampu A24', 'lokasi' => 'R. HCM Lt.6']);
        Komponen::create(['name' => 'Telephone Meja TM01', 'lokasi' => 'R. Sekdir Urban Lt.2']);
        Komponen::create(['name' => 'AC C08', 'lokasi' => 'Happy Hours Lt. GF']);
        Komponen::create(['name' => 'AC C09', 'lokasi' => 'R. Personal Banker 1 Mandiri']);
        Komponen::create(['name' => 'AC C10', 'lokasi' => 'R. Personal Banker 2Mandiri']);
        Komponen::create(['name' => 'AC C11', 'lokasi' => 'R. Rapat 8 EPC Lt.3']);
        Komponen::create(['name' => 'Lampu A25', 'lokasi' => 'R. Staff Keuangan Infra 1 Lt.5']);
        Komponen::create(['name' => 'AC C12', 'lokasi' => 'Lobby Engineering EPC Lt.3']);
        Komponen::create(['name' => 'AC C13', 'lokasi' => 'R. Amanah Lt.4']);
        Komponen::create(['name' => 'AC C14', 'lokasi' => 'R. Finance Lt.6']);
        Komponen::create(['name' => 'AC C15', 'lokasi' => 'R. Adaptif 2 Lt.4']);
        Komponen::create(['name' => 'AC C16', 'lokasi' => 'R. Kadiv Gedung Lt.6']);
        Komponen::create(['name' => 'AC C17', 'lokasi' => 'R. Rapat Direksi Lt.4']);
        Komponen::create(['name' => 'AC C18', 'lokasi' => 'R. Komisaris Urban Lt.2']);
        Komponen::create(['name' => 'Lampu A26', 'lokasi' => 'Toilet Pria Lt.1']);
        Komponen::create(['name' => 'Lampu A27', 'lokasi' => 'Koridor Lt.7']);
        Komponen::create(['name' => 'Lampu A28', 'lokasi' => 'R. Tunggu Tamu Lt.4']);
        Komponen::create(['name' => 'Lampu A29', 'lokasi' => 'Koridor Barat Lt.4']);
        Komponen::create(['name' => 'Lampu A30', 'lokasi' => 'Koridor Lobby Lt.4']);
        Komponen::create(['name' => 'Lampu A31', 'lokasi' => 'R. Teknik Lt.6']);
        Komponen::create(['name' => 'Lampu A32', 'lokasi' => 'R. Staff Teknik Lt.6']);
        Komponen::create(['name' => 'Lampu A33', 'lokasi' => 'R. HSE EPC Lt.3']);
        Komponen::create(['name' => 'AC C19', 'lokasi' => 'R. PMO EPC Lt.3']);
        Komponen::create(['name' => 'AC C20', 'lokasi' => 'Lobby Infra 1 & 2']);
        Komponen::create(['name' => 'AC C21', 'lokasi' => 'Pintu masuk KFC']);
        Komponen::create(['name' => 'AC C22', 'lokasi' => 'LSI Lt. GF']);
        Komponen::create(['name' => 'AC C23', 'lokasi' => 'R. Legal EPC Lt.3']);
        Komponen::create(['name' => 'AC C24', 'lokasi' => 'R. Housekeeping Lt.4']);
        Komponen::create(['name' => 'AC C25', 'lokasi' => 'Toilet Wanita Lt.1']);
        Komponen::create(['name' => 'AC C26', 'lokasi' => 'R. Kadiv Infra 2 Lt.5']);
        Komponen::create(['name' => 'AC C27', 'lokasi' => 'R. Staff Infra 2 Lt.5']);
        Komponen::create(['name' => 'AC C28', 'lokasi' => 'Area Makan KFC']);

        //Data Kebutuhan Alat
        Kebutuhan::create(['name' => ' Bor Besar', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Bor Kecil', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Cuter Besar', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Flering Besar', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Flexible Pipa Konduit', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin Gerinda Tangan', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Gun Gergaji Besi', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Gun Grease', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Gun Sealent', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Hair Dryer', 'jenis' => 'alat', 'kondisi' => 'Rusak']);
        Kebutuhan::create(['name' => ' Kabel Roll  50 mtr', 'jenis' => 'alat', 'kondisi' => 'Rusak']);
        Kebutuhan::create(['name' => ' Kedok Las', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kedok Mesin Gerinda', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kop Kaca', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Filter', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Inggris 10"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Inggris 12"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Inggris 18"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci L', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Pas Besar 32 /27, ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Pas Tracker', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Pipa 12"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Pipa 14"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Pipa 24"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Pipa 24"', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci Ring Pas', 'jenis' => 'alat', 'kondisi' => 'Rusak']);
        Kebutuhan::create(['name' => ' Lux Meter', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin Potong Keramik', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin Potong Triplek', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Meteran 50 mtr', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Meteran Digital 40 mtr', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mini Temperatur AC', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Multi Tester', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Obeng Min', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Obeng Ples', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Palu Karet', 'jenis' => 'alat', 'kondisi' => 'Rusak']);
        Kebutuhan::create(['name' => ' Plering Pipa AC', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Plering Pipa AC', 'jenis' => 'alat', 'kondisi' => 'Rusak']);
        Kebutuhan::create(['name' => ' Selang Analizer 410 A', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Selang Analizer R 22', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Solder', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Steam', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Amper', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Burung', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Cucut', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Kombinasi', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Krimping', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Potong', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Press', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Rivet', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Skun Besar', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang Skun Kecil', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tangga 2 meter', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tangga Alumunium 2 mtr', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tangga Alumunium 3 mtr', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tool Box', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Trecker Kecil', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Vacum AC', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Vacum Cleaner', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tone checker', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tes Phone', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Gunting seng ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Blok stop gondola', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Bending pipa ega ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Body harnes', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Cutting wheel ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin gergaji mini ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Roda scoffolding ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin las listrik', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin las listrik besar travo', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin Compresor ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Alat senai pipa ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Ragum', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Selang analiser 1 set', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Senter ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kuncib reng pas ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci inggris 10 "', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Kunci inggris 12 "', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Solder', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Penyedot timah', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang amper', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Tang cucut', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Meteran 5 M', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Mesin Stim ', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Meteran 5 M', 'jenis' => 'alat', 'kondisi' => 'Baik']);
        Kebutuhan::create(['name' => ' Form Catatan', 'jenis' => 'alat', 'kondisi' => 'Baik']);

        //Data Kebutuhan bahan 
        Kebutuhan::create(['name' => 'Lampu Led 12 W ( Putih )', 'jenis' => 'bahan', 'jumlah' => 12, 'harga' => 51000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Lampu Led 12 W ( Kuning )', 'jenis' => 'bahan', 'jumlah' => 8, 'harga' => 50000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Essential 18 W ( Putih )', 'jenis' => 'bahan', 'jumlah' => 10, 'harga' => 46000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'TL Led 16 W', 'jenis' => 'bahan', 'jumlah' => 13, 'harga' => 43000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Ballast 10 A', 'jenis' => 'bahan', 'jumlah' => 30, 'harga' => 60000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Essential 14 W ( Putih )', 'jenis' => 'bahan', 'jumlah' => 20, 'harga' => 43000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Jet Shower', 'jenis' => 'bahan', 'jumlah' => 5, 'harga' => 70000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Essential 11 W ( Putih )', 'jenis' => 'bahan', 'jumlah' => 15, 'harga' => 33000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Baut 2 pcs/set', 'jenis' => 'bahan', 'jumlah' => 10, 'harga' => 12500, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Freon R410', 'jenis' => 'bahan', 'jumlah' => 2, 'harga' => 300000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Silent', 'jenis' => 'bahan', 'jumlah' => 5, 'harga' => 20000, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'TL 36 W', 'jenis' => 'bahan', 'jumlah' => 10, 'harga' => 22500, 'kondisi' => '']);
        Kebutuhan::create(['name' => 'Led 4 w (Kuning)', 'jenis' => 'bahan', 'jumlah' => 10, 'harga' => 20000, 'kondisi' => '']);
    }
}
