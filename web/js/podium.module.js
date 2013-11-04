var messages = [];
var firstTime =  true;

function loadMessages() {
    $.ajax({
        type: 'GET',
        url: 'podium_chat_json',
        dataType: 'json',
        data: { 'month_name':  monthName },
        async: false,
        success: function(data) {
            messages = data;
        }

    })
};


function sendMessage(el) {
    var messageInput =  el;
    var formData = {'message':   messageInput.val(),
                    'chatMonth':   monthName,
                    'chatPodiumId':   messageInput.data('podium_id')

    };
    console.log('success');

 //   console.log($('#messageBox').data('podium_id'));
    $.ajax({
        url: 'podium_chat_post',
        dataType: 'json',
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
  //      console.log('success');
            updateChat(data)
         },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            console.log('fail');

        }
    });
}

function updateChat(newMessage) {

    console.log(newMessage);
    var template = $('#messageLine').html();
    var html = Mustache.to_html(template, newMessage);
console.log(newMessage.messages.podium);
    var messages = $('#podium_'+newMessage.messages.podium+' .messages');
    messages.append(html);
    messages.scrollTop(messages[0].scrollHeight);

    messages.val('');
}




    function setChat() {
        var i =0;
        $.each(messages, function(k,v) {
                console.log(v);
                i++;
                console.log(i);

                var template = $('#messageLine').html();
                var html = Mustache.to_html(template, v);
                $('#podium_'+i+' .messages').html(html);
        });
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
    $('.inputMessage').bind("enterKey",function(e){
        sendMessage($(this));
    });
    $('.inputMessage').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });


});

