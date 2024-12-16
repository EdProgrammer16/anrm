<div class="page-header bg-gradient-dark position-relative m-3 border-radius-xl min-vh-50">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" style="height: 814px;">
        <div class="carousel-inner">
          <?php for( $i = 1; $i <= 8; $i++ ): ?>
            <div class="carousel-item <?php if( $i == 1 ){ echo 'active'; } ?>">
              <span class="mask bg-gradient-dark opacity-7"></span>
              <div class="container-fluid bg-transparent mt-n7 position-absolute">
                <div class="row">
                  <div class="col-md-4 col-sm-7 col-10 mx-auto text-center d-flex align-items-center justify-content-center" style="flex-direction: column;">
                    <img class="brand-img" height="850" width="950" src="<?= DIRIMG; ?>tplg.png" alt="<?= TITULO; ?>"/>
                    <h2 class="display-3 text-white fw-bold mt-n10">Seja bem vindo</h2>
                  </div>
                </div>
              </div>
              <img src="<?= DIRIMG; ?>hero-carousel/hero-carousel-<?= $i; ?>.jpg" class="d-block w-100" alt="Imagem_<?= $i; ?>">
            </div>
          <?php endfor; ?>
        </div>
      </div>
</div>
<div class="container-fluid px-5 my-6">
  <div class="card mt-n8 pb-5">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6 mx-auto text-center">
          <h2 class="text-success">Nossos Projectos</h2>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 mx-auto text-center">
          <p class="mt-6 mb-4 text-success h5">Projectos de Arquitectura</p>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/3.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/4.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/5.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/6.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/3.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Arquitetura/2.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 mx-auto text-center">
          <p class="mt-6 mb-4 text-success h5">Construção Civil e Fiscalização de obra</p>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c1-1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c1-2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c1-3.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c2-1.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c2-2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c2-3.jpeg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c1-2.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c1-3.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="235" src="<?= DIRIMG; ?>projectos/Construcao/c1-1.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- -------   START PRE-FOOTER 4 - title & description and input    -------- -->
      <div class="row mt-10">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h4 class="text-success">Comentários</h4>
              <p class="text-success mb-5">Dê o seu comentário.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 mx-auto text-end my-auto">
              <div class="row">
                <div class="col-lg-6 col-md-4 col-7">
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label">Seu Nome</label>
                    <input type="text" class="form-control" id="form_nome">
                  </div>
                </div>
                <div class="col-lg-6 col-md-4 col-7">
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label">Seu E-mail</label>
                    <input type="text" class="form-control" id="form_email">
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <div class="input-group input-group-dynamic">
                    <textarea class="form-control p-3" rows="2" placeholder="Seu Comentário" id="form_comentario" spellcheck="false"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col mt-3">
                  <button type="button" class="btn bg-gradient-success mb-0">Enviar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- -------   END PRE-FOOTER 4 - title & description and input    -------- -->
    </div>
  </div>
</div>