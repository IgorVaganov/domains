<?
require_once 'path.php'; //connection database
//delete old file begin
$sql = "SELECT * FROM myfile WHERE id=".$_POST['id']."";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        unlink($row["path"]);
    }
}
//delete old file end
//download file begin
$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "file/".$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
//download file end

//update data into database
$sql = "UPDATE myfile SET path='".str_replace(array("\\", "'", '"'), array("\\\\", "\'", '\"'), $targetPath)."' WHERE id=".$_POST['id']."";
$conn->query($sql);
?>