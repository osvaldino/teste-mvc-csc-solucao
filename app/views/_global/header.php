<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($DATA['title']) ? $DATA['title'] . ' | Teste MVC CSC Solução' : 'Teste MVC CSC Solução'; ?></title>

    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="">
    <meta name="author" content="" />

    <!-- Favicon icon -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/images/favicon.ico'); ?>">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/css/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/icon/themify-icons/themify-icons.css'); ?>">
    <!-- feather icon -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/icon/feather/css/feather.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/icon/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- iziToast -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/js/iziToast-1.4.0/css/iziToast.min.css'); ?>">
    <!-- Style.css -->
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= Utils::generateLink('assets/css/jquery.mCustomScrollbar.css'); ?>">
</head>

<body>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">