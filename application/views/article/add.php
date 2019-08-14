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
<form method="POST" action="<?php echo base_url('article/add') ?>" class="form-horizontal">
     <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10"><input type="text" required name="title" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label">Subtitle</label>
        <div class="col-sm-10"><input type="text" required name="subtitle" class="form-control"></div>
    </div>


<div class="form-group">
            <label class="col-sm-2 control-label">Summary</label>           
                <div class="col-sm-10">
                            <textarea class="summernote" name="summary" required></textarea>
                </div>
            </div>
    <div class="form-group">
			<label class="col-sm-2 control-label">Content</label>			
                <div class="col-sm-10">
							<textarea class="summernote" required name="detail"></textarea>
                </div>
            </div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Multi select</label>
                <div class="col-sm-10">
                <select data-placeholder="Choose Topic" required name="author[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                <option>Select</option>
                	<option value="<?php echo 'putra' ?>"><?php echo 'putra' ?></option>
                    <option value="<?php echo 'langit' ?>"><?php echo 'langit' ?></option>
                    <option value="<?php echo 'senja' ?>"><?php echo 'senja' ?></option>
                    <option value="<?php echo 'ambar' ?>"><?php echo 'ambar' ?></option>
            </select>
        </div>
        </div>

       
                        

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-sm btn-primary" name="submit" type="submit">Save</button>
    </div>
</div>
</form>