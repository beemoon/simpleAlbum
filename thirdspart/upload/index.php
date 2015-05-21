<html>
 
<head>   
 
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />

<script src="dropzone.js"></script>
 <script type="text/javascript">
 
  Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFiles:3,
  maxFilesize: 5, // MB
  //resizedWidth:1024,
  //resizedHeight:768,
  url:'upload.php',  
 };


    
 </script>
</head>
 
<body>

<form class="dropzone" id="my-awesome-dropzone">
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>

   
</body>
 
</html>