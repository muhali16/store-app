const toggleModal = document.getElementById('modal-button')
const modal = document.querySelector('#modal')
const closeModalBtn = document.getElementById('close-modal')

toggleModal.addEventListener('click', function(){
    modal.classList.remove('-top-[700px]')
    modal.classList.add('flex')
})

closeModalBtn.addEventListener('click', function(){
    modal.classList.add('-top-[700px]')
})