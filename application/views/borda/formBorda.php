<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Manutenção de Monitoramentos
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Monitoramentos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">
        <!-- Your Page Content Here -->


        <form name="borda" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="idborda" readonly
                       value="<?php if (isset($borda)) echo $borda['idborda']; ?>"/> 
            </div>-->
               <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nomeborda" required 
                           value="<?php if (isset($borda)) echo $borda['nomeborda']; ?>"/> 
                </div>
                   <div class="form-group">
                    <label>Ip:</label>
                    <input class="form-control" type="text" name="descri" required 
                           value="<?php if (isset($borda)) echo $borda['descri']; ?>"/> 
                </div>

            <div class="form-group">
                <label for='data'>Data da Instalação: (AAAA/MM/DD)</label>
                <input class="form-control" type="text" name="data" required 
                       value="<?php if (isset($borda)) echo $borda['data']; ?>"/>
            </div>  
            <div class="form-group">
                <label>Pop:</label>
                <select name="idpops" class="form-control">
                    <?php foreach ($listaPops as $pops) { ?>
                    <option value="<?= $pops['idpops']; ?>"
                            <?php if(isset($borda) && $borda['idpops']==$pops['idpops']) echo "selected"; ?>>
                        <?php echo $pops['idpops'] .' - ' .  $pops['nome']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>
             <div class="form-group">
                <label>Equipamento:</label>
                <select name="idequipamentos" class="form-control">
                    <?php foreach ($listaEquipamentos as $equipamentos) { ?>
                    <option value="<?= $equipamentos['idequipamentos']; ?>"
                            <?php if(isset($borda) && $borda['idequipamentos']==$equipamentos['idequipamentos']) echo "selected"; ?>>
                        <?php echo $equipamentos['idequipamentos'] .' - ' .  $equipamentos['nomeequipamentos']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>
                      

            <input type="submit" value="Enviar"/> 
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->