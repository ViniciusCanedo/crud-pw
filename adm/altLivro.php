<?php
    session_start();
    include_once("../servidor.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="container">
    <div class="row">
        <section class="col-md-2"></section>

        <?php
            $sql = " SELECT * FROM TB_LIVRO WHERE COD_LIV = " . $_GET["cod_liv"];
            $resp = $POO->query($sql);
            $campo = mysqli_fetch_array($resp); 
        ?>

        <section class="col-md-8">
            <h3 class="mt-5"> Alterar Livro </h2>

                <form action="procAltLivro.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cod_liv" value="<?php echo $campo["cod_liv"] ?>">    
                 
                
                <div class="form-group">
                        <label for="t">Titulo : </label>
                        <input type="text" class="form-control" id="t" name="titulo" 
                        value="<?php echo $campo["titulo_liv"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="desc">Descrição : </label>
                        <textarea name="desc" class="form-control" id="desc"><?php echo $campo["desc_liv"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ed">Editora : </label>

                        <?php
                            $sql = " SELECT * FROM tb_editora";
                            $resp = $POO->query($sql);
                        ?>

                        <select class="form-control" name="ed" id="ed">
                            <option>Selecione ...</option>
                            <?php
                                while($ed = $resp->fetch_array()){
                                    echo "<option value='" . $ed["cod_ed"] . "'";
                                    
                                    if($campo["cod_ed"] == $ed["cod_ed"]){
                                        echo "selected";
                                    }

                                    echo ">" . $ed["nome_ed"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group " style="width:30%;">
                        <label for="valor">Valor : </label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="valor" name="valor"
                            value="<?php echo $campo["valor_liv"] ?>"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </form>
        </section>
        <section class="col-md-2"></section>
    </div>
    </div>

</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
</html>