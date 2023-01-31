<?php
    if (isset($_COOKIE['username'])) $Username = $_COOKIE['username'];
    if (isset($_COOKIE['role'])) $Role = $_COOKIE['role'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Gallery. Adding an art picture</title>
    <link rel="stylesheet" href="./css_files/style_top_menu.css">
    <link rel="stylesheet" href="./css_files/styles.css">
    <link rel="stylesheet" href="./css_files/style_footer.css">
    <script src="./js_files/scripts_file_selection.js" defer></script>
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

    <form method="post" action="add_pic_script.php" enctype="multipart/form-data">
        <div class="container">
            <div class="container_center">
                <div>
                    <div class="comment_block">Adding an art picture</div>
                    <div class="container_enter bottom_margin">
                        <div class="comment right_margin">Name</div>
                        <input type="text" name="name_art" class="inp_text">                    
                    </div>
                    <div class="container_enter bottom_margin">
                        <div class="comment right_margin">Artist</div> 
                        <input type="text" name="artist_art" class="inp_text">
                    </div>                    
                    <div class="container_enter bottom_margin">
                        <div class="comment right_margin">Date</div> 
                        <input tsype="text" name="date_art" class="inp_text">
                    </div> 
                    <div class="container_enter">
                    <div class="comment right_margin">Direction</div> 
                        <select class="inp_text inp_list" name = "style_art">
                            <option value="Gothic">Gothic</option>
                            <option value="Classicism">Classicism</option>
                            <option value="Baroque">Baroque</option>
                            <option value="Renaissance">Renaissance</option>
                            <option value="Avant - gardism">Avant - gardism</option>
                            <option value="Impressionism">Impressionism</option>
                            <option value="Futurism">Futurism</option>
                            <option value="Pop art">Pop art</option>
                        </select>
                    </div>                       
                </div>
            </div>            
            <div class="container_center">
                <div>
                    <div class="container_enter_center">
                        <div class="comment bottom_margin">Image to add</div>
                        <input id="input_file" class="input_file" type="file" name="picture_art">
                        <label id="file_name" class="file_name" for="input_file">Select a file</label>
                    </div>
                    <div class="container_buttons">
                        <input class="button" type="submit" value="Add picture" name="Download">
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
