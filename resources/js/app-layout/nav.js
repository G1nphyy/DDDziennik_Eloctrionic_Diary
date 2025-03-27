// NAV menu, this expanded one

let nav_button = document.querySelector('body > .button > div > div');
let nav = document.querySelector('body > .nav-content');
let nav_content = document.querySelector('body > .nav-content > div:first-child');
let nav_wrapper = document.querySelector('body > .nav-content > div:last-child');
let nav_close_button = document.getElementById('close-menu');
nav_button.addEventListener('click', () => {
    nav.classList.remove("hidden");
    setTimeout(() => {
        nav_content.classList.add("w-xs");
    }, 10);
});
nav_wrapper.addEventListener("click", closeNav);
nav_close_button.addEventListener("click", closeNav);
function closeNav() {
    nav_content.classList.remove("w-xs");
    setTimeout(() => {
        nav.classList.add("hidden");
    }, 300)
}



// User Menu -> log in/out, settings etc.

let user_profile_picture_box = document.querySelector('body .user-profile-picture');
let user_profile_picture = user_profile_picture_box.querySelector('img');
let user_drop_down_menu = user_profile_picture_box.querySelector('div');
user_profile_picture.addEventListener('click', () => {
    user_drop_down_menu.classList.toggle("hidden");
})

// Making menu blurred and transparent

let nav_block = document.getElementById('nav-main_block');

document.addEventListener('scroll', () => {
    if (window.scrollY > 110) {
        nav_block.classList.add(
            "backdrop-blur-xs",
            "dark:bg-tonal-a0/20",
            "border-white/30",
        );
        nav_block.classList.remove(
            "dark:bg-tonal-a0",
            "border-white/0",
            "border-white/20"
        );
    } else {
        nav_block.classList.add(
            "dark:bg-tonal-a0",
            "bg-gray-800",
            "border-white/0"
        );
        nav_block.classList.remove(
            "backdrop-blur-xs",
            "dark:bg-tonal-a0/20",
            "border-white/30",
            "text-white"
        );
    }
});
