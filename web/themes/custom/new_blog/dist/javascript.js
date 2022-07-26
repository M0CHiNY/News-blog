/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scss/_libs.scss":
/*!*****************************!*\
  !*** ./src/scss/_libs.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/_libs.scss?");

/***/ }),

/***/ "./src/scss/footer/_footer.scss":
/*!**************************************!*\
  !*** ./src/scss/footer/_footer.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/footer/_footer.scss?");

/***/ }),

/***/ "./src/scss/header/_header.scss":
/*!**************************************!*\
  !*** ./src/scss/header/_header.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/header/_header.scss?");

/***/ }),

/***/ "./src/scss/header/_menu.scss":
/*!************************************!*\
  !*** ./src/scss/header/_menu.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/header/_menu.scss?");

/***/ }),

/***/ "./src/scss/header/_search.scss":
/*!**************************************!*\
  !*** ./src/scss/header/_search.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/header/_search.scss?");

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/main.scss?");

/***/ }),

/***/ "./src/scss/regions/_regions.scss":
/*!****************************************!*\
  !*** ./src/scss/regions/_regions.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://light-webpack/./src/scss/regions/_regions.scss?");

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scss_libs_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/_libs.scss */ \"./src/scss/_libs.scss\");\n/* harmony import */ var _scss_regions_regions_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scss/regions/_regions.scss */ \"./src/scss/regions/_regions.scss\");\n/* harmony import */ var _scss_header_header_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./scss/header/_header.scss */ \"./src/scss/header/_header.scss\");\n/* harmony import */ var _scss_footer_footer_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./scss/footer/_footer.scss */ \"./src/scss/footer/_footer.scss\");\n/* harmony import */ var _scss_header_menu_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./scss/header/_menu.scss */ \"./src/scss/header/_menu.scss\");\n/* harmony import */ var _scss_header_search_scss__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./scss/header/_search.scss */ \"./src/scss/header/_search.scss\");\n/* harmony import */ var _scss_main_scss__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./scss/main.scss */ \"./src/scss/main.scss\");\n/* harmony import */ var _js_menu_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./js/menu.js */ \"./src/js/menu.js\");\n/* harmony import */ var _js_menu_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_js_menu_js__WEBPACK_IMPORTED_MODULE_7__);\n/*\nscss\n */\n\n\n\n\n\n\n\n\n\n\n\n// js\n\n\n\n\n\n\n\n//# sourceURL=webpack://light-webpack/./src/index.js?");

/***/ }),

/***/ "./src/js/menu.js":
/*!************************!*\
  !*** ./src/js/menu.js ***!
  \************************/
/***/ (() => {

eval("(function ($, Drupal) {\n  // I want some code to run on page load, so I use Drupal.behaviors\n  Drupal.behaviors.burger_menu = {\n    attach: function (context, settings) {\n\n      let $button = $('<div class=\"close-button\"></div>').click(function () {\n\n        $(\".primary-nav\").removeClass(\"btn-active\");\n      })\n\n      $('.header-nav .block-menu', context).once('burger_menu').append($button);\n      $(\".mobile-menu__btn\").click(\n        function () {\n          $(\".primary-nav\").addClass(\"btn-active\");\n        }\n      );\n    }\n  };\n}(jQuery, Drupal));\n\n\n//# sourceURL=webpack://light-webpack/./src/js/menu.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;