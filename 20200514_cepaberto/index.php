<?php
//  include_once ('viacep.php');
//  include_once ('postmon.php');
    include_once ('processa.php');
    $address = getAddress();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Consumindo API</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>

    <!-- CSS padrão -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-info">
    <div class="container m-4">
        <div class="row">
            <div class="col-12 form-group" align="center">
                <?php     
                    echo "<pre>";
                        var_dump($address);
                    echo "</pre>";
                ?>
                <form action="." method="post">
                    <label for="fonte">Fonte de Busca:</label><br>

                    <select name="fonte">
                        <option value="viacep">ViaCep/PostMon</option>
                        <option value="cepaberto">CepAberto</option>
                    </select><br><br>

                    <h6>Digite o CEP para encontrar o endereço. </h6><br>

                    <input class="m-2" type="text" placeholder="Digite um CEP..." name="cep" value="<?php echo $address->cep ?>"><br>
                    <input class="m-2" type="submit" <?php echo $address->cep ?>><br>
                    <input class="m-2" type="text" placeholder="rua" name="rua"         value="<?php echo $address->logradouro  ?>"><br>
                    <input class="m-2" type="text" placeholder="Bairro" name="bairro"   value="<?php echo $address->bairro      ?>"><br>
                    <input class="m-2" type="text" placeholder="Cidade" name="cidade"   value="<?php echo $address->localidade  ?>"><br>
                    <input class="m-2" type="text" placeholder="Estado" name="estado"   value="<?php echo $address->uf          ?>"><br>
                </form>
            </div>
        </div>
    </div>
</body>

