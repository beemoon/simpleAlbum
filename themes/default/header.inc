<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html class=" csstransforms no-csstransforms3d csstransitions" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex,nofollow">
    
    <link rel="stylesheet" href="themes/default/css/style.css" type="text/css" media="all" >
    
    <!--script type='text/javascript' src='http://code.jquery.com/jquery-1.5.2.js'></script>
    <link rel="stylesheet" type="text/css" href="thirdspart/nicEdit/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="thirdspart/nicEdit/css/result-light.css"-->
  
<!-- Add jQuery library -->
    <script type="text/javascript" src="assets/js/jquery/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Nivo Slider pour bandeau -->
    <link rel="stylesheet" href="thirdspart/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="thirdspart/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
    <script type="text/javascript" src="thirdspart/nivo-slider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
	    pauseTime: 12000,
				
	});
    });
    </script>
    
    <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="thirdspart/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="thirdspart/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="thirdspart/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="thirdspart/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="thirdspart/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="thirdspart/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="thirdspart/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
        $(document).ready(function() {
            $(".various").fancybox({
                    fitToView	: false,
                    width	: 520,
                    height	: 600,
                    autoSize	: false,
                    closeClick	: false,
                    openEffect	: 'none',
                    closeEffect	: 'none',
                    modal       : true,
                    afterClose : function() {
			location.reload();
			return;
		    }
            });
	    $('.fancybox').fancybox();
        });
	</script>
    
    <!--Scroller vertical-->
    <script type="text/javascript" src="themes/default/js/jquery.simplyscroll.js"></script>
    <link rel="stylesheet" href="themes/default/css/jquery.simplyscroll.css" media="all" type="text/css">
    
    <script type="text/javascript" src="themes/default/js/jquery.jscrollpane.min.js"></script>
    <link rel="stylesheet" href="themes/default/css/jquery.jscrollpane.css" media="all" type="text/css">
    <link rel="stylesheet" href="themes/default/css/jquery.jscrollpane.lozenge.css" media="all" type="text/css">

    <script type="text/javascript" id="sourcecode">
    $(function()
    {
	 $(".scroller").simplyScroll({
			    customClass:'vert',
			    orientation:'vertical',
			    auto: false,
			    speed: 4			
		    });
	 
	$('.scroll-pane-split').jScrollPane(
	    {
	    showArrows: true,
	    verticalArrowPositions: 'split',
	    horizontalArrowPositions: 'split'
	    }
	);
    });
    </script>

</head>
<body id="theme-single">
<div id="pagewrap">
<div id="overlay"></div>
<div id="topbar">
<div class="pagewidth">
<ul id="sub-nav">
    <li>
    <a href=""></a>
    </li>
    <li>
    <a href=""></a>
    </li>
</ul>
</div>
</div>
<div id="header" class="pagewidth">
<ul id="nav">
    <li>
    <a href="index.php" class="ml-button-2">Accueil</a>
    </li>
    <li>
    <a href="newPost.htm" class="ml-button-2">Nouvel Album</a>
    </li>
    <li>
    <a href="about.php" class="ml-button-2">A propos</a>
    </li>
</ul>
</div>

<div id="content">
<div class="pagewidth clearfix">