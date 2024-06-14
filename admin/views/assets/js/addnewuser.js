function setError(input, message) {
    let sibling = input.nextElementSibling
    sibling.innerHTML = message
}

function clearError(input) {
    let sibling = input.nextElementSibling
    sibling.innerHTML = ''
}

function checkName(input) {
    let nameReg = /^[^\d]+$/
    if(input.value === '') {
        setError(input, '(*) Vui lòng nhập tên!')
        return false
    } else if(!input.value.match(nameReg)) {
        setError(input, '(*) Tên không hợp lệ!')
        return false
    } else {
        clearError(input) 
        return true
    }
}

function checkEmail(input) {
    if(input.value !== '') {
        let emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        if(!input.value.match(emailReg)) {
            setError(input, '(*) Email không hợp lệ!')
            return false
        } else {
            clearError(input)
            return true
        }   
    }
    return true
}

function checkPhoneNum(input) {
    let phoneReg = /^0\d{9}$/
    if(input.value === '') {
        setError(input, '(*) Vui lòng nhập số điện thoại!')
        return false
    } else if(!input.value.match(phoneReg)) {
        setError(input, '(*) Số điện thoại không hợp lệ!')
        return false
    } else {
        clearError(input)
        return true
    }
}

function checkPass(input) {
    if(input.value === '') {
        setError(input, '(*) Vui lòng nhập mật khẩu!')
        return false
    } else if(input.value.length < 6) {
        setError(input, '(*) Mật khẩu nên có trên 5 kí tự!')
        return false
    } else {
        clearError(input)
        return true
    }
}

function checkRole(input) {
    if(input.value.toUpperCase() !== 'ADMIN' && input.value.toUpperCase() !== 'USER') {
        setError(input, '(*) Vui lòng nhập admin/user!')
        return false;
    } else {
        clearError(input)
        return true
    }
}

const addBtn = document.querySelector('.add')
const nameVal = document.querySelector('.name')
const phoneVal = document.querySelector('.phone')
const emailVal = document.querySelector('.email')
const passVal = document.querySelector('.password')
const roleVal = document.querySelector('.role')
addBtn.addEventListener('click', (e) => {
    if(!checkName(nameVal) || !checkPhoneNum(phoneVal) || !checkEmail(emailVal) || !checkPass(passVal) || !checkRole(roleVal)) {
        e.preventDefault()
        checkName(nameVal)
        checkPhoneNum(phoneVal)
        checkEmail(emailVal)
        checkPass(passVal)
        checkRole(roleVal)
    }
})