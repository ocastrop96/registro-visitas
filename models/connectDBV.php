<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=rvisitas",
			            "rvfront",
			            "d5esZ5zpCd}5O~4wDiH");
		$link->exec("set names utf8");
		return $link;
	}
}