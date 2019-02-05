
<?
//                        $all = data_base::run("UPDATE ".'image'." SET ".'img'."=? WHERE ".'id'."=?", [ $filePath, $idread]);
$id_post=$_GET['id'];
$blog_post=data_base::run("SELECT * FROM myread WHERE id=?", [$_GET['id']])->fetchAll();


//echo '<form data-wow-offset="200" class="line  wow bounceInUp" action="/" method="post">';

foreach ($blog_post as &$value) {

//------------------------------------------------------------ удаляем файл если он не используется в картинке html начало --------------------------------------
    $dir_post='file/'.$value["id"].'/post';
    if(is_dir($dir_post)){
        //get all attribute 'src' of img tags from html bebin
        $doc = new DOMDocument();
        @$doc->loadHTML($value['text']);
        $tags = $doc->getElementsByTagName('img');
        //get all attribute 'src' of img tags from html end

        //get all files img from post bagin
        $direct=scandir($dir_post);
        unset($direct[array_search('.', $direct, true)]);//удаляем из массива файлы с точками
        unset($direct[array_search('..', $direct, true)]);//удаляем из массива файлы с точками
        //get all files img from post bagin

        foreach ($direct as $dir) {//перебираем все файлы из директории - полных путей
            $flag_src=0;
            foreach ($tags as $tag) {//перебираем все пути картинок из html
                if($tag->getAttribute('src')==$dir_post.'/'.$dir){//если файл не используется в html картинках, нахрен удаляем
                    $flag_src=1;
                }
            }
            if($flag_src==0){
                unlink($dir_post.'/'.$dir);
            }
        }
    }
//------------------------------------------------------------ удаляем файл если он не используется в картинке html окончание --------------------------------------



    echo '<span data-id="'.$value["id"].'">';
    echo '<div class="my_data_center readdate'.$value["id"].'"><span class="readdate">'.$value["readdate"].'</span></div>';
    echo '<h1 '.$contenteditable.' class="post_header">'.$value['header'].'</h1>';
    echo '
   
           <div '.$contenteditable.' data-id="'.$value["id"].'" class="read" name="text" cols=\"30\" rows=\"10\">'.$value['text'].'</div>
 
    ';
    if(isset($_SESSION['superadmin'])) {
        echo '<div data-tippy="Сохранить статью" data-date="readdate' . $value["id"] . '" class="but saves">Сохранить</div>';
        echo '     <div data-tippy="Удалить статью" class="but delete" name="mydelete" type="submit" data-id="'.$value["id"].'">Удалить</div>';
    }
    echo '</span>';
    //$value = $value * 2;
}

//echo '</form>';

?>
<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

<script type="text/javascript">
    VK.init({apiId: 6841755, onlyWidgets: true});
</script>

<!-- Put this div tag to the place, where the Comments block will be -->
<div class="vk_comments_my"><div id="vk_comments"></div></div>

<script type="text/javascript">
    VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
</script>
