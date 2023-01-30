
$(document).ready(function () {
    $('#table-sewazoom').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0, 1, 2, 5,6,7,8]
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