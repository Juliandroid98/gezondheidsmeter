// Wanneer je op de algemene settings button klikt, open de uitschuif menu

$(".general").click(function(){
    $(".generalsettingscontainer").animate({right: '0%'});
})

// Wanneer je op de sluit button klikt, sluit de uitschuif menu

$(".closebutton").click(function(){
    $(".generalsettingscontainer").animate({right: '-100%'});
})

// verwijder modal

$(".verwijder").click(function(){
    $(".confirmmodal").css("visibility", "visible");
    $(".blackbackground").css("visibility", "visible");
})

$(".modalno").click(function(){
    $(".confirmmodal").css("visibility", "hidden");
    $(".blackbackground").css("visibility", "hidden");
})