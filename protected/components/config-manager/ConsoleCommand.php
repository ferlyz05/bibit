<?php

class ConsoleCommand extends CConsoleCommand
{
	
	public function text($text,$return=true) {
		if(!$return)
			return $text;
		echo $text."\n";return;
	}
	
}