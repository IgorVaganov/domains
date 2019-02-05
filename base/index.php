<?php //echo $_GET['check']; black
session_start();//mail('vag.i@inbox.ru', 'hello', 'hello', 'hello');
/*
$to  = "vag.i@inbox.ru";

$subject = "Заголовок письма";

$message = ' <p>Текст письма</p> </br> <b>1-ая строчка </b> </br><i>2-ая строчка </i> </br>';

$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From: От кого письмо <igor1990.vag@gmail.com>\r\n";
$headers .= "Reply-To: vag.i@inbox.ru\r\n";

mail($to, $subject, $message, $headers);*/
require_once 'path.php';
require_once 'class/myhtml.php';
require_once 'class/easy_zip.php';
require_once 'plugin/slider_line.php';
//slider_line();//ползунок
//$rtrtertwertwertwet=new easy_zip();


function wrapsearch($words, $string){
    $wrap_only_text=new myhtml();
    if(!empty($words)){//что бы не выдавал ошибку при пустом поисковом запросе
        $count_ser=1;
        $print_text='';
        foreach ($words as $word) {
            if($count_ser==1){
                //$print_text=preg_replace('/('.$word.')/iu', "<b class='text_search'>".'$1'."</b><!--text_search-->", $string);
                $print_text=$wrap_only_text->wrap_only_text($word, $string);
            }else{
               // $print_text=preg_replace('/('.$word.')/iu', "<b class='text_search'>".'$1'."</b><!--text_search-->", $print_text);
                $print_text=$wrap_only_text->wrap_only_text($word, $print_text);
            }

            $count_ser++;
        }
        return $print_text;
    }else{
        return  $string;
    }

}
function ser_file($serchfile=['1']){
    $req=0;
    $pathfile='file/';
    $list_file=scandir($pathfile);//получаем все файлы директории
    $arr_id=[];//сюда запишем все id
    foreach ($list_file as $item){//перебираем все папки id
        if(is_dir('file/'.$item)){ //если это папка
            $into_id=scandir('file/'.$item);//берём все файлы в id
            foreach ($into_id as $file){//прогоняем все файлы
                foreach ($serchfile as $serch){//прогоняем через массив поисковых слов
                    if (strpos($file, $serch) !== false) {//если слово есть в названии файла
                        $req=1;//добавляем этот id
                    }
                }
            }
            if($req==1){
                array_push($arr_id, str_replace(".", "", $item));//добавляем этот id при этом убирая любимое мое "." и ".."
            }
            $req=0;
        }
    }
    //array_push($arr_id, '1');//что бы в запросе в базу не было ошибок добавляем несуществующий id
    // return $arr_id;
    $sql_string=implode(", ", $arr_id);//строку в массив
    //$sql_string=substr($sql_string, 2);//удаляем из строки первые ", "
    //echo $sql_string;
    return $sql_string;
   //print_r($sql_string);
}


$select="OR";
if (isset($_GET['check'])){
    if($_GET['check']==1){
        $select="AND";
    }else{
        $select="OR";
    }
}


//function delete unnecessary space whot my script do not loss
function removespace($text)
{
    $text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
    $text = preg_replace('/([\s])\1+/', ' ', $text);
    $text = trim($text);
    return $text;
}
$url=explode( '/', $_GET['route'] ); //$_GET['route']-переменная url прописанная в файле htaccess, делим юрл на составляющие
if(trim($url[0])=="file")  //читаем первую составляющую url и убираем пробелы
{
}//IF NOT EXISTS table_name
$sql = "CREATE TABLE IF NOT EXISTS myread (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, text TEXT(10000), readdate DATE, javascript TEXT(10000))";
if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS myfile (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, idmyread INT(6), path TEXT(255))";
if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS superadmin (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nameval TEXT(255), val TEXT(255), email TEXT(255))";
if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

