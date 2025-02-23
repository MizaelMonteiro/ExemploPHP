<?php
    // O PHP inicia o processamento aqui, antes de enviar qualquer conteúdo HTML para o navegador.
    // Recebe os valores enviados pelo formulário via método GET.
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operador = $_GET['operador'];
    
    // Inicializa as variáveis para o resultado e para possíveis mensagens de erro.
    $resultado = null;
    $error = '';

    // Verifica se os parâmetros 'num1', 'num2' e 'operador' foram enviados
    // e se os valores de 'num1' e 'num2' são numéricos.
    if (isset($_GET['num1'], $_GET['num2'], $_GET['operador']) && is_numeric($num1) && is_numeric($num2)) {
        // Utiliza a estrutura 'switch' para selecionar a operação de acordo com o operador.
        switch ($operador) {
            case '+':
                $resultado = $num1 + $num2; // Soma
                break;
            case '-':
                $resultado = $num1 - $num2; // Subtração
                break;
            case '*':
                $resultado = $num1 * $num2; // Multiplicação
                break;
            case '/':
                // Verifica se o divisor é zero para evitar divisão por zero.
                if ($num2 == 0) {
                    $error = "Divisão por zero não é permitida!";
                } else {
                    $resultado = $num1 / $num2; // Divisão
                }
                break;
            default:
                // Caso o operador não seja um dos esperados.
                $error = "Operador inválido!";
                break;
        }
    } else {
        // Caso algum valor não seja numérico ou os parâmetros não tenham sido enviados.
        $error = "Por favor, insira números válidos.";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples em PHP</title>
    <!-- Link para o arquivo CSS de estilo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Calculadora Simples</h1>
    <!-- Formulário que coleta os números e o operador; usa o método GET para enviar os dados via URL -->
    <form action="" method="get">
        <label for="num1">Número 1:</label>
        <input type="text" id="num1" name="num1" required>
        <br><br>
        
        <label for="operador">Operador:</label>
        <select id="operador" name="operador" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">x</option>
            <option value="/">÷</option>
        </select>
        <br><br>
        
        <label for="num2">Número 2:</label>
        <input type="text" id="num2" name="num2" required>
        <br><br>
        
        <button type="submit">Calcular</button>
    </form>

    <!-- Seção para exibir o resultado da operação ou mensagens de erro -->
    <section name="resultado">
        <!-- Se houver erro, poderia ser exibido aqui; neste exemplo, apenas o resultado é mostrado -->
        <p>Resultado é <?=$resultado?></p>
    </section>
</body>
</html>
