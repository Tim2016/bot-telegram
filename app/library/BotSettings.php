<?php
namespace App\Library;

/**
 * Settings
 * Registration new bot in @BotFather - /newbot
 * $fileContentPath - use for create tasks
 * $fileMediaPath - use to set paths to image and other media files
 */
class BotSettings
{
	
	private $botToken = '';
	private $apiUrl = 'https://api.telegram.org/bot';
	private $apiFileUrl = 'https://api.telegram.org/file/bot';
	private $fileContentPath = './assets/content/post_table.txt';
	private $fileMediaPath = './assets/media/';


	public function getToken()
	{
		return $this->botToken;
	}

	public function getApiUrl()
	{
		return $this->apiUrl . $this->botToken . '/';
	}

	public function getApiFileUrl()
	{
		return $this->apiFileUrl . $this->botToken . '/';
	}

	public function getFileMediaPath()
	{
		return $this->fileMediaPath;
	}

	public function getFileContentPath()
	{
		return $this->fileContentPath;
	}
}