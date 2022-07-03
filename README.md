# Aplikasi Perpustakaan Berbasis Web
  Aplikasi perpustakaan berbasis web ini adalah aplikasi yang digunakan sebagai admin dan petugas yang memiliki fitur Beranda, tambah data, Data peminjam dan Notifikasi, pada tambah data dan data peminjam dapat melakukan interaksi CRUD kepada database melalui website.
Penjelasan Singkat
Web Perpustakaan ini dibuat untuk mengelola perpustakaan dimana Admin dan petugas dapat terbantu dalam mengelola peminjam dan buku dan dengan adanya sistem pewncatatan tanggal peminjaman secara otomatis dan pencatatan tanggal pengembalian dapat secara otomatis dengan menekan tombol confirm. Pada Saat meminjam, petugas membutuhkan 6 data :
1.	Judul buku yang akan dipinjam
2.	Nama peminjam
3.	No. KTP
4.	Alamat Lengkap
5.	Jenis Kelamin
6.	No.Telepon

# Fungsionalitas
Admin 
-	Dapat menambahkan data peminjam buku.
-	Dapat melihat data detail dari peminjam buku.
-	Dapat melakukan update data peminjam buku.
-	Dapat menghapus data peminjam buku.
-	Dapat mengirimkan pesan notifikasi kepada petugas.
Petugas
-	Dapat menambahkan data peminjam buku.
-	Dapat melihat data peminjaman.
-	Dapat melakukan confirm pengembalian buku.
-	Dapat melihat notifikasi pesan dari admin.

# Tampilan Web
Tampilan Admin
-	Tampilan Beranda
-	Tampilan Tambah Data
-	Tampilan Data Peminjaman
-	Tampilan Update Data
-	Tampilan Detail Peserta
-	Tampilan Pengiriman Pesan/Notifikasi
-	Tampilan pop-up notifikasi
Tampilan Petugas
-	Tampilan Beranda
-	Tampilan Tambah Data
-	Tampilan Data Peminjaman
-	Tampilan Pop-up Notifikasi

# Penjelasan Kodingan

Penjelasan kodingan CRUD

<h3>Create</h3>
Pada kodingan dibawah adalah kodingan sql didalam file create.php untuk memasukan data yang di input ke dalam tabel pinjam dan setelah itu kembali lagi ke beranda masing masing

