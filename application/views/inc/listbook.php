
        <div class="main-content">
            <h2>Book List</h2>
      <hr/>

       <?php 
                $msg = $this->session->flashdata('msg');
                if (isset($msg)) {
                    echo $msg;
                }
             ?>
<table class="table">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Book Name</th>
      <th>Department</th>
      <th>Author</th>
      <th>Stock</th>
      <th>Action</th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  <tbody>


<?php 
$i = 0;

foreach ($bookdata as $sdata) {
 $i++;

 ?>


    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->bookname; ?></td>

      <td><?php 

            // echo $sdata->dep; 

              $depid = $sdata->dep; 
              $getdep = $this->dep_model->getDepartment($depid);
              

              if (isset($getdep)) {
                echo $getdep->depname;
              }

          ?>
      </td>

      <td><?php //echo $sdata->author; 

               $autid = $sdata->author; 
             $getauthor = $this->author_model->getAuthor($autid);

              if (isset($getauthor)) {
                echo $getauthor->autname;
              }


          


      ?></td>
      
      <td><?php echo $sdata->stock; ?></td>

      <td>
          <a href="<?php echo base_url(); ?>book/editbook/<?php echo $sdata->bookid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are You Sure To Delete Student');" href="<?php echo base_url(); ?>book/delbook/<?php echo $sdata->bookid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php } ?>  
  </tbody>
</table>


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
