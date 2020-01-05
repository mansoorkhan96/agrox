<script>
    $(function() {
        $('#datatable').DataTable({
            pageLength: 10,
            fixedHeader: true,
            responsive: true,
            "sDom": 'rtip',
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });

        var table = $('#datatable').DataTable();
        $('#key-search').on('keyup', function() {
            table.search(this.value).draw();
        });
        // $('#type-filter').on('change', function() {
        //     table.column(4).search($(this).val()).draw();
        // });
    });
</script>