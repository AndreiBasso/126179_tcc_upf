<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Manutenção de Chamados

            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Chamados</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="chamados" action="<?= $acao; ?>" method="POST">
            <!--            <div class="form-group">
                            <label>Id</label>
                            <input class="form-control" type="text" name="idfuncionarios" readonly
                                   value="<?php if (isset($chamados)) echo $chamados['idchamados']; ?>"/> 
                        </div>-->




            <div class="form-group">
                <label>Cliente:</label>
                <select name="idcliente" class="form-control">
                    <?php foreach ($listaCliente as $cliente) { ?>
                        <option value="<?= $cliente['id']; ?>"
                                <?php if (isset($chamados) && $chamados['idcliente'] == $cliente['id']) echo "selected"; ?>>
                                    <?php echo $cliente['id'] . ' - ' . $cliente['nomecliente']; ?>
                        </option>    
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for='descricao'>Descrição:</label>
                <textarea class="form-control" type="text" name="descricao" required 
                       value="<?php if (isset($chamados)) echo $chamados['descricao']; ?>"/></textarea>
            </div> 

            <div class="form-group">
                <label>Tipo da Solicitação:</label>
                <select name="idtipos" class="form-control">
                    <?php foreach ($listaTipos as $tipos) { ?>
                        <option value="<?= $tipos['idtipos']; ?>"
                                <?php if (isset($chamados) && $chamados['idtipos'] == $tipos['idtipos']) echo "selected"; ?>>
                                    <?php echo $tipos['idtipos'] . ' - ' . $tipos['nometipos']; ?>
                        </option>    
                    <?php } ?>
                </select>
            </div>
            
            
            
            <div class="form-group">
                <label for='situacao'>Situação:</label><br>
                <input type="radio" name="situacao" value="Aberto" <?php if (isset($chamados) && $chamados['situacao'] === 'Aberto') echo "checked"; ?>> <b><font color='#04B404'>Aberto</font></b>
                <input type="radio" name="situacao" value="Em Andamento" <?php if (isset($chamados) && $chamados['situacao'] === 'Em Andamento') echo "checked"; ?>> <b><font color='#0000FF'>Em Andamento</font></b>
                <input type="radio" name="situacao" value="Encerrado" <?php if (isset($chamados) && $chamados['situacao'] === 'Encerrado') echo "checked"; ?>> <b><font color='#FF0000'>Encerrado</font></b>
            </div>


            <div class="form-group">
                <label>Equipamentos Utilizados:</label>
                <select name="idequipamentos" class="form-control">
                    <?php foreach ($listaEquipamentos as $equipamentos) { ?>
                        <option value="<?= $equipamentos['idequipamentos']; ?>"
                                <?php if (isset($chamados) && $chamados['idequipamentos'] == $equipamentos['idequipamentos']) echo "selected"; ?>>
                                    <?php echo $equipamentos['idequipamentos'] . ' - ' . $equipamentos['nomeequipamentos']; ?>
                        </option>    
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Técnico Responsavel:</label>
                <select name="idfuncionarios" class="form-control">
                    <?php foreach ($listaFuncionarios as $funcionarios) { ?>
                        <option value="<?= $funcionarios['idfuncionarios']; ?>"
                                <?php if (isset($chamados) && $chamados['idfuncionarios'] == $funcionarios['idfuncionarios']) echo "selected"; ?>>
                                    <?php echo $funcionarios['idfuncionarios'] . ' - ' . $funcionarios['nomefuncionarios']; ?>
                        </option>    
                    <?php } ?>
                </select>
            </div>


            <?php
            if (empty($chamados['datalocal'])) {
                date_default_timezone_set('America/Sao_Paulo');
                $dataLocal = date('d/m/Y H:i:s');
                $chamados['datalocal'] = $dataLocal;
            }
            ?>

            <div class="form-group">
                <label>Data Abertura OS:</label>
                <input class="form-control" type="text" name="datalocal" readonly
                       value="<?php if (isset($chamados)) echo $chamados['datalocal']; ?>"/> 
            </div>


            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->