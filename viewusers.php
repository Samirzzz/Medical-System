<html>
   <?php include 'navigation.php';?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="viewuserscss.css">
<div class="container" >
<div class="row" >
    <div class="col-md-12" >
        <div class="card" >
            <div class="card-body" >
                <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
            </div>
            <div class="table-responsive" >
                <table class="table no-wrap user-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Diagnoses</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Added</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="pl-4">1</td>
                      <td>
                          <h5 class="font-medium mb-0">Daniel Kristeen</h5>
                          <span class="text-muted">Texas, Unitedd states</span>
                      </td>
                      <td>
                          <span class="text-muted">Visual Designer</span><br>
                          <span class="text-muted">Past : teacher</span>
                      </td>
                      <td>
                          <span class="text-muted">daniel@website.com</span><br>
                          <span class="text-muted">999 - 444 - 555</span>
                      </td>
                      <td>
                          <span class="text-muted">15 Mar 1988</span><br>
                          <span class="text-muted">10: 55 AM</span>
                      </td>
                      <td>
                        <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Admin</option>
                          <option>Patient</option>
                        </select>
                      </td>
                      <td>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ri-account-circle-fill"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ri-edit-line"></i> </button>
                      </td>
                    </tr>
                    <tr>
                    
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



</html>