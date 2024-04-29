<?php
$name = $_GET['name'];
if (isset($name)) {
    
    echo "Привет, " . htmlspecialchars($name ). "!";
} else {
    
    echo "Ошибка";  
}
;

