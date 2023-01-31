<?php
    // Подключение к MySQL -----------------------------------------------------
    $conn = new mysqli('localhost', 'root', 'mysql');
    if ($conn->connect_error) {
        die('Ошибка: ' . $conn->connect_error);
    }
    // echo 'Подключение успешно установлено' . '<br>';

    // Создание базы данных ------------------------------------------------
    $sql = "CREATE DATABASE IF NOT EXISTS db_gallery";
    if ($conn->query($sql)) {
        // echo "База данных успешно создана" . "<br>";
    } 
    else {
        echo 'Ошибка: ' . $conn->error;
    }

    // Подключение к базе данных -----------------------------------------------
    $conn = new mysqli('localhost', 'root', 'mysql', 'db_gallery');
    if ($conn->connect_error) {
        die('Ошибка: ' . $conn->connect_error);
    }
    // echo 'Подключение к базе данных успешно установлено' . '<br>';

    // Удаление таблицы пользователей
    // $sql = "DROP TABLE USERS;";
    // if ($conn->query($sql)) {
    //     // echo 'Таблица с пользователями успешно удалена' . '<br>';
    // } else {
    //     echo 'Ошибка: ' . $conn->error;
    // }

    // Удаление таблицы паролей администратора
    // $sql = "DROP TABLE ADMIN_PASSWORDS;";
    // if ($conn->query($sql)) {
    //     // echo 'Таблица с паролями администратора успешно удалена' . '<br>';
    // } else {
    //     echo "Ошибка: " . $conn->error;
    // }

    // Удаление таблицы картин
    // $sql = "DROP TABLE ARTS;";
    // if ($conn->query($sql)) {
    //     // echo 'Таблица с паролями администратора успешно удалена' . '<br>';
    // } else {
    //     echo "Ошибка: " . $conn->error;
    // }

    // Создание таблицы пользователей -----------------------------------------
    $sql = "CREATE TABLE IF NOT EXISTS USERS(Id_user INTEGER AUTO_INCREMENT PRIMARY KEY, 
        Name_user VARCHAR(25), Password_user VARCHAR(200), Admin_user BOOLEAN);";
    if ($conn->query($sql)) {
        // echo 'Таблица с пользователями успешно создана' . '<br>';
    } 
    else {
        echo 'Ошибка: ' . $conn->error;
    }

    // Создание таблицы для паролей администратора -----------------------------------------
    $sql = "CREATE TABLE IF NOT EXISTS ADMIN_PASSWORDS(Id_password INTEGER AUTO_INCREMENT PRIMARY KEY, 
        Admin_password VARCHAR(200));";
    if ($conn->query($sql)) {
        // echo 'Таблица с паролями администратора успешно создана' . '<br>';
    } 
    else {
        echo 'Ошибка: ' . $conn->error;
    }

    // Создание таблицы картин -------------------------------------------------------------
    $sql = "CREATE TABLE IF NOT EXISTS ARTS(Id_art INTEGER AUTO_INCREMENT PRIMARY KEY, 
        Name_art VARCHAR(80), Style_art VARCHAR(50), Date_art VARCHAR(50), Artist_art VARCHAR(50), Img_art VARCHAR(80));";
    if ($conn->query($sql)) {
        // echo 'Таблица картин успешно создана' . '<br>';
    } 
    else {
        echo 'Ошибка: ' . $conn->error;
    }    
    
    // Добавим пароль администратора
    // $Password_admin = '1234' . 'zxcvbnm123456789';
    // $Password_admin = hash('sha3-224', $Password_admin);
    // $sql = "INSERT INTO ADMIN_PASSWORDS (Admin_password) VALUES('$Password_admin');";
    // if ($conn->query($sql)) {
    //     echo 'Пароль администратора установлен';
    // } 
    // else {
    //     echo 'Ошибка: ' . $conn->error;
    // }

    
    // Получение данных для входа ---------------------------------------------
    $Username = $conn->real_escape_string($_POST['username']);
	$Password = $conn->real_escape_string($_POST['password']) . 'zxcvbnm123456789';

    
    if ($Username != '' && $Password != '') {
        $Password = hash('sha3-224', $Password);
        $Password_admin = $conn->real_escape_string($_POST['password_admin']) . 'zxcvbnm123456789';
        $Password_admin = hash('sha3-224', $Password_admin);

        // Регистрация ------------------------------------------------------------
        if (isset($_POST['Register'])) {
            Registration($conn, $Username, $Password, $Password_admin);
        } 
        else {
            // Вход -------------------------------------------------------------------
            if (isset($_POST['Enter'])) {
                Enter($conn, $Username, $Password, $Password_admin);
            }
        }        
    } 
    else {
        $conn->close();                
        Create_message('Error! Empty row!');
        include 'message.php';
    }


    // Функции =======================================================================================
    // Функция регистрации пользователя
    function Registration($conn, $Username, $Password, $Password_admin) {
        // Проверка, существует ли пользователь с таким именем
        $sql = "SELECT * FROM USERS WHERE Name_user = '$Username'";
        if ($result = $conn->query($sql)) {
            // Если существует пользователь, то выведем информацию об этом
            if ($result->num_rows > 0) {
                $conn->close();                
                Create_message('Error! This user exists!');
                include 'message.php';
            } 
            else {
                // Установка права администрирования
                $sql = "SELECT * FROM ADMIN_PASSWORDS WHERE Admin_password = '$Password_admin'";
                if ($result = $conn->query($sql)) { 
                    if ($result->num_rows > 0) {
                        $flag = 1; // Admin
                    } 
                    else {
                        $flag = 0; // User
                    }
                    $sql = "INSERT INTO USERS (Name_user, Password_user, Admin_user) 
                        VALUE('$Username', '$Password', '$flag');";  
                    if ($conn->query($sql)) {
                        $conn->close();
                        Create_message('The user has been successfully registered!');
                        include 'message.php';
                    } 
                    else {
                        echo 'Ошибка регистрации: ' . $conn->error;
                    }                    
                }
                else {
                    echo 'Ошибка установки права администрирования: ' . $conn->error;
                }
                
            }
        } 
        else {
            echo 'Ошибка проверки пользователя: ' . $conn->error;
        }
    }

    // Функция входа для пользователя
    function Enter($conn, $Username, $Password, $Password_admin) {
        $sql = "SELECT * FROM USERS WHERE Name_user = '$Username' AND
            Password_user = '$Password'";
        if ($result = $conn->query($sql)){
            if ($result->num_rows > 0){
                // Получение значения флага админа 
                foreach($result as $row) {
                    $Flag_role = $row['Admin_user'];
                    break;
                }
                if($Flag_role == '1') {
                    $Role = 'admin';
                }
                else {
                    $Role = 'visitor';
                }
                // Создадим cockie файлы для имени пользователя и его роли
                $conn->close();
                Create_cockie($Username, $Role);
                include 'menu.php'; 
            }
            else {
                $conn->close();
                Create_message('Error! Invalid username or password!');
                include 'message.php';
            }
        } 
        else { 
            echo 'Ошибка: ' . $conn->error; 
        }   
    }

    // Функция создания cockie 
    function Create_cockie($Username, $Role) {
        setcookie('username', $Username, strtotime('10 days'));
        $_COOKIE['username'] = $Username;
        setcookie('role', $Role, strtotime('10 days'));
        $_COOKIE['role'] = $Role;
    }

    // Создание глобальной переменной для вывода сообщения
    function Create_message($Message) {
        $GLOBALS['message'] = $Message;
    }
?>