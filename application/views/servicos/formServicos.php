<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Manutenção de Serviços

            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Serviços</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="servicos" action="<?= $acao; ?>" method="POST">
            <!--            <div class="form-group">
                            <label>Id</label>
                            <input class="form-control" type="text" name="idservicos" readonly
                                   value="<?php if (isset($servicos)) echo $servicos['idservicos']; ?>"/> 
                        </div>-->
            <div class="form-group">
                <label for='nomeservicos'>Nome:</label>
                <input class="form-control" type="text" name="nomeservicos" required 
                       value="<?php if (isset($servicos)) echo $servicos['nomeservicos']; ?>"/>
            </div>   
            <div class="form-group">
                <label for='disponibilidadeservicos'>Disponibilidade:</label><br>
                 <input type="radio" name="disponibilidadeservicos" value="Ativo" <?php if (isset($servicos) && $servicos['disponibilidadeservicos']==='Ativo') echo "checked"; ?>> Ativo 
                 <input type="radio" name="disponibilidadeservicos" value="Desativado" <?php if (isset($servicos) && $servicos['disponibilidadeservicos']==='Desativado') echo "checked"; ?>> Desativado
         
            </div> 

             
            <div class="form-group">
                <label for='descricaoservicos'>Descrição:</label>
                <input class="form-control" type="text" name="descricaoservicos" required 
                       value="<?php if (isset($servicos)) echo $servicos['descricaoservicos']; ?>"/>
            </div> 

            <div class="form-group">
                <label for='valor'>Valor:</label>
                <input class="form-control" type="text" name="valor" required 
                       value="<?php if (isset($servicos)) echo $servicos['valor']; ?>"/>
            </div> 

            <div class="form-group">
                <label for='tempo'>Tempo(Meses):</label>
                <input class="form-control" type="text" name="tempo" required 
                       value="<?php if (isset($servicos)) echo $servicos['tempo']; ?>"/>
            </div> 


            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->