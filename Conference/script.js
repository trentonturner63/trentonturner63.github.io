function myFunction() {
    var x = document.getElementById("nav");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}