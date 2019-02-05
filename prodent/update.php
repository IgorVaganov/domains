<?
require_once 'path.php';
require_once 'class/easy_zip.php';
require_once 'class/register.php';
require_once 'config.php';
require_once 'class/data_base.php';


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
    $all = data_base::run("SELECT * FROM superadmin")->fetchAll(PDO::FETCH_ASSOC);
    $arr[1]=$all[0]['val']; //пароль
    $arr[2]=$all[1]['val']; //логин

    $log=new reg();
    if($log->rename($_POST['onpassword'], $arr)==1){
        data_base::run("UPDATE superadmin SET val='".password_hash($_POST['newpassword'], PASSWORD_DEFAULT)."' WHERE id = 1");
        echo 'пароль заменен';
    }


}

if ($_POST['mymail']){

    $all = data_base::run("SELECT * FROM superadmin WHERE id = 1")->fetchAll(PDO::FETCH_ASSOC);
    $arr[1]=$all[0]['email']; //email

    $log=new reg();
    //echo $arr[1];
    if($_POST['mymail']==$arr[1]){
        $newpass_to_mail=$log->newpassword();
        data_base::run("UPDATE superadmin SET val='".password_hash($newpass_to_mail, PASSWORD_DEFAULT)."' WHERE id = 1");
        mail($arr[1], ' Сообщение о изменении пароля', 'пароль изменен', 'пароль от вашего сайта изменен на '.$newpass_to_mail);
        echo ' Ваш пароль изменен и отправлен Вам на почту';
    }else{
        echo ' Вы не правильно ввели почту';
    }
}

if ($_POST['login']){
    //$hash = password_hash('musk', PASSWORD_DEFAULT);

    $all = data_base::run("SELECT * FROM superadmin")->fetchAll(PDO::FETCH_ASSOC);
    $arr[1]=$all[0]['val']; //пароль
    $arr[2]=$all[1]['val']; //логин

    $log=new reg();
    //$login=$_POST['login'];
    // print_r($_POST['login']);
    $log->register($_POST['login'], $_POST['password'], $arr);
    //echo $_POST['login'];
    //print_r($arr);
    //echo $_SESSION['superadmin'];
}
//data_base::myonewords('hello world')

if ($_POST['logo']){//Улица Томина trim
    $text=trim($_POST['text']).'&nbsp;&nbsp;';//что бы не пропадал фокус
    $table=data_base::myonewords($_POST['table']); //защита от SQL иньекций
    $column=data_base::myonewords($_POST['column']);//защита от SQL иньекций
    $param=data_base::myonewords($_POST['param']);//защита от SQL иньекций
    $all = data_base::run("UPDATE ".$table." SET ".$column."=? WHERE ".$param."=?", [ $_POST['text'], $_POST['logo']]);
    echo 'запись обновлена';
}


if ($_POST['folders']){//Улица Томина trim
    //echo $newfolders;
    $idread=data_base::myonewords($_POST['id']); //защита от SQL иньекций
    $folder=$_POST['folders'];
    $alt_src=$_POST['alt_src'];
    if(count($_FILES['upload']['name']) > 0){//if exsisting file

        $newfolders = $folder.'/';

        if (file_exists($newfolders)) { //if excist folders
            //not create folders
        } else {//create folders
            mkdir($newfolders);
        }
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){

                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = $newfolders."/".$_FILES['upload']['name'][$i]; //name file
                $array = explode('.', $_FILES['upload']['name'][$i]);//делим на массив по точке
                $extension = end($array);//берем последний элемент-расширение

                if(file_exists($newfolders."".$idread.".jpg")){
                    unlink($newfolders."".$idread.".jpg");
                }
                if(file_exists($newfolders."".$idread.".jpeg")){
                    unlink($newfolders."".$idread.".jpeg");
                }
                if(file_exists($newfolders."".$idread.".png")){
                    unlink($newfolders."".$idread.".png");
                }
                if(file_exists($newfolders."".$idread.".gif")){
                    unlink($newfolders."".$idread.".gif");
                }
                if(file_exists($newfolders."".$idread.".JPG")){
                    unlink($newfolders."".$idread.".JPG");
                }
                if(file_exists($newfolders."".$idread.".JPEG")){
                    unlink($newfolders."".$idread.".JPEG");
                }
                if(file_exists($newfolders."".$idread.".PNG")){
                    unlink($newfolders."".$idread.".PNG");
                }
                if(file_exists($newfolders."".$idread.".GIF")){
                    unlink($newfolders."".$idread.".GIF");
                }
                $filePath=$newfolders."".$idread.".".$extension;
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $files[] = $shortname;
                    if($_POST['data']==1){
                        $up_extantion = pathinfo($filePath, PATHINFO_EXTENSION);
                        $blog_post=data_base::run("SELECT * FROM image WHERE id=?", [$idread])->fetchAll();
                        foreach ($blog_post as &$value) {
                            $alt_extantion = pathinfo($value['img'], PATHINFO_EXTENSION);
                            if($up_extantion==$alt_extantion){

                            }else{
                                if(file_exists($value['img'])){
                                    unlink($value['img']);
                                }
                            }

                        }
                        $table=data_base::myonewords($_POST['table']); //защита от SQL иньекций
                        $column=data_base::myonewords($_POST['column']); //защита от SQL иньекций

                        $all = data_base::run("UPDATE ".$table." SET ".$column."=? WHERE ".'id'."=?", [ $filePath, $idread]);
                        echo 'картинка заменена';
                    }

                }



            }
        }
    }
}

