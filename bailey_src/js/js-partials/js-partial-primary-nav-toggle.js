/**
 *
 *
 */
if(window.innerWidth < 1200){

    // Nav burger toggle
    const burgerEl                  = document.getElementById('burger');
    const navGroupEl                = document.getElementsByClassName('template-partial-header__navigation-primary-group');		
    const navPrimaryListEl          = document.getElementsByClassName('template-partial-header__navigation-primary-list');
    const navPrimaryListElHeight    = navPrimaryListEl[0].clientHeight;
    const allSubMenuUlEls             = document.querySelectorAll('ul.sub-menu');

    function toggleNavGroupOpen () {

        navGroupEl[0].setAttribute("style", "height:" + navPrimaryListElHeight + "px");

        // Add background overlay
        const node = document.createElement('div');
        node.classList.add('navbgd');
        document.body.appendChild(node);


    }

    function toggleNavGroupClose () {

        navGroupEl[0].removeAttribute("style");
        navGroupEl[0].setAttribute("style", "height: 0");

        // Remove style from all sub-menus
        allSubMenuUlEls.forEach(element => {

            element.removeAttribute("style");
            navGroupEl[0].setAttribute("style", "height: 0");
            
        });

        let navbgdEl = document.querySelector('.navbgd');

        // navbgdEl
        document.body.removeChild(navbgdEl);
        

    }

    const toggle_nav = () => {

        burgerEl.classList.toggle('open');
        
        if (burgerEl.classList.contains('open')) {
            toggleNavGroupOpen();
        } else {
            toggleNavGroupClose();
        }
            
    }

    burgerEl.addEventListener('click', event => {
        
        toggle_nav();

    });


    // Child list items toggle
    const listItemsWithChildren = document.querySelectorAll('li.menu-item-has-children');

    listItemsWithChildren.forEach(element => {
        
        // find menu item fum a sub-menu
        let childSubMenuUlEl = element.querySelector('ul.sub-menu');

        // Find the 
        let childLinkEl = (element.querySelector(':scope > a'));

        childLinkEl.addEventListener('click', (e) => {
            
            // Prevent the link
            e.preventDefault();

            // Sum total
            let sum = 0;



            // console.log(e.target);



            // Is this a top level item e.g. not a sub menu
            let topLevelMenuItemEl = e.target.closest('ul');




            //find sub-menu;
            let targetSubMenuUlEl = element.querySelector('ul.sub-menu');
            
            // console.log(targetSubMenuUlEl);





































            // If sub Menu Element height === 0
            //
            if (targetSubMenuUlEl.clientHeight === 0 ) {

                // console.log('more height');

                // Fund all the sub-menu list items
                let subMenuLiEls = targetSubMenuUlEl.querySelectorAll(':scope > li');
                
                // The sum of the li items in the submenu
                subMenuLiEls.forEach((element) => {

                    sum += element.clientHeight;

                });
                
                // Set sub-Menu height greater than 0
                targetSubMenuUlEl.setAttribute("style", "height:" + sum + "px");
              
                // Add class name sub-menu--open
                targetSubMenuUlEl.classList.add('sub-menu--open');

                

                // Set height for parent sub-menu
                let subMenuParentEl = e.target.closest('ul.sub-menu');
                
                if (subMenuParentEl) { 

                    // parent sub-menu height
                    let subMenuParentElHeight = subMenuParentEl.clientHeight;
                
                    // Calculate new height for parent
                    let subMenuParentElHeightNew = subMenuParentElHeight + sum;

                    // Apply calculation
                    subMenuParentEl.setAttribute("style", "height:" + subMenuParentElHeightNew + "px");

                }

                // * Calculate new heights after sub menu open
                //
                // * Update nav group height container
                //
                // Get initial overall parent menu height
                let navGroupElHeight = navGroupEl[0].clientHeight;

                // console.log(navGroupElHeight);

                // console.log(sum);

                // // Sum of parent menu and clicked sub-menu elements
                let newNavGroupElHeight = navGroupElHeight + sum;

                // Set new height for menu group
                navGroupEl[0].setAttribute("style", "height:" + newNavGroupElHeight + "px");

            } else {

















































                // If sub Menu Element height > 0
                if(topLevelMenuItemEl.classList.contains('sub-menu')){


                    // console.log(parentSubMenuEl);

                    // // Get parent sub-menu height : 504px;
                    let parentSubMenuEl = targetSubMenuUlEl.closest('ul.sub-menu--open');

                    // close sub menu
                    parentSubMenuEl.setAttribute("style", "height:0");

                    // Calculate hight of upper parent parent by summing the height of the child list els
                    let upperParentSubMenuEl = parentSubMenuEl.previousElementSibling.closest('ul.sub-menu--open');     

                    // Get first-child as this will always be the right hight as it will not contain a ul
                    let subMenuLiElsFirstItem = upperParentSubMenuEl.querySelectorAll(':scope > li:first-child');

                    //  Get the number of direct LI children
                    let subMenuLiEls = upperParentSubMenuEl.querySelectorAll(':scope > li');

                    // The sum of the li items in the submenu
                    sum = 0;
                    
                    // Calculate combined li children height
                    subMenuLiEls.forEach(() => {
                        
                        sum += subMenuLiElsFirstItem[0].clientHeight;

                    });

                    // Set sub-Menu height greater than 0
                    upperParentSubMenuEl.setAttribute("style", "height:" + sum + "px");


                } else {

                    // console.log('top level clicked');
                    // console.log(e.target);
                    // console.log(e.target.closest('li.menu-item'));
                    // console.log(e.target.closest('li.menu-item').querySelector('.sub-menu--open'));

                    let targetSubMenuOpenEl= e.target.closest('li.menu-item').querySelector('.sub-menu--open');

                    // console.log(targetSubMenuOpenEl)

                    targetSubMenuOpenEl.setAttribute("style", "height:0");

                    // Remove 'sub-menu--open' class
                    targetSubMenuOpenEl.classList.remove('sub-menu--open');

                    
                    // Get all other sub menus that are open as we need their parent li heights
                    let allOpensubMenuEls = document.querySelectorAll('.sub-menu--open');

                    // console.log(allOpensubMenuEls);

                    // Sum their heights
                    let allOpensubMenuElsSum = 0;

                    allOpensubMenuEls.forEach(element => {
                        
                        allOpensubMenuElsSum += element.clientHeight;

                    });

                    // console.log(allOpensubMenuElsSum);

                    // Set height of parent container

                    let newheight = navPrimaryListElHeight + allOpensubMenuElsSum;

                    navGroupEl[0].setAttribute("style", "height:" + newheight + "px");                
                    
                }

            }            

        });

    });

}

window.addEventListener('resize', () => {

    navGroupEl[0].removeAttribute("style");

    // Remove style from all sub-menus
    allSubMenuUlEls.forEach(element => {

        element.removeAttribute("style");
        
    });

    let navbgdEl = document.querySelector('.navbgd');

    // navbgdEl
    document.body.removeChild(navbgdEl);

    burgerEl.classList.remove('open');
    
})