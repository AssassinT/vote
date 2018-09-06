<?php
	
	$str = '我0爱1你亲爱的菇凉!!';

	// $res = substr($str, 0, 6);
	$res = mb_substr($str, 0, 6, 'utf-8');

	echo $res;