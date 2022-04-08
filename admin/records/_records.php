<div class="container">
  <table class="table bg-white border border-top-0" style="font-size: 13px;">
    <h4 class="fw-normal heading_color">Records</h4>

    <thead class="bg-white">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Images</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody class="text-secondary bg-light">

      <?php
      $sql = "SELECT * FROM `records` ORDER BY  `RecordID` DESC";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $RecordID  = $row['RecordID'];
        $title = $row['title'];
        $description = $row['description'];
        $dlt_url = $root_url.'/admin/records/_config.php?RecordID=' . $RecordID;
        $update_url = $root_url.'/admin/records/update.php?p=' . $RecordID;
        $upload_image = $root_url.'/admin/records/upload.php?p=' . $RecordID;

        echo '
            <tr>
                <td>
                ' . $title . '
                </td>
                <td>
                ' . $description . '
                </td>
                <td>
                <a class="pointer "  onclick="redirectTo(`' . $upload_image . '`)" >view images</a>

                </td>

  

                <td class="d-flex ">
                  <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded"  onclick="redirectTo(`' . $update_url . '`)" ><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                  <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $dlt_url . '`)"  ><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                </td>
            </tr>

                ';
      }

      $action_url = $root_url."/admin/records/_config.php";


      ?>


    </tbody>
  </table>


  <div class="row justify-content-center g-3 my-2 ">
    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">



      <h3 class="heading_color mb-4">Add New Records</h3>

      <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
        <div class="form-group">
          <label for="newTitle">Enter title</label>
          <input type="text" class="form-control _form_data" id="newTitle" name="newTitle" placeholder=" " required>
        </div>
        <div class="form-group my-2">
          <label for="address">Description</label>
          <textarea class="form-control _form_data" id="description" name="description" placeholder=" " rows="3"></textarea>
        </div>


        <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Add Records</button>
      </form>

    </div>
  </div>
</div>