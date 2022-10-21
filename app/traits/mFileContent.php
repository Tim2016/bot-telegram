<?php
namespace App\Traits;
use App\Library\CustomExeptions;	

/**
 * trate file
 */
trait mFileContent
{
	public function getContentFromTextFile()
	{
		if (!file_exists($this->path)) {
            throw new CustomExeptions("File with posting content not exits or should be called like data/post_content.txt");
        }

		$content = file_get_contents($this->path);
		if (empty($content)) {
			throw new CustomExeptions("File is empty!");
		}

		return $content;
	}
}