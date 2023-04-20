/**
 * 
 * :: Primary nav toggle
 * 
 */


const templateHeaderEl = document.querySelector('#header');

const primaryNavToggleEl = document.querySelector('#burger');

const primaryNavToggleListEl = document.querySelector('#holborn-nav');

burger.addEventListener('click', (e) => {

    primaryNavToggleListEl.classList.toggle('open');   
    
    templateHeaderEl.classList.toggle('open');   

});