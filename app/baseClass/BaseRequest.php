<?php
namespace App\BaseClass;

/**
 * 
 */
class BaseRequest
{

	public function execute($url, $options)
	{
		$handle = curl_init($url);
		curl_setopt_array($handle, $options);
		$response = curl_exec($handle);

		if ($response === false) {
			$errno = curl_errno($handle);
			$error = curl_error($handle);
			curl_close($handle);
			throw new CustomExeptions("Curl returned error $errno: $error");
		}

		$httpCode = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
		$curlInfo = curl_getinfo($handle);

		curl_close($handle);

		return [
			'httpCode' => $httpCode,
			'curlInfo' => $curlInfo,
			'contentType' => $curlInfo['content_type'],
			'response' => $response
		];
	}

	public function checkResponce($data) 
	{
		$httpCode = $data['httpCode'];
		$response = $data['response'];

		if ($httpCode == 200) {
			return json_decode($response, true);
		}

		if ($httpCode == 401) {
			throw new CustomExeptions('Error 401: Invalid access token provided');
		}
		
		if ($httpCode >= 500) {
			sleep(15);
			return false;
		} 

		if ($httpCode != 200) {
			$response = json_decode($response, true);
			throw new CustomExeptions("Error : {$httpCode}. {$response['description']}");
		} 	
	}
}