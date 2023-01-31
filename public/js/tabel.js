
$(document).ready(function () {
    $('#table-sewazoom-admin').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0, 1, 2, 5,6,7,8]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });

  $(document).ready(function () {
    $('#table-sewazoom-user').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0,1,4,5]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });
  $(document).ready(function () {
    $('#table-sewazoom-user-add').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [3]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });

  $(document).ready(function () {
    $('#table-revisidata').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0,3,4,5,6,7]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });