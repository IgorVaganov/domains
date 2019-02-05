<?
require 'class.php';
$dir='../folders';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>База</title>
    <!--  <link rel="icon" href="/workimage/edge.png" type="image/x-icon">-->
    <meta charset="utf-8">
    <link rel="stylesheet" href="/normalise.css">
    <?php require_once '../css.php'; ?>
</head>
<body id="dropbox" class="bodyflex">
<div class="filesys filesys_left">
    <?head();?>
    <?listFolderFiles($dir);?>
</div>
<div class="filesys filesys_right">
    <?//head();?>
    <?//listFolderFiles($dir);?>
</div>
</body>
</html>
<script src="/library/jquery-3.2.1.min.js"></script>
<script>
    localStorage.setItem('mynewpath', '../folders');
    $( ".filesys" ).on('click', '.fileclick', function(){
        localStorage.setItem('mynewpath', $(this).attr("data-dir"));
        $.ajax({
            url: 'file.php',
            type: "POST",
            data:{path: $(this).attr("data-dir"), root:1},
            success: function(result){
                $('.filesys').html(result);

            }});
        return false;
    });
    $( ".filesys" ).on('click', '.go_rename', function(){
        console.log($('.shifr').val());
        $.ajax({
            url: 'file.php',
            type: "POST",
            data:{path: localStorage.getItem('mynewpath'), ren:1, shifr:$('.shifr').val()},
            success: function(result){
                $('.filesys').html(result);

            }});

        return false;
    });
    var elements = document.querySelectorAll('input, textarea');

    function checkValidity() {};

    for (i=0; i<elements.length; i++) {
        (function(element) {
            var id = element.getAttribute('id');
            element.value = sessionStorage.getItem(id); // обязательно наличие у элементов id
            element.oninput = function() {
                sessionStorage.setItem(id, element.value);
                checkValidity();
            };
        })(elements[i]);
    }
</script>