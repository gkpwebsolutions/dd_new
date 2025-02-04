<?php
/**
 * @package Helix_Ultimate_Framework
 * @author JoomShaper <support@joomshaper.com>
 * Copyright (c) 2010 - 2021 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined('_JEXEC') or die('Restricted Direct Access!');

use HelixUltimate\Framework\Core\HelixUltimate;
use HelixUltimate\Framework\Platform\Helper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

$app = Factory::getApplication();
$this->setHtml5(true);

/**
 * Load the framework bootstrap file for enabling the HelixUltimate\Framework namespacing.
 *
 * @since	2.0.0
 */
$bootstrap_path = JPATH_PLUGINS . '/system/helixultimate/bootstrap.php';

if (file_exists($bootstrap_path))
{
	require_once $bootstrap_path;
}
else
{
	die('Install and activate <a target="_blank" rel="noopener noreferrer" href="https://www.joomshaper.com/helix">Helix Ultimate Framework</a>.');
}

/**
 * Get the theme instance from Helix framework.
 *
 * @var		$theme		The theme object from the class HelixUltimate.
 * @since	1.0.0
 */
$theme = new HelixUltimate;
$template = Helper::loadTemplateData();
$this->params = $template->params;


/** Load needed data for javascript */
Helper::flushSettingsDataToJs();

$requestFromIframe = $app->input->get('helixMode', '') === 'edit';

// Coming Soon
if (!$requestFromIframe) 
{
	if (!\is_null($this->params->get('comingsoon', null)))
	{
		header("Location: " . Route::_(Uri::root(true) . "/index.php?templateStyle={$template->id}&tmpl=comingsoon", false));
		exit();
	}
}

$scssVars = $theme->getSCSSVariables();

$boxedLayout = $this->params->get('boxed_layout');

$containerMaxWidth = $this->params->get('container_max_width');

// Body Background Image
if ($boxedLayout && $this->params->get('body_bg_image'))
{
	$bg_image = $this->params->get('body_bg_image');
	$body_style = 'background-image: url(' . Uri::base(true) . '/' . $bg_image . ');';
	$body_style .= 'background-repeat: ' . $this->params->get('body_bg_repeat') . ';';
	$body_style .= 'background-size: ' . $this->params->get('body_bg_size') . ';';
	$body_style .= 'background-attachment: ' . $this->params->get('body_bg_attachment') . ';';
	$body_style .= 'background-position: ' . $this->params->get('body_bg_position') . ';';
	$body_style = 'body.site {' . $body_style . '}';
	$this->addStyledeclaration($body_style);
}

// Custom CSS
if ($custom_css = $this->params->get('custom_css'))
{
	$this->addStyledeclaration($custom_css);
}

$progress_bar_position = $this->params->get('reading_timeline_position');

if($app->input->get('view') === 'article' && $this->params->get('reading_time_progress', 0))
{
	$progress_style = 'position:fixed;';
	$progress_style .= 'z-index:9999;';
	$progress_style .= 'height:'.$this->params->get('reading_timeline_height').';';
	$progress_style .= 'background-color:'.$this->params->get('reading_timeline_bg').';';
	$progress_style .= $progress_bar_position == 'top' ? 'top:0;' : 'bottom:0;';
	$progress_style = '.sp-reading-progress-bar { '.$progress_style.' }';
	$this->addStyledeclaration($progress_style);
}

// Custom JS
if ($custom_js = $this->params->get('custom_js', null))
{
	$this->addScriptDeclaration($custom_js);
}
?>

