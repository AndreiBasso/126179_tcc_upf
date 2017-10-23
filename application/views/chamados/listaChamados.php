<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de Chamados
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Chamados</li>

        </ol>
        <p></p>
        <a class="btn btn-primary"
           href="<?php echo base_url('index.php/tipos/index'); ?>"/> <b>Tipos de Chamados</b></a>
        <p></p>

    </section>


    <?php if (isset($mensagem)) { ?>
        <div class="alert alert-<?= $tipo_mensagem; ?>">
            <?= $mensagem; ?>
        </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content box">     

        <a class="btn btn-success"
           href="<?php echo base_url('index.php/chamados/gravar'); ?>"/><i class="fa fa-user-plus"> </i> Incluir</a>
        <br></br> 

        <table id="example1" class="table table-hover">
            <thead>
            <th>Nº OS:</th>
            <th>Cliente:</th>
            <th>Telefone Cliente:</th>
            <th>Tipo de Soliticação:</th>
            <th>Descrição:</th>
            <th>Funcionario Responsavél:</th>
            <th>Abertura da OS:</th>
            <th>Prazo Máximo:</th>
            <th>Situação:</th>
            <th>Prazo:</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
                <?php foreach ($listaChamados as $chamados) { ?>
                    <tr>
                        <td><?php echo $chamados['idchamados']; ?></td>
                        <td><?php echo $chamados['cliente']; ?></td>
                        <td><?php echo $chamados['cliente_telefone']; ?></td>
                        <td><?php echo $chamados['nome_tipos']; ?></td>
                        <td><?php echo $chamados['descricao']; ?></td>
                        <td><?php echo $chamados['nome_funcionarios']; ?></td>
                        <td><?php echo $chamados['datalocal']; ?></td>
                        <td>  <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            $dataMaxima = date_create($chamados['datalocal']);

                            switch ($chamados['tempo_tipos']) {

                                case "24:00:00":


                                    date_add($dataMaxima, date_interval_create_from_date_string('1 day'));
                                    echo $dataMaxima->format('Y-m-d H:i:s');

                                    break;

                                case "48:00:00":

                                    date_add($dataMaxima, date_interval_create_from_date_string('2 day'));
                                    echo $dataMaxima->format('Y-m-d H:i:s');

                                    break;

                                case "72:00:00":

                                    date_add($dataMaxima, date_interval_create_from_date_string('3 day'));
                                    echo $dataMaxima->format('Y-m-d H:i:s');

                                    break;

                                case "96:00:00":

                                    date_add($dataMaxima, date_interval_create_from_date_string('4 day'));
                                    echo $dataMaxima->format('Y-m-d H:i:s');
                                    break;
                            }
                            ?> </td>

                        <td><b><?php echo $chamados['situacao']; ?></b></td>

                        <td>  <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            $data1 = date_create($chamados['datalocal']);
                            $data2 = date_create();

                            switch ($chamados['tempo_tipos']) {

                                case "24:00:00":

                                    date_add($data1, date_interval_create_from_date_string('1 day'));

                                    if ($chamados['situacao'] === 'Aberto' || $chamados['situacao'] === 'Em Andamento') {
                                        echo ($data1 > $data2 ? "<b><font color='#04B404'>Prazo Ok</font></b>" : "<b><font color='#FF0000'>Vencido</font></b>");
                                    } else {
                                        $sit=$chamados['situacao'];
                                        echo "<b><font color='#0000FF'>$sit</font></b>";
                                    }
                                    break;

                                case "48:00:00":

                                    date_add($data1, date_interval_create_from_date_string('2 day'));

                                    if ($chamados['situacao'] === 'Aberto' || $chamados['situacao'] === 'Em Andamento') {
                                        echo ($data1 > $data2 ? "<b><font color='#04B404'>Prazo Ok</font></b>" : "<b><font color='#FF0000'>Vencido</font></b>");
                                    } else {
                                        $sit=$chamados['situacao'];
                                        echo "<b><font color='#0000FF'>$sit</font></b>";
                                    }
                                    break;

                                case "72:00:00":

                                    date_add($data1, date_interval_create_from_date_string('3 day'));

                                    if ($chamados['situacao'] === 'Aberto' || $chamados['situacao'] === 'Em Andamento') {
                                        echo ($data1 > $data2 ? "<b><font color='#04B404'>Prazo Ok</font></b>" : "<b><font color='#FF0000'>Vencido</font></b>");
                                    } else {
                                        $sit=$chamados['situacao'];
                                        echo "<b><font color='#0000FF'>$sit</font></b>";
                                    }
                                    break;

                                case "96:00:00":

                                    date_add($data1, date_interval_create_from_date_string('4 day'));

                                    if ($chamados['situacao'] === 'Aberto' || $chamados['situacao'] === 'Em Andamento') {
                                        echo ($data1 > $data2 ? "<b><font color='#04B404'>Prazo Ok</font></b>" : "<b><font color='#FF0000'>Vencido</font></b>");
                                    } else {
                                        $sit=$chamados['situacao'];
                                        echo "<b><font color='#0000FF'>$sit</font></b>";
                                    }
                                    break;
                            }
                            ?> </td>



                        <td>
                            <a class="btn btn-warning"
                               href="<?php echo base_url('index.php/chamados/editar/' . $chamados['idchamados']); ?>">
                                Editar
                            </a>
                        </td>

                        <td>
                            <?php
                            $user = $this->session->userdata['logado']['permissao'];

                            if ($user == 'admin') {
                                ?>
                                <a class="btn btn-danger"
                                   href="<?php echo base_url('index.php/chamados/excluir/' . $chamados['idchamados']); ?>">
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

