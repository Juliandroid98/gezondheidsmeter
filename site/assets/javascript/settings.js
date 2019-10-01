$(".general").click(function(){
    $(".generalsettingscontainer").animate({right: '0%'});
})

$(".closebutton").click(function(){
    $(".generalsettingscontainer").animate({right: '-100%'});
})