function new_notification(base_url) {

    var ids = [];
    $(".notif_id").each(function() {
        ids.push($(this).data("id"));
    });
    
    $.ajax({
        url : base_url+'notification/get_notification',
        type : 'post',
        data : {
            'ids' : ids
        },
        dataType:'json',
        success : function(data) {              
            if(data.response == true){
                $('#noti_count').html(data.count);
                $('#noti_count').show();
                $('#no-data').hide();
                $('#notif_body').prepend(data.list);
            }
        }
    });
}

function new_request(base_url) {

    var ids = [];
    $(".req_id").each(function() {
        ids.push($(this).data("id"));
    });
    
    $.ajax({
        url : base_url+'notification/get_request',
        type : 'post',
        data : {
            'ids' : ids
        },
        dataType:'json',
        success : function(data) {              
            if(data.response == true){
                $('#request_count').html(data.count);
                $('#request_count').show();
                $('#no-data-request').hide();
                $('#request_body').prepend(data.list);
            }
        }
    });
}

function notification_read(base_url) {
    $.ajax({
        url : base_url+'notification/read_notification',
        type : 'post',
        success : function(data) {              
            $('#noti_count').hide();
        }
    });
}

function request_read(base_url) {
    $.ajax({
        url : base_url+'notification/read_request',
        type : 'post',
        success : function(data) {              
            $('#request_count').hide();
        }
    });
}