<?php

	include (__DIR__.'/../KodExplorer/config/config.php');
	$app = new Application();
	init_lang();
	init_setting();
	$app->run();