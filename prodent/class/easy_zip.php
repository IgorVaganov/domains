<?
class easy_zip extends ZipArchive {
    var $path='./temp/';//save to folder
    public  $namefile;//namefolders or namefile
    public  $fullpath;
    public  $path_zip;
    function __construct() {
    }
    function convert_zip($zip){//функция для добавления файлов и папок в zip массив
        $this->path=$zip.'/';
        $array = explode('/', $zip);//делим на массив по слэшу
        $namefile = end($array);//берем последний элемент имя папки
        $this -> namefile= $namefile;//записываем имя файла
        $this ->path_zip=$this->path.$this->namefile.".zip";//путь к файлу архива
        $this -> fullpath= $zip;//записываем путь папки
        self::open($this ->path_zip, ZIPARCHIVE::CREATE); //Открываем (создаём) архив zip
        //self::addFromString('test.txt', 'данный архив скачался с базы'); //записываем в архив документ
        $this->easy($this->fullpath.'/');//вотдельную функцию вынесено для возможности рекурсии
        self::close();//закрываем массив
        echo '<script>';
        echo 'window.location.href="'.$this ->path_zip.'";'; //скачиваем документ;
        echo '</script>';


    }
    function easy($fol, $path=''){//вспомогательная функция для convert_zip
        $list_file=scandir($fol);//получаем все файлы директории
        unset($list_file[array_search('.', $list_file, true)]);//удаляем из массива файлы с точками
        unset($list_file[array_search('..', $list_file, true)]);//удаляем из массива файлы с точками
        if (count($list_file) < 1)//если нет директорий обрываем функцию
            return;
        foreach ($list_file as $item){//перебираем все папки

            if(is_dir($fol.'/'.$item)){ //если это папка
                if($item!='.' and $item!='..'){
                    self::addEmptyDir(substr($fol.$item.'/', strlen($this->fullpath.'/')));//если убрать эту строку то в архив не будут добавляться пустые файлы
                   $this->easy($fol.$item.'/', substr($fol.$item.'/', strlen($this->fullpath.'/')));//рекурсия и генерация правильного пути

                }

            }else{
                self::addFile($fol.$item, $path.$item);//добавляем файл в архив
            }
        }
    }


    function create_folder($path){//создает папку
        mkdir($path, 0777, true);
    }

