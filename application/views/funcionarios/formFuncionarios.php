<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Manutenção de Funcionários
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Funcionários</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="funcionarios" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="idfuncionarios" readonly
                       value="<?php if (isset($funcionarios)) echo $funcionarios['idfuncionarios']; ?>"/> 
            </div>-->
              <div class="form-group">
                <label for='nomefuncionarios'>Nome:</label>
                <input class="form-control" type="text" name="nomefuncionarios" required 
                       value="<?php if (isset($funcionarios)) echo $funcionarios['nomefuncionarios']; ?>"/>
            </div>   
            <div class="form-group">
                <label for='data'>Data da Admissão: (AAAA/MM/DD)</label>
                <input class="form-control" type="text" name="data" required 
                       value="<?php if (isset($funcionarios)) echo $funcionarios['data']; ?>"/>
            </div>                   
            <div class="form-group">
                <label for='telefone'>Telefone Celular:</label>
                <input class="form-control" type="tel" name="telefonefuncionarios" pattern="\(\d{2}\)\d{5}-\d{4}" required 
                       value="<?php if (isset($funcionarios)) echo $funcionarios['telefonefuncionarios']; ?>"/>
            </div>

            <div class="form-group">
                    <label>E-mail:</label>
                    <input class="form-control" type="text" name="emailfuncionarios" required 
                           value="<?php if (isset($funcionarios)) echo $funcionarios['emailfuncionarios']; ?>"/> 
                </div>  
               <div class="form-group">
                <label for='funcao'>Função:</label>
                <input class="form-control" type="text" name="funcao" required 
                       value="<?php if (isset($funcionarios)) echo $funcionarios['funcao']; ?>"/>
            </div>
      
            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->