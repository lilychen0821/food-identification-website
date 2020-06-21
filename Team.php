<?php
session_start();
$user_name=$_SESSION['name'];
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
				<div class="login-button col-sm-2 col-md-10 login-top-nav" id="login-div"> 
					<a href="main.php" aria-hidden="true"><?php echo "Hi, $user_name";?></a>
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
					<a href="index.php">Dietary Analysis</a>
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
									<li class="first-list"><a class="active" href="index.php">首頁</a></li>
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
									<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
 								<span data-letters="Pages">會員專區</span>
								<span class="caret"></span></a>
									<ul class="dropdown-menu"> 
									<?php $_SESSION['account'];?>
									<li><a href="main.php">帳號管理</a></li>
									<li><a href="analysis/analysisToday.php">今日分析</a></li>
									<li><a href="analysis/analysisWeek.php">本週分析</a></li>
									<li><a href="main.php?logout=true" onclick="alert('Are you sure?')">登出</a></li>
									</ul>
								</li>
							<li><a href="#team" class="scroll">小組成員</a></li>
							</ul>	
							<div class="clearfix"> </div>
						</div>	
					</nav>		
		</div>
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
	<!--team-->
	<div class="welcome">
		<div class="team-dot">
			<div class="container">
				<div class="wthree-heading team-heading"></br>
					<h3>Fantastic Team</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at nisi velit. Ut id velit ex. Donec quis sapien gravida, rutrum metus eu, viverra elit. Sed sodales commodo ex, id porttitor leo ullamcorper nec.</p>
				</div>
				<div class="agile-team-grids">
					<div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/team/team1.jpg" alt="" />
								</div>
								<div class="back" style="height:250px">
									<h4>姜元茜</h4>
									<p>name</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/team/team2.jpg" alt="" />
								</div>
								<div class="back" style="height:250px">
									<h4>吳柏龍</h4>
									<p>name</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/team/team3.jpg" alt="" />
								</div>
								<div class="back" style="height:250px">
									<h4>陳俐利</h4>
									<p>Lily Chen</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/team/team4.jpg" alt="" />
								</div>
								<div class="back" style="height:250px">
									<h4>陳銘欽</h4>
									<p>name</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-sm-3 team-grid">
		  				<div class="flip-container">
		   	               <div class="flipper">
		                      <div class="front"> <img src="images/team/team5.jpg" alt="" /> 
							  </div>
		                      <div class="back" style="height:250px">
		                      <h4>李宜庭</h4>
		                      <p>name</p>
		                      <div class="w3l-social">
		                        <ul>
		                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                            </ul>
	                        </div>
	                     </div>
	                  </div>
	               </div>
                </div>
			</div>
			</div>
		</div>
	</div>
	<!-- //team -->
	<!-- about-bottom -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >建站模板</a></div>
	<!-- gallery -->
	<script type="text/javascript" src="js/simple-lightbox.js"></script>
	<script>
				$(function(){
					var $gallery = $('.gallery a').simpleLightbox();
					
					$gallery.on('show.simplelightbox', function(){
						console.log('Requested for showing');
					})
					.on('shown.simplelightbox', function(){
						console.log('Shown');
					})
					.on('close.simplelightbox', function(){
						console.log('Requested for closing');
					})
					.on('closed.simplelightbox', function(){
						console.log('Closed');
					})
					.on('change.simplelightbox', function(){
						console.log('Requested for change');
					})
					.on('next.simplelightbox', function(){
						console.log('Requested for next');
					})
					.on('prev.simplelightbox', function(){
						console.log('Requested for prev');
					})
					.on('nextImageLoaded.simplelightbox', function(){
						console.log('Next image loaded');
					})
					.on('prevImageLoaded.simplelightbox', function(){
						console.log('Prev image loaded');
					})
					.on('changed.simplelightbox', function(){
						console.log('Image changed');
					})
					.on('nextDone.simplelightbox', function(){
						console.log('Image changed to next');
					})
					.on('prevDone.simplelightbox', function(){
						console.log('Image changed to prev');
					})
					.on('error.simplelightbox', function(e){
						console.log('No image found, go to the next/prev');
						console.log(e);
					});
				});
	</script>
	</div>
	<!-- //gallery -->
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
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
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
</body>	
</html>