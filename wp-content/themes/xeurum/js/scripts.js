window.addEventListener('scroll', function() {
    let scrollpos = window.scrollY
    const header = document.querySelector('header');

    scrollpos = window.scrollY;
    if (scrollpos >= 1) {
        header.classList.add('fixed')
    } else {
        header.classList.remove('fixed')
    }
})