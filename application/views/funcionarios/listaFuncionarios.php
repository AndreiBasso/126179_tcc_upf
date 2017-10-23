<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!--Lista de Vendas-->
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenções</a></li>
        <li class="active">Funcionários</li>
      </ol>
    </section>
     <?php if (isset($mensagem)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>

    <a class="btn btn-success"
            href="<?php echo base_url('index.php/funcionarios/gravar'); ?>"/>
            <i class=""> </i> Adcionar
    </a>
    <!-- Main content -->
    <section class="content box">     
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Data da Admissão: (AAAA/MM/DD)</th>
                <th>Telefone:</th>
                <th>E-mail:</th>
                <th>Função:</th>            
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaFuncionarios as $funcionarios) { if($item['idfuncionarios']!='999'){
                
             ?>
                <tr>
                    <td><?php echo $item['idfuncionarios'];?></td>
                    <td><?php echo $item['nomefuncionarios'];?></td>
                    <td><?php echo $item['data'];?></td>
                    <td><?php echo $item['telefonefuncionarios'];?></td>
                    <td><?php echo $item['emailfuncionarios'];?></td>
                    <td><?php echo $item['funcao'];?></td>             
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/funcionarios/editar/'.$funcionarios['idfuncionarios']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/funcionarios/excluir/'.$funcionarios['idfuncionarios']); ?>">
                            Excluir
                        </a>
                    </td>                    
                </tr>
            <?php }} ?>
            </tbody>
        </table>    
</div>

