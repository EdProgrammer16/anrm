<!-- ======= Hero Section ======= -->
<section id="hero2" class="d-flex flex-column justify-content-center bg-slide">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>Nossos Cursos e Treinamentos</h1>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Cursos e Treinamentos</h2>
        </div>

        <div class="row">
          <?php
          
            $file = file_get_contents(DIRREQ.'app/json/servicos.json');
            $data = json_decode($file, 1);
            $data_key = array_keys($data);
            $i = 0;
            // echo "<pre>";var_dump($data);echo "</pre>";
            foreach($data as $key):
          ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
            <a href="<?= DIRPAGE; ?>cursos/tipo/<?= $data_key[$i]?>" class="icon-box" style="padding-bottom: 10px;display: flex;flex-direction: column;">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="text-dark"><?= $key['titulo']?></h4>
              <p class="text-justify text-dark mb-3"><?= $key['conteudo']?></p>
              <div class="text-end mt-auto">
                <button class="btn border-0 border-end border-bottom border-success mt-auto">Inscrever-me</button>
              </div>
            </a>
          </div>
          <?php $i++; endforeach; ?>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Contrate Qualidade</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a href="https://wa.me/+244929554855" target="_blank" class="cta-btn align-middle"><i class="bx bxl-whatsapp"></i> Whatsapp</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Faq Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3><strong>Perguntas</strong> Mais Frequentes </h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("<?= DIRIMG; ?>faq.jpg");'>&nbsp;</div>
        </div>

      </div>
    </section><!-- End Faq Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Localize-nos</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.0638441760566!2d13.26756757485738!3d-8.925982991131281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f79d883ede31%3A0x577f145c670225ac!2sTOPOFLY%2C%20LDA!5e1!3m2!1spt-PT!2sao!4v1718208821528!5m2!1spt-PT!2sao" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info mt-5">
              <div class="address">
                <i class="ri-map-pin-line"></i>
                <h4>Localização:</h4>
                <p>Província de Luanda, município do Talatona, distrito urbano da Cidade Universitária, bairro da Camama – Junto ao Centro comercial Multicenter</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="info">
              <div class="email">
                <i class="ri-mail-line"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="info">
              <div class="phone">
                <i class="ri-phone-line"></i>
                <h4>Telefone:</h4>
                <p>+244 929 554 855</p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->