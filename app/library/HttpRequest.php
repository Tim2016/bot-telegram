<?php
namespace App\Library;

use App\Library\CustomExeptions;	
use App\BaseClass\BaseRequest;

/**
 * Requests to telegram api
 */
class HttpRequest extends BaseRequest
{
	public function getHeadersRequest($url)
	{
		$options = [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => true,
			CURLOPT_NOBODY => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0',
		];

		return $this->execute($url, $options);
	}
}