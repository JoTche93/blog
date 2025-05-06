document.addEventListener('DOMContentLoaded', function() {
    const formCrearPost = document.getElementById('formCrearPost');

    if (formCrearPost) {
        formCrearPost.addEventListener("submit", function(e) {
            const titulo = formCrearPost.querySelector("input[name='titulo']").value.trim();
            const contenido = formCrearPost.querySelector("textarea[name='contenido']").value.trim();

            if (!titulo || !contenido) {
                e.preventDefault();
                alert("Por favor, completa todos los campos.");
            }
        });
    }

    const modoEvaBtn = document.getElementById('modoEva02');
    const logo = document.getElementById('logoImg');

    if (modoEvaBtn && logo) {
        modoEvaBtn.addEventListener('click', function() {
            if (document.body.classList.contains('modo-eva02')) {
                document.body.classList.remove('modo-eva02');
                document.body.classList.add('modo-eva01');
                logo.src = 'https://raw.githubusercontent.com/gianmazzoran/mecha-01/main/images/mecha-01-logo.png';
                modoEvaBtn.textContent = 'EVA-02';
            } else {
                document.body.classList.remove('modo-eva01');
                document.body.classList.add('modo-eva02');
                logo.src = 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/d0b5b429896105.56ed80e1d4cb3.jpg'; // imagen EVA-02
                modoEvaBtn.textContent = 'EVA-01';
            }
        });
    }
});
