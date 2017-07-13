/**
 * Created by Sumeet on 11-07-2017.
 */
var manageDoctorTable ;

$(document).ready(function () {

    manageDoctorTable = $('#manageDoctorTable').DataTable({
        'ajax' : 'fetchDoctors.php',
        'order' : []
    });
});

function viewDocs(doctorId) {
    if(doctorId){
        $.ajax({
            url : 'php_action/fetchDoctorDocuments.php',
            type : 'post',
            data : {doctorId : doctorId},
            dataType : 'json',
            success : function (response) {
                var path = response.documents;
                $.ajax({
                   url : 'php_action/fetchActualDoctorDocuments.php',
                   type : 'post',
                   data : {path : response.documents},
                   dataType : 'json',
                   success : function (response) {
                        //console.log(response);

                        $.each(response, function (key, value){

                            var e = "../" + path + "/" +response[key];
                            //console.log(e);
                            //$("#documentImage").attr('src',e);
                            $('#documentImages').append('<div class="item">' +
                                '<img src="' + e + '" alt="Cant Load Images">' +
                                '</div>');

                        })
                   }
                });
            }

        });
    }
}

function editDoctor(doctorId) {
    if (doctorId){
        // remove the form-error
        $('.form-group').removeClass('has-error').removeClass('has-success');

        // modal loading
        $('.modal-loading').removeClass('div-hide');
        // modal result
        $('.edit-doctor-result').addClass('div-hide');
        // modal footer
        $('.editDoctorFooter').addClass('div-hide');

        $.ajax({
            url : 'php_action/fetchDoctor.php',
            type : 'post',
            data : {doctorId : doctorId},
            dataType : 'json',
            success : function (response) {
                // modal loading
                $('.modal-loading').addClass('div-hide');
                // modal result
                $('.edit-doctor-result').removeClass('div-hide');
                // modal footer
                $('.editDoctorFooter').removeClass('div-hide');

                $('#editDoctorName').val(response.first_name + " " + response.last_name);
                // setting the brand status value
                $('#editDoctorStatus').val(response.verified);

                $('#editDoctorForm').unbind('submit').bind('submit', function() {

                    // remove the error text
                    $(".text-danger").remove();
                    // remove the form error
                    $('.form-group').removeClass('has-error').removeClass('has-success');


                    var doctorStatus = $('#editDoctorStatus').val();

                    if(doctorStatus == "") {
                        $("#editDoctorStatus").after('<p class="text-danger"> Verification field is required</p>');

                        $('#editDoctorStatus').closest('.form-group').addClass('has-error');
                    } else {
                        // remove error text field
                        $("#editDoctorStatus").find('.text-danger').remove();
                        // success out for form
                        $("#editDoctorStatus").closest('.form-group').addClass('has-success');
                    }

                    if(doctorStatus) {

                        //console.log("reached here");
                        var form = $(this);

                        // submit btn
                        $('#editDoctorBtn').button('loading');
                        console.log(form.attr('action'));
                        console.log(form.attr('method'));
                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: {doctorId : doctorId, editDoctorStatus : doctorStatus},
                            dataType: 'json',
                            success:function(response) {

                                if(response.success == true) {
                                    console.log('here');
                                    console.log(response);
                                    // submit btn
                                    $('#editDoctorBtn').button('reset');

                                    // reload the manage member table
                                    manageDoctorTable.ajax.reload(null, false);
                                    // remove the error text
                                    $(".text-danger").remove();
                                    // remove the form error
                                    $('.form-group').removeClass('has-error').removeClass('has-success');

                                    $('#edit-brand-messages').html('<div class="alert alert-success">'+
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                        '</div>');

                                    $(".alert-success").delay(500).show(10, function() {
                                        $(this).delay(3000).hide(10, function() {
                                            $(this).remove();
                                        });
                                    }); // /.alert
                                } // /if

                            }// /success
                        });	 // /ajax
                    } // /if

                    return false;
                }); // /update brand form
            }
        });
    }
}

function deleteDoctor(doctorId) {
    if(doctorId) {
        $('#removeBrandId').remove();
        $.ajax({
            url: 'php_action/fetchDoctor.php',
            type: 'post',
            data: {doctorId : doctorId},
            dataType: 'json',
            success:function(response) {
                // click on remove button to remove the brand
                console.log('here');
                $("#removeDoctorBtn").unbind('click').bind('click', function() {
                    // button loading
                    $("#removeDoctorBtn").button('loading');

                    $.ajax({
                        url: 'php_action/removeDoctor.php',
                        type: 'post',
                        data: {doctorId : doctorId},
                        dataType: 'json',
                        success:function(response) {
                            console.log(response);
                            // button loading
                            $("#removeDoctorBtn").button('reset');
                            if(response.success == true) {

                                // hide the remove modal
                                $('#removeMemberModal').modal('hide');

                                // reload the brand table
                                manageDoctorTable.ajax.reload(null, false);

                                $('.remove-messages').html('<div class="alert alert-success">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                    '</div>');

                                $(".alert-success").delay(500).show(10, function() {
                                    $(this).delay(3000).hide(10, function() {
                                        $(this).remove();
                                    });
                                }); // /.alert
                            } else {

                            } // /else
                        } // /response messages
                    }); // /ajax function to remove the brand

                }); // /click on remove button to remove the brand

            } // /success
        }); // /ajax

        $('.removeBrandFooter').after();
    } else {
        alert('error!! Refresh the page again');
    }
}