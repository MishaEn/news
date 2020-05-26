require('./bootstrap');


var channel = Echo.channel('like');
channel.listen('.like-event', (e) => {
    console.log('event');
});
