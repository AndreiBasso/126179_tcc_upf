  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Clientes Cadastrados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">     
        <a class="btn btn-success"
            href="<?php echo base_url('index.php/cliente/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
            <br></br>
        
        <table id="example1" class="table table-hover">
            <thead>
                <th>Código:</th>
                <th>Nome:</th>                
                <th>Endereço:</th>             
                <th>Telefone:</th>                
                <th>E-mail:</th>  
                <th>Pop:</th>  
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach ($listaCliente as $cliente) { ?>
                <tr>
                    <td><?= $cliente['id']; ?></td>
                    <td><?= $cliente['nomecliente']; ?></td>
                    <td><?= $cliente['enderecocliente']; ?></td>                                       
                    <td><?= $cliente['telefone']; ?></td>                    
                    <td><?= $cliente['email']; ?></td>  
                    <td><?= $cliente['pops']; ?></td> 
                    <td>
                        <a class="btn btn-warning"
                            href="<?php echo base_url('index.php/cliente/editar/'.$cliente['id']); ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('index.php/cliente/excluir/'.$cliente['id']); ?>">
                            Excluir
                        </a>
                    </td>                    
                </tr>
            <?php } ?>
            </tbody>
        </table>    
</div>

