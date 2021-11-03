<?php

function get_image_path($imageId){
    $path = "https://danoori.s3.ap-south-1.amazonaws.com/$imageId";
    $path = str_replace(' ', '%20', $path);
    return $path;
}
