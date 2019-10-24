<?php

$b64 = 'iVBORw0KGgoAAAANSUhEUgAAAMgAAADIAQMAAACXljzdAAAABlBMVEX///8AAABVwtN+AAAAmklEQVRYhe2USQ7AMAgD+f+nXTXEJN3unSioigTTi4VxxK6fl7LCX3ZgcnnfZjTSdPZxdXzS0DqkvwsQe1D6cieKOCms85khKLJcTVLP1eWNcYmkComch/DkbGSh9iGTWFoy1b9cMpTeZEKJuY9KIpMRFPYhnAydtUI2qRivEFyHzLcFJ6HJhWRiXkpfPAoiPSn6aFodk+z6cR3gcOlrWjOFkwAAAABJRU5ErkJggg==';

// Obtain the original content (usually binary data)
$bin = base64_decode($b64);

// Load GD resource from binary data
$im = imageCreateFromString($bin);

// Make sure that the GD library was able to load the image
// This is important, because you should not miss corrupted or unsupported images
if (!$im) {
    die('Base64 value is not a valid image');
}

// Specify the location where you want to save the image
$img_file = 'filename.png';

// Save the GD resource as PNG in the best possible quality (no compression)
// This will strip any metadata or invalid contents (including, the PHP backdoor)
// To block any possible exploits, consider increasing the compression level
imagepng($im, $img_file, 0);
echo 'hello world';