<!-- ======= Hero Section ======= -->
<section id="hero2" class="d-flex flex-column justify-content-center" style="background-image: url(<?= DIRIMG; ?>/projetos/11.jpg);background-position-y: 100%;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <h1>Carregue o Comprovante</h1>
        <form class="php-form" action="<?= DIRPAGE.$_GET['url']; ?>" method="post" enctype="multipart/form-data">
          <input type="file" name="comprovante" id="comprovante" hidden />
          <label class="btn btn-secondary py-3 px-5 rounded-5" for="comprovante"><h4>Carregar Arquivo</h4></label>
          <div class="w-100 mt-5"></div>
          <button type="submit" name="btn_comprovante" class="btn btn-success p-2 btn-lg">Continuar</button>
        </form>
      </div>
    </div>
  </div>
 </section><!-- End Hero -->

<main id="main" class="my-5 d-none">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-12 text-end">
            <button class="btn btn-success">Baixar Boletim</button>
          </div>
        </div>
        <div class="section-title">
          <h2>Boletim N° <?= $params['inscrito']['serie_num']; ?></h2>
        </div>
      </div>
      <div class="container mb-5">
        <div class="row mt-5">
          <div class="col-lg-4 mx-auto">
            <div class="info">
              <div class="address">
                <i class="ri-user-line"></i>
                <h4><?= $params['inscrito']['nome'].' '.$params['inscrito']['sobrenome']; ?></h4>
                <p><?= $params['inscrito']['username']; ?></p>
              </div>

              <div class="email">
                <i class="ri-mail-line"></i>
                <h4><?= $params['inscrito']['email']; ?></h4>
                <p><?= $params['inscrito']['endereco']; ?></p>
              </div>

              <div class="phone">
                <i class="ri-phone-line"></i>
                <h4><?= $params['inscrito']['tel']; ?></h4>
                <p><?= $params['inscrito']['identidade']; ?></p>
              </div>

              <div class="phone">
                <i class="ri-graduation-cap-line"></i>
                <h4><?= $params['curso'] ?></h4>
                <p><?php 
                switch($params['inscrito']['pagamento']){
                  case 'fisico':
                    echo "Pagamento no Balcão";
                    break;

                  case 'transferencia':
                    echo "Pagamento Por Transferência Efetuada";
                    break;

                  default:
                  echo "Pagamento no Balcão";
                }
                ?></p>
              </div>
            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0 d-none">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
      <div class="mt-5">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.0638441760566!2d13.26756757485738!3d-8.925982991131281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f79d883ede31%3A0x577f145c670225ac!2sTOPOFLY%2C%20LDA!5e1!3m2!1spt-PT!2sao!4v1718208821528!5m2!1spt-PT!2sao" frameborder="0" allowfullscreen></iframe>
      </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->