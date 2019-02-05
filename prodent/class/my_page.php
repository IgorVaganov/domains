<?
class my_page  {
    function page($url, $template='/'){
        $answer=false;
        if($url==$template){
            $answer=true;
        }
        $url_from=substr($url, 0, -1);
        if($url_from==$template){
            $answer=true;
        }
        return $answer;
    }
}
?>