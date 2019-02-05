<?session_start();
require_once 'class/my_page.php';
require_once 'class/register.php';
require_once 'config.php';
require_once 'class/data_base.php';

//https://prodent_Б24.bitrix24.ru/rest/имя_метода.транспорт?параметры_метода&auth=ключ_авторизации

$data_text=data_base::run("SELECT logo, page FROM page")->fetchAll(PDO::FETCH_KEY_PAIR);//строго 2 колонки в запросе (выводит слова)
$data_img=data_base::run("SELECT id, img FROM image")->fetchAll(PDO::FETCH_KEY_PAIR);//строго 2 колонки в запросе (выводит слова)

//$sql = "CREATE TABLE IF NOT EXISTS myread (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, text TEXT(10000), readdate DATE, javascript TEXT(10000))";

$my_page=new my_page();
data_base::run("CREATE TABLE IF NOT EXISTS superadmin (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nameval TEXT(255), val TEXT(255), email TEXT(255))");

data_base::run("CREATE TABLE IF NOT EXISTS page (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, page TEXT(100000), logo TEXT(255))");

data_base::run("CREATE TABLE IF NOT EXISTS image (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT(100000))");

data_base::run("CREATE TABLE IF NOT EXISTS myread (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT(10000), text TEXT(100000), readdate DATE, javascript TEXT(10000), text_from_html TEXT(100000), header TEXT(10000), descr TEXT(10000))");

data_base::run("CREATE TABLE IF NOT EXISTS slider1 (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT(10000), text1 TEXT(100000), text2 TEXT(100000))");

data_base::run("CREATE TABLE IF NOT EXISTS slider2 (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT(10000), text1 TEXT(100000), text2 TEXT(100000))");

data_base::run("CREATE TABLE IF NOT EXISTS slider3 (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT(10000), text1 TEXT(100000), text2 TEXT(100000))");

data_base::run("CREATE TABLE IF NOT EXISTS slider4 (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, img TEXT(10000), text1 TEXT(100000), text2 TEXT(100000))");

//echo data_base::myonewords('hello world');

if(isset($_SESSION['superadmin'])){
    $reg=1;
	$contenteditable='contenteditable="true"';

}else{
	$reg=0;
	$contenteditable='';
}
function print_text($key, $col='logo', $table='page', $col2='page'){  //ключ который нужно вывести
	$save_text='<div tabindex="-1" contenteditable="false" data-logo="'.$key.'" class="save_page" data-tippy="сохранить запись" data-table="'.$table.'" data-col="'.$col.'" data-col2="'.$col2.'">V</div>';
	global $data_text, $reg;//что бы работать из функции
	if($reg==1){
         echo $save_text.$data_text[$key];//если зарегестрирован пользователь еще и кнопку
	}else{
		echo $data_text[$key];//просто текст
	}
}
function img_down($id, $table='image', $col='img', $act='1', $folder='page_img'){  //ключ который нужно вывести
	global $data_img, $reg;//что бы работать из функции
	if($reg==1){
		echo 'src="'.$data_img[$id].'" data-imgclass="down" data-id="'.$id.'" data-table="'.$table.'" data-col="'.$col.'" data-act="'.$act.'" data-folder="'.$folder.'"';//если зарегестрирован пользователь еще и кнопку
	}else{
		echo 'src="'.$data_img[$id].'"';//просто текст
	}
}
function slider_tab($slider=array()){
	global $reg;
	if($reg==1){
		if (!array_key_exists('table', $slider)) {
			$slider['table']='slider1';
		}
		echo '<div class="slider_edit_my" data-table="'.$slider['table'].'" data-tippy="редактировать слайдер">O</div>';
	}

}


