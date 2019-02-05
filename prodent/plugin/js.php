<script>

$( document ).ready(function() {//.down_csv_win
  $(function(){
    function del_object(ob, my_class, action='delete') {//удаляет любой объект ob-(this), my_class - 'panel'
        ob=ob.parent();
        if(ob.hasClass(my_class)){
            if(action=='delete'){
                ob.remove();
            }
            if(action=='get'){
                //alert(ob);
                return ob;
            }

        }else{
            return del_object(ob, my_class, action);
        }
    }
    function accordion() {
        var accordion='<div class="panel"><div class="acc-header"><div class="acc-click">Заголовок</div><div class="acc-menu " contenteditable="false"><i class="material-icons plus_accor">alarm_add</i><i class="material-icons del_accor">toys</i></div></div><div class="acc-body"><div class="into_acc-body">Текст для печати</div></div> </div>';
        accordion=accordion;
        return accordion;
    }
    function deletelastslach(t) {
        t = t.substr(0, t.lastIndexOf("/"));
        return t;
    }
function read_table(ob_tr) {
    arr_table=[];//our table convert this array
    t_i=0;//count row
    $.each(ob_tr, function() {//перебираем каждую строку
        var ob_td=$(this).find('td');//find column
        var t_j=0;//count column

        arr_table[t_i]=[];//2 two-dimensional array
        $.each(ob_td, function() {//перебираем каждую строку
            arr_table[t_i][t_j]=$(this).text();//recording of each in array
            t_j=t_j+1;//++
        });
        t_i=t_i+1;//++
    });
    return arr_table;
}
    //baging coordinates
    function getOffset( el ) {
        var _x = 0;
        var _y = 0;
        while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
            _x += el.offsetLeft - el.scrollLeft;
            _y += el.offsetTop - el.scrollTop;
            el = el.offsetParent;
        }
        return { top: _y, left: _x };
    }
    //end coordinates
    var newmy_select={
        myselection:function() {//функция вставки предидущего выделения my_select.myselection()
            sel=window.getSelection();//создаём новый объект выделения
            sel.removeAllRanges();//обнуляем его
            sel.addRange(rangob);//выделяем преидущее выделение
        },
        paste:function (elem, myclass, mystyle='') {
            if(rangob!=undefined){//если у нас создавался диапазон выделения
                this.myselection();


                //  working method
                content = rangob.extractContents(); //cut content
                span = document.createElement(elem);//create element
                span.className=myclass; // set class
                span.style.cssText = mystyle;//set style
                span.appendChild(content);
                //var htmlContent = span.innerHTML;
                rangob.insertNode(span);  //insert element


                //document.execCommand("insertHTML", null, paste);//вставляем туда text with html
            }else{//если ничего не выделялось
                //$(this).parent().parent().find('.read').append(string);//вставляем в конец строки
                alert('поставьте курсор в нужное место');
            }
        }
    };
    //объект вставки текста начало
    var my_select={
        myselection:function() {//функция вставки предидущего выделения my_select.myselection()
            sel=window.getSelection();//создаём новый объект выделения
            sel.removeAllRanges();//обнуляем его
            sel.addRange(rangob);//выделяем преидущее выделение
        },
        paste:function (paste) {
            if(rangob!=undefined){//если у нас создавался диапазон выделения
                this.myselection();
                document.execCommand("insertHTML", null, paste);//вставляем туда text with html
            }else{//если ничего не выделялось
                //$(this).parent().parent().find('.read').append(string);//вставляем в конец строки
                alert('поставьте курсор в нужное место');
            }
        }
    };
    var myselect={
        myfunction:function () {
            console.log('hello');
            _this = this;//создаём объект
            var ob=$(this).parent().find('.option-list .option');//находим нашу таблицу и в ней строки

            $.each(ob, function() {//перебираем каждую строку
                if($(this).text().toLowerCase().indexOf($(_this).text().toLowerCase()) === -1) {//если не находим слово
                    $(this).hide();//прячем
                } else {
                    $(this).show();//показываем
                }
            });
        }
    };
    //перебираем свой селект начало
    if($("div").is(".selected")){//есть ли на странице данный элемент
        document.querySelector(".selected").addEventListener("input", myselect.myfunction);
    }
    if($("div").is(".selected1")){//есть ли на странице данный элемент
        document.querySelector(".selected1").addEventListener("input", myselect.myfunction);
    }

    //перебираем свой селект конец
    //document.querySelector(".example");
    //объект вставки текста конец
    //document.designMode = "On";
    //редактирование контента в определённой области с классом read и атрибутом contenteditable="true"  начало
    /*const editor = document.querySelector('.read');
    editor.contentEditable = true;*/
    //редактирование контента в определённой области с классом read и атрибутом contenteditable="true"  конец
    var path="update.php";
    //сохраняет изменённые записи
    /* $('.read').focusout({b:$(this).text()}, function(eventObject){  //функция срабатывает при потере фокуса и передаёт данные
     $.ajax({
     url: path,
     type: "POST",
     data:{update:'1', text:$(this).val(), hidden:$(this).attr("data-id")},
     success: function(result){
     //$("body").html(result);
     }});
     });*/
  /*  jQuery('body').on('focusin focusout', '.read', function(event){  //функция срабатывает при потере фокуса и передаёт данные функция делегированная
        if(event.type === 'focusout'){
            $.ajax({
                url: path,
                type: "POST",
                data:{update:'1', text:$(this).val(), hidden:$(this).attr("data-id")},
                success: function(result){
                    //$("body").html(result);
                }});
        }
    });*/
    //delete read bagin
    //bagin save
    $( "body" ).on('click', '.saves', function(){ //save of file
        //$("[data-date='readdate147']").html('hello');
        var today_date=$('.'+$(this).attr("data-date")+'');
        $.ajax({
            url: path,
            type: "POST",
            data:{update:'text', text:$(this).parent().find('.read').html(), hidden:$(this).parent().find('.read').attr("data-id"), header_title:$('.post_header').text()},
            success: function(result){
                alert('сохранено');
                today_date.html(result);
            }});

    });
    //end save

      //bagin bitrix24
      $( "body" ).on('click', '[name=saved]', function(){ //save of file  <span style="color:green;">Cообщение успешно отправлено</span>
          if($('.my_chekbox').attr('data-chek')=='1'){
          $('.error_message').html('<span style="color:green;">Cообщение отправляется, ожидайте...</span>');
              $.ajax({
              url: path,
              type: "POST",
              data:{first_name:$('[name=first_name]').val(), last_name:$('[name=last_name]').val(), phone:$('[name=phone]').val(), email:$('[name=email]').val(), saved:1},
              success: function(result){
                  $('.error_message').html(result);
              }});
          }else{
              $('.error_message').html('<span style="color:green;">Подтвердите согласие на обработку персональных данных!</span>');
          }
         return false;
      });
      //end bitrix24


//bagin accordion
    $( "body" ).on('click', '.acc-click', function(){ //save of file

        var panel=$(this).parent().parent();
        var text=$(this).parent().parent().children('.acc-body');//children-ищет только первый уровень вложенности в отличии от find
        if(panel.hasClass('acc_active')){
            text.slideUp(400, 'linear');
            panel.removeClass('acc_active');
        }else{
            text.slideDown(400, 'linear');
            panel.addClass('acc_active');
        }
    });

    $( "body" ).on('click', '.del_accor', function(){ //save of file
        var ob=$(this);
        del_object(ob, 'panel');
    });
    $( "body" ).on('click', '.plus_accor', function(){ //save of file
        //alert('hello');
        var ob=$(this);
        ob=del_object(ob, 'acc-header', 'get');
        var html=accordion();
        //console.log(ob.next().children('.into_acc-body'));
        //alert(ob);
        ob.next().children('.into_acc-body').append(html);
        //ob.html(html);

    });
//end accordion

//выделения файлов начало
    var index_elemet_file_begin;
    var index_elemet_file_end;
    var ob_select_file=[];//массив где хранятся выделенные объекты
    $( "body" ).on('click', '.linew', function(){ //save of file
        if(ctrl_click){//если нажата CTRL
            ob_select_file[ob_select_file.length] = $(this);//добавляем в массив выделенный объект
            $(this).addClass( "select_file" );//выделяем этот объект
            index_elemet_file_begin=$(this).index();
        }else{//если не нажата CTRL
            if(shift_click){
                $(this).addClass( "stop" );//выделяем этот элемент
                index_elemet_file_end=$(this).index();
                if(index_elemet_file_end>index_elemet_file_begin){
                    $.each($('.select_file').nextUntil('.stop'), function( index, value ) {//перебираем диапазон массива
                        ob_select_file[ob_select_file.length] = $(this);//добавляем в массив элемент выделения
                        $(this).addClass( "select_file" );//выделяем каждый элемент
                    });
                }
                if(index_elemet_file_end<index_elemet_file_begin){
                    $.each($('.stop').nextUntil('.select_file'), function( index, value ) {//перебираем диапазон массива
                        ob_select_file[ob_select_file.length] = $(this);//добавляем в массив элемент выделения
                        $(this).addClass( "select_file" );//выделяем каждый элемент
                    });
                }

                //$('.select_file').nextUntil('.stop').addClass('select_file');//.addClass('select_file');
                $(this).addClass( "select_file" );//выделяем этот элемент
                ob_select_file[ob_select_file.length] = $(this);//добавляем в массив элемент выделения так как он не входит в диапазон выделения
                }
                else{
                index_elemet_file_begin=$(this).index();
                if(typeof(ob_select_file) != "undefined" && ob_select_file !== null) {//если массив существует и он не пустой

                    ob_select_file.forEach(function(item) {//перебираем выделенные элементы
                        item.removeClass('select_file');//снимаем выделение
                    });

                }
                ob_select_file[ob_select_file.length] = $(this);//добавляем в массив элемент выделения
                $(this).addClass( "select_file" );//выделяем этот элемент
            }


        }

    });
var  ctrl_click=false;//переменная указывает что кнопка CTRL не нажата
var  shift_click=false;//переменная указывает что кнопка shift не нажата
    $(document).keydown(function(event){//событие нажатия кнопки
        if(event.which=="17") {//если нажата кнопка CTRL
            ctrl_click = true;//переменная означает что кнопка нажата
        }
        if(event.which=="16") {//если нажата кнопка shift
            shift_click = true;//переменная означает что кнопка нажата
        }

    });

    $(document).keyup(function(){//событие нажатия кнопки
        ctrl_click = false;//переменная означает что кнопка не нажата
        shift_click = false;//переменная означает что кнопка не нажата
        //alert(shift_click);
    });





    //выделения файлов конец

//начало скачивания zip архива
    $( "body" ).on('click', '.down_zip', function(){ //save of file
        var dir=$(this).attr("data-dir");//считываем путь до папки
        $.ajax({
            url: path,
            type: "POST",
            data:{zip:dir},
            success: function(result){
                $('body').append(result);//вставляем скрипт для скачивания zip архива
               // alert(result);
            }});
        var namefile=dir.split('/').pop()+'.zip';
        //alert(namefile);
        /*
        $.ajax({
            url: path,
            type: "POST",
            data:{mydeletefilenew:'1', hidden: 'temp/'+namefile},
            success: function(result){
            }});*/
    });
    //окончание скачивания zip архива
    //copy folders begin
    $( "body" ).on('click', '.copy_folders', function(){ //save of folders to cocie
        localStorage.setItem('path_folders', $(this).attr("data-file"));
       alert('сохранен путь к папке: '+localStorage.getItem('path_folders'));
    });
    //copy file end

    //paste folders begin
    $( "body" ).on('click', '.paste_folder', function(){ //save of folders to cocie
        if(typeof(localStorage.getItem('path_folders')) != "undefined" && localStorage.getItem('path_folders') !== null) {//если переменная существует и он не пустой
            intoobj=$(this);
            console.log(intoobj);
            $.ajax({
                url: path,
                type: "POST",
                data:{folders_copy: localStorage.getItem('path_folders'), folders_paste: $(this).attr("data-file")+'/'},
                success: function(result){
                    //$('body').append(result);//вставляем скрипт для скачивания zip архива
                    //intoobj.parent().parent().next().html(result);
                    ///alert(result);
                    intoobj.parent().next().html(result);
                }});

        }


    });
    //paste file end


    //начало создания директории
    $( "body" ).on('click', '.create_fol', function(){ //save of file
        var dir=$(this).attr("data-dir");//считываем путь до папки
        intoobj=$(this);
        var namefol=$(this).parent().find('.create_folder').text();
        //alert(namefol);
        if (namefol.trim().length == 0) {
              alert('введите название папки');
        }else{
            $.ajax({
                url: path,
                type: "POST",
                data:{dir:dir, namefol:namefol},
                success: function(result){
                    //$('body').append(result);//вставляем скрипт для скачивания zip архива
                    intoobj.parent().parent().next().html(result);
                }});
        }

    });
    //конец создания директории
    $( "body" ).on('click', '.click_renam_file', function(){
        intoobj=$(this);
        var dir=$(this).attr("data-dir");//считываем путь до папки
        var whot_substrin=$(this).parent().find('.what_rename').text();
        var to_substrin=$(this).parent().find('.to_rename').text();
        if (whot_substrin.trim().length == 0) {
            alert('введите поисковую подстроку');
        }else{
            $.ajax({
                url: path,
                type: "POST",
                data:{dir_ren:dir, whot_substrin:whot_substrin, to_substrin:to_substrin},//dir_rename:dir при установке этого значения почему то открывается папка
                success: function(result){
                    //$('body').append(result);//вставляем скрипт для скачивания zip архива
                    intoobj.parent().parent().next().html(result);
                }});
        }
        return false;
    });


    $( "body" ).on('click', '.create_name_file', function(){
        intoobj=$(this);
        var dir=$(this).attr("data-dir");//считываем путь до папки
        var val=$(this).parent().find('.input_create_left_right').text();
        if (val.trim().length == 0) {
            alert('введите строку которую нужно добавить');
        }else{
            if($(this).attr("data-op")=='1'){
                alert('1');
                $.ajax({
                    url: path,
                    type: "POST",
                    data:{input_dir: dir, input_create_left_right:val, flag:1},//dir_rename:dir при установке этого значения почему то открывается папка
                    success: function(result){
                        //$('body').append(result);//вставляем скрипт для скачивания zip архива
                        intoobj.parent().parent().next().html(result);
                    }});
            }
            if($(this).attr("data-op")=='2'){
                alert('2');
                $.ajax({
                    url: path,
                    type: "POST",
                    data:{input_dir: dir, input_create_left_right:val, flag:2},//dir_rename:dir при установке этого значения почему то открывается папка
                    success: function(result){
                        //$('body').append(result);//вставляем скрипт для скачивания zip архива
                        intoobj.parent().parent().next().html(result);
                    }});
            }


        }
        return false;
    });


    //bagin rename of directory
    $( "body" ).on('click', '.savenamefolder', function(){ //save of file
        var dir=$(this).attr("data-dir");//считываем путь до папки
        intoobj=$(this);
        var namefol=$(this).parent().find('.namefolders_val').text();
        namefol=deletelastslach(dir)+'/'+namefol;
       // alert(dir);
        //alert(namefol);
        if (namefol.trim().length == 0) {
            alert('введите название папки');
        }else{
            $.ajax({
                url: path,
                type: "POST",
                data:{whotrename:dir, torename:namefol},
                success: function(result){
                    //$('body').append(result);//вставляем скрипт для скачивания zip архива
                    intoobj.parent().parent().parent().parent().html(result);
                    //intoobj.parent().html(result);
                    alert('название изменено');
                }});
        }

    });
    //end rename of directory




    //bagin run file
    $( "body" ).on('click', '.open_file', function(){ //save of file
        var dir=$(this).attr("data-dir");//считываем путь до папки
        $.ajax({
            url: path,
            type: "POST",
            data:{openfile:dir},
            success: function(result){
                //$('body').append(result);//вставляем скрипт для скачивания zip архива
                ///intoobj.parent().parent().next().html(result);
                //alert(result);
            }});


    });
    //end run file

    //bagin run file
    $( "body" ).on('click', '.unzip', function(){ //save of file
        var file=$(this).attr("data-file");//считываем путь до папки
        intoobj=$(this);
        $.ajax({
            url: path,
            type: "POST",
            data:{unzip:file},
            success: function(result){
                intoobj.parent().parent().parent().parent().html(result);
            }});


    });
    //end run file


    $( ".delete" ).click(function() {
        ob_delete=$(this).parent();
        ob_id=$(this).attr("data-id");
        $('.modal_delete').fadeIn();
        $('.yesnote').attr("data-function", "delete_read()");//set function for work
        return false;
    });

    $(".read").on('click', '.t_csv', function() {//click to buttom of exsel
        $('.down_csv').fadeIn();
        $('.down_csv').css({'display':'flex'});
        into_table_csv=$(this).parent().find('.read_table > tbody');
        //console.log(into_table_csv);
        return false;
    });
    var intoobj;
    $("body").on('click', '.upload_dir', function() {//click to buttom of exsel
        var pathdir=$(this).attr("data-dir");
        intoobj=$(this);
        $('.down_dir_win').attr('data-dir', pathdir);
        $('.down_dir').fadeIn();
        $('.down_dir').css({'display':'flex'});
        return false;
    });
    //-------------------------------------------------------
    $( ".yesnote" ).click(function() {
        eval($(this).attr('data-function'));//run functions from attr
    });
    function delete_read() {
        ob_delete.addClass( "hide" );
        $.ajax({
            url: path,
            type: "POST",
            data:{mydelete:'1', hidden:ob_id},
            success: function(result){
                //$("body").html(result);
                //alert(result);
                location.href='/blog';

                $('.modal_delete').fadeOut();


            }});
        return false;
    }
    $( ".nonote" ).click(function() {
        $('.modal_delete').fadeOut();
        return false;
    });
    $( ".down_csv_close" ).click(function() {
        $('.down_csv').fadeOut();
        return false;
    });
    $( ".down_dir_close" ).click(function() {
        $('.down_dir').fadeOut();
        return false;
    });
    //end delete read
    $( ".post_html" ).click(function() {

        $('.modal_html').fadeIn();
        //fvar  text_html=$('.readscript[data-id='+$(this).attr('data-id')+']').text();
        //text_html=text_html.replace(new RegExp("<", 'g'), "&lt;");//делаем замену знаков
        //text_html=text_html.replace(new RegExp(">", 'g'), "&gt;");//делаем замену знаков

        $('.closs').attr('data-id', $(this).attr('data-id'));

        $.ajax({
            url: path,
            type: "POST",
            data:{get:'javascript', hidden:$(this).attr("data-id")},
            success: function(result){
                $('.text_html').html(result);
            }});

        return false;
    });
    $( "body" ).on('click', '.closs', function(){ //save of file
        $('.modal_html').fadeOut();
        $.ajax({
            url: path,
            type: "POST",
            data:{update:'javascript', text:$(this).parent().find('.text_html').val(), hidden:$(this).attr("data-id")},
            success: function(result){
                alert('сохранено');
            }});

    });
    //submit search text
    $( ".ser" ).click(function() {

        location.href='/?ser='+$('#text_ser').val()+'&check='+localStorage.getItem('check')+'&mydate='+$('[name=mydate]').val()+'&mymonday='+$('[name=mymonday]').val()+'&myday='+$('[name=myday]').val();
        return false;
    });
    $("#text_ser_my").on("change paste keyup", function() { //chenge input
        localStorage.setItem('mysearch', $(this).val());
        //alert(localStorage.getItem('mysearch'));
    });
    <?
    if ($_GET['ser']){
        echo '
        $("#text_ser_my").val(localStorage.getItem(\'mysearch\'));
        ';
    }
    ?>
    $( ".plus" ).click(function() {
        $.ajax({
            url: path,
            type: "POST",
            data: {newread:'newread'},
            success: function(result){
                //alert(result);
                $('body').prepend(result);
            }});
    });
    $( ".up_file" ).on('change',function(){ //update file
        var this_id=$(this).attr("data-id");
        var formData = new FormData(); //create objecte
        formData.append("file", this.files[0]);//add file into  objecte formdata
        formData.append("id", $(this).attr("data-id"));//add file into  objecte formdata
        var idfile=$(this).attr("data-id");
        var countstr=$(this).val().length;
        var start=$(this).val().lastIndexOf("\\");
        var res = $(this).val().substr(start+1, countstr);
        $.ajax({
            url: "file_upload.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                //var textpath=$(this).val();
                $('a[data-id="'+idfile+'"]').text("file/"+this_id+'/'+res);
                $('a[data-id="'+idfile+'"]').attr('href',"file/"+this_id+'/'+res);
            }
        });
        if ($(this).parent().find( ".image" ).length) {
            //this method (preview image) not working with jquery
            var preview=this.parentNode.querySelector('img'); //find img into div
            var file    = this.files[0]; //get own file
            var reader  = new FileReader(); //objet reader

            reader.onloadend = function () {
                preview.src = reader.result; // important - replace image
            };
            //i don't know whot it
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    });
    //догрузка в записи файлов начало
    $( "body" ).on('change', '.upper', function(){ //save of file
        elem=$(this).parent();
        var formData = new FormData(); //create objecte
        var ins = this.files.length;
        for (var x = 0; x < ins; x++) {
            formData.append("upload[]", this.files[x]);//add file into  objecte formdata
            var extfile = this.files[x].name.split('.').pop();//get extentions of file
            extfile=extfile.toLowerCase();//toLowerCase()-строчные буквы
            if(extfile=='jpg'){
                my_select.paste('<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/'+this.files[x].name+'" class="newimgfile"/></div>'); //insert a file to read
            }
            if(extfile=='jpeg'){
                my_select.paste('<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/'+this.files[x].name+'" class="newimgfile"/></div>'); //insert a file to read
            }
            if(extfile=='png'){
                my_select.paste('<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/'+this.files[x].name+'" class="newimgfile"/></div>'); //insert a file to read
            }
            if(extfile=='gif'){
                my_select.paste('<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/'+this.files[x].name+'" class="newimgfile"/></div>'); //insert a file to read
            }
        }
        formData.append("id", $(this).attr("data-id"));//add file into  objecte formdata
        $.ajax({
            url: "upper.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
               // elem.append(data);
            }
        });
    });
    //догрузка в записи файлов конец
    //загрузка ссылок внутрь записи начало


    //догрузка ссылок внутрь записи конец

    $( "body" ).on('click', '.del_file', function(){
        //$(this).parent().addClass( "hide" );
        //$(this).prev().hide();
        //$(this).prev().prev().hide();
        //$(this).hide();
        $(this).parent().hide();
        $.ajax({
            url: path,
            type: "POST",
            data:{mydeletefile:'1', hidden:$(this).attr("data-id")},
            success: function(result){
            }});
        //del_file
    });

    $( "body" ).on('click', '.del_filenew', function(){
        del_file=$(this).attr("data-file");
        ob_del_file=$(this).parent();
        $('.modal_delete').fadeIn();
        $('.yesnote').attr("data-function", "del_filenew()");//set function for work
        return false;
    });

    function del_filenew() {
        //alert('hello');
        ob_del_file.next().hide();
        ob_del_file.hide();
        $.ajax({
            url: path,
            type: "POST",
            data:{mydeletefilenew:'1', hidden:del_file},
            success: function(result){
                $('.modal_delete').fadeOut();
                //alert(result);
            }});
        //del_file
    }
    var csv_drop; //бъектная переменная
    csv_drop = document.querySelectorAll(".down_csv_win");//область на которую можно переносить файлы
    [].forEach.call(csv_drop, function(csv_drop) {
        csv_drop.addEventListener("dragenter", dragenter_csv, false);
        csv_drop.addEventListener("dragover", dragover_csv, false);
        csv_drop.addEventListener("drop", drop_csv, false); //куда кидаем файлы .parent().find('.read')
    });
    function dragenter_csv(e) {
        e.stopPropagation();
        e.preventDefault();
        //$('body').css('background':'red');
    }
    function dragover_csv(e) {
        e.stopPropagation();
        e.preventDefault();
        document.querySelector('.down_csv_win').style.backgroundColor = "red";
        $('.down_csv_win').text('файл обрабатывается');
    }
    function drop_csv(e) {
        e.stopPropagation();
        e.preventDefault();
        var formData = new FormData(); //create objecte
        var ins = e.dataTransfer.files.length;//count of files
        for (var x = 0; x < ins; x++) {
            formData.append("upload[]", e.dataTransfer.files[x]);//add file into  objecte formdata

        }
        $.ajax({
            url: "csv.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                into_table_csv.append(data);//insert into table
                document.querySelector('.down_csv_win').style.backgroundColor = "white";
                $('.down_csv').fadeOut();//close modal window
            }
        });
    }



    //begin file to folder
    var dir_drop; //бъектная переменная
    dir_drop = document.querySelectorAll(".down_dir_win");//область на которую можно переносить файлы
    [].forEach.call(dir_drop, function(dir_drop) {
        dir_drop.addEventListener("dragenter", dragenter_dir, false);
        dir_drop.addEventListener("dragover", dragover_dir, false);
        dir_drop.addEventListener("drop", drop_dir, false); //куда кидаем файлы .parent().find('.read')
    });
    function dragenter_dir(e) {
        e.stopPropagation();
        e.preventDefault();
        //$('body').css('background':'red');
    }
    function dragover_dir(e) {
        e.stopPropagation();
        e.preventDefault();
        document.querySelector('.down_dir_win').style.backgroundColor = "red";
        $('.down_dir_win').text('файл обрабатывается');
    }
    function drop_dir(e) {
        e.stopPropagation();
        e.preventDefault();
        var formData = new FormData(); //create objecte
        var ins = e.dataTransfer.files.length;//count of files
        for (var x = 0; x < ins; x++) {
            formData.append("upload[]", e.dataTransfer.files[x]);//add file into  objecte formdata

        }
        formData.append("filepath", $(this).attr("data-dir"));//add file into  objecte formdata
        var datadir=$(this).attr("data-dir");
        $.ajax({
            url: "update.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)   {update:'1', text:$(this).val(), hidden:$(this).attr("data-id")}
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                document.querySelector('.down_dir_win').style.backgroundColor = "white";
                $('.down_dir').fadeOut();//close modal window
                intoobj.parent().next().html(data);
            }
        });
    }
    //end file to folder
    $( "body" ).on('dragover', '.read', function(e){
        e.stopPropagation();
        e.preventDefault();
    });

    $( "body" ).on('dragenter', '.read', function(e){
        e.stopPropagation();
        e.preventDefault();
        $(this).css({'background':'linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 57%)'});
    });

    var img_paste;
    $( "body" ).on('drop', '.read', function(e){
        e.stopPropagation();
        e.preventDefault();
        //this.parentNode.querySelector('.upper').files = e.dataTransfer.files;//находим в записи элемент с классом upper
        //console.log(e.dataTransfer.files);
        var files = e.originalEvent.dataTransfer.files;
        elem=$(this);
        var formData = new FormData(); //create objecte
        var ins = files.length;
        for (var x = 0; x < ins; x++) {
            formData.append("upload[]", e.originalEvent.dataTransfer.files[x]);//add file into  objecte formdata
            var extfile = e.originalEvent.dataTransfer.files[x].name.split('.').pop();//get extentions of file
            extfile=extfile.toLowerCase();//toLowerCase()-строчные буквы
            if(extfile=='jpg'){
                img_paste='<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/post/'+e.originalEvent.dataTransfer.files[x].name+'" class="newimgfile"/></div>'; //insert a file to read
            }
            if(extfile=='jpeg'){
                img_paste='<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/post/'+e.originalEvent.dataTransfer.files[x].name+'" class="newimgfile"/></div>'; //insert a file to read
            }
            if(extfile=='png'){
                img_paste='<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/post/'+e.originalEvent.dataTransfer.files[x].name+'" class="newimgfile"/></div>'; //insert a file to read
            }
            if(extfile=='gif'){
                img_paste='<div class="wrap_img" contenteditable="false"><span class="plus_img sign"></span><span class="minus_img sign"></span><img src="file/'+$(this).attr("data-id")+'/post/'+e.originalEvent.dataTransfer.files[x].name+'" class="newimgfile"/></div>'; //insert a file to read
            }
        }
        formData.append("id", $(this).attr("data-id"));//add file into  objecte formdata
        $.ajax({
            url: "upper.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                my_select.paste(img_paste);
            }
        });
        $(this).css({'background':'white'});
    });


    //drag end drop end
    $( "#upload" ).change(function() { //update file
        $('.see').text('выбрано файлов '+this.files.length);
    });
    //replace div to textarea end back begin
    function divClicked(ele) { //изменяет див на текстари

        var data_id=$(ele).parent().find('.read').attr("data-id");//считываем айди записи с дива
        var divHtml = $(ele).parent().find('.read').html();//считываем текст с дива
        divHtml=divHtml.replace(new RegExp("&lt;", 'g'), "<");//делаем замену знаков
        divHtml=divHtml.replace(new RegExp("&gt;", 'g'), ">");//делаем замену знаков
        divHtml=divHtml.replace(new RegExp('<br/>', 'g'), "\n");//делаем замену знаков
        divHtml=divHtml.replace(new RegExp('<br>', 'g'), "\n");//делаем замену знаков
        divHtml=divHtml.replace(new RegExp('&nbsp;', 'g'), " ");//делаем замену знаков
        divHtml=divHtml.replace(new RegExp('<span class="text_search">', 'g'), "");//делаем замену знаков
        divHtml=divHtml.replace(new RegExp("</span>", 'g'), "");//делаем замену знаков
       // divHtml=divHtml.replace(/\<\/?a(.*)\>/g,''); //удаляет тэги
        var editableText = $("<textarea data-id='"+data_id+"' class='read' name='text' id='text' cols='30' rows='10'><textarea />");//создаём тег текстари
        editableText.val(divHtml);//вставляем текст в текстари
        $(ele).parent().find('.read').replaceWith(editableText);//заменяем див на текстари
        editableText.focus(); //ставим фокус на текстари

    }




    if(localStorage.getItem('check')=='1'){//.attr('checked','checked')
        $( ".strict" ).attr('checked','checked');
    }

    $( ".strict" ).on('change',function(){ //update file
        if($('.strict').is(":checked")){
            localStorage.setItem('check', '1');
            //alert(localStorage.getItem('check'));
        }else{
            localStorage.setItem('check', '0');
        }

        });

    //replace div to textarea end back end
    var mystring;//строка выделения
    var mytexst; //весь текст
    var rangob; //сохранённый диапазон выделения
    $( ".create_table" ).click(function() {

        var i=$(this).parent().find('.newtable1').val(); //считывает число строк
        var j=$(this).parent().find('.newtable2').val(); //считывает число столбцов
        var name_table=$(this).parent().find('.newtable3').val(); //считывает число столбцов
        if(i==''){
           alert('Введите колличество строк');
        }else{
            if(j==''){
                alert('Введите колличество столбцов');
            }else{
                var proz=100/j;//узнаём какую ширину дать столбцам
                var string='<div class="wrap_table"><input class="search_table" placeholder="п о и с к"><table class="read_table">';//начало записи таблицы
                for (a=1; a<=i; a++){ //записываем строки
                    string=string+'<tr class="read_tr">';
                    for (b=1; b<=j; b++){//записываем столбцы
                        string=string+'<td class="read_td" width="'+proz+'%"></td>';
                    }
                    string=string+'</tr>';
                }
                string=string+'</table><span class="export_exel" >exel</span></div><br/>';//окончание записи   <span  class="nameuin"><span data-val="'+name_table+'">название</span></span><span class="t_csv">Загрузить csv</span>
                my_select.paste(string);
            }
        }



        //this.parentNode.parentNode.querySelector('.read').execCommand("insertHTML", null, 'hello');
    });

    $( ".createhref" ).click(function() {

        var i=$(this).parent().find('.myhref1').val(); //считывает name
        console.log(i);
        var j=$(this).parent().find('.myhref2').val(); //считывает href
        console.log(j);
        var str_href='<a class="read_href" contenteditable="false" target="_blank" href="'+j+'">'+i+'</a><br/>';
        my_select.paste(str_href);
    });



    $( ".create_title" ).click(function() {
        my_select.paste('<div class="text_title">'+mystring+'</div>');
    });
//create_title menu_text_center //
    $( ".create_bold" ).click(function() {
        newmy_select.paste('span', 'text_bold');
    });
    $( ".normal" ).click(function() {
        newmy_select.paste('span', 'normal_x');
    });
    $( ".menu_text_center" ).click(function() {
        newmy_select.paste('div', 'text_center');
    });
    $( ".menu_text_left" ).click(function() {
        newmy_select.paste('div', 'text_left');
    });
    $( ".menu_text_right" ).click(function() {
        newmy_select.paste('div', 'text_right');
    });
    $( ".sub" ).click(function() {
        newmy_select.paste('sub', '');
    });
    $( ".sup" ).click(function() {
        newmy_select.paste('sup', '');
    });
    //text size
    $('.text_size').on('click', function() {
        var my_size=this.textContent;
        console.log(my_size);
        var mystylepaste='font-size:'+my_size+'px;';
        newmy_select.paste('span', '', mystylepaste);
    });
    $('.text_family').on('click', function() {
        var my_size=this.textContent;
        var mystylepaste='font-family:'+my_size+';';
        newmy_select.paste('span', '', mystylepaste);
    });
    $('.option_cube').on('click', function() {
        var my_size=$(this).attr('data-color');
        var mystylepaste='color:'+my_size+';';
        newmy_select.paste('span', '', mystylepaste);
    });
    $('.cube_bac').on('click', function() {
        var my_size=$(this).attr('data-color');
        var mystylepaste='background:'+my_size+';';
        newmy_select.paste('span', '', mystylepaste);
    });
    $( ".create_italics" ).click(function() {
        newmy_select.paste('i', 'text_italics');
    });
    $( ".create_underline" ).click(function() {
        newmy_select.paste('span', 'text_underline');
    });
    $( ".create_strike" ).click(function() {
        newmy_select.paste('i', 'text_strike');
    });
    $( '.culcsub' ).click(function() {
        var myval=$(this).parent().find('.culcval').text();
        var mycell='<span contenteditable="false"><span contenteditable="true" class="calccell" data-val="'+myval+'"> число </span></span>   <br/>';
        my_select.paste(mycell);
    });
    $( '.accordion_click' ).click(function() {
        var my_val=accordion();
        my_select.paste(my_val);
    });
    $(".read").on('mouseover', '[data-val]', function(){
        var valdata=$(this).attr("data-val");
        //console.log(valdata);
        var x = getOffset(this).left;
        var y = getOffset(this).top;
        //alert(y);
        y=y+$(this).innerHeight();
        $('.tooltip11').text(valdata);
        $('.tooltip11').css({'top': y+'px', 'left': x+'px'});
        $(this).css({'border': '1px solid red'});
        $(this).css({'border-radius': '3px'});
        $(this).css({'transition': '0.5s'});
        //$(this).css({'position': 'fixed'});
        $('.tooltip11').fadeIn();

    });
    $(".read").on('mouseout', '[data-val]', function(){
        $('.tooltip11').fadeOut();
        $(this).css({'border': 'none'});
        $(this).css({'transition': '0.5s'});

    });
    $(".read").on('click', '.sign', function(){
        var img=$(this).parent();//!=undefined  parseFloat
        var wi=img.attr("data-wi");
        if($(this).hasClass('plus_img')){
            if(wi!=undefined){
                wi= parseFloat(wi);
                if(wi!=100){
                    wi=wi+10;
                    img.attr("data-wi", wi);
                }

            }else{
                wi=40;
                img.attr("data-wi", wi);
            }
        }
        if($(this).hasClass('minus_img')){
            if(wi!=undefined){
                wi= parseFloat(wi);
                if(wi!=10){
                    wi=wi-10;
                    img.attr("data-wi", wi);
                }

            }else{
                wi=20;
                img.attr("data-wi", wi);
            }
        }


        img.css({'width':wi+'%', 'transition':'0.5s'});
    });


    jQuery('body').on('focusin focusout', '.read', function(event){  //функция срабатывает при потере фокуса из .read и передаёт данные функция делегированная
        if(event.type === 'focusout'){//потеря фокуса
            if(sel=window.getSelection){//если не осёл и другое гавно
                sel=window.getSelection();//создаём объект выделения
                mystring=window.getSelection().toString();//текст выделения   toString()
                ///mystring=' &shy;'+mystring+'&shy; ';
                /*mydiv = window.getSelection().getRangeAt(0).cloneRange().cloneContents();//html content 1 step
                mystring = document.createElement('span');
                mystring.appendChild(mydiv);*/
                console.log(mystring);
                mytexst=this;//весь текст в записи
                rangob=window.getSelection().getRangeAt(0);//выделенный объект полностью
                idread=$(this).attr("data-id");//get id of read
            }
        }

    });
//поиск в таблице начало       $(".search_table").keyup(function(){            -без делигирования
   $(".read").on('keyup', '.search_table', function() {
        _this = this;//создаём объект
       var ob=$(this).parent().find('table tbody tr');//находим нашу таблицу и в ней строки
        $.each(ob, function() {//перебираем каждую строку
         if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {//если не находим слово
                $(this).hide();//прячем
            } else {
                $(this).show();//показываем
            }
        });
    });
//поиск в таблице конец
    //begin excel
    $(".read").on('click', '.export_exel', function() {//click to buttom of exsel
        var ob_tr=$(this).parent().find('table  tbody tr');//находим нашу таблицу и в ней строки
        arr_table=read_table(ob_tr);
      excel_table=JSON.stringify(arr_table);
        console.log(excel_table);
          $.ajax({
              url: 'excel.php',
              type: "POST",
             // contentType: "application/json",
              data:{excel_table:excel_table},
              success: function(result){
                  console.log(result);
                  window.location.href="temp/archive.xlsx"; //скачиваем документ
              }});
    });
    //end excel
    //вставка строк и столбцов начало $( "<p>Test</p>" ).insertAfter( ".inner" );
    var countrow;//число строк
    var countcolumn;//число столбцов
    var indexrow;//номер строки
    var indexcolumn;//номер столбца
    var thistable;//эта таблица

    $(".read").on('click', 'td', function() {//записываем в переменные все необходимые данные    $(".read").on('keyup', '.search_table', function() {   $( "td" ).click(function() {
        countrow= $(this).parent().parent().find('tr').length;//count row
        countcolumn=$(this).parent().find('td').length;//count column
        indexcolumn = $(this).parent().children().index($(this));
        //var row = $(this).parent().parent().children().index($(this).parent());
        indexrow=$( "tr" ).index($(this).parent()); //индекс строки
        thistable=$(this).parent().parent();
    });
    $( ".create_bottom" ).click(function() {//добавление строк вверх
        var ob=$( "tr" ).eq(indexrow);//берём выделенную строку
        if(flag_icon==1) {//create row
            var mytd='';
            var proz=100/countcolumn;
            for (a=1; a<=countcolumn; a++){ //записываем строки
                mytd=mytd+'<td  class="read_td" width="'+proz+'%"></td>';
            }
            $( '<tr class="read_tr">'+mytd+'</tr>' ).insertAfter( ob );
            my_select.myselection();//функция вставки предидущего выделения
        }else{
            ob.clone().insertAfter($( "tr" ).eq(indexrow+1)); //clone of elements
            ob.remove();
            indexrow=indexrow+1;//при добавлении строки индекс активной строки меняется
        }

    });
    $( ".create_up" ).click(function() {//$( ".create_bottom" ).click(function() {
        var ob=$( "tr" ).eq(indexrow);
        if(flag_icon==1){//create row
            var mytd='';
            var proz=100/countcolumn;
            for (a=1; a<=countcolumn; a++){ //записываем строки
                mytd=mytd+'<td  class="read_td" width="'+proz+'%"></td>';
            }
            $( '<tr class="read_tr">'+mytd+'</tr>' ).insertBefore( ob );
            my_select.myselection();//функция вставки предидущего выделения
            indexrow=indexrow+1;//при добавлении строки индекс активной строки меняется
        }else{//row up
            ob.clone().insertBefore($( "tr" ).eq(indexrow-1)); //clone of elements
            ob.remove();
            indexrow=indexrow-1;//при добавлении строки индекс активной строки меняется
        }

    });
    $( ".create_right" ).click(function() {//$( ".create_bottom" ).click(function() {
        var ob=thistable.find('td').eq(indexcolumn).length;
        if(flag_icon==1){
            var mytd='';
            countcolumn=countcolumn+1;
            var proz=100/countcolumn;
            thistable.find('td').css({'width':proz+'%'});
            mytd=mytd+'<td  class="read_td" width="'+proz+'%"></td>';
            thistable.find('tr').each(function(){
                $(this).find('td').eq(indexcolumn).after(mytd);
            });
            my_select.myselection();//функция вставки предидущего выделения
        }else{
            thistable.find('tr').each(function(){
                var thistd=$(this).find('td').eq(indexcolumn);
                    thistd.clone().insertBefore($(this).find('td').eq(indexcolumn+2)); //clone of elements
                    thistd.remove();
            });
            indexcolumn=indexcolumn+1;//при добавлении строки индекс активной строки меняется
        }

    });
    $( ".create_left" ).click(function() {//$( ".create_bottom" ).click(function() {

        var ob=thistable.find('td').eq(indexcolumn).length;
        if(flag_icon==1){
            var mytd='';
            countcolumn=countcolumn+1;
            var proz=100/countcolumn;
            thistable.find('td').css({'width':proz+'%'});
            mytd=mytd+'<td  class="read_td" width="'+proz+'%"></td>';
            //$( mytd ).insertAfter( ob );
            thistable.find('tr').each(function(){
                $(this).find('td').eq(indexcolumn).before(mytd);
            });
            my_select.myselection();//функция вставки предидущего выделения
            indexcolumn=indexcolumn+1;//при добавлении столбца индекс активного столбца меняется
        }else{
            thistable.find('tr').each(function(){
                var thistd=$(this).find('td').eq(indexcolumn);
                thistd.clone().insertBefore($(this).find('td').eq(indexcolumn-1)); //clone of elements
                thistd.remove();
            });
            indexcolumn=indexcolumn-1;//при добавлении строки индекс активной строки меняется
        }

    });
    $( ".delete_row" ).click(function() {//добавление строк вверх
        var ob=$( "tr" ).eq(indexrow);//берём выделенную строку
        ob.remove();
        my_select.myselection();
    });
    $( ".delete_column" ).click(function() {//$( ".create_bottom" ).click(function() {

        var ob=thistable.find('td').eq(indexcolumn).length;
        //var mytd='';
        countcolumn=countcolumn-1;
        var proz=100/countcolumn;
        //mytd=mytd+'<td  class="read_td" width="'+proz+'%"></td>';
        //$( mytd ).insertAfter( ob );
        thistable.find('tr').each(function(){
            $(this).find('td').eq(indexcolumn).remove();
        });
        thistable.find('td').css({'width':proz+'%'});
       // my_select.myselection();//функция вставки предидущего выделения
    });
    //вставка строк и столбцов конец
 //arrow begin
    var count_search=0;
    var item_search=0;
    //функция скрола посередине начало
    function scrollTo (item) {
        $('html,body').animate({
            scrollTop: $('.text_search').eq(item).offset().top - $(window).height() / 2
        }, 500);
    }
    //функция скрола по середине конец


    //стрелки поиска начало
    <? //пишем данную хрень что бы не было ошибки при поиске
        if (isset($_GET['ser']) and $_GET['ser']!=''){
            echo 'scrollTo (item_search);';
        }
    ?>

    $( ".arrow_down" ).click(function() {
        if($('.text_search').length>0){
            count_search=$('.text_search').length;
            if(count_search-1!=item_search){
                item_search=item_search+1;
                scrollTo (item_search);
            }

        }

    });
    $( ".arrow_up" ).click(function() {
        if($('.text_search').length>0){
            if(0!=item_search){
                item_search=item_search-1;
                scrollTo (item_search);
            }

        }

    });
    $( ".arrow_move" ).click(function() {
        return false;
    });
    //стрелки поиска конец
    //arrow end
    var flag_icon=1;
    $( ".create_next" ).click(function() {
        if(flag_icon==1){
            flag_icon=2;
            $(this).find('.icon_table').text('open_with');
            my_select.myselection();//функция вставки предидущего выделения
        }else{
            flag_icon=1;
            $(this).find('.icon_table').text('control_point');
            my_select.myselection();//функция вставки предидущего выделения
        }
        return false;
    });
    $( "body" ).on('click', '.newimgfile', function(){ //save of file
       // alert('hello');
        $('.modal_img').fadeIn();
        $('.modal_img').css({'display':'flex'});
        $('.modal_img').css({'justify-content':'center'});
        $('.modal_img').css({'align-items':'center'});
       $(this).clone().appendTo( ".modal_img" );
    });
    $( "body" ).on('click', '.down_img_close', function(){ //save of file .empty();
        $('.modal_img').empty();
        $('.modal_img').html(' <div class="down_img_close">Х</div>');
        $('.modal_img').fadeOut();
    });



//цифры начало

    function myget(attr) {
        return parseFloat($('[data-val='+attr+']').text().trim());
    }
    function mypus(attr, val) {
        $('[data-val='+attr+']').text(parseFloat(val.toFixed(3)));//округление и вставка числа
    }
    //alert(myget('6767')+1000);
    // mypus('8989', myget('6767')+1000);
    //myob=$('[data-val=ii]');
    function get_val(val) {
        return parseFloat(val_colamn.find('td').eq(val).text().trim());
    }
    function set_val(val, ret) {
        val_colamn.find('td').eq(val).text(parseFloat(ret.toFixed(3)));//округление и вставка числа
    }
    function matchtable(atr, mycode='') {
        var ob=$('[data-val='+atr+']').parent().parent().find('.read_table  tbody tr');
        var i=0;
        $.each(ob, function() {//перебираем каждую строку
            if(i!=0){
                val_colamn=$(this);
                //$(this).find('td').eq(0).css({'color':'red'})
                // console.log(get_val(0));
                eval(mycode);
                //set_val(0, 1);
                // set_val(1, 2);
                //set_val(2, get_val(0)+get_val(1));
            }
            i++;
        });
    }
    function tok(p, u, cos) {
        var myp=parseFloat(p.toFixed(3));
        var mycos=parseFloat(cos.toFixed(3));
        var myu=parseFloat(u.toFixed(0));
        var myi;
        if(myu==220){
            myi=myp/(myu*mycos);
        }else{
            myi=myp/(myu*mycos*Math.sqrt(3));
        }
        myi=parseFloat(myi.toFixed(3))*1000;
        return myi;
    }
    var chengdiv = document.querySelectorAll(".read");//область на которую можно переносить файлы calccell
    [].forEach.call(chengdiv, function(event) {
        event.addEventListener("keyup", chengescript, false);
        event.addEventListener("cut", chengescript, false);
        event.addEventListener("paste", chengescript, false);
        event.addEventListener("copy", chengescript, false);
        event.addEventListener("delete", chengescript, false);
        event.addEventListener("mouseup", chengescript, false);
        event.addEventListener("input", chengescript, false);
    });
    function chengescript() {

    }
// цифры окончание





    //доработка скрипта начало
    var path="update.php";




    //плагин сохранения текста начало
    function update_text(table, column, text, param, logo) {
        $.ajax({
            url: path,
            type: "POST",
            data:{table:table, column:column, text:text, param:param, logo:logo},
            success: function(result){
                alert(result);
            }});
    }

    $( "body" ).on('click', '.save_page', function(){
        var text=$(this).parent().text();//substring(1)  var x = 'some string';alert(x.charAt(0)); // alerts 's'
        text=text.substring(1);
        var column=$(this).attr("data-col2");
        var param=$(this).attr("data-col");
        var logo=$(this).attr("data-logo");
        var table=$(this).attr("data-table");
        update_text(table, column, text, param, logo);
        return false;
    });
    //плагин сохранения текста окончание

    //плагин сохранения картинки начало
    $( "body" ).on('dragover', '[data-imgclass]', function(e){
        e.stopPropagation();
        e.preventDefault();
        $(this).css({'border':'3px solid green', 'transition':'0.5s', });
    });
    $( "body" ).on('dragleave', '[data-imgclass]', function(e){
        e.stopPropagation();
        e.preventDefault();
        $(this).css({'border':'none', 'transition':'0.5s' });
    });



    var my_image;
    var my_folders;
    var elem;
    var formData;
    var newattr;
    var etion;
    var myact;
    var my_image_id;
    var extfile;
    var my_folders_attr;
    $( "body" ).on('drop', '[data-imgclass]', function(e){
        e.stopPropagation();
        e.preventDefault();
        my_image=$(this);
        myact=$(this).attr("data-act");
        my_image_id=$(this).attr("data-id");
        my_folders='down_img';
        my_folders_attr=$(this).attr('data-folder');
        $(this).css({'border':'none', 'transition':'0.5s'});
        elem=$(this).attr('src');
        formData = new FormData(); //create objecte
        var file = e.originalEvent.dataTransfer.files;//count of files
        formData.append("upload[]", file[0]);//add file into  objecte formdata
        extfile = file[0].name.split('.').pop();//get extentions of file
        extfile=extfile.toLowerCase();//toLowerCase()-строчные буквы

        if(extfile=='jpg'){
            etion=1;
        }else if(extfile=='jpeg'){
            etion=1;
        }else if (extfile=='png'){
            etion=1;
        }else if (extfile=='gif'){
            etion=1;
        }else{
            etion=0;
        }

        formData.append("id", $(this).attr("data-id"));//add file into  objecte formdata
        formData.append("folders", my_folders);//add file into  objecte formdata
        formData.append("alt_src", elem);//add file into  objecte formdata
        formData.append("data", 0);//add file into  objecte formdata
        formData.append("table", $(this).attr("data-table"));//add file into  objecte formdata
        formData.append("column", $(this).attr("data-col"));//add file into  objecte formdata
        newattr=my_folders+'/'+my_image_id+'.'+extfile;
        if(etion==1){
            if(etion==1){
                $.ajax({
                    url: path, // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(data)   // A function to be called if request succeeds
                    {
                        my_image.attr("src", newattr);
                        $('#mymodal').fadeIn( "slow" );
                    }
                });
            }
        }else{
            alert('вы перетащили файл, не являющийся картинкой');
        }

    });

    $( "body" ).on('click', '.img_none', function(e){
        location.href='<?echo $_SERVER['REQUEST_URI'];?>';
    });

      $( "body" ).on('click', '.slider_edit_my', function(){
          $('.slider_win').fadeIn();
          //alert($(this).attr('data-table'));
          var table=$(this).attr('data-table');
          $.ajax({
              url: path, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {all_table:table}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              success: function(data)   // A function to be called if request succeeds
              {
                  $('.slider_div').html(data);
                  //alert(data);
                  //my_image.attr("src", newattr);
                  //$('#mymodal').fadeIn( "slow" );
              }
          });
      });
      $( "body" ).on('click', '.cros_out', function(){
          $('.slider_win').fadeOut();
          location.href='<?echo $_SERVER['REQUEST_URI'];?>';

      });

    $( "body" ).on('click', '.img_yes', function(e){
        formData.set("data", 1);//add file into  objecte formdata
        if(myact=='1'){
            //alert('hello');
        }
        my_folders=my_folders_attr;
        formData.set("folders", my_folders);//add file into  objecte formdata
        newattr=my_folders+'/'+my_image_id+'.'+extfile;
        if(etion==1){
            $.ajax({
                url: path, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    //alert(data);
                    location.href='<?echo $_SERVER['REQUEST_URI'];?>'+'?'+Math.floor(Math.random() * 10)+Math.floor(Math.random() * 10);//что бы обновлялся кэш а то картинка загрузилась а визуально ниче не поменялось
                    $('#mymodal').fadeOut( "slow" );
                }
            });
        }
    });



    /*
     $(function() {
     $( "#draggable" ).draggable();
     });
     */
    //плагин сохранения картинки окончание

    //поиск начало
    $( ".ser_my" ).click(function() {
        //alert($('.text_ser_my').val());
        location.href='/blog?ser='+$('.text_ser_my').val();
        return false;
    });
    $(".text_ser_my").on("change paste keyup", function() { //chenge input
        localStorage.setItem('mysearch', $(this).val());
        //alert(localStorage.getItem('mysearch'));
    });
    <?
    if ($_GET['ser']){
        echo '
        $(".text_ser_my").val(localStorage.getItem(\'mysearch\'));
        ';
    }
    ?>
    //поиск окончание


      //добавление таблицы в слайдер начало
      $( "body" ).on('click', '.plus_slider', function(){

          $.ajax({
              url: path, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {plus_slider:$(this).attr('data-table')}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              success: function(data)   // A function to be called if request succeeds
              {
                 alert('Добавлен новый слайд');
                  location.href='<?echo $_SERVER['REQUEST_URI'];?>';
              }
          });


      });
      //добавление таблицы в слайдер окончание

      //удаление строки из таблицы базы данных начало
      $( "body" ).on('click', '.delete_slider_row', function(){

          $.ajax({
              url: path, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {delete_slider_row:'1', table_row:$(this).attr('data-table'), id_row:$(this).attr('data-id')}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              success: function(data)   // A function to be called if request succeeds
              {
                  alert('Запись удалена');
                  location.href='<?echo $_SERVER['REQUEST_URI'];?>';

              }
          });


      });

      //удаление строки из таблицы базы данных окончание
////////////////////////////////////////
      //изменение чекбокса начало
      $( "body" ).on('click', '.info_data', function(){
          $('#info_data').fadeIn();
      });

      $( "body" ).on('click', '.info_click', function(){
          if($(this).hasClass('info_yes')){
              $('.my_chekbox').attr('data-chek', 1);
              $('.my_chekbox').html('thumb_up');
              $('.my_chekbox').css({'color':'green', 'border':'1px solid green'});
              $('#info_data').fadeOut();
          }
          if($(this).hasClass('info_none')){
              $('.my_chekbox').attr('data-chek', 0);
              $('.my_chekbox').html('pan_tool');
              $('.my_chekbox').css({'color':'red', 'border':'1px solid red'});
              $('#info_data').fadeOut();
          }
      });

      //изменение чекбокса окончание

      //cookie bagin
      $( "body" ).on('click', '.close_cooc', function(){
           $('.i_cookie').fadeOut();
           localStorage.setItem('i_my_cookie', '1');
      });

      if (localStorage.getItem('i_my_cookie') != null){
          $('.i_cookie').css({'display': 'none'});
      }

      //cookie end

      //Плагин для авторизации начало
      function into(ob) {//<img class="piple" src="image/piple.png"><div class="into"  data-ac="exit">Выйти</div> .length

          if(ob.attr("data-ac")=='into'){
              var login=$('.login').val();
              var password= $('.password').val();//trim()
              if(login.trim()==''){
                  alert('пустое поле');
              }else{
                  if(password.trim()==''){
                      alert('пустое поле');
                  }else if(password.trim().length<4){
                      alert('пароль должен быть больше 3 символов!');
                  }else{
                      $.ajax({
                          url: path,
                          type: "POST",
                          data:{login:login, password:password},
                          success: function(result){
                              if(result=='Вы вошли в систему'){
                                  location.href='<?echo $_SERVER['REQUEST_URI'];?>';
                              }else{
                                  alert(result);
                              }
                          }});
                  }

              }
          }
          if(ob.attr("data-ac")=='exit'){
              $.ajax({
                  url: path,
                  type: "POST",
                  data:{exit:1},
                  success: function(result){
                      if(result=='вы вышли из системы'){
                          location.href='<?echo $_SERVER['REQUEST_URI'];?>';
                      }
                  }});
          }
          if(ob.attr("data-ac")=='rename'){

              var exist_password=$('.exist_password').val();
              var new_password1=$('.new_password1').val();
              var new_password2=$('.new_password2').val();
              if(new_password1!=new_password2){
                  alert('подтверждение нового пароля не совпадает');
              }else if(new_password1.trim().length<4){
                  alert('пароль должен быть больше 3 символов!');
              }
              else{
                  $.ajax({
                      url: path,
                      type: "POST",
                      data:{newpassword:new_password1, onpassword:exist_password},
                      success: function(result){
                          alert(result);
                      }});
              }

          }
          if(ob.attr("data-ac")=='pass_mail'){

              var mymail=$('.mymail').val();
              //alert(mymail);

              $.ajax({
                  url: path,
                  type: "POST",
                  data:{mymail:mymail},
                  success: function(result){
                      alert(result);
                  }});


          }



      }
      $( "body" ).on('click', '.into', function(){

          into($(this));
          return false;
      });
      //плагин для авторизации окончание

      //валидация только цифры начало
      $(".ss").keypress(function(event){
          event = event || window.event;
          if (event.charCode && event.charCode!=0 && event.charCode!=46 && (event.charCode < 48 || event.charCode > 57) )
              return false;
      });
      //валидация только цифры окончание

// доработка скрипта конец



  });

});
//выпадающий список селекта в меню начало
$(function(){
    $('.selected').click(function(){
        $(this).parent().find('.option-list').slideToggle(200);
        $(this).parent().toggleClass('select-active');
    });
    $('.option').click(function(){
        select_div = $(this).parent().parent();
        $(select_div).children('.selected').html($(this).html());

        $(this).parent().parent().find('.option-list').slideToggle(200);
        $(this).parent().parent().find('.select').toggleClass('select-active');
    });

});
//выпадающий список селекта в меню конец
    //        localStorage.setItem('mysearch', $(this).val());
    //create read begin

    //create read end
//# sourceMappingURL=tippy.all.min.js.map
</script>
