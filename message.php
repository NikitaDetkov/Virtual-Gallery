<?php
    $Message = $GLOBALS['message'];
    if(isset($_POST['Enter']) || isset($_POST['Register'])) {
        $href = 'index.php';
    }
    else if(isset($_POST['Download'])) {
        $href = 'add_pic.php';
    } 
    else if(isset($_POST['Delete'])) {
        $href = 'delete_pic.php';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Gallery. Message</title>
    <link rel="stylesheet" href="./css_files/style_top_menu.css">
    <link rel="stylesheet" href="./css_files/styles.css">
    <link rel="stylesheet" href="./css_files/style_footer.css">
</head>
<body>
    <div class="heading">Virtual Gallery</div>
    
    <div class="comment">
        <?php
            echo $Message;
        ?>
    </div> 

    <div class="top_menu">
        <div class="small_button">
            <img class="img_small_button" src="./Img/back_logo.png" alt="">
            <?php
                echo "<a class='input_small_button' href=" . $href . '></a>';
            ?>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-info">
            <div class="footer-info_text">&copy Nikita Detkov</div>
            <div class="footer-info_text border_left">vasyanikita55@gmail.com</div>
            <div class="footer-info_text border_left">2022</div>
        </div>
    </footer>
</body>
</html>