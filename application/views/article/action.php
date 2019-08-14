
	<a class="btn btn-sm btn-danger" title="Deleted" onclick="return confirm('Are you delete this article?')" href="<?php echo base_url() ?>article/delete/<?php echo $value['_id']; ?>"><i class="fas fa-trash"></i></a>
	<a class="btn btn-sm btn-warning" title="View" href="<?php echo base_url() ?>article/update/<?php echo $value['_id']; ?>"><i class="fas fa-eye"></i></a>

