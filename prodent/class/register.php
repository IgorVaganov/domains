<?session_start();
class reg  {



    function register($login, $password, $arr){

    if (password_verify($password, $arr[1])) {//проверка пароля пользователя на соответствие в базе
        if ($arr[2]==$login){
            echo 'Вы вошли в систему';

            $_SESSION['superadmin'] = 1;
            //echo $_SESSION['superadmin'];
        }else{
            echo 'не правильный логин';
        }
    }
    else {
        echo 'не правильный пароль';
    }
    }

    function goexit(){
        unset($_SESSION['superadmin']);
        echo 'вы вышли из системы';
    }

    function rename($password, $arr){
            if (password_verify($password, $arr[1])) {//проверка пароля пользователя на соответствие в базе
                return 1;
            }else{
                echo $password.' -пароль не правильный';
                return 0;
            }
        }
    function newpassword(){
        return rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
    }

}
?>