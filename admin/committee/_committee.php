<div class="container">
  <table class="table bg-white border border-top-0" style="font-size: 13px;">
    <h4 class="fw-normal heading_color">Committee List</h4>

    <thead class="bg-white">
      <tr>
        <th scope="col">Session</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody class="text-secondary bg-light">

      <?php
      $sql = "SELECT * FROM `committee` ORDER BY  `session` DESC";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $CommitteeID  = $row['CommitteeID'];
        $session = $row['session'];
        $committee_dlt = '/NEUBSSC/admin/committee/_config.php?CommitteeID=' . $CommitteeID;
        $update_url = '/NEUBSSC/admin/committee/update.php?p=' . $CommitteeID;
        $team_url = '/NEUBSSC/admin/team/?p=' . $CommitteeID;


        echo '
            <tr>
                <td>
                <a class="text-decoration-none text-bold pointer"  onclick="redirectTo(`' . $team_url . '`)"  >' . $session . '</a>
                </td>

  

                <td class="d-flex ">
                <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded"  onclick="redirectTo(`' . $update_url . '`)"  style="cursor: pointer;" "><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $committee_dlt . '`)"  style="cursor: pointer;" "><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                </td>
            </tr>

                ';
      }

      $action_url = "/NEUBSSC/admin/committee/_config.php";


      ?>


    </tbody>
  </table>


  <div class="row justify-content-center g-3 my-2 ">
    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">



      <h3 class="heading_color mb-4">Add New Committee</h3>

      <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
        <div class="form-floating  text-muted">
          <input type="text" class="form-control _form_data" id="newSession" name="newSession" placeholder=" " required>
          <label for="newSession">Enter Session</label>
        </div>


        <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Add Committee</button>
      </form>

    </div>
  </div>
</div>