<?

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if (isset($_GET['ser']) and isset($words)){
            $print_text=wrapsearch($words, $row["text"]);//выделяем поисковые слова
        }
        else{
            $print_text=$row["text"];
            // $print_text=preg_replace('/(https?:\/\/[a-zA-Zа-яА-Я\.\/0-9\%\?\=\&_]*)/iu', '<a href="'.'$1'.'" class="blank" target="_blank">'.'$1'.'</a>', $print_text);
        }
        echo '<form data-wow-offset="200" class="line  wow bounceInUp" action="/" method="post">';
        /*if(isset($_SESSION['superadmin'])){}
     require_once 'main_menu.php';
 }*/
        echo '<a class="mypost" href="/?id='.$row["id"].'" target="_blank">перейти по ссылке на статью</a>';
        if(isset($_SESSION['superadmin'])){
            echo '<span data-id="'.$row["id"].'" class="post_html">html</span>';
        }
        echo '<div class="readdate'.$row["id"].'"><span class="readdate">'.$row["readdate"].'</span></div>';
        echo "<div contenteditable=\"true\" data-id='".$row["id"]."' class='read' name=\"text\" id=\"text\" cols=\"30\" rows=\"10\">".$print_text."</div>";

        if(isset($_SESSION['superadmin'])){
        echo '<div data-date="readdate'.$row["id"].'" class="but saves">Сохранить</div>';
        echo '
     <input class="id" name="hidden" type="hidden" type="submit" value="'.$row["id"].'">
     <input class="but delete" name="mydelete" type="submit" value="удалить" data-id="'.$row["id"].'">';
        echo '<input data-id="'.$row["id"].'" class="upper" name="upload[]" type="file" multiple="multiple" />';
        $dir='file/'.$row["id"].'/';
        echo '<i style="color:black; border: 1px solid black;" data-dir="file/'.$row["id"].'" class="material-icons down_zip">assignment_returned</i>';
        echo '<span class="wrap_create_folder"><span contenteditable="true" class="create_foldercss create_folder"></span> <i data-dir="'.str_replace("//", "/", 'file/'.$row["id"]).'" class="material-icons create_fol">create_new_folder</i> </span>';
        if(isset($_GET['ser'])){
            listfolderfiles($dir, $words, 1);
        }else{
            listfolderfiles($dir);
        }

        $data=$conn->query("SELECT * FROM myfile WHERE idmyread=".$row["id"]."");
        if ($data->num_rows > 0) {
            // output data of each row
            while($row = $data->fetch_assoc()){
                if (isset($_GET['ser']) and isset($words)){//////////////////////////////////////////////////////////////////////////////////////////////
                    $print_text=wrapsearch($words, $row["path"]);
                }
                else{
                    $print_text=$row["path"];
                }
                //начало проверка расширения
                if (preg_match("/.jpeg$/i", $row["path"]) or preg_match("/.jpg$/i", $row["path"])  or preg_match("/.png$/i", $row["path"])) {
                    echo '<div class="wrapfile">';
                    echo '<br/><a class="down_file" data-id="'.$row["id"].'" href="'.$row["path"].'" download>'.$print_text.'</a><input  data-id="'.$row["id"].'" name="file" class="up_file" type="file" value="изменить файл"><a class="but" href="'.$row["path"].'" target="_blank">Oткрыть</a><span class="del_file" data-id="'.$row["id"].'">x</span>';
                    echo '</div>';
                } else if (preg_match("/.pdf$/i", $row["path"])){
                    echo '<div class="wrapfile">';
                    echo '<br/><a class="down_file" data-id="'.$row["id"].'" href="'.$row["path"].'" download>'.$print_text.'</a><input  data-id="'.$row["id"].'" name="file" class="up_file" type="file" value="изменить файл"><a class="but" href="'.$row["path"].'" target="_blank">Oткрыть</a><span class="del_file" data-id="'.$row["id"].'">x</span>';
                    echo '</div>';
                }else{
                    echo '<div class="wrapfile">';
                    echo '<br/><a class="down_file" data-id="'.$row["id"].'" href="'.$row["path"].'" download>'.$print_text.'</a><input  data-id="'.$row["id"].'" name="file" class="up_file" type="file" value="изменить файл"><span class="del_file" data-id="'.$row["id"].'">x</span>';
                    echo '</div>';
                }
                //конец проверка расширения
            }
        }
        }
        echo '</form>';
    }
}
// WHERE LOCATE(lower('запись'), lower(text))  поисковая строка регистронезависимая
/*
 *
 *  <div class="option-list">
             <div class="option" data-select-val="0">Calibri</div>
             <div class="option" data-select-val="1">Times New Roman</div>
             <div class="option" data-select-val="2">Complex</div>
             <div class="option" data-select-val="3">Lucida Console</div>
             <div class="option" data-select-val="4">Nissan Brend Bold</div>
             <div class="option" data-select-val="5">Proxy 1</div>
             <div class="option" data-select-val="6">stylus BT</div>
             <div class="option" data-select-val="7">Datsun Light</div>
             <div class="option" data-select-val="8">Arial</div>
         </div>*/
?>