    function uploadfile($newfolders){//загружает файлы в указанную папку
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            //Make sure we have a filepath
            if($tmpFilePath != ""){
                //save the url and the file
                $filePath = $newfolders."/".$_FILES['upload']['name'][$i]; //name file
                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $filePath)) {
                    }
            }
        }
    }

    function renamefile($whot, $to){
        rename($whot, $to);
    }
    function run_but($dir){
        if (file_exists('./bat.bat')) {//если файл существует удаляем его
            unlink('./bat.bat');
        }
        $but_file_ran = fopen('./bat.bat', "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
        $pre='chcp 65001 >NUL';
        $pre1='
        ';
       // echo mb_detect_encoding($pre, "JIS, eucjp-win, sjis-win, UTF-8, CP866, CP1251");
        $a='SET _mainpath="'.$dir.'"';//переменная где лежит наш файл, беру в "" так как в названии файлов есть пробелы
        $aa='
        ';//ентер
        $pre2='chcp 866 >NUL';
        $pre3='
        ';
        $c='start %cd%%_mainpath%';//складываем строки в bat файле %cd%-путь до папки
        $string=$pre.$pre1.$a.$aa.$pre2.$pre3.$c;//складываем строки в php
        //$string=iconv('JIS','OEM-866',$string);
        //fwrite($but_file_ran, 'start C:\openserver\domains\base\folders\111.dwg');
        fwrite($but_file_ran, $string);//записываем наш bat файл
        fclose($but_file_ran);//закрываем файл
        exec('bat.bat');//temp\bat.bat   запускаем файл
    }

    function rename_substrin($dir, $whote, $to){
        //echo $dir.'<br/>';
        $files = scandir($dir);//get all file
        unset($files[array_search('.', $files, true)]);//удаляем из массива файлы с точками str_replace("//", "/", $dir.'/'.$ff);
        unset($files[array_search('..', $files, true)]);//удаляем из массива файлы с точками
        foreach ($files as $file) {//all files
            $newname=str_replace($whote, $to, $file);
            //echo $newname.'<br/>';
            //echo $file.'<br/>';
            rename($dir.'/'.$file, $dir.'/'.$newname);

        }
    }

    function create_string($dir, $input, $flag){
        $files = scandir($dir);//get all file
        unset($files[array_search('.', $files, true)]);//удаляем из массива файлы с точками str_replace("//", "/", $dir.'/'.$ff);
        unset($files[array_search('..', $files, true)]);//удаляем из массива файлы с точками
        foreach ($files as $file) {//all files
            if($flag=='1'){
                $newname=$input.$file;
                rename($dir.'/'.$file, $dir.'/'.$newname);
            }
            if($flag=='2'){

                if(is_dir($dir.'/'.$file)){
                    $newname=$file.$input;//склеиваем ввод
                }else{
                    $array = explode('.', $file);//делим на массив по точке
                    $extension = end($array);//берем последний элемент-расширение
                    $countsymbol=strlen($extension);//колличество символов в расширении
                    $countsymbol=$countsymbol+1;//с учетом точки
                    $newfile=substr($file, 0, -$countsymbol);//убираем расширение
                    $newname=$newfile.$input;//склеиваем ввод
                    $newname=$newname.'.'.$extension;//добавляем расширение
                }

                rename($dir.'/'.$file, $dir.'/'.$newname);//переименуем файлы
            }


        }
    }



    function copy_folder($d1, $d2, $upd = true, $force = true) {
        //echo $upd.'<br/>';
        //echo $force.'<br/>';
        setlocale(LC_ALL, 'ru_RU.cp1251');
        date_default_timezone_set('Asia/Irkutsk');
        if ( is_dir( $d1 ) ) {
            //echo 'происходит';
            $d2 = $this -> mkdir_safe( $d2, $force );
            if (!$d2) {$this -> fs_log("!!fail $d2"); return;}
            $d = dir( $d1 );
            while ( false !== ( $entry = $d->read() ) ) {
                if ( $entry != '.' && $entry != '..' )
                    $this -> copy_folder( "$d1/$entry", "$d2/$entry", $upd, $force );
            }
            $d->close();
        }
        else {
            if ( is_dir( $d2 ) ) {
                $array = explode('/', $d1);//делим на массив по точке
                $d2 = $d2.end($array);//берем последний элемент-расширение
                //echo $array;
            }
            $ok = $this -> copy_safe( $d1, $d2, $upd );
            $ok = ($ok) ? "ok-- " : " -- ";
            $this -> fs_log("{$ok}$d1");

        }
    } //function copy_folder

    function mkdir_safe( $dir, $force ) {
        if (file_exists($dir)) {
            if (is_dir($dir)) return $dir;
            else if (!$force) return false;
            unlink($dir);
        }
        return (mkdir($dir, 0777, true)) ? $dir : false;
    } //function mkdir_safe

    function copy_safe ($f1, $f2, $upd) {
        $time1 = filemtime($f1);
        if (file_exists($f2)) {

            $time2 = filemtime($f2);
            if ($time2 >= $time1 && $upd){
                return false;
            }
        }
        $ok = copy($f1, $f2);
        if ($ok) touch($f2, $time1);
        return $ok;
    } //function copy_safe

    function fs_log($str) {
        $log = fopen("./fs_log.txt", "a");
        $time = date("Y-m-d H:i:s");
        fwrite($log, "$str ($time)\n");
        fclose($log);
    }
    function unzip($filePath){
        $zip = new ZipArchive;//создаем объект архив
        $res = $zip->open($filePath);//открываем архив
        setlocale(LC_ALL, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');//установка правильной кодировки
        $zip->extractTo(dirname($filePath, 1));//извлекает содержимое архива
        $zip->close();//закрываем архив
    }

}

?>