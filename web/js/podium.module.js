var messages = [];
var firstTime =  true;


function loadMessages() {
    $.ajax({
        type: 'GET',
        url: 'podium_chat_json',
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            messages = data;
        }

    })
};


function sendMessage() {
    var messageInput =  $('#inputMessage');
    var formData = {'message':   messageInput.val(),
                    'chatroom':   messageInput.data('podium_id')
};

 //   console.log($('#messageBox').data('podium_id'));
    $.ajax({
        url: 'podium_chat_post',
        dataType: 'json',
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            updateChat(data)
         },
        error: function (jqXHR, textStatus, errorThrown)
        {

        }
    });
};

function updateChat(newMessage) {

    console.log(newMessage);
    var template = $('#messageLine').html();
    var html = Mustache.to_html(template, newMessage);

    var messages = $('#messages');
    messages.append(html);
    messages.scrollTop(messages[0].scrollHeight);

    $('#inputMessage').val('');
}


    function setChat() {

        console.log(messages);
        var template = $('#messageLine').html();
        var html = Mustache.to_html(template, messages);
        $('#messages').html(html);
    }

    function setChart() {
//        console.log(months[0].actualSales);
        var chart = new Highcharts.Chart(options);
    }


$(document).ready(function(){
    loadMessages();
    setChat();

    /*
if (firstTime) {
    setTemplate(1);
    setChart();
    firstTime = false;
}
*/
    $('#inputMessage').bind("enterKey",function(e){
        sendMessage(e.val);
    });
    $('#inputMessage').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });


});

