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
        <div class="table-teaching mt-5 overflow-scroll ">
            <table class="table table-striped ">
                <thead class="table-success">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Faculty Type</th>
                    <th>Remaining Loads</th>
                    <th>Remaining Hours</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-secondary">
                <tr>
                    <th scope="row">1</th>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>
                        <button class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td></td>
                </tr>
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
                            <td></td>
                        </tr>
                        <tr>
                            <td>Subject Code</td>
                            <td>Subject Title</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
                                <span class="input-group-text" id="inputGroup-sizing-sm">Subject Code:</span>
                                <select id="subjectCodeSelect" class="form-select" aria-label="SubjectCode">
                                    <option selected value="">Subject Code</option>
                                    <option value="ITP101">ITP101</option>
                                    <option value="ITS114">ITS114</option>
                                    <option value="ITS125">ITS125</option>
                                    <option value="CAP 101">CAP 101</option>
                                    <option value="CC106">CC106</option>
                                    <option value="CC104">CC104</option>
                                    <option value="ITE101">ITE101</option>
                                    <option value="ITP109">ITP109</option>
                                    <option value="CC102">CC102</option>
                                    <option value="ITP106">ITP106</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Subject Title:</span>
                                <select id="subjectTitleSelect" class="form-select" aria-label="SubjectTitle">
                                    <option selected value="">Subject Title</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Number of Units:</span>
                                <input type="text" name="numberofUnits" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary float-end">Add</button>
                    </div>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Subject Code</td>
                                    <td>Subject Title</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" >Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize the total units to 0
    var totalUnits = 0;

    $('.btn.btn-primary.float-end').on('click', function(e) {
        e.preventDefault();

        var semester = $('select[aria-label="Name"]').val();
        var subjectCode = $('#subjectCodeSelect').val(); // Correct selector
        var subjectTitle = $('#subjectTitleSelect').val(); // Correct selector
        var numberOfUnits = parseFloat($('input[name="numberofUnits"]').val()); // Parse as a floating-point number

        // Check if any input field is empty
        if (!semester || !subjectCode || !subjectTitle || isNaN(numberOfUnits)) {
            // Display an error message for incomplete input
            alert('Please fill in all the fields with valid data.');
            return; // Prevent adding the row
        }

        // Update the total units
        totalUnits += numberOfUnits;

        // Update the total units display
        $('#totalUnitsValue').text(totalUnits.toFixed(2)); // Display with two decimal places

        // Create and append the row to the preview table
        var newRow = '<tr>' +
            '<td>'+ semester +'</td>' +
            '<td></td>'+
            '<td>' + subjectCode + '</td>' +
            '<td>' + subjectTitle + '</td>' +
            '<td>' + numberOfUnits.toFixed(2) + '</td>' +
            '<td><button class="btn btn-danger btn-sm rounded delete-teaching-assignment">Delete</button></td>' +
            '</tr>';

        $('#preview-table table tbody').append(newRow);

        // Clear the input fields
        $('select[aria-label="Name"]').val('Semester');
        $('#subjectCodeSelect').val(''); 
        $('#subjectTitleSelect').val('');
        $('input[name="numberofUnits"]').val('');

        var currentDetails = JSON.parse($('#teaching-assignment-details-input').val());
        currentDetails.push({
            semester: semester,
            subjectCode: subjectCode,
            subjectTitle: subjectTitle,
            numberOfUnits: numberOfUnits.toFixed(2)
        });
        $('#teaching-assignment-details-input').val(JSON.stringify(currentDetails));
    });

    $(document).on('click', '.btn.btn-danger.rounded.delete-teaching-assignment', function(e) {
        e.preventDefault();
        var rowIndex = $(this).closest('tr').index();
        var rowUnits = parseFloat($('#preview-table table tbody tr:eq(' + rowIndex + ') td:eq(3)').text());

        if (!isNaN(rowUnits)) {
            // Subtract the deleted row's units from the total units
            totalUnits -= rowUnits;

            // Update the total units display
            $('#totalUnitsValue').text(totalUnits.toFixed(2)); // Display with two decimal places
        }

        $(this).closest('tr').remove();

        var currentDetails = JSON.parse($('#teaching-assignment-details-input').val());
        currentDetails.splice(rowIndex, 1);
        $('#teaching-assignment-details-input').val(JSON.stringify(currentDetails));
    });
});
</script>

<script>
$(document).ready(function() {
    // Create a mapping object for Subject Code and Subject Title
    var subjectMapping = {
        "ITP101": "Computer Platform Technologies",
        "ITS114": "Cyber Security Principles",
        "ITS125": "Software Engineering 1"
        // Add more mappings as needed
    };

    // When the Subject Code selection changes
    $('#subjectCodeSelect').on('change', function() {
        var selectedSubjectCode = $(this).val();
        var subjectTitleSelect = $('#subjectTitleSelect');

        // Clear existing options in Subject Title select
        subjectTitleSelect.empty();

        if (selectedSubjectCode) {
            // If a Subject Code is selected, add the corresponding Subject Title
            var correspondingTitle = subjectMapping[selectedSubjectCode];
            if (correspondingTitle) {
                subjectTitleSelect.append($('<option>', {
                    value: correspondingTitle,
                    text: correspondingTitle,
                    selected: true
                }));
            } else {
                // Handle the case where the mapping is not found
                subjectTitleSelect.append($('<option>', {
                    value: "",
                    text: "Subject Title not found"
                }));
            }
        } else {
            // If no Subject Code is selected, show a default option
            subjectTitleSelect.append($('<option>', {
                value: "",
                text: "Select Subject Title"
            }));
        }
    });
});
</script>
</body>
</html>
