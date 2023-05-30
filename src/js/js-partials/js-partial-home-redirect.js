const bodyEl = document.querySelector('body');

if (bodyEl.classList.contains('home')) {

    setTimeout(function () {
        window.location.href = '/contact';
    }, 9200)

}

document.querySelector('.front-page-group').addEventListener('click', function () { window.location.href = '/contact'; });