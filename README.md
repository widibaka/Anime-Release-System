# Anime-Management-For-Fansub-Team
Project PHP untuk menata rilisan Anime yang berguna untuk para telur Fansub yang ingin mulai berkarya. Dikembangkan dari [Xyli Release System v2.0.0]
Cara Install: Upload di hosting kamu, jalankan dan install otomatis.

Sumber Awal: http://xylireleasesystem.free.fr

Instalasi gagal atau sudah berhasil tapi tidak terjadi apa-apa? Tenang, jangan buru-buru putus asa. Kamu masih punya harapan kok. Caranya dengan membuat file konfigurasi secara manual. Pertama, copy-paste script berikut:

====================================================================================

<?php
//Oh iya, jangan lupa buat dulu database di PhpMyAdmin sebelum mulai install ya :)
defined('CORE') or defined('CORE_ACP') or exit;

define('CONFIG', true);

$config['team'] = 'NamaFansub'; //-- Isi nama fansub
$config['pass'] = 'Password'; //-- password untuk control panel
$config['accro'] = 'AkronimFansub'; //--  Akronim...ini enggak penting tapi wajib diisi :D

$config['path'] = 'http://ALAMAT_Situs_kamu.com'; // Alamat situs kamu

$config['cracksparpage'] = 20;

$dbhost = 'localhost'; //-- Host
$dbuser = 'root'; //-- user database
$dbpass = 'root'; //--  password database
$dbname = 'nama-database-kamu'; //-- nama database yang sudah kamu buat sebelumnya

$db_link = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);


====================================================================================

Copy-paste script di atas ke dalam text-editor yang memiliki fitur Syntax Hilight(Notepad++, Atom, dan lain-lain), supaya bagian komentar yang saya buat kelihatan. 

Nah, isilah dan sesuaikan seperti petunjuk yang ada di situ.

Selanjutnya, simpan script yang sudah kamu edit tadi ke directory sehingga bersandingan dengan file bernama "index.php".

Instalasi selesai. Selamat Ngesub!! :v


