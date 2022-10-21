<?php
namespace App\Library\Content;

use App\Interfaces\ContentInterface;
use App\BaseClass\BaseContent;
use App\Library\CustomExeptions;	
use App\Traits\mFileContent;

/**
 * 
 */
class FileContent extends BaseContent implements ContentInterface
{
	use mFileContent;

	public function getContent($settings = NULL) : array
	{
		$this->path = $settings->getFileContentPath();
		return $this->getContentFromFile();
	}

	public function getContentFromFile() : array
	{
		$content = $this->getContentFromTextFile();

		if(strpos($content, "\n") !== false) {
			return explode("\n", $content);
		}

		return [trim($content)];
	}
}