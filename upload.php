
<?php
// Include the database configuration file
include "request.php";
$fileName = "";
$statusMsg = '';
// File upload path
$targetDir = "./uploads/";
if(isset($_FILES["file"]["name"])) {
	$fileName = basename($_FILES["file"]["name"]);
}
echo $fileName;
// $fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
// echo $targetFilePath;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
echo $fileType;

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
// echo $statusMsg;
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>


<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>aloha</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
		// Get images from the database
		$query = $db->query("SELECT * FROM images ORDER BY uploaded_on ASC");

		if($query->num_rows > 0){
		    while($row = $query->fetch_assoc()){
		        $imageURL = $targetDir.$row["file_name"];
	?>
	    <img class="img-fluid" width="50px" height="50px" src="<?php echo $imageURL; ?>" alt="" />
	<?php }
	}else{ ?>
	    <p>No image(s) found...</p>
	<?php } ?>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>aloha</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
		// Get images from the database
		$query = $db->query("SELECT * FROM images ORDER BY uploaded_on ASC");

		if($query->num_rows > 0){
		    while($row = $query->fetch_assoc()){
		        $imageURL = $targetDir.$row["file_name"];
		        echo '<img class="img-fluid" width="50px" height="50px" src="'.$imageURL.'" alt="" />';	
		    }	
		} else { 
			echo '<p>No image(s) found...</p>'; 	
		}
	 ?>
</body>
</html>