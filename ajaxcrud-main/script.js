$(document).ready(function(){

$("input.image").change(function(){
    var file=this.files[0];
    var url=URL.createObjectURL(file);
    $(this).closest(".row").find(".preview_img").attr("src",url);

   

});

// insert data code start here
$("#insertForm").on("submit",function(e){
    $("#insertBtn").attr("disabled", "disabled");
    e.preventDefault();


$.ajax({
url:"server.php?action=insertData",
type:"post",
data:new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function(response){
    var response=JSON.parse(response);
    if(response.statusCode == 200){
        $("#offcanvasAddUser").offcanvas("hide");
        $("#insertBtn").removeAttr("disabled");
        $("#insertForm")[0].reset();
        $(".preview_img").attr("src", "images/default_profile.jpg");
        $("#successToast").toast("show");
        $("#successMsg").html(response.message);
        fetchData();
    }
    else if(response.statusCode == 500){
        $("#offcanvasAddUser").offcanvas("hide");
        $("#insertBtn").removeAttr("disabled");
        $("#insertForm")[0].reset();
        $(".preview_img").attr("src", "images/default_profile.jpg");
        $("#errorToast").toast("show");
        $("#errorMsg").html(response.message);
    }
    else if(response.statusCode==400){
        $("#insertBtn").removeAttr("disabled");
        $("#errorToast").toast("show");
        $("#errorMsg").html(response.message);
    }
}
});//$.ajax end here



});//idinsewrt form enmd here





// insert data code end here


// fetcvh data code sdtart here
function fetchdata(){
    $.ajax({
url:"server.php?action=fetchData",
type:"post",
dataType:"json",
success:function(response){
    var data=response.data;
    table.clear().draw();
    $.each(data,function(index,value)){
        table.row.add([
            value.id,
            value.first_name,
            value.last_name,
            '<img src="uploads/ '+ value.image + '">',
            value.email,
            value.country,
            value.gender,
        ])
    }
}

    });//ajax code end here
}


// fetch data code end here

});//document ready function