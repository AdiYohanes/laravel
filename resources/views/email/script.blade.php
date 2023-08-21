<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>$(document).ready( function () {
    $('#myTable').DataTable({
        processing: true,
        serverside: true,
        ajax: "{{ url('emailAjax') }}",
        columns :[{
            data: 'DT_RowIndex',
            email: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },{
            data: 'email',
            email: 'Email'
        },{
            data: 'name',
            name: 'Name'
        },{
            data: 'action',
            action: 'Action'
        }]
    });
} );

//setup globl
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

//insert data
$('.insert-button').click(function() {
    $.ajax({
        url:'emailAjax',
        type: 'POST',
        data: {
            name : $('#name').val(),
            email : $('#email').val(),
        },
        success:function(response){
            if(response.errors){
                console.log(response.errors);
                $('.alert-danger').removeClass('d-none');
                $('.alert-danger').html("<ul>");
                $.each(response.errors,function(key,value){
                    $('.alert-danger').find('ul').append("<li>"+ value +"</li>");
                });
                $('.alert-danger').append("</ul>");

            }else{
                $('.alert-success').removeClass('d-none');
                $('.alert-success').html(response.success);

            }
            $('#myTable').DataTable().ajax.reload();
        }
    });
});

// 04_PROSES Delete 
$('body').on('click', '.button-delete', function(e) {
        if (confirm('Yakin mau hapus data ini?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'emailAjax/' + id,
                type: 'DELETE',
            });
            $('#myTable').DataTable().ajax.reload();
        }
    });
            //update data
$('body').on('click','.button-update',function(e){
    var id= $(this).data('id');
    $.ajax({
        url:'emailAjax/'+id+'/edit',
        type: 'GET',
        success:function(response){
            $('#exampleModal').modal('show');
            $('#name').val(response.result.name);
            $('#email').val(response.result.email);
            console.log(response.result);
    }
        });
});

            


</script> 