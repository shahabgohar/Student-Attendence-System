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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/attendence.js":
/*!************************************!*\
  !*** ./resources/js/attendence.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var dropdownAttendence = document.getElementById('dropdown-attendence');
document.addEventListener('click', function (e) {
  if (dropdownAttendence.style.display === "block") {
    var preventIds = ['dropdown-attendence', 'dd', 'dropdown-attendence'];
    var mouseOverElement = document.elementFromPoint(e.clientX, e.clientY);
    var shouldFalse = 0;

    for (var i = 0; i < preventIds.length; i++) {
      if (mouseOverElement.id === preventIds[i]) {
        shouldFalse++;
      }
    }

    if (shouldFalse === 0) {
      dropdownAttendence.style.display = "none";
    }
  }
});

function closeDropDownAttendence() {
  alert("hello");

  if (dropdownAttendence.style.display === "none") {
    dropdownAttendence.style.display = "block";
  } else {
    dropdownAttendence.style.display = "none";
  }
}

var studentRecord = null;
window.axios.get(window.appUrl + "/student/attendence/list").then(function (response) {
  console.log(response.data);
  studentRecord = response.data;
  loadData();
})["catch"](function (error) {
  console.log(error);
});

function loadData() {
  var menuOptions = [{
    value: 'present',
    label: 'present'
  }, {
    value: 'absent',
    label: 'absent'
  }];
  var displayOptions = [{
    value: 'present',
    label: 'present'
  }, {
    value: 'absent',
    label: 'absent'
  }];
  var inputEditor = new cheetahGrid.columns.action.InlineInputEditor();
  var grid = new cheetahGrid.ListGrid({
    // Parent element on which to place the grid
    parentElement: document.querySelector('.attendence-result'),
    // Header definition
    header: [{
      field: 'check',
      caption: '',
      width: '3%',
      columnType: 'check',
      action: 'check'
    }, {
      field: 'id',
      caption: 'ID',
      width: '3%'
    }, {
      field: 'first_name',
      caption: 'First Name',
      width: '20.5%'
    }, {
      field: 'last_name',
      caption: 'Last Name',
      width: '20.5%'
    }, {
      field: 'attendence_date',
      caption: 'Date',
      width: '20.5%',
      action: new cheetahGrid.columns.action.SmallDialogInputEditor({
        type: 'date',
        classList: ['al-right']
      })
    }, {
      field: 'status',
      caption: 'Attendence Status',
      width: '20.5%',
      columnType: new cheetahGrid.columns.type.MenuColumn({
        options: menuOptions
      }),
      action: new cheetahGrid.columns.action.InlineMenuEditor({
        options: displayOptions
      })
    }, {
      caption: 'Update',
      width: '6%',
      style: {
        buttonBgColor: 'green'
      },
      columnType: new cheetahGrid.columns.type.ButtonColumn({
        caption: 'Update'
      }),
      action: new cheetahGrid.columns.action.ButtonAction({
        action: function action(rec) {
          axios.post("/student/attendence/list/update/".concat(rec.id), rec).then(function (response) {
            console.log(response);
          })["catch"](function (error) {
            console.log(error);
          });
        }
      })
    }, {
      caption: 'Delete',
      width: '6%',
      style: {
        buttonBgColor: 'red'
      },
      columnType: new cheetahGrid.columns.type.ButtonColumn({
        caption: 'Delete'
      }),
      action: new cheetahGrid.columns.action.ButtonAction({
        action: function action(rec) {
          axios["delete"]("/student/attendence/list/delete/".concat(rec.id)).then(function (response) {
            console.log(response);
          })["catch"](function (error) {
            console.log(error);
          });
        }
      })
    }],
    // Array data to be displayed on the grid
    records: studentRecord,
    // Column fixed position
    frozenColCount: 2
  });
}

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/js/attendence.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/resources/js/attendence.js */"./resources/js/attendence.js");


/***/ })

/******/ });