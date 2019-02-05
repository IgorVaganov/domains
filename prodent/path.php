<?
function remove_all_folders($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir")
                    remove_all_folders($dir."/".$object);
                else unlink   ($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }


}
function listfolderfiles($dir, $words=[], $red=0 ){//$dir='../folders';
    if(is_dir($dir)){
        $ffs = scandir($dir);
    } else{
        echo '<ol class="olnew">';
        echo '</ol>';
        return;
    }

    unset($ffs[array_search('.', $ffs, true)]);//удаляем из массива файлы с точками
    unset($ffs[array_search('..', $ffs, true)]);//удаляем из массива файлы с точками
    echo '<div class="myfilesystem"><ol class="olnew">';
    foreach($ffs as $ff){
        if($red==1){
            $namefile=wrapsearch($words, $ff);//внешняя функция
        }else{
            $namefile=$ff;//if not search
        }
        //
        $fullpath=str_replace("//", "/", $dir.'/'.$ff);
        $mydate=date ("d.m.Y H:i:s.", filemtime($fullpath));
        $html_namefile='<span contenteditable="true" class="namefolders_val" data-tippy="новое название">'.$namefile.'</span><span data-dir="'.$fullpath.'" class="savenamefolder material-icons" data-tippy="изменить название">mode_edit</span>';
        if(is_dir($fullpath)) {
            echo '<div data-dir="'.$fullpath.'" class="li_spannew fileclick"><span>'.$html_namefile.'</span><i data-dir="'.$fullpath.'" class="material-icons down_zip" data-tippy="скачать эту папку в zip архиве">assignment_returned</i> <span class="wrap_create_folder"><span contenteditable="true" class="create_folder create_foldercss" data-tippy="имя новой папки"></span> <i data-dir="'.$fullpath.'" class="material-icons create_fol" data-tippy="создать новую папку">create_new_folder</i> </span><i data-dir="'.$fullpath.'" class="material-icons upload_dir" data-tippy="закинуть файлы в эту папку">queue</i><span class="wrap_rename">Что<span  contenteditable="true" class="what_rename create_foldercss" data-tippy="какую подстроку заменить в названии файлов"></span>На Что<span  contenteditable="true" class="to_rename create_foldercss" data-tippy="на какую подстроку заменить участок названия файлов"></span><span data-dir="'.$fullpath.'" class="material-icons click_renam_file" data-tippy="замена подстроки в названии файлов">format_shapes</span></span><span class="wrap_create_left_right"><span  data-dir="'.$fullpath.'" data-op="1" class="create_name_file material-icons" data-tippy="добавить к названию файлов внутри папки запись слева">swap_horiz</span><span contenteditable="true" class="input_create_left_right create_foldercss " data-tippy="то, что добавляем в название файлов"></span><span  data-dir="'.$fullpath.'" data-op="2" class="material-icons create_name_file" data-tippy="добавить к названию файлов внутри папки запись справа">swap_horiz</span></span><span data-file="'.$fullpath.'/" class="material-icons copy_folders" data-tippy="копировать папку">account_balance</span><span data-file="'.$fullpath.'" data-tippy="вставить файл" class="material-icons paste_folder">account_balance_wallet</span><span data-file="'.$fullpath.'" data-tippy="удалить файл" class="material-icons del_filenew">delete</span>'.$mydate.'</div>';//queue
            listfolderfiles($dir.'/'.$ff, $words, $red );
            echo '';
        }else{
            $array = explode('.', $ff);//делим на массив по точке
            $extension = end($array);//берем последний элемент-расширение
            $unzip='';
            switch ($extension) {
                case 'jpg':
                    $img_icon='img.jpg';
                    break;
                case 'png':
                    $img_icon='img.jpg';
                    break;
                case 'gif':
                    $img_icon='img.jpg';
                    break;
                case 'jpeg':
                    $img_icon='img.jpg';
                    break;
                case 'xlsx':
                    $img_icon='xlsx.png';
                    break;
                case 'xls':
                    $img_icon='xlsx.png';
                    break;
                case 'csv':
                    $img_icon='xlsx.png';
                    break;
                case 'xlsm':
                    $img_icon='xlsx.png';
                    break;
                case 'docx':
                    $img_icon='docx.png';
                    break;
                case 'doc':
                    $img_icon='docx.png';
                    break;
                case 'dwg':
                    $img_icon='dwg.png';
                    break;
                case 'zip':
                    $img_icon='zip.png';
                    $unzip='<span data-file="'.$fullpath.'" class="material-icons unzip cursor" data-tippy="распоковать архив">exit_to_app</span>';
                    break;
                case 'css':
                    $img_icon='CSS.png';
                    break;
                case 'php':
                    $img_icon='php.png';
                    break;
                case 'js':
                    $img_icon='js.png';
                    break;
                case 'html':
                    $img_icon='html.png';
                    break;
                case 'rar':
                    $img_icon='rar.png';
                    break;
                case 'pdf':
                    $img_icon='pdf.png';
                    break;
                case 'msg':
                    $img_icon='msg.png';
                    break;
                default:
                    $img_icon='file.svg';
            }
            $img_icon='<a class="href_file" href="'.$fullpath.'" download><img class="img_icon" src="image/'.$img_icon.'" alt="" ></a>';
            echo '<li class="linew"><span>'.$img_icon.$html_namefile.'<span data-tippy="сохранить файл" data-file="'.$fullpath.'" class="material-icons copy_folders">account_balance</span><span class="open_file material-icons" data-dir="'."\\".str_replace("/", "\\", $fullpath).'">touch_app</span>';
            $array = explode('.', $ff);//делим на массив по точке
            $extension = end($array);//берем последний элемент-расширение
            if($extension=='jpg' or $extension=='gif' or $extension=='jpeg' or $extension=='png' or $extension=='pdf'){
                echo '<a class="but" href="'.$fullpath.'" target="_blank">Oткрыть</a>';
            }
            echo $unzip.'<span class="material-icons del_filenew" data-file="'.$fullpath.'">delete</span>'.$mydate.'<i></i></li>';
        }

    }
    echo '</ol></div>';
}
?>