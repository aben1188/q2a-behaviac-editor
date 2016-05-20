<?php

/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-plugin/wysiwyg-editor/qa-wysiwyg-upload.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Page module class for WYSIWYG editor (CKEditor) file upload receiver


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/


class qa_behaviac_upload
{

    function match_request($request)
    {
        return ($request == 'wysiwyg-editor-upload');
    }


    function process_request($request)
    {
        $message = '';
        $url = '';

        if (is_array($_FILES) && count($_FILES)) {
            if (!qa_opt('wysiwyg_editor_upload_images'))
                $message = qa_lang('users/no_permission');

            require_once QA_INCLUDE_DIR . 'qa-app-upload.php';

            $upload = qa_upload_file_one(
                qa_opt('wysiwyg_editor_upload_max_size'),
                qa_get('qa_only_image') || !qa_opt('wysiwyg_editor_upload_all'),
                qa_get('qa_only_image') ? 1600 : null, // max width if it's an image upload
                null // no max height
            );

            $message = @$upload['error'];
            $url = @$upload['bloburl'];

        }
        if (qa_get('qa_json')) {
            $data=[];
            $data['fileName']='323423.png';
            $data['uploaded']=1;
            $data['url']=$url;
            $data['error']=[];
            $data['error']['number']=201;
            $data['error']['message']='OK';

            $data['upload_info']=$upload;

            echo json_encode($data);
        } else {
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(" . qa_js(qa_get('CKEditorFuncNum')) .
                ", " . qa_js($url) . ", " . qa_js($message) . ");</script>";
        }

        return null;
    }

}


/*
	Omit PHP closing tag to help avoid accidental output
*/