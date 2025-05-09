<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instanciar App
$app = AppFactory::create();

// Middleware de errores
$app->addErrorMiddleware(true, true, true);

// Ruta principal
$app->get('/', function (Request $request, Response $response) {
    // Conexión a la base de datos SQLite
    $db = new PDO('sqlite:' . __DIR__ . '/db/music.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar todos los músicos
    $stmt = $db->query('SELECT * FROM music');
    $musicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Incluir Bootstrap en el head
    $html = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Músicos Carismáticos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Lista de Músicos Carismáticos</h1>
        <ul class="list-group">';

    // Mostrar músicos como ítems horizontales
    foreach ($musicos as $musico) {
        $html .= '<li class="list-group-item d-flex align-items-center">';
        $html .= '<img src="' . htmlspecialchars($musico['imagen']) . '" alt="' . htmlspecialchars($musico['nom']) . '" class="img-thumbnail me-4" style="width: 120px; height: auto;">';
        $html .= '<div>';
        $html .= '<h5 class="mb-1">' . htmlspecialchars($musico['nom']) . '</h5>';
        $html .= '<h6 class="text-muted">' . htmlspecialchars($musico['estilo']) . '</h6>';
        $html .= '<p class="mb-0">' . htmlspecialchars($musico['descripcion']) . '</p>';
        $html .= '</div>';
        $html .= '</li>';
    }

    $html .= '</ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';

    $response->getBody()->write($html);
    return $response;
});

$app->run();
