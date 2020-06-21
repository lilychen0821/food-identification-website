<?php
session_start();

//method1
if(!isset($_SESSION["account"])||($_SESSION["account"]==""))  
{
	header("Location: login/login.php");
}
else
{
	$user_name=$_SESSION['name'];
}
if(isset($_GET["logout"])&&($_GET["logout"]=="true"))
{
	unset($_SESSION["loginMember"]);
	unset($_SESSION["id"]);
	session_destroy();
	header("Location: visitor/indexV.php");
}

  /*  若尚未登入網站，將使用者導向首頁 login.php	*/

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
<script src="js/contactus/form.js"></script>
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
<?php
//session_start();
if((isset($_SESSION['account']))&&(isset($_SESSION['id'])))
{
	
?>
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
			<div class="clearfix"> </div>
		</div>
		<!--banner Slider starts Here-->
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
					</div>
				</div>
			</div>
		</div>
	</div>
	
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
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="wthree-heading"></br>
				<h2>Welcome</h2>
				<!-- <p><center>We are dedicating to the body health of everone.</center></p> -->
			</div>
			<style>
				.ellipsis
				{
					overflow:hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
					white-space: normal;
				}
			</style>
			<div class="w3-welcome-grids">
				<div class="col-md-3 w3-welcome-grid">
					<div class="w3-welcome-grid-info" style="cursor:pointer;" 
					onclick="location.href='https://www.hpa.gov.tw/Pages/Detail.aspx?nodeid=543&pid=9514';">
						<img src="images/asparagus-1.jpg" alt="" />
						<h4>我的餐盤 - 衛生福利部國民健康署</h4>
						<p class="ellipsis">「我的餐盤」以我國「每日飲食指南」為原則，將食物6大類之飲食建議份數進一步圖像化，讓民眾依比例攝取，並選擇在地、原態、多樣化的食物，就可以滿足營養的需求。</p>
					</div>
				</div>
				<div class="col-md-3 w3-welcome-grid">
					<div class="w3-welcome-grid-info" style="cursor:pointer;" 
					onclick="location.href='https://www.hpa.gov.tw/Pages/Detail.aspx?nodeid=542&pid=9730';">
						<img src="images/bg02.jpg" alt="" />
						<h4>個人一天所需熱量知多少？安全有效減重的第一步</h4>
						<p class="ellipsis">健康體重是維持身體健康的基礎，計算自己一天所需熱量，則是維持健康體重的第一步。</p>
					</div>
				</div>
				<div class="col-md-3 w3-welcome-grid">
					<div class="w3-welcome-grid-info" style="cursor:pointer;" 
					onclick="location.href='https://www.hpa.gov.tw/Pages/Detail.aspx?nodeid=1677&pid=9834';">
						<img src="images/cannedfood01.jpg" alt="" />
						<h4>您知道一般成人一天的身體活動量嗎？</h4>
						<p class="ellipsis">您有多久沒運動了？還記得最後一次運動是什麼時候嗎？其實成人每週只要達到150分鐘的中度身體活動或是75分鐘的費力身體活動，就可以讓我們的生理達到最基本的健康效果喔！</p>
					</div>
				</div>
				<div class="col-md-3 w3-welcome-grid">
					<div class="w3-welcome-grid-info" style="cursor:pointer;" 
					onclick="location.href='https://www.hpa.gov.tw/Pages/Detail.aspx?nodeid=543&pid=8365';">
						<img src="images/driedfruits01.jpg" alt="" />
						<h4>來培養正確的飲食習慣吧！</h4>
						<p class="ellipsis">依據衛生福利部公布「國民飲食指標」及「素食飲食指標」建議：日常飲食依據飲食指南建議的六大類食物份量攝取，所攝取的營養素種類才能齊全。</p>
					</div>
				</div>
				<div class="clearfix">&nbsp<br>&nbsp<br>&nbsp<br></div>
				
			</div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- about-bottom -->
	<div class="about-bottom jarallax" id="about">
		<!-- container -->
		<div class="container">
			<div class="wthree-heading about-heading">
			<h3>簡介</h3>
				<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp飲食與健康是一項人們需要重視的長期課題，不論哪類人群飲食健康都尤
					為重要。處於生長發育階段的青少年，忙碌的職場人員，免疫力比起從前大大
					降低的中老年人群，健身愛好者等對與營養攝入都有細緻的要求。擁有良好的
					習慣也能夠降低患腸胃疾病的風險。避免因為飲食原因導致的疾病耽誤工作生活。
					飲食與人的健康關係密切，但飲食健康常常又容易忽略。</br>
					現代人通常生活節奏快速，且工作忙碌，加上常常忽略飲食健康的管理，導致腸胃問題十分普遍。</p>
			</div>
			<div class="about-bottom-grids">
				<div class="col-md-6 about-bottom-left">
					<h4>心理因素</h4>
					<p>像是壓力過大，會對生理產生影響，進而影響腸胃蠕動及分泌的變化，或是內臟敏感性提高
						，以及腸道菌群的影響等等。</br></br></br></br>
						<img src="images/pyramid.jpg" style="width:85%;margin:0 auto;" alt="" />
					</p>
					
				</div>
				<div class="col-md-6 about-bottom-left about-bottom-right">
					<h4>習慣因素</h4>
					<p>例如作息不規律或是飲食習慣不正常，像是習慣吃的過飽或是常常處在過於飢餓的狀態
						，長期下來會加重腸胃的負擔。經常攝取高脂肪，高熱量，或是醃製食物等
						，很容易造成營養素攝取不均衡以及腸胃問題的產生。</br></br>
					</p>
					<img src="images/eatbalance.jpg" style="width:85%;margin:0 auto;" alt="" /><
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>
		<!-- //container -->
	</div><div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >建站模板</a></div>
	<!-- //about-bottom -->
	<!-- offer -->	<!-- //offer -->
	<!-- gallery --> <script type="text/javascript" src="js/simple-lightbox.js"></script>
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
	<!-- //gallery -->
	<!-- testimonial -->	<!-- //testimonial -->
	<!--- team -->
	<div class="team jarallax" id="team">
		<div class="team-dot">
			<div class="container">
				<div class="wthree-heading about-heading">
				<h3>Team Member</h3>
					<p ><center style="color:white;">本系統由以下成員進行共同開發。</center></p>
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
									<p>Nora Jiang</p>
									<div class="w3l-social">
										<ul>
											<li><a href="https://www.facebook.com/profile.php?id=100013411331889"><i class="fa fa-facebook"></i></a></li>
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
									<p>BoLong Wu</p>
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
											<li><a href="https://www.facebook.com/lily.chen.547727?ref=bookmarks"><i class="fa fa-facebook"></i></a></li>
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
									<p>Frank Chen</p>
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
		                      <p></p>
		                      <div class="w3l-social">
		                        <ul>
		                            <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
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

	<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="wthree-heading">
				<h3>Contact Us</h3>
				<p>Please email us your questions and fill in your details below ,&nbsp we will email you back as soon as we can.
			</br>We will use the information provided for customer service purposes.
					We respect your privacy and will not share it with third parties.</p>
			</div>
			<!-- <div class="address">
				<div class="col-sm-4 address-grids">
					<h4>Address :</h4>
					<p>Eiusmod Tempor inc<br>
						<span>St Dolore Place,</span>
						San Francisco 56777
					</p>	
				</div>
				<div class="col-sm-4 address-grids">
					<h4>Phone :</h4>
					<p>+2 123 456 789</p>
					<p>+2 987 654 321</p>
				</div>
				<div class="col-sm-4 address-grids">
					<h4>Email :</h4>
					<p><a href="mailto:example@email.com">mail@example.com</a></p>
				</div>
				<div class="clearfix"> </div>
			</div> -->

			<div class="contact-form">
			<form action="" method="post" id="reused_form">
				<h4>Contact Form</h4>
				
					<div class="fields-grid">
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="Fullname" id="Fullname" class="form-control" required="">
							<label>Full Name</label>
							<span></span>
						</div>
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="Phone" id="Phone" class="form-control" required=""> 
							<label>Phone</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="email" name="Email" id="Email" class="form-control" required=""> 
							<label>Email</label>
							<span></span>
						</div> 
						<div class="styled-input">
							<input type="text" name="Subject" id="Subject" class="form-control" required="">
							<label>Subject</label>
							<span></span>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="styled-input textarea-grid">
						<textarea name="Message" id="Message" class="form-control" maxlength="1000" cols="25" rows="6" required></textarea>
						<label>Message</label>
						<span></span>
					</div>
					<input type="submit" value="SEND">
				</form>
				<center>
				<div id="success_message" style="width:100%; height:100%; display:none; "> 
					<h3 style="color:green;">Posted your message successfully!</h3> </div>
                <div id="error_message" style="width:100%; height:100%; display:none; "> 
					<h3 style="color:red;">Error</h3> Sorry there was an error sending your form. </div>
				</center>
			</div>			
			<!---<div class="agileits-w3layouts-map">
				<h4>Location</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	< //contact -->
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
	
	<!-- scrolling icon starts -->
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
	<!-- scrolling icon ends -->
</body>	
</html>
<?php
}
else
{
	header("Location:visitor/indexV.php");
}
?>