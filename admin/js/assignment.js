const addAssesBtn = document.getElementById('add-asses-btn')
const viewAssesBtn = document.getElementById('view-asses-btn')

const formSec = document.querySelector('.add-assesment-form')
const cardsSec = document.querySelector('.cards')

addAssesBtn.addEventListener("click", () => {
    addAssesBtn.classList.add('btn-active')
    viewAssesBtn.classList.remove('btn-active')

    formSec.style.display = 'flex'
    cardsSec.style.display = 'none'
})

viewAssesBtn.addEventListener("click", () => {
    viewAssesBtn.classList.add('btn-active')
    addAssesBtn.classList.remove('btn-active')

    cardsSec.style.display = 'flex'
    formSec.style.display = 'none'
})


// DISPLAY STUDENTS IN FORM

const addStdBtn = document.querySelector('.add-std-btn')
const deleteStdBtn = document.querySelector('.delete-std-btn')
const stdTable = document.querySelector('.std-table')

addStdBtn.addEventListener("click", () => {
    stdTable.style.display = 'table'
    addStdBtn.style.display = 'none'
    deleteStdBtn.style.display = 'flex'
})
deleteStdBtn.addEventListener('click', () => {
    stdTable.style.display = 'none'
    addStdBtn.style.display = 'flex'
    deleteStdBtn.style.display = 'none'
})