<?php
session_start(); //é um comando usado para iniciar ou continuar uma sessão.;
//Sessão : Uma maneira de salvar informações sobre o usuário (como nome ou login) enquanto ele navega no site.;
//Sem isso, o site "esqueceria" quem é o usuário ao mudar de página, e teria que pedir para você fazer login de novo.;
if (isset($_SESSION['logado'])) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controle/verificarLogin.php" method="post">
        <h1>Login</h1>

        Email: <br>
        <input type="text" name="gmail"> <br><br>

        Senha: <br>
        <input type="password" name="senha"> <br><br>



        <input href="../controle/verificarLogado.php" type="submit" value="Acessar">
        <br><br>

        <a href="formUsuario.html">Cadastre-se</a>


    </form>
    <br>


</body>

</html>