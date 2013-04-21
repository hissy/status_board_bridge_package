<?php
defined('C5_EXECUTE') or die("Access Denied.");

class StatusBoardBridgeHelper {
	
	public function checkAuth($hash, $handle = '') {
		$auth = $this->generateAuth($handle);
		return $auth == $hash;
	}
	
	public function generateAuth($handle = '') {
		$val = PASSWORD_SALT . ':' . $handle;
		return md5($val);
	}
	
	public function varidateAuth($handle = '') {
		$hash = $_REQUEST['auth'];
		$result = $this->checkAuth($hash, $handle);
		return $result;
	}
	
	public function getBridgeLocation() {
		$locaiton = DIR_PACKAGES . '/status_board_bridge/tools/statusboard';
		return $locaiton;
	}
	
	public function getBridges() {
		$list = array();
		$location = $this->getBridgeLocation();
		if (is_dir($location)) {
			if ($dh = opendir($location)) {
				while (($file = readdir($dh)) !== false) {
					if( substr($file,strlen($file)-4)=='.php' ) {
						$list[] = substr($file,0,strlen($file)-4);
					}
				}
			}
		}
		return $list;
	}
	
}