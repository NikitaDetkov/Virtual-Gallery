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
    <link rel="stylesheet" href="./css_files/style_menu.css">
    <link rel="stylesheet" href="./css_files/style_top_menu.css">
    <link rel="stylesheet" href="./css_files/style_footer.css">
    <script src="./js_files/scripts_menu.js" defer></script>
    <title>Virtual Gallery. Menu</title>
</head>
<body>
    <form action="gallery.php" method="post">
        <div class="container">
            <section class="gallery">
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <h2>Virtual Gallery</h2>
                    </div>
                </div>
    
                <div class="frame"></div>
    
                <div class="frame">
                    <div class="frame_content">
                        <div class="frame-media frame-media_right" style="background-image: url(./Img/gall1.jpg);"></div>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_left" style="background-image: url(./Img/gall2.jpg);"></div>
                    </div>
                </div>
    
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Gothic">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-right">
                        <h3>Gothic</h3>
                        <p>Gothic is a period in the development of medieval art in Western, 
                            Central and partly Northern and Eastern Europe from the XI — XII to the XV—XVI centuries. 
                            The Gothic style originated in France. The most striking expression and the main features 
                            of this style are elegance, aspiration upward, rich decorative decoration.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_left" style="background-image: url(./Img/got1.jpg);"></div>
                    </div>
                </div>
    
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Classicism">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-left">
                        <h3>Classicism</h3>
                        <p>Classicism is an artistic style and aesthetic direction in the European 
                            culture of the XVII—XIX centuries. Classicism is a worldview, 
                            an ideology that reflects a person's natural 
                            desire for beauty, integrity, simplicity and clarity of content and form.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_right" style="background-image: url(./Img/cls1.jpg);"></div>
                    </div>
                </div>      
                
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Baroque">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-right">
                        <h3>Baroque</h3>
                        <p>Baroque painting is a conditional generalizing name of paintings from different countries 
                            of the epoch of the XVII—XVIII centuries. The Baroque artistic style is characterized 
                            by dynamics, tension, contrast of forms and colors, expressiveness, heightened sensuality, 
                            the desire for the greatness of the created images, to combine reality and illusion.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_left" style="background-image: url(./Img/bar1.jpg);"></div>
                    </div>
                </div>      
                
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Renaissance">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-left">
                        <h3>Renaissance</h3>
                        <p>The Renaissance is the period that began around the 14th century and ended 
                            at the late 16th century, traditionally associated primarily with the Italian region. 
                            The ideas and images of the Renaissance largely determined 
                            the aesthetic ideals of modern man, his sense of harmony, measure and beauty.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_right" style="background-image: url(./Img/ren1.webp);"></div>
                    </div>
                </div>      
                
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Avant-gardism">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-right">
                        <h3>Avant - gardism</h3>
                        <p>Avant-gardism in art is a conventional name for artistic movements and 
                            the mentality of artists of the twentieth century, which are characterized by 
                            the desire for a radical renewal of artistic practice, 
                            a break with its established principles and traditions, 
                            the search for new unusual means of expressing the form and content of works.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_left" style="background-image: url(./Img/avn1.jpg);"></div>
                    </div>
                </div>      
                
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Impressionism">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-left">
                        <h3>Impressionism</h3>
                        <p>Impressionism is an artistic trend of the 19th century characterized by relatively small, 
                            subtle, but noticeable brushstrokes, open composition, an emphasis on the accurate 
                            representation of light in its changing qualities, an ordinary object, unusual angles of vision and 
                            the inclusion of movement as an essential element of human perception and experience.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_right" style="background-image: url(./Img/imp1.jpg);"></div>
                    </div>
                </div>      
                
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Futurism">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-right">
                        <h3>Futurism</h3>
                        <p>Futurism is the current of avant—garde art of the 1910s - early 1920s, 
                            primarily in poetry and painting in Italy and Russia. Futurists "scornfully rejected the past, 
                            traditional culture in all its manifestations and glorified the future — 
                            the coming era of industrialism, technology, high speeds and the pace of life".
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_left" style="background-image: url(./Img/fut1.jpg);"></div>
                    </div>
                </div>      
                
                <div class="frame">
                    <input class="button_direction" type="submit" value="" name="Pop_art">
                </div>
    
                <div class="frame">
                    <div class="frame_content text-left">
                        <h3 class="no_transfer">Pop art</h3>
                        <p>Pop art is a trend in the visual arts of Western Europe and the USA of the late 1950s and 1960s. 
                            Pop art used images of consumer products as the main subject and image. 
                            In fact, this trend in art has replaced traditional visual creativity with 
                            the demonstration of various objects of mass culture or the material world.
                        </p>
                    </div>
                </div>
    
                <div class="frame frame_bg">
                    <div class="frame_content">
                        <div class="frame-media frame-media_right" style="background-image: url(./Img/pop1.webp);"></div>
                    </div>
                </div>      
                
                <div class="frame"></div>      
                <div class="frame"></div>
    
                <div class="frame">
                    <div class="frame_content">
                        &copy; Detkov Nikita
                    </div>
                </div>
            </section>
    
            <div class="top_menu position2">
                <a class="input_exit_button" href="index.php">exit</a>
                <div class="top_menu_info">username:
                    <?php echo " " . $Username; ?>
                </div>
                <div class="top_menu_info">role:
                    <?php echo " " . $Role; ?>
                </div>
                <?php
                    if ($_COOKIE['role'] == 'admin') {
                        // Добавим кнопки редактирования
                        echo "<div class='small_button'>
                                <img class='img_small_button' src='./Img/edit_logo.png' alt=''>
                                <a class='input_small_button' href='add_pic.php'></a>
                            </div>
                            <div class='small_button'>
                                <img class='img_small_button' src='./Img/delete_logo.png' alt=''>
                                <a class='input_small_button' href='delete_pic.php'></a>
                            </div>";
                    }
                ?>
            </div>
        </div>
    </form>
    <footer class="footer position">        
        <div class="footer-info">
            <div class="footer-info_text">&copy Nikita Detkov</div>
            <div class="footer-info_text border_left">vasyanikita55@gmail.com</div>
            <div class="footer-info_text border_left">2022</div>
        </div>
    </footer>
</body>
</html>