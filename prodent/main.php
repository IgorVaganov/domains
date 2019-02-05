

<!-- Hero section -->
<section class="hero-section hover_slider">
    <?    slider_tab(array('table'=>'slider1'));
    ?>
    <div class="hero-slider owl-carousel">

    <?
    $all_table=data_base::run("SELECT * FROM slider1")->fetchAll();
            foreach ($all_table as $row){
                echo '
                 <!-- item -->
        <div class="hs-item set-bg text-white" data-setbg="'.$row['img'].'">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <h2>'.$row['text1'].'</h2>
                        <p>'.$row['text2'].'</p>
                        <a href="/blog" class="site-btn">Читать больше</a>
                    </div>
                </div>
            </div>
        </div>
                
                
                ';
            }
    ?>



    </div>
</section>
<!-- Hero section end -->


<!-- Banner section -->
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 banner-text text-white wow bounceInLeft">
                <h4 class="save_page_hover" data-logo="free_con" <?echo $contenteditable;?>><?print_text('free_con');?></h4>
                <div  class="save_page_hover" data-logo="frommy" <?echo $contenteditable;?>><?print_text('frommy');?></div>
            </div>
            <div class="col-lg-5 text-lg-right wow flipInX">
                <a href="/blog" class="site-btn sb-light">Читать больше</a>
            </div>
        </div>
    </div>
</section>
<!-- Banner section end -->



<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wow bounceInRight">
                <img <?img_down(3);?> alt="">
            </div>
            <div class="col-lg-7 about-text">
                <h2 class="wow rollIn save_page_hover"data-logo="yur_dent" <?echo $contenteditable;?>><?print_text('yur_dent');?></h2>
                <div  class="wow shake save_page_hover" data-logo="text_dent" <?echo $contenteditable;?>><?print_text('text_dent');?></div>
                <img class="wow swing" <?img_down(4);?> alt="">
            </div>
        </div>
    </div>
</section>
<!-- About section end -->


<!-- Facts section -->
<section class="facts-section set-bg" data-setbg="img/facts-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 fact wow rollIn">
                <i class="flaticon-003-tooth-3"></i>
                <h2 class="save_page_hover" data-logo="num1" <?echo $contenteditable;?>><?print_text('num1');?></h2>
                <div  class=" yuyu save_page_hover" data-logo="text1" <?echo $contenteditable;?>><?print_text('text1');?></div>
            </div>
            <div class="col-md-3 col-sm-6 fact wow bounceInUp">
                <i class="flaticon-002-toothbrush-1"></i>
                <h2 class="save_page_hover" data-logo="num2" <?echo $contenteditable;?>><?print_text('num2');?></h2>
                <div  class=" yuyu save_page_hover" data-logo="text2" <?echo $contenteditable;?>><?print_text('text2');?></div>
            </div>
            <div class="col-md-3 col-sm-6 fact wow lightSpeedIn">
                <i class="flaticon-030-tooth"></i>
                <h2 class="save_page_hover" data-logo="num3" <?echo $contenteditable;?>><?print_text('num3');?></h2>
                <div  class=" yuyu save_page_hover" data-logo="text3" <?echo $contenteditable;?>><?print_text('text3');?></div>
            </div>
            <div class="col-md-3 col-sm-6 fact wow rollIn">
                <i class="flaticon-023-tooth-1"></i>
                <h2 class="save_page_hover" data-logo="num4" <?echo $contenteditable;?>><?print_text('num4');?></h2>
                <div  class=" yuyu save_page_hover" data-logo="text4" <?echo $contenteditable;?>><?print_text('text4');?></div>
            </div>
        </div>
    </div>
</section>
<!-- Facts section end -->



