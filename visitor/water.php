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
				<h3>水</h3>
				    <p>水在人體內扮演很多重要功能，是讓一切生命過程正常運行的生理要素，任何生物化學過程均在水中進行。</p>
			</div>
			<div class="testimonial-grids">
		      </div>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;水和醣類、蛋白質、脂肪、維生素和礦物質一起並列為人體所需六大營養素，它也是人體含量最多的營養素。<br>
						營養物質和異化作用的產物主要以水溶狀態輸送，同時，水中含有鈉、鈣、鎂、鉀等無機鹽類，是大多數動植物不可缺少的營養物質來源。
						水有許多獨一無二的化學和物理特性，例如：因具有極性，所以很多化合物均可溶於水；比熱很高，要改變水的狀態需要相當大的熱能，所以水可以調節體溫。<p><br>
				<h4>水對於人體的一些重要功能：</h4>
				<li>調節體溫：散熱、防中暑。</li><br>
				<li>幫助廢物排除：由於大部分的人體代謝廢物都是水溶性物質，而即便是脂溶性廢物，也會在肝臟幫助下，轉變成水溶性再藉由尿液排出體外，所以水分可說是人體排除廢物的重要運送媒介。</li><br>
				<li>潤滑及避震：水不能被身體所壓縮，所以可作為關節和膝蓋的潤滑液；另外還可作為脊髓和胎兒（羊水）的避震器。</li>
                <!--//////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Amniotic_fluid.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>潤滑及避震：水不能被身體所壓縮，所以可作為關節和膝蓋的潤滑液；另外還可作為脊髓和胎兒（羊水）的避震器。</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div>
                    <!--//////////////////////////////////////////////////////////////////////-->
					<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/water.png" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維持細胞機能：體水三分之二的是分布在細胞裡，水的存在可產生液體壓力，讓細胞能膨脹並成形。另外，水也是很好的溶劑，基本上，細胞生存與執行生理功能所需的氧氣、
								能量（葡萄糖）及各種營養與材料（如胺基酸、脂肪、各種離子等）都可在細胞內的含水環境中獲得，而細胞代謝廢物的排除也是靠水的幫忙。</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div>
				<br><br>
				<!--//////////////////////////////////////////////////////////////////////-->
				<li>維持血液容積：血漿（動脈、靜脈、微血管、淋巴）約佔體重5%，水的存在確保身體可維持適當的血液容積。</li><br>
				<li>維持滲透壓、電解質濃度：由於水可以自由進出細胞膜，透過離子和水，讓身體得以控制細胞內外與身體各個區間的水量，和電解質的濃度</li></br></br>
				<!--//////////////////////////////////////////////////////////////////////////-->			
		</div>
	</div>
	<!-- //testimonial -->
	<!-- team -->	<!-- //team -->
	<!-- blog -->	<!-- //blog --> 
	<!-- rate -->	<!-- //rate -->
	<!-- contact -->	<!-- //contact -->
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