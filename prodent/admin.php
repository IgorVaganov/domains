


<!-- Page info section -->
<section class="page-info-section set-bg" data-setbg="img/page-info-bg/3.jpg">
    <div class="container wow rollIn center">
        <h2>Страница Авторизации</h2>
    </div>
</section>
<!-- Page info section end -->

<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="contact-form">

                    <?
                    if(isset($_SESSION['superadmin'])){
                        echo '
                              <img class="piple" src="image/piple.png"><div class="site-btn into" data-ac="exit">Выйти</div>
                               <br/> замена пароля
                                <input class="exist_password" type="password" placeholder="Введите Ваш текущий пароль" onkeypress="return filter_input(event,/[A-ZА-Я0-9\/\\\*\?]/i)">
                                <input class="new_password1" type="password" placeholder="Введите Ваш новый пароль" onkeypress="return filter_input(event,/[A-ZА-Я0-9\/\\\*\?]/i)">
                                <input class="new_password2" type="password" placeholder="Подтвердите Ваш новый пароль" onkeypress="return filter_input(event,/[A-ZА-Я0-9\/\\\*\?]/i)">
                                <div class="site-btn into"  data-ac="rename">Заменить на новый пароль</div>
                              ';
                    }
                    else{
                        echo '
                        <input class="login" type="text" placeholder="Введите Ваш логин">
                        <br/>Строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 4 символa
                        <input class="password" type="password" placeholder="Введите Ваш пароль" onkeypress="return filter_input(event,/[A-ZА-Я0-9\/\\\*\?]/i)">
                        <div class="site-btn into" data-ac="into">Войти</div>
                        <br/>Забыли пароль?
                        <input class="mymail" type="text" placeholder="Введите Вашу электронную почту для восстановления пароля">
                        <button class="site-btn into" data-ac="pass_mail">Восстановить пароль</button>
                        ';
                    }
                    ?>




                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function filter_input(e,regexp)
    {
        e=e || window.event;
        var target=e.target || e.srcElement;
        var isIE=document.all;

        if (target.tagName.toUpperCase()=='INPUT')
        {
            var code=isIE ? e.keyCode : e.which;
            if (code<32 || e.ctrlKey || e.altKey) return true;

            var char=String.fromCharCode(code);
            if (!regexp.test(char)) return false;
        }
        return true;
    }

</script>
