<div class="d-flex justify-content-center bg-dark">
    <div id="sosmed" class="align-items-center">
      <a href="#" class="mx-2 text-white"><span class="bi-facebook"></span></a>
      <a href="#" class="mx-2 text-white"><span class="bi-twitter"></span></a>
      <a href="#" class="mx-2 text-white"><span class="bi-instagram"></span></a>


    </div>
  </div>

  <div class="header d-flex py-3">
    <div id="header" class="container">
      <table>
        <tr>
          <td><img src="assets/img/Logo_Mekarsari.png" alt="Logo" height="60"></td>
          <td><strong>Desa Mekarsari</strong><br>Kabupaten Bogor</td>
        </tr>
      </table>
    </div>
  </div>
  <header id="navbar_top" class="header d-flex align-items-center bg-dark">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center">
      <div id="logo" class="container" style="display: none;">
        <table>
          <tr>
            <td><img src="assets/img/Logo_Mekarsari.png" alt="Logo" height="60"></td>
            <td class="text-white"><strong>Desa Mekarsari</strong><br>Kabupaten Bogor</td>
          </tr>
        </table>
      </div>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a id="beranda" href="../m-dig/" class="text-decoration-none text-white">Beranda</a></li>
          <li class="dropdown"><a href="#" class="text-decoration-none text-white"><span>Pemerintahan Desa</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="?page=view-post&id=MQ==" class="text-decoration-none">Visi dan Misi</a></li>
              <li><a href="?page=view-post&id=Mg==" class="text-decoration-none">Pemerintahan Desa</a></li>
              <li><a href="?page=view-post&id=Mw==" class="text-decoration-none">Badan Permusyawaratan Desa</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="text-decoration-none text-white"><span>Profil Desa</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="?page=view-post&id=NA==" class="text-decoration-none">Sejarah Desa</a></li>
              <li><a href="?page=view-post&id=NQ==" class="text-decoration-none">Profil Wilayah Desa</a></li>
              <li><a href="?page=view-post&id=Ng==" class="text-decoration-none">Arti Lambang Desa</a></li>
            </ul>
          </li>

          <li><a href="?page=gallery" class="text-decoration-none text-white">Galeri</a></li>
          <li><a href="dashboard/index.php?page=surat" class="text-decoration-none text-white">Surat Online</a></li>
          <li><a href="dashboard" class="text-decoration-none text-white">Login</a></li>
          
        </ul>
      </nav><!-- .navbar -->
      <div class="position-relative bg-dark">
        <div class="align-items-center">
    
          <a href="#" class="mx-2 js-search-open text-white"><span class="bi-search"></span></a>
          <i class="bi bi-list mobile-nav-toggle"></i>
    
          <!-- ======= Search Form ======= -->
          <div class="search-form-wrap js-search-form-wrap">
            <form method="POST" class="search-form">
              <span class="icon bi-search"></span>
              <input type="text" placeholder="Search" class="form-control" name="search">
              <button type="submit" name="searchbtn" style="visibility: hidden;"></button>
              <button class="btn js-search-close"><span class="bi-x"></span></button>
            </form>
          </div>
          <!-- End Search Form -->
    
        </div>
      </div>
      

    </div>

  </header>

  <?php 

  if (isset($_POST['searchbtn'])) {
    ?>
    <script type="text/javascript">
      window.location.href="?search=<?= $_POST['search']; ?>"
    </script>
    <?php
  }
   ?> 