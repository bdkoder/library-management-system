
            <H2>Edit Book</h2>
			<hr/>
		  <?php 
                $msg = $this->session->flashdata('msg');
                if (isset($msg)) {
                    echo $msg;
                }
             ?>

        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>book/updatebook" method="post">

              <input type="hidden" name="bookid" value="<?php echo $bookById->bookid ?>" >

                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" value="<?php echo $bookById->bookname ?>" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Department Name</label>
                  

                  <select name="dep" id="">
                        <option value="">Select One</option>
                        <?php 
                            foreach ($departmentdata as $ddata ) {
                                // Select Obosta Korar Jonno
                                if ($bookById->dep ==$ddata->depid) {
                                    ?>
                                    <option value="<?php echo $ddata->depid; ?>" selected="selected"> 
                                    <?php echo $ddata->depname; ?>  
                                    </option>

                        <?php } ?>
                                                       
                         ?>
                        <option value="<?php echo $ddata->depid; ?>">  <?php echo $ddata->depname; ?>  </option>
                        <?php } ?>
                    </select>

                </div>



                <div class="form-group">
                    <label>Author Name</label>
                  

                  <select name="author" id="">
                        <option value="">Select One</option>
                        <?php 
                            foreach ($authordata as $ddata ) {
                                // Select Obosta Korar Jonno
                                if ($bookById->author == $ddata->autid) {
                                    ?>
                                    <option value="<?php echo $ddata->autid; ?>" selected="selected"> 
                                    <?php echo $ddata->autname; ?>  
                                    </option>

                        <?php } ?>
                                
                               
                            
                         ?>
                        <option value="<?php echo $ddata->autid; ?>">  <?php echo $ddata->autname; ?>  </option>
                        <?php } ?>
                    </select>



                </div>
                
				<div class="form-group">
                    <label>Book Stock</label>
                    <input type="text" name="stock" value="<?php echo $bookById->stock ?>" class="form-control span12">
                </div>
              
                <div class="form-group">
				<input type="submit" class="btn btn-primary"  value="Update"> 
                </div>
                   
            </form>
        </div>			

