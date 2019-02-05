<style>
    .line {
        width: 99%;
        height: auto;
        text-align: center;
        margin-bottom: 3%;
        border: 1px solid green;
        padding-top: 1%;
        padding-bottom: 1%;
        border-radius: 15px;
        background: #EAD300;
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
    }
    .but {
        background: green;
        border: none;
        color: #fff;
        padding: 0.5% 2%;
        border-radius: 9px;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        margin-bottom: 1%;
    }
    body{
        background: lawngreen;
        /*background: url("/image/back.jpg") no-repeat;*/
        background-size: 100%;
        background-attachment:fixed;
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
    }
    body{
        width: 100%;
    }
    .hide{
        display: none;
    }
    .wrap{
        display: flex;
    }
    .header {
        text-align: center;
        padding: 2% 0%;
        width: 100%;
    }
    #text_ser {
        border: none;
        border-radius: 6px;
        font-size: 16px;
        padding: 0.5% 1%;
        color: #000;
        font-weight: bold;
        width: 44%;
    }
    .ser {
        border: none;
        color: #fff;
        background: green;
        padding: 0.7% 2%;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 15px;
        font-size: 1vw;
        width: 10%;
        cursor: pointer;
    }
    .down_file {
        width: 50%;
        display: block;
        float: left;
        color: #02a2ad;
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
    .text_to_div {
        background: green;
        color: #fff;
        font-weight: bold;
        width: 156px;
        padding: 0.3% 2%;
        font-size: 18px;
        border-radius: 60px;
        margin: auto;
        cursor: pointer;
    }
    .text_search {
        background: yellow;
        animation:1s example infinite;

    }
    @keyframes example {
        from {background-color: red;}
        to {background-color: yellow;}
    }
    .image{
        width: 80%;
        height: auto;
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


</style>