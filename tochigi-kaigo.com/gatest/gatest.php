<?php
	function setGATelData($category = "電話リンク", $action = "", $label = "", $value = "")
	{
		$ga = "ga('send', 'event', '{$category}'";
		if ($action) {
			$ga .= ", '{$action}'";
		}
		if ($label) {
			$ga .= ", '{$label}'";
		}
		if ($value) {
			$ga .= ", '{$value}'";
		}
		$ga .= ");";
		echo $ga;
	}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>Googleアナリティクス 電話テスト</title>
	</head>
	<body>
		<h1>Google アナリティクス 電話テスト</h1>
		<a href="tel:0000123456" onclick="<?php setGATelData('電話リンク', 'タップ', '求人ID1'); ?>">電話をかける1</a>
		<a href="tel:0000123457" onclick="<?php setGATelData('電話リンク', 'タップ', '求人ID2'); ?>">電話をかける2</a>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79228324-1', 'auto');
  ga('send', 'pageview');

</script>
	</body>
</html>