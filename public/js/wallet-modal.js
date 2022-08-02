const toggleModal = document.querySelector('#modal-button')
const modal = document.querySelector('#modal')
const closeModalBtn = document.querySelector('#close-modal')
const closeModalBtn2 = document.querySelector('#close-notiff-modal')
const modal2 = document.querySelector('#notiff-modal')

toggleModal.addEventListener('click', function(){
    modal.classList.toggle('hidden')
    modal.classList.toggle('flex')
})

closeModalBtn.addEventListener('click', function(){
    modal.classList.add('hidden')
    modal.classList.remove('flex')
})

closeModalBtn2.addEventListener('click', function(){
    modal2.classList.add('hidden')
})