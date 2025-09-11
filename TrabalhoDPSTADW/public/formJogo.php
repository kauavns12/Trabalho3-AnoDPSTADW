<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controle/salvarJogo.php" method="post" enctype="multipart/form-data">
        <h1>Cadastro de Jogo</h1>
    
        Nome: <br>
        <input type="text" name="nome"> <br><br>
    
        descrição: <br>
        <input type="text" name="descricao"> <br><br>
        
        desenvolvedor: <br>
        <input type="text" name="nome"> <br><br>

        lançamento: <br>
        <input type="date" name="data_lanca"> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        

        <input type="submit" value="Acessar">
    </form>
    <br>

   
</body>
</html>
