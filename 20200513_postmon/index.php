<?php
//  include_once ('viacep.php');
    include_once ('postmon.php');
    $address = getAddress();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Consumindo API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="." method="post">
        <p>Digite o CEP para encontrar o endereço. </p>
        <input type="text" placeholder="Digite um CEP..." name="cep" value="<?php echo $address->cep ?>">
        <input type="submit" <?php echo $address->cep ?>>
        <input type="text" placeholder="rua" name="rua"         value="<?php echo $address->logradouro  ?>">
        <input type="text" placeholder="Bairro" name="bairro"   value="<?php echo $address->bairro      ?>">
        <input type="text" placeholder="Cidade" name="cidade"   value="<?php echo $address->localidade  ?>">
        <input type="text" placeholder="Estado" name="estado"   value="<?php echo $address->uf          ?>">
    </form>
</body>

