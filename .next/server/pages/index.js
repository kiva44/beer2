/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(() => {
var exports = {};
exports.id = "pages/index";
exports.ids = ["pages/index"];
exports.modules = {

/***/ "./components/Button/Button.module.css":
/*!*********************************************!*\
  !*** ./components/Button/Button.module.css ***!
  \*********************************************/
/***/ ((module) => {

eval("// Exports\nmodule.exports = {\n\t\"button\": \"Button_button__QHarr\",\n\t\"primary\": \"Button_primary__0sjr_\",\n\t\"ghost\": \"Button_ghost__CCawS\",\n\t\"arrow\": \"Button_arrow__kcAci\",\n\t\"down\": \"Button_down__P08je\"\n};\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9jb21wb25lbnRzL0J1dHRvbi9CdXR0b24ubW9kdWxlLmNzcy5qcyIsIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG9wLWFwcC8uL2NvbXBvbmVudHMvQnV0dG9uL0J1dHRvbi5tb2R1bGUuY3NzPzBiMmEiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gRXhwb3J0c1xubW9kdWxlLmV4cG9ydHMgPSB7XG5cdFwiYnV0dG9uXCI6IFwiQnV0dG9uX2J1dHRvbl9fUUhhcnJcIixcblx0XCJwcmltYXJ5XCI6IFwiQnV0dG9uX3ByaW1hcnlfXzBzanJfXCIsXG5cdFwiZ2hvc3RcIjogXCJCdXR0b25fZ2hvc3RfX0NDYXdTXCIsXG5cdFwiYXJyb3dcIjogXCJCdXR0b25fYXJyb3dfX2tjQWNpXCIsXG5cdFwiZG93blwiOiBcIkJ1dHRvbl9kb3duX19QMDhqZVwiXG59O1xuIl0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./components/Button/Button.module.css\n");

/***/ }),

/***/ "./components/Htag/Htag.module.css":
/*!*****************************************!*\
  !*** ./components/Htag/Htag.module.css ***!
  \*****************************************/
/***/ ((module) => {

eval("// Exports\nmodule.exports = {\n\t\"h1\": \"Htag_h1__LidGa\",\n\t\"h2\": \"Htag_h2__ebpNZ\",\n\t\"h3\": \"Htag_h3__vsc_2\"\n};\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9jb21wb25lbnRzL0h0YWcvSHRhZy5tb2R1bGUuY3NzLmpzIiwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZXMiOlsid2VicGFjazovL3RvcC1hcHAvLi9jb21wb25lbnRzL0h0YWcvSHRhZy5tb2R1bGUuY3NzP2VlZmMiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gRXhwb3J0c1xubW9kdWxlLmV4cG9ydHMgPSB7XG5cdFwiaDFcIjogXCJIdGFnX2gxX19MaWRHYVwiLFxuXHRcImgyXCI6IFwiSHRhZ19oMl9fZWJwTlpcIixcblx0XCJoM1wiOiBcIkh0YWdfaDNfX3ZzY18yXCJcbn07XG4iXSwibmFtZXMiOltdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./components/Htag/Htag.module.css\n");

/***/ }),

/***/ "./components/Button/Button.tsx":
/*!**************************************!*\
  !*** ./components/Button/Button.tsx ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"Button\": () => (/* binding */ Button)\n/* harmony export */ });\n/* harmony import */ var react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-dev-runtime */ \"react/jsx-dev-runtime\");\n/* harmony import */ var react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _Button_module_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Button.module.css */ \"./components/Button/Button.module.css\");\n/* harmony import */ var _Button_module_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_Button_module_css__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ \"classnames\");\n/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);\n\n\n\nconst Button = ({ appearance , arrow =\"none\" , children , className , ...props })=>{\n    return /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(\"button\", {\n        className: classnames__WEBPACK_IMPORTED_MODULE_1___default()((_Button_module_css__WEBPACK_IMPORTED_MODULE_2___default().button), className, {\n            [(_Button_module_css__WEBPACK_IMPORTED_MODULE_2___default().primary)]: appearance == \"primary\",\n            [(_Button_module_css__WEBPACK_IMPORTED_MODULE_2___default().ghost)]: appearance == \"ghost\"\n        }),\n        ...props,\n        children: [\n            children,\n            arrow != \"none\" && /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(\"span\", {\n                className: classnames__WEBPACK_IMPORTED_MODULE_1___default()((_Button_module_css__WEBPACK_IMPORTED_MODULE_2___default().arrow), {\n                    [(_Button_module_css__WEBPACK_IMPORTED_MODULE_2___default().down)]: arrow == \"down\"\n                })\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\components\\\\Button\\\\Button.tsx\",\n                lineNumber: 16,\n                columnNumber: 24\n            }, undefined)\n        ]\n    }, void 0, true, {\n        fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\components\\\\Button\\\\Button.tsx\",\n        lineNumber: 8,\n        columnNumber: 3\n    }, undefined);\n};\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9jb21wb25lbnRzL0J1dHRvbi9CdXR0b24udHN4LmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUF5QztBQUViO0FBR3JCLE1BQU1FLE1BQU0sR0FBRyxDQUFDLEVBQUVDLFVBQVUsR0FBRUMsS0FBSyxFQUFHLE1BQU0sR0FBRUMsUUFBUSxHQUFFQyxTQUFTLEdBQUUsR0FBR0MsS0FBSyxFQUFlLEdBQWtCO0lBQ2xILHFCQUNDLDhEQUFDQyxRQUFNO1FBQ05GLFNBQVMsRUFBRUwsaURBQUUsQ0FBQ0Qsa0VBQWEsRUFBRU0sU0FBUyxFQUFFO1lBQ3ZDLENBQUNOLG1FQUFjLENBQUMsRUFBRUcsVUFBVSxJQUFJLFNBQVM7WUFDekMsQ0FBQ0gsaUVBQVksQ0FBQyxFQUFFRyxVQUFVLElBQUksT0FBTztTQUNyQyxDQUFDO1FBQ0QsR0FBR0ksS0FBSzs7WUFFUkYsUUFBUTtZQUNSRCxLQUFLLElBQUksTUFBTSxrQkFBSSw4REFBQ08sTUFBSTtnQkFBQ0wsU0FBUyxFQUFFTCxpREFBRSxDQUFDRCxpRUFBWSxFQUFFO29CQUNyRCxDQUFDQSxnRUFBVyxDQUFDLEVBQUVJLEtBQUssSUFBSSxNQUFNO2lCQUM5QixDQUFDOzs7Ozt5QkFHSzs7Ozs7O2lCQUdFLENBQ1Q7Q0FDRixDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG9wLWFwcC8uL2NvbXBvbmVudHMvQnV0dG9uL0J1dHRvbi50c3g/NDE2OCJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgc3R5bGVzIGZyb20gJy4vQnV0dG9uLm1vZHVsZS5jc3MnO1xyXG5pbXBvcnQgeyBCdXR0b25Qcm9wcyB9IGZyb20gJy4vQnV0dG9uLnByb3BzJztcclxuaW1wb3J0IGNuIGZyb20gJ2NsYXNzbmFtZXMnO1xyXG5cclxuXHJcbmV4cG9ydCBjb25zdCBCdXR0b24gPSAoeyBhcHBlYXJhbmNlLCBhcnJvdyA9ICdub25lJywgY2hpbGRyZW4sIGNsYXNzTmFtZSwgLi4ucHJvcHMgfTogQnV0dG9uUHJvcHMpOiBKU1guRWxlbWVudCA9PiB7XHJcblx0cmV0dXJuIChcclxuXHRcdDxidXR0b25cclxuXHRcdFx0Y2xhc3NOYW1lPXtjbihzdHlsZXMuYnV0dG9uLCBjbGFzc05hbWUsIHtcclxuXHRcdFx0XHRbc3R5bGVzLnByaW1hcnldOiBhcHBlYXJhbmNlID09ICdwcmltYXJ5JyxcclxuXHRcdFx0XHRbc3R5bGVzLmdob3N0XTogYXBwZWFyYW5jZSA9PSAnZ2hvc3QnXHJcblx0XHRcdH0pfVxyXG5cdFx0XHR7Li4ucHJvcHN9XHJcblx0XHQ+XHJcblx0XHRcdHtjaGlsZHJlbn1cclxuXHRcdFx0e2Fycm93ICE9ICdub25lJyAmJiA8c3BhbiBjbGFzc05hbWU9e2NuKHN0eWxlcy5hcnJvdywge1xyXG5cdFx0XHRcdFtzdHlsZXMuZG93bl06IGFycm93ID09ICdkb3duJ1xyXG5cdFx0XHR9KX0+XHJcblxyXG5cclxuXHRcdFx0PC9zcGFuPn1cclxuXHJcblxyXG5cdFx0PC9idXR0b24gPlxyXG5cdCk7XHJcbn07Il0sIm5hbWVzIjpbInN0eWxlcyIsImNuIiwiQnV0dG9uIiwiYXBwZWFyYW5jZSIsImFycm93IiwiY2hpbGRyZW4iLCJjbGFzc05hbWUiLCJwcm9wcyIsImJ1dHRvbiIsInByaW1hcnkiLCJnaG9zdCIsInNwYW4iLCJkb3duIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./components/Button/Button.tsx\n");

