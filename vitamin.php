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
				<h3>維生素</h3>
				    <p>有機化合物所構成的營養素，是維持生命的重要養分，在人體內大多無法自行製造或合成，必須依靠食物來取得，它不像醣類、脂肪和蛋白質可以產生熱量或能量，但是在生長、代謝、發育過程中卻扮演著不可或缺的角色，使身體維持良好的生理機能。只需少量維生素就能發揮巨大的作用，且每種維生素皆有其獨立的功能。</p>
			</div>
			<div class="testimonial-grids">
		    </div>
				<h3>維生素 B 群：</h3>
					<p>B 群的主要功能是幫助身體的能量代謝，所以缺乏時容易有疲憊、想睡的狀況，甚至感到頭暈、食慾不振，
					當你發現自己總是無精打采，除了先從調整作息、均衡飲食做起，也可以適時補充 B 群，找回活力滿滿的元氣。<br>
					到底 B 群家族裡有哪水溶性維生素些成員，現在帶你來一探究竟！<p><br>
                <!--//////////////////////////////////////////////////////////////////////-->
				<div class="clearfix"> </div>
				<h4>1.&nbsp;&nbsp;水溶性：</h4>
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg"> 
								<img src="images/Vitamin-b1.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 B1：<br>
								負責醣類的能量代謝，缺乏會造成腳氣病。可以從全穀類中獲得，吃的澱粉類越多，需要的 B1 就會越多。<br>
		                        來源：全穀類、瘦肉、肝臟<br>
		                        缺乏：腳氣病、精神不濟<br>
                                過多：無</h4></font></li><br>
						</div> 
						<div class="clearfix"> </div>
					</div><br><br>
                    <!--//////////////////////////////////////////////////////////////////////-->
					<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b2.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 B2：<br>
									參與身體內許多化學反應，負責能量代謝，缺乏時容易造成口角炎，存在於奶類和全穀類食物中，微波和照光都會破壞 B2。<br>
									來源:奶類、全穀類食物<br>
									缺乏:口角炎、精神不濟<br>
									過多:無
							</font></li>
						</div> 
						<div class="clearfix"> </div>
					</div><br><br>
				<!--//////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b3.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 B3：<br>
								蛋白質、醣類和脂質的代謝都靠它，缺乏時容易導致癩皮病，它來自富含蛋白質的食物，但攝取過量可能造成肝毒性。<br>
								來源:來自富含帶白質的食物、蘑菇<br>
								缺乏:癩皮病、精神不濟<br>
							    過多:肝毒性</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->			
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b6.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 B6：<br>
								蛋白質代謝的重要角色，主要來源是蛋白質豐富的食物，缺乏時可能造成貧血、憂鬱、皮膚炎、小紅血球貧血。補充太多則會有麻木與肌肉無力的症狀。<br>
		   						來源:蛋白質豐富的食物、香蕉<br>
		 					    缺乏:憂鬱、皮膚炎、小紅血球貧血<br>
	     					    過多:麻木與肌肉無力</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b12.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 B12：<br>
								幫助合成 DNA 和細胞的正常分裂，並且保護神經細胞，缺乏時可能造成惡性貧血（紅血球無法正常分裂），是唯一只能從動物性食品中獲得的維生素。因此吃素者要注意 B12 的補充。<br>
		    					來源:動物性食品<br>
		    					缺乏:惡性貧血<br>
	        					過多:無</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b5.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>泛酸：<br>
								和脂肪的合成與代謝有關，廣泛地存在於食物中，較不容易有不足的狀況。<br>
		    					來源:廣泛地存在於食物<br>
		    					缺乏:很少缺乏<br>
	        					過多:無</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b9.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>葉酸（B9）：<br>
								與B12一同參與造血功能，並且參與細胞分化，不足時可能造成巨球型貧血，孕婦若缺乏則可能造成胎兒神經管發育的缺陷，懷孕前須注意葉酸的攝取；而食用過多的葉酸則會無法辨識 B12 不足的狀況。廣泛存在於各種植物食品中。<br>
		    					來源:廣泛的存在各種植物食品中<br>
		   						缺乏:巨球型貧血、嬰兒神經管發育的缺陷<br>
	        					過多:掩蓋b12不足症狀</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b7.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>生物素：<br>
								參與醣類、蛋白質、脂肪等營養素代謝，缺乏時可能會起紅疹及掉髮。主要來自腸道菌的合成，在各種食物中也都有生物素，但要注意若吃生蛋白會造成生物素吸收變差。<br>
		    					來源:腸道菌的合成，廣泛存在各種食物<br>
		    					缺乏:憂鬱、紅疹、掉髮<br>
	        					過多:無</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->

				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-b8.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>肌醇（B8）：<br>
								肌醇可以促進卵細胞的成熟，有時與葉酸一起治療不孕症，也能夠降低血膽固醇的濃度與強健頭髮。可以透過卵磷脂、瘦肉、肝臟等食物獲得。缺乏和過多的情況都不常見。<br>
		    					來源:能夠透過朊卵磷脂、瘦肉、肝臟<br>
		    					缺乏:不常見<br>
	        					過多:不常見</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-c.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 C：<br>
								是體內膠原蛋白合成以及抗氧化非常重要的營養素，缺乏時可能造成壞血症如牙齦容易出血等。主要來源是水果與蔬菜，而且容易被高溫破壞，因此加熱時間越短越好<br>
		    					來源:水果與蔬菜<br>
		    					缺乏:造成壞血症如牙齦容易出血<br>
	        					過多:若尿量過少來不及排出，可能造成結石</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-a.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 A：<br>
								維持視力、黏膜及皮膚的正常功能，也與生殖及免疫系統有關。缺乏時會導致夜盲症，但攝取太多可能產生皮膚的病變。來源是橘黃色的蔬果、起司及奶類，內臟類則以肝臟最多。<br>
		    					來源:橘黃色蔬果、起司及奶類、肝臟<br>
            					缺乏:夜盲症<br>
            					過多:皮膚病變</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->

				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-d.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 D：<br>
								是唯一人體能夠自行製造的維生素，透過曬太陽能幫助身體製造維生素 D，缺乏時可能會造成骨質疏鬆、軟骨症，攝取過多則會造成高血鈣，導致鈣質囤積血管或其他軟組織的硬化。<br>
		    					來源:曬太陽、牛奶<br>
            					缺乏:骨質疏鬆、軟骨症<br>
            					過多:高血鈣導致軟組織的硬化</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-e.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 E：<br>
								在身體中最重要的功能是抗氧化，若缺乏則可能造成紅血球易破損、神經受損。可以從油脂及堅果內獲得，若吃太多會使抗血栓的藥物失效。<br>
		    					來源:油脂、堅果<br>
            					缺乏:造成紅血球易破損、神經受損<br>
            					過多:使抗血栓的藥物失效</font></li>
						</div> 
						<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img blog-img-rght">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Vitamin-k.jpg" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<li><font size=-0.5>維生素 K：<br>
								與凝血功能有關，也會幫助鞏固骨質。缺乏時可能造成血液不凝固、傷口難癒合、骨質疏鬆。由腸胃道的好益菌生成，但肝臟、牛奶及深綠色的蔬菜也富含維生素 K。新生兒會在出生時補充一劑維生素 K，確保臍帶能順利止血乾燥並脫落。<br>
		    					來源:牛奶及深綠色的蔬果、肝臟<br>
            					缺乏:血液不易凝固、傷口難癒合、骨質疏鬆<br>
            					過多:少見</font></li>
						</div> 
						<div class="clearfix"> </div></br></br>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////-->

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