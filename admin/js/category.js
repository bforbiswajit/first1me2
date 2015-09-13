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
    
    function categoryStat(){
        $.ajax({
            url : BASE_URL + "/Stat/Category",
            type : "POST",
            headers : {"Api-Key": "1234"},
            
            success : function(data){
                data = JSON.parse(data);
                //console.log(data);
                $("#categoryTable").empty();
                data.data.map(function(category){
                    $("#categoryTable").append("<tr id='" + category.id + "'><td>" + category.displayName + "</td><td>" + category.createdOn.date.substring(0,category.createdOn.date.indexOf(' ')) + "</td><td>" + category.subscribed + "</td><td>" + category.deals + "</td><td>" + category.totalViews + "</td><td>" + getStatusButton(category.status) + "</td></tr>");
                });
                
                $("#categoryDisplayTable").DataTable();
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }  
        });
    }
    categoryStat();
    
    $("form").submit(function(event){	//GENERIC form submit function
	event.preventDefault();
        var form_id = "#" + $(this).closest("form").attr("id");
	var form_data = new FormData(this);
	//var form_data = $(this).serialize();
        var url = $(form_id).attr("action");
        //console.log("form data - ", form_data);
        $.ajax({
            url : BASE_URL + url,
            type : "POST",
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            headers : {"Api-Key": "1234"},
            data : form_data,
            success : function(data){
                console.log(data);
                response = JSON.parse(data);
                if(response.status == "success"){
                    //console.log(response.data[0]);
                    $(form_id + "_success").text(response.data[0]).fadeIn(2000).fadeOut(2000);
                    categoryStat();
                }
                else{
                    $(form_id + "_danger").text("Error Code #" + response.message.Code + ", " + response.message.Title).fadeIn(2000);
                }
                $(form_id + "input[type='reset']").trigger("click");
            },
           
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }
        });
    });
});