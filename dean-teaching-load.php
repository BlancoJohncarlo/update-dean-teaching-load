<?php
require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f30985c93b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <title>Teaching Assignment</title>
</head>
<body>
<div class="layout">
    <?php
    include '../header.php';
    include 'sidebar-dean.php';   
    ?>
</div>
<div class="content">
    <?php
    include '../dashboard/dashboard.php';
    ?>
    <div class="dean-teaching mt-3 rounded bg-light p-3 pb-3">
        <h1>Teaching Assignment</h1>
        <hr class="hr"/>
        <h5>Faculty Members:</h5>
        <div class="table-teaching mt-5 overflow-scroll">
            <table class="table table-striped">
                <thead class="table-success">
                    <tr>
                        <th>Name</th>
                        <th>Faculty Type</th>
                        <th>Total Number of Loads</th>
                        <th>Total Number of Hours</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    
                    <?php

                        $sqlSelectFaculty = mysqli_query($con, "SELECT * FROM `user_tb`");

                        while ($rowFaculty = mysqli_fetch_array($sqlSelectFaculty)) {

                            $totalLoads = 0;
                            $totalHours = 0; 

                            echo '<tr>
                                    <td>' . $rowFaculty['fullname'] . '<input type="hidden" name="fullname" value="' . $rowFaculty['fullname'] . '"></td>
                                    <td>' . $rowFaculty['type'] . '<input type="hidden" name="facultyType" value="' . $rowFaculty['type'] . '"></td>
                                    <td class="' .  '" id="totalLoadsCell">' . $totalLoads . '</td>
                                    <td class="' . '" id="totalHoursCell">' . $totalHours . '</td>

                                    <td>
                                        <button class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                                    </td>
                                </tr>';

                        }
                        ?>
                </tbody>
            </table>
        </div>

        <div class="custome-margin-preview1">
            <h3>Preview</h3>
            <div class="border rounded mx-auto preview" id="preview-table" style="margin-top:5em;">
                <div class="teaching-load-details-div m-0 overflow-scroll">
                    <table class="table table-secondary table-striped text-center mt-3 update-teaching-load-table table-bordered">
                    <thead>
                        <tr>
                            <td rowspan="2">Semester</td>
                            <td rowspan="2">Faculty</td>
                            <td colspan="2">Teaching Assignment</td>
                            <td rowspan="2">No. of Units</td>
                            <td rowspan="2">Full-time Equivalent</td>
                            <td rowspan="2">Action</td>
                        </tr>
                        <tr>
                            <td>Subject Code</td>
                            <td>Subject Title</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Unit</td>
                            <td id="previewTotalUnitsCell">0.00</td> 
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                    </table>
                </div>
                <div class="text-end">
                    <button class="btn btn-success mt-5">Generate</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" data-bs-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Faculty Teaching Load</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="facultyForm">
                    <div class="row align-items-start mt-2">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Semester:</span>
                                <select class="form-select" aria-label="Name">
                                    <option selected>Semester</option>
                                    <option value="First_Semester">First Semester</option>
                                    <option value="Second_Semester">Second Semester</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Subject Title:</span>
                                <select id="subjectTitleSelect" class="form-select" aria-label="SubjectTitle">
                                    <option selected value="">Subject Title</option>

                                    <?php

                                        $sqlSelectSubject = mysqli_query($con,"SELECT * FROM `subject_tb`");
                                        while($rowSubject = mysqli_fetch_array($sqlSelectSubject)){
                                            echo '<option value="'.$rowSubject['subject_code'].'|'. $rowSubject['subject_title'].'">'. $rowSubject['subject_title'].'</option>';
                                        }
                                    ?>    
                                </select>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Number of Units:</span>
                                <input type="text" name="numberofUnits" class="form-control" value="">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">full time equivalent :</span>
                                <select id="fteselect" class="form-select" aria-label="fte">
                                    <option selected value="">FTE</option>
                                    <?php
                                        // PHP code to fetch FTE values from the database and populate options
                                        $sqlSelectFte = mysqli_query($con, "SELECT * FROM `subject_tb`");
                                        while ($rowFte = mysqli_fetch_array($sqlSelectFte)) {
                                            echo '<option value="' . $rowFte['fte'] . '">' . $rowFte['fte'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
                <h3>Preview</h3>
                <div class="border rounded mt-3 mx-auto preview"  id="preview-table" style="margin-top:5em;">
                    <div class="teaching-load-details-div m-0 overflow-scroll">
                        <table class="table table-secondary table-striped text-center mt-3  update-teaching-load-table table-bordered">
                            <thead>
                            <tr>
                                <td rowspan="2">Semester</td>
                                <td rowspan="2">Faculty</td>
                                <td colspan="2">Teaching Assignment</td>
                                <td rowspan="2">No. of Units</td>
                                <td rowspan="2">Full-time Equivalent</td>
                                <td rowspan="2">Action</td>
                            </tr>
                            <tr>
                                <td>Subject Code</td>
                                <td>Subject Title</td>
                            </tr>
                         </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="saveButton">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Add the JavaScript code below this line -->
<script>
$(document).ready(function() {
    // Initialize the total teaching load, total hours, and total units to 0
    var totalTeachingLoad = 0;
    var totalHours = 0;
    var totalUnits = 0;
    var facultyTeachingLoad = {};

    // Function to update the total loads cell
    function updateTotalLoads() {
        var total = 0;
        $('.table-teaching tbody tr').each(function() {
            var loads = parseFloat($(this).find('td:eq(2)').text());
            if (!isNaN(loads)) {
                total += loads;
            }
        });

        // Update the total loads cell
        $('#totalLoadsCell').text(total.toFixed(2));
    }

    function updateTotalHours() {
        var total = 0;
        $('.table-teaching tbody tr').each(function() {
            var hours = parseFloat($(this).find('td:eq(3)').text());
            if (!isNaN(hours)) {
                total += hours;
            }
        });
        $('#totalHoursCell').text(total.toFixed(2));
        totalHours = total;
    }

    // Function to update the total units cell in the preview table
    function updateTotalUnits() {
        var total = 0;
        $('#preview-table table tbody tr').each(function() {
            var units = parseFloat($(this).find('td:eq(4)').text());
            if (!isNaN(units)) {
                total += units;
            }
        });

        if (total === 0) {
            $('#previewTotalUnitsCell').text('0.00');
        } else {
            $('#previewTotalUnitsCell').text(total.toFixed(2));
        }
    }

    $('.btn.btn-primary.float-end').on('click', function(e) {
        e.preventDefault();

        var semester = $('select[aria-label="Name"]').val();
        var subjectTitleValue = $('#subjectTitleSelect').val();
        var valuesArray = subjectTitleValue.split('|');
        var subjectCode = valuesArray[0];
        var subjectTitle = valuesArray[1];
        var numberOfUnits = parseFloat($('input[name="numberofUnits"]').val());
        var facultyName = $('input[name="fullname"]').val();
        var selectedFTE = $('#fteselect').val();
        var hoursToAdd = 2; // Default hours to add


        totalUnits += numberOfUnits;
        updateTotalUnits();
        totalHours += hoursToAdd; 
        updateTotalHours();


        if (!semester || !subjectTitleValue || isNaN(numberOfUnits) || !facultyName) {
            alert('Please fill in all the fields with valid data.');
            return; // Prevent adding the row
        }

        if (!facultyTeachingLoad[facultyName]) {
            facultyTeachingLoad[facultyName] = {
                load: 0,
                hours: 0
            };
        }

        // Check if faculty teaching hours exceed the limit
        if (facultyTeachingLoad[facultyName].hours + hoursToAdd > 20) {
            alert('Faculty has reached the maximum number of teaching hours.');
            return;
        }

        // Update the teaching load and hours for the specific faculty member
        facultyTeachingLoad[facultyName].load += numberOfUnits;
        facultyTeachingLoad[facultyName].hours += hoursToAdd;

        totalTeachingLoad += numberOfUnits;
        updateTotalLoads();
        updateTotalHours(); // Update total hours when adding a row

        // Check if the total teaching load exceeds the limit
        if (totalTeachingLoad > 27.00) {
            alert('Teaching load exceeds the limit for assigning subjects.');
            return; // Prevent adding the row
        }

        // Update the total teaching load and total hours display
        $('#totalLoadsCell').text(totalTeachingLoad.toFixed(2));
        $('#totalLoadsCell').removeClass('text-danger').addClass('text-success');

        // Create and append the row to the preview table
        var newRow = '<tr>' +
            '<td>'+ semester +'</td>' +
            '<td>' + facultyName + '</td>' +
            '<td>' + subjectCode + '</td>' +
            '<td>' + subjectTitle + '</td>' +
            '<td>' + numberOfUnits.toFixed(2) + '</td>' +
            '<td>' + selectedFTE + '</td>' +
            '<td><button class="btn btn-danger btn-sm rounded delete-teaching-assignment">Delete</button></td>' +
            '</tr>';

        $('#preview-table table tbody').append(newRow);

        // Clear the input fields
        $('select[aria-label="Name"]').val('Semester');
        $('#subjectTitleSelect').val('');
        $('input[name="numberofUnits"]').val('');
        $('#fteselect').val('');

        var currentDetails = JSON.parse($('#teaching-assignment-details-input').val());
        currentDetails.push({
            semester: semester,
            facultyName: facultyName,
            subjectCode: subjectCode,
            subjectTitle: subjectTitle,
            numberOfUnits: numberOfUnits.toFixed(2),
            fte: selectedFTE
        });
        $('#teaching-assignment-details-input').val(JSON.stringify(currentDetails));
    });

    $(document).on('click', '.btn.btn-danger.rounded.delete-teaching-assignment', function(e) {
        e.preventDefault();
        var rowIndex = $(this).closest('tr').index();
        var rowUnits = parseFloat($('#preview-table table tbody tr:eq(' + rowIndex + ') td:eq(4)').text());
        var rowHours = parseFloat($('#preview-table table tbody tr:eq(' + rowIndex + ') td:eq(3)').text());
        var facultyName = $('#preview-table table tbody tr:eq(' + rowIndex + ') td:eq(1)').text();

        totalUnits -= rowUnits;
        updateTotalUnits();

        if (!isNaN(rowHours)) {
            // Subtract the deleted row's hours from the total hours
            totalHours -= rowHours; // Subtract hours of the deleted row
            updateTotalHours(); // Update total hours
        }

        if (!isNaN(rowUnits)) {
            // Subtract the deleted row's units from the total units
            facultyTeachingLoad[facultyName].load -= rowUnits;
            totalTeachingLoad -= rowUnits;
            updateTotalLoads();

            // Subtract the deleted row's hours from the total hours
            facultyTeachingLoad[facultyName].hours -= rowHours;
            updateTotalHours();

            // Update the total units display
            $('#totalLoadsCell').text(totalTeachingLoad.toFixed(2));
            $('#previewTotalUnitsCell').text(totalUnits.toFixed(2));
            $('#totalHoursCell').text(totalHours.toFixed(2)); // Update with total hours

            // Change the color to red if the total teaching load exceeds the limit
            if (totalTeachingLoad > 27) {
                alert('Teaching load exceeds the limit for assigning subjects.');
                $('#totalLoadsCell').addClass('text-danger');
            } else {
                // Change the color to green if it's less than or equal to the limit
                $('#totalLoadsCell').removeClass('text-danger').addClass('text-success');
            }
        }


                $('#preview-table table tbody tr:eq(' + rowIndex + ')').remove();
                $(this).closest('tr').remove();

                var currentDetails = JSON.parse($('#teaching-assignment-details-input').val());
                currentDetails.splice(rowIndex, 1);
                $('#teaching-assignment-details-input').val(JSON.stringify(currentDetails));
            });

            // Function to show messages when total teaching load is zero
            function showTeachingLoadMessage() {
                if (totalTeachingLoad === 0) {
                    // Show a message for adding subjects when total teaching load is zero
                    alert('Need to add subjects, the total teaching load is currently zero.');
                }
            }

            // Call the function to show messages when the page loads
            showTeachingLoadMessage();

            // Handle the save button click event
            $('#saveButton').on('click', function(e) {
                e.preventDefault();
                // Implement the functionality to save data here, if needed.
            });
        });



</script>
</body>
</html>



