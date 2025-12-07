<!DOCTYPE html>
<html>
  <head>
    <title>Praktikum 1</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Schibsted+Grotesk:ital,wght@0,400..900;1,400..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar">
  <ul>
   <li><a href="{{ route('site.home') }}">Home</a></li>
   <li><a href="{{ route('site.struktur') }}">Struktur Organisasi</a></li>
   <li><a href="{{ route('site.layanan') }}">Layanan Umum</a></li>
   <li><a href="{{ route('site.visi') }}">Visi-Misi dan Tujuan</a></li>
   <li><a href="{{ route('login') }}">login</a></li>
  </ul>
 </nav>

    <!--main-->
    <div class="container">
      <!--header image-->
      <img
        src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
        alt="header image"
        width="100%"
      />
      <main>
        <h1>Selamat datang di Homepage Kami</h1>
        <p>Ini adalah homepage dari RSHP Universitas Airlangga.</p>
        <!--container tengah bagi 2: kanan-kiri-->
      </main>
      <div class="mid-container">
        <div class="left-container">
          <a href="#" class="button top-button">Pendaftaran Online</a>
          <p class="description">
            Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk
            selalu meningkatkan kualitas pelayanan, maka dari itu Rumah Sakit
            Hewan Pendidikan Universitas Airlangga mempunyai fitur pendaftaran
            online yang mempermudah untuk mendaftarkan hewan kesayangan anda
          </p>
          <a href="#" class="button bot-button">Informasi Lainnya</a>
        </div>
        <div class="right-container">
          <div class="video-container">
            <iframe
              src="https://www.youtube.com/embed/rCfvZPECZvE"
              title="Youtube Video Player"
            ></iframe>
          </div>
        </div>
      </div>
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
