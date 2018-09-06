<?php
	$redis = new Redis;

	$res = $redis -> connect('localhost',6379);

	$redis -> auth('123123');

	$redis -> select(1);