if ($_POST['newread']){//добавление новой записи
    $create_text='текст статьи';
    $all = data_base::run("INSERT INTO myread (img, text, readdate, javascript, text_from_html, header, descr) VALUES ('img/blog/1.jpg', '".str_replace(array("\\", "'", '"',"\r\n", " "), array("\\\\", "\'", '\"', "<br/>", "&nbsp;"), $create_text)."', '".date('Y-m-d')."', '', '".$create_text."', 'Заголовок статьи', 'Admin Ключевые слова:стоматолог,белые,зубы')");

    $my_id=data_base::run("SELECT * FROM myread ORDER BY ID DESC LIMIT 1")->fetchAll();
    //echo  $my_id[0]['id'];

    $newfolders = 'file/'.$my_id[0]['id'];
    if (is_dir($newfolders)) { //if excist folders//not create folders
    }else {//create folders
        mkdir($newfolders);
    }

    $newfolders = 'file/'.$my_id[0]['id'].'/post';
    if (is_dir($newfolders)) { //if excist folders//not create folders
    }else {//create folders
        mkdir($newfolders);
    }

    $newfolders = 'file/'.$my_id[0]['id'].'/img';
    if (is_dir($newfolders)) { //if excist folders//not create folders
    }else {//create folders
        mkdir($newfolders);
    }
    echo '
    <script>
    location.href="/blog";
    </script>
    ';
}

if ($_POST['update']){
    //header_title
    //$str = $_POST['text'];
    //$mytext = preg_replace('/(<span class=\"text\_search\">)(.*)(<\/span>)/iu', '$2', $str, -1);//удаляет обёрнутые теги
    $mytext=preg_replace('/(<b class=\"text_search\">)/iu', '', $_POST['text']);
    $mytext=preg_replace('/(<\/b>)/iu', '', $mytext);
    $mytext=preg_replace('/(<b>)/iu', '', $mytext);
    $update=data_base::myonewords($_POST['update']); //защита от SQL иньекций
    $hidden=data_base::myonewords($_POST['hidden']); //защита от SQL иньекций
    $sql = "UPDATE myread SET ".$update."='".str_replace(array("\\", "'", '"'), array("\\\\", "\'", '\"'),  $mytext)."' WHERE id=".$hidden."";//strip_tags($_POST['text'], '<div><br><td><tr><table><tbody><input><sup><sub>')
    $all = data_base::run($sql);
    $all = data_base::run("UPDATE myread SET readdate='".date('Y-m-d')."'  WHERE id='".$hidden."'");
    $all = data_base::run("UPDATE myread SET text_from_html=? WHERE id=?", [strip_tags($_POST['text']), $_POST['hidden']]);
    $all = data_base::run("UPDATE myread SET header=? WHERE id=?", [strip_tags($_POST['header_title']), $_POST['hidden']]);

    echo '<span class="readdate">'.date('Y-m-d').'</span>';
}

if ($_POST['mydelete']){
    //array_map('unlink', glob("file/".$_POST["hidden"]."/*.*"));//удаляем все файлы в директории записи
    if(is_dir('file/'.$_POST['hidden'])){
        remove_all_folders('file/'.$_POST['hidden']);//delete folders end file
        //echo 'yes';
    }else{
        unlink('file/'.$_POST["hidden"]);
    }
   // rmdir("file/".$_POST["hidden"]); //удаляем директорию записи (название совпадает с id)

    $sql = "DELETE FROM myread WHERE id=?";//удаляем саму запись из базы данных
    data_base::run($sql, [$_POST['hidden']]);
}

