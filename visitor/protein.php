<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- gallery -->
<link href='css/simplelightbox.min.css' rel='stylesheet' type='text/css'>
<!-- //gallery -->
<!-- font -->
<link href="http://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //font -->	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner jarallax">
		<div class="header">
			<div class="header-left">
				<!--div class="agileinfo-phone"-->
				<div class="login-button col-sm-2 col-md-10 login-top-nav" id="login-div">
				    <a href="..\\login\\login.php" aria-hidden="true">LogIn</a>
					</li>
				</div>

				<div class="search-grid">
					<form action="search.php" method="post">
						<input type="text" placeholder="Search" class="big-dog" name="search" required="">
						<button class="btn1" name="clicksearch"><i class="fa fa-search" aria-hidden="true"style="float:right"></i></button>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="w3-header-bottom">
		<div class="w3layouts-logo">
				<h1>
					<a href="indexV.php">Dietary Analysis</a>
				</h1>
			</div>
			<div class="top-nav">
						<nav class="navbar navbar-default">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li class="first-list"><a class="active" href="indexV.php">首頁</a></li>
									<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">營養素</span><span class="caret"></span></a>
									<ul class="dropdown-menu"> 
									<li><a href="Carbohydrate.php">碳水化合物</a></li>
									<li><a href="protein.php">蛋白質</a></li>
									<li><a href="fat.php">脂肪</a></li>
									<li><a href="water.php">水</a></li>
									<li><a href="vitamin.php">維生素</a></li>
									<li><a href="mineral.php">礦物質</a></li>
									</ul>
									</li> 
									
							<!----------dropdowm toggle------------------------------>
									<!-- <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">營養素</span><span class="caret"></span></a>
									<ul class="dropdown-menu">  -->
    								<!-- <li><a href="Carbohydrate.php">碳水化合物</a></li>
									<li><a href="protein.php">蛋白質</a></li>
									<li><a href="fat.php">脂肪</a></li>
									<li><a href="water.php">水</a></li>
									<li><a href="vitamin.php">維他命</a></li>
									<li><a href="mineral.php">礦物質</a></li>
									</ul>
									</li>  -->

							<li><a href="#team" class="scroll">小組成員</a></li>
							</ul>	
							<div class="clearfix"> </div>
						</div>	
					</nav>		
		</div>
		<!-- <div class="agileinfo-social-grids">
			<ul>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
		</div> -->
			<div class="clearfix"> </div>
		</div>
		<div class="banner-info">
			<div class="container">
				<div class="w3-banner-info">
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>
									<div class="w3layouts-banner-info">
										<h3>Dietary Analysis</h3>
										<div class="w3ls-button">
											<a href="#" data-toggle="modal" data-target="#myModal">分析食物</a>
										</div>
									</div>
								</li>
								<li>
									<div class="w3layouts-banner-info">
										<h3>We care your health</h3>
<!--										<p>Fusce varius id lectus at</p>-->
										<div class="w3ls-button">
											<a href="#" data-toggle="modal" data-target="#myModal">分析食物</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
									<script>
										// You can also use "$(window).load(function() {"
										$(function () {
										  // Slideshow 4
										  $("#slider4").responsiveSlides({
											auto: true,
											pager:true,
											nav:false,
											speed: 400,
											namespace: "callbacks",
											before: function () {
											  $('.events').append("<li>before event fired.</li>");
											},
											after: function () {
											  $('.events').append("<li>after event fired.</li>");
											}
										  });
									
										});
									 </script>
									<!--banner Slider starts Here-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	
	<!-- modal -->	
	<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
					<h4 class="modal-title">［ 分析您今天獲得的營養 ］</h4>
				</div> 
				<div class="modal-body">
					<div class="agileits-w3layouts-info">

							<form action="upload.php" method="post" enctype="multipart/form-data">
								<p>請上傳已攝入食物之照片：</p>
								<label class="btn btn-info">
									<input type="file" name="fileToUpload" id="iptImage1" style="display:none"/>
									<i class="fa fa-photo"></i> 上傳圖片
								</label>
								
								<div><img src="" id="image1" style="max-width: 10cm; min-width: 15cm; max-height: 15cm; min-height: 10cm; border: 2px dashed #999999; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 7px;"/></div></br></br>
								
								<label class="btn btn-info" style="position:static; margin-left:41%;margin-bottom: 10px;">
									<input type="submit" value="Upload Image" name="uploadimg" style="display:none;"/>
									<?php
									if(isset($_POST['uploadimg']))
									{
										if((isset($_SESSION['account']))&&(isset($_SESSION['id'])))
											{
												$id=$_SESSION["id"];
												$account=$_SESSION["account"];
												$_SESSION["id"]=$id;
												$_SESSION["account"]=$account;
												echo "<a href='fooddetect/BMIinfo.php?id=$id&account=$account'>Function</a>";
											}
									}
									?>
									<i class="fa fa-cloud-upload"></i> 開始分析
								</label>
							</form>

						
