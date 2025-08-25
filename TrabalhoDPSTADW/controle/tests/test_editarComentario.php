<?


require_once "../conexao.php";
require_once "../funcoes.php";



$idcomentario = 1;
$comentario  = "Era melhor ter ido ver o filme do pelé";
$criado  = "1990-01-02" ;


editarComentario($conexao, $idcomentario, $comentario, $criado);


?>