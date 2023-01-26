
$(document).ready(function () {
    $('#table-sewazoom').DataTable({
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: [0, 1, 2, 3, 6, 7, 8, 9]
      }]
    });
      $('.dataTables_length').addClass('bs-select');
  });