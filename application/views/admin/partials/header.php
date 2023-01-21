<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/dashboard.css');?>">
</head>

<body class="bg-white">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url().'admin/home';?>">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <!-- nav user -->
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/user/';?>"
                            class="nav-link">User</a>
                    </li>
                    <!-- nav restoran -->
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/store/';?>"
                            class="nav-link">Restoran</a>
                    </li>
                    <!-- nav restoran kategori -->
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/category/';?>"
                            class="nav-link">Kategori</a>
                    </li>
                    <!-- nav menu restoran -->
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/menu/';?>"
                            class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/orders/';?>"
                            class="nav-link">Pesanan</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/login/logout';?>"
                            class="nav-link">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>