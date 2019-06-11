<?php

/* Подключение к серверу MySQL */
$mysqli = new mysqli('localhost', 'user', 'password', 'world');

if (mysqli_connect_errno()) {
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
   exit;
}

// пример insert

// INSERT INTO City (ID, Name) VALUES (NULL, 'Calgary');

/* Посылаем запрос серверу */
if ($result = $mysqli->query('SELECT Name, Population FROM City ORDER BY Population DESC LIMIT 5')) {

    print("Очень крупные города:\n");

    /* Выбираем результаты запроса: */
    while( $row = $result->fetch_assoc() ){
        printf("%s (%s)\n", $row['Name'], $row['Population']);
    }

    /* Освобождаем память */
    $result->close();
}

/* Закрываем соединение */
$mysqli->close();
?>
