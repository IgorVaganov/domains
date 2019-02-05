<?
require_once './class/data_base.php';
function mycolor($action='option_cube'){
    echo '
            <div class="wrap_color">
                 <div class="select color_cube green">
                     <div class="selected" contenteditable="true"><div class=""></div></div>
                     <div class="option-list">
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' green" data-color="green"></div> </div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' yellow" data-color="yellow"></div></div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' blue" data-color="blue"></div></div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' orange" data-color="orange"></div></div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' violet" data-color="violet"></div></div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' red" data-color="red"></div></div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' white" data-color="white"></div></div>
                          <div class="option padding0"><div  style="width:100%;height:30px" class="'.$action.' black" data-color="black"></div></div>
                     </div>
                 </div>
             </div>
    ';
}

$all = data_base::run("SELECT * FROM superadmin WHERE id = 1")->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="admin_mail save_page_hover" contenteditable="true"><div tabindex="-1" contenteditable="false" data-logo="1" class="save_page" data-tippy="сохранить запись" data-table="superadmin" data-col="id" data-col2="email">V</div><?echo $all[0]['email']; //email?>
</div>
<div id="mymodal" >
    <p>Сохранить изменение картинки?</p>
    <p><span class="img_yes">да</span><span class="img_none">нет</span> </p>
</div>




<div class="slider_win">
    <div class="cros_out">X</div>
    <div class="slider_div">111</div>
</div>
<div class="tooltip11" contenteditable="true">
    11111
</div>
<div class="modal_delete">
    <div class="note">
        <div class="textnote">Вы действительно хотите удалить эту запись, данные будут безвозвратно потеряны.</div></br>
        <div class="buttomnote">
            <div class="yesnote" data-tippy="Подтвердить удаление статьи">да </div>
            <div class="nonote" data-tippy="Отменить удаление статьи"> нет</div>
        </div>
    </div>
</div>
<div class="down_csv">
    <div class="down_csv_win">Перетащите файлы сюда</div>
    <div class="down_csv_close">Х</div>
</div>

<div class="read_menu ">
    <div class="word_col ">
        <div class="word_col_top ">
            <div class="select">
                <input type="hidden" name="item" value="1">
                <div class="selected" contenteditable="true">Arial</div>
                <div class="option-list">
                    <div class="option text_family">Calibri</div>
                    <div class="option text_family">Times New Roman</div>
                    <div class="option text_family">Complex</div>
                    <div class="option text_family">Lucida Console</div>
                    <div class="option text_family">Nissan Brend Bold</div>
                    <div class="option text_family">Proxy 1</div>
                    <div class="option text_family">stylus BT</div>
                    <div class="option text_family">Datsun Light</div>
                    <div class="option text_family">Arial</div>
                </div>
            </div>
            <div class="select wrap_size">
                <input type="hidden" name="item" value="1">
                <div class="selected selected1" contenteditable="true">8</div>
                <div class="option-list">
                    <div class="option text_size">8</div>
                    <div class="option text_size">9</div>
                    <div class="option text_size">10</div>
                    <div class="option text_size">11</div>
                    <div class="option text_size">12</div>
                    <div class="option text_size">14</div>
                    <div class="option text_size">16</div>
                    <div class="option text_size">18</div>
                    <div class="option text_size">20</div>
                    <div class="option text_size">22</div>
                    <div class="option text_size"">24</div>
                <div class="option text_size">26</div>
                <div class="option text_size">28</div>
                <div class="option text_size">36</div>
                <div class="option text_size">48</div>
                <div class="option text_size">72</div>
            </div>
        </div>
    </div>
    <div class="word_col_top">
        <battom class="but_but1 create_bold" >Ж</battom>
        <battom class="but_but1 create_italics" >К</battom>
        <battom class="but_but1 create_underline" >Ч</battom><br/>
        <battom class="but_but1 create_strike" >abc</battom>
        <battom class="but_but1 sub" >X<sub>2</sub></battom>
        <battom class="but_but1 sup" >X<sup>2</sup></battom>
    </div>
</div>

<div class="word_col">
    <div class="word_col_top">
        <i style="margin-left:4%" class="material-icons menu_text_center1 myhov">format_color_text</i>
        <?mycolor();?>
        <i style="margin-left:4%" class="material-icons menu_text_center1 myhov">format_color_fill</i>
        <?mycolor('cube_bac');?>
    </div>
    <div class="word_col_top">
        <i class="material-icons normal myhov but_but1">title</i>
        <i class="material-icons create_title myhov but_but1">format_size</i>
        <span class="accordion_create"><span class="accordion_click" data-tippy="добавить аккордион">+</span></span>
    </div>
</div>
<div class="wrapculc">
    <div class="culctop word_col_top">
        <i class=" myhov plus" data-tippy="Добавить новую статью">+</i>
        <i class="material-icons menu_text_center1 menu_text_center myhov">format_align_center</i>
        <i class="material-icons menu_text_left myhov">format_align_left</i>
        <i class="material-icons menu_text_right myhov">format_align_right</i>
    </div>
    <div class="culcbuttom">
        <div class="culcval myhov" contenteditable="true">

        </div>
        <div class="culcsub myhov" data-tippy="Добавить запись с выпадающим коментарием">
            +
        </div>
    </div>
</div>
<div class="wrap_create_table">
    <input class="newtable newtable1 myhov" type="text" placeholder="число строк"/>
    <input class="newtable newtable2 myhov" type="text" placeholder="число столбцов" />
    <!--<input class="newtable newtable3 myhov" type="text" placeholder="имя таблицы"/>-->
    <battom class="create_table myhov" >Добавить таблицу</battom>
</div>
<div class="wrap_create_table">
    <input class="myhref myhref1 myhov" type="text" placeholder="название ссылки"/>
    <input class="myhref myhref2 myhov" type="text" placeholder="сама ссылка" />
    <battom class="createhref myhov" >Добавить ссылку</battom>
</div>
<div class="cross_table">
    <div class="cross_top">
        <div class="delete_cell delete_row" data-tippy="Удалить строку в таблице">r</div>
        <div class="create_up myhov">+</div>
        <div class="delete_cell delete_column" data-tippy="Удалить столбец в таблице">c</div>
    </div>
    <div class="cross_top">
        <span class="create_left myhov">+</span>
        <span class="create_next myhov"><i class="material-icons icon_table">control_point</i></span><!--control_point	open_with-->
        <span class="create_right myhov">+</span>
    </div>
    <div class="cross_top">
        <div class="create_bottom myhov">+</div>
    </div>
</div>
</div>