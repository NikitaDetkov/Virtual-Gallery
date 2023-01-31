<?php
    if (isset($_COOKIE['username'])) $Username = $_COOKIE['username'];
    if (isset($_COOKIE['role'])) $Role = $_COOKIE['role'];

    if (isset($_POST['Gothic'])) $Style = 'Gothic';
    else if (isset($_POST['Classicism'])) $Style = 'Classicism';
    else if (isset($_POST['Baroque'])) $Style = 'Baroque';
    else if (isset($_POST['Renaissance'])) $Style = 'Renaissance';
    else if (isset($_POST['Avant-gardism'])) $Style = 'Avant - gardism';
    else if (isset($_POST['Impressionism'])) $Style = 'Impressionism';
    else if (isset($_POST['Futurism'])) $Style = 'Futurism';
    else if (isset($_POST['Pop_art'])) $Style = 'Pop art';

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

    $sql = "SELECT * FROM ARTS WHERE Style_art = '$Style';";
    $result = $conn->query($sql);
    $conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_files/style_menu.css">
    <link rel="stylesheet" href="./css_files/style_top_menu.css">
    <link rel="stylesheet" href="./css_files/style_footer.css">
    <script src="./js_files/scripts_menu.js" defer></script>
    <title>Virtual Gallery. <?php echo $Style; ?></title>
</head>
<body
    <?php 
        $height = 1800 + 500 * $result->num_rows;
        echo "style='height:"."$height"."px;'"; 
    ?>
>


    <div class="container">
        <section class="gallery">

            <div class="frame frame_bg">
                <div class="frame_content">
                    <h2 class="no_transfer">
                        <?php
                            echo $Style;
                        ?>
                    </h2>
                </div>
            </div>

            <div class="frame"></div>

            <?php

                if ($result) {
                    // Если есть картины данного стиля, выведим записи о них
                    $Position_text = 'right'; // Положение текста
                    $Position_img = 'left'; // Положение изображения
                    if ($result->num_rows > 0) {
                        foreach($result as $row){
                            $Name_art = $row['Name_art'];
                            $Style_art = $row['Style_art'];
                            $Date_art = $row['Date_art'];
                            $Artist_art = $row['Artist_art'];
                            $Img_art = $row['Img_art'];



                            echo "<div class='frame'></div>
                                <div class='frame'>
                                    <div class='frame_content info_text-$Position_text'>
                                        <p class='name_art no_mt'>$Name_art</p>
                                        <p>$Artist_art</p>
                                        <p class='no_mt'>$Style_art</p>
                                        <p class='no_mt'>$Date_art</p>
                                    </div>
                                </div>                    
                                <div class='frame frame_bg'>
                                    <div class='frame_content'>
                                        <div class='frame-media_arts frame-media_$Position_img'><img src='./Img/$Img_art' class='img_art'></div>
                                    </div>
                                </div>";

                            // Поменяем значения позиций
                            $Position_ = $Position_text;
                            $Position_text = $Position_img;
                            $Position_img = $Position_;
                        }
                    } 
                    else {
                        echo "<div class='frame frame_bg'>
                                <div class='frame_content'>
                                    Artistic works are missing!
                                </div>
                            </div>";
                    }
                }
                else {
                    echo 'Error. No data received: ' . $conn->error;
                }   
            ?>

            <div class="frame"></div>
            <div class="frame"></div>

            <div class="frame">
                <div class="frame_content">
                    &copy; Detkov Nikita
                </div>
            </div>            
        </section>

        <div class="top_menu position2">
            
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
            <div class="top_menu_info">direction:
                <?php echo " " . $Style; ?>
            </div>
        </div>
    </div>

    <footer class="footer position">        
        <div class="footer-info">
            <div class="footer-info_text">&copy Nikita Detkov</div>
            <div class="footer-info_text border_left">vasyanikita55@gmail.com</div>
            <div class="footer-info_text border_left">2022</div>
        </div>
    </footer>
</body>
</html>