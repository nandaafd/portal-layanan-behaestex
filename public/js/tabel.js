
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