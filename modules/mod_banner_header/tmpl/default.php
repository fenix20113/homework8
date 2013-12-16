<?php // no direct access

defined('_JEXEC') or die('Restricted access'); ?>

<?php

//////////// rest color function




$i = 0;
$numr=count($images);
$texto='cantidad='.$numr.'&carpeta='.$params->get('folder').'&orientacion='.$params->get('orientacion').'&escala='.$params->get('escala').'&link='.$params->get('link').'&timeback='.$params->get('timeback').'&speed='.$params->get('speed').'&columns='.$params->get('columns').'&rows='.$params->get('rows').'&border='.$params->get('border1').'&round='.$params->get('round').'&speed2='.$params->get('speed2').'&type='.$params->get('type').'&music='.$params->get('music').'&color1='.$params->get('color1').'&text1='.$params->get('text1').'&text2='.$params->get('text2').'&text3='.$params->get('text3').'&text4='.$params->get('text4').'&text5='.$params->get('text5').'&color2='.'000000'.'&text6='.$params->get('text6').'&color3='.$params->get('color3').'&target='.$params->get('target').'&text7='.$params->get('text7').'&controls='.$params->get('controls').'&round2='.$params->get('round2');


$conta=0;
$imagesc=split("\n", $params->get('titles'));



$link1=str_replace("&", "a1s2t3eriso", $params->get('link'));
$links=split("\n", $link1);
sort($images);
			foreach ($images as $img)
			{

					$auxilink="";
					$auxititle="";
					if(isset($links[$conta])) $auxititle=$links[$conta];
					if(isset($imagesc[$conta])) $auxilink=$imagesc[$conta];
					
					$texto.='&imagen'.$conta.'='.JURI::base().$params->get('folder').''.$img->name.'&title'.$conta.'='.$auxilink.'&link'.$conta.'='.$auxititle;
				
					$conta++;

			}


?>


		<style type="text/css">

			.movie<?php echo $module->id; ?> {
				width: <?php echo $params->get('width'); ?>;
				height: <?php echo $params->get('height'); ?>;
			}
			div.movie<?php echo $module->id; ?> {
				width: <?php echo $params->get('width'); ?>;
				height: <?php echo $params->get('height'); ?>;
				
				border: <?php echo $params->get('border'); ?>px solid #<?php echo $params->get('bordercolor'); ?>;

			}
		</style>
<div class="movie<?php echo $module->id; ?>">
<!-- IE (et. al) Object -->
<object  id="mod_banner_headerie<?php echo $module->id; ?>" class="movie<?php echo $module->id; ?>"
	classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
	codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0">
	<param name="flashvars" value="<?php
	
	echo $texto;
	
	
	?>" />
	<param name="movie" value="<?php echo JURI::base(); echo 'modules/mod_banner_header/tmpl/'; ?>mod_banner_header.swf" />
	<param name="quality" value="high" />
<param name="scale" value="exactfit" />
	<param name="bgcolor" value="#<?php echo $params->get('background'); ?>" />
	
		<!--[if !IE]>-->

		<!-- Firefox (et. al) Object -->
		<object class="movie<?php echo $module->id; ?>" id="mod_banner_headerff<?php echo $module->id; ?>"
			type="application/x-shockwave-flash"
			data="<?php echo JURI::base(); echo 'modules/mod_banner_header/tmpl/'; ?>mod_banner_header.swf">
			
			<param name="scale" value="exactfit" />
			<param name="movie" value="<?php echo JURI::base(); echo 'modules/mod_banner_header/tmpl/'; ?>mod_banner_header.swf" />

			<param name="flashvars" value="<?php
	
	echo $texto;
	
	
	?>" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#<?php echo $params->get('background'); ?>" />
			<param name="pluginurl" value="http://www.macromedia.com/go/getflashplayer"/>
			
				<!-- No plugin -->
				<p>This page require <a href="http://www.adobe.com/">Adobe Flash 9.0</a> (or higher) plug in.</p>

		</object>
		
		<!--<![endif]-->
</object>
</div>