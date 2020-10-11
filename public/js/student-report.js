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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/student-report.js":
/*!****************************************!*\
  !*** ./resources/js/student-report.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var rollNumber = null;
var studentClass = null;
var from_date = null;
var to_date = null;
var shouldSubmit = false;
Livewire.on('checkRollNumber', function (data) {
  var val = Number(document.getElementById(data[0]).value);

  if (val == 0) {
    document.getElementById(data[1]).style.display = "block";
    shouldSubmit = false;
  } else {
    document.getElementById(data[1]).style.display = "none";
    shouldSubmit = true;
  }

  rollNumber = val;
});
Livewire.on('checkClass', function (data) {
  var val = Number(document.getElementById(data[0]).value);

  if (val > 12 || val == 0) {
    document.getElementById(data[1]).style.display = "block";
    shouldSubmit = false;
  } else {
    document.getElementById(data[1]).style.display = "none";
    shouldSubmit = true;
  }

  studentClass = val;
});
Livewire.on('dateChecker', function (id) {
  var val = new Date(document.getElementById(id[0]).value);
  var d = val.getFullYear() + "-" + val.getMonth() + "-" + val.getDate();
  if (id[1] === '1') from_date = d;else to_date = d;
});
Livewire.on('submitForReport', function () {
  if (from_date !== null && to_date !== null && shouldSubmit !== false) {
    axios.get("http://127.0.0.1:8000/student/report?from_date=".concat(from_date, "&to_date=").concat(to_date, "&student_class_id=").concat(studentClass, "&roll_number=").concat(rollNumber), {
      responseType: 'blob'
    }).then(function (response) {
      // let blob = new Blob([response.data], { type:   'application/pdf' } );
      // let link = document.createElement('a');
      // link.href = window.URL.createObjectURL(blob);
      // link.download = 'Report.pdf';
      // link.click();
      console.log(response);
      var blob = new Blob([response.data], {
        type: 'application/pdf'
      }),
          url = window.URL.createObjectURL(blob);
      window.open(url); // const byteCharacters = atob(response.data.file);
      // const byteNumber = new Array(byteCharacters.length)
      // for (let i =0; i<byteCharacters.length;i++){
      //     byteNumber[i] = byteCharacters.charCodeAt(i)
      // }
      // const  byteTyped = new Blob([byteNumber],{type:'application/pdf'})
      // FileSaver.saveAs(new Blob([response.data]))
      // download(atob(data.file),data.email,'application/pdf')

      console.log(data);
    })["catch"](function (error) {
      console.log(error);
    });
  }
});

/***/ }),

/***/ 4:
/*!**********************************************!*\
  !*** multi ./resources/js/student-report.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/resources/js/student-report.js */"./resources/js/student-report.js");


/***/ })

/******/ });