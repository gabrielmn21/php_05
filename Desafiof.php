<?php
// Array de filmes e seus gêneros
$filmes = [
    ["titulo" => "Alien: Covenant", "genero" => "Ficção Científica"],
    ["titulo" => "A Guerra do Amanhã", "genero" => "Ação"],
    ["titulo" => "A cabana", "genero" => "Drama"],
    ["titulo" => "Velozes e Furiosos", "genero" => "Ação"],
    ["titulo" => "Shrek", "genero" => "Animação"],
    ["titulo" => "Interestelar", "genero" => "Ação"],
    ["titulo" => "Carros", "genero" => "Animação"],
];

// Contagem de gêneros
$generos = [];
foreach ($filmes as $filme) {
    $generos[$filme["genero"]] = isset($generos[$filme["genero"]]) ? $generos[$filme["genero"]] + 1 : 1;
}

// Encontrar o gênero mais predominante
$generoPredominante = array_keys($generos, max($generos))[0];

// Criar a matriz filtrada
$filmesPredominantes = array_filter($filmes, function($filme) use ($generoPredominante) {
    return $filme["genero"] === $generoPredominante;
});
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes de 2021</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h1>Filmes Assistidos em 2021</h1>
<table>
    <tr>
        <th>Título</th>
        <th>Gênero</th>
    </tr>
    <?php foreach ($filmes as $filme): ?>
        <tr>
            <td><?= $filme["titulo"] ?></td>
            <td><?= $filme["genero"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Gênero Predominante: <?= $generoPredominante ?></h2>
<h3>Filmes do Gênero Predominante</h3>
<table>
    <tr>
        <th>Título</th>
        <th>Gênero</th>
    </tr>
    <?php foreach ($filmesPredominantes as $filme): ?>
        <tr>
            <td><?= $filme["titulo"] ?></td>
            <td><?= $filme["genero"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
