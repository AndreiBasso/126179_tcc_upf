
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manutenção de Pops
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
        <li class="active">Pops</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content box">
      <form name="pops" action="<?= $acao; ?>" method="POST">
<!--                <div class="form-group">
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" readonly
                           value="<?php if (isset($pops)) echo $pops['idpops']; ?>"/> 
                </div> -->
                <div class="form-group">
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nome" required 
                           value="<?php if (isset($pops)) echo $pops['nome']; ?>"/> 
                </div>
                 <div class="form-group">
                    <label>Descrição do Pop:</label>
                    <input class="form-control" type="text" name="descricao" required 
                           value="<?php if (isset($pops)) echo $pops['descricao']; ?>"/> 
                </div>  
                <div class="form-group">
                    <label>Endereço:</label>
                    <input class="form-control" type="text" name="endereco" required 
                           value="<?php if (isset($pops)) echo $pops['endereco']; ?>"/>
                </div>  
            <div class="form-group">
                <label>Responsavel Técnico :</label>
                <select name="idfuncionarios" class="form-control">
                    <?php foreach ($listaFuncionarios as $funcionarios) { ?>
                    <option value="<?= $funcionarios['idfuncionarios']; ?>"
                            <?php if(isset($pops) && $pops['idfuncionarios']==$funcionarios['idfuncionarios']) echo "selected"; ?>>
                        <?php echo $funcionarios['idfuncionarios'] .' - ' .  $funcionarios['nomefuncionarios']; ?>
                    </option>    
                    <?php } ?>
                </select>
            </div>


                <div class="form-group">
                <label for='permissao'>Voltagem:</label><br>
                 <input type="radio" name="vol" value="-48" <?php if (isset($pops) && $pops['vol']==='-48') echo "checked"; ?>> -48
                 <input type="radio" name="vol" value="110" <?php if (isset($pops) && $pops['vol']==='110') echo "checked"; ?>> 110
                 <input type="radio" name="vol" value="220" <?php if (isset($pops) && $pops['vol']==='220') echo "checked"; ?>> 220
         
            </div> 
                

                <div class="form-group">
                <label for='permissao'>Acesso:</label><br>
                 <input type="radio" name="acesso" value="Liberado" <?php if (isset($pops) && $pops['acesso']==='Liberado') echo "checked"; ?>> Liberado 
                 <input type="radio" name="acesso" value="Restrito" <?php if (isset($pops) && $pops['acesso']==='Restrito') echo "checked"; ?>> Restrito
         
            </div> 

               
                <input type="submit" value="Salvar"/> 
            </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
            
        