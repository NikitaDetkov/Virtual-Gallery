<?php 
    // Подключение к MySQL -----------------------------------------------------
    $conn = new mysqli('localhost', 'root', 'mysql');
    if ($conn->connect_error) {
        die('Error: ' . $conn->connect_error);
    }
    // echo 'Подключение успешно установлено' . '<br>';

    // Подключение к базе данных -----------------------------------------------
    $conn = new mysqli('localhost', 'root', 'mysql', 'db_gallery');
    if ($conn->connect_error) {
        die('Error: ' . $conn->connect_error);
    }
    // echo 'Подключение к базе данных успешно установлено' . '<br>';


    if (isset($_POST['Delete'])) {
        $Delete_art = $conn->real_escape_string($_POST['delete_art']);
        $Name_art = explode(',', $Delete_art, 2)[0];
        
        // Получение названия файла
        $sql = "SELECT * FROM ARTS WHERE Name_art = '$Name_art';";
        if ($result = $conn->query($sql)) {
            foreach($result as $row) {
                $Img_art = $row['Img_art'];
                break;
            }

            // Удаление выбранной записи
            $sql = "DELETE FROM ARTS WHERE Name_art = '$Name_art';";
            if ($result = $conn->query($sql)) {
                unlink('./Img/' . $Img_art);
                $GLOBALS['message'] = 'The removal was successful!';
                include 'message.php';
            }
            else {
                echo 'Error removing: ' . $conn->error;
            }            

        }
        else {
            echo 'Error removing: ' . $conn->error;
        }
    }

    $conn->close();
?>