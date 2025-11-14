<?php

// Define a variável BASE_URL com o endereço base do sistema
// Essa variável é útil para criar links absolutos para imagens, estilos, scripts, etc.

$BASE_URL =
    "http://" .                        // Define o protocolo (http)
    $_SERVER['SERVER_NAME'] .          // Captura o nome do servidor (ex: localhost)
    dirname(                           // Obtém o diretório do arquivo atual
        $_SERVER['REQUEST_URI'] . '?'  // Captura a URI da requisição atual e adiciona um caractere "?" para evitar erro em diretórios raiz
    ) .
    '/';                               // Adiciona uma barra ao final para formar a URL completa

