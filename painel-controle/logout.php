<?php
// Inicie a sessão
session_start();

// Remova todas as variáveis de sessão
session_unset();

// Destrua a sessão
session_destroy();

// Responda com um JSON indicando sucesso
echo json_encode(['success' => true]);
?>