<?php

function include_templates($path, $variables) {
    if (file_exists ( $path )) {

        $variables = xss($variables);

        extract($variables);

        ob_start();

        $template  = $path;

        include $template;

        ob_get_contents();

    }

    return "";

}

function xss($data)
{
    if (is_array($data)) {
        $escaped = array();
        foreach ($data as $key => $value) {
            $escaped[$key] = xss($value);
        }
        return $escaped;
    }
    return htmlspecialchars($data);
}

?>