<?php
/**
 * @copyright Copyright (C) 2015 hiphper, All rights reserved.
 * @license GNU/GPL V2 http://gnu.org/licenses/gpl-2.0.html
 * @author hiphper at 163 dot com
 * @link https://github.com/hi-phper/xieblog
 */

class Config
{
    private $entries;
    
    public function __construct($configFile)
    {
        $this->entries = json_decode(file_get_contents($configFile));
        
		if (isset($_SERVER['HTTP_HOST'])) {
			$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
			$base_url .= '://'. $_SERVER['HTTP_HOST'];
			$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
		} else {
			$base_url = 'http://localhost/';
		}
		$this->set('base_url', $base_url);
    }
    
    public function get($key)
    {
        return $this->entries->$key;
    }
    
    public function set($key, $value)
    {
        $this->entries->$key = $value;
    }
}
