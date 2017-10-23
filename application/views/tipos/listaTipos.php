<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!--Lista de Vendas-->
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenções</a></li>
        <li class="active">Serviços</li>
      </ol>
    </section>
     <?php if (isset($mensagem)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>

    <a class="btn btn-success"
            href="<?php echo base_url('index.php/tipos/gravar'); ?>"/>
            <i class=""> </i> Adcionar
    </a>
    <!-- Main content -->
    <section class="content box">     
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Tempo:</th>       
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaTipos as $tipos) { ?>
                <tr>
                    <td><?php echo $item['idtipos'];?></td>
                    <td><?php echo $item['nometipos'];?></td>
                    <td><?php echo $item['tempo'];?></td>            
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/tipos/editar/'.$tipos['idtipos']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/tipos/excluir/'.$tipos['idtipos']); ?>">
                            Excluir
                        </a>
                    </td>                    
                </tr>
            <?php } ?>
            </tbody>
        </table>    
</div>

