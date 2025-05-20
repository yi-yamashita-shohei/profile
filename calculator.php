<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>電卓</title>
</head>
<body>
    <h3>電卓</h3>
    <form method="post">
        数字1: <input type="number" name="number1" required><br><br>
        記号:
        <select name="symbol">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select><br><br>
        数字2: <input type="number" name="number2" required><br><br>
        <input type="submit" value="計算">
    </form>

    <h3>計算結果</h3>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $number1 = $_POST["number1"];
        $symbol  = $_POST["symbol"];
        $number2 = $_POST["number2"];
        $answer  = "";

        if (is_numeric($number1) && is_numeric($number2)) {
            switch ($symbol) {
                case '+':
                    $answer = $number1 + $number2;
                    break;
                case '-':
                    $answer = $number1 - $number2;
                    break;
                case '*':
                    $answer = $number1 * $number2;
                    break;
                case '/':
                    if ($number2 == 0) {
                        $answer = "エラー：0で割れません";
                    } else {
                        $answer = $number1 / $number2;
                    }
                    break;
                default:
                    $answer = "不正な演算子です";
            }
            echo "<p>結果：{$answer}</p>";
        } else {
            echo "<p>※ 数字を正しく入力してください</p>";
        }
    }
    ?>
</body>
</html>
