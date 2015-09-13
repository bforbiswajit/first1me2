$(document).ready(function(){
    var BASE_URL = "../index.php";
    
    function getStatusButton(status){
        if(status == 0)
            return "<span class='label label-danger'>Suspend</span>";
        if(status == 1)
            return "<span class='label label-success'>Active</span>";
        if(status == 2)
            return "<span class='label label-warning'>Pending</span>";
        if(status == 3)
            return "<span class='label label-primary'>Hidden</span>";
    }
    
    function userStat(){
        $.ajax({
            url : BASE_URL + "/Stat/User",
            type : "POST",
            headers : {"Api-Key": "1234"},
            
            success : function(data){
                data = JSON.parse(data);
                //console.log(data);
                $("#userTable").empty();
                data.data.users.map(function(user){
                    $("#userTable").append("<tr id='" + user.id + "'><td>" + user.firstName + " " + user.lastName + "</td><td>" + user.mobile + "</td><td>" + user.email + "</td><td>" + user.city + "</td><td>" + user.os + "</td><td>" + user.subscribed + "</td></tr>");
                });
                
                $("#userDisplayTable").DataTable();
            },
           
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }  
        });
    }
    userStat();
});