<?php include("header.inc"); ?>

<h1>Notre maison...</h1>

<div class="col gu2 theme-screenshot">
    <p class="theme-large-screen">
	<div class="theme-screen">
	    <div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider">
		    <?php
		    foreach ($bandeauPhotos as &$value) {
			echo '<img src="thirdspart/phpThumb/phpThumb.php?src=../../'.$value.'&fltr[]=size|618|246|1" data-thumb="'.$value.'" alt="" />'."\n";
		    }
		    ?>   
		</div>
	    </div>
	    
	    <div class="scroll-pane-split">
	    <?php
	    //setlocale(LC_ALL, 'fr-FR');
	    //setlocale(LC_ALL, 'french');
	    setlocale(LC_ALL, "fr_FR.UTF-8");
    
	    foreach ($allPost as &$value) {
		$post=postContent($value);
		$Date = strftime('%d  %B  %Y',strtotime(basename($value)));
	    
		echo '<div class="gallery-cat-item masonry-brick">
			<a href="viewPost.php?id='.$value.'" title="'.$Date.'">
			<img src="thirdspart/phpThumb/phpThumb.php?src=../../posts/'.$value.'/infos/thumb.jpg&w=140" alt="" width="140" height="79">
			</a>
			<h2><a href="" title="'.$Date.'"><span>'.$post["Titre"].'</span></a></h2>
			<div class="post-date">'.$Date.'</div><!-- END gallery-cat-item-description-->
		      </div>';
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
    <div class="textEdit"><a class="various fancybox.iframe" href="assets/editor.php?file=welcome.txt"></a></div>
    <p class="clearfix"></p>
    <div class="scroller">
	<p>
	<?php
	    if (file_exists('welcome.txt')) {
		include('welcome.txt');
	    }
	?>
	</p>
    </div>
</div>

<?php include("footer.inc"); ?>