<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<?php echo $theme->googleAnalytics(); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
		
		<?php

		$theme->head();
		$theme->loadFontAwesome();
		$theme->add_js('main.js');

		/**
		 * Add custom.js for user
		 */
		if (file_exists(JPATH_THEMES . '/' . $template->template . '/js/custom.js'))
		{
			$theme->add_js('custom.js');
		}

		$theme->add_scss('master', $scssVars, 'template');

		if($this->direction === 'rtl')
		{
			$theme->add_scss('rtl', $scssVars, 'rtl');
		}

		$theme->add_scss('presets', $scssVars, 'presets/' . $scssVars['preset']);

		$theme->add_scss('custom', $scssVars, 'custom-compiled');
		$theme->add_css('custom.css');

		
		if ($before_head = $this->params->get('before_head'))
		{
			echo $before_head . "\n";
		}
		?>
		<?php if (!empty($containerMaxWidth)) :?>
			<style>.container, .sppb-row-container { max-width: <?php echo $containerMaxWidth . 'px'; ?>; }</style>
		<?php endif; ?>
	</head>
	<body class="<?php echo $theme->bodyClass(); ?>">

		<?php if ($this->params->get('after_body', '')): ?>
			<?php echo $this->params->get('after_body') . "\n"; ?>
		<?php endif ?>

		<?php if($this->params->get('preloader')) : ?>
			<div class="sp-pre-loader">
				<?php echo $theme->getPreloader($this->params->get('loader_type', '')); ?>
			</div>
		<?php endif; ?>

		<div class="body-wrapper">
			<div class="body-innerwrapper">
				<?php echo $theme->getHeaderStyle(); ?>
				<?php $theme->render_layout(); ?>
			</div>
		</div>







		

		<!-- Off Canvas Menu -->
		<div class="offcanvas-overlay"></div>
		<!-- Rendering the offcanvas style -->
		<!-- If canvas style selected then render the style -->
		<!-- otherwise (for old templates) attach the offcanvas module position -->
		<?php if (!empty($this->params->get('offcanvas_style', '1-LeftAlign'))): ?>
			<?php echo $theme->getOffcanvasStyle(); ?>
		<?php else : ?>
			<div class="offcanvas-menu">
				<a href="#" class="close-offcanvas" aria-label="<?php echo Text::_('HELIX_ULTIMATE_CLOSE_OFFCANVAS_ARIA_LABEL'); ?>"><span class="fas fa-times" aria-hidden="true"></span></a>
				<div class="offcanvas-inner">
					<?php if ($this->countModules('offcanvas')) : ?>
						<jdoc:include type="modules" name="offcanvas" style="sp_xhtml" />
					<?php else: ?>
						<p class="alert alert-warning">
							<?php echo Text::_('HELIX_ULTIMATE_NO_MODULE_OFFCANVAS'); ?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		

		<?php $theme->after_body(); ?>

		<jdoc:include type="modules" name="debug" style="none" />

		<!-- Go to top -->
		<?php if ($this->params->get('goto_top', 0)) : ?>
			<a href="#" class="sp-scroll-up" aria-label="<?php echo Text::_('HELIX_ULTIMATE_SCROLL_UP_ARIA_LABEL'); ?>"><span class="fas fa-angle-up" aria-hidden="true"></span></a>
		<?php endif; ?>
		<?php if( $app->input->get('view') === 'article' && $this->params->get('reading_time_progress', 0) ): ?>
			<div data-position="<?php echo $progress_bar_position; ?>" class="sp-reading-progress-bar"></div>
		<?php endif; ?>



		<div class="bg-blue-600 text-white py-6 w-full">
    <div class="flex flex-col items-center px-4 mx-auto">
        <h2 class="text-lg font-bold flex items-center mb-2">
            <i class="fas fa-envelope mr-2"></i> 
            Subscribe to Our Newsletter
        </h2>
        <p class="text-sm mb-4 flex items-center">
            <i class="fas fa-info-circle mr-2"></i> 
            Stay in touch with us to get latest news and discount coupons:
        </p>
        <form action="" method="POST" class="flex items-center  justify-center">
            <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-2 w-full">
                <input type="email" name="email" placeholder="Enter your email" class="border border-gray-300 p-3 rounded w-full md:w-64" required>
                <button type="submit" class="bg-green-500 text-white px-8 py-2 rounded hover:bg-green-300 p-3 transition w-full md:w-64">
    Subscribe Now
</button>

            </div>
        </form>
    </div>
</div>

