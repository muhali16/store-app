const toggleMenu = document.querySelector('#menu-toggle')
const navbar = document.querySelector('#nav-menu')

toggleMenu.addEventListener('click', function(){
    navbar.classList.toggle('hidden')
    toggleMenu.classList.toggle('scale-75')
    toggleMenu.classList.toggle('bg-blue-500')
})
