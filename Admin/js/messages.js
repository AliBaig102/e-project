const reply = document.querySelectorAll(".userMessage > button");
reply.forEach((el) => {
    el.addEventListener("click", (e) => {
        const parent = e.currentTarget.parentElement;
        const form = parent.querySelector("form");
        form.classList.toggle("active");
    });
})