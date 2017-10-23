<div class="content-wrapper">
    <meta http-equiv="refresh" content="5">
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
            <th>Status:</th>  
            <th>Data da Instalação: (AAAA/MM/DD)</th>                
            <th>Pop:</th> 
            <th>Equipamento:</th> 
            <th></th>
            <th></th>
            </thead>
            <tbody>
                <?php

                function ping($ip = null) {
                    $comando = "ping $ip -n 1 -w 1";
                    $ping = `$comando`;
                    $retorno = nl2br($ping);
                    //$pos = strpos($retorno, 'Pacotes: Enviados = 1, Recebidos = 1, Perdidos = 0');
                    $pos = strpos($retorno, 'bytes=32');
                    if ($pos === FALSE) {
                        return false;
                    } else {
                        return true;
                    }
                }

                foreach ($listaBorda as $borda) {
                    ?>
                    <tr>
                        <td><?= $borda['idborda']; ?></td>
                        <td><?= $borda['nomeborda']; ?></td>
                        <td><?= $borda['descri']; ?></td>
                        <td>
                            <?php
                            if (ping($borda['descri']) === TRUE) {
                                echo "<b><font color='#04B404'>OK</font></b>";
                            } else {
                                echo "<b><font color='#FF0000'>NOK</font></b>";
                            }
                            ?>
                        </td>
                        <td><?= $borda['data']; ?></td>                    
                        <td><?= $borda['pops']; ?></td> 
                        <td><?= $borda['equipamentos']; ?></td> 
                        <td>
                            <a class="btn btn-warning"
                               href="<?php echo base_url('index.php/borda/editar/' . $borda['idborda']); ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="<?php echo base_url('index.php/borda/excluir/' . $borda['idborda']); ?>">
                                Excluir
                            </a>
                        </td>                    
                    </tr>
<?php } ?>
            </tbody>
        </table>    
</div>

