
$(document).ready(function () {
    $('#table-sewazoom-admin').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0, 1, 2, 5,6,7]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });

  $(document).ready(function () {
    $('#table-sewazoom-user').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0,1,4,5,6]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });

  $(document).ready(function () {
    $('#table-revisidata-admin').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0,3,4,5,6,7]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });
  $(document).ready(function () {
    $('#table-revisidata-user').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0,3,4,5,6]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });
  $(document).ready(function () {
    $('#table-aksesinternet').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [3,4,5,6]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });
  $(document).ready(function () {
    $('#table-inventaris').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0,1,2,5,6]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });
  $(document).ready(function () {
    $('#table-aksesprogram').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [1]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });