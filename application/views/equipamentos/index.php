  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Equipamentos Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Equipamentos</li>
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
            href="<?php echo base_url('index.php/equipamentos/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
            
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Data da Compra: (AAAA/MM/DD)</th>
                <th>Quantidade:</th>
                <th>Valor Unitário:</th>
                <th>Valor Total:</th>
                <th>Atualizar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) { if($item['idequipamentos']!='999'){ ?>
                <tr>
                    <td><?php echo $item['idequipamentos'];?></td>
                    <td><?php echo $item['nomeequipamentos'];?></td>
                    <td><?php echo $item['datacompra'];?></td>
                    <td><?php echo $item['quantidade'];?></td>
                    <td>R$ <?php echo $item['valor_unitario'];?></td>
                    <td>R$ <?php echo $item['valor_unitario'] * $item['quantidade'];?></td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/equipamentos/atualizar/'.$item['idequipamentos']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/equipamentos/excluir/'.$item['idequipamentos']); ?>">
                            Excluir
                        </a>
                    </td>
                </tr>
                <?php }}?>
            </tbody>    
        </table>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        
   
