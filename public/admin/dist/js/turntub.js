$(document).ready(function(){
    console.log('script');
    var hash = document.location.hash;
    var target = $('a[href="'+hash+'"]');
    target.trigger('click');
});