if ($_POST['create']){
    $create_text=str_replace(array("<", ">"),array("&lt;", "&gt;"), $_POST['text']);
    $sql = "INSERT INTO myread (text, readdate) VALUES ('".str_replace(array("\\", "'", '"',"\r\n", " "), array("\\\\", "\'", '\"', "<br/>", "&nbsp;"), $create_text)."', '".date('Y-m-d')."')";
    $conn->query($sql);
    //$conn->query("INSERT INTO myread (readdate) VALUES ('".date('Y-m-d')."')");

    $sql = "SELECT id, text FROM myread ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($sql);
//$result=array_reverse($result);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $idread=$row["id"];

        }
    }

    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){

                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "file/".$_FILES['upload']['name'][$i]; //name file

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file
                    $conn->query("INSERT INTO myfile (idmyread, path) VALUES (".$idread.", '".$filePath."')");
                }
            }
        }
    }

    echo '
    <script>
    location.href="/";
    </script>
    ';
}
if ($_GET['ser']){//на участке IN (-1".$data_id_file.") единичка делает так что бы скобка никогда не была пустой, id -1 никогда не может быть
    //echo $_POST['mydate'];
    $words = explode(" ", str_replace(array("\\", "'", '"'), array("\\\\", "\'", '\"'), removespace($_GET['ser'])));//экранируем ёбаные спецсимволы  и делим поисковый запрос на слова
    $data_id_file=ser_file($words);
    $number_word=1;//если 1 не печатаем в sql- AND
    foreach ($words as &$word) {
        if($number_word==1){//если 1 не печатаем в sql- AND
            //было до
            //            $search=" WHERE (LOCATE(lower('".$word."'), lower(text)) OR id IN (SELECT DISTINCT idmyread FROM myfile WHERE LOCATE(lower('".$word."'), lower(path)))) AND (readdate BETWEEN '".$_GET['mydate']."-".$_GET['mymonday']."-".$_GET['myday']."' AND '2050-01-01')";//делаем запрос для 1 слова, with right request to table is idmyread end get as id
            $search=" WHERE (LOCATE(lower('".$word."'), lower(text)) OR id IN (-1".$data_id_file.")) AND (readdate BETWEEN '".$_GET['mydate']."-".$_GET['mymonday']."-".$_GET['myday']."' AND '2050-01-01')";//делаем запрос для 1 слова, with right request to table is idmyread end get as id
        }else{
            //было до
            //$search=$search." ".$select." (LOCATE(lower('".$word."'), lower(text)) OR id IN (SELECT DISTINCT idmyread FROM myfile WHERE LOCATE(lower('".$word."'), lower(path))))";//делаем запрос для остальных слов
            $search=$search." ".$select." (LOCATE(lower('".$word."'), lower(text)) OR id IN (-1".$data_id_file."))";//делаем запрос для остальных слов
        }
        $number_word++;//что бы выполнилось кроме 1 else
    }
    $pagin='&ser='.$_GET['ser'];//это гавно печатаем в страницах что бы пагинация на поиск была
}else{
    $search="";
    $pagin="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/" />
    <title>База</title>
    <!--  <link rel="icon" href="/workimage/edge.png" type="image/x-icon">-->
    <meta charset="utf-8">
    <link rel="stylesheet" href="normalise.css">
    <link rel="stylesheet" href="library/animate.css">
    <?php require_once 'css.php'; ?>
</head>
<body id="dropbox">
<div class="modal_delete">
    <div class="note">
        <div class="textnote">Вы действительно хотите удалить эту запись, данные будут безвозвратно потеряны.</div>
        <div class="buttomnote">
            <div class="yesnote">да </div>
            <div class="nonote"> нет</div>
        </div>
    </div>
</div>
<div class="modal_html">
    <div class="closs">Close</div>
    <textarea class="text_html">

    </textarea>
    <div class="fun_get">myget('9090');</div>
    <div class="fun_pus">mypus('9090', 'hello'); </div>
    <div class="fun_get">matchtable('ii', 'set_val(2, get_val(0)+get_val(1))');</div>
    <div class="fun_get">tok(p, u, cos);</div>
    <div class="fun_get">matchtable('u', 'set_val(3, tok(get_val(0), get_val(1), get_val(2)))');</div>
</div>

<form action="/" method="get" class="header ">
    <a href="/"><i class="material-icons">desktop_windows</i></a>
    <a href="/newfilesystem"><i class="material-icons">folder_shared</i></a>
    <a href="/filesystem">файловая система</a><br/> <?//echo password_hash('musk', PASSWORD_DEFAULT);?>
    <div class="regis">
    <?
    if(isset($_SESSION['superadmin'])){
        echo '<img class="piple" src="image/piple.png"><div class="into"  data-ac="exit">Выйти</div>';
    }
    else{
        echo '<div class="login" contenteditable="true" data-tippy="введите логин"></div><div class="password" contenteditable="true"  data-tippy="введите пароль"></div><div class="into" data-ac="into">Войти</div>';
    }
    ?>
    </div>

   Строгий поиск <input type="checkbox" name="mycheck" class="strict swing">
    <input class="bounceIn" id="text_ser" type="search">
    <input class="ser bounceIn" type="submit" value="найти">
    <button class="arrow_move bounceIn"><div class="arrow_up"></div><div class="arrow_down"></div></button>
    <select class=" zoomInUp" name="mydate">
        <option value=""></option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
    </select>
    <select name=" zoomInUp mymonday">
        <option value=""></option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    <select name=" zoomInUp myday">
        <option value=""></option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>
    <!-- <div><div>1</div><div>2</div></div> -->
</form>
<div class="wrap">
<div class="tamplate_left">
    <?
    if (isset($_GET['offset'])){
        $offset=$_GET['offset'];
        $activenone='';
    }else{
        $offset=0;
        $activenone='active_number';
    }
    $count_read=50; //count read on 1 page
    $result = $conn->query("SELECT id FROM myread".$search."");
    $count=$result->num_rows; //count read
    $count_pag=$count/$count_read;
    for ($i = 0; $i <= $count_pag; $i++)
    {
        $offset1=$count_read*$i;
        if($offset1==$_GET['offset']){
            $activenone='active_number';
        }else{
            $activenone='';
        }
        $i=$i+1;
        if (isset($_GET['id'])){
            $activenone='';
            echo '<style>.read{max-height: 10000px;}</style>';
        }
        echo '<a href="/?offset='.$offset1.$pagin.'" class="number '.$activenone.'">'.$i.'</a>';
        $i=$i-1;
    }

    if (isset($_GET['id'])){
        $sql = "SELECT * FROM myread WHERE id=".$_GET['id']."";
    }else{
        $sql = "SELECT * FROM myread".$search." ORDER BY ID DESC LIMIT ".$count_read." OFFSET ".$offset."";
    }
    ?>
</div>
<div class="tamplate_right">
    <!--  <form id="create_post" class="line line_create" action="/" method="post" enctype="multipart/form-data">
    <textarea class='read' name="text" id="text" cols="30" rows="10"></textarea><br>
    <label class="click_input" > <div class="see">Перетащите файлы сюда</div><input id='upload' name="upload[]" type="file" multiple="multiple" /></label>-->
    <!--<input class="but" name="create" type="submit" value="добавить">
</form>-->
<?
if($_SERVER['REQUEST_URI']=='/newfilesystem'){
    echo '<style  type="text/css">';
    echo '.tamplate_right{
             background: url(/image/read.jpg) repeat;
    }';
    echo '</style>';
    listfolderfiles('folders');
}else{
    require_once 'main.php'; //загрузка главной страницы с поиском
}
?>
</div>
</div>


 <?
 if(isset($_SESSION['superadmin'])){
     require_once 'main_menu.php';
 }
 //echo '2'.$_SESSION['superadmin'];
 //require_once 'main_menu.php';
 ?>




<div class="tooltip" contenteditable="true">
    11111
</div>
<div class="down_csv">
    <div class="down_csv_win">Перетащите файлы сюда</div>
    <div class="down_csv_close">Х</div>
</div>
<div class="modal_img">
    <div class="down_img_close">Х</div>
</div>
<div class="down_dir">
    <div data-dir="" class="down_dir_win">Перетащите файлы сюда</div>
    <div class="down_dir_close">Х</div>
</div>
<script src="library/jquery-3.2.1.min.js"></script>
<script src="library/wow.js"></script>
<script src="library/tippy.js"></script>
<script>
    new WOW().init();//librari for выезда
</script>
<?require "js.php";?>


</body>
</html>
<?
//#ED0
//#EC0
//#EAD300
?>



