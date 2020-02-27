$(document).ready(function() {
    $('table').DataTable( {
        "pageLength": 3,
        "searching": false,
        "lengthChange": false,
        "infoCallback": false,
        "order": [],
        "language": {
            "decimal":        "",
            "emptyTable":     "No data available in table",
            "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty":      "Showing 0 to 0 of 0 entries",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Show _MENU_ entries",
            "loadingRecords": "Loading...",
            "processing":     "Processing...",
            "search":         "Поиск:",
            "zeroRecords":    "Нет соответствующих результатов",
            "paginate": {
                "first":      "Первая",
                "last":       "Последняя",
                "next":       "Вперед",
                "previous":   "Назад"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    } );
} );