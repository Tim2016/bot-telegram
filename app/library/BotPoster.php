<?php
namespace App\Library;

use App\Interfaces\ContentInterface;
use App\Library\CustomExeptions;
use App\Traits\mLog;

/**
 * Posting on Channel
 */
class BotPoster
{	
	use mLog;
	
	function __construct(object $settings = NULL, object $checking, object $posting)
	{
		$this->settings = $settings;
		$this->checking = $checking;
		$this->posting = $posting;
	}

	/**
	 * Getting content from file or db
	 * Checking Content
	 * Start posting of the received data
	 */
	public function run(ContentInterface $content)
	{	
		$result = '';

		try {
			$tasksList = $content->getContent($this->settings);
			$tasksList = $this->checking->run($tasksList);
			$result = $this->posting->run($tasksList);
		} catch (CustomExeptions $e) {
			$e->showMessage();
			mLog::logError($e->getMessage());
		} finally {
			mLog::logEnd($result);
		}
	}
}