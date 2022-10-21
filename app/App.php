<?php
namespace App;

use App\Library\BotSettings;
use App\Library\BotPoster;
use App\Library\BotPosts;

use App\Library\Content\CheckContent;
use App\Library\Content\PostingContent;
use App\Library\Content\FileContent;

class App
{
	function __construct()
	{	
		$settings = new BotSettings();
		$checking = new CheckContent();
		$posting = new PostingContent($settings);
		$content = new FileContent($settings);
		
		(new BotPoster($settings, $checking, $posting))->run($content);
	}
}