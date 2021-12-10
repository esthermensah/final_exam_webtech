// console.log('script');


//validating first name
const fname = document.getElementById('fname');
const erroMsg = document.getElementById('error');
const validateFname = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(fname.value);
    if(!fname.value){
        erroMsg.style.color="red";
        erroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        erroMsg.style.color="";
        erroMsg.innerText = "";
    }
}


//validating middle name
const Mname = document.getElementById('Mname');
const MerroMsg = document.getElementById('Merror');
const validateMname = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(Mname.value);
    if(!Mname.value){
        MerroMsg.style.color="red";
        MerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        MerroMsg.style.color="";
        MerroMsg.innerText = "";
    }
}

//validating last name
const lname = document.getElementById('lname');
const lerroMsg = document.getElementById('lerror');
const validateLname = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(lname.value);
    if(!lname.value){
        lerroMsg.style.color="red";
        lerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        lerroMsg.style.color="";
        lerroMsg.innerText = "";
    }
}

//validating DOB
const Dob = document.getElementById('DOB');
const derroMsg = document.getElementById('derror');
const validateDate = (e) =>{
    if(!Dob.value){
        derroMsg.style.color="red";
        derroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    } 
    else{
        derroMsg.style.color="";
        derroMsg.innerText = "";
    }
}

//validating staff position
const position = document.getElementById('staffposition');
const poserroMsg = document.getElementById('poserror');
const validatePos = (e) =>{
    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;
    const testNameReg = fullnamereg.test(position.value);
    if(!position.value){
        poserroMsg.style.color="red";
        poserroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        poserroMsg.style.color="red";
        poserroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        poserroMsg.style.color="";
        poserroMsg.innerText = "";
    }
}

//validating ssn
const socialnum = document.getElementById('SSN');
const ssnerroMsg = document.getElementById('ssnerror');
const validateSSN = (e) =>{
    const parnumreg = /^[0-9]*$/;
    const testNameReg = parnumreg.test(socialnum.value);
    if(!socialnum.value){
        ssnerroMsg.style.color="red";
        ssnerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        ssnerroMsg.style.color="red";
        ssnerroMsg.innerText = "Wrong input, enter a number";
        e.preventDefault();
    }
    else{
        ssnerroMsg.style.color="";
        ssnerroMsg.innerText = "";
    }
}

//validating salary
const salnum = document.getElementById('salary');
const salerroMsg = document.getElementById('Serror');
const validateS = (e) =>{
    const salnumreg = /^[0-9]*$/;
    const testNameReg = salnumreg.test(salnum.value);
    if(!salnum.value){
        salerroMsg.style.color="red";
        salerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        salerroMsg.style.color="red";
        salerroMsg.innerText = "Wrong input, enter a number";
        e.preventDefault();
    }
    else{
        salerroMsg.style.color="";
        salerroMsg.innerText = "";
    }
}

//validating contact
const contact = document.getElementById('contact');
const conerroMsg = document.getElementById('conerror');
const validateCon = (e) =>{
    const contactreg = /^[0-9]*$/;
    const testNameReg = contactreg.test(contact.value);
    if(!contact.value){
        conerroMsg.style.color="red";
        conerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        conerroMsg.style.color="red";
        conerroMsg.innerText = "Wrong input, enter a number";
        e.preventDefault();
    }
    else{
        conerroMsg.style.color="";
        conerroMsg.innerText = "";
    }
}

//validating nationality
const nationality = document.getElementById('nationality');
const nerroMsg = document.getElementById('nerror');
const validateN = (e) =>{
    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;
    const testNameReg = fullnamereg.test(nationality.value);
    if(!nationality.value){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "wrong input, you can't enter numbers";
        e.preventDefault();
    }
    else{
        nerroMsg.style.color="";
        nerroMsg.innerText = "";
    }
}

//validating email
const email = document.getElementById('email');
const cerroMsg = document.getElementById('crerror');
const validateE = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(email.value);
    if(!email.value){
        cerroMsg.style.color="red";
        cerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    // else if(!testNameReg){
    //     aerroMsg.style.color="red";
    //     aerroMsg.innerText = "wrong input";
    //     e.preventDefault();
    // }
    else{
        cerroMsg.style.color="";
        cerroMsg.innerText = "";
    }
}