const listInfoShow = document.querySelector('.list-info-show')
const listInfo = document.querySelector('.list-info')
listInfoShow.addEventListener('click' , ()=>{
  listInfo.classList.toggle('show')
})

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
