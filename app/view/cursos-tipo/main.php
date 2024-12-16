<?php
          
          $file = file_get_contents(DIRREQ.'app/json/detalhes.json');
          $data = json_decode($file, 1);
          $data_key = array_keys($data);
          $i = 0;
          // echo "<pre>";var_dump($data);echo "</pre>";
          $url = explode('/', $_SERVER['REDIRECT_QUERY_STRING']);
          $url = $url[(count($url) - 1)];
          if(!isset($data['p'.$url])){
            $data['p'.$url]['titulo'] = "Sem Dados Do Curso";
          }
        ?>
<!-- ======= Hero Section ======= -->
<section id="hero2" class="d-flex flex-column justify-content-center bg-slide">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1><?= $data['p'.$url]['titulo']; ?></h1>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?= DIRPAGE; ?>servicos">cursos</a></li>
          <li><?= $data['p'.$url]['titulo']; ?></li>
        </ol>
        <div class="row">
              <div class="col-auto">
                <h2><?= $data['p'.$url]['titulo']; ?></h2>
              </div>
              <div class="col text-end">
                <a href="<?= DIRPAGE; ?>inscricao/curso/<?= $url; ?>" class="get-started-btn border-0">
                  Inscrever-se
                </a>
              </div>
            </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <?php 
        $i = 0;
        $dados = [];
        foreach($data['p'.$url] as $key => $value){
          $dados[$i] = $value;
          $i++;
        }
          for ($i=1; $i < count($dados); $i++) { 
            echo $dados[$i];
          } 
        ?>
      </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  <li data-filter=".filter-details" class="page-title"><?= $data['p'.$url]['titulo']; ?></li>
                </ul>
              </div>
            </div>

            <div class="row portfolio-container">
              <?php $i = 1; while($i>0): ?>
              <?php if(!file_exists(DIRREQ.'public/img/servicos/'.$url.'/img ('.$i.').jpg')){break;}?>
                  <div class="col-lg-4 col-md-6 portfolio-item filter-details">
                    <img src="<?= DIRIMG; ?>servicos/<?= $url; ?>/img (<?= $i; ?>).jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4 class="page-title"><?= $data['p'.$url]['titulo'].' '.$i; ?></h4>
                      <p class="page-title"><?= $data['p'.$url]['titulo'].' '.$i; ?></p>
                      <a href="<?= DIRIMG; ?>servicos/<?= $url; ?>/img (<?= $i; ?>).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $url; ?> <?= $i; ?>">
                        <i class="bx bx-plus"></i>
                      </a>
                    </div>
                  </div>
                <?php $i++; endwhile; ?>

            </div>

          </div>
        </section><!-- End Portfolio Section -->

  </main><!-- End #main -->