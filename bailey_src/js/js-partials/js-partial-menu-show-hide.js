/**
 *
 *
 */


// console.log('This is a test : menu show / hide');

const headerEl = document.querySelector('.template-partial-header');

let menuItems = [];

// Get all toggle els
const menuServicesEl = document.querySelector('#menu-item-9064');

const menuContactEl = document.querySelector('#menu-item-43');

const menuFAQEl = document.querySelector('#menu-item-42');

menuItems.push(menuServicesEl, menuContactEl, menuFAQEl);

const desktopWidth = 1200;

// desktop up
const heroTextEl = document.querySelector('.abstract-typography-wysiwyg-editor-standard-light__hero');

if (window.innerWidth > desktopWidth) {
    

    menuItems.forEach(element => {
    

        element.addEventListener('mouseenter', () => {

            // Add class to header
            headerEl.classList.add('template-partial-header__menu-open');

        })

        element.addEventListener('mouseleave', () => {

            // Remove class to header
            headerEl.classList.remove('template-partial-header__menu-open');

        })

    });

}
