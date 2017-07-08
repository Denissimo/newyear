// JavaScript Document

$(document).ready(function(){
    $(".up").click(function(){
        var pdiv = $(this).closest('div');
        pdiv.insertBefore(pdiv.prev());
        return false
    });
    $(".down").click(function(){
        var pdiv = $(this).closest('div');
        pdiv.insertAfter(pdiv.next());
        return false
    });
});