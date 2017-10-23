  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Contratos Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Contratos Cadastrados</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/contratos/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br> 
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Cliente:</th>
                <th>Serviços:</th>
                <th>Situação:</th>      
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaContratos as $contratos) { ?>
                <tr>
                    <td><?php echo $contratos['idcontratos'];?></td>
                    <td><?php echo $contratos['cliente'];?></td>
                    <td><?php echo $contratos['servicos'];?></td>
                    <td><?php echo $contratos['situacao'];?></td>        
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/contratos/editar/'.$contratos['idcontratos']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/contratos/excluir/'.$contratos['idcontratos']); ?>">
                            Excluir
                        </a>
                    </td>                    
                </tr>
            <?php } ?>
            </tbody>
        </table>    
</div>

