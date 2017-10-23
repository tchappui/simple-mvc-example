<?php

/**
 * Rendering function that implements simple template inheritance.
 *
 * @param string $_template Name of the template to render without the extention.
 * @param array  $_data     Optional. Data to feed to the template.
 * @param string $_dir      Optional. Root directory for the templates. Default: templates/.
 *
 * @return string Rendered text.
 */
function view(string $_template, array $_data = [], string $_dir = 'templates/')
{
    extract($_data);
    $_data['__parent'] =  null;
    // Starts a block: captures the content of the block in the _data scope.	
    // Only the content of the top block is stored.
    $block = function($name) use(&$_data) {
        ob_start(function($buf) use(&$name, &$_data) {
            if(empty($_data[$name])) {
                $_data[$name] = $buf;
            }
            return $_data[$name];
        });
    };
 
    // Ends a block: flushes the top-most output buffer and leaves the block.
    $endblock = function() use (&$_data) {
        ob_end_flush();
    };
    // Extends a template by setting the name of the parent template.
    $extends = function($name) use (&$_data) {
        $_data['__parent'] = $name;
    };

    // Includes a template 
    $include = function($name, $data = null) use (&$_data, &$_dir) {
        if ($data === null) {
            $data = $_data;
        } 
        echo view($name, $data, $_dir);
    };
		
    // Rendering of the template for the cuurent level.
    ob_start();
    require("$_dir$_template.php");
    $_content = trim(ob_get_contents());
    ob_end_clean();
    $parent = $_data['__parent'];
    // If a parent template exists, uview is called recursively.
    return isset($parent) ? view($parent, $_data, $_dir) : $_content;
}
