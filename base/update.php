<?
require_once 'path.php';
require_once 'class/easy_zip.php';
require_once 'class/register.php';
if ($_POST['update']){

    //$str = $_POST['text'];
    //$mytext = preg_replace('/(<span class=\"text\_search\">)(.*)(<\/span>)/iu', '$2', $str, -1);//удаляет обёрнутые теги
    $mytext=preg_replace('/(<b class=\"text_search\">)/iu', '', $_POST['text']);
    $mytext=preg_replace('/(<\/b>)/iu', '', $mytext);
    $mytext=preg_replace('/(<b>)/iu', '', $mytext);
    $sql = "UPDATE myread SET ".$_POST['update']."='".str_replace(array("\\", "'", '"'), array("\\\\", "\'", '\"'),  $mytext)."' WHERE id=".$_POST['hidden']."";//strip_tags($_POST['text'], '<div><br><td><tr><table><tbody><input><sup><sub>')
    $conn->query($sql);
    $conn->query("UPDATE myread SET readdate='".date('Y-m-d')."'  WHERE id='".$_POST['hidden']."'");
    echo '<span class="readdate">'.date('Y-m-d').'</span>';
}
if ($_POST['mydelete']){
    array_map('unlink', glob("file/".$_POST["hidden"]."/*.*"));//удаляем все файлы в директории записи
    rmdir("file/".$_POST["hidden"]); //удаляем директорию записи (название совпадает с id)

    $sql = "DELETE FROM myread WHERE id=".$_POST['hidden']."";//удаляем саму запись из базы данных
    $conn->query($sql);
    echo '
    <script>
    location.href="/";
    </script>
    ';
}
if ($_POST['mydeletefilenew']){
    if(is_dir($_POST["hidden"])){
        remove_all_folders($_POST["hidden"]);//delete folders end file
    }else{
        unlink($_POST["hidden"]);
    }
}
if ($_POST['mydeletefile']){

    //delete file of directory
    $data=$conn->query("SELECT * FROM myfile WHERE id=".$_POST["hidden"]."");//выбираем строку с нужным идишником
    if ($data->num_rows > 0) {//если строка есть
        // output data of each row
        while($row = $data->fetch_assoc()){//перебираем массив
           // echo $row["path"];
            //проверяем используется ли этот файл в другой записи
            $rez=$conn->query("SELECT * FROM myfile WHERE path=\"".$row["path"]."\""); //получаем записи с таким же путём
            if($rez->num_rows ==1){
                $myarrpath=$row["path"]; //save path
                unlink($row["path"]);//delete file
                $myarrpath = explode("/", $myarrpath); //for get folder
                array_pop($myarrpath);//for get folder
                $stringdirectory='';//for get folder
                foreach ($myarrpath as &$value) {//for get folder
                    $stringdirectory=$value.'/';
                }
                unset($value); // разорвать ссылку на последний элемент
                $stringdirectory=substr($stringdirectory, 0, -1);//delete last /
               /* if (file_exists('file/'.$stringdirectory.'/.')) {
                    unlink('file/'.$stringdirectory.'/.');//delete file
                }
                if (file_exists('file/'.$stringdirectory.'/..')) {
                    unlink('file/'.$stringdirectory.'/..');//delete file
                }*/
                if(count(scandir('file/'.$stringdirectory))>2 or $stringdirectory=='file'){
                }else{
                    if (is_dir('file/'.$stringdirectory)) {
                        rmdir('file/'.$stringdirectory);
                    }
                }
            }
        }
    }
    $conn->query("DELETE FROM myfile WHERE id=".$_POST['hidden']."");  //delete file of base
}
if ($_POST['get']){
    $sql = "SELECT * FROM myread WHERE id=".$_POST['hidden']."";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['javascript'];
        }
    }

}

if ($_POST['zip']){
    //echo $_POST['zip'];
    $zip=new easy_zip();
    $zip->convert_zip($_POST['zip']);
    /*
    $zip = new ZipArchive(); //Создаём объект для работы с ZIP-архивами
    $zip->open("temp/hello.zip", ZIPARCHIVE::CREATE); //Открываем (создаём) архив archive.zip
    $zip->addFromString('test.txt', '9999'); //записываем в архив документ*/

}

if ($_POST['dir']){
    $pathfolder=$_POST['dir'].'/'.$_POST['namefol'];
    if (!file_exists($pathfolder) and !empty($_POST['namefol'])) {
        $zip=new easy_zip();
        $zip->create_folder($pathfolder);
        listfolderfiles($_POST['dir']);
    }

}

