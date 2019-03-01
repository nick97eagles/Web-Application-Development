<!DOCTYPE html>
<html lang="en">

<head>
    <title>Example Image Form</title>
    <meta charset="UTF-8">
</head>

<body>

    <form action="http://cptr220.cs.wallawalla.edu/chapter06/image_upload/upload.php" method="post" enctype="multipart/form-data">
        <label for="image-file">Select image to upload:</label>
        <input type="file" name="image-file" id="image-file"><br />
        <label for="image-file">Image title:</label>
        <input type="text" name="image-name" id="image-name"><br />
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>
</html>
