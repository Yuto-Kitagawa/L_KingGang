const drop = document.getElementById('navbarDropdown');
drop.addEventListener('mouseover', function () {
    drop.classList.add('show');
    document.getElementsByClassName('dropdown-menu')[0].classList.add('show');
    drop.ariaExpanded = true;
})
const bar = document.querySelector('#menu-bar');
bar.addEventListener('mouseover', () => {
    drop.classList.add('show');
    document.getElementsByClassName('dropdown-menu')[0].classList.add('show');
    drop.ariaExpanded = true;
})

drop.addEventListener('mouseleave', function () {
    drop.classList.remove('show');
    document.getElementsByClassName('dropdown-menu')[0].classList.remove('show');
    drop.ariaExpanded = false;
})

bar.addEventListener('mouseleave', function () {
    drop.classList.remove('show');
    document.getElementsByClassName('dropdown-menu')[0].classList.remove('show');
    drop.ariaExpanded = false;
})