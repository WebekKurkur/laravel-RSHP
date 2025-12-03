<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Praktikum 1 - Visi Misi</title>
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
        <h1>Visi Misi dan Tujuan</h1>
    </main>
    <ul>
            <li><h3>Visi</h3>
                <ul>
                    <li>Menjadi pusat rujukan rumah sakit hewan pendidikan terkemuka di Indonesia yang unggul dalam pelayanan kesehatan hewan,
                        pendidikan veteriner, dan penelitian berbasis inovasi untuk kesejahteraan hewan dan masyarakat.</li>
                </ul>
            </li>
        </ul>
        <ul>
            <li><h3>Misi</h3>
                <ol>
                    <li>Memberikan pelayanan kesehatan hewan yang profesional, berkualitas, dan berbasis bukti (evidence-based veterinary medicine) untuk berbagai jenis hewan.</li>
                    <li>Menyelenggarakan pendidikan dan pelatihan bagi mahasiswa, tenaga medis veteriner, dan masyarakat dalam bidang kesehatan hewan.</li>
                    <li>Melaksanakan penelitian dan inovasi di bidang kedokteran hewan untuk mendukung perkembangan ilmu pengetahuan dan teknologi veteriner.</li>
                    <li>Meningkatkan kesadaran masyarakat terhadap pentingnya kesejahteraan hewan dan kesehatan lingkungan.</li>
                    <li>Menjalin kemitraan strategis dengan instansi pemerintah, swasta, dan komunitas pecinta hewan untuk memperluas layanan dan pengabdian.</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li><h3>Tujuan</h3>
                <ol>
                    <li>Memberikan pelayanan kesehatan hewan yang optimal dan berkelanjutan.</li>
                    <li>Meningkatkan kualitas pendidikan dan pelatihan di bidang kesehatan hewan.</li>
                    <li>Melakukan penelitian yang bermanfaat bagi pengembangan ilmu kedokteran hewan.</li>
                    <li>Menjadi pusat informasi dan rujukan di bidang kesehatan hewan.</li>
                    <li>Berperan aktif dalam kegiatan pengabdian kepada masyarakat.</li>
                </ol>
            </li>
        </ul>
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
