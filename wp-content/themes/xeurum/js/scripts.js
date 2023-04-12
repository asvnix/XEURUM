window.addEventListener('scroll', function() {
    let scrollpos = window.scrollY;
    const header = document.querySelector('header');

    scrollpos = window.scrollY;
    if (scrollpos >= 1) {
        header.classList.add('fixed')
    } else {
        header.classList.remove('fixed')
    }
})

const burger = document.querySelector('#burger');
const burger2 = document.querySelector('#burger2');

if(burger) {
    burger.addEventListener('click', (e) => {
        burger.parentElement.classList.toggle('open');
    });
}