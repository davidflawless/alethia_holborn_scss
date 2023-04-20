/**
 *
 *
 */
if(window.innerWidth > 1200){

    // Second menu items
    let secondLevelMenuItemsWithChildrenEls = document.querySelectorAll('.template-partial-header__navigation-primary-list .menu-item ul.sub-menu li.menu-item.menu-item-has-children');

    console.log(secondLevelMenuItemsWithChildrenEls);

    secondLevelMenuItemsWithChildrenEls.forEach(element => {

        element.addEventListener('mouseenter', () => {

            console.log(element.offsetTop);

            // calculate negative margin to apply
            let negaiveMarginToApply = element.offsetTop - 48;

            let subMenuToEffect = element.querySelector('ul.sub-menu');
            
            subMenuToEffect.style.marginTop = '-' + negaiveMarginToApply + 'px';

        })

    });
    
}