<script>
    $(function() {
        $('#datatable').DataTable({
            pageLength: 10,
            order: [],
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
    });
</script>