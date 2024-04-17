const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#passwordConfirm');
const form = document.querySelector('#regForm');
//Form Moblie vession
const form_m = document.querySelector('#regForm_m');
const emailEl_m = document.querySelector('#email_m');
const passwordEl_m = document.querySelector('#password_m');
const confirmPasswordEl_m = document.querySelector('#passwordConfirm_m');

if (form_m != null) {

    form_m.addEventListener('submit', function(e) {
        // prevent the form from submitting
        /*  e.preventDefault(); */


        // validate fields
        let isEmailValid = checkEmail_m(),
            isPasswordValid = checkPassword_m(),
            isConfirmPasswordValid = checkConfirmPassword_m();

        let isFormValid =
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid;
        console.log('email:' + isEmailValid, 'Password: ' + isPasswordValid, 'ConPass: ' + isConfirmPasswordValid)


        // submit to the server if the form is valid
        if (isFormValid) {

            form_m.submit();
        } else {
            e.preventDefault();
        }
    });
}


const checkEmail_m = () => {
    let valid = false;
    const email = emailEl_m.value.trim();
    if (!isRequired(email)) {
        showError(emailEl_m, 'Email cannot be blank.');
    } else if (!isEmailValid(email)) {
        showError(emailEl_m, 'Email is not valid.')
    } else {
        showSuccess(emailEl_m);
        valid = true;
    }
    return valid;
};

const checkPassword_m = () => {
    let valid = false;


    const password = passwordEl_m.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl_m, 'Password cannot be blank.');
    } else {
        showSuccess(passwordEl_m);
        valid = true;
    }

    return valid;
};

const checkConfirmPassword_m = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl_m.value.trim();
    const password = passwordEl_m.value.trim();

    if (!isRequired(confirmPassword)) {
        showError(confirmPasswordEl_m, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl_m, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl_m);
        valid = true;
    }

    return valid;
};

//END Form Moblie vession
const checkEmail = () => {
    let valid = false;
    const email = emailEl.value.trim();
    if (!isRequired(email)) {
        showError(emailEl, 'Email cannot be blank.');
    } else if (!isEmailValid(email)) {
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;


    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();

    if (!isRequired(confirmPassword)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }

    return valid;
};

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

// const isPasswordSecure = (password) => {
//     const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
//     return re.test(password);
// };

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;


const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}

if (form != null) {
    form.addEventListener('submit', function(e) {
        // prevent the form from submitting
        // e.preventDefault();



        let isEmailValid = checkEmail(),
            isPasswordValid = checkPassword(),
            isConfirmPasswordValid = checkConfirmPassword();

        let isFormValid =
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid;

        // submit to the server if the form is valid
        if (isFormValid) {

            document.querySelector('#regForm').submit();
        } else {
            e.preventDefault();
        }

        // validate fields

    });
}



const debounce = (fn, delay = 5000) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

if (form != null) {
    form.addEventListener('input', debounce(function(e) {
        switch (e.target.id) {

            case 'email':
                checkEmail();
                break;
            case 'password':
                checkPassword();
                break;
            case 'passwordConfirmation':
                checkConfirmPassword();
                break;
        }
    }));
}