<!-- Services section -->
<section class="services-section spad">
    <div class="container">
        <div class="section-title text-center wow pulse">
            <h2 class="save_page_hover" data-logo="naus" <?echo $contenteditable;?>><?print_text('naus');?></h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 service wow lightSpeedIn rollIn center">
                <div class="service-icon">
                    <i class="flaticon-020-decay"></i>
                </div>
                <div class="service-content">
                    <h4 class="save_page_hover" data-logo="hi1" <?echo $contenteditable;?>><?print_text('hi1');?></h4>
                    <div  class=" save_page_hover" data-logo="sd1" <?echo $contenteditable;?>><?print_text('sd1');?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service  wow bounce">
                <div class="service-icon">
                    <i class="flaticon-011-implants"></i>
                </div>
                <div class="service-content">
                    <h4 class="save_page_hover" data-logo="hi2" <?echo $contenteditable;?>><?print_text('hi2');?></h4>
                    <div  class=" save_page_hover" data-logo="sd2" <?echo $contenteditable;?>><?print_text('sd2');?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service  wow bounceInUp center">
                <div class="service-icon">
                    <i class="flaticon-024-toothbrush"></i>
                </div>
                <div class="service-content">
                    <h4 class="save_page_hover" data-logo="hi3" <?echo $contenteditable;?>><?print_text('hi3');?></h4>
                    <div  class=" save_page_hover" data-logo="sd3" <?echo $contenteditable;?>><?print_text('sd3');?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service wow bounceInRight">
                <div class="service-icon">
                    <i class="flaticon-019-dentist"></i>
                </div>
                <div class="service-content">
                    <h4 class="save_page_hover" data-logo="hi4" <?echo $contenteditable;?>><?print_text('hi4');?></h4>
                    <div  class=" save_page_hover" data-logo="sd4" <?echo $contenteditable;?>><?print_text('sd4');?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service  wow rollIn center">
                <div class="service-icon">
                    <i class="flaticon-001-tooth-4"></i>
                </div>
                <div class="service-content">
                    <h4 class="save_page_hover" data-logo="hi5" <?echo $contenteditable;?>><?print_text('hi5');?></h4>
                    <div  class=" save_page_hover" data-logo="sd5" <?echo $contenteditable;?>><?print_text('sd5');?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service wow flip">
                <div class="service-icon">
                    <i class="flaticon-029-braces"></i>
                </div>
                <div class="service-content">
                    <h4 class="save_page_hover" data-logo="hi6" <?echo $contenteditable;?>><?print_text('hi6');?></h4>
                    <div  class=" save_page_hover" data-logo="sd6" <?echo $contenteditable;?>><?print_text('sd6');?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services section end -->


<!-- Gallery section -->
<div class="gallery-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6 p-0 wow bounceInRight center">
                <img <?img_down(5);?> alt="">
            </div>
            <div class="col-lg-3 col-sm-6 p-0 wow rollIn">
                <img <?img_down(6);?> alt="">
            </div>
            <div class="col-lg-3 col-sm-6 p-0 wow bounceInDown center">
                <img <?img_down(7);?> alt="">
            </div>
            <div class="col-lg-3 col-sm-6 p-0 wow bounceInRight">
                <img <?img_down(8);?> alt="">
            </div>
        </div>
    </div>
</div>
<!-- Gallery section end -->


<!-- Testimonials section -->
<section class="testimonials-section spad">
    <div class="container">
        <div class="section-title text-center wow bounceInDown center">
            <h2 class="save_page_hover" data-logo="otziv" <?echo $contenteditable;?>><?print_text('otziv');?></h2>
        </div>
    </div>
    <div class="testimonials-warp hover_slider">
        <?    slider_tab(array('table'=>'slider2'));
        ?>
        <div class="testimonials-slider owl-carousel">
            <?
            $all_table=data_base::run("SELECT * FROM slider2")->fetchAll();
            foreach ($all_table as $row){
                echo '
                <div class="testimonial-item">
                    <div class="ts-content">
                        <div class="quta">“</div>
                        <p>'.$row['text1'].'</p>
                        <h6>'.$row['text2'].'</h6>
                        <span>Пациент</span>
                    </div>
                    <div class="author-pic set-bg" data-setbg="'.$row['img'].'"></div>
                </div>
                ';
            }
            ?>
<!--
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Когда я вспоминаю своё детство я вспоминаю жуткий страх перед приемом у стомотолога. И как же я удивлена своей дочери, которая ходит к стоматологу с улыбкой. Спасибо докторам за особое чуткий подход к детям</p>
                    <h6>Виктория Мыльных</h6>
                    <span>Пациент</span>
                </div>
                <div class="author-pic set-bg" data-setbg="img/review/1.jpg"></div>
            </div>

            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>2 часа прочищали мне каналы, откололся зуб, думала что придется вырывать, но нет, спасли. Дороговато конечно, но эффективно!</p>
                    <h6>Татьяна Носова</h6>
                    <span>Пациент</span>
                </div>
                <div class="author-pic set-bg" data-setbg="img/review/3.jpg"></div>
            </div>
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Начал резаться зуб мудрости. Воспользовался услугами этой замечательной клиники. Все сделали быстро и без лишней боли. Большое спасибо! </p>
                    <h6>Евгений смолин</h6>
                    <span>Пациент</span>
                </div>
                <div class="author-pic set-bg" data-setbg="img/review/2.jpg"></div>
            </div>
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Ночью заболел зуб, утром отправилась к стоматологу. Люблю частные клиники за отсутствие очередей!</p>
                    <h6>Виктория Манаева</h6>
                    <span>Пациент</span>
                </div>
                <div class="author-pic set-bg" data-setbg="img/review/4.jpeg"></div>
            </div>-->
        </div>
    </div>
</section>
<!-- Testimonials section end -->

