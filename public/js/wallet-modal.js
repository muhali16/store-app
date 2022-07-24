
        const toggleModal = document.querySelector('#modal-button')
        const modal = document.querySelector('#modal')
        
        toggleModal.addEventListener('click', function(){
            modal.classList.toggle('hidden')
            modal.classList.toggle('flex')
        })
        
        const closeModalBtn = document.querySelector('#close-modal')
        
        closeModalBtn.addEventListener('click', function(){
            modal.classList.add('hidden')
            modal.classList.remove('flex')
        })