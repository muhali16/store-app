
const closeNotify = document.getElementById('close-notify')
const notify = document.getElementById('notify')

closeNotify.addEventListener('click', () => {
    notify.classList.add('hidden')
})