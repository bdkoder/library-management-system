
            <H2>View Student Details</h2>
			<hr/>
			
        <div class="panel-body" style="width:600px;">
           
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" value=" <?php echo $issuStudentdata->name; ?>" class="form-control span12">
                   
                </div>
                <div class="form-group">
                    <label>Department</label>

                    <?php 

            // echo $sdata->dep; 

              $depid = $issuStudentdata->dep; 
              $getdep = $this->dep_model->getDepartment($depid);

              if (isset($getdep)) {

                ?>

                <input type="text" name="dep" value="<?php  echo $getdep->depname; ?>" class="form-control span12">
               
             <?php }?>
                  
                    
                   
                </div>
                <div class="form-group">
                    <label>Roll No.</label>
                    <input type="text" name="roll" value="<?php echo $issuStudentdata->roll; ?>" class="form-control span12">
                      
                </div>
				<div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="reg" value=" <?php echo $issuStudentdata->reg; ?>" class="form-control span12">
                     
                </div><div class="form-group">
                    <label>Phone No.</label>
                    <input type="text" name="reg" value=" <?php echo $issuStudentdata->phone; ?>" class="form-control span12">
                     
                </div>

              
               
         
        </div>			

