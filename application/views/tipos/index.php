  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Tipos Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Tipos</li>
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
            href="<?php echo base_url('index.php/tipos/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
            
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Tempo:</th>   
                <th>Atualizar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $item) {?>
                <tr>
                    <td><?php echo $item['idtipos'];?></td>
                    <td><?php echo $item['nometipos'];?></td>
                    <td>
                        <?php
                         switch ($item['tempo']) {

                                case "24:00:00":
                                    print_r("1 Dia");
                                    break;
                                case "48:00:00":
                                    print_r("2 Dias");
                                    break;
                                case "72:00:00":
                                    print_r("3 Dias");
                                    break;
                                case "96:00:00":
                                    print_r("4 Dias");
                                    break;
                                
                         }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/tipos/atualizar/'.$item['idtipos']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/tipos/excluir/'.$item['idtipos']); ?>">
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
        
   
