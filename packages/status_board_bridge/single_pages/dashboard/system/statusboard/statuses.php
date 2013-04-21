<?php	defined('C5_EXECUTE') or die("Access Denied.");?>

<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Available Statuses'), false, 'span12', false)?>

<div class="ccm-pane-body">
<?php
$sbgh = Loader::helper('status_board_bridge','status_board_bridge');
if($bridges){
	?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><?php echo t('Status Bridge File'); ?></th>
				<th><?php echo t('Access URL'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach($bridges as $bridge){
			?>
			<tr>
				<td><?php echo $bridge; ?></td>
				<td><?php echo BASE_URL . DIR_REL . '/' . DISPATCHER_FILENAME . '/' . DIRNAME_TOOLS . '/packages/status_board_bridge/statusboard/' . $bridge . '/?auth=' . $sbgh->generateAuth($bridge); ?></td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>
	<?php
}
?>
</div>

<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false);?> 