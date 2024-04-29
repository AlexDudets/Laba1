<!DOCTYPE html>
<html>
<head>
    <title>Умножение чисел</title>
</head>
<body>
    <h2>Умножение чисел</h2>
    <form method="post">
        <label for="num1">Первое число:</label>
        <input type="number" id="num1" name="num1" required>
        <br>
        <label for="num2">Второе число:</label>
        <input type="number" id="num2" name="num2" required>
        <br>
        <button type="submit">Умножить</button>
    </form>

    <?php
    if(isset($_POST['num1']) && isset($_POST['num2'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1 * $num2;

        $num1_str = (string)$num1;
        $num2_str = (string)$num2;
        $result_str = (string)$result;

        $num1_len = strlen($num1_str);
        $num2_len = strlen($num2_str);
        $result_len = strlen($result_str);

        $max_len = max($num1_len, $num2_len, $result_len);

        echo "<h3>Результат умножения:</h3>";
        echo "<pre>";
        echo str_repeat(" ", $max_len - $num1_len) . $num1 . "\n";
        echo str_repeat(" ", $max_len - $num2_len) . $num2 . "\n";
        echo str_repeat("-", $max_len) . "\n";
        for ($i = $num2_len - 1; $i >= 0; $i--) {
            $digit2 = $num2_str[$i];
            $temp_result = $num1 * $digit2 * pow(10, $num2_len - $i - 1);
            echo str_repeat(" ", $max_len - strlen($temp_result)) . $temp_result . "\n";
        }
        echo str_repeat("-", $max_len) . "\n";
        echo $result . "\n";
        echo "</pre>";
    }
    ?>
</body>
</html>