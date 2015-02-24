<?php
/* File Analytics controller
   Craig Lyons, EIS, 2015
   Handles requests to PDFs as re-routed by .htaccess; if file exists, renders template w/ requested filename data
*/

class FileAnalytics_Controller extends Page_Controller
{
	private static $allowed_actions = array();

	public function init()
	{
		parent::init();
		Requirements::javascript('silverstripe-file-analytics/javascript/fileAnalytics.js');
		Requirements::css('silverstripe-file-analytics/css/fileAnalytics.css');
	}

	public function index()
	{
		$seg = $this->request->getVar('seg');
		if(!$seg || trim($seg) == '') {
			return $this->httpError(404);
		}

		$fullpath = Director::baseFolder().'/'.$seg;
		if(!is_readable($fullpath)) {
			return $this->httpError(404);
		}
		return $this->renderWith(
			array('FileAnalyticsPage', 'Page'),
			array('Filename' => $seg)
		);
	}
}