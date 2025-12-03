<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Praktikum 1 - Layanan</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Schibsted+Grotesk:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    </head>
    <body>

    <!--navbar-->
    <nav class="navbar">
  <ul>
   <li><a href="{{ route('site.home') }}">Home</a></li>
   <li><a href="{{ route('site.struktur') }}">Struktur Organisasi</a></li>
   <li><a href="{{ route('site.layanan') }}">Layanan Umum</a></li>
   <li><a href="{{ route('site.visi') }}">Visi-Misi dan Tujuan</a></li>
   <li><a href="#">login</a></li>
  </ul>
 </nav>

    <!--main-->
    <div class="container">
    <main>
        <h1>Layanan Umum</h1>
    </main>
    <p>Rumah Sakit Hewan Pendidikan Universitas Airlangga melakukan layanan-layanan, baik atas kehendak klien atau rujukan dokter hewan praktisi sebagai berikut:</p>
        <h1>Poliklinik</h1>
        <p> Poliklinik adalah layanan rawat jalan dimana pelayanan kesehatan hewan dilakukan tanpa pasien menginap.
            Poliklinik melayani tindakan observasi, diagnosis, pengobatan, rehabilitasi medik, 
            serta pelayanan kesehatan lainnya seperti permintaan surat keterangan sehat. Tindakan observasi dan diagnosis, 
            juga bisa diteguhkan dengan berbagai macam pemeriksaan yang bisa kami lakukan, 
            misalnya pemeriksaan sitologi, dermatologi, hematologi, atau pemeriksaan radiologi, ultrasonografi, bahkan pemeriksaan elektrokardiografi. 
            Bilamana diperlukan pemeriksaan-pemeriksaan lain yang diperlukan seperti pemeriksaan kultur bakteri, atau pemeriksaan jaringan/histopatologi, 
            dan lain-lain kami bekerja sama dengan Fakultas Kedokteran Hewan Universitas Airlangga untuk membantu melakukan pemeriksaan-pemeriksaan tersebut. 
            Selain itu kami mempunyai rapid test untuk pemeriksaan cepat, untuk meneguhkan diagnosa penyakit-penyakit berbahaya pada kucing seperti panleukopenia, 
            calicivirus, rhinotracheitis, FIP, dan pada anjing seperti parvovirus, canine distemper.</p>
        <p>Layanan kesehatan hewan di poliklinik yang kami lakukan antara lain:</p>
        <ul>
            <li>Rawat jalan</li>
            <li>Vaksinasi</li>
            <li>Akupuntur</li>
            <li>Kemoterapi</li>
            <li>Fisioterapi</li>
            <li>Manditerapi</li>
        </ul>
        <h1>Rawat Inap</h1>
        <p>Rawat inap dilakukan pada pasien-pasien yang berat atau parah dan membutuhkan perawatan intensif. 
            Pasien akan diobservasi dan mendapat perawatan intensif dibawah pengawasan dokter dan paramedis yang handal. 
            Sebelum rawat inap, klien wajib mengisi inform konsen yang artinya klien telah diberi penjelasan yang detail tentang kondisi 
            penyakit pasien dan menyetujui rencana terapi yang akan dijalankan sepengetahuan klien. Klien juga diberitahu biaya yang dibebankan untuk semua layanan.
            RSHP menerima pembayaran tunai maupun kartu debit bank.</p>
        <h1>Bedah</h1>
        <ul>
            <li><h3>Tindakan Bedah Minor</h3>
                <ul>
                    <li>Jahit luka</li>
                    <li>Kastrasi</li>
                    <li>Othematoma</li>
                    <li>Scaling - root planning</li>
                    <li>Ekstraksi gigi</li>
                </ul>
            </li>
            <li><h3>Tindakan Bedah Mayor</h3>
                <ul>
                    <li>Gastrotomi; Entrotomi; Enterektomi; Salivary mucocele</li>
                    <li>Ovariohisterektomi; Sectio caesar; Piometra</li>
                    <li>Sistotomi; Urethrostomi</li>
                    <li>Hernia diafragmatika </li>
                    <li>Hernia perinealis</li>
                    <li>Hernia inguinalis</li>
                    <li>Eksisi tumor</li>
                </ul>
            </li>
        </ul>
        <h1>Pemeriksaan</h1>
        <ul>
            <li>pemeriksaan sitologi</li>
            <li>Pemeriksaan Dermatologi</li>
            <li>Pemeriksaan Hematologi</li>
            <li>Pemeriksaan Radiografi</li>
            <li>Pemeriksaan Ultrasonografi</li>
        </ul>
        <p>Selain layanan medis, Rumah Sakit Hewan Pendidikan Universitas Airlangga juga melayani grooming pada hewan kesayangan.</p>
    </div>

    <!-- Footer -->
    <footer>
      <div class="footer-content">
        <div class="footer-left">
          <p>Copyright 2024 Universitas Airlangga. All Rights Reserved</p>
        </div>
        <div class="footer-right">
          <h4>RUMAH SAKIT HEWAN PENDIDIKAN</h4>
          <p>GEDUNG RS HEWAN PENDIDIKAN</p>
          <p>rshp@fkh.unair.ac.id</p>
          <p>Telp: 031 3927832</p>
          <p>Kampus C Universitas Airlangga</p>
          <p>Surabaya 60115, Jawa Timur</p>
        </div>
      </div>
    </footer>

    </body>
</html>
