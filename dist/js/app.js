/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
(function () {})();
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

  menu = container.getElementsByTagName('ul')[0]; // Hide menu toggle button if menu is empty and return early.

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
  }; // Get all the link elements within the menu.


  links = menu.getElementsByTagName('a'); // Each time a menu link is focused or blurred, toggle focus.

  for (i = 0, len = links.length; i < len; i++) {
    links[i].addEventListener('focus', toggleFocus, true);
    links[i].addEventListener('blur', toggleFocus, true);
  }
  /**
  * Sets or removes .focus class on an element.
  */


  function toggleFocus() {
    var self = this; // Move up through the ancestors of the current link until we hit .nav-menu.

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
    var touchStartFn,
        i,
        parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    if ('ontouchstart' in window) {
      touchStartFn = function touchStartFn(e) {
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
  })(container);
})();

/***/ }),

/***/ "./resources/scss/customize-controls.scss":
/*!************************************************!*\
  !*** ./resources/scss/customize-controls.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/editor.scss":
/*!************************************!*\
  !*** ./resources/scss/editor.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/screen.scss":
/*!************************************!*\
  !*** ./resources/scss/screen.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\n\n>>>>>>> Stashed changes\n                      ^\n      Expected \"{\".\n   ╷\n83 │ >>>>>>> Stashed changes\n   │                        ^\n   ╵\n  resources/scss/components/_nav-menu.scss 83:24  @import\n  resources/scss/components/__index.scss 26:9     @import\n  stdin 26:9                                      root stylesheet\n      in /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/resources/scss/components/_nav-menu.scss (line 83, column 24)\n    at runLoaders (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/webpack/lib/NormalModule.js:316:20)\n    at /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/loader-runner/lib/LoaderRunner.js:367:11\n    at /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/loader-runner/lib/LoaderRunner.js:233:18\n    at context.callback (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at render (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass-loader/dist/index.js:89:7)\n    at Function.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:56230:16)\n    at _render_closure1.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:34691:12)\n    at _RootZone.runBinary$3$3 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:20227:18)\n    at _RootZone.runBinary$3 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:20231:19)\n    at _FutureListener.handleError$1 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18696:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18984:40)\n    at Object._Future__propagateToListeners (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3500:88)\n    at _Future._completeError$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18820:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18219:12)\n    at Object._asyncRethrow (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3256:17)\n    at /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:10615:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3279:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18240:12)\n    at _awaitOnObject_closure0.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18232:25)\n    at _RootZone.runBinary$3$3 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:20227:18)\n    at _RootZone.runBinary$3 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:20231:19)\n    at _FutureListener.handleError$1 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18696:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18984:40)\n    at Object._Future__propagateToListeners (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3500:88)\n    at _Future._completeError$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18820:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18219:12)\n    at Object._asyncRethrow (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3256:17)\n    at /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:12510:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3279:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18240:12)\n    at _awaitOnObject_closure0.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18232:25)\n    at _RootZone.runBinary$3$3 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:20227:18)\n    at _RootZone.runBinary$3 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:20231:19)\n    at _FutureListener.handleError$1 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18696:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18984:40)\n    at Object._Future__propagateToListeners (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3500:88)\n    at _Future._completeError$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18820:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18219:12)\n    at Object._asyncRethrow (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3256:17)\n    at /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:46403:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:3279:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/node_modules/sass/sass.dart.js:18240:12)");

/***/ }),

/***/ 0:
/*!**************************************************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/scss/screen.scss ./resources/scss/editor.scss ./resources/scss/customize-controls.scss ***!
  \**************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/resources/scss/screen.scss */"./resources/scss/screen.scss");
__webpack_require__(/*! /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/resources/scss/editor.scss */"./resources/scss/editor.scss");
module.exports = __webpack_require__(/*! /Users/steffen/Local Sites/rohcecc/app/public/wp-content/themes/the-biz/resources/scss/customize-controls.scss */"./resources/scss/customize-controls.scss");


/***/ })

/******/ });
//# sourceMappingURL=app.js.map