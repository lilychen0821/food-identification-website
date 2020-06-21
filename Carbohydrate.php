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
				<h3>碳水化合物</h3>
				<p>碳水化合物是由碳、氫和氧原子所組成的化合物的總稱，主要作用是為人體內千億個細胞提供能量。</p>
			</div>
			<div class="testimonial-grids">
		      </div>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蛋白質和脂肪也是熱量的來源，每一克的碳水化合物能提供四千卡(卡路里kilocalorie簡稱 卡kcal)的熱量，每一克的蛋白質也提供四千卡的熱量，而每一克的脂肪卻提供九千卡的熱量。<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;食物中的碳水化合物，不論是各種醣類或澱粉，都要先分解成葡萄糖，才可以被血液運送到細胞來提供能量。
					如果這些葡萄糖仍未能滿足能量的需求，肝臟及肌肉的儲備肝醣就會被動用來提供能量。<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;反之，過剩的糖分會以肝醣的形式被儲存起來，不過當肝及肌肉內都儲滿了肝醣後，剩餘的糖分便會被轉化成脂肪，儲存在皮膚下的脂肪細胞之中。
					因此，就算膳食是以碳水化合物為主（如高碳水化合物、低脂肪膳食），若吸取了過多熱量的話，體內脂肪的含量仍有機會提高。</p><br>
					

				<h4>碳水化合物可分為三大類：</h4>

				<p><font size=+1>1.&nbsp;&nbsp;糖份(sugar)：<br>&nbsp;&nbsp;&nbsp;&nbsp;分為單醣（monosaccharides）、雙醣（disaccharides）和多醣（polysaccharides）。</font></p>

				<blockquote>
					<li><font size=-0.5>單醣：為醣類最簡單的結構，如葡萄糖（glucose，C6H12O6，亦稱作 dextrose 或血糖）、果糖（fructose）和半乳糖（galactose）。
					人體能輕易地把果糖和半乳糖轉化成葡萄糖以提供能量，葡萄糖可以被人體細胞直接利用，亦可以肝醣（glycogen）的形式儲存於肌肉和肝之內，又或者被轉化成脂肪來儲存能量。
					很多食物都含天然糖份，包括水果、蜜糖、果汁、奶和蔬菜等。
					有些糖份是在生產時加進去的，例如糖果、巧克力、餅乾、汽水等，也有些是在烹調食物時加進去的。糖是碳水化合物之一，但並不是所有碳水化合物都是糖！</font></li>
				</blockquote>
				
				<blockquote>
					<li><font size=-0.5>雙醣：由兩個單醣組成，當中有蔗糖（sucrose）、麥芽糖（maltose）和乳糖（lactose）。
					多醣類則是由三個或以上的單醣類組合而成，其中最普遍的有澱粉（starch）、纖維素（cellulose）和肝醣（glycogen）。</font></li>
				</blockquote>

				<blockquote>
					<li><font size=-0.5>肝醣：亦稱為動物性澱粉，也是一個很大的分子結構。肝醣在食物中的蘊藏量並不高，反而當過剩的葡萄糖進入肝或肌肉時，則會被轉化成肝醣（glycogenesis）而儲存起來。
					人體的肝和肌肉內約有 375 至 475 克的肝醣儲備（Katch 與 McArdle，1988），當需要葡萄糖來提供能量的時候，這些肝醣儲備便會再度被轉化成葡萄糖（glycogenolysis），
					隨著血液被帶到正在工作的肌肉之中，以供應所需的能量。</font></li>
				</blockquote>
				<br>
				<!--//////////////////////////////////////////////////////////////////////-->
                <div class="clearfix"> </div>
				<p><font size=+1>2.&nbsp;&nbsp;澱粉質（starch）：</font></p>
				<div class="blog-agileinfo">
						<div class="col-md-6 blog-w3grid-img">
							<a href="#" data-toggle="modal" class="wthree-blogimg">  
								<img src="images/Sweet_potato.gif" class="img-responsive" alt=""/>
							</a>  
						</div>
						<div class="col-md-6 blog-w3grid-text"> 
							<blockquote><li><font size=-0.5>澱粉質是由多個糖的分子組成的多醣，多種植物性的食物是由澱粉質構成，澱粉類食物能為身體慢慢和穩定地提供熱量。
									<br>代表食材：地瓜、玉米、豆類、馬鈴薯、芋頭、稻米、小麥。</font></li></blockquote><br>
						</div> 
						<div class="clearfix"> </div>
					</div><br><br>
                <!--//////////////////////////////////////////////////////////////////////-->
				<p><font size=+1>3.&nbsp;&nbsp;纖維（fibre）：<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在植物細胞璧、細胞間質的一些無法被人體消化及吸收利用的多醣類 （如纖維素、半纖維素、果膠質、樹膠質）
					及木質素。主要纖維來源為蔬菜、水果、榖類和豆類。
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;根據流行病學、動物實驗以及臨床實驗等，都得到一致的結論：攝取多量的高纖食物，
					如蔬菜、水果、全穀類等，不但可以預防大腸直腸癌，並可減少乳癌、食道癌、胃癌、攝護腺癌、子宮內膜癌以及卵巢癌的發生。
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;通常膳食纖維含量高的食物，其所含的脂肪及熱量均較低。每人每天的膳食纖維建議攝取量為20-30公克，過多過少都不適宜，如果過量，可能會影響體內礦物質如鈣、鐵、鋅的吸收。
					此外，膳食纖維最好由天然食物中攝取，因為人工添加的膳食纖維或膳食纖維錠並不具備膳食纖維的所有功能。
					其實，每天三碟蔬菜、兩份水果，以全穀類或雜糧飯代替白米飯，就可以輕易達到一天所需的膳食纖維。
				</font></p>

				<blockquote>
					<li><font size=-0.5>水溶性膳食纖：可溶於水中的膳食纖維，以昆布、海帶芽等為代表。含有豐富低分子海藻酸鈉的海藻類，以及蘋果等富含果膠的果實，也含有很多水溶性膳食纖維。
						<br>代表食材：紅蘿蔔、白蘿蔔、牛蒡、芋頭、地瓜、金桔。</font></li>
				</blockquote>

				<blockquote>
				    <li><font size=-0.5>不溶性膳食纖維：不會溶於水中的膳食纖維，以纖維質豐富的萵苣及高麗菜為代表；
				    <br>代表食材：杏鮑菇、金針菇、黑麥、麵包、玄米、苦瓜、南瓜、秋葵等。</font></li>
				</blockquote>
				
				<blockquote>
						<li><font size=-0.5>水溶＋不溶性膳食纖維：嫩豆腐、馬鈴薯、葡萄柚、酪梨。</font></li>
				</blockquote>
				
				<div class="clearfix"> </div>
				<h4>常見的幾類纖維食物：</h4>
				<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/konbu.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<blockquote><li><font size=-0.5>水溶性膳食纖：可溶於水中的膳食纖維，以昆布、海帶芽等為代表。含有豐富低分子海藻酸鈉的海藻類，以及蘋果等富含果膠的果實，也含有很多水溶性膳食纖維。
							<br><br>作用：<br>
							<li>吸收水分，刺激腸道蠕動，避免便秘的發生。</li>
							<li>降低血膽固醇、延緩飯後血糖上升之速度。</li>
							<li>與降低癌症罹患率有關。</li>
							<br>代表食材：燕麥、糙米、昆布、蘋果、柳丁、柑橘、花椰菜、胡蘿蔔、豆類、蒟蒻、果凍等。</font></li></blockquote>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<!--//////////////////////////////////////////////////////////////////////////////////--> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/brown_rice.jpeg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<blockquote><li><font size=-0.5>不溶性膳食纖維：不會溶於水中的膳食纖維，
							能刺激腸壁蠕動，縮短糞便留腸道的時間，預防便秘以及減少食物中致癌物與結腸接觸的機會；
							腸道中的有益菌能夠利用膳食纖維產生丁酸，
							丁酸能抑制腫瘤細胞的生長增殖，誘導腫瘤細胞向正常細胞轉化，並控制致癌基因的表達。<br>
							作用：<br>
							<li>增加飽足感。</li>
							<li>預防便秘及腸憩室炎。</li>
							<li>與降低癌症罹患率有關。</li>
						<br>代表食材：糙米、全麥製品、米麩、燕麥、裸麥、大麥、堅果類、豆類、花椰菜、
						白花菜、根莖類、香蕉、蘋果、柳丁、梨等。</font></li></blockquote>
					</div> 
					<div class="clearfix"> </div>
				</div>
                <!--//////////////////////////////////////////////////////////////////////////////////--> 
				<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a href="#" data-toggle="modal" class="wthree-blogimg">  
							<img src="images/tofu.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<blockquote><li><font size=-0.5>水溶＋不溶性膳食纖維：嫩豆腐、馬鈴薯、葡萄柚、酪梨。</font></li></blockquote>
					</div> 
					<div class="clearfix"> </div>
				</div> 
		</div>
	</div>

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