if ($_POST['filepath']){
    $file=new easy_zip();
    $file->uploadfile($_POST['filepath']);
    listfolderfiles($_POST['filepath']);
}
if ($_POST['whotrename']){
    $pathfolder=$_POST['whotrename'];
    if (file_exists($pathfolder) and !empty($_POST['torename'])) {
        $zip=new easy_zip();
        $zip->renamefile($pathfolder, $_POST['torename']);
    }
    listfolderfiles(dirname($_POST['torename'],1));
}
if ($_POST['openfile']){
    $run_file=new easy_zip();
    $run_file->run_but($_POST['openfile']);
}
if ($_POST['dir_rename']){
    $run_file=new easy_zip();
    $run_file->run_but($_POST['openfile']);
}
if ($_POST['dir_ren']){
    $run_file=new easy_zip();
    $run_file->rename_substrin($_POST['dir_ren'], $_POST['whot_substrin'], $_POST['to_substrin']);
    listfolderfiles($_POST['dir_ren']);
}
if ($_POST['input_dir']){
    $run_file=new easy_zip();
    $run_file->create_string($_POST['input_dir'], $_POST['input_create_left_right'], $_POST['flag']);
    listfolderfiles($_POST['input_dir']);
}

if ($_POST['folders_copy']){
    $run_file=new easy_zip();
    $run_file->copy_folder($_POST['folders_copy'], $_POST['folders_paste']);
    listfolderfiles($_POST['folders_paste']);
    //echo 'hello';
}

if ($_POST['drag_and_drop']){
    listfolderfiles($_POST['drag_and_drop']);
}
if ($_POST['unzip']){
    $run_file=new easy_zip();
    $run_file->unzip($_POST['unzip']);
    listfolderfiles(dirname($_POST['unzip'],1));
    //echo 'hello';
    //listfolderfiles($_POST['drag_and_drop']);
}
if ($_POST['login']){
    //$hash = password_hash('musk', PASSWORD_DEFAULT);



    $sql = "SELECT * FROM superadmin";
    $result = $conn->query($sql);

    $i=1;
    if ($result->num_rows > 0) {
        // output data of each row
        while($data_login = $result->fetch_assoc()) {
            $arr[$i]=$data_login["val"];
            $i++;
        }
    }

    $log=new reg();
    //$login=$_POST['login'];
   // print_r($_POST['login']);
    $log->register($_POST['login'], $_POST['password'], $arr);
    //echo $_POST['login'];
    //print_r($arr);
    //echo $_SESSION['superadmin'];
}
if ($_POST['exit']){

    $log=new reg();
    //$login=$_POST['login'];
    // print_r($_POST['login']);
    $log->goexit();
    //echo $_POST['login'];
    //print_r($arr);
    //echo $_SESSION['superadmin'];
}
if ($_POST['newpassword']){
    $sql = "SELECT * FROM superadmin";
    $result = $conn->query($sql);

    $i=1;
    if ($result->num_rows > 0) {
        // output data of each row
        while($data_login = $result->fetch_assoc()) {
            $arr[$i]=$data_login["val"];
            $i++;
        }
    }
    $log=new reg();
    if($log->rename($_POST['onpassword'], $arr)==1){
        //$sql = 'UPDATE superadmin SET val="'.password_hash($_POST['newpassword'], PASSWORD_DEFAULT).' WHERE id=1';
        $sql = "UPDATE superadmin SET val='".password_hash($_POST['newpassword'], PASSWORD_DEFAULT)."' WHERE id = 1";
        $result = $conn->query($sql);
        echo 'пароль заменен';
    }


}

if ($_POST['mymail']){

    $sql = "SELECT * FROM superadmin WHERE id = 1";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0) {
        // output data of each row
        while($data_login = $result->fetch_assoc()) {
            $arr[$i]=$data_login["email"];
            $i++;
        }
    }
    $log=new reg();
    echo $arr[1];
    if($_POST['mymail']==$arr[1]){
        $newpass_to_mail=$log->newpassword();
        $sql = "UPDATE superadmin SET val='".password_hash($newpass_to_mail, PASSWORD_DEFAULT)."' WHERE id = 1";
        $result = $conn->query($sql);
        mail($arr[1], 'Сообщение о изменении пароля', 'пароль изменен', 'пароль от вашего сайта изменен на '.$newpass_to_mail);
        echo 'ваш пароль изменен и отправлен Вам на почту';
    }else{
        echo 'Вы не правильно ввели почту';
    }




}
?>