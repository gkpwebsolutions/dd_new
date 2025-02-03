<?php

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');


class ItemlistController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false){
		
	$app  = JFactory::getApplication();
		
		$input = $app->input;
        $view = $input->getCmd('view', 'Listing');
		$app->input->set('view', $view);

		parent::display($cachable, $urlparams);

		return $this;
	}


	

	

}
