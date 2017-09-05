
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manutenção de Usuários
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Usuários</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">
        
      <form name="user" action="<?= $acao; ?>" method="POST">
<!--                <div class="form-group">
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" readonly
                           value="<?php if (isset($user)) echo $user['idusuario']; ?>"/> 
                </div>-->
                <div class="form-group">
                    <label>E-mail:</label>
                    <input class="form-control" type="text" name="email" required 
                           value="<?php if (isset($user)) echo $user['email']; ?>"/> 
                </div>
                    <div class="form-group">
                    <label>Senha:</label>
                    <input class="form-control" type="text" name="senha" required 
                           value="<?php if (isset($user)) echo $user['']; ?>"/> 
                </div>   
                    <div class="form-group">
                    <label>Permissão:</label>
                    <input class="form-control" type="text" name="permissao" required 
                           value="<?php if (isset($user)) echo $user['permissao']; ?>"/> 
                </div>   
                <input type="submit" value="Enviar"/> <a href="index">
            </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
            
        