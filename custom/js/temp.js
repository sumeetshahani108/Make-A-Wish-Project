/**
 * Created by Sumeet on 13-07-2017.
 */
function viewDoc(doctorId) {
    alert("here");
    if(doctorId){
        alert("here");
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
                        var temp = 0;
                        $.each(response, function (key, value){
                            alert("here");
                            /* var e = "../" + path + "/" +response[key];
                             console.log(e);
                             if(temp == 0){
                             $('#documentImages').append('<div class="item active">' +
                             '<img src="' + e + '" alt="Cant Load Images">' +
                             '</div>');
                             temp = 1;
                             }else{
                             $('#documentImages').append('<div class="item">' +
                             '<img src="' + e + '" alt="Cant Load Images">' +
                             '</div>');
                             }*/



                        })
                    }
                });
            }

        });
    }
}