<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Manutenção de Clientes
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Clientes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->

        

        <form name="cliente" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="id" readonly
                       value="<?php if (isset($cliente)) echo $cliente['id']; ?>"/> 
            </div>-->
               <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nomecliente" required 
                           value="<?php if (isset($cliente)) echo $cliente['nomecliente']; ?>"/> 
                </div>
                   <div class="form-group">
                    <label>Endereço:</label>
                    <input class="form-control" type="text" name="enderecocliente" required 
                           value="<?php if (isset($cliente)) echo $cliente['enderecocliente']; ?>"/> 
                </div>
                   <div class="form-group">
                    <label>Telefone Celular:</label>
                    <input class="form-control" type="tel" name="telefone" pattern="\(\d{2}\)\d{5}-\d{4}" required 
                           value="<?php if (isset($cliente)) echo $cliente['telefone']; ?>"/> 
                </div>

                <div class="form-group">
                    <label>E-mail:</label>
                    <input class="form-control" type="text" name="email" required 
                           value="<?php if (isset($cliente)) echo $cliente['email']; ?>"/> 
                </div>        
            <div class="form-group">
                <label>Pop:</label>
                <select name="idpops" class="form-control">
                    <?php foreach ($listaPops as $pops) { ?>
                    <option value="<?= $pops['idpops']; ?>"
                            <?php if(isset($cliente) && $cliente['idpops']==$pops['idpops']) echo "selected"; ?>>
                        <?php echo $pops['idpops'] .' - ' .  $pops['nome']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>
            

 
     
                      
            <input type="submit" value="Salvar"/>  <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->