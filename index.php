<?php
    // Удаление cockie
    unset($_COOKIE['username']);
    setcookie('username', '', -1, '/');
    unset($_COOKIE['role']);
    setcookie('role', '', -1, '/');
    // Удаление глобальных переменных
    $GLOBALS['message'] = '';
    unset($GLOBALS['message']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Gallery. Input</title>
    <link rel="stylesheet" href="./css_files/styles.css">
    <link rel="stylesheet" href="./css_files/style_footer.css">
</head>
<body>
    <div class="heading">Virtual Gallery</div>
    <form action="index_script.php" method="post">
        <div class="container">
            <div class="container_center">
                <div>
                    <div class="container_enter bottom_margin">
                        <div class="comment right_margin">Username</div>
                        <input type="text" name="username" class="inp_text">                    
                    </div>
                    <div class="container_enter">
                        <div class="comment right_margin">Password</div> 
                        <input type="text" name="password" class="inp_text">
                    </div>                
                </div>
            </div>

            <div class="container_center">
                <div>
                    <div class="container_enter_center">
                        <div class="comment bottom_margin">Key for registration of the admin</div>
                        <input type="text" name="password_admin" class="inp_text">            
                    </div>
                    <div class="container_buttons">
                        <input type ="submit" class="button right_margin" value="Register" name="Register">
                        <input type ="submit" class="button left_margin" value="Enter" name="Enter">
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