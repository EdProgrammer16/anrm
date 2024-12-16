<!-- ======= Hero Section ======= -->
<section id="hero2" class="d-flex flex-column justify-content-center h-100" style="background-image: url(<?= DIRIMG; ?>/projetos/1.jpg);background-position-y: 100%;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <h1>Faça Login</h1>
      </div>
    </div>
  </div>
  <div class="container mb-5">
    <div class="row mt-5">
      <div class="col-lg-6 mt-5 mt-lg-0 mx-auto">
        <form action="<?= DIRPAGE ?>login/auth/inscrito" method="post" role="form" class="php-form">
              <div class="row">
                <div class="col-md-6 form-group mx-auto">
                  <input type="text" name="username" class="form-control <?php if(isset($param['erro']) && $param['erro'] == 'usuario'){echo 'border-danger';}else{echo 'border-0';}?>" style="background-color: rgba(255, 255, 255, .7);" id="username" placeholder="Nome de Usuário" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group mx-auto">
                  <input type="password" class="form-control <?php if(isset($param['erro']) && $param['erro'] == 'password'){echo 'border-danger';}else{echo 'border-0';}?>" style="background-color: rgba(255, 255, 255, .7);" name="password" id="password" placeholder="Palavra-Passe" required>
                </div>
              </div>
              <div class="text-center mt-5"><button class="btn btn-success rounded-5" name="login_me" type="submit">Fazer Login</button></div>
              <div class="text-center mt-5"><a href="<?= DIRPAGE; ?>login/admin" class="btn btn-sm btn-outline-secondary text-white rounded-5">Logar Como Admin</a></div>
        </form>
      </div>
    </div>
  </div>
</section><!-- End Hero -->