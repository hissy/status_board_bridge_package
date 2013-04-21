<?php
defined('C5_EXECUTE') or die("Access Denied.");

class DashboardSystemStatusboardController extends DashboardBaseController {

	public function view() {
		$this->redirect('/dashboard/system/statusboard/settings');
	}
}