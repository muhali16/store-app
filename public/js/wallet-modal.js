const toggleModal = document.getElementById('modal-button')
const modal = document.querySelector('#modal')
const closeModalBtn = document.querySelector('#close-modal')
const closeModalBtn2 = document.querySelector('#close-notiff-modal')
const modal2 = document.querySelector('#notiff-modal')

toggleModal.addEventListener('click', function(){
    modal.classList.remove('-top-[500px]')
})

closeModalBtn.addEventListener('click', function(){
    modal.classList.add('-top-[500px]')
})

closeModalBtn2.addEventListener('click', function(){
    modal2.classList.add('hidden')
})