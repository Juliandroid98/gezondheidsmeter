var collapse = document.getElementsByClassName("collapsible");
var i;
$( function() {
    chart('arbeid');
    chart('alles');
    $( "#accordion" ).accordion();
} );
for (i = 0; i < collapse.length; i++) {
    collapse[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        chart(this.id);
        content.style.display = "block";

    });
}
