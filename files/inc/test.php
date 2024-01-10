<?php
if ($sub_file) {
	$remove = array('application/' => '', 'image/' => '', 'text/' => '', 'video/' => '', 'audio/' => '');
	$file_type_class = ' type-' . strtr($sub_file['mime_type'], $remove);

	echo '<a href="' . $sub_file['url'] . '" target="_blank" class="file' . $file_type_class . '">Download fil</a>';
}