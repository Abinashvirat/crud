 $(document).ready(function () {

     //=================================================================================================
     function showdata() {
        $.ajax({
            url: "retrieve.php", // Replace with your actual data endpoint
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                table.clear(); // Clear existing data

                // Add rows from received data
                for (let i = 0; i < data.length; i++) {
                    table.row.add([
                        data[i].name,
                        data[i].email,
                        data[i].phone,
                        data[i].address,
                        data[i].gender,
                        data[i].dob,
                        data[i].hobby,
                        data[i].country,
                        data[i].state,
                        data[i].image != null ? "<img src='image/" + data[i].image + "' style='max-height: 100px; max-width: 100px;' />" : "No Image",
                        "<button class='btn btn-warning btn-sm btn-edit' data-sid='" + data[i].id + "'>Edit</button><button class='btn btn-danger btn-sm btn-del' data-sid='" + data[i].id + "'>Delete</button>"
                    ]).draw(false);
                }
            }
        });
    }

    // Call the function to fetch and display data
    showdata();
    
     //=================================================================================================
     $("tbody").on("click", ".btn-del", function () {
         let id = $(this).attr("data-sid");
         let image = $(this).data("image");

         mydata = { sid: id, image: image }; // Pass both ID and image filename to the server
         mythis = this;
         $.ajax({
             url: "delete.php",
             method: "POST",
             data: JSON.stringify(mydata),
             success: function (data) {
                 $(mythis).closest("tr").fadeOut();
             },
         });
     });

//=====================================================================================================
     $("#sub").click(function (e) {
         e.preventDefault();

         var formData = new FormData(document.getElementById('myForm'));


         $.ajax({
             url: "insert.php",
             method: "POST",
             contentType: false,
             processData: false,
             data: formData, // Do not stringify FormData object
             success: function (data) {
                 $('#imageprev').attr('src', '');
                 document.getElementById("myForm").reset();
                 $("#x").click();
                 //$('#imageprev').attr('src', ''); // Set the image preview source to an empty string
                 $('#stateSelect').empty();

                 showdata();
             },
         });
     });


     //================================================================================================
     $("tbody").on("click", ".btn-edit",
         function () {

             let id = $(this).attr("data-sid");

             document.getElementById('hiddenId').value = id;
             mydata = { sid: id };
             $.ajax({
                 url: "edit.php",
                 dataType: "JSON",
                 method: "POST",
                 data: JSON.stringify(mydata),
                 success: function (data) {
                     $("#name").val(data[0].name);
                     $("#email").val(data[0].email);
                     $("#phone").val(data[0].phone);
                     $("#address").val(data[0].address);
                     $("#dob").val(data[0].dob);
                     var genderValue = data[0].gender;


                     var countryValue = data[0].country;
                     $("#countrySelect").val(countryValue);
                     populateStates(countryValue, function(states) {
                        // Clear existing options
                        $('#stateSelect').empty();
                        
                        // Iterate through the received data and append options to the state select dropdown
                        $.each(states, function(index, state) {
                            $('#stateSelect').append($('<option>', {
                                value: state.state_name, // Set the value of the option to state name
                                text: state.state_name // Set the text of the option to state name
                            }));
                        });
                
                        // Set Selected State
                        var stateValue = data[0].state;
                        $("#stateSelect").val(stateValue);
                
                        // Display Modal
                        $('#exampleModal').modal('show');
                    });
                 
                    
                     $("input[name='gender'][value='" + genderValue + "']").prop("checked", true);

                     var hobbiesString = data[0].hobby;
                    var hobbiesArray = hobbiesString.split(',');
                     if (Array.isArray(hobbiesArray)) {
                         hobbiesArray.forEach(function (hobbyValue) {
                             $('input[type="checkbox"][value="' + hobbyValue.trim() + '"]').prop('checked', true);
                         });
                     } else {
                         console.error('Hobbies data is not an array.');
                     }
                     $('#exampleModal').modal('show');
                 },
             });

         });



     //===============================================================================================
     $("#add").click(function (e) {
         document.getElementById('hiddenId').value = "";

     })
     //===============================================================================================
     $("#sub2").click(function (e) {
         $("#username").val("");
     })

     // Function to preview the image
     $("#image").change(function () {
         var file = this.files[0];
         if (file) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $('#imageprev').attr('src', e.target.result).css('max-height', '150px').css('max-width', '150px');
             }
             reader.readAsDataURL(file);
         }
     });
     //=================================================================================================
    
    $('#countrySelect').change(function() {
        // Get the selected country value
        var selectedCountry = $(this).val();
    
        // Send AJAX request to the PHP file with the selected country
        $.ajax({
            url: 'get_states.php', // URL of the PHP file
            method: 'POST',
            dataType: 'JSON',
            data: { country: selectedCountry }, // Data to send (selected country)
            success: function(data) {
                // Clear existing options in the state select dropdown
                $('#stateSelect').empty();
                
                // Iterate through the received data and append options to the state select dropdown
                $.each(data, function(index, state) {
                    $('#stateSelect').append($('<option>', {
                        value: state.state_name, // Set the value of the option to state ID
                        text: state.state_name // Set the text of the option to state name
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error("Error:", error); // Log any errors to the console
            }
        });
    });
    
//====================================================================================================
function populateStates(country, callback) {
    $.ajax({
        url: 'get_states.php', // URL of the PHP file
        method: 'POST',
        dataType: 'JSON',
        data: { country: country }, // Data to send (selected country)
        success: function(data) {
            callback(data);
        },
        error: function(xhr, status, error) {
            console.error("Error:", error); // Log any errors to the console
        }
    });
}

//=====================================================================================================
$("#sub3").click(function (e) {
    e.preventDefault();
    var formData = new FormData(document.getElementById('myForm1'));

    $.ajax({
        url: "insert2.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData, // Do not stringify FormData object
        success: function (data) {

            alert(data);

            // Clear file input
            $('#exampleInputFile1').val('');
            // Close modal if you have modal ID
             $('#Y').click();
            // Empty the file preview if any
            $('#preview').empty();
            // Call function to show data after successful submission
            
            showdata();
        },
    });
})

 });





 