/***/ }),

/***/ "./components/Htag/Htag.tsx":
/*!**********************************!*\
  !*** ./components/Htag/Htag.tsx ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"Htag\": () => (/* binding */ Htag)\n/* harmony export */ });\n/* harmony import */ var react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-dev-runtime */ \"react/jsx-dev-runtime\");\n/* harmony import */ var react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _Htag_module_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Htag.module.css */ \"./components/Htag/Htag.module.css\");\n/* harmony import */ var _Htag_module_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_Htag_module_css__WEBPACK_IMPORTED_MODULE_1__);\n\n\nconst Htag = ({ tag , children  })=>{\n    switch(tag){\n        case \"h1\":\n            return /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(\"h1\", {\n                className: (_Htag_module_css__WEBPACK_IMPORTED_MODULE_1___default().h1),\n                children: children\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\components\\\\Htag\\\\Htag.tsx\",\n                lineNumber: 10,\n                columnNumber: 11\n            }, undefined);\n        case \"h2\":\n            return /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(\"h2\", {\n                className: (_Htag_module_css__WEBPACK_IMPORTED_MODULE_1___default().h2),\n                children: children\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\components\\\\Htag\\\\Htag.tsx\",\n                lineNumber: 12,\n                columnNumber: 11\n            }, undefined);\n        case \"h3\":\n            return /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(\"h3\", {\n                className: (_Htag_module_css__WEBPACK_IMPORTED_MODULE_1___default().h3),\n                children: children\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\components\\\\Htag\\\\Htag.tsx\",\n                lineNumber: 14,\n                columnNumber: 11\n            }, undefined);\n        default:\n            return /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.Fragment, {}, void 0, false);\n    }\n};\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9jb21wb25lbnRzL0h0YWcvSHRhZy50c3guanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7QUFBQTtBQUN1QztBQUdoQyxNQUFNQyxJQUFJLEdBQUcsQ0FBQyxFQUFFQyxHQUFHLEdBQUVDLFFBQVEsR0FBYSxHQUFrQjtJQUdsRSxPQUFRRCxHQUFHO1FBQ1YsS0FBSyxJQUFJO1lBQ1IscUJBQU8sOERBQUNFLElBQUU7Z0JBQUNDLFNBQVMsRUFBRUwsNERBQVM7MEJBQUdHLFFBQVE7Ozs7O3lCQUFNLENBQUM7UUFDbEQsS0FBSyxJQUFJO1lBQ1IscUJBQU8sOERBQUNHLElBQUU7Z0JBQUNELFNBQVMsRUFBRUwsNERBQVM7MEJBQUdHLFFBQVE7Ozs7O3lCQUFNLENBQUM7UUFDbEQsS0FBSyxJQUFJO1lBQ1IscUJBQU8sOERBQUNJLElBQUU7Z0JBQUNGLFNBQVMsRUFBRUwsNERBQVM7MEJBQUdHLFFBQVE7Ozs7O3lCQUFNLENBQUM7UUFDbEQ7WUFBUyxxQkFBTyw2SUFBSyxDQUFDO0tBQ3RCO0NBRUQsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovL3RvcC1hcHAvLi9jb21wb25lbnRzL0h0YWcvSHRhZy50c3g/OWI2ZiJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyBIdGFnUHJvcHMgfSBmcm9tICcuL0h0YWcucHJvcHMnO1xyXG5pbXBvcnQgc3R5bGVzIGZyb20gJy4vSHRhZy5tb2R1bGUuY3NzJztcclxuXHJcblxyXG5leHBvcnQgY29uc3QgSHRhZyA9ICh7IHRhZywgY2hpbGRyZW4gfTogSHRhZ1Byb3BzKTogSlNYLkVsZW1lbnQgPT4ge1xyXG5cclxuXHJcblx0c3dpdGNoICh0YWcpIHtcclxuXHRcdGNhc2UgJ2gxJzpcclxuXHRcdFx0cmV0dXJuIDxoMSBjbGFzc05hbWU9e3N0eWxlcy5oMX0+e2NoaWxkcmVufTwvaDE+O1xyXG5cdFx0Y2FzZSAnaDInOlxyXG5cdFx0XHRyZXR1cm4gPGgyIGNsYXNzTmFtZT17c3R5bGVzLmgyfT57Y2hpbGRyZW59PC9oMj47XHJcblx0XHRjYXNlICdoMyc6XHJcblx0XHRcdHJldHVybiA8aDMgY2xhc3NOYW1lPXtzdHlsZXMuaDN9PntjaGlsZHJlbn08L2gzPjtcclxuXHRcdGRlZmF1bHQ6IHJldHVybiA8PjwvPjtcclxuXHR9XHJcblxyXG59OyJdLCJuYW1lcyI6WyJzdHlsZXMiLCJIdGFnIiwidGFnIiwiY2hpbGRyZW4iLCJoMSIsImNsYXNzTmFtZSIsImgyIiwiaDMiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./components/Htag/Htag.tsx\n");

