<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?php echo $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/homepage/') ?>img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/homepage/') ?>style.css">

    <?php
    function textShorten($text, $limit)
    {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . "...";
        return $text;
    } ?>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Top Search Area Start ***** -->
    <div class="top-search-area">
        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Close Button -->
                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <!-- Form -->
                        <form action="index.html" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search article and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Top Search Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="uzaNav">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Logo -->
                                <a class="nav-brand" href="<?php echo site_url('Home') ?>"><img src="<?php echo base_url('assets/homepage/') ?>img/core-img/logo.png" alt=""></a>
                            </div>
                            <div class="col-sm-6">
                                <!-- Navbar Toggler -->
                                <div class="classy-navbar-toggler">
                                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                                </div>
                                <!-- Menu -->
                                <div class="classy-menu">
                                    <!-- Menu Close Button -->
                                    <div class="classycloseIcon">
                                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                    </div>
                                    <!-- Nav Start -->
                                    <div class="classynav">
                                        <ul id="nav">
                                            <li><a href="<?php echo site_url('Home'); ?>">Home</a></li>
                                            <li><a href="<?php echo site_url('Post'); ?>">Post</a></li>
                                            <li><a href="<?php echo site_url('About'); ?>">About</a></li>
                                        </ul>
                                        <!-- Login / Register -->
                                        <div class="login-register-btn mx-3">
                                            <a href="<?= site_url('Auth'); ?>">Login <span>/ Register</span></a>
                                        </div>
                                        <!-- Search Icon -->
                                        <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                                            <i class="icon_search"></i>
                                        </div>
                                    </div>
                                    <!-- Nav End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->