<?
require 'class.php';
$dir='../folders/';
if ($_POST['root']){
    $dir=$_POST['path'];
    echo $_POST['path'];
    head();
    listFolderFiles($dir);
}
if ($_POST['ren']){
    $dir=$_POST['path'].'/';
    echo $_POST['path'];
    $shifr=$_POST['shifr'];
    $files = scandir($dir);//get all file
    $kays=array(//sut string for rename
        "0" => "-CH-",
        "1" => "-C-",
        "2" => "-С-",
        "3" => "-СН-",
        "4" => "-СH-",
        "5" => "-CН-",
        "6" => "-Ч-",
        "7" => "-К-",
        "8" => "-K-",
        "9" => "-TT-",
        "10" => "-ТТ-",
        "11" => "-ТT-",
        "12" => "-TТ-",
        "13" => "-S-",
        "14" => "-OL-",
        "15" => "-ОL-",
        "16" => "-ОЛ-",
        "17" => "-OЛ-",
        "18" => "-ОД-",
        "19" => "-OД-",
        "20" => "-OD-",
        "21" => "-ОD-",
        "22" => "-R-",
        "23" => "-Р-",
        "24" => "-ТЧ-",
        "25" => "-TЧ-",
    );


//function rename file begin
        function myrename($dir, $files, $kays, $shifr){
            $i=0;
            unset($files[array_search('.', $files, true)]);
            unset($files[array_search('..', $files, true)]);
            if (count($files) < 1)
                return;
            foreach ($files as $file) {//all files
                if(is_dir($dir.$file)){
                    //echo $dir.$file.'/';
                    //$i=$i+1;
                    $files[$i] = scandir($dir.$file);//get all file
                    myrename($dir.$file.'/', $files[$i], $kays, $shifr);//рекурсия для того что бы все файлы и подкатегории участвовали
                    $i++;
                }
                //echo $dir.'/'.$file."<br/>";
                //if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
                $pos=strpos(strtoupper($file), strtoupper("-ПЗУ-"));
                $pos1=strpos(strtoupper($file), strtoupper("-PZU-"));
                if ($pos===false and $pos1===false){//если не ключи генпланщиков
                    foreach ($kays as $kay) {//all substring
                        $pos = strpos(strtoupper($file), strtoupper($kay));//number position
// Заметьте, что используется ===.  Использование == не даст верного
// результата, так как 'a' находится в нулевой позиции.
                        if ($pos === false) {//if found sub string
                        } else {
                            if(@rename($dir.$file, $dir.$shifr . substr($file, $pos))){//eroor if tho file have the same name

                            }else{
                                //echo 'старое имя'.$dir.$file.'<br/>';
                                //echo 'новое имя'.$dir.$shifr . substr($file, $pos)."<br/>";
                                //echo 'файл '.$shifr . substr($file, $pos)."уже существует<br/>";
                            }
                        }
                    }
                }
            }
        }



        myrename($dir, $files, $kays, $shifr);

    head();
    listFolderFiles($dir);
}


?>