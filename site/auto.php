<?php
session_start(); //Запускаем сессии 

class Auto {
    private $_login = "hi"; //Устанавливаем логин
    private $_password = "123"; //Устанавливаем пароль

    public function isAuto() {
        if (isset($_SESSION["is_auto"])) { //Если сессия существует
            return $_SESSION["is_auto"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; 
    }

    public function auto($login =null, $passwors=null) {
        if ($login == $this->_login && $passwors == $this->_password) { //Если логин и пароль введены правильно
            $_SESSION["is_auto"] = true; //Делаем пользователя авторизованным
            $_SESSION["login"] = $login;
			$_SESSION["passwrd"] = $passwors;
			//Записываем в сессию логин пользователя
            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auto"] = false;
            return false; 
        }
    }
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuto()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
    
    public function out() {
        unset($_SESSION['login']);
		 unset($_SESSION['passwrd']);
//Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
$auto = new Auto();

if (isset($_POST["login"]) && isset($_POST["passwd"])) { //Если логин и пароль были отправлены
    if (!$auto->auto((string)$_POST["login"], (string)$_POST["passwd"])) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\"></h2>";
    }
}

if (isset($_GET["exit"])) { //Если нажата кнопка выхода
        $auto->out(); //Выходим
	}

if ($auto->isAuto()) { // Если пользователь авторизован, приветствуем:  
	require_once("index.php"); // писать в кавчках файл где будет расположена форма с логином и паролем 
} 

?>