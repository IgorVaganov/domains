<?
require_once 'path.php'; //connection database
$idread=$_POST['id']; //get id
if(count($_FILES['upload']['name']) > 0){//if exsisting file

    $newfolders = 'temp/';

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
            $filePath = $newfolders.$_FILES['upload']['name'][$i]; //name file

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $filePath)) {

                $files[] = $shortname;



                $fp = file_get_contents($filePath);//read of file
                $fp=mb_convert_encoding ($fp, "UTF-8", "windows-1251" );//convert codin windows-125 to utf-8
                $ent='
';//перенос строки ентером тупо скопировал из блокнота а то хуй знает какой этот ебаный символ
                $fp = explode($ent, $fp);//exploder to string
                $table='';//begin read of table
                foreach ($fp as &$value) { //for each as string
                    $table =$table.'<tr class="read_tr"></tr>';
                    $value = explode(';', $value);//exploder to colamn
                    foreach ($value as &$td) { //for each as colamn
                        $table =$table.'<td class="read_td">'.$td.'</td>';
                    }
                    $table =$table.'</tr>';

                }
                unlink($filePath);//delete of a temp file
                echo $table; //send table






            }
        }
    }
}


/*
 *
 * $filename = '/path/to/foo.txt';

if (file_exists($filename)) {
    echo "Файл $filename существует";
} else {
    echo "Файл $filename не существует";
}*/
?>