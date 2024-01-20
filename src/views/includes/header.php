<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Serviços | Home</title>
    <link rel="stylesheet" href="<?=LINK_CSS?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="header__navbar">
                <h2><a href="/" class="logo">Gerenciador de Serviços</a></h2>
                <ul class="menu">
                <li class="link--active"><a href="/">Início</a></li>
                <li class="menu__dropdown"><a href="#">Clientes</a>
                    <ul class="menu__dropdown__submenu">
                        <li><a href="<?=LINK_CLIENTE?>">Lista de clientes</a></li>
                        <li><a href="<?=LINK_CLIENTE_FORM?>">Cadastrar cliente</a></li>
                    </ul>
                </li>
                <li class="menu__dropdown"><a href="#">Serviços de Clientes</a>
                    <ul class="menu__dropdown__submenu">
                        <li><a href="#">Lista de serviços</a></li>
                        <li><a href="#">Cadastrar serviço</a></li>
                    </ul>
                </li>
                    <li class="menu__dropdown"><a href="#">Serviços</a>
                    <ul class="menu__dropdown__submenu">
                        <li><a href="<?=LINK_SERVICO?>">Lista de serviços</a></li>
                        <li><a href="<?=LINK_SERVICO?>/form">Cadastrar serviço</a></li>
                    </ul>
                </li>
                <li class="menu__dropdown"><a href="#">Categorias de Serviço</a>
                    <ul class="menu__dropdown__submenu">
                        <li><a href="#">Lista de fornecedores</a></li>
                        <li><a href="#">Cadastrar fornecedor</a></li>
                    </ul>
                </li>
                <li class="menu__dropdown"><a href="#">Fornecedores</a>
                    <ul class="menu__dropdown__submenu">
                        <li><a href="#">Lista de fornecedores</a></li>
                        <li><a href="#">Cadastrar fornecedor</a></li>
                    </ul>
                </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Main -->
    <main class="main">
        <div class="container">