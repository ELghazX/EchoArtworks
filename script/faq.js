document.querySelectorAll(".faq-question").forEach(question => {
    question.addEventListener("click", () => {
        const answer = question.nextElementSibling;
        answer.style.display = answer.style.display === "block" ? "none" : "block";
    });
});

document.querySelector('.show-more').addEventListener('click', function() {
    this.classList.toggle('active');
    this.innerText = this.classList.contains('active') ? 'Read Less' : 'Read More';
  });
  
  