/* Phone number validation */
var phone = document.getElementById('phoneNumber')
phone.addEventListener('input', () => {
phone.setCustomValidity('')
phone.checkValidity()
})

phone.addEventListener('invalid', () => {
if (phone.value === '') {
    phone.setCustomValidity('Phone number required!')
} 
else {
    phone.setCustomValidity('Phone number format: 1234567890',)
}})



/* Email address validation */
var eml = document.getElementById('email')
eml.addEventListener('input', () => {
eml.setCustomValidity('')
eml.checkValidity()
})

eml.addEventListener('invalid', () => {
if (eml.value === '') {
    eml.setCustomValidity('Email address required')
} 
else {
    eml.setCustomValidity('Email address format: abc+def@xyz.com',)
}})



/* Password validation */
var psw = document.getElementById('password')
psw.addEventListener('input', () => {
psw.setCustomValidity('')
psw.checkValidity()
})

psw.addEventListener('invalid', () => {
if (psw.value === '') {
    psw.setCustomValidity('Password required!')
} 
else {
    psw.setCustomValidity('Password format: 12#3_AB&C@%',)
}})