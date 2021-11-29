<?php
    session_start();
    if($_POST){
        $campoLogin = $_POST['campoLogin'];
        $campoSenha = $_POST['campoSenha'];

        $_SESSION['campoLogin'] = $campoLogin;
        $_SESSION['campoSenha'] = $campoSenha;

        $meuDiretorio = __DIR__ . DIRECTORY_SEPARATOR . "*.{txt}";
        $meusArquivos = glob($meuDiretorio, GLOB_BRACE);
        
        $qntTxt = count($meusArquivos);
        
        for($i = 0; $i < $qntTxt; $i++){

            $arquivos = fopen($i . ".txt","r");

            $nomeTeste = fgets($arquivos);
            $senhaTeste = fgets($arquivos);
            $nomeTeste = trim($nomeTeste);
            $senhaTeste = trim($senhaTeste);
            if($nomeTeste == $campoLogin && $campoSenha == $senhaTeste){
                $userR = file($i . ".txt");
                $_SESSION['idade'] = 2021 - intval(substr($userR[2], 6));
                $_SESSION['saldo'] = intval($userR[3]);
                header('Location: saldoScript.php');
            }else{
                echo '<div id="userError">' . 'Esse usuario nao existe' . '</div>';
                
            }
            fclose($arquivos);
        }
    }             
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <style>
        <?php include 'style.css';?>
    </style>
</head>
<body>
    <main>
        <h1 style="text-align: center;">Fazer Login</h1> 
        <form action="loginScript.php" method="post" class="form">
            <label for="campoLogin">Digite seu Login: </label>
            <input type="text" name="campoLogin" id="campoLogin" placeholder="Login..." required autocomplete="off">

            <label style="margin-top: 25px;" for="campoSenha">Digite sua Senha: </label>
            <input type="password" name="campoSenha" id="campoSenha" placeholder="Senha..." required autocomplete="off">

            <input style="margin-top: 25px;" type="submit" value="Login" class="btn">
            <a href="cadastro.php"><input style="margin-top: 5px;" type="button" value="Cadastre-se" class="btn"></a>
        </form>
    </main>
</body>
</html>