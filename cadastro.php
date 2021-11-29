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
            $nomeTeste = trim($nomeTeste);
            
            if($nomeTeste == $campoLogin){
                echo '<div id="userError">' . 'Esse usuario ja existe!' . '</div>';
                break;
                header ("refresh:10;url=loginScript.php");
            }else{
                $campoSenha = $_POST['campoSenha'];
                $campoData = $_POST['campoData'];
                $campoSaldo = $_POST['campoSaldo'];

                
                $campoDataN = date("d/m/Y", strtotime($campoData)); 

                $novoUser = fopen($qntTxt . '.txt', 'w');
                fwrite  ($novoUser, $campoLogin ."\n");
                fwrite  ($novoUser, $campoSenha ."\n");
                fwrite  ($novoUser, $campoDataN ."\n");
                fwrite  ($novoUser, $campoSaldo ."\n");

                
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
    <title>Página de Cadastro</title>
    <style>
        <?php include 'style.css';?>
    </style>
</head>
<body>
    <main>    
        <h1 style="text-align: center;">Página de Cadastro</h1> 
        <form action="#" method="post" class="form">
            <label for="campoLogin">Digite seu Login: </label>
            <input type="text" name="campoLogin" id="campoLogin" placeholder="Login..." required autocomplete="off">

            <label style="margin-top: 25px;" for="campoSenha">Digite sua Senha: </label>
            <input type="password" name="campoSenha" id="campoSenha" placeholder="Senha..." required autocomplete="off">
            
            <label style="margin-top: 25px;" for="campoData">Data de Nascimento: </label>
            <input type="date" name="campoData" id="campoData" placeholder="Data..." required autocomplete="off">

            <label style="margin-top: 25px;" for="campoSaldo">Digite seu Saldo: </label>
            <input type="text" name="campoSaldo" id="campoSaldo" placeholder="Saldo..." required autocomplete="off">

            <input style="margin-top: 25px;" type="submit" value="Cadastrar-se" class="btn">
            <a href="loginScript.php"><input style="margin-top: 5px;" type="button" value="Fazer Login" class="btn"></a>
        </form>
    </main>    

</body>
</html>