/***/ }),

/***/ "./components/index.ts":
/*!*****************************!*\
  !*** ./components/index.ts ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Htag_Htag__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Htag/Htag */ \"./components/Htag/Htag.tsx\");\n/* harmony reexport (unknown) */ var __WEBPACK_REEXPORT_OBJECT__ = {};\n/* harmony reexport (unknown) */ for(const __WEBPACK_IMPORT_KEY__ in _Htag_Htag__WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== \"default\") __WEBPACK_REEXPORT_OBJECT__[__WEBPACK_IMPORT_KEY__] = () => _Htag_Htag__WEBPACK_IMPORTED_MODULE_0__[__WEBPACK_IMPORT_KEY__]\n/* harmony reexport (unknown) */ __webpack_require__.d(__webpack_exports__, __WEBPACK_REEXPORT_OBJECT__);\n/* harmony import */ var _Button_Button__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Button/Button */ \"./components/Button/Button.tsx\");\n/* harmony reexport (unknown) */ var __WEBPACK_REEXPORT_OBJECT__ = {};\n/* harmony reexport (unknown) */ for(const __WEBPACK_IMPORT_KEY__ in _Button_Button__WEBPACK_IMPORTED_MODULE_1__) if(__WEBPACK_IMPORT_KEY__ !== \"default\") __WEBPACK_REEXPORT_OBJECT__[__WEBPACK_IMPORT_KEY__] = () => _Button_Button__WEBPACK_IMPORTED_MODULE_1__[__WEBPACK_IMPORT_KEY__]\n/* harmony reexport (unknown) */ __webpack_require__.d(__webpack_exports__, __WEBPACK_REEXPORT_OBJECT__);\n\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9jb21wb25lbnRzL2luZGV4LnRzLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUE0QjtBQUNJIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG9wLWFwcC8uL2NvbXBvbmVudHMvaW5kZXgudHM/ZjJjNCJdLCJzb3VyY2VzQ29udGVudCI6WyJleHBvcnQgKiBmcm9tICcuL0h0YWcvSHRhZyc7XHJcbmV4cG9ydCAqIGZyb20gJy4vQnV0dG9uL0J1dHRvbic7Il0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./components/index.ts\n");

