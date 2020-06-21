<?php
session_start();
$user_name=$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Fat</title>
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
	<!-- about-bottom -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >建站模板</a></div>
	<!-- testimonial -->
	<div class="welcome">
		<div class="container">
			<div class="wthree-heading"></br>
				<h3>脂肪</h3>
				<p>脂肪，也稱脂質，對促進健康細胞功能的發揮起著重要的作用，脂肪幫助人們保持體溫、保持健康的皮膚和頭髮。</p>
			</div>
			<div class="testimonial-grids">
		      </div>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;脂肪作為能量儲存於身體，每克脂肪含9千卡熱量，是蛋白質和碳水化合物（4千卡/克）的兩倍，脂肪也是大腦發育和肝臟生產膽固醇所必需的。然而，當體內脂肪水準超過正常水準時，會產生一些健康問題，如肥胖、高血壓、心臟病等。<p>
				<h4>脂肪的供給量:</h4>
				<p>營養學會建議膳食脂肪供給量不宜超過總能量的30%，其中飽和、單不飽和、多不飽和脂肪酸的比例應為1:1:1。</p>
				<h4>脂肪的來源:</h4>
				<p>脂肪的來源可分下述二種：</p>
				<li>1.動物性來源：動物體內貯存的脂肪：如豬油、牛油、羊油、魚油、骨髓、肥肉、魚肝油等。動物乳中的脂肪：如奶油等。</li>
				<li>2.植物性來源：植物性脂肪來源主要是從植物中的果實內提取，如芝麻、葵花子、茶生、核桃、松籽、黃豆等。</li>
				<p>脂肪的主要來源是烹調用油脂和食物本身所含的油脂。表5是幾種食物中的脂肪含量。一般來說,果仁脂肪含量最高，各種肉類居中，米、面、蔬菜、水果中含量很少。</p>
				<h4>食物來源:</h4>
				<p>除食用油脂含約100%的脂肪外，含脂肪豐富的食品為動物性食物和堅果類。動物性食物以畜肉類含脂肪最豐富，且多為飽和脂肪酸；一般動物內臟除大腸外含脂肪量皆較低，但蛋白質的含量較高。禽肉一般含脂肪量較低，多數在10%以下。魚類脂肪含量基本在10%以下，多數在5%左右，且其脂肪含不飽和脂肪酸多。蛋類以蛋黃含脂肪最高，約為30%左右，但全蛋僅為10%左右，其組成以單不飽和脂肪酸為多。
				除動物性食物外，植物性食物中以堅果類含脂肪量最高，最高可達50%以上，不過其脂肪組成多以亞油酸為主，所以是多不飽和脂肪酸的重要來源。</p>
				<div class="clearfix"> </div>
				<h4>常見的幾類高脂肪食物：</h4>
				<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a data-toggle="modal" class="wthree-blogimg"> <!-- delete link href-->
							<img src="images/friedfood01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>1．油炸食品 ：此類食品熱量高，含有較高的油脂和氧化物質，經常進食易導致肥胖；是導致高脂血症和冠心病的最危險食品。在油炸過程中，往往產生大量的致癌物質。已經有研究表明，常吃油炸食物的人，其部分癌症的發病率遠遠高於不吃或極少進食油炸食物的人群。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/cannedfood01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>2．罐頭類食品： 不論是水果類罐頭，還是肉類罐頭，其中的營養素都遭到大量的破壞，特別是各類維生素幾乎被破壞殆盡。另外，罐頭製品中的蛋白質常常出現變性，使其消化吸收率大為降低，營養價值大幅度“縮水”。還有，很多水果類罐頭含有較高的糖分，並以液體為載體被攝入人體，使糖分的吸收率因之大為增高牞可在進食後短時間內導致血糖大幅攀升，胰腺負荷加重。</li>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/pickledfood01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>3．醃制食品： 在醃制過程中，需要大量放鹽，這會導致此類食物鈉鹽含量超標，造成常常進食醃制食品者腎臟的負擔加重，發生高血壓的風險增高。還有，食品在醃制過程中可產生大量的致癌物質亞硝胺，導致鼻咽癌等惡性腫瘤的發病風險增高。此外，由於高濃度的鹽分可嚴重損害胃腸道粘膜，故常進食醃制食品者，胃腸炎症和潰瘍的發病率較高。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/sausage01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>4．加工的肉類食品（火腿腸等）： 這類食物含有一定量的亞硝酸鹽，故可能有導致癌症的潛在風險。此外，由於添加防腐劑、增色劑和保色劑等，造成人體肝臟負擔加重。還有，火腿等製品大多為高鈉食品，大量進食可導致鹽分攝入過高，造成血壓波動及腎功能損害。</li>
					</div> 
					<div class="clearfix"> </div>
				</div>
			<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/gooseliver01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>5．肥肉和動物內臟類食物 ：雖然含有一定量的優質蛋白、維生素和礦物質，但肥肉和動物內臟類食物所含有的大量飽和脂肪和膽固醇，已經被確定為導致心臟病最重要的兩類膳食因素。現已明確，長期大量進食動物內臟類食物可大幅度地增高患心血管疾病和惡性腫瘤（如結腸癌、乳腺癌）的發生風險。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/creamdessert01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>6．奶油製品 ：常吃奶油類製品可導致體重增加，甚至出現血糖和血脂升高。飯前食用奶油蛋糕等，還會降低食欲。高脂肪和高糖成分常常影響胃腸排空，甚至導致胃食管反流。很多人在空腹進食奶油製品後出現反酸、燒心等症狀。</li>
					</div> 
					<div class="clearfix"> </div>
				</div>
			<div class="blog-agileinfo">
					<div class="col-md-6 blog-w3grid-img">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/instantnoodles01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					<div class="col-md-6 blog-w3grid-text"> 
						<li>7．速食麵： 屬於高鹽、高脂、低維生素、低礦物質一類食物。一方面，因鹽分含量高增加了腎負荷，會升高血壓；另一方面，含有一定的人造脂肪（反式脂肪酸），對心血管有相當大的負面影響。加之含有防腐劑和香精，可能對肝臟等有潛在的不利影響。</li>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="blog-agileinfo blog-agileinfo-mdl">
					<div class="col-md-6 blog-w3grid-img blog-img-rght">
						<a data-toggle="modal" class="wthree-blogimg">  
							<img src="images/driedfruits01.jpg" class="img-responsive" alt=""/>
						</a>  
					</div>
					
					<div class="col-md-6 blog-w3grid-text"> 
						<li>8．果脯、話梅和蜜餞類食：含有亞硝酸鹽，在人體內可結合胺形成潛在的致癌物質亞硝酸胺；含有香精等添加劑可能損害肝臟等臟器；含有較高鹽分可能導致血壓升高和腎臟負擔加重。</li>
					</div> 
					
					<div class="clearfix"> </div></br></br>
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