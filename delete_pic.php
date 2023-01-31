<?php
    if (isset($_COOKIE['username'])) $Username = $_COOKIE['username'];
    if (isset($_COOKIE['role'])) $Role = $_COOKIE['role'];

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

    // Получим все записи
    $sql = "SELECT * FROM ARTS ORDER BY Style_art;";
    $result = $conn->query($sql);
    $conn->close();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Gallery. Removing an art picture</title>
    <link rel="stylesheet" href="./css_files/styles.css">
    <link rel="stylesheet" href="./css_files/style_top_menu.css">
    <link rel="stylesheet" href="./css_files/style_footer.css">
</head>
<body>
    <div class="top_menu">
        <div class="small_button">
            <img class="img_small_button" src="./Img/back_logo.png" alt="">
            <a class="input_small_button" href="menu.php"></a>
        </div>
        <div class="top_menu_info">username:
            <?php echo " " . $Username; ?>
        </div>
        <div class="top_menu_info">role:
            <?php echo " " . $Role; ?>
        </div>        
    </div>

    <div class="heading small_mb">Virtual Gallery</div>
    <form action="delete_pic_script.php" method="post">
        <div class="container">
            <div class="container_center">
                <div>
                    <div class="comment_block">Removing an art picture</div>
                    <div class="container_enter_center">    
                        <select class="inp_text inp_list_big" name = "delete_art">
                            <?php
                                if ($result) {
                                    if ($result->num_rows > 0) {
                                        foreach($result as $row) {
                                            $Name_art = $row['Name_art'];
                                            $Style_art = $row['Style_art'];
                                            $Date_art = $row['Date_art'];
                                            $Artist_art = $row['Artist_art'];

                                            echo "<option type='textre'>$Name_art, $Style_art, $Artist_art, $Date_art</option>";
                                        }   
                                    }

                                } 
                                else {

                                }
                            ?>
                        </select>       
                    </div>
                    <div class="container_buttons">
                        <input type ="submit" class="button" value="Remove" name="Delete">
                    </div>  
                </div>
            </div>
        </div>
    </form>
    
    <footer class="footer">
        <div class="footer-info">
            <div class="footer-info_text">&copy Nikita Detkov</div>
            <div class="footer-info_text border_left">vasyanikita55@gmail.com</div>
            <div class="footer-info_text border_left">2022</div>
        </div>
    </footer>
</body>
</html>
