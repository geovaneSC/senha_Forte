<?php
// estamos verificado se a varivel length existe, se existe iremos executar o código
if(isset($_POST['length']) ){
    // parte das declarações das variaveis
    $length = intval($_POST['length']);
    $lowercase = isset($_POST['lowercase']);
    $uppercase = isset($_POST['uppercase']);
    $symbols = isset($_POST['symbols']);
    $numbers = isset($_POST['numbers']);
// parte das validações, caso o usuario não escolha nada iremos emitir um erro
    if(!$lowercase && !$uppercase && !$symbols && !$numbers){
        echo "Falha no gerador de senha. Escolha uma opção";
    }
// iremos definir alguns variaveis para guardar os valores de cada um
    $lowercase_chars = "abcdefghijkmnopqrstuvwxyz";
    $uppercase_chars = "ABCDEFGHIJKMNOPQRSTUVWXYZ";
    $symbols_chars = "!@#$%&*()_+=";
    $numbers_chars = "0123456789";
// variveis que iremos usar para guardar as nossas escolhas
    $password = "";
    $valid_optinos = "";
//se o usuario escolher letra Maiscula entra no if e joga os valores da variavel $lowercase_chars para dentro da variavel $valid_optinos 
    if($lowercase){
        $valid_optinos .= $lowercase_chars;
    }
//se o usuario escolher letra minuscula entra no if e joga os valores da variavel $uppercase_chars para dentro da variavel $valid_optinos 
    if($uppercase){
        $valid_optinos .= $uppercase_chars;
    }
//se o usuario escolher letra simbulos entra no if e joga os valores da variavel $symblos_chars para dentro da variavel $valid_optinos 
    if($symbols){
        $valid_optinos .= $symbols_chars;
    }
//se o usuario escolher letra números entra no if e joga os valores da variavel $numbers_chars para dentro da variavel $valid_optinos 
    if($numbers){
        $valid_optinos .= $numbers_chars;
    }
// parte do contador
    for($k = 0; $k < $length; $k++){
        $random_number = rand(0, strlen($valid_optinos) - 1);
        $password .= $valid_optinos[$random_number];
    }
    
} 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gerador de senha</title>
</head>
<body>
    <div class="container p-3  mt-5 mb-4 shadow bg-body-tertiary rounded">
    <?php if(isset($password)) {?>
        <h4>Nova senha:</h4>
        <input class="form-control" type="text" readonly value="<?php echo $password;?>">
    <?php }?>
    </div>
    <section class="container p-3 shadow bg-body-tertiary rounded">
    <h4>Gerar uma senha</h4>
    <form class="form" action="#" method="post">
       <p>
        <label class="label-control">Tamanho da senha</label>
        <input class="form-control" type="number" min="8" required value="16" name="length" placeholder="Tamanho da senha">
       </p>
       <p>
        <label class="label-control">Incluide Lowercase</label>
        <input class="form-check-input" type="checkbox" value="1" checked name="lowercase">
        <p class="border w-25 text-center">abcdefghijkmnopqrstuvwxyz</p>
       </p>
       <p>
        <label class="label-control">Include Uppercase</label>
        <input class="form-check-input" type="checkbox" value="1" checked name="uppercase">
        <p class="border w-25 text-center">ABCDEFGHIJKMNOPQRSTUVWXYZ</p>
       </p>
       <p>
        <label class="label-control">Include symbols</label>
        <input class="form-check-input" type="checkbox" value="1" checked name="symbols">
        <p class="border w-25 text-center">!@#$%&*()_+=</p>
       </p>
       <p>
        <label class="label-control">Include Numbers</label>
        <input class="form-check-input" type="checkbox" value="1" checked name="numbers">
        <p class="border w-25 text-center">0123456789</p>
       </p>
       <p>
        <button class="btn btn-outline-primary">Gerador</button>
       </p>
    </form>
    </section>
</body>
</html>