<div class="content bg-white w-full">
    <div class="container mx-auto text-left py-4 text-gray-800">
        <div class="flex flex-col md:flex-row justify-between mb-4">

            <div class="flex flex-col items-center mb-4 md:mb-0">
                <h2 class="text-lg font-bold flex items-center">
                <i class="fas fa-map-marker-alt" style="color: #03C03C; margin-right: 8px;"></i> Address
                </h2>
                <span class="text-center">86-C, Mugalaha, Near Royal Enfield Showroom, Medical College Road, Gorakhpur</span>
            </div>

            <div class="flex flex-col items-center mb-4 md:mb-0">
                <h2 class="text-lg font-bold flex items-center">
				<i class="fas fa-phone-alt" style="color: #03C03C; margin-right: 8px;" class="mr-2"></i> Call Us
                </h2>
                <span>+91-9140303398</span>
            </div>

            <div class="flex flex-col items-center">
                <h2 class="text-lg font-bold flex items-center">
				<i class="fas fa-envelope" style="color: #03C03C; margin-right: 8px;" class="mr-2"></i> Email Us
                </h2>
                <span>wecare@diagnodrugs.com</span>
            </div>
        </div>

        <div class="border-t border-gray-300 my-2"></div>

        <div class="flex flex-col md:flex-row justify-between items-start mb-4"> 
            <div class="flex-shrink-0 mb-4 md:mb-0 mr-4"> 
                <img class="w-32" src="images/logo.png" alt="Logo">
                <div class="text-left max-w-xs mb-4"> 
                    <p class="text-gray-600 text-sm">
                        Diagnodrugs Diagnostics is one of the upcoming clinical laboratories and diagnostic centers in Gorakhpur. 
                        We have plans to widen the network of laboratories in Kushinagar, Deoria, Mahrajganj, Khalilabad & Basti.
                    </p>
                    <a href="/index.php/about-us" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 mt-2 inline-block text-center">
                        Read More
                    </a>
                </div>
            </div>

            <div class="flex justify-center items-center flex-col text-center flex-grow mb-4 md:mb-0">
    <h2 class="text-lg font-bold mb-4">Useful Links</h2>
    <ul class="list-none space-y-4">
        <li class="flex items-center space-x-2">
            <i class="fas fa-flask" style="color: #03C03C;"></i> 
            <a href="/main/index.php?option=com_sppagebuilder&view=page&id=14" class="text-gray-800 hover:underline transition duration-200">Hematology</a>
        </li>
        <li class="flex items-center space-x-2">
            <i class="fas fa-vials" style="color: #03C03C;"></i> 
            <a href="/main/index.php?option=com_sppagebuilder&view=page&id=15" class="text-gray-800 hover:underline transition duration-200">Biochemistry</a>
        </li>
        <li class="flex items-center space-x-2">
            <i class="fas fa-pills" style="color: #03C03C;"></i> 
            <a href="/main/index.php?option=com_sppagebuilder&view=page&id=16" class="text-gray-800 hover:underline transition duration-200">Hormones Analysis</a>
        </li>
        <li class="flex items-center space-x-2">
            <i class="fas fa-flask" style="color: #03C03C;"></i> 
            <a href="/main/index.php?option=com_sppagebuilder&view=page&id=18" class="text-gray-800 hover:underline transition duration-200">Histopathology</a>
        </li>
    </ul>
</div>


            <div class="text-center">
                <h2 class="text-lg font-bold flex items-center justify-center">
				<i class="fas fa-clock mr-2" style="color: #03C03C;"></i> Opening Hours

                </h2>
                <p class="text-sm text-gray-800">We are open 24 hours a day, 7 days a week!</p>
            </div>
        </div>
    </div>
</div>

<div class="text-center py-4">
    <p class="text-sm text-gray-800">
        Copyright © <?php echo date("Y"); ?> DiagnoDrugs. All rights reserved. Powered by <a href="https://www.gkpwebsolutions.com/" class="text-blue-600 hover:underline">GKP Web Solutions.</a>
    </p>
</div>
</body>
</html>

