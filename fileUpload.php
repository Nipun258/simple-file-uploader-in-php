<?php   //Craete by E1641113
    if (empty($_FILES['myfile']['name'])) {
    echo "<h1 style='text-align:center; color:red'>No file was selected for upload, Please select your file!!</h1>";
    header('Refresh: 5; URL=Q3.php');
   }else{  
    $currentDir = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store all foreseen and unforseen errors in here

    $fileExtensions = ['jpeg'];

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    //$fileExtension = strtolower(end(explode('.',$fileName)));//get an errer
    $tmp= explode('.', $fileName);
    $fileExtension = end($tmp);

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {//Only jpeg files are allowed to be uploaded
            $errors[] = "<p style='font-Size:25px;'>This file extension is not allowed. Please upload a JPEG file</p>";
        }

        if ($fileSize > 100000) {//File size should be less than 100KB.
            $errors[] = "<p style='font-Size:25px;'>This file is more than 100kb. Sorry, it has to be less than or equal to 100kb</p>";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            //The uploaded file should be saved in a folder named “upload” with an appropriate file name
            if ($didUpload) {
                echo "<h1 style='text-align:center; color:blue'>The file " . basename($fileName) ." with file size ". ($fileSize/1000) ."kb has been uploaded</h1>";
                    header('Refresh: 10; URL=Q3.php');
                //Name, type and size of the file should be displayed for a successful upload
            } else {
                echo "<h1 style='text-align:center; color:blue'>An error occurred somewhere. Try again or contact the admin</h1>";
                header('Refresh: 5; URL=Q3.php');
            }
        } else {
            foreach ($errors as $error) {
                echo  "<h1 style='color:Red'>These are the errors  :</h1>".$error;
                header('Refresh: 5; URL=Q3.php');
            }
        }
    }
 }

?>
