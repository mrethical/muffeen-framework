<?php

function config($key) 
{
	return \Muffeen\Framework\Components\Container::get('config')[$key];
}