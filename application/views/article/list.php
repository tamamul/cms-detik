 <?php
$msg = $this->session->flashdata('success');
if (isset($msg)) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}
$failed = $this->session->flashdata('failed');
if (isset($failed)) {
	echo '<div class="alert alert-danger">';
	echo $this->session->flashdata('failed');
	echo '</div>';
}?>
 <a href="<?php echo base_url('article/add') ?>" class="btn btn-sm btn-success  ">
	<i class="fa fa-plus"></i>     Add Article</a>

 <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                <thead>

				<tr>
				<th>No</th>
				<th>Title</th>
				<th>Status</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>

			<?php $i = 0;?>

			<?php if(!empty($item)){ ?>
			<?php foreach ($item as $row => $value) {
	$i++;
	?>
			<tr class="gradeX">
			<td><?php echo $number + $i; ?></td>
			<td><?php echo $value['title'] ?></td>
			<td><?php echo $value['subtitle'] ?></td>
			<td><?php include('action.php') ?></td>
			<tr>
			<?php }?>
                </tbody>
																<tr>
																	<td colspan="8" class="footable-visible">
																	 <?php echo $pagination; ?>
																	</td>
																</tr>
															<?php } ?>

            </table>
        </div>


    