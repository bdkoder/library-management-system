
        <div class="main-content">
            <h2>Issu Student List</h2>
			<hr/>

       <?php 
                $msg = $this->session->flashdata('msg');
                if (isset($msg)) {
                    echo $msg;
                }
             ?>
<table class="table display" id="my">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Student Name</th>
      <th>Student Reg</th>
      <th>Dept Name</th>
      <th>Book Name</th>
      <th>Issu Date</th>
      <th>Return Date</th>
      <th>Action</th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  <tbody>

<?php 
$i = 0;

foreach ($issudata as $sdata) {
 $i++;

 ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->studentname; ?></td>
      <td><?php echo $sdata->studentreg; ?></td>
      <td>
        <?php 

            // echo $sdata->dep; 

              $depid = $sdata->dep; 
              $getdep = $this->dep_model->getDepartment($depid);
              

              if (isset($getdep)) {
                echo $getdep->depname;
              }

          ?>


      </td>
      <td>
        <?php 

            // echo $sdata->dep; 

              $bookid = $sdata->book; 
              $getbook = $this->book_model->getBook($bookid);
              

              if (isset($getbook)) {?>

              <a target="blank" href="<?php echo base_url(); ?>manage/viewbook/<?php echo $bookid; ?>"> <?php  echo $getbook->bookname; ?></a>

             <?php }?>
      </td>
      <td> <?php echo $sdata->date; ?></td>
      <td> <?php echo $sdata->return; ?></td>
      <td>
          <a href="#"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are You Sure To Delete Student');" href="<?php echo base_url(); ?>manage/delissudata/<?php echo $sdata->id; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
          ||
           <a target="_blank" href="<?php echo base_url(); ?>manage/ViewstudentDeails/<?php echo $sdata->studentreg; ?>" role="button" data-toggle="modal"><i class="fa fa-eye"></i></a>
      </td>
    </tr>

   
    <?php } ?>  
  </tbody>


</table>

<script>
$(document).ready( function () {
    $('#my').DataTable();
} );
</script>

<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Delete Confirmation</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete This?<br>This cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button class="btn btn-danger" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
 </div>
