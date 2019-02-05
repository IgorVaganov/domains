<?
class myhtml  {
    function wrap_only_text($word, $htmltext){
        //$newtext=preg_replace("/(" . $word . ")\b(?![^<]*>)/ig", "<b class='text_search'>".'$1'."</b>", $htmltext);
        $newtext=preg_replace("/(" . $word . ")(?![^<]*>)/iu", "<b class='text_search'>".'$1'."</b><!--text_search-->", $htmltext);
        return $newtext;
    }
}
?>