<script>
	function InputLoadImageToBindImageElement(inputEl, imgEl) {
 
    if (inputEl.files && inputEl.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(imgEl).attr('src', e.target.result);
        }
 
        reader.readAsDataURL(inputEl.files[0]);
    }
}
$("#iptImage1").change(function () 
	{
        InputLoadImageToBindImageElement(this, $('#image1'));
	});
</script>

	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- testimonial -->
	<div class="welcome">
		<div class="container">
			<div class="wthree-heading"></br>
				<h3>蛋白質</h3>
				    <p>大型生物分子，或高分子，它由一個或多個由α-胺基酸殘基組成的長鏈條組成。是細胞中的主要功能分子。</p>
			</div>
			<div class="testimonial-grids">
		      </div>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;現今的社會，營養不足的這個名詞，似乎對大家來說很不可能發生，除非家庭狀況或其他特別因素，營養不足幾乎是不會發生的狀況，反而是營養過剩的問題從年輕學童就開始產生、也造成身體上的慢性疾病居多，現今的銀髮族群，往往因為養身或觀念不對，造成在飲食上蛋白質不足的情況居多，很多人本身並不了解。人的身體，大約有60％是水分，其他20％是蛋白質。蛋白質在身體轉換就是小分子的胺基酸，這些胺基酸經過繁複的組成形成了身體的大部分器官，大都是蛋白質才形成的，可見，蛋白質對人體極為重要。<p>
				<h4>蛋白質的每日需求量:</h4>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;每天的卡路里應該有10-15%來自於蛋白質。對一般人而言，每天需求量約為0.8公克/每公斤體重，也就是說，如果你的體重是70公斤，你大約需要 0.8*70=56公克的蛋白質。從事運動的人需要比平常人更多的蛋白質，以應付運動的消耗和肌肉組織的生長和修護</p>
					

　　             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;雖然蛋白質是合成肌肉組織的原料，但是攝取超過 2公克/每公斤體重的蛋白質，對肌肉的生成並沒有幫助，多餘的蛋白質還是會經由新陳代謝，轉換成能量而被身體消耗掉，或是轉換成脂肪而儲存起來。而且高蛋白的食物通常也含有不少脂肪，例如各種肉類，若是吃太多，不僅會增加無謂的體重，也會提高罹患心血管疾病的機會。若是飲食均衡，即使蛋白質需求量大的運動員也可以從日常飲食中攝取充分的蛋白質，不需要服用高蛋白營養補充食品。</p>
				<p><h4>蛋白質的來源:</h4></p>
				<p>分下述二種：</p>
				<li>1.動物性來源：容易被人體吸收，如肉類、海鮮類、蛋類、奶類等。</li>
				<li>2.植物性來源：因缺乏數種必需胺基酸而不容易被人體吸收，如豆類(蛋白質含量最高，35.6%/100g)、核果類、五穀根莖蔬菜類等。</li>
				<p>動物性蛋白質與植物性蛋白質都要補充，互補優缺，提高整體營養價值，避免因攝取因過多動物性蛋白質造成肝、腎負擔，提高心血管疾病風險。</p>
				
				<div class="clearfix"> </div>
				<h4>常見的幾類蛋白質食物：</h4>
				<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/rice.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>1. 豆類及米飯：這兩種食物常同時出現在家常菜中是有原因的。豆類本身就是很好的蛋白質來源，尤其搭配上米飯一起食用的時候，更可以攝取到完整的蛋白質。但不一定需要同時吃，在幾個小時內攝取這兩樣食品，是以便宜健康的方式提升蛋白質的吸收量。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/egg.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>2. 蛋類：蛋類食品近幾年在擔心膽固醇過高的人中名聲雖然不佳，但是炒蛋、煎蛋捲及其它以蛋為主的食物，確實能提供高蛋白質的補充，且不會花費過高，只要沒有高膽固醇的顧慮，蛋類是很便宜就能攝取優良蛋白質的來源。有健康顧慮的人則可以只食用蛋白。</li>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/milk.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>3. 乳製品：很多人忽略乳製品是很好的蛋白質營養來源，一杯牛奶、一份優格、一份鬆軟的白乾酪，都是便宜的蛋白質來源。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/quinoa.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>4. 藜麥：藜麥是一種非常好的蛋白質食物，且擁有很高的營養價值。</li>
					</div> 
					<div class="clearfix"> </div>
				</div>
			<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/dofu.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>5. 豆腐：許多人會認為豆腐平淡無味，但如果懂得料理，無論是做飲品、炒菜或其它食物，豆腐均是很可口的配料。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/meat.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>6. 肉類：健康的料理方式，是使用少許的肉類，再搭配充分的以蔬菜。另外也可以把肉類和其它更便宜的蛋白質食品，例如豆子和豆腐混合在一起料理。</li>
					</div> 
					<div class="clearfix"> </div>
				</div>
			<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/grass.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>7.螺旋藻：蛋白質含量為60-70%，營養價值非常高，目前已被大量培育，也融合進食品藥劑、飼料等等多用途其他養分包含維生素、礦物質、和脂肪酸…等等醫療臨床報告證實螺旋藻對人體有許多優良的幫助，有益身體健康。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
			</div>
		</div>
	</div>
	<!-- //testimonial -->

	<!-- footer -->
	<footer>
			<div class="w3ls-footer-grids">
				<div class="container">
					<div class="col-md-4 w3l-footer one">
						<h3>About Us</h3>
						<p> 本系統是為了幫助使用者便捷的進行飲食健康管理，以及更清楚的了解飲食情況，並給出評估分析以供參考，希望大家都能培養健康的飲食習慣。</p>
						<p class="adam">- Dietary Analysis Group</p>
						<div class="clearfix"></div>
					</div>
					<!-- <div class="col-md-3 w3l-footer one tweet">
						<h3>Tweets</h3>
						<ul>
							<li>
								<a href="#"><i class="fa fa-twitter"></i>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.
								<i>http//example.com</i></a>
								<span>About 15 minutes ago<span>
							</span></span></li>
							<li>
								<a href="#"> <i class="fa fa-twitter"></i>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit. 
								<i>http//example.com</i></a>
								<span>About a day ago<span>
							</span></span></li>
						</ul>
					</div> -->
					<div class="col-md-4 w3l-footer two">
						<h3>Keep Connected</h3>
						<ul>
							<li><a class="fb" href="#"><i class="fa fa-facebook"></i>Like us on Facebook</a></li>
							<li><a class="fb1" href="#"><i class="fa fa-twitter"></i>Follow us on Twitter</a></li>
						</ul>
					</div>
					<div class="col-md-4 w3l-footer three">
						<h3>Contact Information</h3>
						<ul>
							<li><i class="fa fa-map-marker"></i><p>Food Identification Group <span>116 台北市文山區 ,</span>木柵路一段17巷1號 . </p><div class="clearfix"></div> </li>
							<li><i class="fa fa-phone"></i><p>(02) 2236-8225</p> <div class="clearfix"></div> </li>
							<li><i class="fa fa-envelope-o"></i><a href="mailto:info@example.com">service@gmail.com</a> <div class="clearfix"></div></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="copy-right-grids">
				<div class="container">
					<div class="copy-left">
						<p class="footer-gd">Copyright &copy; 2019.Food Identification Group All rights reserved. &nbsp - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">Web Models</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</footer>
	<!-- //footer -->
	<script src="js/responsiveslides.min.js"></script>
	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>

	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
</body>	
</html>
</html>