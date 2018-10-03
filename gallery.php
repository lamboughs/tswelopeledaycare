<?php
$album_id = "793161247478710";
$album_name = isset($_GET['album_name'])?$_GET['album_name']:"error an";

$access_token = "EAACae3UlP14BAC8WmPikU5wWzaFXfooO0NPh0ZCmk6rZCcZA7JxgaZC2512w1FpnEEmnWS5RZCZAiRZCN9fKZBVYMsvmhVfBXEkQke7c34cofxUS1qr3RyfGq6jPhLUcwcoGM9cXmKRAp3SzcNvsZAetDC99OX0ZB8lg4ASy2RL8sRZACnZBzGKHDTKVs4BaxVjHmVkZD";


$graphPhoLink = "https://graph.facebook.com/v3.0/793161247478710/photos?fields=images,name&access_token=$access_token";

?>

<!DOCTYPE html>
<html lang="en-za">
<head>
	<title>Facebook Photo API</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Jabulani Shili, Orifha Mbedzi, Livhuwani Mvhali,Lindo Mlambo">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/javascript.js"></script>
	<script>
		ajax("<?php echo $graphPhoLink;?>", function(data){
			// console.log(data)
			var rowC = 1

			for(var i = 0; i < data['data'][i]['images'].length; i++){
				var img = document.createElement("img")
				var col = document.createElement("div")
				var txt = document.createElement("div")

				col.setAttribute("class", "col-xs-12 col-sm-12 col-md-12 card")
				col.setAttribute("id", "card_"+i)
				col.setAttribute("data-toggle","modal")
				col.setAttribute("data-target","#slider")


				txt.setAttribute("class", "text")
				txt.appendChild(document.createTextNode((data['data'][i]['name'])? data['data'][i]['name']:"Tswelopele Day Care"))

				img.src = data['data'][i]['images'][3]['source']
				img.setAttribute("alt", (data['data'][i]['name'])? data['data'][i]['name']:"Tswelopele Day Care")
				img.setAttribute("onClick", "showSlider('"+img.src+"', '"+img.alt+"', "+i+")")
				img.setAttribute("init-height", data['data'][i]['images'][3]['height']) // [w, h]

				col.appendChild(img)
				col.appendChild(txt)
				img.setAttribute("class", "img-responsive slider-imgs")
				document.getElementById("me"+rowC).appendChild(col)
				rowC++
				if(rowC > 3) 
					rowC = 1
			}
		})
	</script>
	<style>
		div[class*="col-"]{
			/*padding: 10px;*/
		}
		.navbar{
			box-shadow: 0px 2px 4px 6px rgba(0, 0, 0, 0.3);
			min-height: 60px !important;
		}
		.navbar-brand{
			padding-top: 75%;
		}
		#gallery{
			margin-top: 40px;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<section class="row landing-row">
		<div class="container-fluid" style="padding: 30px; padding-top: 0px;">
			<nav class="navbar navbar-inverse navbar-fixed-top" style="width: 100%;">
				<div class="container" style="padding: 0px">
					<div class="navbar-header">
						<a href="index.html" class="navbar-brand"><img src="imgs/prop_logo.png" id="logo" class="img-responsive img-circle" alt="Tswelopele Day Care"></a>
						<button class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse" style="padding: 0px" id="mynav">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="javascript: history.back()">Go back to previous page</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</section>
</div>
<div class="container" id="gallery">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4 card-par">
			<div id="me1" class="row"></div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 card-par">
			<div id="me2" class="row"></div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 card-par">
			<div id="me3" class="row"></div>
		</div>
	</div>

	<!-- modal -->
	<div class="modal fade" id="slider" role="dialog">
		<div class="modal-lg modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<!-- <h4>Slide Show</h4> -->
				</div>
				<div clas="modal-body">
					<!-- custom slideshow -->
					<div class="slide-container">
						<div class="fade_">
							<button class="close" data-dismiss="modal">&#10008;</button>
							<img id="slider-img" class="img-responsive">
							<div class="caption text-center">Caption Text</div>
						</div>
						<a class="prev" onclick="nextImg(-1)">&#10094;</a>
						<a class="next" onclick="nextImg(1)">&#10095;</a>
					</div>
				</div>
				<!-- <div class="modal-footer">
					<button class="btn btn-lg btn-info" data-dismiss="modal">Close Dialog</button>
				</div> -->
			</div>
		</div>
	</div>
</div>
</body>
</html>