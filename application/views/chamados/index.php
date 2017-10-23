  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Contratos de Clentes Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Contratos de Clentes</li>
      </ol>
    </section>
     <?php if (isset($dados)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content box">
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/orcamento/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
            
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Cliente:</th>
                <th>Serviços:</th>
                <th>Situação:</th>
                <th>Descrição:</th>
                <th>Valor:</th>
                <th>Atualizar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) {?>
                <tr>
                    <td><?php echo $item['idorcamento'];?></td>
                    <td><?php echo $item['cliente'];?></td>
                    <td><?php echo $item['servicos'];?></td>
                    <td><?php echo $item['situacao'];?></td>
                    <td><?php echo $item['descricao'];?></td>
                    <td><?php echo $item['valor'];?></td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/orcamento/atualizar/'.$item['idorcamento']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/orcamento/excluir/'.$item['idorcamento']); ?>">
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
        
   
