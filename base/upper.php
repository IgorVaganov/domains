<?
require_once 'path.php'; //connection database
$idread=$_POST['id']; //get id
if(count($_FILES['upload']['name']) > 0){//if exsisting file

    $newfolders = 'file/'.$idread;

    if (file_exists($newfolders)) { //if excist folders
        //not create folders
    } else {//create folders
        mkdir($newfolders);
    }
    //Loop through each file
    for($i=0; $i<count($_FILES['upload']['name']); $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        //Make sure we have a filepath
        if($tmpFilePath != ""){

            //save the filename
            $shortname = $_FILES['upload']['name'][$i];

            //save the url and the file
            $filePath = $newfolders."/".$_FILES['upload']['name'][$i]; //name file
            $array = explode('.', $_FILES['upload']['name'][$i]);//делим на массив по точке
            $extension = end($array);//берем последний элемент-расширение
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;



                }



        }
    }
}
?>