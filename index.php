<?php
$hostName = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Localhost</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.col-sm-2 {margin-bottom: 10px;text-transform: capitalize;padding: 0px 3px;}
.well.text-center {font-size: 47px;padding: 0px;text-transform: capitalize;font-family: initial;}
.col-sm-2 a.btn span {margin-right: 10px;}
a.btn.btn-block {text-align: left;}
.btn {border-radius: 0px;}
.col-sm-2.search {text-align: center;}
.col-sm-2.search input {text-align: center;padding: 6px 0px;font-size: 14px;line-height: 1.428571;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);box-shadow: inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;}
.col-sm-2.search input:focus{border-color: #66afe9;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);}
.btn:hover {box-shadow: 0px 5px 6px rgb(165, 165, 165);}
</style>
<script>
function searchDir(text){
	var txt = text.toLowerCase();
	$("div.folder").hide().filter(':contains("' + txt + '")').show();
}
</script>
</head>
<body>
<section>
	<div class="well text-center">Welcome to Localhost</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-10 text-center">
				<a href="http://<?php echo $hostName; ?>/phpmyadmin/" class="btn btn-warning">PHP My Admin</a>
				<a href="http://<?php echo $hostName; ?>/dashboard/phpinfo.php" class="btn btn-warning">PHP Info</a>
				<a href="http://<?php echo $hostName; ?>/dashboard/howto.html" class="btn btn-warning">How To Guides</a>
				<a href="http://<?php echo $hostName; ?>/dashboard/faq.html" class="btn btn-warning">FAQs</a>
			</div>
			<div class="col-sm-2 search">
				<input type="search" name="search" autofocus placeholder="Search Your Directory" onkeyup="searchDir(this.value)" id="searchFolder" />
			</div>
		</div>
	</div>
	<hr/>
</section>
<section>
	<div class="container">
		<div class="row">
<?php
$dir = "../htdocs";

if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		$array = ['.','..','dashboard','xampp','www'];
		if(!in_array($file,$array)){
			if(is_dir($file)){
				$url = "http://$hostName/$file";
				$directory = "<div class='col-sm-2 folder'>";
				$directory .= '<a href="'.$url.'" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-folder-open"></span>'.strtolower($file).'</a>';
				$directory .= "</div>";				
				echo $directory;		
			}
		}
    }
    closedir($dh);
  }
}
?>
		</div>
	</div>
</section>
</body>
</html>