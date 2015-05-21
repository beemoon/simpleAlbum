<html>
<head>
	<title></title>

    <link rel="stylesheet" href="../themes/default/css/style.css" type="text/css" media="all" >
</head>
<body>


<script src="../thirdspart/nicEdit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({
            fullPanel : true,
            maxHeight:510,
            width:520,
            iconsPath : '../thirdspart/nicEdit/nicEditorIcons.gif',
            }).panelInstance('postText');
	
});
</script>

<form id="post" action="saveEdit.php" method="post">
<textarea id="postText" name="postText" cols="60" style="width: 515px;">
<?php
    if (file_exists('../'.$_GET[file])) {
        if (pathinfo($_GET[file],PATHINFO_BASENAME)=="content.txt") {
            $post=parse_ini_file('../'.$_GET[file]);
            $text = $post["Content"];
            echo stripslashes($text);
            
        } else {
         $text = file_get_contents('../'.$_GET[file]);
         echo stripslashes($text);   
        }
    }
?>
</textarea>
<input type="hidden" id="file" name="file" value="<?php echo $_GET[file] ?>">
</form>

<div style="text-align: center">
<p></p>
<input type=submit id="submitEditor" name="submit" value="Save" onclick="nicEditors.findEditor('postText').saveContent();document.getElementById('post').submit();">
<input type=submit id="cancelEditor" name="cancel" value="Cancel" onclick="parent.$.fancybox.close();">
</div>



</body>
</html>