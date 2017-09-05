<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
<!--        <link rel="icon" href="../../favicon.ico">-->

        <title>Acesso ao Sistema</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <!--link rel="stylesheet" href="dist/css/AdminLTE.min.css"-->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
    </head>


    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Gerenciador GM</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <?php if(isset($mensagem)){ ?>
                <div class="alert alert-<?= $tipo_mensagem; ?>">
                    <?= $mensagem; ?>
                </div>
                <?php } ?>
                
                <p class="login-box-msg">Por favor, informe seus dados:</p>
                <form name='loginForm' action="<?php echo base_url('index.php/login/validaUsuario/'); ?>" method="POST">
                    <div class="form-group has-feedback">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="senha" id="senha" type="password" class="form-control" placeholder="Senha">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div><!-- /.col -->
                    </div>

                </form>

<!--                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div> /.social-auth-links -->

                <!--<a href="register.html" class="text-center">Register a new membership</a>-->
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </body>
</html>
