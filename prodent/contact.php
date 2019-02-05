
<!-- Page info section -->
<section class="page-info-section set-bg" data-setbg="img/page-info-bg/3.jpg">
    <div class="container wow rollIn center">
        <h2 class="wow rollIn save_page_hover"data-logo="contact_page" <?echo $contenteditable;?>><?print_text('contact_page');?></h2>
    </div>
</section>
<!-- Page info section end -->


<!-- Contact section -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-text">
                    <h3 class="save_page_hover"data-logo="sviz" <?echo $contenteditable;?>><?print_text('sviz');?></h3>
                    <div class="contact-info">
                        <div class="ci-image " >
                            <img <?img_down(11);?> alt="" style="width: 100%;height: auto; border-radius: 900px">
                        </div>
                        <div class="ci-content">
                            <div class=" save_page_hover" data-logo="ee1" <?echo $contenteditable;?>><?print_text('ee1');?></div>
                            <div class=" save_page_hover" data-logo="ee2" <?echo $contenteditable;?>><?print_text('ee2');?></div>
                            <div class=" save_page_hover" data-logo="ee3" <?echo $contenteditable;?>><?print_text('ee3');?></div>
                        </div>
                    </div>
                </div>
                <form class="contact-form">
                    Оставьте контактные данные и мы обязательно свяжемся с вами!
                    <input type="text" name="first_name" placeholder="Имя">
                    <input type="text" name="last_name" placeholder="Фамилия">
                    <input type="text" name="phone" class="ss" placeholder="Телефон">
                    <input type="text" name="email" placeholder="E-mail">
                    <span class="info_data">
                    <div class="my_chekbox material-icons" data-chek="1">thumb_up</div>Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в Согласии на обработку персональных данных
                    </span><br/>
                        <!--<textarea placeholder="Сообщение"></textarea>-->
                    <button class="site-btn" name="saved">Отправить</button>
                    <div class="error_message"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad5af5629585b36e50774aa47e64b9a65b9de9b0e0852250ad1cdd2297fefb4fe&amp;width=100%25&amp;height=720&amp;lang=ru_RU&amp;scroll=false"></script></div>

</section>
<!-- Contact section end -->



