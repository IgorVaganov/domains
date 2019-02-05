<?
require_once 'path.php';
    $create_text=' ';
    $sql = "INSERT INTO myread (text, readdate, javascript) VALUES ('".str_replace(array("\\", "'", '"',"\r\n", " "), array("\\\\", "\'", '\"', "<br/>", "&nbsp;"), $create_text)."', '".date('Y-m-d')."', '')";
    $conn->query($sql);
    //$conn->query("INSERT INTO myread (readdate) VALUES ('".date('Y-m-d')."')");

echo '
    <script>
    location.href="/";
    </script>
    ';

?>