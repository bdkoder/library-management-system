
 <div class="main-content">
            <H2>Add Author</h2>
			<hr/>

			<?php 
                $msg = $this->session->flashdata('msg');
                if (isset($msg)) {
                    echo $msg;
                }
             ?>

        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>author/updateAuthor" method="post">

            <input type="hidden" name="autid" value="<?php echo $authorById->autid ?>">
                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="autname" value="<?php echo $authorById->autname ?>" class="form-control span12">
                </div>
           
                <div class="form-group">
				<input type="submit" class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>				
   </div>