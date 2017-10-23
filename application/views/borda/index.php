<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de Monitoramentos
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Monitoramentos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
           href="<?php echo base_url('index.php/borda/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
        <br></br>

        <table id="example1" class="table table-hover">
            <thead>
            <th>Código:</th>
            <th>Nome:</th>                
            <th>Ip:</th>
            <th>Data da Instalação: (AAAA/MM/DD)</th>                
            <th>Pop:</th>  
            <th>Equipamento:</th>  
            <th>Atualizar</th>
            <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) { ?>
                    <tr>
                        <td><?= $borda['idborda']; ?></td>
                        <td><?= $borda['nomeborda']; ?></td>
                        <td><?= $borda['descri']; ?></td>
                        <td><?= $borda['data']; ?></td>                    
                        <td><?= $borda['pops']; ?></td>  
                        <td><?= $borda['equipamentos']; ?></td>
                        <td>
                            <a class="btn btn-warning"
                               href="<?php echo base_url('index.php/borda/atualizar/' . $item['idborda']); ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="<?php echo base_url('index.php/borda/excluir/' . $item['idborda']); ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>    
        </table>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


