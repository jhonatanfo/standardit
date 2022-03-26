<?php  
    include_once("../../config/conn.php");
    $id_form = $_POST["id"];
    $sql = "SELECT * FROM ideal_formulario where id_form = $id_form"; 
    $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
    $id_form = $sql["id_form"]; 
    $nome = $sql["nome"];
    $telefone = $sql["telefone"];
    $email  = $sql["email"];
    $origem = $sql["origem"];
    $mensagem = $sql["mensagem"];
?>

  <tr>
    <td><strong>Nome</strong></td>
    <td><?= $nome; ?></td>
  </tr> 
  <tr>
    <td><strong>E-mail</strong></td>
    <td><?= $email; ?></td>
  </tr> 
  <tr>
    <td><strong>Telefone</strong></td>
    <td><?= $telefone; ?></td>
  </tr>
  <tr>
    <td><strong>Origem</strong></td>
    <td><?= $origem; ?></td>
  </tr>
  <tr>
    <td valign="top" style="vertical-align: initial;"><strong>Mensagem</strong></td>
    <td style="white-space: inherit;"><?= $mensagem; ?></td>
  </tr>
<?php } ?>