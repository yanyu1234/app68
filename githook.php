<?php
	system("git pull");
	file_put_contents("git_log.html",print_r($_POST,true));
