<?php

if(isset($_POST['upload'])){

    $numberOfFiles = sizeof($_FILES["song"]["name"]);
    echo "<br>Number of selected files: ".$numberOfFiles.'<br>';

    for($i=0; $i<$numberOfFiles; $i++){

        $tempName = $_FILES['song']['tmp_name'][$i];
        $desPath = realpath(dirname(__FILE__))."/" . $_FILES['song']['name'][$i];



        if (file_exists(realpath(dirname(__FILE__))."/" . $_FILES['song']['name'][$i]))
        {
            echo $_FILES['file']['name'] . " already exists. ";
        }
        if(!move_uploaded_file($tempName, $desPath))
        {
            echo "File can't be uploaded";
        }
    }

}

?>

<form method="post" action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
    <input type="file" multiple="multiple" name="song[]" accept="audio/mpeg3"><br></br>
    <div class="uploadbtn" align="center">
    <input type="submit" name="upload" value="Upload"></div>
</form>
