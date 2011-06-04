<?php 

class Text extends Kohana_Text{

	public static function limit_chars_left($str, $limit = 100, $end_char = NULL, $preserve_words = FALSE){
	
    $end_char = ($end_char === NULL) ? '…' : $end_char;
 		
    $limit = (int) $limit - UTF8::strlen($end_char);
 		
    if (trim($str) === '' OR UTF8::strlen($str) <= $limit)
        return $str;
 
    if ($limit <= 0)
        return $end_char;
 
    if ($preserve_words === FALSE)
        return $end_char.ltrim(UTF8::substr($str, UTF8::strlen($str)-$limit, $limit));
     
		// Don't preserve words. The limit is considered the top limit.
    // No strings with a length longer than $limit should be returned.
    if (  preg_match('/^.{0,'.$limit.'}\s/us', $str, $matches) )
	    return ( strlen($matches[0]) === strlen($str) ? '' : $end_char ).trim($matches[0]);
	}
	
}