<?php
/*
        Plugin Name: Q2A behaviac Editor
        Plugin URI: https://github.com/pjkui/q2a-behaviac-editor
        Plugin Update Check URI: https://raw.github.com/pjkui/q2a-behaviac-editor/master/qa-plugin.php
        Plugin Description: Can upload picture by Ctrl+V
        Plugin Version: 1.0
        Plugin Date: 2016-02-14
        Plugin Author: Quinn Pan
        Plugin Author URI: http://pjkui.com
        Plugin License: GPLv2
        Plugin Minimum Question2Answer Version: 1.6
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	if (!defined('AMI_PJK_EDITOR_DIR')) {
	        define('AMI_PJK_EDITOR_DIR', dirname(__FILE__));
	}
	
	if (!defined('AMI_PJK_EDITOR_DIR_NAME')) {
		    define('AMI_PJK_EDITOR_DIR_NAME', basename(dirname(__FILE__)));
	}


	qa_register_plugin_layer('qa-behaviac-layer.php', 'Q2A behaviac layer');
	qa_register_plugin_module('editor', 'qa-behaviac.php', 'qa_behaviac', 'Q2A behaviac Editor');
	qa_register_plugin_module('page', 'qa-behaviac-upload.php', 'qa_behaviac_upload', 'Q2A behaviac Upload');


/*
	Omit PHP closing tag to help avoid accidental output
*/