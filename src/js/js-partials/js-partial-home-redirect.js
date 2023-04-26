const bodyEl = document.querySelector('body');

if (bodyEl.classList.contains('home')) {

    setTimeout(function () {
        window.location.href = '/contact';
    }, 10000)

}