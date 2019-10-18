var collapse = document.getElementsByClassName("collapsible");
var i;
$( function() {
    chart("arbeid");
    $( "#accordion" ).accordion();
} );

    for (i = 0; i < collapse.length; i++) {
    collapse[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        content.style.display = "block";
        chart(this.id);
    });
    }
