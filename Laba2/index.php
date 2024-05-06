<?php
                                                                  
$data = array_map('str_getcsv', file('titanic.csv'));
$columns = array_shift($data);
$passengers = array();
foreach ($data as $row) {
    $passengers[] = array_combine($columns, $row);
}

function searchByAge($passengers, $age) {
    $results = array();
    foreach ($passengers as $passenger) {
        if ($passenger['Age'] == $age) {
            $results[] = $passenger;
        }
    }
    return $results;
}

    
function searchByName($passengers, $name) {
    $results = array();
    foreach ($passengers as $passenger) {
        if (preg_match("/$name/i", $passenger['Name'])) {
            $results[] = $passenger;
        }
    }
    return $results;
}


$age = isset($_GET['age']) ? $_GET['age'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';


if (!empty($age)) {
    $results = searchByAge($passengers, $age);
} elseif (!empty($name)) {
    $results = searchByName($passengers, $name);
} else {
    $results = $passengers;
}


$html = '<html>
<head>
    <title>Результаты поиска пассажиров</title>
</head>
<body>
    <h1>Результаты поиска пассажиров</h1>
    <table>
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
        </tr>';
foreach ($results as $result) {
    $html .= '<tr>
                <td>'.$result['Name'].'</td>
                <td>'.$result['Age'].'</td>
            </tr>';
}
$html .= '</table>
</body>
</html>';


echo $html;
?>
