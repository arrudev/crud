<?php
// Sessão
session_start();
// Header
include_once 'includes/header.php';
// Conexão
include_once 'php_action/db_connect.php';
?>

<?php
if (empty($_GET['buscar'])):
    header('Location: index.php');
else:
    $pesquisa = $mysqli->real_escape_string($_GET['buscar']);
    $sql_code = "SELECT * FROM medicos WHERE nome LIKE '%$pesquisa%' OR crm LIKE '%$pesquisa%'";
    $sql_query = $mysqli->query($sql_code) or die ($_SESSION['mensagem'] = "Erro ao acessar o banco de dados!");
endif;
?>

<div class="row">
<div class="col s12 m6 push-m3">
<h2 class="light">Clínica</h2>

<form action="buscar.php" method="GET">
    <div class="box-search" style="display: flex; align-items: center;">
    <input type="text" name="buscar" placeholder="Pesquisar">
    <button class="btn-floating blue modal-trigger" style="margin-left: 10px;"><i class="material-icons">search</i></button>
    </div>
</form>

<table class="striped">
    <thead>
        <tr>
            <th>Médico:</th>
            <th>CRM:</th>
            <th>Telefone:</th>
            <th>Especialidades:</th>
        </tr>
    </thead>

<?php
if($sql_query->num_rows == 0):
    ?>
    <tr>
        <td colspan="5">Nenhum resultado encontrado</td>
    </tr>
    <?php
else:
    while($dados = $sql_query->fetch_assoc()) {
?>
            <tbody>
            <tr>
                    <td><?php echo "<em>Dr(a). </em>" . $dados['nome']; ?></td>
                    <td><?php echo $dados['crm']; ?></td>
                    <td><?php echo $dados['telefone']; ?></td>
                    <td><?php echo $dados['especialidades']; ?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                            <h3>Opa!</h3>
                            <p>Tem certeza que deseja excluir esse médico do banco de dados?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="php_action/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <button type="submit" name="btn-deletar" class="btn red">Sim.</button><a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                    </div>

                    </div>
                </tr>
            </tbody>

        <?php   
    }
endif;
?>

<?php
// Footer
include_once 'includes/footer.php';
?>