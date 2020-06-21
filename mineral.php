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
	<!-- testimonial -->
	<div class="welcome">
		<div class="container">
			<div class="wthree-heading"></br>
				<h3>礦物質</h3>
				    <p>沒有熱量屬於無機物的礦物質，有營養世界的「灰姑娘」之稱，雖然人們平時並不特別加強礦物質的補充，可是一旦缺乏礦物質時，維生素就不容易被吸收。</p>
			</div>
			<div class="testimonial-grids">
		      </div>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;礦物質與酵素的關係也很緊密，在人體中被酵素作用離子化的礦物質，可以協助酵素發揮活性，像是幫助消化作用的進行等，對活絡生理機能有小兵立大功之效。由於
		  		人體無法自行製造礦物質，必須仰賴食物或外在物質的攝取，使其與微量元素能參與人體酵素與賀爾蒙的合成，用以調節體內細胞的生化代謝。<br>
		  		一般來說，人體所需求的礦物元素可大致區分為「常量礦物元素」與「微量礦物元素」兩種。「常量礦物元素」是指人體每日需求量高於100毫克者，其中包括了鉀、                
				鈉、鈣、鎂、氯等數種；「微量礦物元素」則是指人體每日需求量低於100微克或者更低者。 </br>                                
				無論哪種礦物元素，都容易因為疏忽而缺乏攝取，也經常會因為過度攝取導致身體不平衡而產生健康問題，不妨現在就開始檢視你的礦物質清單，好維持身體的最佳機能狀況。</br>
				以下針對幾個較常見的巨量礦物元素進行介紹。</p></br>
				<h4>巨量礦物元素與最佳食物來源：</h4>
				<li>鉀 : 肉，牛奶，水果，蔬菜，穀物，豆類。</li>
				<li>氯 : 深層海鹽。</li>
				<li>鈣 : 優格，奶酪，牛奶，鮭魚，綠葉蔬菜。</li>
				<li>鎂 : 深層海水，菠菜，西蘭花，豆類，種子，全麥麵包。</li></br>
                <!--//////////////////////////////////////////////////////////////////////-->
				<h4>常見的幾類高脂肪食物：</h4>
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/asparagus-1.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>鉀：曾有一位知名女星自爆其保持纖瘦的秘訣，就是服用利尿劑消腫，用以保持上相的巴掌小臉。這樣的行為，極容易導致體內的鉀缺乏，嚴重可能造成骨肌麻痺及心臟病發作，提高高血壓罹患率；
								</br>根據哈佛大學公衛學院流行病學教授葉旭瑞的臨床報告指出，若於食物中供給足夠的鉀，可使罹患中風的機率降低38%，根據醫學報告指出，食品中若是鉀／鈉比高，是比較好的營養比例。
								</br>最佳鉀離子食物來源:：肉、牛奶、水果、蔬菜、穀物、豆類。</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div>
                    <!--//////////////////////////////////////////////////////////////////////-->
					<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/salt-2.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>鈉：大量出汗、洗腎、嘔吐、腹瀉都會導致失鈉、脫水，體內的鈉離子不足時，會出現食慾不振，疲乏無力，嚴重會出現肌肉抽搐、昏迷等現象。
								</br>但目前現代生活中，由於精緻食物加工影響，大多數人攝取的鈉含量高於日常標準，注意產品的營養包裝標示，可以避免攝取太多鹽份，降低高血壓罹患率，也能避免使腎受損而發生水腫現象。
								</br>最佳鈉離子來源：鹽、醬油、蔬菜。</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div>
				<!--//////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/salt1.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>氯：氯是細胞內主要的陰離子之一，在人體中只能以化合物及離子型態存在，功能是維持水分平衡。攝取氯與排泄和鈉有密不可分的關係分不開，需求量與鈉相當，每日約在1到3克之間。
							</br>失水病患補充過量生理食鹽水，可能導致血氯過高，會導致肌肉痙攣，發生高氯性酸中毒。反之，缺氯則會導致毛髮脫落的困擾。
							</br>最佳來源：鹽、醬油。</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div>
					<!--//////////////////////////////////////////////////////////////////////-->
					<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/yogurt-3.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>鈣：鈣是人體骨頭中軟質部分的主要構成元素，而軟質部分即為骨髓，是製造血液所需的紅血球之一部份物質。缺乏鈣質會導致兒童骨骼及牙齒發育遲緩，成年人則易出現骨質疏鬆、指甲脆弱等現象。想攝取足量的鈣質，必須仰賴身體的好吸收力，才能使鈣能進入血液供細胞使用。
							</br>不過，鈣也極易與其他物質形成不溶性化合物，如磷酸鈣、碳酸鈣等，無法通過小腸壁而被排出體外，攝取過多會導致心跳緩慢、肌肉無力，引起組織鈣化和結石。
							</br>最佳來源：優格、奶酪、牛奶、鮭魚、綠葉蔬菜。</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div>
				<!--//////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/a6.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>鎂：因為軟水的普及，水中礦物質含量少，根據美國哈佛大學醫學院調查，約有43%美國人體內嚴重缺鎂，與心血管疾病導致死亡的病例息息相關。
							</br>經動物實驗發現，如果有攝取足夠的鎂，即使食用令人聞之色變的飽和脂肪酸及膽固醇食品，也不會罹患動脈硬化等疾病；人體試驗後也證明，鎂能降低膽固醇含量。此外，鎂與鈣都是最好的天然鎮定劑，可用於治療精神抑鬱或過度興奮的病患。缺少鎂的同時，吸收鈣的能力會降低，細胞內要保持鉀的能力也會衰弱，因而出現心臟跳動不整、肌力衰弱、手腳發抖等生理現象。
							</br>最佳來源：深層海水、菠菜、西蘭花、豆類、種子、全麥麵包。</font></li>
						</div> 
						<div class="clearfix"> </div></br></br>
					</div>
					<!--//////////////////////////////////////////////////////////////////////-->
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