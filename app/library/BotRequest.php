<?php
namespace App\Library;

use App\Library\CustomExeptions;	
use App\BaseClass\BaseRequest;

/**
 * Requests to telegram api
 */
class BotRequest extends BaseRequest
{
	
	function __construct(object $settings)
	{
		$this->settings = $settings;
		$this->apiUrl = $settings->getApiUrl();
	}

	public function sendMessage($channel = '', $media = '', $txt, $keyboardArr = [])
	{
		return $this->apiRequest("sendMessage", array(
			'chat_id' => $channel,
			'text'=> $txt,
			'parse_mode' => 'Markdown',
			'reply_markup' => array('inline_keyboard' => $keyboardArr),
			'disable_notification' => false,
			'disable_web_page_preview' => true));
	}

	public function apiRequest($method, array $parameters = [])
	{
		if (!is_string($method)) {
			throw new CustomExeptions('Method name must be a string');
		}

		foreach ($parameters as $key => &$val) {
			if (!is_numeric($val) && !is_string($val)) {
				$val = json_encode($val);
			}
		}

		$url = $this->settings->getApiUrl() . $method;
		$options = [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_TIMEOUT => 60,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $parameters
		];

		$result = $this->execute($url, $options);
		return $this->checkResponce($result);
	}
}