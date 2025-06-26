 <?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

     $tempo_ini = "2024-02-10 13:50:20";
     $tempo_fim = "2024-02-11 13:50:20";
     $usuario_idusuario = 1;

    salvarHistoricoJogo($conexao, $tempo_ini, $tempo_fim, $usuario_idusuario);
     
 ?>