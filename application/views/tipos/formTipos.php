<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Manutenção de Tipos

            <br></br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manutenção</a></li>
            <li class="active">Tiposs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content box">

        <!-- Your Page Content Here -->


        <form name="tipos" action="<?= $acao; ?>" method="POST">
            <!--            <div class="form-group">
                            <label>Id</label>
                            <input class="form-control" type="text" name="idservicos" readonly
                                   value="<?php if (isset($tipos)) echo $tipos['idtipos']; ?>"/> 
                        </div>-->
            <div class="form-group">
                <label for='nometipos'>Nome:</label>
                <input class="form-control" type="text" name="nometipos" required 
                       value="<?php if (isset($tipos)) echo $tipos['nometipos']; ?>"/>
            </div>   
            
     
            
            <div class="form-group">
                <label for='situacao'>Tempo:</label><br>
                <input type="radio" name="tempo" value="24:00:00" <?php if (isset($tipos) && $tipos['tempo'] === '24:00:00') echo "checked"; ?>> <b>1 Dia</b>
                <input type="radio" name="tempo" value="48:00:00" <?php if (isset($tipos) && $tipos['tempo'] === '48:00:00') echo "checked"; ?>> <b>2 Dias</b>
                <input type="radio" name="tempo" value="72:00:00" <?php if (isset($tipos) && $tipos['tempo'] === '72:00:00') echo "checked"; ?>> <b>3 Dias</b>
                <input type="radio" name="tempo" value="96:00:00" <?php if (isset($tipos) && $tipos['tempo'] === '96:00:00') echo "checked"; ?>> <b>4 Dias</b>

            </div>


            <input type="submit" value="Enviar"/> <a href="index">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->