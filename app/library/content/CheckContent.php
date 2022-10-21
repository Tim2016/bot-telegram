<?php
namespace App\Library\Content;

use App\Library\CustomExeptions;	

/**
 * 
 */
class CheckContent {
	
	public function run($content = [])
	{
		if (empty($content)) return false;

		$tasks = $task = [];
		foreach ($content as $key => $item) {

			$task = explode(';', trim($item));

			if (count($task) !== 4) {
				throw new CustomExeptions("Task have no correct fields count");
			}

			$task = array_combine([
				'channel',
				'postdate',
				'media', 
				'content'], $task);

			if (empty($task['channel'])) {
				throw new CustomExeptions("Task have no channel name");
			}

			if (empty($task['postdate'])) {
				// $task['postdate'] = date("d.m.Y H:i", time());
				throw new CustomExeptions("Task have no postdate");
			}

			if (empty($task['media'])){}

			if (empty($task['content']) && empty($task['media'])) {
				throw new CustomExeptions("Task have no media and content");
			}

			//check posting time
			if ($task['postdate'] == date("d.m.Y H:i", time()) ){
				$tasks[] = $task;
			}		
		}

		if (empty($tasks)) return false;

		return $tasks;
	}
}