if ($_POST['all_table']){
    $all_table=data_base::myonewords($_POST['all_table']); //защита от SQL иньекций
    $all_table=data_base::run("SELECT * FROM ".$all_table)->fetchAll();
    echo '<table style="width:100%;border: 1px solid black;">';

      foreach ($all_table as $row){
          echo '<tr>';
          $new_id=$row['id'];
          foreach ($row as $key=>$value){
              //echo $row['id'];
              if($key!='id'){
                  if($key=='img'){
                      echo '<td style="border: 1px solid black;"><img src="'.$value.'" data-imgclass="down" data-id="'.$new_id.'" data-table="'.$_POST['all_table'].'" data-col="'.'img'.'" data-act="'.'1'.'" data-folder="'.$_POST['all_table'].'" style="width:30%"/></td>';
                  }else{
                      echo '<td class="save_page_hover" style="border: 1px solid black;position: relative;" contenteditable="true">'.'<div tabindex="-1" contenteditable="false" data-logo="'.$row['id'].'" class="save_page" data-tippy="сохранить запись" data-table="'.$_POST['all_table'].'" data-col="id" data-col2="'.$key.'">V</div>&nbsp;  '.$value.' &nbsp; </td>';
                  }
              }else{
                  echo '<td style="border: 1px solid black;"><div class="delete_slider_row" data-id="'.$new_id.'" data-table="'.$_POST['all_table'].'">X</div></td>';
              }
          }

          echo '</tr>';
      }


   echo '</table>';
   echo '<div class="plus_slider" data-table="'.$_POST['all_table'].'">+</div>';
}

if ($_POST['plus_slider']){//Улица Томина trim
    $plus_slider=data_base::myonewords($_POST['plus_slider']); //защита от SQL иньекций
    $sql = "INSERT INTO ".$plus_slider." (img, text1, text2) VALUES ('img/slide-1.jpg', 'текст1', 'текст2')";//удаляем саму запись из базы данных
    data_base::run($sql);
   // echo $_POST['plus_slider'];
}

if ($_POST['delete_slider_row']){//Улица Томина trim
    $table_row=data_base::myonewords($_POST['table_row']); //защита от SQL иньекций
    $sql = "DELETE FROM ".$table_row." WHERE id=?";//удаляем саму запись из базы данных
    data_base::run($sql,[$_POST['id_row']]);
}

if ($_POST['first_name']){
    function writeToLog($data, $title = '') { //просто записывает логи файл /hook.log ничего больше
        $log = "\n------------------------\n";
        $log .= date("Y.m.d G:i:s") . "\n";
        $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
        $log .= print_r($data, 1);
        $log .= "\n------------------------\n";
        file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
        return true;
    }

    $defaults = array('first_name' => '', 'last_name' => '', 'phone' => '', 'email' => '');

    if (array_key_exists('saved', $_POST)) { //проверяет одно из значений формы просто разновидность обработки запроса
        $defaults = $_POST; //$_POST-это ассоциативный массив, перезаписываем дефолтный массив
        writeToLog($_POST, 'webform');//записываем логи

        // $queryUrl = 'https://restapi.bitrix24.ru/rest/1/31uhq2q855fk1foj/crm.lead.add.json'; //из примера
        $queryUrl = 'https://b24-qjv43o.bitrix24.ru/rest/1/4xg9lj6bwxs67hnr/crm.lead.add.json';//секретный адрес смотрим в самом битриксе 24
        $queryData = http_build_query(array(       //Генерирует URL-кодированную строку запроса
            'fields' => array(
                "TITLE" => $_POST['first_name'].' '.$_POST['last_name'],
                "NAME" => $_POST['first_name'],
                "LAST_NAME" => $_POST['last_name'],
                "MESSAGE" => $_POST['last_name'],
                "STATUS_ID" => "NEW",
                "OPENED" => "Y",
                "ASSIGNED_BY_ID" => 1,
                "PHONE" => array(array("VALUE" => $_POST['phone'], "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $_POST['email'], "VALUE_TYPE" => "WORK" )),
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));

        $curl = curl_init();//Инициализирует сеанс cURL хз че это
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));

        $result = curl_exec($curl); // загрузка страницы и выдача её браузеру
        curl_close($curl);// завершение сеанса и освобождение ресурсов

        $result = json_decode($result, 1);//обрабатываем результать полученный в json, преобразуем в массив php
        writeToLog($result, 'webform result');//записываем логи

        if (array_key_exists('error', $result)){
            echo "Ошибка при сохранении лида: ".$result['error_description']." "; //если в отдаче есть ошибка, показываем её
        } else{
            echo '<span style="color:green;">Cообщение успешно отправлено!</span>';
        }
    }

}

/*    img/slide-1.jpg
*/


?>