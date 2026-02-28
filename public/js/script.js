
    setTimeout(() => {
        document.querySelectorAll('.btn').forEach(el => {
            el.style.transition = "opacity 0.5s";
            el.style.opacity = "0";
        });
    }, 4000);
