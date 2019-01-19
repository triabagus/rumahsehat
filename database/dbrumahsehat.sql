-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2018 pada 10.42
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrumahsehat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_apoteker`
--

CREATE TABLE `tb_apoteker` (
  `kd_apoteker` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_apoteker`
--

INSERT INTO `tb_apoteker` (`kd_apoteker`, `username`, `password`) VALUES
(14, 'admin', 'admin'),
(16, 'tria', 'tria'),
(17, 'apoteker', 'apoteker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `kd` int(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`kd`, `judul`, `sub_title`, `isi`, `gambar`) VALUES
(2, 'Manfaat Buah Naga Untuk Kesehatan Jantung', 'Apa yang terpikirkan jika mendengar kata buah naga? Mungkin..', 'Manfaat buah naga untuk kesehatan:\r\nMeningkatkan sistem kekebalan tubuh. Buah naga kaya akan vitamin C dan serat yang bermanfaat bagi tubuh\r\nMembantu proses pencernaan, karena buah naga kaya akan serat.\r\nMenurunkan kadar gula darah pada penderita diabetes tipe 2.\r\nMencegah terbentuknya sel kanker akibat radikal bebas. Mineral dan serat yang terkandung dalam buah naga membantu membersikan racun dalam usus besar. Dan mecegah terjadinya kanker usus.\r\n', 'naga-300x300.jpg'),
(3, 'Mengenal Operasi Lasik Untuk Mata', 'Dulu orang yang punya penglihatan kabur atau tidak jelas mulai kategori minus kecil ...', 'Dulu orang yang punya penglihatan kabur atau tidak jelas mulai kategori minus kecil sampai besar harus menggunakan kacamata sebagai alat bantu penglihatan. Ketika kategori minus mata sudah semakin besar maka lensa kacamatapun semakin tebal. Hal ini kadang sangat menganggu dan menyulitkan penggunanya. Namun sekarang penderitaan itu bisa hilang dengan sebuah prosedur operasi yang dinamakan operasi Lasik.\r\nLasik adalah Laser-Assisted In Situ Keratomileusis, sebuah prosedur untuk memperbaiki penglihatan yang kabur atau rusak menggunakan sinar laser. Mari mengenal operasi Lasik untuk mata. Lasik adalah sebuah operasi yang secara permanen mengubah bentuk kornea mata untuk meningkatkan kualitas penglihatan dan mengurangi ketergantuangan orang pada penggunaan kacamata atau lensa kontak.', 'lasik-mata.jpg'),
(4, '5 Manfaat Daun Jambu', 'Dengan mengunakan bahan alami...', '1.Mengobati Diare\r\n\r\nDiare adalah kondisi sistem pencernaan yang tidak terkontrol sehingga membuat buang air besar secara berlebihan dan menyebabkan sakit perut yang cukup intens.\r\n\r\n2.Mengobati Masuk Angin\r\n\r\nSesuai dengan namanya, penyakit masuk angin disebabkan tubuh merasakan terlalu banyak angin di dalamnya.\r\n\r\n3.Mengobati Penyakit Maag\r\n\r\nPenyakit maag disebabkan karena produksi asam lambung tidak terkontrol sehingga lambung menjadi nyeri dan sakit. \r\n\r\n4.Mengobati Sariawan\r\nSariawan merupakan penyakit yang sering terjadi di dalam mulut, terutama pada bibir bagian dalam. \r\n\r\n5.Mengobati Demam Berdarah\r\nDemam berdarah atau DBD merupakan jenis penyakit yang serius, penyakit ini disebabkan oleh infeksi virus dan bakteri yang disebabkan oleh gigitan nyamuk.', 'daun_jambu_1450408339.jpg'),
(6, 'Buah Untuk Kesehatan Mata', 'Mata merupakan jendela hati. Demikian kata pepatah mengatakan. Memang benar,...', 'Mata merupakan jendela hati. Demikian kata pepatah mengatakan. Memang benar, dari mata kita dapat mewakili semua rasa yang ada. Sorot mata memiliki arti bahkan manusia dapat berkomunikasi hanya melalui tatap mata. Mata juga tak mampu menyembunyikan sebuah kebohongan. Betapa dahsyat fungsi mata selain mampu menunjukkan kepada kita akan indahnya dunia. Namun tahukah Anda apa yang baik untuk mata? Ya, mata perlu sehat dan kita akan membicarakan tentang manfaat buah untuk kesehatan mata.\r\nBuah selain enak dimakan, menyegarkan tubuh sekaligus menyehatakan tubuh, juga memiliki berjuta manfaat lain. Salah satunya adalah untuk meningkatkan kesehatan mata. Bagaimana bisa? Ya, di dalam berbagai jenis buah terkandung suatu komponen zat warna yang disebut sebagai beta karoten. Beta karoten ini dapat mengaktifkan pro vitamin A menjadi vitamin A yang baik untuk kesehatan mata dan meningkatkan daya akomodasi. Beta karoten terdapat di dalam buah-buahan khususnya yang berwarna kuning, jingga atau kemerahan. Sebagai contoh adalah buah mangga, papaya, jeruk, apel, semangka, melon. Kalau buah berwanra merah, kunging, jingga, oranye sudah Nampak jelas mengandung karoten, buah apel berwarna hijau serta pir ternyata juga mengandung beta karoten dalam kadar cukup tinggi.', 'Buah-Untuk-Kesehatan-Mata.jpg'),
(7, 'Diet Wanita untuk Anak Cerdas', 'Untuk itulah sebagai wanita harus sering update ilmu.  Salah satu ilmu berikut ...', 'Untuk itulah sebagai wanita harus sering update ilmu.  Salah satu ilmu berikut adalah tips diet untuk wanita calon ibu.\r\n1. Dilarang diet saat hamil\r\nWanita harusnya diet saat sebelum dan sesudah hamil saja. Karena diet saat hamil dapat beresiko mengakibatkan janin kekurangan gizi tertentu sehingga mengalami cacat fisik atau mental. Disaat hamil biasanya dokter menganjurkan anda untuk konsumsi obat tambahan untuk menambah vitamin dan mineral yang lengkap, dan kandungan asam folat yang cukup.\r\n2. Jika gemuk wajib diet sebelum hamil\r\nDiantara semua metode diet, sebenarnya yang disarankan WHO hanya satu, yaitu diet RENDAH KALORI. Sekarang ini banyak sekali pilihan produk makanan atau minuman tambahan yang dapat menggantikan makan, tugas kita memilih produk yang terbaik dan terpercaya tentunya, misalnya produk nutrishake dari oriflame kandungan gizi alami dan seimbang dengan nilai energi total persajian sama dengan 70 kkal (kebutuhan perhari kurang lebih 2000kkal)\r\n3. Menyusui agar anak cerdas dan ibu cepat langsing kembali\r\nCadangan lemak di dalam tubuh dapat diubah secara otomatis menjadi energi dengan cara menyusui si buah hati. Saat menyusui, ibu membutuhkan tambahan kalori sebesar 700-800 kalori (jadi total 2700-2800kkal perhari) perlu diingat kualitas makanan jauh lebih penting daripada kuantitas makanan itu sendiri. Konsumsilah juga  makanan yang mengandung zat perangsang air susu ibu, vitamin dan kalsium untuk tulang ibu dan si buah hati.\r\n4. Mulai diet setelah melahirkan 4-6 bulan\r\n\r\nini disaat si buah hati sudah mulai mendapatkan makanan tambahan selain air susu ibu atau biasa disebut mpasi (makanan pendamping asi)\r\nnamun hati-hati ya..bijaklah dalam memilih metode diet, seperti yang sudah dijelaskan tadi diet terbaik hanya dengan rendah kalori. Hindari mengkonsumsi obat-obatan yang mengandung penekan nafsu makan, atau pelarut lemak karena menimbulkan resiko kepada si buah hati anda. Dan konsumsi vitamin , kalsium untuk penunjang tulang ibu dan anak harus tetap dilakukan.', 'n-150x150.jpg'),
(8, 'Obat Pemutih Gigi yang dijual di Apotik VS Obat Tradisional', 'Setiap orang pasti mendambakan gigi yang putih. Memiliki gigi putih membuat orang menjadi lebih perc', 'Ada beberapa faktor penyebab gigi kuning dan gigi tidak sehat antara lain:\r\nâ€“ Karena merokok\r\nâ€“ Terlalu sering meminum kopi atau teh\r\nâ€“  Malas untuk menggosok gigi serta cara menggosok gigi yang kurang sempurna\r\nâ€“ Memakai obat tetes mata berlebih\r\nâ€“ Terlalu sering mengkonsumsi minuman penambah energi atau suplement\r\nâ€“ Kurang nya perawatan pada gigi\r\nâ€“ Faktor usia\r\nâ€“ Menggunakan obat kimia, dll.\r\n\r\nOrang yang memiliki gigi kuning pasti akan mencari cara agar gigi nya tampak putih dan sehat. Kebanyakan orang memilih untuk menggunakan obat pemutih gigi. Akan tetapi sebelum anda menggunakan obat pemutih gigi anda harus mencari tahu dulu apakah obat pemutih gigi tersebut dapat menimbulkan efek samping serta membuat anda ketergantungan. Gigi kuning dapat diatasi dengan tidak menggunakan obat pemutih gigi di apotik. Kita semua tahu bahwa obat-obatan yang dijual di apotik hampir semuanya terbuat dari bahan-bahan kimia. Anda juga pasti tahu penggunaan obat-obatan kimia dalam jangka panjang dapat menimbulkan efek samping bagi kesehatan tubuh anda.', 'Obat-Pemutih-Gigi-300x199.jpg'),
(11, 'Manfaat Gula Aren Bagi Kesehatan', 'Ada dua jenis gula yang banyak digunakan dan dikonsumsi oleh masyarakat Indonesia, yaitu gula putih ', '1.Sumber Antioksidan\r\n\r\nDi dalam gula aren terdapat kandungan antioksidan dalam jumlah yang banyak. Kandungan antioksidan tersebut mempunyai kemampuan untuk menangkal radikal bebas, sehingga dapat melindungi tubuh dari ancaman penyakit yang berbahaya seperti kanker kulit.\r\nMengobati dan Mencegah Penyakit Anemia\r\nGula aren mempunyai kandungan zat besi yang cukup tinggi. Kandungan zat besi tersebut mempunyai kemampuan untuk meningkatkan produksi sel-sel darah merah sehingga dapat mengobati dan mencegah penyakit anemia atau kurang darah.\r\n\r\n2.Meningkatkan Sistem Kekebalan Tubuh\r\nDi dalam gula aren terdapat beberapa unsur kimia yang mempunyai kemampuan untuk melancarkan sistem peredaran darah, sehingga fungsi dan kinerja semua organ-organ tubuh menjadi lebih optimal. Kemudian, kandungan unsur kimia di dalamnya juga berfungsi untuk meningkatkan sistem kekebalan tubuh.\r\nMenstabilkan Kadar Kolesterol Di Dalam Darah\r\nGula aren memiliki kandungan niacin yang berperan untuk menstabilkan kadar kolesterol di dalam darah. Kandungan niacin tersebut juga berfungsi untuk menghaluskan dan menjaga kesehatan kulit.\r\n\r\n', 'manfaat-gula-aren-bagi-kesehatan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `no_daftar` int(50) NOT NULL,
  `tgldaftar` date NOT NULL,
  `tgldatang` date NOT NULL,
  `kd_dokter` int(50) NOT NULL,
  `kd_pasien` int(50) NOT NULL,
  `kd_plk` int(50) NOT NULL,
  `biaya` int(50) NOT NULL,
  `ket` text NOT NULL,
  `no_resep` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE `tb_detail` (
  `no_resep` int(50) NOT NULL,
  `kd_obat` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `sub_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `kd_dokter` int(50) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` text NOT NULL,
  `kd_plk` int(50) NOT NULL,
  `tarif` int(50) NOT NULL,
  `ket` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`kd_dokter`, `nm_dokter`, `spesialis`, `alamat`, `telp`, `kd_plk`, `tarif`, `ket`, `image`) VALUES
(1, 'Dr.Haris Mongolo', 'Mata ', 'Kota Malang ', '83766245', 6, 10000, 'memiliki kemampuan menyembuhkan mata dengan baik', 'men.jpg'),
(2, 'Dr.Putra Adi', 'Tulang', 'Pujon city', '08265776438', 9, 50000, 'Dengan kemampuan untuk menyembuhkan orang sakit tulang seperti osteoporosis', 'men4.png'),
(3, 'Dr.Arifin Jr', 'Umum', 'Jl.Mawar Ponorogo', '836588932', 10, 20000, 'Kemampuannya telah diuji oleh para spesialis dengan bertahap', 'men4.png'),
(5, 'Arizal Mahmud', 'Gigi', 'Batu', '0854277638', 6, 10000, 'Dokter dengan kemampuan spesialis gigi', 'men1.png'),
(6, 'Drs.Mujiati ', 'mata', 'Dalem makarsa Kota Kediri', '0897363722', 8, 20000, 'Pengalaman yang baik di bidang mata ia menjadi dokter spesialis mata yang hebat', 'women.png'),
(7, 'Dr.Muhammad', 'Anak', 'Kota Solo', '089766642622', 7, 30000, 'Perawatan dengan menjaga anak seorang pasien yang baik', 'men3.png'),
(9, 'Drs.Sumiati', 'THT', 'Jl.Mawar gg 2 Kota Solo', '865271992', 6, 20000, 'Dengan Pengalaman lebih di bidang THT ia menjadi doktor pribadi.', 'doktor2.jpg'),
(10, 'Dr.Hj.Wahid Hasyim', 'Penyakit Dalam', 'Kota Kediri', '856238221', 12, 10000, 'Dengan Pengalaman di bidang penyakit dalam ia menjadi doktor yang selalu di andalkan.', 'doktor.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_list_resep`
--

CREATE TABLE `tb_list_resep` (
  `no_resep` int(100) NOT NULL,
  `nm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_list_resep`
--

INSERT INTO `tb_list_resep` (`no_resep`, `nm`) VALUES
(101, 'paru'),
(102, 'tht'),
(103, 'mata'),
(104, 'tulang'),
(105, 'penyakit dalam'),
(106, 'sakit gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kd_obat` int(50) NOT NULL,
  `nm_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `ket` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `no_resep` int(100) NOT NULL,
  `dosis` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `jenis_obat`, `kategori`, `harga`, `jumlah`, `ket`, `image`, `no_resep`, `dosis`) VALUES
(1, 'A-B VASK TABLET 10 MG', 'tablet', 'Dewasa', 2000, 1000, 'Hipersensitif terhadap dihidropiridin. Perhatian:	Hamil, laktasi. Gangguan fungsi hati dan gagal jantung kongestif. Efek Samping:	Sakit kepala, kelelahan yang menyeluruh, rasa panas dan kemerahan pada wajah, palpitasi, pusing, edema.', 'abbotic tabler 500.jpg', 101, 3),
(2, 'ABAJOS CAPSULE', 'tablet', 'Remaja', 25000, 300, 'DESKRIPSI Paracetamol 500 mg, thiamine HCl 50 mg, pyridoxine HCl 100 mg, cyanocobalamin 100 mcg INDIKASI Neuritis (radang saraf), neuralgia (nyeri saraf). KEMASAN Kapsul 10 x 10\'s DOSIS 3 kali sehari 1 tablet. Dikonsumsi bersamaan dengan makanan atau tidak Dikonsumsi bersamaan dengan makanan atau tidak PABRIK Nufarindo.', 'abajol caplus.jpg', 103, 1),
(3, 'ABBOTIC DRY SYRUP 125 MG/5 ML 30 ML', 'sirup', 'Anak', 15000, 8000, 'DESKRIPSI Clarythromycin / Klaritromisin. INDIKASI Infeksi saluran pernafasan bagian atas & bawah, H. pylori, dan infeksi kulit & struktur kulit tanpa komplikasi. KEMASAN Dry sirup 125 mg/5 ml x 30 ml. DOSIS 7,5 mg/kg berat badan tiap 12 jam selama 5 hari. Dikonsumsi bersamaan dengan makanan atau tidak Dikonsumsi bersamaan dengan makanan atau tidak PABRIK Abbott.', 'ABBOTIC DRY SYRUP 125 MG.jpg', 101, 5),
(5, 'ABBOTIC DRY SYRUP 125 MG/5 ML 30 ML', 'sirup', 'Anak', 20000, 900, 'DESKRIPSI Clarythromycin / Klaritromisin. INDIKASI Infeksi saluran pernafasan bagian atas & bawah, H. pylori, dan infeksi kulit & struktur kulit tanpa komplikasi. KEMASAN Dry sirup 125 mg/5 ml x 30 ml. DOSIS 7,5 mg/kg berat badan tiap 12 jam selama 5 hari. Dikonsumsi bersamaan dengan makanan atau tidak Dikonsumsi bersamaan dengan makanan atau tidak PABRIK Abbott.', 'abbotic sirup.jpg', 105, 2),
(6, 'ABBOTIC TABLET 500 MG', 'tablet', 'Dewasa', 30000, 2, 'Infeksi saluran pernafasan bagian atas & bawah, H. pylori, dan infeksi kulit & struktur kulit tanpa komplikasi. . DESKRIPSI Clarithromycin / Klaritromisin. INDIKASI Infeksi saluran pernafasan bagian atas & bawah, H. pylori, dan infeksi kulit & struktur kulit tanpa komplikasi. KEMASAN Tablet salut selaput 500 mg x 30\'s DOSIS Infeksi saluran pernapasan bagian atas & bawah : 250-500 mg tiap 12 jam selama 10-14 hari. Infeksi H. pylori : 2 kali sehari 500 mg selama 7 hari. Infeksi kulit dan struktur kulit tanpa komplikasi : 250 mg tiap 12 jam selama 7-14 hari. Dikonsumsi bersamaan dengan makanan atau tidak Dikonsumsi bersamaan dengan makanan atau tidak PABRIK Abbott.', 'ABBOTIC DRY SYRUP 125 MG.jpg', 102, 2),
(7, 'Duricef', 'sirup', 'Anak', 20000, 90, 'Duricef (sefadroksil MONOHYDRATE) adalah antibiotik sefalosporin, digunakan dalam pengobatan hidung, tenggorokan, saluran kemih, dan infeksi kulit yang disebabkan oleh bakteri yang spesifik, termasuk Staph, strep, dan E. coli. Dutas Dutas (DUTASTERIDE) digunakan untuk pengobatan gejala benign prostatic hyperplasia (BPH) pada pria dengan pembesaran prostat.', 'download.jpg', 101, 2),
(9, 'bodrek', 'tablet', 'Remaja', 3000, 20, 'Bodrex merupakan obat yang ditujukan untuk meringankan sakit kepala. Obat tersebut mengandung paracetamol 600 mg serta caffeine 50 mg.', 'bodrek.jpg', 103, 4),
(10, 'Betametason ', 'tablet', 'Dewasa', 20000, 60, 'Betametason bisa digunakan untuk mengatasi berbagai kondisi, seperti penyakit artritis, lupus, psoriasis, kolitis ulseratif, asma dan mengobati kanker tertentu. Obat ini bekerja dengan cara mencegah terlepasnya senyawa kimia oleh tubuh yang bisa menyebabkan peradangan.', 'betamethasone.jpg', 104, 2),
(11, 'Misoprostol', 'tablet', 'Dewasa', 12000, 15, 'Misoprostol adalah obat yang digunakan untuk mencegah dan mengobati tukak lambung. Selain itu, obat ini juga dapat mencegah terjadinya tukak pada usus halus.', 'misoprostol.jpg', 104, 1),
(12, 'Losartan', 'tablet', 'Remaja', 12000, 30, 'Losartan adalah kelompok obat antagonis angiotensin II yang memiliki fungsi utama untuk menurunkan tekanan darah tinggi atau hipertensi. ', 'losarta.jpg', 104, 2),
(14, 'Asam Mefenamat', 'tablet', 'Remaja', 10000, 20, 'Asam mefenamat adalah jenis obat untuk anti peradangan non steroid. Fungsinya ialah untuk mengurangi rasa sakit ringan, sakit menengah dan meredakan peradangan atau inflamasi. Sebagai contoh mengatasi rasa nyeri paska operasi, nyeri menstruasi dan artritis.', 'menefamat.jpg', 106, 3),
(15, 'Clindamycin', 'tablet', 'Dewasa', 12000, 20, 'Beberapa kondisi yang dapat ditangani oleh clindamycin di antaranya adalah infeksi pada sistem pencernaan, sendi dan tulang seperti osteomyelitis, darah, kulit, paru-paru, organ reproduksi wanita, serta infeksi pada organ-organ dalam lainnya.', 'CLINDAMICIN.jpg', 106, 2),
(16, 'Dexamethasone', 'tablet', 'Remaja', 2000, 30, 'Dexamethasone Harsen adalah obat anti inflamasi dan anti alergi yang sangat kuat. Sebagai perbandingan Dexamethasone 0.75 mg setara obat sbb: 25 mg Cortisone, 20 mg hydrocortisone, 5 mg prednisone, 5 mg prednisolone.', 'DEXAMETHASONE.jpg', 106, 2),
(17, 'Viostin', 'tablet', 'Remaja', 5000, 20, 'Obat penyakit sendi dan tulang', 'viostin.jpg', 104, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `kd_pasien` int(50) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `umur` int(50) NOT NULL,
  `telp` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`kd_pasien`, `nm_pasien`, `alamat`, `gender`, `umur`, `telp`, `username`, `password`) VALUES
(5, 'tria', 'Kota Batu', 'Laki-laki', 18, '826766683', 'tria', 'tria'),
(12, 'ahmad', 'Bantur', 'Laki-laki', 19, '2147483647', 'ahmad', 'ahmad'),
(13, 'sinta', 'karang ploso', 'Perempuan', 12, '826633', 'sinta', 'sinta'),
(14, 'jimmy', 'jimmy', 'Laki-laki', 12, '856237829', 'jimmy', 'jimmy'),
(15, 'lukman hakim', 'Ngujung Karang Ploso', 'Laki-laki', 18, '86522551', 'lukman', 'lukman'),
(16, 'risma', 'kota batu', 'Perempuan', 18, '856662321', 'risma', 'risma'),
(17, 'evi faradita', 'pujon MALANG', 'Perempuan', 17, '854272112', 'evi', 'evi'),
(18, 'renata', 'diran', 'Laki-laki', 19, '8672672', 'reno', 'erno'),
(19, 'zuzun', 'pujon sobo', 'Perempuan', 19, '2147483647', 'zuzun', 'zuzun'),
(20, 'dandy', 'Batu', 'Laki-laki', 20, '86526118', 'dandy', 'dandy'),
(21, 'adek tria', 'pujon malang', 'Laki-laki', 18, '856266524', 'adek', 'adek'),
(22, 'bambang', 'jl.imam bonjol', 'Laki-laki', 18, '85721826', 'bambang', 'bambang'),
(25, 'sasa', 'junggo', 'Perempuan', 17, '2147483647', 'sasa', 'sasa'),
(26, 'tegar', 'lampung', 'Laki-laki', 14, '2147483647', 'tegar', 'tegar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `no_bayar` int(50) NOT NULL,
  `kd_pasien` int(50) NOT NULL,
  `tglbyr` date NOT NULL,
  `jmlbyr` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`no_bayar`, `kd_pasien`, `tglbyr`, `jmlbyr`) VALUES
(30, 5, '2017-02-21', 80000),
(31, 5, '2017-02-21', 80000),
(32, 25, '2018-07-24', 60000),
(33, 26, '2018-11-06', 141000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `kd_plk` int(50) NOT NULL,
  `nm_plk` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`kd_plk`, `nm_plk`, `ket`, `image`) VALUES
(6, 'Poli Gigi', 'Bagi pasien yang menderita penyakit gigi dan mulut serta perawatan gigi seperti penambalan gigi dan pembersihan plak atau karang gigi bisa dilakukan di poli ini oleh dokter spesialis gigi.', 'gigi.JPG'),
(7, 'Poli Anak', 'Poli anak merupakan poli spesialis anak-anak yang melayani pemeriksaan pada anak-anak yang mengalami sakit maupun konsultasi dan penyediaan', 'anak.JPG'),
(8, 'Poli Mata', 'Dengan mengandalkan teknologi yang cangih kini poli mata sudah ada', 'mata.jpg'),
(9, 'Poli Tulang', 'Poli yang di khususkan untuk penderita sakit tulang', 'tulang.jpg'),
(10, 'Poli Umum', 'Tempat Poli untuk pasien penderita Penyakit secara umum', 'umum.jpg'),
(11, 'Poli THT', 'Di Poli THT ini tempat untuk membantu pasien yang memiliki penyakit Telinga Hidung dan Tenggorokan.  ', 'tht.jpg'),
(12, 'Poli Penyakit Dalam', 'Ditangani oleh dokter ahli penyakit dalam yang profesional dan berpengalaman dibidangnya serta ditunjang dengan fasilitas yang memadai sesuai dengan kebutuhan pasien, keluhan pasien mengenai penyakit dalam dapat ditangani dengan baik.', 'polidalam1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep`
--

CREATE TABLE `tb_resep` (
  `no_resep` int(50) NOT NULL,
  `tglresep` date NOT NULL,
  `kd_dokter` int(50) NOT NULL,
  `kd_pasien` int(50) NOT NULL,
  `kd_plk` int(50) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `bayar` int(50) NOT NULL,
  `kembali` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_resep`
--

INSERT INTO `tb_resep` (`no_resep`, `tglresep`, `kd_dokter`, `kd_pasien`, `kd_plk`, `totalharga`, `bayar`, `kembali`) VALUES
(60, '2017-02-21', 1, 5, 6, 80000, 900000, 820000),
(61, '2017-02-21', 1, 5, 6, 57000, 90000, 33000),
(62, '2018-07-24', 5, 25, 6, 60000, 170000, 0),
(63, '2018-11-06', 5, 26, 6, 141000, 141000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_apoteker`
--
ALTER TABLE `tb_apoteker`
  ADD PRIMARY KEY (`kd_apoteker`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`no_daftar`);

--
-- Indeks untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`no_resep`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`kd_dokter`);

--
-- Indeks untuk tabel `tb_list_resep`
--
ALTER TABLE `tb_list_resep`
  ADD PRIMARY KEY (`no_resep`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`no_bayar`);

--
-- Indeks untuk tabel `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`kd_plk`);

--
-- Indeks untuk tabel `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`no_resep`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_apoteker`
--
ALTER TABLE `tb_apoteker`
  MODIFY `kd_apoteker` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `kd` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `no_daftar` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `kd_dokter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `kd_obat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `kd_pasien` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `no_bayar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  MODIFY `kd_plk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `no_resep` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
