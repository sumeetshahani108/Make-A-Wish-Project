/**
 * Created by Sumeet on 12-07-2017.
 */
function addRow() {
    $('#addRowBtn').button("loading");
    var length = $('#createWishForm .form-group input').length ;
    //console.log(length);

    var row;
    var arrayNumber;
    var count;

    if(length > 0 ){
       row = $('#createWishForm .form-group input:last').attr('id');
       arrayNumber = $('#createWishForm .form-group input:last').attr('class');
       count = row.substring(3);
       count = Number(count) + 1;
       arrayNumber = Number(arrayNumber) + 1;
    }else {
        count = 1;
        arrayNumber = 0;
    }

    var field = '<br><input type="text" class="form-control" id="row'+count+'" class="'+arrayNumber+'"/>' ;
    if(length > 0){
        $('#createWishForm .form-group input:last').after(field);
        $("#addRowBtn").button("reset");
    }else{
        $("#addRowBtn").button("reset");
        $('#createWishForm .form-group').append(field);
    }

}
