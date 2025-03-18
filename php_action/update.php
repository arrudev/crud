<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $crm = mysqli_escape_string($connect, $_POST['crm']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $especialidades = mysqli_escape_string($connect, $_POST['especialidades']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    if (empty($nome) || strpbrk($nome, '0123456789')) {
        $_SESSION['mensagem'] = "Erro ao atualizar. Nome inválido!";
    } elseif (empty($crm)) {
        $_SESSION['mensagem'] = "Erro ao atualizar. CRM inválido!";
    } elseif (empty($telefone) || !is_numeric($telefone)) {
        $_SESSION['mensagem'] = "Erro ao atualizar. Telefone inválido!";
    } elseif (empty($especialidades) || strpbrk($especialidades, '0123456789')) {
        $_SESSION['mensagem'] = "Erro ao atualizar. Especialidades inválidas!";
    } else {

        $sql = "UPDATE medicos SET nome = '$nome', crm = '$crm', telefone = '$telefone', especialidades = '$especialidades' WHERE id = '$id'";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar!";
        }
    }

    header('location: ../index.php');
    exit; 
endif;