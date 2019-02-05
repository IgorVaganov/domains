<?
require_once 'path.php';
if ($_POST['excel_table']){

  // print_r(json_decode($_POST['excel_table']));
    $data= '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><dimension ref="A1:B2"/><sheetViews><sheetView tabSelected="1" workbookViewId="0"><selection activeCell="C8" sqref="C8"/></sheetView></sheetViews><sheetFormatPr defaultRowHeight="15" x14ac:dyDescent="0.25"/><cols><col min="1" max="1" width="18.28515625" customWidth="1"/><col min="2" max="2" width="18.42578125" customWidth="1"/><col min="3" max="3" width="18.7109375" customWidth="1"/><col min="4" max="4" width="18.140625" customWidth="1"/><col min="5" max="7" width="18.28515625" customWidth="1"/><col min="8" max="8" width="18.42578125" customWidth="1"/><col min="9" max="9" width="18.140625" customWidth="1"/><col min="10" max="10" width="18.28515625" customWidth="1"/><col min="11" max="11" width="18.42578125" customWidth="1"/><col min="12" max="14" width="18.28515625" customWidth="1"/><col min="15" max="15" width="18.140625" customWidth="1"/><col min="16" max="16" width="18.42578125" customWidth="1"/><col min="17" max="18" width="18.28515625" customWidth="1"/><col min="19" max="20" width="18.42578125" customWidth="1"/><col min="21" max="21" width="18.140625" customWidth="1"/><col min="22" max="22" width="18.28515625" customWidth="1"/><col min="23" max="23" width="18.42578125" customWidth="1"/><col min="24" max="24" width="18.5703125" customWidth="1"/><col min="25" max="25" width="18.42578125" customWidth="1"/><col min="26" max="27" width="18.140625" customWidth="1"/><col min="28" max="29" width="17.85546875" customWidth="1"/></cols><sheetData>';

 /*<c r="A1"><v>1</v></c><c r="B1"><v>1122</v></c><row r="2" spans="1:2" x14ac:dyDescent="0.25"><c r="A2"><v>333</v></c></row>';
*/
    $array_excel = array('A', 'B', 'C', 'D',  'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $i_exsel=0;
    $j_excel=1;
    foreach (json_decode($_POST['excel_table']) as &$row) {
        $data=$data.'<row r="'.$j_excel.'" spans="1:2" x14ac:dyDescent="0.25">';

        foreach ($row as &$colamn) {
            $data=$data.'<c r="'.$array_excel[$i_exsel].$j_excel.'"><v>';
            $data=$data.$colamn;
            $data=$data.'</v></c>';
            $i_exsel=$i_exsel+1;
        }
        $i_exsel=0;
        $data=$data.'</row>';//<c r="A1"><v>1</v></c><c r="B1"><v>1122</v></c>
       // $data='<row r="A22" spans="1:2" x14ac:dyDescent="0.25"><c r="A5"><v>1</v></c><c r="B1"><v>1122</v></c></row>';
        $j_excel=$j_excel+1;
    }
   // echo 'hello';
    $data=$data.'</sheetData><pageMargins left="0.7" right="0.7" top="0.75" bottom="0.75" header="0.3" footer="0.3"/></worksheet>';


    $zip = new ZipArchive(); //Создаём объект для работы с ZIP-архивами
    $zip->open("temp/archive.zip", ZIPARCHIVE::CREATE); //Открываем (создаём) архив archive.zip
    $zip->addFromString('xl/worksheets/sheet1.xml', $data); //записываем в архив документ
    $zip->close();//закрываем иначе записывает на 1 шаг назад

    //создание файла
    $file = "test.xml";
    //если файла нету... тогда
    if (!file_exists($file)) {
        $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
        fwrite($fp, $data);
        fclose($fp);
    }

    copy("temp/archive.zip", "temp/archive.xlsx"); //создаем вордовский файл
}
//echo 'hello';
?>