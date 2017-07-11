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