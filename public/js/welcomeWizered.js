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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/welcomeWizered.js":
/*!****************************************!*\
  !*** ./resources/js/welcomeWizered.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".domainTabs").click(function () {
  $('.domainTabs').removeClass('active');
  $(this).addClass('active');
  var currentTab = $(this).attr('data-id');

  if (currentTab == "buyNewDomain") {
    $(".buyNewDomain").css('display', 'block');
    $(".alreadyHaveDomain").css('display', 'none');
  } else {
    $(".buyNewDomain").css('display', 'none');
    $(".alreadyHaveDomain").css('display', 'block');
  }

  emptyDomainRelatedMessage();
});

function emptyDomainRelatedMessage() {
  $('#domainMessagesCenter').removeClass('alert-danger').removeClass('alert-success').text('');
}

function domainRelatedMessage(message) {
  var isDanger = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  if (isDanger) {
    $('#domainMessagesCenter').removeClass('alert-danger').addClass('alert-danger').text(message);
  } else {
    $('#domainMessagesCenter').removeClass('alert-success').addClass('alert-success').text(message);
  }
}

function validateDomain(the_domain) {
  // strip off "http://" and/or "www."
  the_domain = the_domain.trim();
  the_domain = the_domain.replace("http://", "");
  the_domain = the_domain.replace("www.", "");
  var reg = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;

  if (reg.test(the_domain) == false) {
    $('#alreadyHaveDomainInput').focus();
    domainRelatedMessage('Please Enter a valid domain', true);
    return false;
  } else {
    emptyDomainRelatedMessage();
    return true;
  }
}

$("#alreadyHaveADomain").click(function () {
  var domain = $("#alreadyHaveDomainInput").val();
  var result = validateDomain(domain);

  if (result) {
    alert('Under Development');
    return false;
  }
});
$("#needNewDomainSearch").click(function () {
  var domain = $("#searchForNewDomain").val();
  var result = validateDomain(domain);

  if (result) {
    alert('Under Development');
    return false;
  }
});

/***/ }),

/***/ 1:
/*!**********************************************!*\
  !*** multi ./resources/js/welcomeWizered.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /code/websites/personal/Full/flexSited/resources/js/welcomeWizered.js */"./resources/js/welcomeWizered.js");


/***/ })

/******/ });