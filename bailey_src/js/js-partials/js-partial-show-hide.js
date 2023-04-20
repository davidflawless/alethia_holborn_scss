/**
 *
 *
 */


// console.log('This is a test : nav toggle');

// Get all toggle els
let collapseToggleEls = document.querySelectorAll('.collapse-toggle');

collapseToggleEls.forEach(myFunction);

function myFunction(item) {    
    


    item.addEventListener('click', (el) => {

        let parentEl = '';
        
        if(el.target.classList.contains('collapse-toggle')){
            //all good
            parentEl = el.target;

        } else {
            // if child find parent
            parentEl = el.target.closest('.collapse-toggle');

        }

            
        // find question element 
        let questionEl = parentEl.querySelector('.abstract-typography-wysiwyg-editor-standard-light__faq');

        if(!questionEl.classList.contains('open')){

            questionEl.classList.remove('closed');
        
            questionEl.classList.add('open');

        } else {

            questionEl.classList.add('closed');

            questionEl.classList.remove('open');

            };

        // ..find the next sibling..
        let nextElelemntSiblingEl = parentEl.nextElementSibling;

        // ..get the height of the siblings 'answer group' ..
        let nextElelemntSiblingGroupHeightEl = nextElelemntSiblingEl.querySelector('.acf-field-group-2-flexable-layout-full-width-faqs__answer-group');

        // console.log(nextElelemntSiblingGroupHeightEl.offsetHeight);

        // ..show / hide the 'answer group'
        if(!nextElelemntSiblingEl.classList.contains('open')){

            nextElelemntSiblingEl.style.height = nextElelemntSiblingGroupHeightEl.offsetHeight + 'px';

            nextElelemntSiblingEl.classList.remove('closed');
            
            nextElelemntSiblingEl.classList.add('open');

        } else {

            nextElelemntSiblingEl.style.height = '';

            nextElelemntSiblingEl.classList.add('closed');

            nextElelemntSiblingEl.classList.remove('open');

        };

    });

}