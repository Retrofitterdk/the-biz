/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   TheBiz
 * @author    Steffen Bang Nielsen <sbn@retrofitter.dk>
 * @copyright 2018 Steffen Bang Nielsen
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://retrofitter.dk
 */

/**
 * A simple immediately-invoked function expression to kick-start
 * things and encapsulate our code.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
(function () {

})();

/**
* File navigation.js.
*
* Handles toggling the navigation menu for small screens and enables TAB key
* navigation support for dropdown menus.
*/
(function () {
    var body, container, menuopen, backdrop, menuclose, menu, links, i, len;

    body = document.body;
    if (!body) {
        return;
    }

    container = document.getElementById('site-navigation');
    if (!container) {
        return;
    }

    menuopen = document.getElementsByClassName('menu-toggle')[0];
    if ('undefined' === typeof menuopen) {
        return;
    }

    menuclose = document.getElementsByClassName('menu-toggle')[1];
    if ('undefined' === typeof menuclose) {
        return;
    }

    backdrop = document.getElementsByClassName('backdrop')[0];
    if ('undefined' === typeof backdrop) {
        return;
    }

    menu = container.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        menuopen.style.display = 'none';
        return;
    }

    menu.setAttribute('aria-expanded', 'false');
    if (-1 === menu.className.indexOf('nav-menu')) {
        menu.className += ' nav-menu';
    }

    menuopen.onclick = function (event) {
        body.classList.add('no-scroll');
        container.setAttribute('aria-expanded', 'true');
        menuopen.setAttribute('aria-expanded', 'true');
        menuclose.setAttribute('aria-expanded', 'true');
        menu.setAttribute('aria-expanded', 'true');
        event.preventDefault();
    };

    menuclose.onclick = function (event) {
        body.classList.remove('no-scroll');
        container.setAttribute('aria-expanded', 'false');
        menuopen.setAttribute('aria-expanded', 'false');
        menuclose.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-expanded', 'false');
        event.preventDefault();
    };

    backdrop.onclick = function (event) {
        body.classList.remove('no-scroll');
        container.setAttribute('aria-expanded', 'false');
        menuopen.setAttribute('aria-expanded', 'false');
        menuclose.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-expanded', 'false');
        event.preventDefault();
    };

    // Get all the link elements within the menu.
    links = menu.getElementsByTagName('a');

    // Each time a menu link is focused or blurred, toggle focus.
    for (i = 0, len = links.length; i < len; i++) {
        links[i].addEventListener('focus', toggleFocus, true);
        links[i].addEventListener('blur', toggleFocus, true);
    }

	/**
	* Sets or removes .focus class on an element.
	*/
    function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while (-1 === self.className.indexOf('nav-menu')) {

            // On li elements toggle the class .focus.
            if ('li' === self.tagName.toLowerCase()) {
                if (-1 !== self.className.indexOf('focus')) {
                    self.className = self.className.replace(' focus', '');
                } else {
                    self.className += ' focus';
                }
            }

            self = self.parentElement;
        }
    }

	/**
	* Toggles `focus` class to allow submenu access on tablets.
	*/
    (function (container) {
        var touchStartFn, i,
            parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

        if ('ontouchstart' in window) {
            touchStartFn = function (e) {
                var menuItem = this.parentNode,
                    i;

                if (!menuItem.classList.contains('focus')) {
                    e.preventDefault();
                    for (i = 0; i < menuItem.parentNode.children.length; ++i) {
                        if (menuItem === menuItem.parentNode.children[i]) {
                            continue;
                        }
                        menuItem.parentNode.children[i].classList.remove('focus');
                    }
                    menuItem.classList.add('focus');
                } else {
                    menuItem.classList.remove('focus');
                }
            };

            for (i = 0; i < parentLink.length; ++i) {
                parentLink[i].addEventListener('touchstart', touchStartFn, false);
            }
        }
    }(container));
})();
