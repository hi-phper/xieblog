<?php
/**
 * @copyright Copyright (C) 2015 hiphper, All rights reserved.
 * @license GNU/GPL V2 http://gnu.org/licenses/gpl-2.0.html
 * @author hiphper at 163 dot com
 * @link https://github.com/hi-phper/xieblog
 */

require 'vendor/autoload.php';

use HiPhper\XieBlog\Config;
use HiPhper\XieBlog\Post;
use JasonGrimes\Paginator;

$config = new Config('config.json');

Flight::set('flight.views.path', './templates/' . $config->get('template'));
Flight::route('/', function() use ($config) {
	$post = new Post();
	$page = 1;
	$posts = $post->getPosts($page, $config->get('per_page'));
	
	$totalItems = count($post->getPostNames());
	$urlPattern = $config->get('base_url') . 'page/(:num)';
	$paginator = new Paginator($totalItems, $config->get('per_page'), $page, $urlPattern);

	Flight::render('index', array('posts' => $posts, 'config' => $config, 'paginator' => $paginator), 'content_layout');
	Flight::render('layouts/default');
});

Flight::route('/page/@page', function($page) use ($config) {
	$post = new Post();
	$posts = $post->getPosts($page, $config->get('per_page'));
	
	$totalItems = count($post->getPostNames());
	$urlPattern = $config->get('base_url') . 'page/(:num)';
	$paginator = new Paginator($totalItems, $config->get('per_page'), $page, $urlPattern);

	Flight::render('index', ['posts'=>$posts, 'config'=>$config, 'paginator'=>$paginator], 'content_layout');
	Flight::render('layouts/default');
});

Flight::route('/posts/@name', function($name) use ($config) {
	$name = str_replace('../', '', $name);
	$name = 'posts/' . $name . '.md';
	if(file_exists($name)) {
		$onePost = new Post();
		$onePost->setListView(FALSE);
		$post = $onePost->getPost($name);
		Flight::render('post', ['post'=>$post, 'config'=>$config], 'content_layout');
		Flight::render('layouts/default');
	}
});

Flight::start();
