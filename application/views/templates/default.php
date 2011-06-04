<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
<head>
	<title><?php echo $title; ?></title>
	<link href="/css/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
	<meta name="description" content="<?php echo $meta_description; ?>" />
	
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="/js/textu.js"></script>
</head>

<body>
<div id="wrapper">

	<div id="header">
		<a id="logo" href="/"><img src="/images/textu-logo.png" /></a>
		<h1><?php echo $seo_tagline; ?></h1>
	</div>

	<ul id="menu">
		<li <?php if ($current_page == "home") : 		  ?>id="current"<?php endif; ?>><a href="/">Send a Text</a></li>
		<li <?php if ($current_page == "freetexting") :   ?>id="current"<?php endif; ?>><a href="/page/freetexting/">Free SMS Guide</a></li>
		<li <?php if ($current_page == "textingapps") :   ?>id="current"<?php endif; ?>><a href="/page/textingapps/">Texting Apps</a></li>
		<li <?php if ($current_page == "blogs") : 		  ?>id="current"<?php endif; ?>><a href="/page/blogs/">Blog Widgets</a></li>
		<li <?php if ($current_page == "abbreviations") : ?>id="current"<?php endif; ?>><a href="/page/abbreviations/">WTF Txt Spk</a></li>
		<li <?php if ($current_page == "about") : 		  ?>id="current"<?php endif; ?>><a href="/page/about/">About</a></li>
	</ul>

	<div id="content" class="clearfix">
			
		<div id="main">
			<?php echo $content; ?>
		</div>
		
		<div id="sidebar">
			<script type="text/javascript"><!--
			google_ad_client = "pub-7462951817687855";
			/* TextU Sidebar NEW */
			google_ad_slot = "3225998139";
			google_ad_width = 336;
			google_ad_height = 280;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>			

			<h3>Also on TextU</h3>
		
			<ul>
				<li><a href="/page/freetexting/">How to Send Free SMS's</a></li>
				<li><a href="/page/textingapps/">Free Texting on iPhone &amp; Android</a></li>
				<li><a href="/page/blogs/">Blog Widgets for SMS</a></li>
				<li><a href="/page/abbreviations/">Texting Abbreviations</a></li>
			</ul>

		</div>
		
	
	</div>
	
	<div id="footer">
		<a href="/">Send a text message</a> |
		<a href="/contacts/block/">Block your number</a> |
		<a href="/page/partners/">Get a link</a> |
		<a href="/page/privacy/">Privacy policy</a>
	</div>	
</div>

<div id="post_footer">
	&copy; 2006-2011 TextU.org
</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-202716-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>