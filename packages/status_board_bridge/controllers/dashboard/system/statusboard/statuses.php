<?php	
defined('C5_EXECUTE') or die("Access Denied.");

class DashboardSystemStatusboardStatusesController extends DashboardBaseController {
	
	public function view() {
		$sbgh = Loader::helper('status_board_bridge','status_board_bridge');
		$bridges = $sbgh->getBridges();
		$this->set('bridges', $bridges);
	}
		
}