<?php
/**
 * @copyright Copyright (C) 2015 hiphper, All rights reserved.
 * @license GNU/GPL V2 http://gnu.org/licenses/gpl-2.0.html
 * @author hiphper at 163 dot com
 * @link https://github.com/hi-phper/xieblog
 */

use \Michelf\Markdown;

class Post
{
	private $isListView = true;
	
	public function setListView($value)
	{
		$this->isListView = $value;
	}
	
	public function getPostNames()
	{
		return array_reverse(glob('posts/*.md'));
	}

	public function getPosts($page = 1, $perPage = 5)
	{
		$names = $this->getPostNames();
		$names = array_slice($names, ($page - 1) * $perPage , $perPage);
		$posts = array();
		foreach ($names as $key=>$name) {
			$post = $this->getPost($name);
			$posts[] = $post;
		}
		return $posts;
	}
	
	public function getPost($name)
	{
		$post = new stdClass();
		$post->url = str_replace('.md', '', $name);
		
		$content = file_get_contents($name);
		
		$location = strpos($content, '---');
		$header = substr($content, 0, $location);
		$body = substr($content, $location + 3);
		if($moreLocation = strpos($body, '<!-- more -->')) {
			if($this->isListView) {
				$body = substr($body, 0, $moreLocation);
			}
			$post->hasMore = TRUE;
		} else {
			$post->hasMore = FALSE;
		}
		preg_match('/title:\s*(.+)/', $header, $matches);
		$post->title = $matches[1];
		preg_match('/date:\s*(.+)/', $header, $matches);
		$post->date = strtotime($matches[1]);
		$post->content = Markdown::defaultTransform($body);
		
		return $post;
	}
}
