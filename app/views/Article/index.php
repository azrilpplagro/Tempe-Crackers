<?php $this->view("Navbar",[]); ?>
<link rel="stylesheet" href="<?= BASE_URL ?>/style/library/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="<?= BASE_URL ?>/style/css/Article.css"/>



<div class="main">
  <h1>Article</h1>
  <br>

  <?php
  if(count($data['articles']) > 0) { ?>
    <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $i = 1;
              foreach ($data['articles'] as $article) { ?>
              <a href="<?= BASE_URL ?>/Article/detail_article/<?= $article['id'] ?>" class="swiper-slide" style="display:flex;flex-direction:column;justify-content:center;backdrop-filter: blur(1px);background-image: url('<?= BASE_URL ?>/img/article/<?= $article['gambar'] ?>')">
                  <p><?= $article['tanggal_terbit'] ?></p>
                  <h3><?= $article['judul'] ?></h3>
                </a>
              <?php
              }
            ?>
          
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
      </div>
    </div>
  <?php }
  ?>
<div>



<script src="<?= BASE_URL ?>/style/library/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: false,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
</script>
