<?php
if(isset($_GET["num"])) {
    $num = (int)$_GET["num"]; 
    if ($num < 1000)
    {
        for ($i = 2; $i <= $num; $i++) {
            $is_prime = true; 
        
            for ($j = 2; $j < $i; $j++) {
                if ($i % $j === 0) {
                    $is_prime = false; 
                    break; 
                }
            }

            if ($is_prime) {
                echo $i . " ";
            }
        }
    }
} elseif(isset($_GET["name"])) {
    $name = htmlspecialchars($_GET["name"]);
    echo 'Привет, ' . $name . '!';
}
?>