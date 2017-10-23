  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Serviços Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Serviços</li>
      </ol>
    </section>
     <?php if (isset($mensagem)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/servicos/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
            
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Descrição:</th>
                <th>Disponobilidade:</th>
                <th>Valor:</th>
                <th>Tempo:</th>
                <th>Atualizar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) {?>
                <tr>
                    <td><?php echo $item['idservicos'];?></td>
                    <td><?php echo $item['nomeservicos'];?></td>
                    <td><?php echo $item['descricaoservicos'];?></td>
                    <td><?php echo $item['disponibilidadeservicos'];?></td>
                    <td>R$ <?php echo $item['valor'];?></td>
                    <td><?php echo $item['tempo'];?> Meses</td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/servicos/atualizar/'.$item['idservicos']); ?>">
                            Editar
                        </a>
                    </td>
                       <td>
                            <?php
                            $user = $this->session->userdata['logado']['permissao'];

                            if ($user == 'admin') {
                                ?>
                                <a class="btn btn-danger"
                                   href="<?php echo base_url('index.php/servicos/excluir/' . $servicos['idservicos']); ?>">
                                    Excluir
                                </a>
                                <?php
                            }
                            ?>
                        </td>  
                        <?php
                    }
                    ?>
                </tr>
            </tbody>    
        </table>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        
   
