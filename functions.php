<?php

function sitioweb() {
	include('config.php');
	$query = mysqli_query($link, "SELECT * FROM config");
	while($data = mysqli_fetch_array($query)) {
		echo $data['name'];
	}
}

function url() {
	include('config.php');
	$query = mysqli_query($link, "SELECT * FROM config");
	while($data = mysqli_fetch_array($query)) {
		echo $data['url'];
	}
}

?>