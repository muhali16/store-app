
        const closeModalBtn = document.querySelector('#close-notiff-modal')
        const modal = document.querySelector('#notif-modal')
        
        closeModalBtn.addEventListener('click', function(){
            modal.classList.add('hidden')
        })