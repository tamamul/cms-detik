<?php
if(isset($status)):
    echo '<div class="alert alert-danger">';
    echo 'Failed to save';
    echo '</div>';
endif;
if(isset($validation)):
    echo '<div class="alert alert-danger">';
    echo validation_errors();
    echo '</div>';
endif;
?>
<form method="POST" action="<?php echo base_url('article/update') ?>" class="form-horizontal">
     <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10"><input type="text" required name="title" value="<?php echo $item['response']['title'] ?> " class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label">Subtitle</label>
        <div class="col-sm-10"><input type="text" required name="subtitle" value="<?php echo $item['response']['subtitle'] ?>" class="form-control"></div>
    </div>

<input type="hidden"  name="articleid" value="<?php echo $item['response']['_id'] ?>" class="form-control">

<div class="form-group">
            <label class="col-sm-2 control-label">Summary</label>           
                <div class="col-sm-10">
                            <textarea class="summernote" name="summary" required><?php echo $item['response']['summary'] ?></textarea>
                </div>
            </div>
    <div class="form-group">
			<label class="col-sm-2 control-label">Content</label>			
                <div class="col-sm-10">
							<textarea class="summernote" required name="detail"><?php echo $item['response']['detail'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Author</label>           
                <div class="col-sm-10">
                    <?php foreach ($item['response']['author'] as $key => $value) {?>
                        <a class="btn btn-sm btn-warning remove" title="view" href="<?php echo base_url() ?>author/remove/<?php echo $item['response']['_id'] ?>/<?php echo $value['_id']; ?>"><?php echo $value['name'] ?></a>
                   <?php } ?>
                </div>
            </div>

<?php
    foreach ($item['response']['author'] as $key => $value) {
        $newData[]=trim($value['name']);

     } 


 
                    ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Multi select</label>
                <div class="col-sm-10">
                <select data-placeholder="Choose Author"  name="author[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                <option>Select</option>
                    <?php 
                    if(!in_array('putra',$newData)):?>
                        <option  value="<?php echo 'putra' ?> "><?php echo 'putra' ?></option>
                    <?php 
                    endif;?>
                    <?php
                    if(!in_array('langit',$newData)):?>
                        <option value="<?php echo 'langit' ?> "><?php echo 'langit' ?></option>
                    <?php endif; ?>
                    <?php
                    if(!in_array('senja',$newData)):?>
                        <option value="<?php echo 'senja' ?> "><?php echo 'senja' ?></option>
                    <?php endif; ?>
                    <?php
                    if(!in_array('ambar',$newData)):?>
                        <option value="<?php echo 'ambar' ?> "><?php echo 'ambar' ?></option>
                    <?php endif; ?>
            </select>
        </div>
        </div>

<script type="text/javascript">
    $('select').on('change', function() {
    var id = <?php echo $item['response']['_id'] ?>;
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
     $.ajax({
     url: "<?php echo base_url('author/add') ?>",
     data: {article_id:id,authorName:this.value,csrfName:csrfHash},
     method : 'POST',
     success: function(msg){
      location.reload();
     }
 });
});
</script>

       
                        

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-sm btn-primary" name="submit" type="submit">Save</button>
    </div>
</div>
</form>