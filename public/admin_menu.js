const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', function() {
    const modal = document.querySelector(button.dataset.modalTarget)
    const nama = button.getAttribute("data-nama")
    openModal(modal,nama)
  })
})

overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})

function openModal(modal,nama) {
  if (modal == null) return
  modal.classList.add('active')
  overlay.classList.add('active')
 const change = modal.querySelector("#namaMakanan")
 change.innerHTML = `apakah anda yakin ingin menghapus ${nama}`
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}