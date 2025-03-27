import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {



    // LOADING

    const wrapper = document.createElement('div');
    wrapper.className = "wrapper";

    const loader = document.createElement("div");
    loader.className = "loader";

    const loaderText = document.createElement("span");
    loaderText.className = "loader-text";
    loaderText.innerText = "loading";

    const load = document.createElement("span");
    load.className = "load";

    wrapper.appendChild(loader);
    loader.appendChild(loaderText);
    loader.appendChild(load);
    document.body.appendChild(wrapper);

    const style = document.createElement("style");
    style.innerHTML = `
        .wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100dvw;
            height: 100dvh;
            background-color: #111;
            z-index: 9998;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease-in-out;
        }

        .loader {
            width: 80px;
            height: 50px;
            position: relative;
            z-index: 9999;
        }

        .loader-text {
            position: absolute;
            top: 0;
            color: #C8B6FF;
            animation: text_713 3.5s ease both infinite;
            font-size: .8rem;
            letter-spacing: 1px;
            user-select: none;
        }

        .load {
            background-color: #9A79FF;
            border-radius: 50px;
            display: block;
            height: 16px;
            width: 16px;
            bottom: 0;
            position: absolute;
            transform: translateX(64px);
            animation: loading_713 3.5s ease both infinite;
        }

        .load::before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            background-color: #D1C2FF;
            border-radius: inherit;
            animation: loading2_713 3.5s ease both infinite;
        }

        @keyframes text_713 {
            0% { letter-spacing: 1px; transform: translateX(0px); }
            40% { letter-spacing: 2px; transform: translateX(26px); }
            80% { letter-spacing: 1px; transform: translateX(32px); }
            90% { letter-spacing: 2px; transform: translateX(0px); }
            100% { letter-spacing: 1px; transform: translateX(0px); }
        }

        @keyframes loading_713 {
            0% { width: 16px; transform: translateX(0px); }
            40% { width: 100%; transform: translateX(0px); }
            80% { width: 16px; transform: translateX(64px); }
            90% { width: 100%; transform: translateX(0px); }
            100% { width: 16px; transform: translateX(0px); }
        }

        @keyframes loading2_713 {
            0% { transform: translateX(0px); width: 16px; }
            40% { transform: translateX(0%); width: 80%; }
            80% { width: 100%; transform: translateX(0px); }
            90% { width: 80%; transform: translateX(15px); }
            100% { transform: translateX(0px); width: 16px; }
        }
    `;
    document.head.appendChild(style);

    window.addEventListener("load", () => {
        wrapper.style.opacity = "0";
        setTimeout(() => wrapper.remove(), 500);
    });


    // DARK MODE APPLYING

    const themeToggle = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;

    function applyTheme(theme) {
        if (theme === 'dark') {
            htmlElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            htmlElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    }

    applyTheme(localStorage.getItem('theme') || 'light');

    themeToggle.addEventListener('click', () => {
        applyTheme(htmlElement.classList.contains('dark') ? 'light' : 'dark');
    });

});
