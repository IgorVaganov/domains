
<?
function slider_line(){
    echo '

<table class="slider2column">
    <tr><td>
            <div class="slidershell" id="slidershell1">
                <div class="sliderfill" id="sliderfill1"></div>
                <div class="slidertrack" id="slidertrack1"></div>
                <div class="sliderthumb" id="sliderthumb1"></div>
                <div class="slidervalue" id="slidervalue1">0</div>
                <input class="slider" id="slider1" type="range" min="0" max="100" value="0"
                       oninput="showValue(value,1,false);" onchange="showValue(value,1,false);"/>
            </div>
        </td></tr>
</table>

<style>
    .slider{
        position:absolute;
        left:0px;
        top:0px;
        overflow:visible;
        z-index:100;
    }


    .slidershell {
        border:0 none;
        position:relative;
        left:0px;
        top:0px;
        overflow:visible;
    }

    .slidertrack {
        border:2px outset #666;
        border-radius:4px;
        position:absolute;
    }

    .sliderfill {
        border:2px solid #00767f;
        border-radius:4px;
        position:absolute;
        opacity:0.2;
        pointer-events:none;
        background:#00767f;
        background: linear-gradient(90deg,#005555,#006699);
    }

    .sliderthumb {
        width:40px;
        height:40px;
        background-image:url(\'/image/thumb.png\');
        background-size: 40px 40px;
        background-position:0px 0px;
        background-repeat: no-repeat;
        background-color:transparent;
        position:absolute;
        left:0px;
        top:0px;
        border:0 none;
        padding:0px;
        margin:0px;
        text-align:center;
        pointer-events:none;
    }

    .slidervalue {
        width:40px;
        height:40px;
        line-height:40px;
        color:#fff;
        font-family:helvetica,sans-serif;
        font-size:18px;
        position:absolute;
        left:0px;
        top:0px;
        border:0 none;
        padding:0px;
        margin:0px;
        text-align:center;
        pointer-events:none;
    }

    /*For IE*/
    input[type=range]::-ms-track {
        width:100%;
        height:100%;
        -webkit-appearance:none;
        margin:0px;
        padding:0px;
        border:0 none;
        background:transparent;
        color:transparent;
        overflow:visible;
    }
    input[type=range]::-moz-range-track {
        width:100%;height:100%;
        -moz-appearance:none;
        margin:0px;
        padding:0px;
        border:0 none;
        background:transparent;
        color:transparent;
        overflow:visible;
    }
    input[type=range] {
        width:100%;height:100%;
        -webkit-appearance:none;
        margin:0px;
        padding:0px;
        border:0 none;
        background:transparent;
        color:transparent;
        overflow:visible;
    }

    input[type=range].slidervertical {
        -webkit-appearance: slider-vertical;
        opacity:0.01;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
        background:transparent;
        border:transparent;
    }
    input[type=range]:focus {
        outline: none;
    }

    input[type=range]::-ms-thumb {
        width:40px;height:40px;
        border-radius:0px;
        border:0 none;
        background:transparent;
    }
    input[type=range]::-moz-range-thumb {
        width:40px;height:40px;
        border-radius:0px;
        border:0 none;
        background:transparent;
    }
    input[type=range]::-webkit-slider-thumb {
        width:40px;
        height:40px;
        border-radius:0px;
        border:0 none;
        background:transparent;
        -webkit-appearance:none;
    }

    input[type=range]::-ms-fill-lower {background:transparent;border:0 none;}
    input[type=range]::-ms-fill-upper {background:transparent;border:0 none;}
    input[type=range]::-ms-tooltip { display: none;}

    body {font-family:sans-serif;}
    .slider2column, td, tr, th {
        width:400px;
        border:0 none !important;
    }
</style>



      <script  language="javascript"  type="text/javascript">
    function showValue(val,slidernum,vertical) {
        /* setup variables for the elements of our slider */
        var thumb = document.getElementById("sliderthumb" + slidernum);
        var shell = document.getElementById("slidershell" + slidernum);
        var track = document.getElementById("slidertrack" + slidernum);
        var fill = document.getElementById("sliderfill" + slidernum);
        var rangevalue = document.getElementById("slidervalue" + slidernum);
        var slider = document.getElementById("slider" + slidernum);

        var pc = val/(slider.max - slider.min); /* the percentage slider value */
        var thumbsize = 40; /* must match the thumb size in your css */
        var bigval = 250; /* widest or tallest value depending on orientation */
        var smallval = 40; /* narrowest or shortest value depending on orientation */
        var tracksize = bigval - thumbsize;
        var fillsize = 16;
        var filloffset = 10;
        var bordersize = 2;
        var loc = vertical ? (1 - pc) * tracksize : pc * tracksize;
        var degrees = 360 * pc;
        var rotation = "rotate(" + degrees + "deg)";

        rangevalue.innerHTML = val;

        thumb.style.webkitTransform = rotation;
        thumb.style.MozTransform = rotation;
        thumb.style.msTransform = rotation;

        fill.style.opacity = pc + 0.2 > 1 ? 1 : pc + 0.2;

        rangevalue.style.top = (vertical ? loc : 0) + "px";
        rangevalue.style.left = (vertical ? 0 : loc) + "px";
        thumb.style.top =  (vertical ? loc : 0) + "px";
        thumb.style.left = (vertical ? 0 : loc) + "px";
        fill.style.top = (vertical ? loc + (thumbsize/2) : filloffset + bordersize) + "px";
        fill.style.left = (vertical ? filloffset + bordersize : 0) + "px";
        fill.style.width = (vertical ? fillsize : loc + (thumbsize/2)) + "px";
        fill.style.height = (vertical ? bigval - filloffset - fillsize - loc : fillsize) + "px";
        shell.style.height = (vertical ? bigval : smallval) + "px";
        shell.style.width = (vertical ? smallval : bigval) + "px";
        track.style.height = (vertical ? bigval - 4 : fillsize) + "px"; /* adjust for border */
        track.style.width = (vertical ? fillsize : bigval - 4) + "px"; /* adjust for border */
        track.style.left = (vertical ? filloffset + bordersize : 0) + "px";
        track.style.top = (vertical ? 0 : filloffset + bordersize) + "px";
    }
    /* we often need a function to set the slider values on page load */
    function setValue(val,num,vertical) {
        document.getElementById("slider"+num).value = val;
        showValue(val,num,vertical);
    }

    document.addEventListener(\'DOMContentLoaded\', function(){
        setValue(88,1,false);
    })
</script>
    ';
}
?>