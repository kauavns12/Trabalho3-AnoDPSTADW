 <?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

     $tempo_ini = "10.50";
     $tempo_fim = "30.10";
     $usuario_idusuario = 1;

    salvarHistoricoJogo($conexao, $tempo_ini, $tempo_fim, $usuario_idusuario);
     
 ?>