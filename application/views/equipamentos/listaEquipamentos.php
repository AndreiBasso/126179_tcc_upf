<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!--Lista de Vendas-->
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenções</a></li>
        <li class="active">Venda</li>
      </ol>
    </section>
     <?php if (isset($mensagem)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>

    <a class="btn btn-success"
            href="<?php echo base_url('index.php/equipamentos/gravar'); ?>"/>
            <i class=""> </i> Adcionar
    </a>
    <!-- Main content -->
    <section class="content box">     
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Data da Compra: (AAAA/MM/DD)</th>
                <th>Quantidade:</th>
                <th>Valor Unitário:</th>
                <th>Valor Total:</th>                
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaEquipamentos as $equipamentos) { ?>
                <tr>
                    <td><?= $equipamentos['idequipamentos']; ?></td>
                    <td><?= $equipamentos['nomeequipamentos']; ?></td>
                    <td><?= $equipamentos['datacompra']; ?></td>                    
                    <td><?= $equipamentos['quantidade']; ?></td>                    
                    <td><?= $equipamentos['valor_unitario']; ?></td>                    
                    <td><?= $equipamentos['valor_unitario'] * $equipamentos['quantidade']; ?></td>                    
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/equipamentos/editar/'.$equipamentos['idequipamentos']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/equipamentos/excluir/'.$equipamentos['idequipamentos']); ?>">
                            Excluir
                        </a>
                    </td>                    
                </tr>
            <?php } ?>
            </tbody>
        </table>    
</div>

