<?php

class qa_html_theme_layer extends qa_html_theme_base
{
    function head_script()
    {
        qa_html_theme_base::head_script();
        if ($this->template == 'question') {
            $css_str = qa_opt('site_url') . 'qa-plugin/' . AMI_PJK_EDITOR_DIR_NAME . '/plugins/codesnippet/lib/highlight/styles/default.css';
            $this->output('<link rel="stylesheet" href="' . $css_str . '">');
            $this->output(
                '<script type="text/javascript">',
                "if (typeof qa_wysiwyg_editor_config == 'object')",
                "\tqa_wysiwyg_editor_config.skin='moono';",
                '</script>'

            );
            $this->output('<script>hljs.initHighlightingOnLoad();</script>');
        }
    }

}
