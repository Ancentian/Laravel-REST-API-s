<script>
    $(document).ready(function(){
        //Save Produsct Data
    $('#add_product_form').on('submit', function (e) {
        e.preventDefault();

        var form = this;
        var formData = $(this).serialize();

        $.ajax({
            url: '{{ url('products/store') }}',
            method: 'POST',
            data: formData,
            success: function (response) {
                // Handle success response
                form.reset();
                products_table.ajax.reload();     
                // Close the modal
                $('#add_product').modal('hide');
                //toastr.success(response.message, 'Success');
            },
            error: function (xhr, status, error) {
            // Handle error response
            
            //toastr.error('Something Went Wrong!, Try again!','Error');
            }
        });
    });

        products_table = $('#products_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url : "{{url('products/index')}}",
                data: function(d){
                    
                }
            }, 
            columnDefs:[{
                    "targets": 1,
                    "orderable": false,
                    "searchable": false
                }],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'category', name: 'category'},
                {data: 'product_code', name: 'product_code'},
                // {data: 'description', name: 'description'}, 
                {data: 'action', name: 'action', orderable: false, searchable: false},   
            ],
            createdRow: function( row, data, dataIndex ) {
            }
        });
    });
</script>