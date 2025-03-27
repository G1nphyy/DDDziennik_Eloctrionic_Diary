let next_button = document.getElementById("nextButton");
let card1 = document.getElementById("card1");
let card2 = document.getElementById("card2");
let line1 = document.getElementById("line1");
let line2 = document.getElementById("line2");
let linein2 = document.getElementById("linein2");
next_button.addEventListener("click", function(event){
    event.preventDefault();
    card1.classList.toggle("hidden");
    card2.classList.toggle("hidden");
    linein2.classList.toggle("w-full");
})
line1.addEventListener("click", function(event){
    card1.classList.remove("hidden");
    card2.classList.add("hidden");

    linein2.classList.remove("w-full");
})
line2.addEventListener("click", function(event){
    card1.classList.add("hidden");
    card2.classList.remove("hidden");
    linein2.classList.add("w-full");
})
