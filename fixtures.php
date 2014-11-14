<?php

function execSQL($sql, \PDO $conn)
{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
}

try {
    // Parâmetros de conexão com o banco de dados
    require_once(__DIR__.'/src/FT/Sistema/Uteis/parametros.php');

    //------------------------ BANCO DE DADOS -------------------------------
    //conecta ao servidor mysql
    $conn = new \PDO("{$driver}:host={$host}", $dbUser, $dbPass);

    //cria o banco de dados se ainda não existir
    $sql = "CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
    execSQL($sql, $conn);

    //conecta ao banco de dados
    $conn = new \PDO("{$driver}:host={$host};dbname={$dbName}", $dbUser, $dbPass);

    //---------------------- PRODUTOS ---------------------------------
    //crie a tabela PRODUTOS se ela ainda não existir
    $sql = "CREATE TABLE IF NOT EXISTS `".$dbName."`.`produtos` (
         `id` int(10) NOT NULL AUTO_INCREMENT,
         `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
         `valor` double NOT NULL,
         `descricao` text COLLATE utf8_unicode_ci NOT NULL,
         PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    execSQL($sql, $conn);

    //apague qualquer conteúdo existente
    $sql = "TRUNCATE TABLE `".$dbName."`.`produtos`;";
    execSQL($sql, $conn);

    //inserindo dados na tabela PRODUTOS
    $sql = "INSERT INTO `".$dbName."`.`produtos` (`id`, `nome`, `valor`, `descricao`) VALUES
        (1, 'Fritadeira GF Airfryer', 599.90, 'Com a Fritadeira George Foreman Airfryer você frita, assa, tosta e grelha sem óleo, sem perder o sabor! Prepare alimentos mais saudáveis com esse produto versátil e saudável para preparar batatas fritas, carne, peixe, vegetais, e até mesmo bolos e cup cakes sem a necessidade de óleo. O aparelho possui janela para visualização do alimento durante o preparo e sistema halógeno de aquecimento e circulação de ar em alta velocidade. Vem com alça encaixável termoisolante (com trava de segurança) para retirada da cesta mantendo a distância entre a mão e as partes quentes. A fritadeira George Foreman Airfryer é fácil de limpar, acompanha bandeja coletora de resíduos e a cesta antiaderente pode ser retirada e lavada até mesmo na lava-louça. Possui temporizador de 60 minutos com desligamento automático e aviso sonoro, controle de temperatura ajustável de até 220ºC, pé de apoio antiderrapante e aquece por igual. Seu design exclusivo com painel elegante em aço inoxidável e coloração preta moderna vai deixar sua cozinha ainda mais sofisticada e atual. Vale a pena conferir!'),
        (2, 'iPhone 6 16GB Dourado', 3199.00, 'O iPhone 6 não é só maior, ele é melhor em todos os sentidos. É maior, muito mais fino, mais poderoso, e consome muito menos energia. A superfície de metal lisa se integra perfeitamente à nossa tela Multi-Touch mais avançada. É uma nova geração de iPhone melhor em tudo.'),
        (3, 'Console XBOX ONE 500GB', 1777.67, 'Poderoso. Divertido. Completo. Leve mais diversão e entretenimento para toda a família com o Xbox One. Além de um console de jogos de última geração, o XBOX ONE permite que você tenha acesso aos seus filmes, jogos e músicas favoritas sem precisar mudar as entradas na sua TV. Você pode gerenciar todas essas funções apenas com o comando da sua voz. '),
        (4, 'Multifuncional Epson Xp214', 299.00, 'Com a Multifuncional Epson Expression™ XP-214 você tem alta performance de impressão em tamanho compacto!');";
    execSQL($sql, $conn);

    echo "\nFixtures executadas com sucesso.\n";

} catch (\PDOException $ex) {
    die("Erro de conexão<br />Código: ".$ex->getCode()."<br />Mensagem: ".$ex->getMessage());
}
