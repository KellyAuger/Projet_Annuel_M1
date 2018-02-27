<?php
/**
 * @copyright	Copyright (C) 2012 Cedric KEIFLIN alias ced1870
 * http://www.joomlack.fr - http://www.template-creator.com
 * @license		GNU/GPL
 * */

defined('_JEXEC') or die;
$app = JFactory::getApplication();
if ($this->params->get('compileLess', 0)) {
	if (!class_exists('lessc')) {
		require_once dirname(__FILE__).'/less/lessc.inc.php';
	}
	$less = new lessc;
	$less->compileFile("templates/".$this->template."/less/template.less", "templates/".$this->template."/css/template.css");
}
JHtml::_('bootstrap.framework');
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);
$fluid = $this->params->get('sitefluide', '0') ? '-fluid' : '';
$nbmodulesrow1 = (bool)$this->countModules('position-8') + (bool)$this->countModules('position-9') + (bool)$this->countModules('position-10') + (bool)$this->countModules('position-11');
$spanrow1 = ($nbmodulesrow1 != 0) ? 12/$nbmodulesrow1 : 0;
$nbmodulesrow2 = (bool)$this->countModules('position-12') + (bool)$this->countModules('position-13') + (bool)$this->countModules('position-14') + (bool)$this->countModules('position-15');
$spanrow2 = ($nbmodulesrow2 != 0) ? 12/$nbmodulesrow2 : 0;
$nbmodulesrow3 = (bool)$this->countModules('position-16') + (bool)$this->countModules('position-17') + (bool)$this->countModules('position-18') + (bool)$this->countModules('position-19');
$spanrow3 = ($nbmodulesrow3 != 0) ? 12/$nbmodulesrow3 : 0;
if ($this->countModules('position-7') && $this->countModules('position-6'))
{
	$spancenter = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-6'))
{
	$spancenter = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-6'))
{
	$spancenter = "span9";
}
else
{
	$spancenter = "span12";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/custom.css" type="text/css" />
	<style type="text/css">
		body
		{
			background-color: <?php echo $this->params->get('templateBackgroundColor');?>
		}
	</style>
</head>
<body>
	<div class="container<?php echo $fluid ?>">
		<?php if ($this->countModules('position-1')): ?>
		<div id="nav" class="row-fluid">
			<jdoc:include type="modules" name="position-1" style="none" />
		</div>
		<?php endif; ?>
		<div id="header" class="row<?php echo $fluid ?>">
			<a id="logo" class="span6" href="<?php echo $this->baseurl; ?>">
			<img src="<?php echo JURI::root() ?>templates/<?php echo $this->template ?>/images/logo.png" alt="<?php echo $app->getCfg('sitename') ?>" /> <?php if ($this->params->get('sitedescription')) { echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>'; } ?>
			</a>
			<div id="headermodule" class="pull-right">
			<jdoc:include type="modules" name="position-0" style="none" />
			</div>
		</div>
		<div id="maincontent">
			<jdoc:include type="modules" name="position-3" style="xhtml" />
			<?php if ($nbmodulesrow1): ?>
			<div id="row1modules" class="row<?php echo $fluid ?>">
				<?php if ($this->countModules('position-8')) : ?>
				<div class="span<?php echo $spanrow1 ?>">
					<jdoc:include type="modules" name="position-8" style="perso" />
				</div>
				<?php endif; ?>
				<?php if ($this->countModules('position-9')) : ?>
				<div class="span<?php echo $spanrow1 ?>">
					<jdoc:include type="modules" name="position-9" style="perso" />
				</div>
				<?php endif; ?>
				<?php if ($this->countModules('position-10')) : ?>
				<div class="span<?php echo $spanrow1 ?>">
					<jdoc:include type="modules" name="position-10" style="perso" />
				</div>
				<?php endif; ?>
				<?php if ($this->countModules('position-11')) : ?>
				<div class="span<?php echo $spanrow1 ?>">
					<jdoc:include type="modules" name="position-11" style="perso" />
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div id="main" class="row<?php echo $fluid ?>">
				<?php if ($this->countModules('position-7')): ?>
				<div id="left" class="span3">
					<div class="inner">
						<jdoc:include type="modules" name="position-7" style="xhtml" />
					</div>
				</div>
				<?php endif; ?>
				<div id="center" class="<?php echo $spancenter ?>">
					<div class="inner">
						<jdoc:include type="modules" name="position-5" style="xhtml" />
						<jdoc:include type="message" />
						<jdoc:include type="component" />
						<jdoc:include type="modules" name="position-2" style="xhtml" />
					</div>
				</div>
				<?php if ($this->countModules('position-6')) : ?>
				<div id="right" class="span3">
					<div class="inner">
						<jdoc:include type="modules" name="position-6" style="xhtml" />
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php if ($nbmodulesrow2): ?>
			<div id="row2modules" class="row<?php echo $fluid ?>">
			   <?php if ($this->countModules('position-12')) : ?>
			   <div class="span<?php echo $spanrow2 ?>">
					   <jdoc:include type="modules" name="position-12" style="perso" />
			   </div>
			   <?php endif; ?>
			   <?php if ($this->countModules('position-13')) : ?>
			   <div class="span<?php echo $spanrow2 ?>">
					   <jdoc:include type="modules" name="position-13" style="perso" />
			   </div>
			   <?php endif; ?>
			   <?php if ($this->countModules('position-14')) : ?>
			   <div class="span<?php echo $spanrow2 ?>">
					   <jdoc:include type="modules" name="position-14" style="perso" />
			   </div>
			   <?php endif; ?>
			   <?php if ($this->countModules('position-15')) : ?>
			   <div class="span<?php echo $spanrow2 ?>">
					   <jdoc:include type="modules" name="position-15" style="perso" />
			   </div>
			   <?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div id="body2">
		<div class="container<?php echo $fluid ?>">
			<?php if ($nbmodulesrow3): ?>
			<div id="row3modules" class="row<?php echo $fluid ?>">
			   <?php if ($this->countModules('position-16')) : ?>
			   <div class="span<?php echo $spanrow3 ?>">
					<jdoc:include type="modules" name="position-16" style="xhtml" />
			   </div>
			   <?php endif; ?>
			   <?php if ($this->countModules('position-17')) : ?>
			   <div class="span<?php echo $spanrow3 ?>">
					<jdoc:include type="modules" name="position-17" style="xhtml" />
			   </div>
			   <?php endif; ?>
			   <?php if ($this->countModules('position-18')) : ?>
			   <div class="span<?php echo $spanrow3 ?>">
					<jdoc:include type="modules" name="position-18" style="xhtml" />
			   </div>
			   <?php endif; ?>
			   <?php if ($this->countModules('position-19')) : ?>
			   <div class="span<?php echo $spanrow3 ?>">
					<jdoc:include type="modules" name="position-19" style="xhtml" />
			   </div>
			   <?php endif; ?>
			</div>
			<?php endif; ?>
			<div id="footer" class="row<?php echo $fluid ?>">
				<jdoc:include type="modules" name="position-4" style="none" />
			</div>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
