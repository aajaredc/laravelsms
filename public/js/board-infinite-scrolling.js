$(function() {
    $('#board-posts').jscroll({
        autoTrigger: true,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.board-post',
        callback: function() {
            $('ul.pagination:visible:first').hide();
        }
    });
});
