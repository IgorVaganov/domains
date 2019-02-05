<?
function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol class="ol">';
    foreach($ffs as $ff){

        if(is_dir($dir.'/'.$ff)) {
            echo '<li class="li"><div data-dir="'.$dir.'/'.$ff.'" class="li_span fileclick">'.$ff;
            echo '</div></li>';
            listFolderFiles($dir.'/'.$ff);
        }else{
            echo '<li class="li"><div class="li_span">'.$ff;
            echo '</div></li>';
        }

    }
    echo '</ol>';
}
function head(){
    echo '
    <a class="go_main" href="/">на главную</a>
    <a class="go_main" href="/filesystem/">перезагрузить</a>
    <form class="rename" action="/win/" method="get">
    <input class="shifr" name="name" type="search"></br>
    <button class="go_rename" type="submit">переименовать</button>
</form>
    
    ';
}





?>