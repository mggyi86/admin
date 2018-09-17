<template>
    <div>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="users-table" style="width: 100%;">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</template>

<script>
export default {
  props: ['url'],
  mounted() {
    console.log(this.url);
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        ajax: this.url,
        columns: [
            { data: 'DT_Row_Index', name: 'index_column'},
            { data: 'name', name: 'name'},
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[ 1, 'asc' ]]
        });
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        }).draw();
  }
}
</script>

