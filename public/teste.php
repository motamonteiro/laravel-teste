<?php
$matriz = [
    ['.', '#', '#', '#', '.', '.'],
    ['.', '#', '.', '.', '#', '.'],
    ['.', '#', '#', '#', '.', '.'],
    ['.', '#', '.', '.', '.', '.'],
];

$config = [
    'corFundo' => '.',
    'novaCor' => 'o',
    'pixelClicado' => [0, 1],
    'maxLinha' => count($matriz),
    'maxColuna' => count($matriz[0])
];

imprimir($matriz);
$corPixelClicado = getConteudoPixel($matriz, $config['pixelClicado']);
$matriz = pintarPixelEmCruz($matriz, $config['pixelClicado'], $config['novaCor'], $corPixelClicado);
$matriz = pintarMatriz($matriz, $config, $corPixelClicado);
imprimir($matriz);

function pintarMatriz($matriz, $config, $corPixelClicado)
{
    $matrizInicial = $matriz;
    for ($l = 0; $l < $config['maxLinha']; $l++) {
        for ($c = 0; $c < $config['maxColuna']; $c++) {
            if (getConteudoPixel($matriz, [$l, $c]) == $config['novaCor']) {
                $matriz = pintarPixelEmCruz($matriz, [$l, $c], $config['novaCor'], $corPixelClicado);
            }
        }
    }

    if ($matrizInicial != $matriz) {
        return pintarMatriz($matriz, $config, $corPixelClicado);
    }

    return $matriz;
}

function pintarPixelEmCruz($matriz, $cursor, $cor, $corPixelClicado)
{

    $cursorNorte = @($matriz[$cursor[0] - 1][$cursor[1]]) ? [$cursor[0] - 1, $cursor[1]] : '';
    $cursorSul = @($matriz[$cursor[0] + 1][$cursor[1]]) ? [$cursor[0] + 1, $cursor[1]] : '';
    $cursorLeste = @($matriz[$cursor[0]][$cursor[1] + 1]) ? [$cursor[0], $cursor[1] + 1] : '';
    $cursorOeste = @($matriz[$cursor[0]][$cursor[1] - 1]) ? [$cursor[0], $cursor[1] - 1] : '';

    $corNorte = ($cursorNorte) ? getConteudoPixel($matriz, $cursorNorte) : '';
    $corSul = ($cursorSul) ? getConteudoPixel($matriz, $cursorSul) : '';
    $corLeste = ($cursorLeste) ? getConteudoPixel($matriz, $cursorLeste) : '';
    $corOeste = ($cursorOeste) ? getConteudoPixel($matriz, $cursorOeste) : '';

    $matriz = pintarPixel($matriz, [$cursor[0], $cursor[1]], $cor);
    $matriz = ($corNorte == $corPixelClicado) ? pintarPixel($matriz, [$cursorNorte[0], $cursorNorte[1]], $cor) : $matriz;
    $matriz = ($corSul == $corPixelClicado) ? pintarPixel($matriz, [$cursorSul[0], $cursorSul[1]], $cor) : $matriz;
    $matriz = ($corLeste == $corPixelClicado) ? pintarPixel($matriz, [$cursorLeste[0], $cursorLeste[1]], $cor) : $matriz;
    $matriz = ($corOeste == $corPixelClicado) ? pintarPixel($matriz, [$cursorOeste[0], $cursorOeste[1]], $cor) : $matriz;

    return $matriz;
}

function pintarPixel($matriz, $cursor, $cor)
{
    $matriz[$cursor[0]][$cursor[1]] = $cor;
    return $matriz;
}


function getConteudoPixel(array $matriz, $pixel)
{
    return $matriz[$pixel[0]][$pixel[1]];
}

function imprimir(array $matriz)
{
    foreach ($matriz as $linha) {
        foreach ($linha as $pixel) {
            echo $pixel;
        }
        echo PHP_EOL;
    }
}
