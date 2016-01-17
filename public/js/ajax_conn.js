
$(document).ready(function(){


$(".deletebutton").click(function(e) {
    var that=$(this);
    e.preventDefault();
    var user_id = $(this).attr('user-id');
    var url='delete-gallery-image';
    $.ajax({
    type: 'get',
    url:url ,
    data:{
        userid : user_id

    },
    success : function(data) {
        $("p.dd").html("You Deleted a Photo !");
        that.parent().parent().remove();    
    }

});
});


$("a#editlink1").click(function(e) {
    $("input.fname,.lname,.email").css("color","red");
    e.preventDefault();
    curval=$(this).attr('curval');
    if(curval=='Edit'){
        $(this).attr('curval','Save');
        $(this).text('Save');       
        $("input.edit-me").removeAttr("disabled");

    }
    else{
        var that=$(this);
        var user_fname = $(".fname").val();
        var user_lname = $(".lname").val();
        var user_email = $(".email").val();
        var url = "edit-profile-value";
        $.ajax({
         type : 'get',
         url : url ,
         data :{
        user_fname : user_fname,
        user_lname : user_lname,
        user_email : user_email
         },
         success : function(data) {
         $("input.fname,.lname,.email").css("color","black");
         $("input.edit-me").attr("disabled","disabled");
                that.attr('curval','Edit');
                that.text('Edit');
                $("p.nameprofile").attr("user-fname",user_fname);
                $("p.nameprofile").attr("user-lname",user_lname);
                $("p.nameprofile").text(user_fname+" "+user_lname);

        }
        });

}

});







$(".activity").change(function(e) {
    
    e.preventDefault();
    var user_id = $(this).attr('user-id');
    var act =$(this).find("option:selected").text(); 
    var that=$(this);

var url = "edit-active-value";
$.ajax({
 type : 'get',
 url : url ,
 data :{
  photo_active : act,
  useridd : user_id
 },
 success : function(data) {
that.parent().parent().find("td:eq( 1 )").text(act);
}
});


});




});