![1](https://user-images.githubusercontent.com/76039896/177036715-43f282c7-14fa-430e-88a5-df1bf20d01e0.PNG)

<h3>Update</h3>
Pada kodingan dibawah adalah kodingan dalam file update.php. Pada gambar 1 menampilkan kodingan sql untuk memasukan data baru kedalam tabel pinjam dengan id_pinjam tertentu dimana id_didapat dari barisan id yang di jabarkan pada halaman list data peminjam. Lalu gambar 2 menampilkan kodingan untuk menampilkan menu form isi yang isiannya sudah di isi dari data yang di dapat dari barisan ayng dijabarkan pada halaman list data peminjam

![2](https://user-images.githubusercontent.com/76039896/177036813-71de3fbc-0a0d-489d-8982-4e1c3faa57cf.PNG)
![3](https://user-images.githubusercontent.com/76039896/177036831-14dba7c4-462b-4c3a-9116-9978890753ec.PNG)


<h3>Read</h3>
Pada kodingan dibawah adalah kodingan dalam file detail.php. Pada gambar 1 menampilkan kodingan sql untuk mencari record dengan id tertentu yang querynya dimasukan kedalam variable penampung. Lalu gambar 2 menampilkan kodingan untuk menampilkan menu form detail yang datanya sudah di isi dari data yang diambil dari variabel penampung tadi.

![4](https://user-images.githubusercontent.com/76039896/177036837-1a7c849b-cd33-450e-9120-1579166a66e3.PNG)
![5](https://user-images.githubusercontent.com/76039896/177036846-9dd2dc55-e097-4010-84e5-6a3a0b42c899.PNG)


<h3>Delete</h3>
Pada kodingan dibawah adalah kodingan dalam file delete.php. Yang menampilkan kodingan sql untuk mencari menghapus data dengan id tertentu yang querynya dimasukan kedalam variable penampung.

![6](https://user-images.githubusercontent.com/76039896/177037096-51e443e6-19ca-4a62-a35b-12d3197c1434.PNG)

<h3>Notifikasi</h3>

Script dibawah ini berguna untuk mengambil data dari database dan menampilkannya untuk petugas, dengan function load_unseen_notification menggunakan ajax untuk mengambil data dengan fetch.php, metode yang digunakan untuk menampilkan kelayar adalah POST dan untuk tampilannya digunakan data view type json.

Untuk fungsi ketika button notification pada bagian petugas ditekan, setelah ajax melakukan fetch, akan dilakukan pemasukan data seen, dengan disambungkan dengan addnew.php kemudian data seen akan masuk ke dalam database notifikasi dan data total seen akan bertambah 1.

Dalam database notifikasi ini terdapat 2 tabel yaitu, tabel admin dan tabel petugas, ketika petugas mengirimkan pesan notifikasi maka tabel admin dan tabel petugas akan diisi oleh pesan tersebut sehingga ketika dilakukan perintah dari fetch.php, perintah tersebut akan membaca siapa yang membuka notifikasi tersebut admin atau petugas, dan status readnya akan diupdate kedalam tabel yang bersangkutan.

![image](https://user-images.githubusercontent.com/108450178/177037842-2667dd8f-d92a-4239-b565-52eae4d67c3a.png)
![image](https://user-images.githubusercontent.com/108450178/177037859-bd9e7892-ca17-43ba-b14e-679a4f8663a5.png)

Alur Pengiriman Notifikasi
1. Pesan dibuat oleh admin pada bagian notifikasi, setelah pesan dibuat, admin akan klik submit dan pesan akan masuk kedalam database notifikasi.
2. Pada bagian petugas, akan terlihat pada bagian tombol icon bumi dengan angka 1, terlihat bahwa ada pesan yang belum terbaca.
3. Ketika Petugas menekan tombol icon tersebut, maka akan terlihat pesan dan status di dalam database tersebut akan berubah.


# Tampilan WEB

Tampilan Login
 
![image](https://user-images.githubusercontent.com/76039896/177036055-363968a2-1520-4259-b4ba-c5ae550ece7a.png)

Tampilan Beranda Admin
 
 ![image](https://user-images.githubusercontent.com/76039896/177036058-7d963cb3-2ffc-409b-8a34-3145f93ba4d5.png)

Tampilan Tambah Data
 
![image](https://user-images.githubusercontent.com/76039896/177036066-d2b488d0-fb3d-41bf-8cd0-5efaf8e2f8f5.png)

Tampilan Data Peminjaman (Admin)
 
 ![image](https://user-images.githubusercontent.com/76039896/177036068-7ba7d156-e9ad-4fcb-9faa-d36e44d7e6c4.png)

Tampilan Detail Pelanggan (Admin)
 
 ![image](https://user-images.githubusercontent.com/76039896/177036072-92ad8b6e-437d-424c-853d-38f293ddfe54.png)
 
Tampilan Update Data Peserta (Admin)
 
 ![image](https://user-images.githubusercontent.com/76039896/177036077-2e305cc8-894a-4eea-b998-8a3033e8a73f.png)

Tampilan Notifikasi (Admin)
 
 ![image](https://user-images.githubusercontent.com/76039896/177036081-4d509ff5-57f0-41e6-9d63-a6a8ce113033.png)

Tampilan Kirim Pesan Notifikasi (Admin)

![image](https://user-images.githubusercontent.com/76039896/177036084-f3108745-6fe1-4868-9967-cd1ce8ea14df.png)
 
Tampilan Pop-Up Notifikasi
 
 ![image](https://user-images.githubusercontent.com/76039896/177036090-01af5f2f-0a1a-44a5-b479-57abff220617.png)

Tampilan Data Peminjaman (Petugas)
 
 ![image](https://user-images.githubusercontent.com/76039896/177036093-3d927916-73c6-4180-94d8-05ed4eca1ed2.png)

