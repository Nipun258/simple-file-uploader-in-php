<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload with PHP</title>
    <style type="text/css">
    input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
    color: green;
}
    </style>
</head>
<body>
   <form action="fileUpload.php" method="post" enctype="multipart/form-data">
        <fieldset>
        <legend>File upload pannel</legend>
        Upload a File:&nbsp;&nbsp;&nbsp;
        <input type="file" name="myfile" id="fileToUpload"><br><br>
        <input type="submit" name="submit" value="Upload File Now" >
        </fieldset>
    </form>
</body>
</html>