@extends('templates.main')
@section('content')
    <div class="container">
        <div class="chat-area"></div>
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control chat-message" placeholder="write your message" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary send-chat-message" type="button" id="button-addon2">send</button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        let socket = io('ws://quiz.local:3000');
        //send message to server
        $('.send-chat-message').on('click',function (event) {
            event.preventDefault();
            let message = $('.chat-message').val();
            $('.chat-message').val('');
            socket.emit('send-message',message);
        });
        socket.on('print-message',function (messages) {
            printMessages(messages);
        });
        function printMessages(messages) {
            $('.chat-area').html('');
            messages.forEach(function (item) {
                $('.chat-area').append('<br>'+item+'</br>');
            })
        }

    </script>
@endsection