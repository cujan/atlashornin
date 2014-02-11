<?php //netteCache[01]000423a:2:{s:4:"time";s:21:"0.98151300 1392117511";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:108:"C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\FrontModule\templates\@layout.latte";i:2;i:1391976035;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\FrontModule\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'upzqysxc5e')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/netteForms.js"></script>
    <script type="text/javascript" src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/ajax.js"></script>
    <script type="text/javascript" src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery_hoverpulse.js"></script>
    <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/grido.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Internetový atlas hornín - Stredná odborná škola lesnícka</title>
<link href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/style.css" rel="stylesheet" type="text/css">

<!--[if lte IE 6]>
	<script type="text/javascript" src="supersleight-min.js"></script>
    <link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->


</head>

<body>
<script>
$(document).ready(function() {
    $('div.thumb img').hoverpulse({
        size: 100,  // number of pixels to pulse element (in each direction)
        speed: 400 // speed of the animation 
    });
});
</script>
    
<div id="main"><!-- Main starts here -->
<div id="header"><!-- Header starts here -->
	<!--<div class="searchBar">
        <div class="search">
        	<div class="txt"><input type="text" /></div>
            <div class="searchBt"><input type="button" value="search" /></div>
        </div>
    	<div class="signIn">Prihlásenie</div>
    <!--</div>-->
    <!--
    <div class="logo">
    	<a href="#"><img src="images/logoo.png" alt="" /></a>
    </div>
    -->
    <div class="menu">
    	<ul id="menu">
        	<li class="home"><a href="<?php echo htmlSpecialChars($_control->link("homepage:default")) ?>
">Domov</a></li>
		<li class="commit"><a href="<?php echo htmlSpecialChars($_control->link("hornina:default")) ?>
">Horniny</a></li>
		
            <!--<li class="organic"><a href="#">organic vegetables</a></li>
            <li class="contact"><a href="#">contact us</a></li>-->
    	</ul>
    </div>
     <!--<div class="subs">
    	<p>SUBCRIBE to RSS</p><img src="images/rss.png" alt="" />
    </div>-->
</div><!-- Header ends here -->

<div class="clear"></div>

<div id="contentTop"></div><!-- Content starts here -->
<div id="content">
	
	<div class="welcomeHolder">
    <div class="welcome">
    	<!--<img src="images/img01.jpg" alt="" />-->
		<h1>Internetový atlas hornín - Stredná odborná škola lesnícka</h1>
                 
	<p align="right"><!--<input type="button" value="VIEW OUR PACKAGES" class="view" />--></p> 
	
         <div class="clear"></div>
    </div>
    <div class="welcomeBottom"></div>
    </div>

    <div class="heading">&nbsp;</div>
    <div class="organic">
    	
    </div>
    
    <div class="space"></div>
    <!--zacnan obsah-->
     <div class="organic">
    	
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
        
        
    </div>
    <!--konci obsah-->
<div class="clear"></div>

<div class="hr"></div>
<div class="space"></div>
<div id="footer"><!-- Footer starts here -->

<div class="contactHeading">Kontakt</div>
<div class="footerHolder">
	<div class="footerLeft">
    	<p class="left">Adaresa:</p>
        <p class="right">Kollárova 10<br>Prešov</p>
    </div>
    
    <div class="footerRight">
    	<p class="left">Email: </p>
	    <p class="right"> holubjan@gmail.com</p>
    </div>
    <div class="clear"></div>
</div>
</div><!-- Footer ends here -->
</div>
<div id="contentBottom"></div><!-- Content ends here -->

<div class="bottomHolder">
<div class="copy">Copyright 2012</div>
<div class="design"><a href="www.slspo.sk">Powered by: Mgr. Holub Ján</a></div>
</div>
</div><!-- Main ends here -->
</body>
</html>
