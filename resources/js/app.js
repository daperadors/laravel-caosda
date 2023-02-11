import './bootstrap';
$(document).ready(function() {
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
    $('.deleteEmpresaBtn').click(function (){
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

        $('#editUserForm').attr('action', '/fitxa/'+parseInt(id));

    });
    $('.sendOfferBtn').click(function (){
        let { descripcio, id, numVacants } = jQuery.parseJSON($(this).attr("data-offer"));
        $('#offer').val(descripcio);
        $('#sendOfferTitle').text("Send offer "+descripcio);
        $('#editForm').attr('action', '/empresa/tutor/oferta/'+parseInt(id)+"/"+parseInt(numVacants));
    })

    //STUDENTS

    $('.deleteStudentBtn').click(function (){
        let id = $(this).attr("data-id");
        console.log(id)
        $('#deleteStudentForm').attr('action', '/students/delete/'+parseInt(id));
    });

    $('.editStudentBtn').click(function (){
        let {id, nom, cognoms, correu, dni, curs, telefon, practiques, cv, idEstudi} = jQuery.parseJSON($(this).attr("data-table"));
        //Set data into inputs
        $('#editStudentTitle').text("Edit "+ nom);
        $('#idStudentEdit').text(id);
        $('#nameStudentEdit').val(nom);
        $('#surnamesStudentEdit').val(cognoms);
        $('#dniStudentEdit').val(dni);
        $('#cursStudentEdit').val(curs);
        $('#telefonStudentEdit').val(telefon);
        $('#emailStudentEdit').val(correu);
        $('#curriculumEdit').file = cv;
        $('#groupEdit').val(idEstudi).change();
        $('#practiquesStudentEdit').prop("checked", practiques === 1 ? true : false);

        $('#editStudentForm').attr('action', '/students/update/'+id);
    });

    $('.edit_show_CV').click(function (){
        let id = $(this).attr("data-id");
        $('#nameUser').text("Edit Or View CV "+ nom);
        console.log(id)
        $('#editShow_CV_Form').attr('action', '/students/update/curriculum/'+parseInt(id));
    });

    $('.downloadCV').click(function (){
        //let id = $(this).attr("data-id");
        //$('#editShow_CV_Form').attr('action', 'student/curriculum/download');
        $(this).find('.downloadCvBtn').get(0).click();
    });

    fadeOutEffect('alert', 300);
    function fadeOutEffect(id, second) {
        var fadeTarget = document.getElementById(id);
        var fadeEffect = setInterval(function () {
            if (!fadeTarget.style.opacity) {
                fadeTarget.style.opacity = 1;
            }
            if (fadeTarget.style.opacity > 0) {
                fadeTarget.style.opacity -= 0.1;
            } else {
                clearInterval(fadeEffect);
            }
        }, second);
    }
});
