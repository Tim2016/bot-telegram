<?php
namespace App\BaseClass;

/**
 * 
 */
class BaseContent
{
	function __construct(object $settings)
	{
		$this->settings = $settings;
	}

	public function getContent(object $settings = NULL) {}
}