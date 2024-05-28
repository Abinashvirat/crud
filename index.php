<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.4/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Selectize CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
    <title>Hello, world!</title>
</head>

<body>
    <div style="text-align: center;">
        <h1>STUDENT DETAILS</h1>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="add">
        ADD DETAILS
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="text-align: center;">Registration Form
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3 mb-2 bg-success text-white">
                    <form class="container" name="myform" id="myForm">
                        <input type="hidden" name="hidden" id="hiddenId">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gender:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="countrySelect">Country:</label>
                            <select class="form-control" id="countrySelect" name="countrySelect">
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="Australia">Australia</option>
                                <option value="England">England</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stateSelect">State:</label>
                            <select class="form-control" id="stateSelect" name="stateSelect">
                                
                            </select>
                        </div><br>


                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div><br>

                        <div class="form-group">
                            <label>Hobbies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="hobby1" value="reading"
                                    name="hobby1">
                                <label class="form-check-label" for="hobby1">Reading</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="hobby2" value="sports"
                                    name="hobby2">
                                <label class="form-check-label" for="hobby2">Sports</label>
                            </div>
                            <!-- Add more hobbies as needed -->

                        </div><br>
                        <div class="form-group">
                            <label>Upload Image:</label><br>
                            <input type="file" id="image" name="image">

                        </div>
                        <div id="imagepreview" class="form-group">
                            <img id="imageprev" style="width:50%;height:50%;">
                        </div>

                        <div style="text-align: center;" class="my-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                id="x">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit" id="sub">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  UPLOAD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- Added modal-xl class here -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol>
            <li> <a href="excel.php">Click </a>here to download the Excel template.</li>
            <li> 

            <form id="myForm1">
              <div class="form-group">
                <label for="exampleInputFile">Choose File</label>
                <input type="file" class="form-control-file" id="exampleInputFile1" aria-describedby="fileHelp" name="exampleInputFile1">
                <small id="fileHelp" class="form-text text-muted">Please choose a file to upload.</small>
              </div>
              <div id="preview"></div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="Y">Close</button>
              <button type="submit" class="btn btn-primary" id='sub3' name='sub3'>Submit</button>

            </form>

            </li>
       
        </ol>
      </div>
    </div>
  </div>
</div>



    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">PHONE</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">GENDER</th>
                <th scope="col">DOB</th>
                <th scope="col">HOBBY</th>
                <th scope="col">COUNTRY</th>
                <th scope="col">STATE</th>
                <th scope="col">IMAGE</th>
                <th scope="col">ACTIONS</th>

            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>



</body>

<script>
 document.getElementById('exampleInputFile1').addEventListener('change', function() {
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function(event) {
        var data = new Uint8Array(event.target.result);
        var workbook = XLSX.read(data, { type: 'array' });
        var sheet = workbook.Sheets[workbook.SheetNames[0]];
        var html = XLSX.utils.sheet_to_html(sheet);

        // Add bigger spaces between columns and values in the HTML
        html = html.replace(/<\/td><td>/g, '</td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>');

        document.getElementById('preview').innerHTML = html;
    };

    reader.readAsArrayBuffer(file);
});


</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>


<!-- Include Selectize JavaScript -->


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.4/js/dataTables.min.js"></script>
 <script>let table = new DataTable('#myTable');
  </script> 
<script src="jqajax.js?v=<?=rand();?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>


</html>