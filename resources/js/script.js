try {
    window.$ = window.jQuery = require('jquery');

    $(document).ready(function(){
    });
} catch (e) {}

$(document).ready(function () {
    $(document).on('click', 'i[data-type="like"]', function (event) {
        let id = event.target.dataset.id;
        let like = event.target.dataset.like;
        let like_count = parseInt($(event.target).children('span').text());
        let url = '/news/like';
        let method = 'post';
        let color = '#b80b00';
        if(like === 'true'){
            event.target.dataset.like = 'false';
            like_count--;
            $(event.target).children('span').text(like_count);
            url = '/news/like/'+id;
            method = 'delete';
            color = '#000';
        }
        else{
            like_count++;
            event.target.dataset.like = 'true';
            $(event.target).children('span').text(like_count)
        }
        $(event.target).css({
            color: color
        });
        console.log();
        $.ajax({
            url: url,
            method: method,
            dataType: 'json',
            data: {'news_id': id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if(errorThrown === 'Unauthorized'){
                    alert('Вы не авторизованны')
                }
            }
        })
    })

    $(document).on('click', 'small[data-type="comment-response"]', function (event) {
        let comment_id = event.target.dataset.comment;
        let news_id = event.target.dataset.news;
        let collapsed = event.target.dataset.collapsed;
        if(collapsed === 'true'){
            event.target.dataset.collapsed = 'false';
            $(event.target).parent().parent().after('' +
                '<div class="row">' +
                '<div class="col-10">' +
                '<input type="text" class="form-control" placeholder="Мысля на мыслю" value="" data-type="response-comment-input">'+
                '</div>'+
                '<div class="col-2">' +
                '<button data-type="comment-response" data-comment="'+comment_id+'" data-news="'+news_id+'" class="btn btn-primary btn block">Отправить</button>'+
                '</div>'+
                '</div>'
            )
        }
    });
    $(document).on('click', 'button[data-type="comment-response"]', function (event) {
        let comment_id = event.target.dataset.comment;
        let news_id = event.target.dataset.news;
        let text = $('input[data-type="response-comment-input"]').val().trim();
        console.log(text)
        $.ajax({
            url: '/news/'+news_id+'/comments',
            method: 'post',
            dataType: 'json',
            data: {'news_id': news_id, 'comment_id': comment_id, 'comment': text},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

            }

            ,
            error: function(jqXHR, textStatus, errorThrown) {
                if(errorThrown === 'Unauthorized'){
                    alert('Вы не авторизованны')
                }
            }
        })
    })
});
