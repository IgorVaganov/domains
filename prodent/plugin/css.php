<style>
    @font-face {
        font-family: title;
        src: url(title.ttf);
    }
    @font-face {
        font-family: password;
        src: url(password.woff);
    }
    b{
        font-weight: normal;
    }
    .hello{
        background: red;
    }
    .hello1{
        font-size: 20px;
    }
    .line {
        width: 99%;
        height: auto;
        text-align: center;
        margin-bottom: 3%;
        border: 1px solid green;
        padding-bottom: 1%;
        border-radius: 15px;
        background: #EAD300;
        overflow: hidden;
        padding-top: 2%;
        background: url("/image/read.jpg") repeat;
    }
    .read_menu {
        height: 120px;
        background: #A97100;
        width: 100%;
        border: 0;
        border-bottom: 1px solid #A97100;
        display: flex;
        position: fixed;
        bottom: 0;
        border-top: 3px solid #000;
        padding-left: 1%;
        padding-top: 1%;
        font-size: 14px;
        font-family: serif;
        z-index: 999;
    }
    .newtable {
        margin-left: 1%; */
    font-weight: bold;
        padding-left: 3%;
        width: 90%;
        border: 0;
        font-size: 1.3vw;
        max-height: 20px;
        border-radius: 5px;
    }
    .wrap_create_table {
        width: 14%;
        padding-left: 3%;
    }
    .create_table {
        font-weight: bold;
        padding-left: 5%;
        padding-right: 3%;
        font-size: 1vw;
        width: 6%;
        cursor: pointer;
        z-index: 3;
        margin-top: 3%;
        max-height: 20px;
        border: 1px solid #fff;
        margin-left: 1%;
        border-radius: 3px;
    }
    .create_title{
        z-index: 1;
    }
    .create_bold{
        z-index: 0;
        width: 1%;
    }
    .create_strike{
        text-decoration: line-through;
    }
    .read_table{
        width: 100%;
        border-collapse: collapse;
        background: #44FF0F;
        border: 5px solid #A97100;
        border-radius: 10px;
        border-spacing: 0;
        overflow: hidden;
        color: #000;

    }
    .read_td {
        border: 1px solid #fff;
        padding-left: 1%;
        padding: 0.5% 0.5%;

        text-align: center;
    }
    .read_tr:nth-child(1) {
        background: green;
        color: #fff;
    }


    .read {
        width: 90%;
        border-radius: 7px;
        padding: 0% 1%;
        font-size: 16px;
        background: #ffffff;
        min-height: 250px;
        margin: 0 auto;
        text-align: left;
        word-wrap: break-word;
        margin-bottom: 3%;
    }
    .but {
        background: #A97100;
        border: none;
        color: #fff;
        padding: 0.5% 2%;
        border-radius: 9px;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        margin-bottom: 1%;
        transition: 0.5s;
    }
    .but:hover{
        transition: 0.5s;
        background: green;
    }
    .delete {
        width: 300px;
        height: auto;
        margin: auto;
        border-radius: 100px;
        margin-bottom: 2%;
        background: red;
        transition: 0.5s;
        text-align: center;
    }
    .tamplate_left{
        float: left;
        width: 4%;
    }
    .tamplate_right{
        width: 96%;
    }
    .number {
        background: green;
        color: #fff;
        /* display: flex; */
        text-align: center;
        vertical-align: middle;
        width: 100%;
        padding: 12% 0%;
        font-weight: bold;
        margin-bottom: 7%;
        display: block;
        transition: 1s;
    }
    .number:hover{
        border-radius: 90px;
        transition: 1s;
        background: #A97100;
    }
    body{
        width: 100%;
    }
    .hide{
        display: none;
    }
    .wrap{
        display: flex;
        margin-top: 12%;
    }
    .header {
        text-align: center;
        padding: 0% 0%;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 50;
        background: url(image/header.jpg);
        background-size: contain;
        border-bottom-left-radius: 180px;
        border-bottom-right-radius: 180px;
        transition: 0.5s;
    }
    #text_ser {
        border: none;
        border-radius: 6px;
        font-size: 16px;
        padding: 0.5% 1%;
        color: #000;
        font-weight: bold;
        width: 25%;
    }
    .ser {
        border: none;
        color: #fff;
        background: #A97100;
        padding: 0.7% 2%;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 15px;
        font-size: 1vw;
        width: 10%;
        cursor: pointer;
        border: 1px solid #fff;
        transition: 1s;
    }
    .ser:hover{
        background: green;
        transition: 1s;
    }
    .down_file {
        width: 50%;
        display: block;
        float: left;
        color: #fff;
        font-weight:bold;
        font-size: 23px;
        text-decoration: none;
        left:0;
        text-shadow:0px 0px 0 rgb(-45,115,126),1px 1px 0 rgb(-70,90,101),2px 2px 0 rgb(-95,65,76),3px 3px 0 rgb(-120,40,51), 4px 4px 0 rgb(-145,15,26),5px 5px 4px rgba(0,0,0,0.9),5px 5px 1px rgba(0,0,0,0.5),0px 0px 4px rgba(0,0,0,.2);
        transition: .3s ease-in-out;
    }
    .down_file:hover{
        left: 1%;
        text-shadow:0px 0px 0 rgb(-45,115,126),
                    -1px 1px 0 rgb(-70,90,101),
                    -2px 2px 0 rgb(-95,65,76),
                    -3px 3px 0 rgb(-120,40,51),
                    -4px 4px 0 rgb(-145,15,26),
                    -5px 5px 4px rgba(0,0,0,0.9),
                    -5px 5px 1px rgba(0,0,0,0.5),
                    -0px 0px 4px rgba(0,0,0,.2);
        margin-left: 1%;
    }
    .del_file {
        color: red;
        font-weight: bold;
        font-size: 20px;
        border: 1px solid;
        border-radius: 10px;
        padding: 0 1%;
        cursor: pointer;
    }
    .del_filenew {
        color: red;
        font-weight: bold;
        font-size: 20px;
        border: 1px solid;
        border-radius: 10px;
        padding: 0 1%;
        cursor: pointer;
    }

    .text_search {
        background: yellow;
        animation:1s example infinite;
        font-weight: normal;

    }
    @keyframes example {
        from {background-color: red;}
        to {background-color: yellow;}
    }
    .wrapfile {
        width: 100%;
        border-top: 2px solid green;
        padding-top: 1%;
        padding-bottom: 1%;
    }
    .active_number{
        background: yellow;
        color: blue;
        /*text-align: center;
        vertical-align: middle;
        width: 100%;
        padding: 12% 0%;
        font-weight: bold;
        margin-bottom: 7%;
        display: block;*/
    }
    .see{
        font-weight: bold;
        text-transform: uppercase;
        font-size: 21px;
        color: #A97100;
        text-shadow: 1px 1px #A97100;
        cursor: pointer;
        margin-bottom: 7px;
        transition: 0.5s;
    }
    .see:hover{
        color: darkgreen;
        text-shadow: 1px 1px darkgreen;
        transition: 0.5s;
    }
    #upload {
        width: 0;
        height: 0;
    }
    .strict{
        cursor: pointer;
    }
    .saves {
        width: 300px;
        height: auto;
        margin: auto;
        border-radius: 100px;
        margin-bottom: 2%;
        background: #A97100;
        transition: 0.5s;
        text-align: center;
    }
    .saves:hover{
        transition: 0.5s;
        background: green;
    }
    .text_title{
        width: 100%;
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        text-transform: uppercase;
        padding-top:1%;
        padding-bottom:1%;
        font-family: title;
    }
    .text_bold{
        font-weight: bold;
    }
    .readdate1 {
        margin-top: 3%;
        text-align: center;
    }
    .create_up, .create_left, .create_right, .create_bottom{
        background: green;
        color: #fff;
        font-weight: bold;
        padding: 0 20%;
        border: 3px solid;
        text-align: center;
        cursor: pointer;
        font-size: 1.3vw;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .create_up {
        border-top-right-radius: 14px;
        border-top-left-radius: 14px;
        margin: 0 auto;
        width: 10%;
    }
    .create_left{
        border-bottom-left-radius: 14px;
        border-top-left-radius: 14px;
        width: 30%;
    }
    .create_right{
        border-bottom-right-radius: 14px;
        border-top-right-radius: 14px;
        border: 3px solid;
        width: 30%;
    }
    .create_bottom{
        border-bottom-right-radius: 14px;
        border-bottom-left-radius: 14px;
        margin: 0 auto;
        width: 10%;
    }
    .cross_top{
        display: flex;
        justify-content: center;
        width: 100%;
    }
    .cross_table {
        width: 10%;
        margin-left: 1%;
    }
    .delete_cell {
        background: red;
        border-radius: 80px;
        padding: 0 9%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        width: 30%;
    }
    .arrow_up::before, .arrow_down::before{
        position: relative;
        content: "";
        display: inline-block;
        width: 0.9em;
        height: 0.9em;
        border-right: 0.4em solid #fff;
        border-top: 0.4em solid #fff;
        transform: rotate(-45deg);
        margin-right: 0.5em;
        cursor: pointer;
        transition: 0.5s;

    }
    .arrow_down::before{
        transform: rotate(135deg);
        z-index: 5;
    }
    .arrow_down:hover::before{
        border-right: 0.4em solid green;
        border-top: 0.4em solid green;
        transition: 0.5s;
    }
    .arrow_up:hover::before{
        border-right: 0.4em solid green;
        border-top: 0.4em solid green;
        transition: 0.5s;
    }
    .arrow_move{
        background: none;
        border: none;
    }
    .filesys{
        width:100%;
        float: left;
    }
    .filesys_left{
        border-right: 3px solid green;
    }
    .bodyflex{
        display: flex;
    }

    .go_main {
        display: block;
        text-align: center;
        width: 19%;
        color: blue;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        padding: 1%;
        margin: auto;
        border-radius: 13px;
        border: 3px solid #10F;
        background: #02A;
    }
    .rename {
        margin: auto;
        width: 30%;
        margin-top: 2%;
    }
    .shifr {
        width: 100%;
        padding: 2%;
        font-size: 16px;
        border-radius: 11px;
        border: 3px solid #00E;
        color: #00E;
        font-weight: bold;
        text-align: center;
    }
    .go_rename {
        background: red;
        border: none;
        color: #fff;
        padding: 3%;
        font-weight: bold;
        border-radius: 21px;
        text-transform: uppercase;
        font-size: 1.3vw;
        margin: auto;
        width: 100%;
        margin-top: 4%;
        cursor: pointer;
    }
    .li_span {
        border: 1px solid #fff;
        width: 95%;
        background: #00A;
        color: #fff;
        padding: 0.5% 1%;
        font-size: 16px;
        border-radius: 12px;
        font-weight: bold;
    }
    .fileclick{
        cursor: pointer;
    }
    .filesys_right{
        display: none;
    }
    .menu_text_center1, .menu_text_left, .menu_text_right, .sub, .sup, .create_italics, .create_bold, .create_title, .normal, .create_underline, .create_strike, .plus{
        background: #fff;
        cursor: pointer;
        border: 1px solid;
        color: crimson;
        align-items: center;
        justify-content: center;
        padding: 5%;
        display: flex;
        margin-right: 0;
        margin-left: 0;
        height: 20px;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .but_but1{
        width: 14%;
        margin-top: 6%;
        background: rgba(0,0,0,.3);
        color: #fff;
        transition: 0.5s;
        margin-left: 2%;
        text-align: center;
    }
    .but_but1:hover{
        border: 1px solid #aaa;
        transition: 0.5s;
    }
    .myhov:hover{
        border: 1px solid #aaa;
        transition: 0.5s;
    }
    .myhov{
        background: rgba(0,0,0,.3);
        color: #fff;
        transition: 0.5s;
    }
    .text_strike{
        text-decoration: line-through;
    }
    .create_underline{
        text-decoration: underline;
    }
    .normal_x{
        font-size: 16px;
        color: #000;
        font-weight: normal;
        text-decoration: none;
    }
    .text_underline{
        text-decoration: underline;
    }


    .sub, .sup{
          align-items: center;
          justify-content: center;
          padding: 5%;
          display: flex;
          height: 20px;
      }
    .text_center{
        width: 100%;
        text-align: center;
    }
    .text_left{
        width: 100%;
        text-align: left;
    }
    .text_right{
        width: 100%;
        text-align: right;
    }
    /** begin from google*/
    @font-face {
        font-family: 'Material Icons';
        font-style: normal;
        font-weight: 400;
        src: url(plugin/google.woff2) format('woff2');
    }

    .my_data_center{
        text-align: center;
        margin-top:1%;
    }

    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 18px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: flex;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -webkit-font-feature-settings: 'liga';
        -webkit-font-smoothing: antialiased;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 15%;
    }
    /*end from google*/
    option[value="red"]
    {
        background-color:red;
    }
    option[value="green"]
    {
        background-color:green;
    }
    option[value="yellow"]
    {
        background-color:yellow;
    }
    option[value="blue"]
    {
        background-color:blue;
    }
    option[value="orange"]
    {
        background-color:orange;
    }
    option[value="violet"]
    {
        background-color:violet;
    }
    .text_size, .text_color, .text_bacgrond{
        cursor: pointer;
    }
    .readdate {
        padding: 0% 1%;
        border-radius: 4px;
        font-weight: bold;
        background: #fff;
        color: #fff;
        text-shadow: 1px 1px 2px black, 0 0 1em red;
        font-size: 25px;
    }

    .word_col_top{
        display: flex;
    }
    .word_col {
        width: 250px;
    }
    /** на опшен начало*/
    .text{
        height: 150px;
        width: 300px;
        margin: 0 auto 10px;
        padding: 10px;
        border-radius: 2px;
        background: #006ea1;
        box-shadow: 0 0 10px 0 #000;
    }
    .select{
        width: 100%;
        height: 25px;
        padding: 0 10px;
        margin: 0 auto;
        border: 1px solid #fff;
        border-radius: 2px;
        background: rgba(0,0,0,.3);
        position: relative;
        color: #fff;
        transition: 0.5s;
    }
    .select:hover{
        border: 1px solid #aaa;
        transition: 0.5s;
    }
    .select-active {
        border-radius: 0 0 2px 2px;
        border: 1px solid #aaa;
    }

    .selected{
        width: 100%;
        height: 100%;
        line-height: 23px;
        cursor: pointer;
        overflow: hidden;
    }
    .option-list{
        display: none;
        position: absolute;
        width: 100%;
        bottom: 100%;
        left: -1px;
        box-sizing: content-box;
        border: 1px solid #aaa;
        border-radius: 2px 2px 0 0;
        background: #6a6a6a;
        z-index: 2;
    }
    .option{
        width: 100%;
        height: 25px;
        line-height: 25px;
        padding: 0 10px;
        cursor: pointer;
    }
    .option:hover{
        background: rgba(255,255,255,.2);
        cursor: pointer;
    }
    /** на опшен конец**/
    .wrap_size {
        width: 40px;
    }
    .wrap_color {
        width: 20%;
    }
    .color_cube{
        width: 57%;
        margin-left: 1%;
        padding: 0;
    }
    .option_cube{
        width: 100%;
        height: 30px;
    }
    .green{
        background: green;
    }
    .blue{
        background: blue;
    }
    .yellow{
        background: yellow;
    }
    .orange{
        background: orange;
    }
    .red{
        background: red;
    }
    .violet{
        background: violet;
    }
    .white{
        background: white;
    }
    .black{
        background: black;
    }

    .padding0{
        padding: 0;
    }
    .modal_delete, .modal_html{
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(46, 77, 255, 0.7);
        z-index: 90;
        top: 0;
        left: 0;
        display: none;
        text-align: center;
    }
    .note {
        width: 30%;
        margin: auto;
        margin-top: 11%;
        background: #fff;
        padding: 2%;
        border-radius: 16px;
        display: flex;

    }

    .buttomnote {
        width: 70%;
    }
    .yesnote, .nonote {
        background: red;
        color: #fff;
        padding: 3%;
        width: 45%;
        text-align: center;
        margin-top: 2%;
        border-radius: 20px;
        margin-bottom: 15%;
        cursor: pointer;
    }
    .nonote{
        background: green;
    }
    .myhref {
        margin-left: 1%;
        padding-left: 3%;
        width: 90%;
        border: 0;
        font-size: 1.3vw;
        max-height: 20px;
        border-radius: 5px;
    }
    .createhref{
        font-weight: bold;
        padding-left: 5%;
        padding-right: 3%;
        font-size: 1vw;
        width: 6%;
        cursor: pointer;
        z-index: 3;
        margin-top: 3%;
        max-height: 20px;
        border: 1px solid #fff;
        margin-left: 1%;
        border-radius: 3px;
    }
    .plus{
        width: 30px;
        font-size: 30px;
        font-weight: bold;
    }
    .mypost {
        text-decoration: none;
        color: #000;
        border: 1px solid;
        padding: 0% 1%;
        border-radius: 7px;
        cursor: pointer;
        font-weight: bold;
    }
    .post_html {
        color: #fff;
        font-weight: bold;
        background: #A97100;
        padding: 0.1% 1%;
        cursor: pointer;
        border-radius: 6px;
        cursor: pointer;
    }
    .text_html{
        width: 80%;
        margin: auto;
        background: #fff;
        padding: 2%;
        border-radius: 5px;
        overflow-y: scroll;
        height: 50%;
    }
    .closs{
        background: red;
        width: 5%;
        margin: auto;
        text-align: center;
        padding: 1%;
        color: #fff;
        font-weight: bold;
        border-radius: 20px;
        margin-top: 1%;
        cursor: pointer;

    }
    .wrapculc {
        width: 15%;
    }
    .culctop{
        display: flex;
    }
    .culcbuttom {
        display: flex;
        margin-top: 5%;
    }
    .culcval, .culcsub {
        padding: 2%;
        border: 1px solid;
        width: 70%;
        text-align: center;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
    }
    .culcval{
        border-right: none;
    }
    .culcsub {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
        width: 15%;
        background: #241203;
        cursor: pointer;
        border-left: none;
    }
    .tooltip11 {
        background: #fff;
        width: 13%;
        position: absolute;
        text-align: center;
        border-radius: 10px;
        height: auto;
        min-height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        overflow: hidden;
        border: 1px solid green;
        cursor: pointer;
        display: none;
    }
    .fun_get, .fun_pus{
        color: #fff;
    }
    .newimgfile {
        width: 100%;
        height: auto;
        cursor: pointer;
    }
    .export_exel, .nameuin, .t_csv {
        border: 1px solid green;
        padding: 0 9px;
        border-radius: 5px;
        color: green;
        font-weight: bold;
        cursor: pointer;
    }
    .down_csv, .down_dir{
        position: fixed;
        width: 100%;
        height: 100%;
        background: blue;
        top: 0;
        left: 0;
        z-index: 50;
        display: flex;
        background: rgba(46, 77, 255, 0.7);
        display: none;
    }
    .down_csv_win, .down_dir_win {
        width: 50%;
        background: white;
        margin: auto;
        height: 60%;
    }
    .down_csv_close, .down_img_close, .down_dir_close {
        width: 5%;
        background: red;
        height: 5%;
        text-align: center;
        font-weight: bold;
        color: white;
        border-radius: 9px;
        padding-top: 1%;
        font-size: 2vw;
        cursor: pointer;
    }
    .down_csv_close{
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1vw;
        padding-top: 0;

    }
    .create_next {
        width: 31%;
        cursor: pointer;
        padding: 0% 10%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.5s;
        font-weight: bold;
    }
    .create_next:hover{
        transition: 0.5s;
        background: green;
    }
.modal_img{
    position: fixed;
    width: 100%;
    height: 100%;
    background: blue;
    top: 0;
    left: 0;
    z-index: 50;
    display: flex;
    background: rgba(46, 77, 255, 0.7);
    display: none;
}
    .myfilesystem {
        width: 100%;
    }
    .href_file {
        text-decoration: none;
        text-shadow: 1px 1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, -1px -1px 0 #000;
        color: white;
        transition: all 1s;
        font-size: 22px;
        margin-right: 3%;
    }
     .olnew .olnew{
         border-left: 2px solid green;
         border-bottom: 2px solid green;
         min-height: 40px;

    }
    .olnew{
        width: 100%;
        padding-top: 1%;
        padding-bottom: 1%;
        text-align: left;
        border-bottom-left-radius: 26px;
    }

    .li_spannew {
        background: green;
        color: #fff;
        text-decoration: none;
        text-shadow: 1px 1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, -1px -1px 0 #000;
        transition: all 1s;
        text-align: left;
        font-size: 22px;
        padding-left: 3%;
        border-top-left-radius: 50px;
    }
    .img_folders{
        width: 6%;
    }
.down_zip{
    margin: 0% 1%;
    border: 1px solid white;
    color: white;
    border-radius: 5px;
}
    .create_foldercss, .namefolders_val {
        font-size: 20px;
        border: 1px solid;
        min-width: 624px;
        border-radius: 10px;
        padding: 0px 6px;
    }
    .savenamefolder{
        cursor: pointer;
    }
    .open_file {
        border: 1px solid;
        margin-right: 1%;
        border-radius: 8px;
        cursor: pointer;
    }
    .img_icon {
        float: left;
        width: 50px;
        height: auto;
        margin: 0%;
        margin-bottom: 3%;
    }
    .linew {
        display: table-row;
    }
    .click_renam_file {
        margin-right: 1%;
        margin-left: 1%;
    }
    .select_file{
        transition: 0.5s;
        background: blue;
        color: white;
    }
    .copy_folders{
        cursor: pointer;
    }
    .cursor{
        cursor: pointer;
    }
    .accordion_click {
        background: #241203;
        color: #fff;
        padding: 7% 13%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border-radius: 20px;
        transition: 0.5s;
    }
    .accordion_click:hover{
        transition: 0.5s;
        background: green;
    }
    .acc-header {
        background: blue;
        color: #fff;
        display: flex;
        padding: 0.5% 1%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .acc_active>.acc-body{
        display: block;
    }
    .acc-body{
        display: none;
    }
    .panel {
        padding-left: 2%;
        margin-bottom: 3px;
    }
    .acc-menu{

    }
    .acc-click{
        margin-right: auto;
    }
    .acc-body {
        border: 1px solid blue;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 1%;
    }
    .del_accor{
        cursor: pointer;
        transition: 0.5s;
    }
    .del_accor:hover{
        transition: 0.5s;
        color: red;
    }
    .plus_accor{
        cursor: pointer;
        transition: 0.5s;
    }
    .plus_accor:hover{
        color: yellow;
    }
    .accordion_create {
        padding-top: 6%;
        padding-left: 6%;
        width: 20%;
    }
    .read_href {
        border: 1px solid;
        padding: 0.5% 1%;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        background: linear-gradient(45deg, #1100ffa6 15%, #0037ff 30%, #00bbff 50%, #005aff 75%);
        color: #fff;
    }
    .slider2column {
        position: absolute;
        top: -20%;
        transition: 0.5s;
    }
    .wrap_img {
        width: 30%;
    }
    .wrap_img:hover .sign{
        opacity: 1;
        transition: 0.5s;
        width: 30px;
        height: 30px;
        margin-top: 1%;

    }
    .sign {
        position: absolute;
        margin-left: 1%;
        background: green;
        color: #fff;
        padding: 5px 14px;
        width: 0px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.5s;
        cursor: pointer;
        margin-top: 0;
        height: 0px;
    }
    .minus_img {
        margin-left: 5%;
        background: url(/image/minus.png) no-repeat;
        background-size: contain;
        transition: 0.5s;
    }
    .minus_img:hover {
        filter: hue-rotate(199deg);
        transition: 0.5s;
        width: 40px!important;
        height: 40px!important;
    }
    .plus_img {
        background: url(/image/plus.png) no-repeat;
        background-size: contain;
        transition: 0.5s;
    }
    .plus_img:hover {
        filter: hue-rotate(290deg);
        transition: 0.5s;
        width: 40px!important;
        height: 40px!important;
    }
    .regis {
        width: 15%;
        float: left;
        margin-left: 10%;
        border-radius: 14px;
        transition: 0.5s;
    }


    .piple {
        width: 20%;
    }

    .post_header{
        text-align: center;
    }
    .slider_win{
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(1, 1, 1, 0.5);
        display: none;
        z-index: 9991;
        padding-top: 3%;
    }
    .slider_div{
        width: 90%;
        height: auto;
        background: #fff;
        display: block;
        margin-top: 11%;
        margin: auto;
        padding: 1%;
        text-align: center;
        border-radius: 10px;
        overflow-y: scroll;
        max-height: 500px;
    }
    .slider_edit_my {
        position: absolute;
        z-index: 2;
        background: green;
        color: #fff;
        font-weight: bold;
        border-bottom-right-radius: 90px;
        width: 0;
        cursor: pointer;
        overflow: hidden;
        transition: 0.5s;
        text-align: center;
        font-size: 20px;
    }
    .hover_slider:hover .slider_edit_my{
        width: 10%;
        transition: 0.5s;
    }
    .cros_out {
        background: red;
        position: absolute;
        color: #fff;
        padding: 1% 2%;
        right: 0;
        top: 0;
        font-weight: bold;
        border-radius: 90px;
        cursor: pointer;
    }
    .save_page {
        background: green;
        width: 0;
        text-align: center;
        color: #fff;
        position: absolute;
        z-index: 999999;
        margin-bottom: -40%;
        font-weight: bold;
        border-radius: 25px;
        cursor: pointer;
        overflow: hidden;
        cursor: pointer;
        transition: 0.5s;
    }
    .save_page {
        background: yellow;
        animation:1s example infinite;
        font-weight: normal;

    }
    @keyframes example {
        from {background-color: green;}
        to {background-color: yellow;}
    }
    .save_page_hover:hover .save_page{
        width: 50px;
        transition: 0.5s;
    }
    .save_page_hover{
        min-width: 10px;
    }

    .horehore {
        width: 49%;
        float: left;
        /* text-align: center; */
    }
    .horight {
        text-align: right;
    }

    #mymodal, #info_data{
        position: fixed;
        border: 1px solid green;
        padding: 0.5% 1%;
        font-weight: bold;
        color: aliceblue;
        text-align: center;
        z-index: 10;
        background: rgba (0,0,0,0.3);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0,0,0,.3);
        padding-top: 3%;
        font-size: 27px;
        display: none;
        z-index: 99999;
    }

    .img_yes, .img_none, .info_yes, .info_none {
        text-align: center;
        background: red;
        border-radius: 90px;
        padding: 1%;
        margin: 4%;
        cursor: pointer;
    }


    .img_none{
        background: green;

    }
    .info_yes{
        background: green;

    }
    .text_info {
        width: 80%;
        margin: auto;
        font-size: 14px;
        background: #fff;
        color: #000;
        padding: 2%;
        margin-bottom: 3%;
        max-height: 200px;
        overflow: hidden;
        overflow-y: scroll;
    }
    .plus_slider {
        font-size: 30px;
        border:1px solid green;
        width: 10%;
        margin: auto;
        color: green;
        border-radius: 90px;
        transition: 0.5s;
        cursor: pointer;
        margin-top: 2%;

    }
    .plus_slider:hover {
        font-size: 48px;
        background: green;
        width: 12%;
        border-radius: 90px;
        transition: 0.5s;
        color: #fff;

    }
    .delete_slider_row {
        background: red;
        color: #fff;
        font-weight: bold;
        border-radius: 90px;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.5s;
        cursor: pointer;
    }
    .delete_slider_row:hover{
        transform: rotate(-90deg);
        transition: 0.5s;
    }
    .admin_mail {
        position: fixed;
        top: 0;
        left: 0;
        border: 3px solid green;
        padding: 0.5% 1%;
        border-radius: 11px;
        transition: 0.5s;
    }
    .admin_mail:hover{
        padding-left: 2%;
        transition: 0.5s;
    }
    /*файлы куки начало*/
    .i_cookie {
        position: fixed;
        z-index: 9;
        background: gray;
        color: #fff;
        left: 0;
        bottom: 0;
        padding: 0.5% 1%;
        transition: 0.5s;
        padding-right: 3%;
    }
    .i_cookie:hover {
       padding-left: 1%;
        transition: 0.5s;
    }
    .i_page_cooc {
        background: green;
        color: #fff;
        font-weight: bold;
        padding: 0% 1%;
        cursor: pointer;
        border-radius: 90px;
    }
    .close_cooc {
        position: absolute;
        right: 0;
        background: red;
        padding: 0% 1%;
        border-radius: 90px;
        text-align: center;
        cursor: pointer;
    }
    /*файлы куки окончание*/

</style>

