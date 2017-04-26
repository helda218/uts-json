<!DOCTYPE html>
<html>
	<head>
		<title>Prediksi Cuaca Jawa Barat</title>
		<link rel="shortcut icon" href="img/icon.png"/>
		<link href="css/index.css" rel="stylesheet" type="text/css" />
		
	</head>
	<body >
		<div class="menu-wrap">
			<div class="menu">
				<header>
					<ul>
						<li><a href="sumedang.php" class="current">Sumedang</a></li>
						<li><a href="purwakarta.php">Purwakarta</a></li>
						<li><a href="majalengka.php">Majalengka</a></li>
						<li><a href="indramayu.php">Indramayu</a></li>
						<li><a href="bekasi.php">Bekasi</a></li>
						<li><a href="tasikmalaya.php">Tasikmalaya</a></li>
					
					</ul>
				</header>
			</div>
			</div>
		</div>


	
	<div class="page">
	<div class="primary-col">
    <div class="generic">
		
	
	</div>
	</div>
	</div>
	<div class="panel panel-default">
	<div class="panel-body">
	<div align=Center>
		<h1>Prediksi Cuaca Jawa Barat</h1>
	</div>
	<div align=Center>
	<font color="red">
	<font size="4">

<?php


	$json_string1 = file_get_contents("http://api.wunderground.com/api/0215dd2f84808f33/conditions/q/IA/Sumedang.json");
	$json_string2 = file_get_contents("http://api.wunderground.com/api/0215dd2f84808f33/astronomy/q/IA/Sumedang.json");
	$json_string3 = file_get_contents("http://api.wunderground.com/api/0215dd2f84808f33/forecast/q/IA/Sumedang.json");
	
	$parsed_json1 = json_decode ($json_string1);
	$parsed_json2 = json_decode ($json_string2);
	$parsed_json3 = json_decode ($json_string3);
	
	$location = $parsed_json1->{'current_observation'}->{'display_location'}->{'full'};
	$date = $parsed_json1->{'current_observation'}->{'local_time_rfc822'};
	$suhu = $parsed_json1->{'current_observation'}->{'temp_c'};
	$angin = $parsed_json1->{'current_observation'}->{'wind_mph'};
	
	$sunrise_jam = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'hour'};
	$sunrise_mt = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'minute'};
	$sunset_jam = $parsed_json2->{'moon_phase'}->{'sunset'}->{'hour'};
	$sunset_mt = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'minute'};
	
	$icon = $parsed_json3->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'icon'};
	
	echo "Keadaan cuaca saat ini di ${location}<br>
	${date}";
	
	echo "<br>";
	echo "<br>";
	
	echo"<img src='http://icons.wxug.com/i/c/k/".$icon.".gif'> <br/>";
	
	echo "<br>";
	echo "Suhu : ${suhu} <sup> o </sup>C";
	
	echo "<br>";
	
	echo "Kecepatan Angin : ${angin} meter/jam";
	echo "<br>";
	echo "Sunrise pada pukul ${sunrise_jam}:${sunrise_mt}\n";
	echo "<br>";
	echo "Sunset pada pukul ${sunset_jam}:${sunset_mt}\n";
	echo "<br>";
	echo "<br>";
	
	
	if ($suhu >= 28) {

echo 'Cuaca Panas <br> Saran : Gunakan sunblock atau jaket untuk melindungi kulit dari paparan sinar matahari.';
} else if ($suhu < 28 && $suhu >= 26) {
	echo 'Cuaca Berawan.';
}  else {
	echo 'Cuaca Mendung <br> Saran : Bawalah payung atau jas hujan jika berpergian.';
}
   
?>
</font>
</font>
</div>
</div>

	<div class="copyright-wrap">
		<div class="panel">
		<div class="content">
			<p>Copyright @Helda Mentari &copy; 2017 Sistem Informasi | Unisbank<br>
		</div>
		</div>
	</div>
</div>

</body>
</html>
