<?php
namespace App\Traits;

/**
 * trate log
 */
trait mLog
{
	static public function logError($error) : void
	{	
		self::saveToFile('tg_log_err.txt', $error);
	}

	static public function logEnd($result) : void
	{
		if (is_array($result)) $result = json_encode($result);
		else $result = 'completed with an error';
		self::saveToFile('tg_log_run.txt', $result);
	}

	static private function saveToFile($file = 'tg_log_run.txt', string $result = '') : void
	{
		$datetime = date("d.m.Y H:i", time());
		file_put_contents($file, $datetime ." - ". $result . "\n", FILE_APPEND);
	}
}