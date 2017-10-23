  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Orçamentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Orçamentos Cadastrados</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/orcamento/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br> 
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Cliente:</th>
                <th>Telefone:</th>
                <th>E-mail:</th>
                <th>Serviços:</th>
                <th>Situação:</th>
                <th>Descrição:</th>
                <th>Valor:</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaOrcamento as $orcamento) { ?>
                <tr>
                    <td><?php echo $orcamento['idorcamento'];?></td>
                    <td><?php echo $orcamento['cliente'];?></td>
                    <td><?php echo $orcamento['cliente_telefone'];?></td>
                     <td><?php echo $orcamento['cliente_email'];?></td>
                    <td><?php echo $orcamento['servicos'];?></td>
                    <td><?php echo $orcamento['situacao'];?></td>
                    <td><?php echo $orcamento['descricao'];?></td>
                    <td>R$ <?php echo $orcamento['valor'];?></td>
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/orcamento/editar/'.$orcamento['idorcamento']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/orcamento/excluir/'.$orcamento['idorcamento']); ?>">
                            Excluir
                        </a>
                    </td>                    
                </tr>
            <?php } ?>
            </tbody>
        </table>    
</div>

