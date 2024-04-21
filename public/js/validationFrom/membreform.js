console.log('salma');
const form=document.getElementById('ajouterMembreForm')
const nom=document.getElementById('nom')
const telephone=document.getElementById('telephone')
const motdepasse=document.getElementById('motdepasse')


form.addEventListener('submit', e =>{
    e.preventDefault();
    validateInputs();
});
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
const validateInputs = () => {
    const nomValue=nom.value.trim();
    const prenomValue=prenom.value.trim();
    const emailValue=email.value.trim();
    const telephoneValue=telephone.value.trim();
    const motdepassedValue = motdepasse.value.trim();
    const imageValue=image.value.trim()
    if(nomValue === ''){
        setError(nom, 'Nom de formateur requis')
    } else {
        setSuccess(nom);
    }
    if(prenomValue === ''){
        setError(prenom, 'Prenom de formateur requis')
    } else {
        setSuccess(prenom);
    }
    if(emailValue === ''){
        setError(email, 'email de formateur requis')
    } else if(!isValidEmail(emailValue)) {
        setError(email, 'un email de formateur non valid')
    } else {
        setSuccess(email);
    }
    if(telephoneValue === ''){
        setError(telephone, 'telephone de formateur requis')
    } else {
        setSuccess(telephone);
    }
    if(motdepassedValue === '') {
        setError(motdepasse, 'le mot de passe est requis');
    } else if (motdepassedValue.length < 8 ) {
        setError(motdepasse, 'le mot de passe doit contenir au moins 8 character.')
    } else {
        setSuccess(motdepasse);
    }
    if(imageValue === '') {
        setError(image, 'image de formation requis');
    }else {
        setSuccess(image);
    }
};