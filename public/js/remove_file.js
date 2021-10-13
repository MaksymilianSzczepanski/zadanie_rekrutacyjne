$('#content').on('click', '.deletebtn', function (e) {

    if (confirm("Czy na pewno chcesz usunąć?")) {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('delete_id').val(data[0]);
        $.ajax({
            type: "DELETE",
            url: "/remove/" + data[0],
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                document.getElementById(data[0]).remove();
            },
            error: function(response){
                console.log(response);
            }
        });
    }


});
