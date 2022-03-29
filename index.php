<?php
require_once 'controller/dbc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog - DentOS</title>
  <meta content="DentOS" name="description">
  <meta content="DentOS" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/modal.css" rel="stylesheet">
</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid rounded-top"></a>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link  active" href="index.php">Blog</a></li>
              <li><a class="nav-link" href="login.php">Iniciar sesión</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Inicio</a></li>
        </ol>
        <h2>Blogs destacados</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <?php foreach ($DB->query('SELECT * FROM blog LIMIT 3') as $row ){  ?> 
              <article class="entry">
                <div class="entry-img">
                  <img src="assets/img/blog/blog-<?php echo $row['id']; ?>.jpg" alt="" class="img-fluid rounded-top">
                </div>
                <h2 class="entry-title">
                  <a href="ver-blog.php?/=<?php echo $row['id']; ?>"> <?php echo $row['titulo'] ?></a>
                </h2>
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="ver-blog.php?/=<?php echo $row['id']; ?>"><?php echo $row['creado_por'] ?></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="ver-blog.php?/=<?php echo $row['id']; ?>"><time datetime="<?php echo $row['fecha'] ?>"><?php echo $row['fecha'] ?></time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="ver-blog.php?/=<?php echo $row['id']; ?>">0 comentarios</a></li>
                  </ul>
                </div>
                <div class="entry-content">
                  <p>
                    <?php echo $row['descripcion'] ?>
                  </p>
                  <div class="read-more">
                    <a href="ver-blog.php?/=<?php echo $row['id']; ?>">Leer más</a>
                  </div>
                </div>
              </article>
              <?php
            }
            ?>
          </div><!-- End blog entries list -->
          <div class="col-lg-4">
            <div class="sidebar">
              <h3 class="sidebar-title">Buscar por fecha</h3>
              <div class="sidebar-item">
                <div class="sidebar-item tags">
                  <ul>
                    <li><a href="#" id="myBtn">Buscar</a></li>
                  </ul> 
                </div>
              </div><!-- End sidebar search formn-->
              <h3 class="sidebar-title">Categorias</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php foreach ($DB->query('SELECT DISTINCT categoria FROM blog') as $row ){  ?> 
                    <li>
                      <a href="categoria.php?/=<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
              </div><!-- End sidebar Categorias-->

              <h3 class="sidebar-title">Posts recientes
              </h3>
              <div class="sidebar-item recent-posts">
                <?php foreach ($DB->query('SELECT * FROM blog  ORDER BY fecha DESC LIMIT 10') as $row ){  ?> 
                  <div class="post-item clearfix">
                    <img src="assets/img/blog/blog-recent-<?php echo $row['id']; ?>.jpg" alt="">
                    <h4><a href="ver-blog.php?/=<?php echo $row['id']; ?>"><?php echo $row['titulo']; ?></a></h4>
                    <time datetime="<?php echo $row['fecha']; ?>"><?php echo $row['fecha']; ?></time>
                  </div>
                  <?php
                }
                ?>
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->
            </div><!-- End sidebar -->
          </div><!-- End blog sidebar -->
        </div>
      </div>
    </section>
  </main>

  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Jefferson DM</strong>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!--modall -->
  <div id="mymodall" class="modall">
    <div class="modall-content">
      <div class="modall-header">
        <span class="close">&times;</span>
        <h2>Buscar por fechas</h2>
      </div>
      <div class="modall-body"><br>
        <p>Lista de fechas disponibles</p>
        <?php foreach ($DB->query('SELECT DISTINCT fecha FROM blog ORDER BY fecha') as $row ){  ?> 
          <li><a href="busqueda.php?/=<?php echo $row['fecha']; ?>"><?php echo $row['fecha']; ?></a></li>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="js/modal.js"></script>
</body>
</html>