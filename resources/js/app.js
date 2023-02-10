import './bootstrap';
$('.editBtn').click(function (){
    let data = jQuery.parseJSON($(this).attr("data-table"));
    //Set data into inputs
    $('#editTitle').text("Edit "+ data.nom);
    $('#idCompany').text(data.id);
    $('#name').val(data.nom);
    $('#address').val(data.adreça);
    $('#mobile').val(data.telefon);
    $('#email').val(data.correu);

    $('#editForm').attr('action', '/empresa/update/'+data.id);
});
$('.deleteBtn').click(function (){
    let id = $(this).attr("data-id");
    console.log(id)
    $('#deleteForm').attr('action', '/empresa/delete/'+parseInt(id));
});
