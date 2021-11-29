<style>
    <?php include 'style.css';?>
</style>

<?php
    session_start();

    if ($_SESSION['idade'] < 18) {
        header('Location: https://www.toddynho.com.br');
        
    } else {
        if ($_SESSION['saldo'] > 0) {
            echo '<div class="pos">' . '&nbsp&nbsp' . 'Olá' . '&nbsp&nbsp' .  $_SESSION['campoLogin']  . '&nbsp&nbsp' .'seu saldo é de:' . '&nbsp&nbsp' . $_SESSION['saldo'] . '.' . '&nbsp&nbsp' . 'UAU' . '&nbsp&nbsp' . '</div>';
        } else {
            echo '<div class="neg">' . '&nbsp&nbsp' . 'Olá' . '&nbsp&nbsp' . $_SESSION['campoLogin'] . '&nbsp&nbsp' . 'seu saldo é de:' . '&nbsp&nbsp' . $_SESSION['saldo'] . '.' . '&nbsp&nbsp' . 'Fique tranquilo, tudo vai piorar' . '</div>';
        }
    }

   
?>