/***/ }),

/***/ "./pages/index.tsx":
/*!*************************!*\
  !*** ./pages/index.tsx ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ Home)\n/* harmony export */ });\n/* harmony import */ var react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-dev-runtime */ \"react/jsx-dev-runtime\");\n/* harmony import */ var react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components */ \"./components/index.ts\");\n\n\nfunction Home() {\n    return /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.Fragment, {\n        children: [\n            /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(_components__WEBPACK_IMPORTED_MODULE_1__.Htag, {\n                tag: \"h1\",\n                children: \"\\u0420\\u0435\\u0439\\u0442\\u0438\\u043D\\u0433 \\u043F\\u0430\\u0431\\u043E\\u0432 \\u043F\\u043E \\u0432\\u0435\\u0440\\u0441\\u0438\\u0438 \\u041F\\u0438\\u0432\\u043E\\u0434\\u043D\\u044F\"\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\pages\\\\index.tsx\",\n                lineNumber: 8,\n                columnNumber: 7\n            }, this),\n            /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(_components__WEBPACK_IMPORTED_MODULE_1__.Button, {\n                appearance: \"primary\",\n                children: \"\\u041A\\u043D\\u043E\\u043F\\u043A\\u0430\"\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\pages\\\\index.tsx\",\n                lineNumber: 9,\n                columnNumber: 7\n            }, this),\n            /*#__PURE__*/ (0,react_jsx_dev_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxDEV)(_components__WEBPACK_IMPORTED_MODULE_1__.Button, {\n                appearance: \"ghost\",\n                arrow: \"right\",\n                children: \"\\u041A\\u043D\\u043E\\u043F\\u043A\\u04302\"\n            }, void 0, false, {\n                fileName: \"D:\\\\VSCODE\\\\top-app\\\\top-app\\\\pages\\\\index.tsx\",\n                lineNumber: 10,\n                columnNumber: 7\n            }, this)\n        ]\n    }, void 0, true);\n};\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9wYWdlcy9pbmRleC50c3guanMiLCJtYXBwaW5ncyI6Ijs7Ozs7OztBQUFBO0FBQTZDO0FBRTlCLFNBQVNFLElBQUksR0FBZ0I7SUFFMUMscUJBQ0U7OzBCQUVFLDhEQUFDRiw2Q0FBSTtnQkFBQ0csR0FBRyxFQUFDLElBQUk7MEJBQUMsd0tBQStCOzs7OztvQkFBa0M7MEJBQ3JELDhEQUExQkYsK0NBQU07Z0JBQUNHLFVBQVUsRUFBQyxTQUFTOzBCQUFDLHNDQUFNOzs7OztvQkFBZTswQkFDNUMsOERBQUxILCtDQUFNO2dCQUFDRyxVQUFVLEVBQUMsT0FBTztnQkFBQ0MsS0FBSyxFQUFDLE9BQU87MEJBQUMsdUNBQU87Ozs7O29CQUFTOztvQkFFeEQsQ0FDSDtDQUNIIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG9wLWFwcC8uL3BhZ2VzL2luZGV4LnRzeD8wN2ZmIl0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IEh0YWcsIEJ1dHRvbiB9IGZyb20gJy4uL2NvbXBvbmVudHMnO1xuXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBIb21lKCk6IEpTWC5FbGVtZW50IHtcblxuICByZXR1cm4gKFxuICAgIDw+XG5cbiAgICAgIDxIdGFnIHRhZz0naDEnPtCg0LXQudGC0LjQvdCzINC/0LDQsdC+0LIg0L/QviDQstC10YDRgdC40Lgg0J/QuNCy0L7QtNC90Y88L0h0YWc+XG4gICAgICA8QnV0dG9uIGFwcGVhcmFuY2U9J3ByaW1hcnknPtCa0L3QvtC/0LrQsDwvQnV0dG9uPlxuICAgICAgPEJ1dHRvbiBhcHBlYXJhbmNlPSdnaG9zdCcgYXJyb3c9J3JpZ2h0Jz7QmtC90L7Qv9C60LAyPC9CdXR0b24+XG5cbiAgICA8Lz5cbiAgKTtcbn1cbiJdLCJuYW1lcyI6WyJIdGFnIiwiQnV0dG9uIiwiSG9tZSIsInRhZyIsImFwcGVhcmFuY2UiLCJhcnJvdyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./pages/index.tsx\n");

/***/ }),

/***/ "classnames":
/*!*****************************!*\
  !*** external "classnames" ***!
  \*****************************/
/***/ ((module) => {

"use strict";
module.exports = require("classnames");

/***/ }),

/***/ "react/jsx-dev-runtime":
/*!****************************************!*\
  !*** external "react/jsx-dev-runtime" ***!
  \****************************************/
/***/ ((module) => {

"use strict";
module.exports = require("react/jsx-dev-runtime");

/***/ })

};
;

// load runtime
var __webpack_require__ = require("../webpack-runtime.js");
__webpack_require__.C(exports);
var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
var __webpack_exports__ = (__webpack_exec__("./pages/index.tsx"));
module.exports = __webpack_exports__;

})();