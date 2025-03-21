<?php
//Header
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo Médico</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input id="nome" type="text" name="nome">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input id="crm" type="text" name="crm">
                <label for="crm">CRM</label>
            </div>

            <div class="input-field col s12">
                <input id="telefone" type="text" name="telefone">
                <label for="telefone">Telefone</label>
            </div>

            <div class="input-field col s12">
                <input id="especialidades" type="text" name="especialidades">
                <label for="especialidades">Especialidades</label>
            </div>

            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
            <a href="index.php" class="btn green"> Lista de médicos </a>
        </form>
    </div>
</div>

<?php
//Footer
include_once 'includes/footer.php';
?>