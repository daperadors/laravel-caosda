import './bootstrap';
$('.editEmpresaBtn').click(function (){
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
$('.viewUser').click(function (){
    let {id, name, email, coordinator, groupname, group} = jQuery.parseJSON($(this).attr("data-user"));
    console.log(id, name, email, coordinator, groupname, group);
    console.log()
    $("#title").text("User "+name.charAt(0).toUpperCase() + name.slice(1));
    $("#name").val(name);
    $("#email").val(email);
    $("#coordinator").prop("checked", coordinator === 1 ? true : false);
    $("#group").val(group).change();
});
$('.sendOfferBtn').click(function (){
    let { descripcio } = jQuery.parseJSON($(this).attr("data-offer"));
    $('#offer').val(descripcio);
    $('#sendOfferTitle').text("Send offer "+descripcio);
})
