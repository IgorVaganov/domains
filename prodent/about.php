
<?
//SELECT * FROM Table ORDER BY ID DESC LIMIT 1

$blog_post=data_base::run("SELECT * FROM myread ORDER BY ID DESC LIMIT 1")->fetchAll();

?>

<style>
	.spad1 {
		padding-top: 50px;
		padding-bottom: 0px;
	}
</style>
<!-- Page info section -->
<section class="page-info-section set-bg" data-setbg="img/page-info-bg/1.jpg">
	<div class="container wow bounceInRight center">
		<h2 class="wow rollIn save_page_hover"data-logo="about_page" <?echo $contenteditable;?>><?print_text('about_page');?></h2>
	</div>
</section>
<!-- Page info section end -->


<!-- Intro section -->
<section class="intro-section spad spad1">
	<div class="container">
		<div class="row">
			<?
			$i_cou=0;
			if($blog_post){
				foreach ($blog_post as &$value) {
					if($i_cou % 2){
						$animation='bounceInRight';
					}else{
						$animation='bounceInLeft';
					}
					$i_cou++;
					echo '
    <!-- Blog post -->
        <div class="blog-item wow '.$animation.'">
            <div class="row">
                <div class="col-lg-6 blog-thumb">';
					if($reg==1){
						echo'<img '.'" data-imgclass="down" data-id="'.$value['id'].'" data-table="myread" data-col="img" data-act="1" data-folder="file/'.$value['id'].'/img"'.' src="'.$value['img'].'" alt="">';
					}else{
						echo'<img src="'.$value['img'].'" alt="">';
					}
					echo '         
                </div>
                <div class="col-lg-6 blog-content">
                    <div class="date">'.$value['readdate'].'</div>
                    <h3>'.$value['header'].'</h3>
                    <p>'.mb_substr($value['text_from_html'],0, 350, 'UTF-8').'...</p>
                    <a href="/post/?id='.$value['id'].'" class="read-more">Читать далее...</a>
                </div>
            </div>
        </div>
    
    ';
					//$value = $value * 2;
				}
			}else{
				echo '<h2>По данному запросу ничего не найдено</h2>';
			}

			?>
		</div>
	</div>
</section>
<!-- Intro section end -->


<!-- Featured section -->
<section class="featured-section">
	<div class="featured-bg set-bg wow bounceInUp center"  style="overflow: hidden">
		<img <?img_down(9);?> alt="" style="width: 100%;height: auto">
		<img <?img_down(10);?> alt="" style="width: 100%;height: auto">
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 p-0">
				<div class="featured-box spad">
					<div class="feature-item">
						<i class="flaticon-008-protection wow rollIn center"></i>
						<div class="fi-content wow shake">
							<h4 class="save_page_hover" data-logo="qq1" <?echo $contenteditable;?>><?print_text('qq1');?></h4>
							<div class=" save_page_hover" data-logo="ww1" <?echo $contenteditable;?>><?print_text('ww1');?></div>
						</div>
					</div>
					<div class="feature-item">
						<i class="flaticon-018-dentist-1 wow swing center"></i>
						<div class="fi-content wow shake">
							<h4 class="save_page_hover" data-logo="qq2" <?echo $contenteditable;?>><?print_text('qq2');?></h4>
							<div class=" save_page_hover" data-logo="ww2" <?echo $contenteditable;?>><?print_text('ww2');?></div>
						</div>
					</div>
					<div class="feature-item">
						<i class="flaticon-007-computer-1 wow swing center"></i>
						<div class="fi-content wow rollIn">
							<h4 class="save_page_hover" data-logo="qq3" <?echo $contenteditable;?>><?print_text('qq3');?></h4>
							<div class=" save_page_hover" data-logo="ww3" <?echo $contenteditable;?>><?print_text('ww3');?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Featured section end -->



<!-- Doctors section -->
<section class="doctors-section spad">
	<div class="container">
		<div class="section-title text-center wow lightSpeedIn">
			<h2 class="save_page_hover" data-logo="doctor" <?echo $contenteditable;?>><?print_text('doctor');?></h2>
		</div>
		<div class="row hover_slider">
			<?    slider_tab(array('table'=>'slider4'));
			?>
			<div class="col-lg-4 wow rollIn center">
				<div class="doctor-item di-bg">
					<div class="di-pic">
						<img <?img_down(11);?> alt="" style="width: 100%;height: auto; border-radius: 900px">
					</div>
					<h4 class="save_page_hover" data-logo="ee1" <?echo $contenteditable;?>><?print_text('ee1');?></h4>
					<div  class="save_page_hover" data-logo="2" <?echo $contenteditable;?>><?print_text('2');?></div>
				</div>
			</div>



				<?
				$all_table=data_base::run("SELECT * FROM slider4")->fetchAll();
				$my_animate=array("pulse", "lightSpeedIn center", "bounce", "bounceInUp center");//rand(5, 15)
				foreach ($all_table as $row){
					echo '
					<div class="col-lg-2 col-md-3  col-sm-6 wow '.$my_animate[rand(1, 4)].'">
						<div class="doctor-item">
							<div class="di-pic set-bg" data-setbg="'.$row['img'].'"></div>
							<h6>'.$row['text1'].'</h6>
							<p>'.$row['text2'].'</p>
						</div>
					</div>
					';
				}
				?>
<!--
			<div class="col-lg-2 col-md-3  col-sm-6 wow pulse">
				<div class="doctor-item">
					<div class="di-pic set-bg" data-setbg="img/doctors/2.jpg"></div>
					<h6>Анна шевченко</h6>
					<p>Стоматолог</p>
				</div>
			</div>
			<div class="col-lg-2 col-md-3  col-sm-6 wow lightSpeedIn center">
				<div class="doctor-item">
					<div class="di-pic set-bg" data-setbg="img/doctors/3.jpg"></div>
					<h6>Яна балина</h6>
					<p>Помошница стоматолога</p>
				</div>
			</div>
			<div class="col-lg-2 col-md-3  col-sm-6 wow bounce">
				<div class="doctor-item">
					<div class="di-pic set-bg" data-setbg="img/doctors/4.jpg"></div>
					<h6>Виктор Сухоруков</h6>
					<p>Стоматолог</p>
				</div>
			</div>
			<div class="col-lg-2 col-md-3  col-sm-6 wow bounceInUp center">
				<div class="doctor-item">
					<div class="di-pic set-bg" data-setbg="img/doctors/5.jpg"></div>
					<h6>Алена Уткина</h6>
					<p>Помошница Стоматолога</p>
				</div>
			</div>
			-->
		</div>
	</div>
</section>
<!-- Doctors section end -->


