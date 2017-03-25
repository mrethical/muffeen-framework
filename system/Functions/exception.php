<?php

function exception(Exception $e, $show_404 = false) {
	if (config('environment') === 'development') {
		throw $e;
	} else {
		if ($show_404) {
			show_404();
		} else {
			header("HTTP/1.1 500 Internal Server Error");
		}
	}
}