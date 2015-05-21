<?php include("header.inc"); ?>

<h1>
<?php
$post=postContent($_GET['id']);
echo $post["Titre"];
?>
</h1>

<div class="col gu2 theme-screenshot">
    <p class="theme-large-screen">
	<div class="theme-screen">
	    <div class="scroll-pane-split2">
	    <?php
	    //setlocale(LC_ALL, 'fr-FR');
	    //setlocale(LC_ALL, 'french');
	    setlocale(LC_ALL, "fr_FR.UTF-8");
	    
	    $photos=explode(",",$post["Photos"]);
	    foreach ($photos as &$value) {
		echo '<div class="gallery-cat-item masonry-brick"><p>';
		
		if (pathinfo($value, PATHINFO_EXTENSION)=="flv") {
		    echo '<a class="fancybox" data-fancybox-group="gallery" href="thirdspart/jwplayer/player.swf?file=../../posts/'.$_GET["id"].$ds.$value.'"><img src="themes/default/img/video.jpg" alt="" height="100"></a>';
		} else {    
		    echo '<a class="fancybox" data-fancybox-group="gallery" href="posts/'.$_GET["id"].$ds.$value.'" title=""><img src="thirdspart/phpThumb/phpThumb.php?src=../../posts/'.$_GET["id"].$ds.$value.'&h=95" alt="" width="140" height="79"></a> ';
		}
		echo "</p></div>\n";
	    }
	    ?>
	    </div>
	</div>
    </p>
    
    <p>
	<small>
	    <em>Note: This theme is for me.</em>
	</small>
    </p>
</div>

<div class="col gu2a last">
    <div class="textEdit"><a class="various fancybox.iframe" href="assets/editor.php?file=posts/<?php echo $_GET["id"].$ds."infos".$ds."content.txt"; ?>"></a></div>
    <p class="clearfix"></p>
    <div class="scroller">
	<p style="padding-top: 8px;font-size: 16px; line-height: 22px;">
	    <?php
            echo $post["Content"];
            ?>
	</p>
    </div>
</div>


<?php include("footer.inc"); ?>