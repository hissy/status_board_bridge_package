<?php	
defined('C5_EXECUTE') or die("Access Denied.");
$sbbh = Loader::helper('status_board_bridge','status_board_bridge');
if( ! $sbbh->varidateAuth('statistics_registrations') )
	exit;


Loader::model('user_statistics');
$labels = array();
$dates = array();
for ($i = -4; $i < 1; $i++) {
	$date = date('Y-m-d', strtotime($i . ' days'));
	if ($i == 0) {
		$label = t('Today');
	} else { 
		$label = date('D', strtotime($i . ' days'));
	}
	$labels[] = $label;
	$dates[] = $date;
}

$registrationsArray = array();
foreach($dates as $i => $date) { 
	$total = UserStatistics::getTotalRegistrationsForDay($date);
	$registrationsArray[] = array(
		'title' => $labels[$i],
		'value' => $total
	);
}


//Send response
$json = Loader::helper('status_board_json','status_board_bridge');
$json->setTitle(SITE);
$json->addDatasequence(t('Recent Registrations'),$registrationsArray);
echo $json->encode();

exit;
