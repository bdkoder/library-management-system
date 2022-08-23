
            <H2>View Book Details</h2>
			<hr/>
			
        <div class="panel-body" style="width:600px;">
           
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="name" value=" <?php echo $bookById->bookname; ?>" class="form-control span12">
                   
                </div>
                <div class="form-group">
                    <label>Department</label>

                    <?php 

            // echo $sdata->dep; 

              $depid = $bookById->dep; 
              $getdep = $this->dep_model->getDepartment($depid);

              if (isset($getdep)) {

                ?>

                <input type="text" name="dep" value="<?php  echo $getdep->depname; ?>" class="form-control span12">
               
             <?php }?>
                  
                    
                   
                </div>
                <div class="form-group">
                    <label>Auhor Name</label>
                    <!-- <input type="text" name="roll" value="<?php //echo $bookById->author; ?>" class="form-control span12"> -->
                    <?php 

           $autid = $bookById->author; 
              $getaut = $this->author_model->getauthorById($autid);

              if (isset($getaut)) {
                ?>


                    <input type="text" name="roll" value="<?php  echo  $getaut->autname; ?>" class="form-control span12">

                    
                      <?php }?>
                </div>
				<div class="form-group">
                    <label>Stock Book</label>
                    <input type="text" name="reg" value=" <?php echo $bookById->stock; ?>" class="form-control span12">
                     
                </div>

              
               
         
        </div>			

