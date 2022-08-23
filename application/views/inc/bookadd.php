
            <H2>Add Book</h2>
			<hr/>
			<?php 
                $msg = $this->session->flashdata('msg');
                if (isset($msg)) {
                    echo $msg;
                }
             ?>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>book/addBookForm" method="post">
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                  <!--   <input type="text" name="dep" class="form-control span12"> -->

                    <select name="dep" id="">
                        <option value="">Select One</option>
                        <?php 
                            foreach ($departmentdata as $ddata ) {
                               
                            
                         ?>
                        <option value="<?php echo $ddata->depid; ?>">  <?php echo $ddata->depname; ?>  </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Author</label>

                    <select name="author" id="">
                        <option value="">Select One</option>
                        <?php 
                            foreach ($authordata as $ddata ) {
                               
                            
                         ?>
                        <option value="<?php echo $ddata->autid; ?>">  <?php echo $ddata->autname; ?>  </option>
                        <?php } ?>
                    </select>

                </div>

                <div class="form-group">
                    <label>Stock Quantity</label>
                    <input type="text" name="stock" class="form-control span12">
                </div>
			
              
                <div class="form-group">
				<input type="submit" class="btn btn-primary"  value="Submit"> 
                </div>
                   
            </form>
        </div>			

