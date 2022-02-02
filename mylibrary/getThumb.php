<?php
/*
 * The job of the getThumb() function is to provide a small thumbnail version of the image the manager uploads. The getThumb() function first checks the name element of the uploaded file to see if the manager supplied a file for the image file.
 * */
function getThumb($Original)
{
//    If the manager didn't specify a file, you'll need to supply a generic image that you can use in the Web page:
    if (!$Original['name'])
    {
        //no image supplied, use default
        $TempName = "images/noimage.jpg";
        $TempFile = fopen($TempName, "r");
        $thumbnail = fread($TempFile, fileSize($TempName));

        //The getThumbs() function reads this image using the fread() PHP function and will utilize it if the manager doesn't specify an image or if it can't convert the image the manager does specify.
    } else
    {
        /*If the manager specified a file image, the getThumbs() function uses the file_get_contents() function to read the temporary file on the server (specified using the tmp_name element) into a PHP string variable, then attempts to create an image from the image string. If that's successful, it uses the GD2 library functions to resample the image to an 80 x 60-pixel thumbnail. This ensures that all of our product images are the same size, making our catalog layout better*/
        //get image
        $Picture =  file_get_contents($Original['tmp_name']);
        //create image
        $SourceImage = imagecreatefromstring($Picture);
        if (!$SourceImage)
        {
            //not a valid image
            echo "Not a valid image\n";
            $TempName = "images/noimage.jpg";
            $TempFile = fopen($TempName, "r");
            $thumbnail = fread($TempFile, fileSize($TempName));
        } else
        {
            //create thumbnail
            $width = imageSX($SourceImage);
            $height = imageSY($SourceImage);
            $newThumb = imagecreatetruecolor(80, 60);

            //resize image to 80 x 60
            $result = imagecopyresampled($newThumb, $SourceImage,
                0, 0, 0, 0,
                80, 60, $width, $height);

            /*After creating the new thumbnail, the getThumbs() function code needs to place it back into a PHP variable to pass to the calling program.*/

            //move image to variable
            ob_start();
            imageJPEG($newThumb);
            $thumbnail = ob_get_contents();
            ob_end_clean();
        }
    }
    return $thumbnail;

    //More explanations of functions
    /*
     * The ob_start() function creates an output buffer that stores anything that would've normally been output from the PHP code. Once the PHP sees the ob_start() function, it creates a temporary buffer area in memory and redirects all output to that buffer instead of sending the output directly to the client browser. The imageJPEG() function normally outputs the image to the browser, but now, PHP redirects that output to the buffer area.
     * */

    /*The ob_get_contents() function retrieves the contents of the buffer area. You use this to store the image value into a string PHP variable. To stop the buffering, you must use the ob_end_clean() function. After you close the output buffer, the output from the PHP code returns to normal and goes to the client's browser.
     *
     * */

    /*Now, the newly formed image (or our no image available image) is in the $thumbnail variable. The function then returns it back to the calling program.

Now back in the addproduct.inc.php file, you need to use the mysql_real_escape_string() function on the thumbnail image in case there are any stray quotes or backslashes in the binary data. Then you're ready to use the INSERT statement to push in your new product
     *
     * */
}?>