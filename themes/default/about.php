<?php include("header.inc"); ?>
<h1>A propos</h1>

<div class="col gu2 theme-screenshot">
    <p class="theme-large-screen">
	<div class="theme-screen" style="padding-top: 0;">
	    <div class="textEdit" style="top: -150px;left:15px;">
		<a class="various fancybox.iframe" href="assets/editor.php?file=about.txt"></a>
	    </div>
	    <div class="scroll-pane-split2">      
		<?php
		    if (file_exists('about.txt')) {
			$text = file_get_contents('about.txt');
			echo stripslashes($text);
		    }
		?>
	    </div>
	    <span>&nbsp;</span>
	</div>
    </p>
    
    <p>
	<small>
	    <em>Note: This theme is for me.</em>
	</small>
    </p>
</div>

<div class="col gu2a last">
    <div class="textEdit"><a class="various fancybox.iframe" href="assets/editor.php?file=about2.txt"></a></div>
    <p class="clearfix"></p>
    <div class="scroller">
        <p style="padding-top: 8px;">
	    <?php
		if (file_exists('about2.txt')) {
		    $text = file_get_contents('about2.txt');
		    echo stripslashes($text);
		}
	    ?>
	</p>
    </div>
</div>

<?php include("footer.inc"); ?>
