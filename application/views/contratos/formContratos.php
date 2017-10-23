<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Manutenção de Contratos
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Contratos de Contratos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="contratos" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="idfuncionarios" readonly
                       value="<?php if (isset($contratos)) echo $contratos['id']; ?>"/> 
            </div>-->
              
            <div class="form-group">
                <label>Cliente:</label>
                <select name="idcliente" class="form-control">
                    <?php foreach ($listaCliente as $cliente) { ?>
                    <option value="<?= $cliente['id']; ?>"
                            <?php if(isset($contratos) && $contratos['idcliente']==$cliente['id']) echo "selected"; ?>>
                        <?php echo $cliente['id'] .' - ' .  $cliente['nomecliente']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>
               
            <div class="form-group">
                <label>Serviços:</label>
                <select name="idservicos" class="form-control">
                    <?php foreach ($listaServicos as $servicos) { ?>
                    <option value="<?= $servicos['idservicos']; ?>"
                            <?php if(isset($contratos) && $contratos['idservicos']==$servicos['idservicos']) echo "selected"; ?>>
                        <?php echo $servicos['idservicos'] .' - ' .  $servicos['nomeservicos']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>

        <div class="form-group">
                <label for='situacao'>Disponibilidade:</label><br>
                 <input type="radio" name="situacao" value="Ativo" <?php if (isset($contratos) && $contratos['situacao']==='Ativo') echo "checked"; ?>> Ativo 
                 <input type="radio" name="situacao" value="Desativado" <?php if (isset($contratos) && $contratos['situacao']==='Desativado') echo "checked"; ?>> Desativado
            </div> 



            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->