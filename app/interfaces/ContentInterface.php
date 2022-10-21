<?php
namespace App\Interfaces;

/**
 * Interface for raw data
 */
interface ContentInterface
{
	public function getContent(object $setting = NULL) : array;
}