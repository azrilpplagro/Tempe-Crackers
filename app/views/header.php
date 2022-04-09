<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/bootstrap.min.css">  
  <title><?= $data ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/css/Navbar.css?<?php echo time(); ?>">
  <?php
  if(file_exists("style/css/$data.css")){ ?>
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/css/<?= $data ?>.css?<?php echo time(); ?>">
  <?php
  }
  ?>
  