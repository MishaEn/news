require('./bootstrap');


var channel = Echo.channel('like-event');
channel.listen('LikeEvent', (e) => {
    console.log(e.user);
});
