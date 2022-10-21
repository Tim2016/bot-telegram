<?php
namespace App\Library\Content;

use App\Library\HttpRequest;
use App\Library\BotRequest;
use App\Library\CustomExeptions;	

/**
 * 
 */
class PostingContent {

	function __construct($settings) 
	{
		$this->settings = $settings;
		$this->directory = $settings->getFileMediaPath();
		$this->request = new HttpRequest($settings);
		$this->api = new BotRequest($settings);
		$this->media = '';
	}


	public function run($tasks = []) : array
	{
		foreach ($tasks as $key => $task) {
			list($channel,$postdate,$media,$text) = array_values($task);
			$method	= $this->selectMethod($media);
			$tastResult = $this->api->{$method}($channel, $this->media, $text);
			
			$result[$key] = [ 
				'channel' => $channel,
				'media' => $this->media,
				'text' => $text,
				'message_id' => $tastResult['result']['message_id']
			];
		}

		return $result;
	}


	private function checkUrl(string $url = '')
	{	
   		$headers = $this->request->getHeadersRequest($url);
   		return $headers['httpCode'] === 200 ? $headers['contentType'] : false;
	}	


	public function selectMethod(string $media = '') : string
	{	

  		// no media
  		if (empty($media)) return 'sendMessage';

		// media is unexplained
		throw new CustomExeptions("Method request not exist! Media is unexplained");
	}
}