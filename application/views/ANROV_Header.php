<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/materialize.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/select2.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/validasi.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery-ui.js") ?>"></script>
        <link href="<?php echo base_url("assets/css/materialize.min.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/select2-materialize.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/style.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/materialize-icon.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/jquery-ui.css") ?>" rel=stylesheet>
        <style>
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(<?php echo base_url("assets/images/Preloader_7.gif") ?>) center no-repeat white;
            }
        </style>    
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="<?php echo base_url() ?>" class="brand-logo"><i class="material-icons" style="font-size : 2.5rem; margin-right:3px; margin-left:5px;">book</i>ANROnline</a>
                    <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="<?php echo base_url("ANROC_Siswa") ?>">Data Siswa</a></li>
                        <li><a href="<?php echo base_url("ANROC_Kelas") ?>">Data Kelas</a></li>
                        <li><a href="<?php echo base_url("ANROC_Guru") ?>">Data Guru</a></li>
                        <li><a href="<?php echo base_url("ANROC_Jurusan") ?>">Data Jurusan</a></li>
                        <li><a href="<?php echo base_url("ANROC_Mapel") ?>">Data Mata Pelajaran</a></li>
                        <li><a href="<?php echo base_url("ANROC_Nilai") ?>">Data Nilai</a></li>
                        <li><a href="<?php echo base_url("ANROC_PDF") ?>">Cetak PDF</a></li>
                        <?php 
                            if($this->session->username != null){
                        ?>
                        <li><a class='dropdown-button' data-beloworigin="true" href='#' data-activates='dropdown1' ><?php echo $this->session->nama ?><i class="material-icons right" >arrow_drop_down</i></a></li>
                        <?php
                            }else{
                        ?>
                        <li><a href="<?php echo base_url("ANROC_Auth")?>">Login</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="<?php echo base_url("ANROC_Auth/akun") ?>">Akun</a></li>
                        <li><a href="<?php echo base_url("ANROC_Auth/forcereset") ?>">Ubah Password</a></li>
                        <li><a href="<?php echo base_url("ANROC_Auth/logout")?>">Logout</a></li>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        <li class="logo center" style="padding:10px;">
                            <img class="valign center responsive-img" src="<?php echo base_url() ?>assets/images/Logo.png" width="150px" height="150px">
                        </li>
                        <li><div class="divider"></div></li>
                        <li><a href="<?php echo base_url("ANROC_Siswa") ?>">Data Siswa</a></li>
                        <li><a href="<?php echo base_url("ANROC_Siswa") ?>">Data Siswa</a></li> 
                        <li><a href="<?php echo base_url("ANROC_Kelas") ?>">Data Kelas</a></li>
                        <li><a href="<?php echo base_url("ANROC_Guru") ?>">Data Guru</a></li>
                        <li><a href="<?php echo base_url("ANROC_Jurusan") ?>">Data Jurusan</a></li>
                        <li><a href="<?php echo base_url("ANROC_Mapel") ?>">Data Mata Pelajaran</a></li>
                        <li><a href="<?php echo base_url("ANROC_Nilai") ?>">Data Nilai</a></li>
                        <li><a href="<?php echo base_url("ANROC_PDF") ?>">Cetak PDF</a></li>
                        <?php 
                            if($this->session->username != null){
                        ?>
                        <li><?php echo $this->session->username ?><a href="<?php echo base_url("ANROC_Auth/logout")?>">Logout</a></li>
                        <?php
                            }else{
                        ?>
                        <li><a href="<?php echo base_url("ANROC_Auth")?>">Login</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </header>
         <div class="se-pre-con"></div>