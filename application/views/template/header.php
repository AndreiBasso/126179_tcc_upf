<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gerenciador GM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-blue.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Grupo</b> Minozzo</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata['logado']['usuario'];?></span>
            </a>

          </li>
          <!-- Fazer Logoff -->
          <li>
            <a href="<?php echo base_url('index.php/login/logoff');?>" class="dropdown-toggle">Fazer Logoff</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">



      

      <!-- Sidebar Menu -->
      

      <ul class="sidebar-menu">
        <<li class="header" ><b><font color="#FFFFFF"><font size="3">Menu Sistema</font></font></b></li>
        <!-- Optionally, you can add icons to the links -->

         <li class="active"><a href="<?php echo base_url('index.php/comunicados/index'); ?>"><i class="fa fa-users"></i> <span>Comunicados</span></a></li>
        <!--<li class="active"><a href="<?php echo base_url('index.php/tipos/index'); ?>"><i class="fa fa-users"></i> <span>Tipos</span></a></li>-->
        <li class="active"><a href="<?php echo base_url('index.php/chamados/index'); ?>"><i class="fa fa-users"></i> <span>Chamados</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/cliente/index'); ?>"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/contratos/index'); ?>"><i class="fa fa-users"></i> <span>Contratos</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/orcamento/index'); ?>"><i class="fa fa-users"></i> <span>Orcamentos</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/servicos/index'); ?>"><i class="fa fa-users"></i> <span>Serviços</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/equipamentos/index'); ?>"><i class="fa fa-users"></i> <span>Equipamentos</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/funcionarios/index'); ?>"><i class="fa fa-users"></i> <span>Funcionários</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/pops/index'); ?>"><i class="fa fa-users"></i> <span>Pops</span></a></li>
        <li class="active"><a href="<?php echo base_url('index.php/borda/index'); ?>"><i class="fa fa-users"></i> <span>Monitoramentos</span></a></li>
        <!--<li class="active"><a href="<?php echo base_url('index.php/grafico/index'); ?>"><i class="fa fa-users"></i> <span>Gráficos</span></a></li>-->
        <!--<li class="active"><a href="<?php echo base_url('index.php/pdf/index'); ?>"><i class="fa fa-users"></i> <span>Relatórios PDF</span></a></li>-->
         <?php
                            $user = $this->session->userdata['logado']['permissao'];

                            if ($user == 'admin') {
                                ?>
        <li class="header" ><b><font color="#FFFFFF"><font size="3">Menu Admin</font></font></b></li>
        <li class="active"><a href="<?php echo base_url('index.php/user/index'); ?>"><i class="fa fa-users"></i> <span>Gerenciar Usuários</span></a></li>
               <?php
                            }
                            ?></ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>