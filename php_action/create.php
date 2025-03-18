<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $crm = mysqli_escape_string($connect, $_POST['crm']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $especialidades = mysqli_escape_string($connect, $_POST['especialidades']);

    if (empty($nome) || strpbrk($nome, '0123456789')) {
        $_SESSION['mensagem'] = "Erro ao cadastrar. Nome inválido!";
    } elseif (empty($crm)) {
        $_SESSION['mensagem'] = "Erro ao cadastrar. CRM inválido!";
    } elseif (empty($telefone) || !is_numeric($telefone)) {
        $_SESSION['mensagem'] = "Erro ao cadastrar. Telefone inválido!";
    } elseif (empty($especialidades) || strpbrk($especialidades, '0123456789')) {
        $_SESSION['mensagem'] = "Erro ao cadastrar. Especialidades inválidas!";
    } else {

        $sql = "INSERT INTO medicos (nome, crm, telefone, especialidades) VALUES ('$nome', '$crm', '$telefone', '$especialidades')";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
        }
    }

    header('location: ../index.php');
    exit; 
endif;
