function ConfirmDelete(){
    return confirm("Czy na pewno chcesz usunąć?")
}
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$('.deletebtn').on('click', function() {
    //$('#studentdeleteModal').modal('show');
    console.log("dupa");
    if(confirm("Czy na pewno chcesz usunąć?")){
        $tr = $(this).closest('tr');
    
    var data= $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);
    $('delete_id').val(data[0]);
    $.ajax({
        type: "DELETE",
        url: "/remove/"+data[0],
        data: {_token: CSRF_TOKEN},
        success: function (response) {
            console.log(response);   
            document.getElementById(data[0]).remove();
        },          
    });
    //
    }
    
    
});