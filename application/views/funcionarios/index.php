  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Funcionários Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Funcionários</li>
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
            href="<?php echo base_url('index.php/funcionarios/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
            
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Data da Admissão: (AAAA/MM/DD)</th>
                <th>Telefone:</th>
                <th>E-mail:</th>
                <th>Função:</th>
                <th>Atualizar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) {?>
                <tr>
                    <td><?php echo $item['idfuncionarios'];?></td>
                    <td><?php echo $item['nomefuncionarios'];?></td>
                    <td><?php echo $item['data'];?></td>
                    <td><?php echo $item['telefone'];?></td>
                    <td><?php echo $item['email'];?></td>
                    <td><?php echo $item['funcao'];?></td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/funcionarios/atualizar/'.$item['idfuncionarios']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/funcionarios/excluir/'.$item['idfuncionarios']); ?>">
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
        
   
