<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Manutenção de Equipamentos
            
            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Equipamentos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="equipamentos" action="<?= $acao; ?>" method="POST">
<!--            <div class="form-group">
                <label>Id</label>
                <input class="form-control" type="text" name="idequipamentos" readonly
                       value="<?php if (isset($equipamentos)) echo $equipamentos['idequipamentos']; ?>"/> 
            </div>-->
              <div class="form-group">
                <label for='nomeequipamentos'>Nome:</label>
                <input class="form-control" type="text" name="nomeequipamentos" required 
                       value="<?php if (isset($equipamentos)) echo $equipamentos['nomeequipamentos']; ?>"/>
            </div>   
            <div class="form-group">
                <label for='datacompra'>Data da Compra: (AAAA/MM/DD)</label>
                <input class="form-control" type="text" name="datacompra" required 
                       value="<?php if (isset($equipamentos)) echo $equipamentos['datacompra']; ?>"/>
            </div>                   
            <div class="form-group">
                <label for='quantidade'>Quantidade:</label>
                <input class="form-control" type="text" name="quantidade" required 
                       value="<?php if (isset($equipamentos)) echo $equipamentos['quantidade']; ?>"/>
            </div>        
            <div class="form-group">
                <label for='valor_unitario'>Valor Unitário:</label>
                <input class="form-control" type="text" name="valor_unitario" required 
                       value="<?php if (isset($equipamentos)) echo $equipamentos['valor_unitario']; ?>"/>
            </div>        
            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->