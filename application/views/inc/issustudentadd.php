<script>
    $(document).ready(function(){
        $("#department").change(function(){
            var dep = $("#department").val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>manage/getBookByDepId/"+dep,
                success:function(data){
                    $("#book").html(data);
                }
            });
        });
    });
</script>
            <H2>Add Student Issu</h2>
			<hr/>
			<?php 
                $msg = $this->session->flashdata('msg');
                if (isset($msg)) {
                    echo $msg;
                }
             ?>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>manage/addIssuForm" method="post">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="studentname" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Student Registration</label>
                    <input type="text" name="studentreg" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                  <!--   <input type="text" name="dep" class="form-control span12"> -->

                    <select name="dep" id="department" class="selectbox">
                        <option value="">Select One</option>
                        <?php 
                            foreach ($departmentdata as $ddata ) {
                               
                            
                         ?>
                        <option value="<?php echo $ddata->depid; ?>">  <?php echo $ddata->depname; ?>  </option>
                        <?php } ?>
                    </select>


                </div>
                <div class="form-group">
                    <label>Book</label>

                     <select name="book" id="book" class="selectbox">
                     
                    </select>


                </div>

                <div class="form-group">
                    <label>Return Date</label>
                    <input type="date" name="return" class="form-control span12">
                </div>


              
                <div class="form-group">
				<input type="submit" class="btn btn-primary"  value="Submit"> 
                </div>
                   
            </form>
        </div>			

