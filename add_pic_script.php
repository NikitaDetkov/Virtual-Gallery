<?php
    // Подключение к MySQL -----------------------------------------------------
    $conn = new mysqli('localhost', 'root', 'mysql');
    if ($conn->connect_error) {
        die('Ошибка: ' . $conn->connect_error);
    }
    // echo 'Подключение успешно установлено' . '<br>';

    // Подключение к базе данных -----------------------------------------------
    $conn = new mysqli('localhost', 'root', 'mysql', 'db_gallery');
    if ($conn->connect_error) {
        die('Ошибка: ' . $conn->connect_error);
    }
    // echo 'Подключение к базе данных успешно установлено' . '<br>';



    if (isset($_POST['Download'])) {
        $Name_art = $conn->real_escape_string($_POST['name_art']);
        $Artist_art = $conn->real_escape_string($_POST['artist_art']);
        $Date_art = $conn->real_escape_string($_POST['date_art']);
        $Style_art = $conn->real_escape_string($_POST['style_art']);
        $Img_art = $_FILES['picture_art']['name'];

        if ($Name_art != '' && $Artist_art != '' && $Date_art != '' && $Style_art != '' && $Img_art != '') {
            // Проверка, существует ли картина с таким именем
            $sql = "SELECT * FROM ARTS WHERE Name_art = '$Name_art'"; 
            if ($result = $conn->query($sql)) {
                // Если существует картина, то выведем информацию об этом
                if ($result->num_rows > 0) {
                    $GLOBALS['message'] = 'Error! This art exists!';
                    include 'message.php';
                } 
                else {
                    AddImage($Name_art, $Style_art, $Date_art, $Artist_art, $Img_art, $conn);
                    include 'message.php';
                }
            }
            else {
                echo 'Error checking the existence of the picture: ' . $conn->error;
            }
        }
        else {
            // Выведем сообщение об ошибке
            $GLOBALS['message'] = 'Error! Empty fields!';
            include 'message.php';
        }
        
        
    }

    $conn->close();

    // Функции =======================================================================================
    // Функция добавления картинки
    function AddImage($Name_art, $Style_art, $Date_art, $Artist_art, $Img_art, $conn){
        // Путь загрузки
        $Path = './Img/';
        // Обработка запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Загрузка файла и вывод сообщения
            if (!@copy($_FILES['picture_art']['tmp_name'], $Path . $_FILES['picture_art']['name'])) {
                echo 'Error download';
            } 
            else {
                // echo 'Загрузка удачна';
                // Занесём данные о картине в базу данных
                $sql = "INSERT INTO ARTS(Name_art, Style_art, Date_art, Artist_art, Img_art) 
                    VALUES('$Name_art', '$Style_art', '$Date_art', '$Artist_art', '$Img_art');";        
                if ($conn->query($sql)) {
                    // echo 'Запись добавлена' . '<br>';
                    $GLOBALS['message'] = 'The download was successful!';
                } 
                else {
                    echo 'Ошибка: ' . $conn->error;
                }                  
            }        
        } 
    }
?>