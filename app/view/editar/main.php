<!-- ======= Hero Section ======= -->
<section id="hero2" class="d-flex flex-column justify-content-center" style="background-image: url(<?= DIRIMG; ?>/projetos/1.jpg);background-position-y: 100%;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <h1>Secção de Edição do Inscrito</h1>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main" class="my-5">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-12 text-end">
            <button class="btn btn-outline-success rounded-5">Baixar Boletim</button>
            <a href="<?= DIRPAGE; ?>inscrito/editar" class="btn btn-success rounded-5">Editar Dados</a>
          </div>
        </div>
        <div class="section-title">
          <h2>Ficha de Inscrição</h2>
        </div>
      </div>
      <div class="container mb-5">
        <div class="row mt-5">
          <div class="col-lg-6 mt-5 mt-lg-0 mx-auto">
            <form action="<?= DIRPAGE.$_GET['url']; ?>" method="post" role="form" class="php-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nome" class="form-control" id="name" placeholder="Nome" value="<?= $params['usuario']['nome']; ?>" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="<?= $params['usuario']['sobrenome']; ?>" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Nomde de Usuário" value="<?= $params['usuario']['username']; ?>" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" name="bi" class="form-control" id="bi" placeholder="B.I / Passaporte" value="<?= $params['usuario']['identidade']; ?>" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?= $params['usuario']['email']; ?>" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" name="tel" class="form-control" id="tel" placeholder="Telemovél" value="<?= $params['usuario']['tel']; ?>" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço (Opcional)" value="<?= $params['usuario']['endereco']; ?>" required>
              </div>
              <div class="form-group mt-3">
                <h4>Como deseja fazer o Pagamento?</h4>
                <label class="me-3">
                  <span style="display: inline-block;position:relative; top: -15px">Pagamento Por Transferência</span>
                  <input type="radio" name="pay_form" id="pay_form" value="transferencia" <?php if($params['usuario']['pagamento'] == 'transferencia') echo 'checked';?> required>
                </label>
                <label>
                  <span style="display: inline-block;position:relative; top: -15px">Pagamento Fisico</span>
                  <input type="radio" name="pay_form" id="pay_form" value="fisico" <?php if($params['usuario']['pagamento'] == 'fisico') echo 'checked';?> required> 
                </label>
              </div>
              <div class="text-center"><button name="confirmar" type="submit">Confirmar</button></div>
            </form>

          </div>

        </div>

      </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->