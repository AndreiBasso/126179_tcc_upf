
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
                    <label>Voltagem: *</label>
                    <input class="form-control" type="text" name="vol" required 
                           value="<?php if (isset($pops)) echo $pops['vol']; ?>"/> 
                </div>  
                <div class="form-group">
                    <label>Acesso: **</label>
                    <input class="form-control" type="text" name="acesso" required 
                           value="<?php if (isset($pops)) echo $pops['acesso']; ?>"/>
                </div>  
                * Somente permetido valores (-48,110,220)
                <p></p>
                ** Somente permetido valores (Liberado, Restrito)
                <p></p>
                <input type="submit" value="Salvar"/> 
            </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
            
        