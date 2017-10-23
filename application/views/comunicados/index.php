<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Comunicados
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Comunicados</a></li>
            <li class="active">Clientes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->

        <?php $acao=base_url('index.php/comunicados/gravar');?>

        <form name="comunicados" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="id" readonly
                       value="<?php if (isset($cliente)) echo $cliente['id']; ?>"/> 
            </div>-->
               <div class="form-group">
                <label>Clientes:</label>
                <select name="idcliente" class="form-control">
                    <option value="999999" >Todos Clientes</option>
                    <?php foreach ($listaCliente as $cliente) { ?>
                        <option value="<?= $cliente['id']; ?>"
                                <?php if (isset($chamados) && $chamados['idcliente'] == $cliente['id']) echo "selected"; ?>>
                                    <?php echo $cliente['id'] . ' - ' . $cliente['nomecliente']; ?>
                        </option>    
                    <?php } ?>
                </select>
            </div>
                   <div class="form-group">
                    <label>Título da Mensagem:</label>
                    <input class="form-control" type="text" name="titulo" required 
                           value=""/> 
                </div>
                   <div class="form-group">
                    <label>Mensagem:</label>
                    <textarea class="form-control" type="text" name="mensagem" required 
                              value=""/></textarea>
                </div>
                
                <div class="form-group">
                <label for='remetente'>Forma de Envio:</label><br>
                <input type="radio" name="remetente" value="envia_email"><b>E-mail</b>
                <input type="radio" name="remetente" value="envia_sms"><b>Sms</b>
                <input type="radio" name="remetente" value="envia_ambos"> <b>E-mail + Sms</b>
            </div>


                      
            <input type="submit" value="Enviar"/>  <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->