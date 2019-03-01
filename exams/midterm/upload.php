<!-- Page to allow user to upload image --> 
<link href="style.css" rel='stylesheet'/>
<form action="images" method="post" enctype="multipart/form-data">
        <label for="image-file">Select image to upload:</label>
        <input type="file" name="image-file" id="image-file"><br />
        <label for="image-file">Image title:</label>
        <input type="text" name="image-name" id="image-name"><br />
        <input type="submit" value="Upload Image" name="submit">
</form>