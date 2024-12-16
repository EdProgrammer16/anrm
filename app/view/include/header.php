<?php
  $endpoint_array = str_split($_GET['url']);
  $endpoint = '';
  foreach($endpoint_array as $key => $value){
    if($value == '/') {
      break;
    }
    $endpoint .= $value;
  }
  function activate( $endpoint, $search ) 
  {if($endpoint == $search){echo 'active';}}
?>
<header id="header" class="fixed-top ">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0 text-uppercase"><a href="<?= DIRPAGE; ?>">Topofly<span style="display: block;padding-left: 20px;color: #46ae4e;">Academy</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->

          <nav id="navbar" class="navbar order-last order-lg-0 ms-auto">
            <ul>
              <li><a class="nav-link scrollto <?= activate( $endpoint, ''          ); ?>" href="<?= DIRPAGE; ?>">Cursos e Treinamentos</a></li>
              <li><a class="nav-link scrollto <?= activate( $endpoint, 'quemsomos' ); ?>" href="<?= DIRPAGE; ?>quemsomos">Quem Somos</a></li>
              <li><a class="nav-link scrollto <?= activate( $endpoint, 'contactos' ); ?>" href="<?= DIRPAGE; ?>contactos">Contactos</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          <a href="https://wa.me/+244929554855" target="_blank" class="get-started-btn scrollto ms-auto"><i class="bx bxl-whatsapp"></i> Whatsapp</a>
          <?php
          if(isset($params['usuario'])){
            echo '<a href="'.DIRPAGE.'inscrito/perfil" class="btn btn-outline-secondary rounded-5 ms-3"><i class="bx bx-user"></i> '.$params['usuario']['username'].'</a>';
            echo '<a href="'.DIRPAGE.'logout" class="btn btn-outline-danger rounded-5 ms-3">Sair</a>';
          }else {
            echo '<a href="'.DIRPAGE.'login" class="btn btn-secondary rounded-5 ms-3"><i class="bx bx-user"></i> Login</a>';
          }
          ?>
        </div>
      </div>
    </div>
</header><!-- End Header -->
