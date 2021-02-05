<?php

function _si_assets_path($path){
    return get_template_directory_uri() . '/assets/' . $path;
}