<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Manutenção de Orçamentos
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Orçamentos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="$orcamento" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="idfuncionarios" readonly
                       value="<?php if (isset($orcamento)) echo $orcamento['id']; ?>"/> 
            </div>-->
              
            <div class="form-group">
                <label>Cliente:</label>
                <select name="idcliente" class="form-control">
                    <?php foreach ($listaCliente as $cliente) { ?>
                    <option value="<?= $cliente['id']; ?>"
                            <?php if(isset($orcamento) && $orcamento['idcliente']==$cliente['id']) echo "selected"; ?>>
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
                            <?php if(isset($orcamento) && $orcamento['idservicos']==$servicos['idservicos']) echo "selected"; ?>>
                        <?php echo $servicos['idservicos'] .' - ' .  $servicos['nomeservicos']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>


        <div class="form-group">
                <label for='situacao'>Status:</label><br>
                 <input type="radio" name="situacao" value="Aberto" <?php if (isset($orcamento) && $orcamento['situacao']==='Aberto') echo "checked"; ?>> Aberto
                 <input type="radio" name="situacao" value="Levantamento" <?php if (isset($orcamento) && $orcamento['situacao']==='Levantamento') echo "checked"; ?>> Levantamento
                 <input type="radio" name="situacao" value="Encerrado" <?php if (isset($orcamento) && $orcamento['situacao']==='Encerrado') echo "checked"; ?>> Encerrado
            </div> 
            
            <div class="form-group">
                <label for='nomefuncionarios'>Descrição:</label>
                <input class="form-control" type="text" name="descricao" required 
                       value="<?php if (isset($orcamento)) echo $orcamento['descricao']; ?>"/>
            </div>  
            <div class="form-group">
                <label for='nomefuncionarios'>Valor:</label>
                <input class="form-control" type="text" name="valor" required 
                       value="<?php if (isset($orcamento)) echo $orcamento['valor']; ?>"/>
            </div> 



            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->