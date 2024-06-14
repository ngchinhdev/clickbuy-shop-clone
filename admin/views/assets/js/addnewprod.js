function setError(input, message) {
    let sibling = input.nextElementSibling
    sibling.innerHTML = message
}

function clearError(input) {
    let sibling = input.nextElementSibling
    sibling.innerHTML = ''
}

function checkValues(inputs) {
    let flag = true
    inputs.forEach(input => {
        if(input.value === '') {
            setError(input, '(*) Vui lòng nhập!')
            flag = false
        } else {
            if(input.classList.contains('ip-num')) {
                if(isNaN(input.value)) {
                    setError(input, '(*) Vui lòng nhập số!')
                    flag = false
                } else {
                    clearError(input)
                }
            } else {
               clearError(input)
            }
        }
    });
    return flag
}

function checkEmptyFiles(input) {
    if(input.files.length === 0) {
        setError(input, '(*) Vui lòng chọn tệp!')
        flag = false
    } else if(input.files.length < 2) {
        setError(input, '(*) Vui lòng chọn tối thiểu 2 tệp!')
        flag = false
    } else if(input.files.length > 6) {
        setError(input, '(*) Vui lòng chọn tối đa 5 tệp!')
        flag = false
    } else {
        clearError(input)
        return true
    }
}

const addBtn = document.querySelector('.add')
const inputsAll = document.querySelectorAll('.ip')
const inputsFile = document.querySelector('.ip-imgs')
addBtn.addEventListener('click', (e) => {
    if(!checkValues(inputsAll) || !checkEmptyFiles(inputsFile)) {
        e.preventDefault()
        checkValues(inputsAll)
        checkEmptyFiles(inputsFile)
    }
})