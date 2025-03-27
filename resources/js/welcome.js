// --- GSAP & ScrollTrigger Initialization ---
gsap.registerPlugin(ScrollTrigger);

// =====================
// 🎡 Carousel Animation
// =====================

const items = document.querySelectorAll(".item");
const itemContainer = document.querySelector(".item_container");
const carouselContainer = document.querySelector(".carousel_container");

if (items.length && itemContainer && carouselContainer) {
    const totalWidth = Array.from(items).reduce((acc, item) => {
        const style = window.getComputedStyle(item);
        const marginRight = parseFloat(style.marginRight);
        return acc + item.offsetWidth + marginRight;
    }, 0);

    const visibleWidth = carouselContainer.offsetWidth;
    const scrollDistance = Math.max(totalWidth - visibleWidth, 0);

    // Handles progress bars inside items
    const progressContainers = Array.from(items)
        .map((item) => item.querySelector(".progress_path")?.parentElement)
        .filter(Boolean);

    const animated = new Array(progressContainers.length).fill(false);

    // Reset progress bars to zero
    progressContainers.forEach((container) => {
        const targetWidth = container.style.width;
        container.setAttribute("data-target-width", targetWidth);
        container.style.width = "0%";
    });

    // Function to animate progress bars when visible
    function checkVisibility(containerX) {
        progressContainers.forEach((container, index) => {
            const item = container.closest(".item");
            const itemLeft = item.offsetLeft + containerX;
            const itemRight = itemLeft + item.offsetWidth;

            if (itemLeft < visibleWidth && itemRight > 0 && !animated[index]) {
                const targetWidth = container.getAttribute("data-target-width");
                gsap.to(container, {
                    width: targetWidth,
                    duration: 1,
                    ease: "power2.out",
                    delay: index * 0.1,
                });
                animated[index] = true;
            }
        });
    }

    // Scroll-based animation for the carousel
    gsap.to(".item_container", {
        x: -scrollDistance,
        ease: "power1.out",
        scrollTrigger: {
            trigger: ".section_progress",
            toggleActions: "play pause resume reset",
            start: "center center",
            end: `+=${scrollDistance * 1.2}`,
            scrub: 0.7,
            pin: true,
            anticipatePin: 1,
            invalidateOnRefresh: true,
            markers: false,
            fastScrollEnd: true,
            preventOverlaps: true,
            onUpdate: (self) => {
                const containerX = gsap.getProperty(".item_container", "x");
                checkVisibility(containerX);
            },
        },
    });

    checkVisibility(0); // Initial visibility check
}

// Refresh ScrollTrigger on resize
window.addEventListener("resize", () => {
    ScrollTrigger.refresh();
});

// =====================
// 🎨 SVG Animation
// =====================

const svg = document.querySelector("svg");
const path = document.querySelector("path");
const pathLength = path.getTotalLength();
const learnMore = document.querySelector(".btn-hero");

// Button click scrolls the page smoothly down
learnMore.addEventListener("click", () => {
    window.scrollBy({
        top: window.innerHeight,
        behavior: "smooth",
    });
});

// Stroke animation for SVG path
gsap.set(path, { strokeDasharray: pathLength });

gsap.fromTo(
    path,
    { strokeDashoffset: pathLength },
    {
        strokeDashoffset: 0,
        duration: 10,
        ease: "none",
        scrollTrigger: {
            trigger: ".svg_container",
            start: "top center",
            end: "bottom 80%",
            scrub: 1,
        },
    }
);

// =============================
// 🏆 Feature Cards Animations
// =============================

document.addEventListener("DOMContentLoaded", () => {
    // Fade-in effect for feature cards
    gsap.utils.toArray(".feature-card").forEach((card, index) => {
        gsap.to(card, {
            opacity: 1,
            y: 0,
            duration: 1,
            delay: index * 0.2,
            ease: "power3.out",
            scrollTrigger: {
                trigger: card,
                start: "top 85%",
                toggleActions: "play none none reverse",
            },
        });
    });

    // Subtle parallax effect on scroll
    gsap.utils.toArray(".feature-card").forEach((card) => {
        gsap.to(card, {
            y: "-10%",
            ease: "none",
            scrollTrigger: {
                trigger: card,
                start: "top bottom",
                end: "bottom top",
                scrub: true,
            },
        });
    });

    // Typing animation for the hero text
    new TypeIt(".hero-container > h1", {
        speed: 75,
        waitUntilVisible: true,
    })
        .type("Welcome to the Pleasure of Learning.")
        .move(-13)
        .delete(8, { speed: 123 })
        .pause(40)
        .type("Future")
        .move(null, { to: "END" })
        .go();
});

// =====================
// 🎭 Hero Section Animations
// =====================

// Fade-in effect for hero title
gsap.fromTo(
    ".hero-container h1",
    { opacity: 0, y: 20 },
    { opacity: 1, y: 0, duration: 1.2, delay: 0.3 }
);

// Scale and fade-out effect on scroll
gsap.to(".hero-container", {
    scale: 1.5,
    y: "30%",
    opacity: 0,
    duration: 1.2,
    scrollTrigger: {
        trigger: ".hero-container",
        end: "+=100%",
        start: "top 0",
        toggleActions: "play none none reverse",
        scrub: true,
    },
});

// Fade-in for hero paragraph and button
gsap.fromTo(".hero-container p", { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 1.2, delay: 5.7 });
gsap.fromTo(".btn-hero", { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 1.2, delay: 6 });

// Bouncing arrow animation
gsap.fromTo(
    "#arrow_down",
    { scale: 0.8, y: 4 },
    { y: -2, duration: 0.5, delay: 6, repeat: -1, yoyo: true, ease: "in-out" }
);

// =====================
// 📅 Event Cards Animations
// =====================

// Fade-in effect for each event card
gsap.utils.toArray(".event-card").forEach((card, index) => {
    gsap.fromTo(
        card,
        { opacity: 0, y: 50 },
        {
            opacity: 1,
            y: 0,
            duration: 1,
            delay: index * 0.2,
            ease: "power3.out",
            scrollTrigger: {
                trigger: card,
                start: "bottom bottom",
                toggleActions: "play none none reverse",
            },
        }
    );
});

// =====================
// ❓ FAQ Section Animations
// =====================

// Fade-in effect for FAQ items
gsap.utils.toArray(".faq-item").forEach((item, index) => {
    gsap.fromTo(
        item,
        { opacity: 0, y: 30 },
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: index * 0.1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: item,
                start: "top 85%",
                toggleActions: "play none none reverse",
            },
        }
    );
});

// FAQ expand/collapse logic
document.querySelectorAll(".faq-item").forEach((item) => {
    let content = item.querySelector(".faq-content");
    let icon = item.querySelector(".faq-icon");

    item.addEventListener("click", () => {
        let isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

        // Close all FAQ items before opening a new one
        document.querySelectorAll(".faq-content").forEach((c) => {
            c.style.maxHeight = "0px";
        });
        document.querySelectorAll(".faq-icon").forEach((i) => (i.textContent = "+"));

        if (!isOpen) {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.textContent = "-";
        }
    });
});
