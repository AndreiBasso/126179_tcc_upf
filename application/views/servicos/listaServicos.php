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
            href="<?php echo base_url('index.php/servicos/gravar'); ?>"/>
            <i class=""> </i> Adcionar
    </a>
    <!-- Main content -->
    <section class="content box">     
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Descrição:</th>
                <th>Disponobilidade:</th>
                <th>Valor:</th>
                <th>Tempo:</th>          
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaServicos as $servicos) { ?>
                <tr>
                    <td><?php echo $item['idservicos '];?></td>
                    <td><?php echo $item['nomeservicos'];?></td>
                    <td><?php echo $item['descricaoservicos'];?></td>
                    <td><?php echo $item['disponibilidadeservicos'];?></td>
                    <td><?php echo $item['valor'];?></td>
                    <td><?php echo $item['tempo'];?></td>            
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/servicos/editar/'.$servicos['idservicos']); ?>">
                            Editar
                        </a>
                    </td>
             <td>
                            <?php
                            $user = $this->session->userdata['logado']['permissao'];

                            if ($user == 'admin') {
                                ?>
                                <a class="btn btn-danger"
                                   href="<?php echo base_url('index.php/servicos/excluir/' . $servicos['idservicos']); ?>">
                                    Excluir
                                </a>
                                <?php
                            }
                            ?>
                        </td>  
                        <?php
                    }
                    ?>
                </tr>

            </tbody>
        </table>    
</div>

