<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Pops Cadastrados
        <small></small>
      </h1>
        
        <?php if (isset($mensagem)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Pops</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/pops/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
        <table id="example2" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Descrição:</th>
                <th>Endereço:</th>
                <th>Responsável Técnico:</th>
                <th>Voltagem:</th>
                <th>Acesso:</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) {?>
                <tr>
                    <td><?php echo $item['idpops'];?></td>
                    <td><?php echo $item['nome'];?></td>
                    <td><?php echo $item['descricao'];?></td>
                    <td><?php echo $item['endereco'];?></td>
                    <td><?php echo $item['funcionarios'];?></td>
                     <td><?php echo $item['vol'];?></td>
                      <td><?php echo $item['acesso'];?></td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/pops/atualizar/'.$item['idpops']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/pops/excluir/'.$item['idpops']); ?>">
                            Excluir
                        </a>
                    </td>
                </tr>
                <?php 
          
                    }?>
            </tbody>    
        </table>
            
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        
   
