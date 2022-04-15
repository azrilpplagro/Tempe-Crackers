<?php $this->view("Navbar",[]); ?>

<div class="main">
  <h2>Article</h2>
  <table>
    <tr>
      <td><a href="<?= BASE_URL ?>/Article/add_new_article" class="btn btn-success">+ Tambah Baru</a></td>
    </tr>
  </table>
  <table class="table table-bordered">
    <thead>
      <tr class="text-center">
        <td style="width: 60px;">No</td>
        <td style="width:400px">Gambar</td>
        <td>Judul</td>
        <td style="width: 100px;">Action</td>
      </tr>
    </thead>

    <tbody>
    <?php
     $i = 1;
     foreach ($data['articles'] as $article) { ?>

      <tr style="height: 400px" class="text-center">
        <td><?= $i ?></td>
        <td style="background-image: url('http://localhost/Tempe-Crackers/public/img/article/<?= $article['gambar'] ?>');background-size:cover;background-position:center">
        </td>
        <td class="text-center"><p><?= $article['judul'] ?></p></td>

        <td>
          <table style="width: 100%;">
            <tr class="text-center">
              <td>
                  <a href="<?= BASE_URL ?>/Article/detail_article/params" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                  </svg></a>
              </td>
              <td>
                <a href="<?= BASE_URL ?>/Article/edit_article/params" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg></a>
              </td>
            </tr>
          </table>
          
        </td>
      </tr>
      
    <?php
      $i++;
     }
    ?>

    </tbody>

  </table>
</div>