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

    //OFERTAS
    $('.sendOfferBtn').click(function (){
        let { descripcio, id, numVacants } = jQuery.parseJSON($(this).attr("data-offer"));
        $('#offer').val(descripcio);
        $('#sendOfferTitle').text("Send offer "+descripcio);
        $('#editForm').attr('action', '/oferta/tutor/'+parseInt(id));
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

    //OFFERTS
    $('.deleteOfferBtn').click(function (){
        let id = $(this).attr("data-id");
        console.log(id)
        $('#deleteOfferForm').attr('action', '/empresa/oferta/delete/'+parseInt(id));
    });

    $('.editOfferBtn2').off().click(function (){
        let {id, descripcio, numVacants, idEstudi, curs, nomContacte, cognomContacte, correuContacte} = jQuery.parseJSON($(this).attr('data-table'));
        //Set data into inputs
        $('#editOfferTitle').text("Edit Offer "+ descripcio);
        $('#idEditOffer').text(id);
        $('#descripcioOfferEdit').val(descripcio);
        $('#vacantsOfferEdit').val(numVacants);
        $('#groupOfferEdit').val(idEstudi).change();
        $('#cursOfferEdit').val(curs);
        $('#nomContacteEditOffer').val(nomContacte);
        $('#cognomContacteEditOffer').val(cognomContacte);
        $('#correuContacteEditOffer').val(correuContacte);

        $('#editOfferForm').attr('action', '/empresa/oferta/update/'+id);
    });

    //ENVIAMENTS

    $('.updateStateEnviamentBtn').off().click(function (){
        let {id, estatEnviaments, alumne, oferta} = jQuery.parseJSON($(this).attr('data-table'));
        //Set data into inputs
        $('#idEnviament').text(id);
        $('#enviament').val(alumne+" - "+oferta);
        $('#stateOffer').val(estatEnviaments).change();

        $('#editShipmentForm').attr('action', '/enviament/state/update/'+id);
    });

    $('#filter-by-year').click(function (){
        $('#submitFilterByYear').get(0).click();
    });
    $('#filter-by-vacancies').click(function (){
        $('#submitFilterByVacancies').get(0).click();
    });
    $('#filter-by-cycle').click(function (){
        $('#submitFilterByCycle').get(0).click();
    });
    $('.deleteUserBtn').click(function (){
        let {id} = jQuery.parseJSON($(this).attr('data-table'));
        $('#deleteUserForm').attr('action', '/users/delete/'+id);
    });
    $('.sendEmail').click(function(){
        $(this).find('.sendEmailBtn').get(0).click()
    });
    fadeOutEffect('alert', 300);
    function fadeOutEffect(id, second) {
        var fadeTarget = document.getElementById(id);
        if(fadeTarget.style!=null){
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
    }
});
