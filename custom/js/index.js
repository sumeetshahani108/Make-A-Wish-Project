function changed() {
    var city = $('#cities').val();
    var bhk = [];
    var type = [];
    $('.bhk:checked').each(function () {
       bhk.push($(this).val());
    });

    $('.type_of_aparment:checked').each(function () {
        type.push($(this).val());
    });

    var min = $('#min').val();
    var max = $('#max').val();

    var my_bhk = JSON.stringify(bhk);
    var my_type = JSON.stringify(type);

    console.log(my_bhk);
    console.log(my_type);
    $.ajax({
       type : "POST",
       url : 'php_action/getApartments.php',
       data : {city : city, bhk : my_bhk, type : my_type, min : min, max : max},
       contentType : "application/json",
       success : function (r) {

       } 
    });
}
