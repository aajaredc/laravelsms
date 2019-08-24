$(function() {
  $('.infinite-scroll').jscroll({
      autoTrigger: true,
      nextSelector: '.pagination li.active + li a',
      contentSelector: 'div.infinite-scroll',
      callback: function() {
          $('ul.pagination:visible:first').hide();
      }
  });
});
