<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Usuários Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Usuários</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/user/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
        
        <table id="example2" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>E-mail</th>
                <th>Permissão:</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $user) {?>
                <tr>
                    <td><?php echo $user['idusuario'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['permissao'];?></td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/user/atualizar/'.$user['idusuario']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/user/excluir/'.$user['idusuario']); ?>">
                            Excluir
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>    
        </table>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        
   
