<?php
function smarty_modifier_markdown_content($text, $container_id = null)
{
    if ($container_id === null) {
        $container_id = "markdown-container-" . Common::generateRandomString(6);
    }
    return "<textarea style='display: none;' class='markdown-area' data-display-container-id='$container_id'>$text</textarea><div id='$container_id' style='display: inline-block;'>$text</div>";
}