$main='';
$about='';
$service='';
$blog='';
$contact='';
if($my_page->page($_GET['route'], 'main')){
	$main='class="active"';
	$page='main.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'about')){
	$about='class="active"';
	$page='about.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'service')){
	$service='class="active"';
	$page='service.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'blog')){
	$blog='class="active"';
	$page='blog.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'contact')){
	$contact='class="active"';
	$page='contact.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'hiadmin')){
	$page='admin.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'post')){
	$page='post.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'cookies')){
	$page='cookies.php'; //загрузка главной страницы с поиском
}else if($my_page->page($_GET['route'], 'inst')){
	$page='instruction/inst.php'; //загрузка главной страницы с поиском
}
else{
	$main='class="active"';
	$page='main.php'; //загрузка главной страницы с поиском instruction
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<base href="/" />
	<title>ProDent - Dentist Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="ProDent dentist template">
	<meta name="keywords" content="prodent, dentist, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>


	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>

<!-- bitrix24-->
<script>
    (function(w,d,u){
        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b9388189/crm/site_button/loader_4_q9f0j5.js');
</script>
<!--End  bitrix24-->



<!-- Page Preloder -->
<div id="preloder">
	<div class="loader"></div>
</div>
<!-- начало стандартных окон  -->
<div id="info_data" >
	<div class="text_info">Согласие на обработку персональных данных

		Настоящим в соответствии с Федеральным законом № 152-ФЗ «О персональных данных» от 27.07.2006 года свободно, своей волей и в своем интересе выражаю свое безусловное согласие на обработку моих персональных данных , зарегистрированным в соответствии с законодательством РФ по адресу:
		(далее по тексту - Оператор).
		Персональные данные - любая информация, относящаяся к определенному или определяемому на основании такой информации физическому лицу.
		Настоящее Согласие выдано мною на обработку следующих персональных данных:
		- Имя;
		- Фамилия;
		- Телефон;
		- E-mail.

		Согласие дано Оператору для совершения следующих действий с моими персональными данными с использованием средств автоматизации и/или без использования таких средств: сбор, систематизация, накопление, хранение, уточнение (обновление, изменение), использование, обезличивание, а также осуществление любых иных действий, предусмотренных действующим законодательством РФ как неавтоматизированными, так и автоматизированными способами.
		Данное согласие дается Оператору для обработки моих персональных данных в следующих целях:
		- предоставление мне услуг/работ;
		- направление в мой адрес уведомлений, касающихся предоставляемых услуг/работ;
		- подготовка и направление ответов на мои запросы;
		- направление в мой адрес информации, в том числе рекламной, о мероприятиях/товарах/услугах/работах Оператора.

		Настоящее согласие действует до момента его отзыва путем направления соответствующего уведомления на электронный адрес vag.i@inbox.ru. В случае отзыва мною согласия на обработку персональных данных Оператор вправе продолжить обработку персональных данных без моего согласия при наличии оснований, указанных в пунктах 2 – 11 части 1 статьи 6, части 2 статьи 10 и части 2 статьи 11 Федерального закона №152-ФЗ «О персональных данных» от 27.06.2006 г.
	</div>
	<p><span class="info_yes info_click">да</span><span class="info_none info_click">нет</span> </p>
</div>


<div class="i_cookie"><span class="close_cooc">X</span>
				Этот сайт использует файлы cookies для более комфортной работы пользователя. Продолжая просмотр страниц сайта, вы соглашаетесь с использованием &nbsp;файлов cookies. Если вам нужна дополнительная информация или вы не хотите соглашаться с использованием cookies, пожалуйста, посетите страницу&nbsp;"<a href="/cookies" class="i_page_cooc">cookies</a>".
</div>

<!-- окончание стандартных окон  -->

<!-- Header section -->
<header class="header-section">
	<div class="container">
		<!-- Site Logo -->
		<a href="/" class="site-logo">
			<img alt="" <?img_down(1);?>>
		</a>
		<!-- responsive -->
		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>
		<!-- Main Menu -->
		<?

		?>
		<ul class="main-menu wow rollIn">
			<li <?echo $main;?> ><a href="/">Домашняя</a></li>
			<li <?echo $about;?> ><a href="/about">О нас</a></li>
			<li <?echo $service;?> ><a href="/service">Услуги</a></li>
			<li <?echo $blog;?>    ><a href="/blog">Блог</a></li>
			<li  <?echo $contact;?>><a href="/contact">Контакты</a></li>
			<li><a href="/"><i class="flaticon-020-decay"></i></a></li>
		</ul>
	</div>
	<div class="header-info">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 hi-item  wow bounceInDown center">
					<div class="hs-icon">
						<img src="img/icons/map-marker.png" alt="">
					</div>
					<div class="hi-content">
						<h6 class="save_page_hover" data-logo="outside" <?echo $contenteditable;?>><?print_text('outside');?></h6>
						<div class="hi-content-p save_page_hover" data-logo="state" <?echo $contenteditable;?>><?print_text('state');?></div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 hi-item wow lightSpeedIn">
					<div class="hs-icon">
						<img src="img/icons/clock.png" alt="">
					</div>
					<div class="hi-content">
						<h6 class="save_page_hover" data-logo="open" <?echo $contenteditable;?>><?print_text('open');?></h6>
						<div  class="hi-content-p save_page_hover" data-logo="mon" <?echo $contenteditable;?>><?print_text('mon');?></div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 hi-item  wow rollIn center">
					<div class="hs-icon">
						<img src="img/icons/phone.png" alt="">
					</div>
					<div class="hi-content">
						<h6 class="save_page_hover" data-logo="phon" <?echo $contenteditable;?>><a class="phon_click" href="tel:<?echo $data_text['phon'];?>"><?print_text('phon');?></a></h6>
						<div  class="hi-content-p save_page_hover" data-logo="phonmy" <?echo $contenteditable;?>><?print_text('phonmy');?></div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 hi-item wow pulse">
					<div class="hs-icon">
						<img src="img/icons/calendar.png" alt="">
					</div>
					<div class="hi-content">
						<h6 class="save_page_hover" data-logo="state_on" <?echo $contenteditable;?>><?print_text('state_on');?></h6>
						<div  class="hi-content-p save_page_hover" data-logo="read_now" <?echo $contenteditable;?>><?print_text('read_now');?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Header section end -->

<!--page bagin-->
<span class="wrap_page">
<?
require_once $page; //загрузка главной страницы с поиском
?>
<!--page end-->
</span>

<!-- Newsletter section -->
<section class="newsletter-section spad">
	<div class="container">
		<div class="row ">
			<div class="col-lg-7 banner-text text-white wow pulse">
				<h4 class="save_page_hover" data-logo="blog" <?echo $contenteditable;?>><?print_text('blog');?></h4>
				<div  class="hi-content-p save_page_hover" data-logo="info" <?echo $contenteditable;?>><?print_text('info');?></div>
			</div>
			<div class="col-lg-5 text-lg-right wow bounceInRight">
				<form class="newsletter-form">
					<input class="text_ser_my" type="text" placeholder="Введите вопрос">
					<button class="site-btn sb-dark ser_my">Найти</button>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Newsletter section end -->



<!-- Footer top section -->
<section class="footer-top-section set-bg" data-setbg="img/footer-bg.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="footer-widget">
					<div class="wow rollIn" class="fw-about">
						<img <?img_down(2);?> alt="">
						<div  class="pynot save_page_hover" data-logo="dent" <?echo $contenteditable;?>><?print_text('dent');?></div>
						<div class="fw-social">
							<a  href=""><i class="fa fa-pinterest"></i></a>
							<a  href=""><i class="fa fa-facebook"></i></a>
							<a  href=""><i class="fa fa-twitter"></i></a>
							<a  href=""><i class="fa fa-dribbble"></i></a>
							<a  href=""><i class="fa fa-behance"></i></a>
							<a  href=""><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-5  ">
				<div class="footer-widget wow rollIn">
					<div class="fw-links ">
						<h5 class="fw-title save_page_hover" data-logo="service" <?echo $contenteditable;?>><?print_text('service');?></h5>
						<ul>
							<li class="hoho save_page_hover" data-logo="mydent" <?echo $contenteditable;?>><?print_text('mydent');?></li>
							<li class="hoho save_page_hover" data-logo="brek" <?echo $contenteditable;?>><?print_text('brek');?></li>
							<li class="hoho save_page_hover" data-logo="mudr" <?echo $contenteditable;?>><?print_text('mudr');?></li>
							<li class="hoho save_page_hover" data-logo="white" <?echo $contenteditable;?>><?print_text('white');?></li>
							<li class="hoho save_page_hover" data-logo="most" <?echo $contenteditable;?>><?print_text('most');?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-7">
				<div class="footer-widget  wow lightSpeedIn">
					<div class="fw-timetable">
						<div class="fw-title save_page_hover" data-logo="wi_open" <?echo $contenteditable;?>><?print_text('wi_open');?></div>
						<div class="timetable-content">
							<table>
								<tr>
									<td class="save_page_hover" data-logo="monday" <?echo $contenteditable;?>><?print_text('monday');?></td>
									<td class="save_page_hover" data-logo="m_time" <?echo $contenteditable;?>><?print_text('m_time');?></td>
								</tr>
								<tr>
									<td class="save_page_hover" data-logo="tuesday" <?echo $contenteditable;?>><?print_text('tuesday');?></td>
									<td class="save_page_hover" data-logo="t_time" <?echo $contenteditable;?>><?print_text('t_time');?></td>
								</tr>
								<tr>
									<td class="save_page_hover" data-logo="wednesday" <?echo $contenteditable;?>><?print_text('wednesday');?></td>
									<td class="save_page_hover" data-logo="w_time" <?echo $contenteditable;?>><?print_text('w_time');?></td>
								</tr>
								<tr>
									<td class="save_page_hover" data-logo="thursday" <?echo $contenteditable;?>><?print_text('thursday');?></td>
									<td class="save_page_hover" data-logo="th_time" <?echo $contenteditable;?>><?print_text('th_time');?></td>
								</tr>
								<tr>
									<td class="save_page_hover" data-logo="friday" <?echo $contenteditable;?>><?print_text('friday');?></td>
									<td class="save_page_hover" data-logo="fr_time" <?echo $contenteditable;?>><?print_text('fr_time');?></td>
								</tr>
								<tr>
									<td class="save_page_hover" data-logo="saturday" <?echo $contenteditable;?>><?print_text('saturday');?></td>
									<td class="save_page_hover" data-logo="s_time" <?echo $contenteditable;?>><?print_text('s_time');?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer top section end -->



<!-- Footer section -->
<footer class="footer-section">
	<div class="container">
		<ul class="footer-menu">
			<li><a href="/">Домашняя</a></li>
			<li><a href="/about">О нас</a></li>
			<li><a href="/service">Услуги</a></li>
			<li><a href="/blog">Блог</a></li>
			<li><a href="/contact">Контакты</a></li>
		</ul>
		<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Этот шаблон сделан с помощью <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
	</div>
</footer>
<!-- Footer top section end -->


<!--menu bagin -->
<?
if(isset($_SESSION['superadmin'])){
	require_once 'plugin/main_menu.php';
}

require_once 'plugin/css.php';

?>

<!--menu end-->

<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/circle-progress.min.js"></script>
<script src="js/jquery_ui.js"></script>
<?require_once 'js/main.php';?>
<?require_once 'plugin/js.php';?>
<script src="library/wow.js"></script>
<script src="library/tippy.js"></script>
<script>
	new WOW().init();
</script>
<?

?>


</body>
</html>