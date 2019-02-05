<?
require_once 'class/data_base.php';
require_once 'class/myhtml.php';

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

function removespace($text)
{
    $text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
    $text = preg_replace('/([\s])\1+/', ' ', $text);
    $text = trim($text);
    return $text;
}
$select="AND";
if ($_GET['ser']){//на участке IN (-1".$data_id_file.") единичка делает так что бы скобка никогда не была пустой, id -1 никогда не может быть
    //echo removespace($_GET['ser']);
    $words = explode(" ", str_replace(array("\\", "'", '"'), array("\\\\", "\'", '\"'), removespace($_GET['ser'])));//экранируем ёбаные спецсимволы  и делим поисковый запрос на слова
    //print_r($words);
    $number_word=1;//если 1 не печатаем в sql- AND
    foreach ($words as &$word) {
        if($number_word==1){//если 1 не печатаем в sql- AND
            //было до
            //            $search=" WHERE (LOCATE(lower('".$word."'), lower(text)) OR id IN (SELECT DISTINCT idmyread FROM myfile WHERE LOCATE(lower('".$word."'), lower(path)))) AND (readdate BETWEEN '".$_GET['mydate']."-".$_GET['mymonday']."-".$_GET['myday']."' AND '2050-01-01')";//делаем запрос для 1 слова, with right request to table is idmyread end get as id
            $search=" WHERE (LOCATE(lower('".$word."'), lower(text))) OR (LOCATE(lower('".$word."'), lower(header)))";//делаем запрос для 1 слова
        }else{
            //было до
            //$search=$search." ".$select." (LOCATE(lower('".$word."'), lower(text)) OR id IN (SELECT DISTINCT idmyread FROM myfile WHERE LOCATE(lower('".$word."'), lower(path))))";//делаем запрос для остальных слов
            $search=$search." ".$select." (LOCATE(lower('".$word."'), lower(text))) OR (LOCATE(lower('".$word."'), lower(header)))";//делаем запрос для остальных слов
        }
        $number_word++;//что бы выполнилось кроме 1 else
    }
    $pagin='&ser='.$_GET['ser'];//это гавно печатаем в страницах что бы пагинация на поиск была
}else{
    $search="";
    $pagin="";
}
?>



<!-- Page info section -->
<section class="page-info-section set-bg" data-setbg="img/page-info-bg/3.jpg">
    <div class="container">

        <div class="row ">
            <div class="col-lg-7 banner-text text-white wow pulse">
                <h2>Блог</h2>
            </div>
            <div class="col-lg-5 text-lg-right wow bounceInRight my_index">
                <form class="newsletter-form">
                    <input class="text_ser_my" type="text" placeholder="Введите вопрос">
                    <button class="site-btn sb-dark ser_my">Найти</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Page info section end -->

<!-- Blog section -->
<section class="services-section spad">
    <div class="container">
<?
if (isset($_GET['offset'])){
    $offset=$_GET['offset'];
    $activenone='';
}else{
    $offset=0;
    $activenone='active_number';
}
$count_read=4; //count read on 1 page  ".$search."
$count_read_limit=$count_read*10;
$blog_post=data_base::run("SELECT * FROM myread".$search." ORDER BY id DESC LIMIT ".$count_read." OFFSET ".$offset."")->fetchAll();
$count_offset=$offset-$count_read*5;
//echo $count_offset;
if($count_offset>0){

}else{
    $count_offset=0;
}
//echo $count_offset;
$blog_page=data_base::run("SELECT id FROM myread".$search." ORDER BY id DESC LIMIT ".$count_read_limit." OFFSET ".$count_offset."")->rowCount();

$all_post=data_base::run("SELECT id FROM myread".$search."")->rowCount();


//print_r($blog_post);
$i_cou=0;
    if($reg==1){
        $img_down= '" data-imgclass="down" data-id="'.$id.'" data-table="'.$table.'" data-col="'.$col.'" data-act="'.$act.'" data-folder="'.$folder.'"';//если зарегестрирован пользователь еще и кнопку
    }else{
        $hello= '';//просто текст
    }
if($blog_post){
    foreach ($blog_post as &$value) {
        if($i_cou % 2){
            $animation='bounceInRight';
        }else{
            $animation='bounceInLeft';
        }
        $i_cou++;
        echo '
    <!-- Blog post -->
        <div class="blog-item wow '.$animation.'">
            <div class="row">
                <div class="col-lg-6 blog-thumb">';
        if($reg==1){
            echo'<img '.'" data-imgclass="down" data-id="'.$value['id'].'" data-table="myread" data-col="img" data-act="1" data-folder="file/'.$value['id'].'/img"'.' src="'.$value['img'].'" alt="">';
        }else{
            echo'<img src="'.$value['img'].'" alt="">';
        }
        if($_GET['ser']){
            $header_blog=wrapsearch($words, $value['header']);
        }else{
            $header_blog=$value['header'];
        }
        if($_GET['ser']){
            $text_blog=wrapsearch($words, $value['text_from_html']);
        }else{
            $text_blog=$value['text_from_html'];
        }
        echo '         
                </div>
                <div class="col-lg-6 blog-content">
                    <div class="date">'.$value['readdate'].'</div>
                    <h3>'.$header_blog.'</h3>
                    <p>'.mb_substr($text_blog,0, 350, 'UTF-8').'...</p>
                    <a href="/post/?id='.$value['id'].'" class="read-more">Читать далее...</a>
                </div>
            </div>
        </div>
    
    ';
        //$value = $value * 2;
    }
}else{
    echo '<h2>По данному запросу ничего не найдено</h2>';
}



//print_r($blog_post);




?>

        <div class="site-pagination">
            <?
            //echo 'count data'.$blog_page;
            //$i=$count_offset/$count_read;
            //echo '<br/> count_offset'.$count_offset;
            if($count_offset!=0){
                $ii=$count_offset/$count_read;
                $count_pag=$blog_page/$count_read+$ii;
               // echo '<br/>count page'.$count_pag;
            }else{
                $count_pag=$blog_page/$count_read;
                $ii=0;
            }
            if($all_post % $count_read == 0) {
                $last_page=1;
            }else{
                $last_page=0;
            }
            $arraw_back=$_GET['offset']-$count_read;
            if($count_offset>0){
                echo '<a href="'.strtok($_SERVER["REQUEST_URI"],'?').'?offset='.$arraw_back.$pagin.'" class=" "><-</a>';
            }
            for ($i = $ii; $i <= $count_pag-$last_page; $i++)
            {
                $offset1=$count_read*$i;
                if($offset1==$_GET['offset']){
                    $activenone='active';
                }else{
                    $activenone='';
                }
                $i=$i+1;


                echo '<a href="'.strtok($_SERVER["REQUEST_URI"],'?').'?offset='.($i-1)*$count_read.$pagin.'" class=" '.$activenone.'">'.$i.'</a>';
                $i=$i-1;

            }
            $arraw_next=$_GET['offset']+$count_read;
            if($blog_page==40){
                echo '<a href="'.strtok($_SERVER["REQUEST_URI"],'?').'?offset='.$arraw_next.$pagin.'" class=" ">-></a>';
            }
            ?>
        </div>
    </div>
</section>
<!-- Blog section end -->





