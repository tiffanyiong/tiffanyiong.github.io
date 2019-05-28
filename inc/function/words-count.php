<?php
/**
* Returns word count of the sentences.
*
* @since photo-magic 0.1.0
*/
if ( ! function_exists( 'photo_magic_words_count' ) ) :
	function photo_magic_words_count( $length = 25, $photo_magic_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $photo_magic_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;