<?php
session_start();
if (!$_SESSION['login']) {
  echo "<script type='text/javascript'>
    alert('Maaf Anda harus Login Terlebih Dahulu!');
        window.location = '/login.php'
  </script>";
} else {
  include ('../config/koneksi.php');
  $user = new Database();
  $user = mysqli_query($user->koneksi,
  "SELECT * FROM users WHERE password ='$_SESSION[login]'");
  $user = mysqli_fetch_array($user);
?>
<!-- Header -->
<?php include('../layouts/includes/head.php'); ?>
<!-- End Header -->

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <!-- Navbar  -->
    <?php include('../layouts/includes/navbar.php'); ?>
    <!-- End Navbar -->

    <div class="app-body">
      <!-- Sidebar -->
      <?php include('../layouts/includes/sidebar.php'); ?>
      <!-- End Sidebar -->

      <!-- Main Content -->
      <main class="main">

      </main>
      <!-- End Main Content -->
    </div>
    
    <?php include('../layouts/includes/footer.php'); ?>
    <!-- CoreUI and necessary plugins-->
    <!-- Scripts -->
    <?php include('../layouts/includes/scripts.php'); ?>
    <!-- End Scripts -->
  </body>
</html>
<?php

}
?>