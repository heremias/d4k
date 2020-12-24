/*! Sortable 1.10.2 - MIT | git://github.com/SortableJS/Sortable.git */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t=t||self).Sortable=e()}(this,function(){"use strict";function o(t){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function a(){return(a=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t}).apply(this,arguments)}function I(i){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{},e=Object.keys(r);"function"==typeof Object.getOwnPropertySymbols&&(e=e.concat(Object.getOwnPropertySymbols(r).filter(function(t){return Object.getOwnPropertyDescriptor(r,t).enumerable}))),e.forEach(function(t){var e,n,o;e=i,o=r[n=t],n in e?Object.defineProperty(e,n,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[n]=o})}return i}function l(t,e){if(null==t)return{};var n,o,i=function(t,e){if(null==t)return{};var n,o,i={},r=Object.keys(t);for(o=0;o<r.length;o++)n=r[o],0<=e.indexOf(n)||(i[n]=t[n]);return i}(t,e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);for(o=0;o<r.length;o++)n=r[o],0<=e.indexOf(n)||Object.prototype.propertyIsEnumerable.call(t,n)&&(i[n]=t[n])}return i}function e(t){return function(t){if(Array.isArray(t)){for(var e=0,n=new Array(t.length);e<t.length;e++)n[e]=t[e];return n}}(t)||function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function t(t){if("undefined"!=typeof window&&window.navigator)return!!navigator.userAgent.match(t)}var w=t(/(?:Trident.*rv[ :]?11\.|msie|iemobile|Windows Phone)/i),E=t(/Edge/i),c=t(/firefox/i),s=t(/safari/i)&&!t(/chrome/i)&&!t(/android/i),n=t(/iP(ad|od|hone)/i),i=t(/chrome/i)&&t(/android/i),r={capture:!1,passive:!1};function u(t,e,n){t.addEventListener(e,n,!w&&r)}function d(t,e,n){t.removeEventListener(e,n,!w&&r)}function h(t,e){if(e){if(">"===e[0]&&(e=e.substring(1)),t)try{if(t.matches)return t.matches(e);if(t.msMatchesSelector)return t.msMatchesSelector(e);if(t.webkitMatchesSelector)return t.webkitMatchesSelector(e)}catch(t){return!1}return!1}}function P(t,e,n,o){if(t){n=n||document;do{if(null!=e&&(">"===e[0]?t.parentNode===n&&h(t,e):h(t,e))||o&&t===n)return t;if(t===n)break}while(t=(i=t).host&&i!==document&&i.host.nodeType?i.host:i.parentNode)}var i;return null}var f,p=/\s+/g;function k(t,e,n){if(t&&e)if(t.classList)t.classList[n?"add":"remove"](e);else{var o=(" "+t.className+" ").replace(p," ").replace(" "+e+" "," ");t.className=(o+(n?" "+e:"")).replace(p," ")}}function R(t,e,n){var o=t&&t.style;if(o){if(void 0===n)return document.defaultView&&document.defaultView.getComputedStyle?n=document.defaultView.getComputedStyle(t,""):t.currentStyle&&(n=t.currentStyle),void 0===e?n:n[e];e in o||-1!==e.indexOf("webkit")||(e="-webkit-"+e),o[e]=n+("string"==typeof n?"":"px")}}function v(t,e){var n="";if("string"==typeof t)n=t;else do{var o=R(t,"transform");o&&"none"!==o&&(n=o+" "+n)}while(!e&&(t=t.parentNode));var i=window.DOMMatrix||window.WebKitCSSMatrix||window.CSSMatrix||window.MSCSSMatrix;return i&&new i(n)}function g(t,e,n){if(t){var o=t.getElementsByTagName(e),i=0,r=o.length;if(n)for(;i<r;i++)n(o[i],i);return o}return[]}function N(){var t=document.scrollingElement;return t||document.documentElement}function X(t,e,n,o,i){if(t.getBoundingClientRect||t===window){var r,a,l,s,c,u,d;if(d=t!==window&&t!==N()?(a=(r=t.getBoundingClientRect()).top,l=r.left,s=r.bottom,c=r.right,u=r.height,r.width):(l=a=0,s=window.innerHeight,c=window.innerWidth,u=window.innerHeight,window.innerWidth),(e||n)&&t!==window&&(i=i||t.parentNode,!w))do{if(i&&i.getBoundingClientRect&&("none"!==R(i,"transform")||n&&"static"!==R(i,"position"))){var h=i.getBoundingClientRect();a-=h.top+parseInt(R(i,"border-top-width")),l-=h.left+parseInt(R(i,"border-left-width")),s=a+r.height,c=l+r.width;break}}while(i=i.parentNode);if(o&&t!==window){var f=v(i||t),p=f&&f.a,g=f&&f.d;f&&(s=(a/=g)+(u/=g),c=(l/=p)+(d/=p))}return{top:a,left:l,bottom:s,right:c,width:d,height:u}}}function Y(t,e,n){for(var o=H(t,!0),i=X(t)[e];o;){var r=X(o)[n];if(!("top"===n||"left"===n?r<=i:i<=r))return o;if(o===N())break;o=H(o,!1)}return!1}function m(t,e,n){for(var o=0,i=0,r=t.children;i<r.length;){if("none"!==r[i].style.display&&r[i]!==Rt.ghost&&r[i]!==Rt.dragged&&P(r[i],n.draggable,t,!1)){if(o===e)return r[i];o++}i++}return null}function B(t,e){for(var n=t.lastElementChild;n&&(n===Rt.ghost||"none"===R(n,"display")||e&&!h(n,e));)n=n.previousElementSibling;return n||null}function F(t,e){var n=0;if(!t||!t.parentNode)return-1;for(;t=t.previousElementSibling;)"TEMPLATE"===t.nodeName.toUpperCase()||t===Rt.clone||e&&!h(t,e)||n++;return n}function b(t){var e=0,n=0,o=N();if(t)do{var i=v(t),r=i.a,a=i.d;e+=t.scrollLeft*r,n+=t.scrollTop*a}while(t!==o&&(t=t.parentNode));return[e,n]}function H(t,e){if(!t||!t.getBoundingClientRect)return N();var n=t,o=!1;do{if(n.clientWidth<n.scrollWidth||n.clientHeight<n.scrollHeight){var i=R(n);if(n.clientWidth<n.scrollWidth&&("auto"==i.overflowX||"scroll"==i.overflowX)||n.clientHeight<n.scrollHeight&&("auto"==i.overflowY||"scroll"==i.overflowY)){if(!n.getBoundingClientRect||n===document.body)return N();if(o||e)return n;o=!0}}}while(n=n.parentNode);return N()}function y(t,e){return Math.round(t.top)===Math.round(e.top)&&Math.round(t.left)===Math.round(e.left)&&Math.round(t.height)===Math.round(e.height)&&Math.round(t.width)===Math.round(e.width)}function D(e,n){return function(){if(!f){var t=arguments;1===t.length?e.call(this,t[0]):e.apply(this,t),f=setTimeout(function(){f=void 0},n)}}}function L(t,e,n){t.scrollLeft+=e,t.scrollTop+=n}function S(t){var e=window.Polymer,n=window.jQuery||window.Zepto;return e&&e.dom?e.dom(t).cloneNode(!0):n?n(t).clone(!0)[0]:t.cloneNode(!0)}function _(t,e){R(t,"position","absolute"),R(t,"top",e.top),R(t,"left",e.left),R(t,"width",e.width),R(t,"height",e.height)}function C(t){R(t,"position",""),R(t,"top",""),R(t,"left",""),R(t,"width",""),R(t,"height","")}var j="Sortable"+(new Date).getTime();function T(){var e,o=[];return{captureAnimationState:function(){o=[],this.options.animation&&[].slice.call(this.el.children).forEach(function(t){if("none"!==R(t,"display")&&t!==Rt.ghost){o.push({target:t,rect:X(t)});var e=I({},o[o.length-1].rect);if(t.thisAnimationDuration){var n=v(t,!0);n&&(e.top-=n.f,e.left-=n.e)}t.fromRect=e}})},addAnimationState:function(t){o.push(t)},removeAnimationState:function(t){o.splice(function(t,e){for(var n in t)if(t.hasOwnProperty(n))for(var o in e)if(e.hasOwnProperty(o)&&e[o]===t[n][o])return Number(n);return-1}(o,{target:t}),1)},animateAll:function(t){var c=this;if(!this.options.animation)return clearTimeout(e),void("function"==typeof t&&t());var u=!1,d=0;o.forEach(function(t){var e=0,n=t.target,o=n.fromRect,i=X(n),r=n.prevFromRect,a=n.prevToRect,l=t.rect,s=v(n,!0);s&&(i.top-=s.f,i.left-=s.e),n.toRect=i,n.thisAnimationDuration&&y(r,i)&&!y(o,i)&&(l.top-i.top)/(l.left-i.left)==(o.top-i.top)/(o.left-i.left)&&(e=function(t,e,n,o){return Math.sqrt(Math.pow(e.top-t.top,2)+Math.pow(e.left-t.left,2))/Math.sqrt(Math.pow(e.top-n.top,2)+Math.pow(e.left-n.left,2))*o.animation}(l,r,a,c.options)),y(i,o)||(n.prevFromRect=o,n.prevToRect=i,e||(e=c.options.animation),c.animate(n,l,i,e)),e&&(u=!0,d=Math.max(d,e),clearTimeout(n.animationResetTimer),n.animationResetTimer=setTimeout(function(){n.animationTime=0,n.prevFromRect=null,n.fromRect=null,n.prevToRect=null,n.thisAnimationDuration=null},e),n.thisAnimationDuration=e)}),clearTimeout(e),u?e=setTimeout(function(){"function"==typeof t&&t()},d):"function"==typeof t&&t(),o=[]},animate:function(t,e,n,o){if(o){R(t,"transition",""),R(t,"transform","");var i=v(this.el),r=i&&i.a,a=i&&i.d,l=(e.left-n.left)/(r||1),s=(e.top-n.top)/(a||1);t.animatingX=!!l,t.animatingY=!!s,R(t,"transform","translate3d("+l+"px,"+s+"px,0)"),function(t){t.offsetWidth}(t),R(t,"transition","transform "+o+"ms"+(this.options.easing?" "+this.options.easing:"")),R(t,"transform","translate3d(0,0,0)"),"number"==typeof t.animated&&clearTimeout(t.animated),t.animated=setTimeout(function(){R(t,"transition",""),R(t,"transform",""),t.animated=!1,t.animatingX=!1,t.animatingY=!1},o)}}}}var x=[],M={initializeByDefault:!0},O={mount:function(t){for(var e in M)!M.hasOwnProperty(e)||e in t||(t[e]=M[e]);x.push(t)},pluginEvent:function(e,n,o){var t=this;this.eventCanceled=!1,o.cancel=function(){t.eventCanceled=!0};var i=e+"Global";x.forEach(function(t){n[t.pluginName]&&(n[t.pluginName][i]&&n[t.pluginName][i](I({sortable:n},o)),n.options[t.pluginName]&&n[t.pluginName][e]&&n[t.pluginName][e](I({sortable:n},o)))})},initializePlugins:function(o,i,r,t){for(var e in x.forEach(function(t){var e=t.pluginName;if(o.options[e]||t.initializeByDefault){var n=new t(o,i,o.options);n.sortable=o,n.options=o.options,o[e]=n,a(r,n.defaults)}}),o.options)if(o.options.hasOwnProperty(e)){var n=this.modifyOption(o,e,o.options[e]);void 0!==n&&(o.options[e]=n)}},getEventProperties:function(e,n){var o={};return x.forEach(function(t){"function"==typeof t.eventProperties&&a(o,t.eventProperties.call(n[t.pluginName],e))}),o},modifyOption:function(e,n,o){var i;return x.forEach(function(t){e[t.pluginName]&&t.optionListeners&&"function"==typeof t.optionListeners[n]&&(i=t.optionListeners[n].call(e[t.pluginName],o))}),i}};function A(t){var e=t.sortable,n=t.rootEl,o=t.name,i=t.targetEl,r=t.cloneEl,a=t.toEl,l=t.fromEl,s=t.oldIndex,c=t.newIndex,u=t.oldDraggableIndex,d=t.newDraggableIndex,h=t.originalEvent,f=t.putSortable,p=t.extraEventProperties;if(e=e||n&&n[j]){var g,v=e.options,m="on"+o.charAt(0).toUpperCase()+o.substr(1);!window.CustomEvent||w||E?(g=document.createEvent("Event")).initEvent(o,!0,!0):g=new CustomEvent(o,{bubbles:!0,cancelable:!0}),g.to=a||n,g.from=l||n,g.item=i||n,g.clone=r,g.oldIndex=s,g.newIndex=c,g.oldDraggableIndex=u,g.newDraggableIndex=d,g.originalEvent=h,g.pullMode=f?f.lastPutMode:void 0;var b=I({},p,O.getEventProperties(o,e));for(var y in b)g[y]=b[y];n&&n.dispatchEvent(g),v[m]&&v[m].call(e,g)}}function K(t,e,n){var o=2<arguments.length&&void 0!==n?n:{},i=o.evt,r=l(o,["evt"]);O.pluginEvent.bind(Rt)(t,e,I({dragEl:z,parentEl:G,ghostEl:U,rootEl:q,nextEl:V,lastDownEl:Z,cloneEl:Q,cloneHidden:$,dragStarted:dt,putSortable:it,activeSortable:Rt.active,originalEvent:i,oldIndex:J,oldDraggableIndex:et,newIndex:tt,newDraggableIndex:nt,hideGhostForTarget:Nt,unhideGhostForTarget:It,cloneNowHidden:function(){$=!0},cloneNowShown:function(){$=!1},dispatchSortableEvent:function(t){W({sortable:e,name:t,originalEvent:i})}},r))}function W(t){A(I({putSortable:it,cloneEl:Q,targetEl:z,rootEl:q,oldIndex:J,oldDraggableIndex:et,newIndex:tt,newDraggableIndex:nt},t))}var z,G,U,q,V,Z,Q,$,J,tt,et,nt,ot,it,rt,at,lt,st,ct,ut,dt,ht,ft,pt,gt,vt=!1,mt=!1,bt=[],yt=!1,wt=!1,Et=[],Dt=!1,St=[],_t="undefined"!=typeof document,Ct=n,Tt=E||w?"cssFloat":"float",xt=_t&&!i&&!n&&"draggable"in document.createElement("div"),Mt=function(){if(_t){if(w)return!1;var t=document.createElement("x");return t.style.cssText="pointer-events:auto","auto"===t.style.pointerEvents}}(),Ot=function(t,e){var n=R(t),o=parseInt(n.width)-parseInt(n.paddingLeft)-parseInt(n.paddingRight)-parseInt(n.borderLeftWidth)-parseInt(n.borderRightWidth),i=m(t,0,e),r=m(t,1,e),a=i&&R(i),l=r&&R(r),s=a&&parseInt(a.marginLeft)+parseInt(a.marginRight)+X(i).width,c=l&&parseInt(l.marginLeft)+parseInt(l.marginRight)+X(r).width;if("flex"===n.display)return"column"===n.flexDirection||"column-reverse"===n.flexDirection?"vertical":"horizontal";if("grid"===n.display)return n.gridTemplateColumns.split(" ").length<=1?"vertical":"horizontal";if(i&&a.float&&"none"!==a.float){var u="left"===a.float?"left":"right";return!r||"both"!==l.clear&&l.clear!==u?"horizontal":"vertical"}return i&&("block"===a.display||"flex"===a.display||"table"===a.display||"grid"===a.display||o<=s&&"none"===n[Tt]||r&&"none"===n[Tt]&&o<s+c)?"vertical":"horizontal"},At=function(t){function s(a,l){return function(t,e,n,o){var i=t.options.group.name&&e.options.group.name&&t.options.group.name===e.options.group.name;if(null==a&&(l||i))return!0;if(null==a||!1===a)return!1;if(l&&"clone"===a)return a;if("function"==typeof a)return s(a(t,e,n,o),l)(t,e,n,o);var r=(l?t:e).options.group.name;return!0===a||"string"==typeof a&&a===r||a.join&&-1<a.indexOf(r)}}var e={},n=t.group;n&&"object"==o(n)||(n={name:n}),e.name=n.name,e.checkPull=s(n.pull,!0),e.checkPut=s(n.put),e.revertClone=n.revertClone,t.group=e},Nt=function(){!Mt&&U&&R(U,"display","none")},It=function(){!Mt&&U&&R(U,"display","")};_t&&document.addEventListener("click",function(t){if(mt)return t.preventDefault(),t.stopPropagation&&t.stopPropagation(),t.stopImmediatePropagation&&t.stopImmediatePropagation(),mt=!1},!0);function Pt(t){if(z){var e=function(r,a){var l;return bt.some(function(t){if(!B(t)){var e=X(t),n=t[j].options.emptyInsertThreshold,o=r>=e.left-n&&r<=e.right+n,i=a>=e.top-n&&a<=e.bottom+n;return n&&o&&i?l=t:void 0}}),l}((t=t.touches?t.touches[0]:t).clientX,t.clientY);if(e){var n={};for(var o in t)t.hasOwnProperty(o)&&(n[o]=t[o]);n.target=n.rootEl=e,n.preventDefault=void 0,n.stopPropagation=void 0,e[j]._onDragOver(n)}}}function kt(t){z&&z.parentNode[j]._isOutsideThisEl(t.target)}function Rt(t,e){if(!t||!t.nodeType||1!==t.nodeType)throw"Sortable: `el` must be an HTMLElement, not ".concat({}.toString.call(t));this.el=t,this.options=e=a({},e),t[j]=this;var n={group:null,sort:!0,disabled:!1,store:null,handle:null,draggable:/^[uo]l$/i.test(t.nodeName)?">li":">*",swapThreshold:1,invertSwap:!1,invertedSwapThreshold:null,removeCloneOnHide:!0,direction:function(){return Ot(t,this.options)},ghostClass:"sortable-ghost",chosenClass:"sortable-chosen",dragClass:"sortable-drag",ignore:"a, img",filter:null,preventOnFilter:!0,animation:0,easing:null,setData:function(t,e){t.setData("Text",e.textContent)},dropBubble:!1,dragoverBubble:!1,dataIdAttr:"data-id",delay:0,delayOnTouchOnly:!1,touchStartThreshold:(Number.parseInt?Number:window).parseInt(window.devicePixelRatio,10)||1,forceFallback:!1,fallbackClass:"sortable-fallback",fallbackOnBody:!1,fallbackTolerance:0,fallbackOffset:{x:0,y:0},supportPointer:!1!==Rt.supportPointer&&"PointerEvent"in window,emptyInsertThreshold:5};for(var o in O.initializePlugins(this,t,n),n)o in e||(e[o]=n[o]);for(var i in At(e),this)"_"===i.charAt(0)&&"function"==typeof this[i]&&(this[i]=this[i].bind(this));this.nativeDraggable=!e.forceFallback&&xt,this.nativeDraggable&&(this.options.touchStartThreshold=1),e.supportPointer?u(t,"pointerdown",this._onTapStart):(u(t,"mousedown",this._onTapStart),u(t,"touchstart",this._onTapStart)),this.nativeDraggable&&(u(t,"dragover",this),u(t,"dragenter",this)),bt.push(this.el),e.store&&e.store.get&&this.sort(e.store.get(this)||[]),a(this,T())}function Xt(t,e,n,o,i,r,a,l){var s,c,u=t[j],d=u.options.onMove;return!window.CustomEvent||w||E?(s=document.createEvent("Event")).initEvent("move",!0,!0):s=new CustomEvent("move",{bubbles:!0,cancelable:!0}),s.to=e,s.from=t,s.dragged=n,s.draggedRect=o,s.related=i||e,s.relatedRect=r||X(e),s.willInsertAfter=l,s.originalEvent=a,t.dispatchEvent(s),d&&(c=d.call(u,s,a)),c}function Yt(t){t.draggable=!1}function Bt(){Dt=!1}function Ft(t){for(var e=t.tagName+t.className+t.src+t.href+t.textContent,n=e.length,o=0;n--;)o+=e.charCodeAt(n);return o.toString(36)}function Ht(t){return setTimeout(t,0)}function Lt(t){return clearTimeout(t)}Rt.prototype={constructor:Rt,_isOutsideThisEl:function(t){this.el.contains(t)||t===this.el||(ht=null)},_getDirection:function(t,e){return"function"==typeof this.options.direction?this.options.direction.call(this,t,e,z):this.options.direction},_onTapStart:function(e){if(e.cancelable){var n=this,o=this.el,t=this.options,i=t.preventOnFilter,r=e.type,a=e.touches&&e.touches[0]||e.pointerType&&"touch"===e.pointerType&&e,l=(a||e).target,s=e.target.shadowRoot&&(e.path&&e.path[0]||e.composedPath&&e.composedPath()[0])||l,c=t.filter;if(function(t){St.length=0;var e=t.getElementsByTagName("input"),n=e.length;for(;n--;){var o=e[n];o.checked&&St.push(o)}}(o),!z&&!(/mousedown|pointerdown/.test(r)&&0!==e.button||t.disabled||s.isContentEditable||(l=P(l,t.draggable,o,!1))&&l.animated||Z===l)){if(J=F(l),et=F(l,t.draggable),"function"==typeof c){if(c.call(this,e,l,this))return W({sortable:n,rootEl:s,name:"filter",targetEl:l,toEl:o,fromEl:o}),K("filter",n,{evt:e}),void(i&&e.cancelable&&e.preventDefault())}else if(c&&(c=c.split(",").some(function(t){if(t=P(s,t.trim(),o,!1))return W({sortable:n,rootEl:t,name:"filter",targetEl:l,fromEl:o,toEl:o}),K("filter",n,{evt:e}),!0})))return void(i&&e.cancelable&&e.preventDefault());t.handle&&!P(s,t.handle,o,!1)||this._prepareDragStart(e,a,l)}}},_prepareDragStart:function(t,e,n){var o,i=this,r=i.el,a=i.options,l=r.ownerDocument;if(n&&!z&&n.parentNode===r){var s=X(n);if(q=r,G=(z=n).parentNode,V=z.nextSibling,Z=n,ot=a.group,rt={target:Rt.dragged=z,clientX:(e||t).clientX,clientY:(e||t).clientY},ct=rt.clientX-s.left,ut=rt.clientY-s.top,this._lastX=(e||t).clientX,this._lastY=(e||t).clientY,z.style["will-change"]="all",o=function(){K("delayEnded",i,{evt:t}),Rt.eventCanceled?i._onDrop():(i._disableDelayedDragEvents(),!c&&i.nativeDraggable&&(z.draggable=!0),i._triggerDragStart(t,e),W({sortable:i,name:"choose",originalEvent:t}),k(z,a.chosenClass,!0))},a.ignore.split(",").forEach(function(t){g(z,t.trim(),Yt)}),u(l,"dragover",Pt),u(l,"mousemove",Pt),u(l,"touchmove",Pt),u(l,"mouseup",i._onDrop),u(l,"touchend",i._onDrop),u(l,"touchcancel",i._onDrop),c&&this.nativeDraggable&&(this.options.touchStartThreshold=4,z.draggable=!0),K("delayStart",this,{evt:t}),!a.delay||a.delayOnTouchOnly&&!e||this.nativeDraggable&&(E||w))o();else{if(Rt.eventCanceled)return void this._onDrop();u(l,"mouseup",i._disableDelayedDrag),u(l,"touchend",i._disableDelayedDrag),u(l,"touchcancel",i._disableDelayedDrag),u(l,"mousemove",i._delayedDragTouchMoveHandler),u(l,"touchmove",i._delayedDragTouchMoveHandler),a.supportPointer&&u(l,"pointermove",i._delayedDragTouchMoveHandler),i._dragStartTimer=setTimeout(o,a.delay)}}},_delayedDragTouchMoveHandler:function(t){var e=t.touches?t.touches[0]:t;Math.max(Math.abs(e.clientX-this._lastX),Math.abs(e.clientY-this._lastY))>=Math.floor(this.options.touchStartThreshold/(this.nativeDraggable&&window.devicePixelRatio||1))&&this._disableDelayedDrag()},_disableDelayedDrag:function(){z&&Yt(z),clearTimeout(this._dragStartTimer),this._disableDelayedDragEvents()},_disableDelayedDragEvents:function(){var t=this.el.ownerDocument;d(t,"mouseup",this._disableDelayedDrag),d(t,"touchend",this._disableDelayedDrag),d(t,"touchcancel",this._disableDelayedDrag),d(t,"mousemove",this._delayedDragTouchMoveHandler),d(t,"touchmove",this._delayedDragTouchMoveHandler),d(t,"pointermove",this._delayedDragTouchMoveHandler)},_triggerDragStart:function(t,e){e=e||"touch"==t.pointerType&&t,!this.nativeDraggable||e?this.options.supportPointer?u(document,"pointermove",this._onTouchMove):u(document,e?"touchmove":"mousemove",this._onTouchMove):(u(z,"dragend",this),u(q,"dragstart",this._onDragStart));try{document.selection?Ht(function(){document.selection.empty()}):window.getSelection().removeAllRanges()}catch(t){}},_dragStarted:function(t,e){if(vt=!1,q&&z){K("dragStarted",this,{evt:e}),this.nativeDraggable&&u(document,"dragover",kt);var n=this.options;t||k(z,n.dragClass,!1),k(z,n.ghostClass,!0),Rt.active=this,t&&this._appendGhost(),W({sortable:this,name:"start",originalEvent:e})}else this._nulling()},_emulateDragOver:function(){if(at){this._lastX=at.clientX,this._lastY=at.clientY,Nt();for(var t=document.elementFromPoint(at.clientX,at.clientY),e=t;t&&t.shadowRoot&&(t=t.shadowRoot.elementFromPoint(at.clientX,at.clientY))!==e;)e=t;if(z.parentNode[j]._isOutsideThisEl(t),e)do{if(e[j]){if(e[j]._onDragOver({clientX:at.clientX,clientY:at.clientY,target:t,rootEl:e})&&!this.options.dragoverBubble)break}t=e}while(e=e.parentNode);It()}},_onTouchMove:function(t){if(rt){var e=this.options,n=e.fallbackTolerance,o=e.fallbackOffset,i=t.touches?t.touches[0]:t,r=U&&v(U,!0),a=U&&r&&r.a,l=U&&r&&r.d,s=Ct&&gt&&b(gt),c=(i.clientX-rt.clientX+o.x)/(a||1)+(s?s[0]-Et[0]:0)/(a||1),u=(i.clientY-rt.clientY+o.y)/(l||1)+(s?s[1]-Et[1]:0)/(l||1);if(!Rt.active&&!vt){if(n&&Math.max(Math.abs(i.clientX-this._lastX),Math.abs(i.clientY-this._lastY))<n)return;this._onDragStart(t,!0)}if(U){r?(r.e+=c-(lt||0),r.f+=u-(st||0)):r={a:1,b:0,c:0,d:1,e:c,f:u};var d="matrix(".concat(r.a,",").concat(r.b,",").concat(r.c,",").concat(r.d,",").concat(r.e,",").concat(r.f,")");R(U,"webkitTransform",d),R(U,"mozTransform",d),R(U,"msTransform",d),R(U,"transform",d),lt=c,st=u,at=i}t.cancelable&&t.preventDefault()}},_appendGhost:function(){if(!U){var t=this.options.fallbackOnBody?document.body:q,e=X(z,!0,Ct,!0,t),n=this.options;if(Ct){for(gt=t;"static"===R(gt,"position")&&"none"===R(gt,"transform")&&gt!==document;)gt=gt.parentNode;gt!==document.body&&gt!==document.documentElement?(gt===document&&(gt=N()),e.top+=gt.scrollTop,e.left+=gt.scrollLeft):gt=N(),Et=b(gt)}k(U=z.cloneNode(!0),n.ghostClass,!1),k(U,n.fallbackClass,!0),k(U,n.dragClass,!0),R(U,"transition",""),R(U,"transform",""),R(U,"box-sizing","border-box"),R(U,"margin",0),R(U,"top",e.top),R(U,"left",e.left),R(U,"width",e.width),R(U,"height",e.height),R(U,"opacity","0.8"),R(U,"position",Ct?"absolute":"fixed"),R(U,"zIndex","100000"),R(U,"pointerEvents","none"),Rt.ghost=U,t.appendChild(U),R(U,"transform-origin",ct/parseInt(U.style.width)*100+"% "+ut/parseInt(U.style.height)*100+"%")}},_onDragStart:function(t,e){var n=this,o=t.dataTransfer,i=n.options;K("dragStart",this,{evt:t}),Rt.eventCanceled?this._onDrop():(K("setupClone",this),Rt.eventCanceled||((Q=S(z)).draggable=!1,Q.style["will-change"]="",this._hideClone(),k(Q,this.options.chosenClass,!1),Rt.clone=Q),n.cloneId=Ht(function(){K("clone",n),Rt.eventCanceled||(n.options.removeCloneOnHide||q.insertBefore(Q,z),n._hideClone(),W({sortable:n,name:"clone"}))}),e||k(z,i.dragClass,!0),e?(mt=!0,n._loopId=setInterval(n._emulateDragOver,50)):(d(document,"mouseup",n._onDrop),d(document,"touchend",n._onDrop),d(document,"touchcancel",n._onDrop),o&&(o.effectAllowed="move",i.setData&&i.setData.call(n,o,z)),u(document,"drop",n),R(z,"transform","translateZ(0)")),vt=!0,n._dragStartId=Ht(n._dragStarted.bind(n,e,t)),u(document,"selectstart",n),dt=!0,s&&R(document.body,"user-select","none"))},_onDragOver:function(n){var o,i,r,a,l=this.el,s=n.target,e=this.options,t=e.group,c=Rt.active,u=ot===t,d=e.sort,h=it||c,f=this,p=!1;if(!Dt){if(void 0!==n.preventDefault&&n.cancelable&&n.preventDefault(),s=P(s,e.draggable,l,!0),M("dragOver"),Rt.eventCanceled)return p;if(z.contains(n.target)||s.animated&&s.animatingX&&s.animatingY||f._ignoreWhileAnimating===s)return A(!1);if(mt=!1,c&&!e.disabled&&(u?d||(r=!q.contains(z)):it===this||(this.lastPutMode=ot.checkPull(this,c,z,n))&&t.checkPut(this,c,z,n))){if(a="vertical"===this._getDirection(n,s),o=X(z),M("dragOverValid"),Rt.eventCanceled)return p;if(r)return G=q,O(),this._hideClone(),M("revert"),Rt.eventCanceled||(V?q.insertBefore(z,V):q.appendChild(z)),A(!0);var g=B(l,e.draggable);if(!g||function(t,e,n){var o=X(B(n.el,n.options.draggable));return e?t.clientX>o.right+10||t.clientX<=o.right&&t.clientY>o.bottom&&t.clientX>=o.left:t.clientX>o.right&&t.clientY>o.top||t.clientX<=o.right&&t.clientY>o.bottom+10}(n,a,this)&&!g.animated){if(g===z)return A(!1);if(g&&l===n.target&&(s=g),s&&(i=X(s)),!1!==Xt(q,l,z,o,s,i,n,!!s))return O(),l.appendChild(z),G=l,N(),A(!0)}else if(s.parentNode===l){i=X(s);var v,m,b,y=z.parentNode!==l,w=!function(t,e,n){var o=n?t.left:t.top,i=n?t.right:t.bottom,r=n?t.width:t.height,a=n?e.left:e.top,l=n?e.right:e.bottom,s=n?e.width:e.height;return o===a||i===l||o+r/2===a+s/2}(z.animated&&z.toRect||o,s.animated&&s.toRect||i,a),E=a?"top":"left",D=Y(s,"top","top")||Y(z,"top","top"),S=D?D.scrollTop:void 0;if(ht!==s&&(m=i[E],yt=!1,wt=!w&&e.invertSwap||y),0!==(v=function(t,e,n,o,i,r,a,l){var s=o?t.clientY:t.clientX,c=o?n.height:n.width,u=o?n.top:n.left,d=o?n.bottom:n.right,h=!1;if(!a)if(l&&pt<c*i){if(!yt&&(1===ft?u+c*r/2<s:s<d-c*r/2)&&(yt=!0),yt)h=!0;else if(1===ft?s<u+pt:d-pt<s)return-ft}else if(u+c*(1-i)/2<s&&s<d-c*(1-i)/2)return function(t){return F(z)<F(t)?1:-1}(e);if((h=h||a)&&(s<u+c*r/2||d-c*r/2<s))return u+c/2<s?1:-1;return 0}(n,s,i,a,w?1:e.swapThreshold,null==e.invertedSwapThreshold?e.swapThreshold:e.invertedSwapThreshold,wt,ht===s)))for(var _=F(z);_-=v,(b=G.children[_])&&("none"===R(b,"display")||b===U););if(0===v||b===s)return A(!1);ft=v;var C=(ht=s).nextElementSibling,T=!1,x=Xt(q,l,z,o,s,i,n,T=1===v);if(!1!==x)return 1!==x&&-1!==x||(T=1===x),Dt=!0,setTimeout(Bt,30),O(),T&&!C?l.appendChild(z):s.parentNode.insertBefore(z,T?C:s),D&&L(D,0,S-D.scrollTop),G=z.parentNode,void 0===m||wt||(pt=Math.abs(m-X(s)[E])),N(),A(!0)}if(l.contains(z))return A(!1)}return!1}function M(t,e){K(t,f,I({evt:n,isOwner:u,axis:a?"vertical":"horizontal",revert:r,dragRect:o,targetRect:i,canSort:d,fromSortable:h,target:s,completed:A,onMove:function(t,e){return Xt(q,l,z,o,t,X(t),n,e)},changed:N},e))}function O(){M("dragOverAnimationCapture"),f.captureAnimationState(),f!==h&&h.captureAnimationState()}function A(t){return M("dragOverCompleted",{insertion:t}),t&&(u?c._hideClone():c._showClone(f),f!==h&&(k(z,it?it.options.ghostClass:c.options.ghostClass,!1),k(z,e.ghostClass,!0)),it!==f&&f!==Rt.active?it=f:f===Rt.active&&it&&(it=null),h===f&&(f._ignoreWhileAnimating=s),f.animateAll(function(){M("dragOverAnimationComplete"),f._ignoreWhileAnimating=null}),f!==h&&(h.animateAll(),h._ignoreWhileAnimating=null)),(s===z&&!z.animated||s===l&&!s.animated)&&(ht=null),e.dragoverBubble||n.rootEl||s===document||(z.parentNode[j]._isOutsideThisEl(n.target),t||Pt(n)),!e.dragoverBubble&&n.stopPropagation&&n.stopPropagation(),p=!0}function N(){tt=F(z),nt=F(z,e.draggable),W({sortable:f,name:"change",toEl:l,newIndex:tt,newDraggableIndex:nt,originalEvent:n})}},_ignoreWhileAnimating:null,_offMoveEvents:function(){d(document,"mousemove",this._onTouchMove),d(document,"touchmove",this._onTouchMove),d(document,"pointermove",this._onTouchMove),d(document,"dragover",Pt),d(document,"mousemove",Pt),d(document,"touchmove",Pt)},_offUpEvents:function(){var t=this.el.ownerDocument;d(t,"mouseup",this._onDrop),d(t,"touchend",this._onDrop),d(t,"pointerup",this._onDrop),d(t,"touchcancel",this._onDrop),d(document,"selectstart",this)},_onDrop:function(t){var e=this.el,n=this.options;tt=F(z),nt=F(z,n.draggable),K("drop",this,{evt:t}),G=z&&z.parentNode,tt=F(z),nt=F(z,n.draggable),Rt.eventCanceled||(yt=wt=vt=!1,clearInterval(this._loopId),clearTimeout(this._dragStartTimer),Lt(this.cloneId),Lt(this._dragStartId),this.nativeDraggable&&(d(document,"drop",this),d(e,"dragstart",this._onDragStart)),this._offMoveEvents(),this._offUpEvents(),s&&R(document.body,"user-select",""),R(z,"transform",""),t&&(dt&&(t.cancelable&&t.preventDefault(),n.dropBubble||t.stopPropagation()),U&&U.parentNode&&U.parentNode.removeChild(U),(q===G||it&&"clone"!==it.lastPutMode)&&Q&&Q.parentNode&&Q.parentNode.removeChild(Q),z&&(this.nativeDraggable&&d(z,"dragend",this),Yt(z),z.style["will-change"]="",dt&&!vt&&k(z,it?it.options.ghostClass:this.options.ghostClass,!1),k(z,this.options.chosenClass,!1),W({sortable:this,name:"unchoose",toEl:G,newIndex:null,newDraggableIndex:null,originalEvent:t}),q!==G?(0<=tt&&(W({rootEl:G,name:"add",toEl:G,fromEl:q,originalEvent:t}),W({sortable:this,name:"remove",toEl:G,originalEvent:t}),W({rootEl:G,name:"sort",toEl:G,fromEl:q,originalEvent:t}),W({sortable:this,name:"sort",toEl:G,originalEvent:t})),it&&it.save()):tt!==J&&0<=tt&&(W({sortable:this,name:"update",toEl:G,originalEvent:t}),W({sortable:this,name:"sort",toEl:G,originalEvent:t})),Rt.active&&(null!=tt&&-1!==tt||(tt=J,nt=et),W({sortable:this,name:"end",toEl:G,originalEvent:t}),this.save())))),this._nulling()},_nulling:function(){K("nulling",this),q=z=G=U=V=Q=Z=$=rt=at=dt=tt=nt=J=et=ht=ft=it=ot=Rt.dragged=Rt.ghost=Rt.clone=Rt.active=null,St.forEach(function(t){t.checked=!0}),St.length=lt=st=0},handleEvent:function(t){switch(t.type){case"drop":case"dragend":this._onDrop(t);break;case"dragenter":case"dragover":z&&(this._onDragOver(t),function(t){t.dataTransfer&&(t.dataTransfer.dropEffect="move");t.cancelable&&t.preventDefault()}(t));break;case"selectstart":t.preventDefault()}},toArray:function(){for(var t,e=[],n=this.el.children,o=0,i=n.length,r=this.options;o<i;o++)P(t=n[o],r.draggable,this.el,!1)&&e.push(t.getAttribute(r.dataIdAttr)||Ft(t));return e},sort:function(t){var o={},i=this.el;this.toArray().forEach(function(t,e){var n=i.children[e];P(n,this.options.draggable,i,!1)&&(o[t]=n)},this),t.forEach(function(t){o[t]&&(i.removeChild(o[t]),i.appendChild(o[t]))})},save:function(){var t=this.options.store;t&&t.set&&t.set(this)},closest:function(t,e){return P(t,e||this.options.draggable,this.el,!1)},option:function(t,e){var n=this.options;if(void 0===e)return n[t];var o=O.modifyOption(this,t,e);n[t]=void 0!==o?o:e,"group"===t&&At(n)},destroy:function(){K("destroy",this);var t=this.el;t[j]=null,d(t,"mousedown",this._onTapStart),d(t,"touchstart",this._onTapStart),d(t,"pointerdown",this._onTapStart),this.nativeDraggable&&(d(t,"dragover",this),d(t,"dragenter",this)),Array.prototype.forEach.call(t.querySelectorAll("[draggable]"),function(t){t.removeAttribute("draggable")}),this._onDrop(),this._disableDelayedDragEvents(),bt.splice(bt.indexOf(this.el),1),this.el=t=null},_hideClone:function(){if(!$){if(K("hideClone",this),Rt.eventCanceled)return;R(Q,"display","none"),this.options.removeCloneOnHide&&Q.parentNode&&Q.parentNode.removeChild(Q),$=!0}},_showClone:function(t){if("clone"===t.lastPutMode){if($){if(K("showClone",this),Rt.eventCanceled)return;q.contains(z)&&!this.options.group.revertClone?q.insertBefore(Q,z):V?q.insertBefore(Q,V):q.appendChild(Q),this.options.group.revertClone&&this.animate(z,Q),R(Q,"display",""),$=!1}}else this._hideClone()}},_t&&u(document,"touchmove",function(t){(Rt.active||vt)&&t.cancelable&&t.preventDefault()}),Rt.utils={on:u,off:d,css:R,find:g,is:function(t,e){return!!P(t,e,t,!1)},extend:function(t,e){if(t&&e)for(var n in e)e.hasOwnProperty(n)&&(t[n]=e[n]);return t},throttle:D,closest:P,toggleClass:k,clone:S,index:F,nextTick:Ht,cancelNextTick:Lt,detectDirection:Ot,getChild:m},Rt.get=function(t){return t[j]},Rt.mount=function(){for(var t=arguments.length,e=new Array(t),n=0;n<t;n++)e[n]=arguments[n];e[0].constructor===Array&&(e=e[0]),e.forEach(function(t){if(!t.prototype||!t.prototype.constructor)throw"Sortable: Mounted plugin must be a constructor function, not ".concat({}.toString.call(t));t.utils&&(Rt.utils=I({},Rt.utils,t.utils)),O.mount(t)})},Rt.create=function(t,e){return new Rt(t,e)};var jt,Kt,Wt,zt,Gt,Ut,qt=[],Vt=!(Rt.version="1.10.2");function Zt(){qt.forEach(function(t){clearInterval(t.pid)}),qt=[]}function Qt(){clearInterval(Ut)}function $t(t){var e=t.originalEvent,n=t.putSortable,o=t.dragEl,i=t.activeSortable,r=t.dispatchSortableEvent,a=t.hideGhostForTarget,l=t.unhideGhostForTarget;if(e){var s=n||i;a();var c=e.changedTouches&&e.changedTouches.length?e.changedTouches[0]:e,u=document.elementFromPoint(c.clientX,c.clientY);l(),s&&!s.el.contains(u)&&(r("spill"),this.onSpill({dragEl:o,putSortable:n}))}}var Jt,te=D(function(n,t,e,o){if(t.scroll){var i,r=(n.touches?n.touches[0]:n).clientX,a=(n.touches?n.touches[0]:n).clientY,l=t.scrollSensitivity,s=t.scrollSpeed,c=N(),u=!1;Kt!==e&&(Kt=e,Zt(),jt=t.scroll,i=t.scrollFn,!0===jt&&(jt=H(e,!0)));var d=0,h=jt;do{var f=h,p=X(f),g=p.top,v=p.bottom,m=p.left,b=p.right,y=p.width,w=p.height,E=void 0,D=void 0,S=f.scrollWidth,_=f.scrollHeight,C=R(f),T=f.scrollLeft,x=f.scrollTop;D=f===c?(E=y<S&&("auto"===C.overflowX||"scroll"===C.overflowX||"visible"===C.overflowX),w<_&&("auto"===C.overflowY||"scroll"===C.overflowY||"visible"===C.overflowY)):(E=y<S&&("auto"===C.overflowX||"scroll"===C.overflowX),w<_&&("auto"===C.overflowY||"scroll"===C.overflowY));var M=E&&(Math.abs(b-r)<=l&&T+y<S)-(Math.abs(m-r)<=l&&!!T),O=D&&(Math.abs(v-a)<=l&&x+w<_)-(Math.abs(g-a)<=l&&!!x);if(!qt[d])for(var A=0;A<=d;A++)qt[A]||(qt[A]={});qt[d].vx==M&&qt[d].vy==O&&qt[d].el===f||(qt[d].el=f,qt[d].vx=M,qt[d].vy=O,clearInterval(qt[d].pid),0==M&&0==O||(u=!0,qt[d].pid=setInterval(function(){o&&0===this.layer&&Rt.active._onTouchMove(Gt);var t=qt[this.layer].vy?qt[this.layer].vy*s:0,e=qt[this.layer].vx?qt[this.layer].vx*s:0;"function"==typeof i&&"continue"!==i.call(Rt.dragged.parentNode[j],e,t,n,Gt,qt[this.layer].el)||L(qt[this.layer].el,e,t)}.bind({layer:d}),24))),d++}while(t.bubbleScroll&&h!==c&&(h=H(h,!1)));Vt=u}},30);function ee(){}function ne(){}ee.prototype={startIndex:null,dragStart:function(t){var e=t.oldDraggableIndex;this.startIndex=e},onSpill:function(t){var e=t.dragEl,n=t.putSortable;this.sortable.captureAnimationState(),n&&n.captureAnimationState();var o=m(this.sortable.el,this.startIndex,this.options);o?this.sortable.el.insertBefore(e,o):this.sortable.el.appendChild(e),this.sortable.animateAll(),n&&n.animateAll()},drop:$t},a(ee,{pluginName:"revertOnSpill"}),ne.prototype={onSpill:function(t){var e=t.dragEl,n=t.putSortable||this.sortable;n.captureAnimationState(),e.parentNode&&e.parentNode.removeChild(e),n.animateAll()},drop:$t},a(ne,{pluginName:"removeOnSpill"});var oe,ie,re,ae,le,se=[],ce=[],ue=!1,de=!1,he=!1;function fe(o,i){ce.forEach(function(t,e){var n=i.children[t.sortableIndex+(o?Number(e):0)];n?i.insertBefore(t,n):i.appendChild(t)})}function pe(){se.forEach(function(t){t!==re&&t.parentNode&&t.parentNode.removeChild(t)})}return Rt.mount(new function(){function t(){for(var t in this.defaults={scroll:!0,scrollSensitivity:30,scrollSpeed:10,bubbleScroll:!0},this)"_"===t.charAt(0)&&"function"==typeof this[t]&&(this[t]=this[t].bind(this))}return t.prototype={dragStarted:function(t){var e=t.originalEvent;this.sortable.nativeDraggable?u(document,"dragover",this._handleAutoScroll):this.options.supportPointer?u(document,"pointermove",this._handleFallbackAutoScroll):e.touches?u(document,"touchmove",this._handleFallbackAutoScroll):u(document,"mousemove",this._handleFallbackAutoScroll)},dragOverCompleted:function(t){var e=t.originalEvent;this.options.dragOverBubble||e.rootEl||this._handleAutoScroll(e)},drop:function(){this.sortable.nativeDraggable?d(document,"dragover",this._handleAutoScroll):(d(document,"pointermove",this._handleFallbackAutoScroll),d(document,"touchmove",this._handleFallbackAutoScroll),d(document,"mousemove",this._handleFallbackAutoScroll)),Qt(),Zt(),clearTimeout(f),f=void 0},nulling:function(){Gt=Kt=jt=Vt=Ut=Wt=zt=null,qt.length=0},_handleFallbackAutoScroll:function(t){this._handleAutoScroll(t,!0)},_handleAutoScroll:function(e,n){var o=this,i=(e.touches?e.touches[0]:e).clientX,r=(e.touches?e.touches[0]:e).clientY,t=document.elementFromPoint(i,r);if(Gt=e,n||E||w||s){te(e,this.options,t,n);var a=H(t,!0);!Vt||Ut&&i===Wt&&r===zt||(Ut&&Qt(),Ut=setInterval(function(){var t=H(document.elementFromPoint(i,r),!0);t!==a&&(a=t,Zt()),te(e,o.options,t,n)},10),Wt=i,zt=r)}else{if(!this.options.bubbleScroll||H(t,!0)===N())return void Zt();te(e,this.options,H(t,!1),!1)}}},a(t,{pluginName:"scroll",initializeByDefault:!0})}),Rt.mount(ne,ee),Rt.mount(new function(){function t(){this.defaults={swapClass:"sortable-swap-highlight"}}return t.prototype={dragStart:function(t){var e=t.dragEl;Jt=e},dragOverValid:function(t){var e=t.completed,n=t.target,o=t.onMove,i=t.activeSortable,r=t.changed,a=t.cancel;if(i.options.swap){var l=this.sortable.el,s=this.options;if(n&&n!==l){var c=Jt;Jt=!1!==o(n)?(k(n,s.swapClass,!0),n):null,c&&c!==Jt&&k(c,s.swapClass,!1)}r(),e(!0),a()}},drop:function(t){var e=t.activeSortable,n=t.putSortable,o=t.dragEl,i=n||this.sortable,r=this.options;Jt&&k(Jt,r.swapClass,!1),Jt&&(r.swap||n&&n.options.swap)&&o!==Jt&&(i.captureAnimationState(),i!==e&&e.captureAnimationState(),function(t,e){var n,o,i=t.parentNode,r=e.parentNode;if(!i||!r||i.isEqualNode(e)||r.isEqualNode(t))return;n=F(t),o=F(e),i.isEqualNode(r)&&n<o&&o++;i.insertBefore(e,i.children[n]),r.insertBefore(t,r.children[o])}(o,Jt),i.animateAll(),i!==e&&e.animateAll())},nulling:function(){Jt=null}},a(t,{pluginName:"swap",eventProperties:function(){return{swapItem:Jt}}})}),Rt.mount(new function(){function t(o){for(var t in this)"_"===t.charAt(0)&&"function"==typeof this[t]&&(this[t]=this[t].bind(this));o.options.supportPointer?u(document,"pointerup",this._deselectMultiDrag):(u(document,"mouseup",this._deselectMultiDrag),u(document,"touchend",this._deselectMultiDrag)),u(document,"keydown",this._checkKeyDown),u(document,"keyup",this._checkKeyUp),this.defaults={selectedClass:"sortable-selected",multiDragKey:null,setData:function(t,e){var n="";se.length&&ie===o?se.forEach(function(t,e){n+=(e?", ":"")+t.textContent}):n=e.textContent,t.setData("Text",n)}}}return t.prototype={multiDragKeyDown:!1,isMultiDrag:!1,delayStartGlobal:function(t){var e=t.dragEl;re=e},delayEnded:function(){this.isMultiDrag=~se.indexOf(re)},setupClone:function(t){var e=t.sortable,n=t.cancel;if(this.isMultiDrag){for(var o=0;o<se.length;o++)ce.push(S(se[o])),ce[o].sortableIndex=se[o].sortableIndex,ce[o].draggable=!1,ce[o].style["will-change"]="",k(ce[o],this.options.selectedClass,!1),se[o]===re&&k(ce[o],this.options.chosenClass,!1);e._hideClone(),n()}},clone:function(t){var e=t.sortable,n=t.rootEl,o=t.dispatchSortableEvent,i=t.cancel;this.isMultiDrag&&(this.options.removeCloneOnHide||se.length&&ie===e&&(fe(!0,n),o("clone"),i()))},showClone:function(t){var e=t.cloneNowShown,n=t.rootEl,o=t.cancel;this.isMultiDrag&&(fe(!1,n),ce.forEach(function(t){R(t,"display","")}),e(),le=!1,o())},hideClone:function(t){var e=this,n=(t.sortable,t.cloneNowHidden),o=t.cancel;this.isMultiDrag&&(ce.forEach(function(t){R(t,"display","none"),e.options.removeCloneOnHide&&t.parentNode&&t.parentNode.removeChild(t)}),n(),le=!0,o())},dragStartGlobal:function(t){t.sortable;!this.isMultiDrag&&ie&&ie.multiDrag._deselectMultiDrag(),se.forEach(function(t){t.sortableIndex=F(t)}),se=se.sort(function(t,e){return t.sortableIndex-e.sortableIndex}),he=!0},dragStarted:function(t){var e=this,n=t.sortable;if(this.isMultiDrag){if(this.options.sort&&(n.captureAnimationState(),this.options.animation)){se.forEach(function(t){t!==re&&R(t,"position","absolute")});var o=X(re,!1,!0,!0);se.forEach(function(t){t!==re&&_(t,o)}),ue=de=!0}n.animateAll(function(){ue=de=!1,e.options.animation&&se.forEach(function(t){C(t)}),e.options.sort&&pe()})}},dragOver:function(t){var e=t.target,n=t.completed,o=t.cancel;de&&~se.indexOf(e)&&(n(!1),o())},revert:function(t){var e=t.fromSortable,n=t.rootEl,o=t.sortable,i=t.dragRect;1<se.length&&(se.forEach(function(t){o.addAnimationState({target:t,rect:de?X(t):i}),C(t),t.fromRect=i,e.removeAnimationState(t)}),de=!1,function(o,i){se.forEach(function(t,e){var n=i.children[t.sortableIndex+(o?Number(e):0)];n?i.insertBefore(t,n):i.appendChild(t)})}(!this.options.removeCloneOnHide,n))},dragOverCompleted:function(t){var e=t.sortable,n=t.isOwner,o=t.insertion,i=t.activeSortable,r=t.parentEl,a=t.putSortable,l=this.options;if(o){if(n&&i._hideClone(),ue=!1,l.animation&&1<se.length&&(de||!n&&!i.options.sort&&!a)){var s=X(re,!1,!0,!0);se.forEach(function(t){t!==re&&(_(t,s),r.appendChild(t))}),de=!0}if(!n)if(de||pe(),1<se.length){var c=le;i._showClone(e),i.options.animation&&!le&&c&&ce.forEach(function(t){i.addAnimationState({target:t,rect:ae}),t.fromRect=ae,t.thisAnimationDuration=null})}else i._showClone(e)}},dragOverAnimationCapture:function(t){var e=t.dragRect,n=t.isOwner,o=t.activeSortable;if(se.forEach(function(t){t.thisAnimationDuration=null}),o.options.animation&&!n&&o.multiDrag.isMultiDrag){ae=a({},e);var i=v(re,!0);ae.top-=i.f,ae.left-=i.e}},dragOverAnimationComplete:function(){de&&(de=!1,pe())},drop:function(t){var e=t.originalEvent,n=t.rootEl,o=t.parentEl,i=t.sortable,r=t.dispatchSortableEvent,a=t.oldIndex,l=t.putSortable,s=l||this.sortable;if(e){var c=this.options,u=o.children;if(!he)if(c.multiDragKey&&!this.multiDragKeyDown&&this._deselectMultiDrag(),k(re,c.selectedClass,!~se.indexOf(re)),~se.indexOf(re))se.splice(se.indexOf(re),1),oe=null,A({sortable:i,rootEl:n,name:"deselect",targetEl:re,originalEvt:e});else{if(se.push(re),A({sortable:i,rootEl:n,name:"select",targetEl:re,originalEvt:e}),e.shiftKey&&oe&&i.el.contains(oe)){var d,h,f=F(oe),p=F(re);if(~f&&~p&&f!==p)for(d=f<p?(h=f,p):(h=p,f+1);h<d;h++)~se.indexOf(u[h])||(k(u[h],c.selectedClass,!0),se.push(u[h]),A({sortable:i,rootEl:n,name:"select",targetEl:u[h],originalEvt:e}))}else oe=re;ie=s}if(he&&this.isMultiDrag){if((o[j].options.sort||o!==n)&&1<se.length){var g=X(re),v=F(re,":not(."+this.options.selectedClass+")");if(!ue&&c.animation&&(re.thisAnimationDuration=null),s.captureAnimationState(),!ue&&(c.animation&&(re.fromRect=g,se.forEach(function(t){if(t.thisAnimationDuration=null,t!==re){var e=de?X(t):g;t.fromRect=e,s.addAnimationState({target:t,rect:e})}})),pe(),se.forEach(function(t){u[v]?o.insertBefore(t,u[v]):o.appendChild(t),v++}),a===F(re))){var m=!1;se.forEach(function(t){t.sortableIndex===F(t)||(m=!0)}),m&&r("update")}se.forEach(function(t){C(t)}),s.animateAll()}ie=s}(n===o||l&&"clone"!==l.lastPutMode)&&ce.forEach(function(t){t.parentNode&&t.parentNode.removeChild(t)})}},nullingGlobal:function(){this.isMultiDrag=he=!1,ce.length=0},destroyGlobal:function(){this._deselectMultiDrag(),d(document,"pointerup",this._deselectMultiDrag),d(document,"mouseup",this._deselectMultiDrag),d(document,"touchend",this._deselectMultiDrag),d(document,"keydown",this._checkKeyDown),d(document,"keyup",this._checkKeyUp)},_deselectMultiDrag:function(t){if(!(void 0!==he&&he||ie!==this.sortable||t&&P(t.target,this.options.draggable,this.sortable.el,!1)||t&&0!==t.button))for(;se.length;){var e=se[0];k(e,this.options.selectedClass,!1),se.shift(),A({sortable:this.sortable,rootEl:this.sortable.el,name:"deselect",targetEl:e,originalEvt:t})}},_checkKeyDown:function(t){t.key===this.options.multiDragKey&&(this.multiDragKeyDown=!0)},_checkKeyUp:function(t){t.key===this.options.multiDragKey&&(this.multiDragKeyDown=!1)}},a(t,{pluginName:"multiDrag",utils:{select:function(t){var e=t.parentNode[j];e&&e.options.multiDrag&&!~se.indexOf(t)&&(ie&&ie!==e&&(ie.multiDrag._deselectMultiDrag(),ie=e),k(t,e.options.selectedClass,!0),se.push(t))},deselect:function(t){var e=t.parentNode[j],n=se.indexOf(t);e&&e.options.multiDrag&&~n&&(k(t,e.options.selectedClass,!1),se.splice(n,1))}},eventProperties:function(){var n=this,o=[],i=[];return se.forEach(function(t){var e;o.push({multiDragElement:t,index:t.sortableIndex}),e=de&&t!==re?-1:de?F(t,":not(."+n.options.selectedClass+")"):F(t),i.push({multiDragElement:t,index:e})}),{items:e(se),clones:[].concat(ce),oldIndicies:o,newIndicies:i}},optionListeners:{multiDragKey:function(t){return"ctrl"===(t=t.toLowerCase())?t="Control":1<t.length&&(t=t.charAt(0).toUpperCase()+t.substr(1)),t}}})}),Rt});;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, drupalSettings, _) {
  Drupal.ckeditor = Drupal.ckeditor || {};
  Drupal.behaviors.ckeditorAdmin = {
    attach: function attach(context) {
      var $configurationForm = $(context).find('.ckeditor-toolbar-configuration').once('ckeditor-configuration');

      if ($configurationForm.length) {
        var $textarea = $configurationForm.find('.js-form-item-editor-settings-toolbar-button-groups').hide().find('textarea');
        $configurationForm.append(drupalSettings.ckeditor.toolbarAdmin);
        Drupal.ckeditor.models.Model = new Drupal.ckeditor.Model({
          $textarea: $textarea,
          activeEditorConfig: JSON.parse($textarea.val()),
          hiddenEditorConfig: drupalSettings.ckeditor.hiddenCKEditorConfig
        });
        var viewDefaults = {
          model: Drupal.ckeditor.models.Model,
          el: $('.ckeditor-toolbar-configuration')
        };
        Drupal.ckeditor.views = {
          controller: new Drupal.ckeditor.ControllerView(viewDefaults),
          visualView: new Drupal.ckeditor.VisualView(viewDefaults),
          keyboardView: new Drupal.ckeditor.KeyboardView(viewDefaults),
          auralView: new Drupal.ckeditor.AuralView(viewDefaults)
        };
      }
    },
    detach: function detach(context, settings, trigger) {
      if (trigger !== 'unload') {
        return;
      }

      var $configurationForm = $(context).find('.ckeditor-toolbar-configuration').findOnce('ckeditor-configuration');

      if ($configurationForm.length && Drupal.ckeditor.models && Drupal.ckeditor.models.Model) {
        var config = Drupal.ckeditor.models.Model.toJSON().activeEditorConfig;
        var buttons = Drupal.ckeditor.views.controller.getButtonList(config);
        var $activeToolbar = $('.ckeditor-toolbar-configuration').find('.ckeditor-toolbar-active');

        for (var i = 0; i < buttons.length; i++) {
          $activeToolbar.trigger('CKEditorToolbarChanged', ['removed', buttons[i]]);
        }
      }
    }
  };
  Drupal.ckeditor = {
    views: {},
    models: {},
    registerButtonMove: function registerButtonMove(view, $button, callback) {
      var $group = $button.closest('.ckeditor-toolbar-group');

      if ($group.hasClass('placeholder')) {
        if (view.isProcessing) {
          return;
        }

        view.isProcessing = true;
        Drupal.ckeditor.openGroupNameDialog(view, $group, callback);
      } else {
        view.model.set('isDirty', true);
        callback(true);
      }
    },
    registerGroupMove: function registerGroupMove(view, $group) {
      var $row = $group.closest('.ckeditor-row');

      if ($row.hasClass('placeholder')) {
        $row.removeClass('placeholder');
      }

      $row.parent().children().each(function () {
        $row = $(this);

        if ($row.find('.ckeditor-toolbar-group').not('.placeholder').length === 0) {
          $row.addClass('placeholder');
        }
      });
      view.model.set('isDirty', true);
    },
    openGroupNameDialog: function openGroupNameDialog(view, $group, callback) {
      callback = callback || function () {};

      function validateForm(form) {
        if (form.elements[0].value.length === 0) {
          var $form = $(form);

          if (!$form.hasClass('errors')) {
            $form.addClass('errors').find('input').addClass('error').attr('aria-invalid', 'true');
            $("<div class=\"description\" >".concat(Drupal.t('Please provide a name for the button group.'), "</div>")).insertAfter(form.elements[0]);
          }

          return true;
        }

        return false;
      }

      function closeDialog(action, form) {
        function shutdown() {
          dialog.close(action);
          delete view.isProcessing;
        }

        function namePlaceholderGroup($group, name) {
          if ($group.hasClass('placeholder')) {
            var groupID = "ckeditor-toolbar-group-aria-label-for-".concat(Drupal.checkPlain(name.toLowerCase().replace(/\s/g, '-')));
            $group.removeAttr('aria-label').attr('data-drupal-ckeditor-type', 'group').attr('tabindex', 0).children('.ckeditor-toolbar-group-name').attr('id', groupID).end().children('.ckeditor-toolbar-group-buttons').attr('aria-labelledby', groupID);
          }

          $group.attr('data-drupal-ckeditor-toolbar-group-name', name).children('.ckeditor-toolbar-group-name').text(name);
        }

        if (action === 'cancel') {
          shutdown();
          callback(false, $group);
          return;
        }

        if (form && validateForm(form)) {
          return;
        }

        if (action === 'apply') {
          shutdown();
          namePlaceholderGroup($group, Drupal.checkPlain(form.elements[0].value));
          $group.closest('.ckeditor-row.placeholder').addBack().removeClass('placeholder');
          callback(true, $group);
          view.model.set('isDirty', true);
        }
      }

      var $ckeditorButtonGroupNameForm = $(Drupal.theme('ckeditorButtonGroupNameForm'));
      var dialog = Drupal.dialog($ckeditorButtonGroupNameForm.get(0), {
        title: Drupal.t('Button group name'),
        dialogClass: 'ckeditor-name-toolbar-group',
        resizable: false,
        buttons: [{
          text: Drupal.t('Apply'),
          click: function click() {
            closeDialog('apply', this);
          },
          primary: true
        }, {
          text: Drupal.t('Cancel'),
          click: function click() {
            closeDialog('cancel');
          }
        }],
        open: function open() {
          var form = this;
          var $form = $(this);
          var $widget = $form.parent();
          $widget.find('.ui-dialog-titlebar-close').remove();
          $widget.on('keypress.ckeditor', 'input, button', function (event) {
            if (event.keyCode === 13) {
              var $target = $(event.currentTarget);
              var data = $target.data('ui-button');
              var action = 'apply';

              if (data && data.options && data.options.label) {
                action = data.options.label.toLowerCase();
              }

              closeDialog(action, form);
              event.stopPropagation();
              event.stopImmediatePropagation();
              event.preventDefault();
            }
          });
          var text = Drupal.t('Editing the name of the new button group in a dialog.');

          if (typeof $group.attr('data-drupal-ckeditor-toolbar-group-name') !== 'undefined') {
            text = Drupal.t('Editing the name of the "@groupName" button group in a dialog.', {
              '@groupName': $group.attr('data-drupal-ckeditor-toolbar-group-name')
            });
          }

          Drupal.announce(text);
        },
        close: function close(event) {
          $(event.target).remove();
        }
      });
      dialog.showModal();
      $(document.querySelector('.ckeditor-name-toolbar-group').querySelector('input')).attr('value', $group.attr('data-drupal-ckeditor-toolbar-group-name')).trigger('focus');
    }
  };
  Drupal.behaviors.ckeditorAdminButtonPluginSettings = {
    attach: function attach(context) {
      var $context = $(context);
      var $ckeditorPluginSettings = $context.find('#ckeditor-plugin-settings').once('ckeditor-plugin-settings');

      if ($ckeditorPluginSettings.length) {
        $ckeditorPluginSettings.find('[data-ckeditor-buttons]').each(function () {
          var $this = $(this);

          if ($this.data('verticalTab')) {
            $this.data('verticalTab').tabHide();
          } else {
            $this.hide();
          }

          $this.data('ckeditorButtonPluginSettingsActiveButtons', []);
        });
        $context.find('.ckeditor-toolbar-active').off('CKEditorToolbarChanged.ckeditorAdminPluginSettings').on('CKEditorToolbarChanged.ckeditorAdminPluginSettings', function (event, action, button) {
          var $pluginSettings = $ckeditorPluginSettings.find("[data-ckeditor-buttons~=".concat(button, "]"));

          if ($pluginSettings.length === 0) {
            return;
          }

          var verticalTab = $pluginSettings.data('verticalTab');
          var activeButtons = $pluginSettings.data('ckeditorButtonPluginSettingsActiveButtons');

          if (action === 'added') {
            activeButtons.push(button);

            if (verticalTab) {
              verticalTab.tabShow();
            } else {
              $pluginSettings.show();
            }
          } else {
            activeButtons.splice(activeButtons.indexOf(button), 1);

            if (activeButtons.length === 0) {
              if (verticalTab) {
                verticalTab.tabHide();
              } else {
                $pluginSettings.hide();
              }
            }
          }

          $pluginSettings.data('ckeditorButtonPluginSettingsActiveButtons', activeButtons);
        });
      }
    }
  };

  Drupal.theme.ckeditorRow = function () {
    return '<li class="ckeditor-row placeholder" role="group"><ul class="ckeditor-toolbar-groups clearfix"></ul></li>';
  };

  Drupal.theme.ckeditorToolbarGroup = function () {
    var group = '';
    group += "<li class=\"ckeditor-toolbar-group placeholder\" role=\"presentation\" aria-label=\"".concat(Drupal.t('Place a button to create a new button group.'), "\">");
    group += "<h3 class=\"ckeditor-toolbar-group-name\">".concat(Drupal.t('New group'), "</h3>");
    group += '<ul class="ckeditor-buttons ckeditor-toolbar-group-buttons" role="toolbar" data-drupal-ckeditor-button-sorting="target"></ul>';
    group += '</li>';
    return group;
  };

  Drupal.theme.ckeditorButtonGroupNameForm = function () {
    return '<form><input name="group-name" required="required"></form>';
  };

  Drupal.theme.ckeditorButtonGroupNamesToggle = function () {
    return '<button class="link ckeditor-groupnames-toggle" aria-pressed="false"></button>';
  };

  Drupal.theme.ckeditorNewButtonGroup = function () {
    return "<li class=\"ckeditor-add-new-group\"><button aria-label=\"".concat(Drupal.t('Add a CKEditor button group to the end of this row.'), "\">").concat(Drupal.t('Add group'), "</button></li>");
  };
})(jQuery, Drupal, drupalSettings, _);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function (Drupal, Backbone) {
  Drupal.ckeditor.Model = Backbone.Model.extend({
    defaults: {
      activeEditorConfig: null,
      $textarea: null,
      isDirty: false,
      hiddenEditorConfig: null,
      buttonsToFeatures: null,
      featuresMetadata: null,
      groupNamesVisible: false
    },
    sync: function sync() {
      this.get('$textarea').val(JSON.stringify(this.get('activeEditorConfig')));
    }
  });
})(Drupal, Backbone);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function (Drupal, Backbone, $) {
  Drupal.ckeditor.AuralView = Backbone.View.extend({
    events: {
      'click .ckeditor-buttons a': 'announceButtonHelp',
      'click .ckeditor-multiple-buttons a': 'announceSeparatorHelp',
      'focus .ckeditor-button a': 'onFocus',
      'focus .ckeditor-button-separator a': 'onFocus',
      'focus .ckeditor-toolbar-group': 'onFocus'
    },
    initialize: function initialize() {
      this.listenTo(this.model, 'change:isDirty', this.announceMove);
    },
    announceMove: function announceMove(model, isDirty) {
      if (!isDirty) {
        var item = document.activeElement || null;

        if (item) {
          var $item = $(item);

          if ($item.hasClass('ckeditor-toolbar-group')) {
            this.announceButtonGroupPosition($item);
          } else if ($item.parent().hasClass('ckeditor-button')) {
            this.announceButtonPosition($item.parent());
          }
        }
      }
    },
    onFocus: function onFocus(event) {
      event.stopPropagation();
      var $originalTarget = $(event.target);
      var $currentTarget = $(event.currentTarget);
      var $parent = $currentTarget.parent();

      if ($parent.hasClass('ckeditor-button') || $parent.hasClass('ckeditor-button-separator')) {
        this.announceButtonPosition($currentTarget.parent());
      } else if ($originalTarget.attr('role') !== 'button' && $currentTarget.hasClass('ckeditor-toolbar-group')) {
        this.announceButtonGroupPosition($currentTarget);
      }
    },
    announceButtonGroupPosition: function announceButtonGroupPosition($group) {
      var $groups = $group.parent().children();
      var $row = $group.closest('.ckeditor-row');
      var $rows = $row.parent().children();
      var position = $groups.index($group) + 1;
      var positionCount = $groups.not('.placeholder').length;
      var row = $rows.index($row) + 1;
      var rowCount = $rows.not('.placeholder').length;
      var text = Drupal.t('@groupName button group in position @position of @positionCount in row @row of @rowCount.', {
        '@groupName': $group.attr('data-drupal-ckeditor-toolbar-group-name'),
        '@position': position,
        '@positionCount': positionCount,
        '@row': row,
        '@rowCount': rowCount
      });

      if (position === 1 && row === rowCount) {
        text += '\n';
        text += Drupal.t('Press the down arrow key to create a new row.');
      }

      Drupal.announce(text, 'assertive');
    },
    announceButtonPosition: function announceButtonPosition($button) {
      var $row = $button.closest('.ckeditor-row');
      var $rows = $row.parent().children();
      var $buttons = $button.closest('.ckeditor-buttons').children();
      var $group = $button.closest('.ckeditor-toolbar-group');
      var $groups = $group.parent().children();
      var groupPosition = $groups.index($group) + 1;
      var groupPositionCount = $groups.not('.placeholder').length;
      var position = $buttons.index($button) + 1;
      var positionCount = $buttons.length;
      var row = $rows.index($row) + 1;
      var rowCount = $rows.not('.placeholder').length;
      var type = $button.attr('data-drupal-ckeditor-type') === 'separator' ? '' : Drupal.t('button');
      var text;

      if ($button.closest('.ckeditor-toolbar-disabled').length > 0) {
        text = Drupal.t('@name @type.', {
          '@name': $button.children().attr('aria-label'),
          '@type': type
        });
        text += "\n".concat(Drupal.t('Press the down arrow key to activate.'));
        Drupal.announce(text, 'assertive');
      } else if ($group.not('.placeholder').length === 1) {
          text = Drupal.t('@name @type in position @position of @positionCount in @groupName button group in row @row of @rowCount.', {
            '@name': $button.children().attr('aria-label'),
            '@type': type,
            '@position': position,
            '@positionCount': positionCount,
            '@groupName': $group.attr('data-drupal-ckeditor-toolbar-group-name'),
            '@row': row,
            '@rowCount': rowCount
          });

          if (groupPosition === 1 && position === 1 && row === rowCount) {
            text += '\n';
            text += Drupal.t('Press the down arrow key to create a new button group in a new row.');
          }

          if (groupPosition === groupPositionCount && position === positionCount) {
            text += '\n';
            text += Drupal.t('This is the last group. Move the button forward to create a new group.');
          }

          Drupal.announce(text, 'assertive');
        }
    },
    announceButtonHelp: function announceButtonHelp(event) {
      var $link = $(event.currentTarget);
      var $button = $link.parent();
      var enabled = $button.closest('.ckeditor-toolbar-active').length > 0;
      var message;

      if (enabled) {
        message = Drupal.t('The "@name" button is currently enabled.', {
          '@name': $link.attr('aria-label')
        });
        message += "\n".concat(Drupal.t('Use the keyboard arrow keys to change the position of this button.'));
        message += "\n".concat(Drupal.t('Press the up arrow key on the top row to disable the button.'));
      } else {
        message = Drupal.t('The "@name" button is currently disabled.', {
          '@name': $link.attr('aria-label')
        });
        message += "\n".concat(Drupal.t('Use the down arrow key to move this button into the active toolbar.'));
      }

      Drupal.announce(message);
      event.preventDefault();
    },
    announceSeparatorHelp: function announceSeparatorHelp(event) {
      var $link = $(event.currentTarget);
      var $button = $link.parent();
      var enabled = $button.closest('.ckeditor-toolbar-active').length > 0;
      var message;

      if (enabled) {
        message = Drupal.t('This @name is currently enabled.', {
          '@name': $link.attr('aria-label')
        });
        message += "\n".concat(Drupal.t('Use the keyboard arrow keys to change the position of this separator.'));
      } else {
        message = Drupal.t('Separators are used to visually split individual buttons.');
        message += "\n".concat(Drupal.t('This @name is currently disabled.', {
          '@name': $link.attr('aria-label')
        }));
        message += "\n".concat(Drupal.t('Use the down arrow key to move this separator into the active toolbar.'));
        message += "\n".concat(Drupal.t('You may add multiple separators to each button group.'));
      }

      Drupal.announce(message);
      event.preventDefault();
    }
  });
})(Drupal, Backbone, jQuery);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, Backbone, _) {
  Drupal.ckeditor.KeyboardView = Backbone.View.extend({
    initialize: function initialize() {
      this.$el.on('keydown.ckeditor', '.ckeditor-buttons a, .ckeditor-multiple-buttons a', this.onPressButton.bind(this));
      this.$el.on('keydown.ckeditor', '[data-drupal-ckeditor-type="group"]', this.onPressGroup.bind(this));
    },
    render: function render() {},
    onPressButton: function onPressButton(event) {
      var upDownKeys = [38, 63232, 40, 63233];
      var leftRightKeys = [37, 63234, 39, 63235];

      if (event.keyCode === 13) {
        event.stopPropagation();
      }

      if (_.indexOf(_.union(upDownKeys, leftRightKeys), event.keyCode) > -1) {
        var view = this;
        var $target = $(event.currentTarget);
        var $button = $target.parent();
        var $container = $button.parent();
        var $group = $button.closest('.ckeditor-toolbar-group');
        var $row;
        var containerType = $container.data('drupal-ckeditor-button-sorting');
        var $availableButtons = this.$el.find('[data-drupal-ckeditor-button-sorting="source"]');
        var $activeButtons = this.$el.find('.ckeditor-toolbar-active');
        var $originalGroup = $group;
        var dir;

        if (containerType === 'source') {
          if (_.indexOf([40, 63233], event.keyCode) > -1) {
            $activeButtons.find('.ckeditor-toolbar-group-buttons').eq(0).prepend($button);
          }
        } else if (containerType === 'target') {
          if (_.indexOf(leftRightKeys, event.keyCode) > -1) {
            var $siblings = $container.children();
            var index = $siblings.index($button);

            if (_.indexOf([37, 63234], event.keyCode) > -1) {
              if (index > 0) {
                $button.insertBefore($container.children().eq(index - 1));
              } else {
                  $group = $container.parent().prev();

                  if ($group.length > 0) {
                    $group.find('.ckeditor-toolbar-group-buttons').append($button);
                  } else {
                      $container.closest('.ckeditor-row').prev().find('.ckeditor-toolbar-group').not('.placeholder').find('.ckeditor-toolbar-group-buttons').eq(-1).append($button);
                    }
                }
            } else if (_.indexOf([39, 63235], event.keyCode) > -1) {
                if (index < $siblings.length - 1) {
                  $button.insertAfter($container.children().eq(index + 1));
                } else {
                    $container.parent().next().find('.ckeditor-toolbar-group-buttons').prepend($button);
                  }
              }
          } else if (_.indexOf(upDownKeys, event.keyCode) > -1) {
              dir = _.indexOf([38, 63232], event.keyCode) > -1 ? 'prev' : 'next';
              $row = $container.closest('.ckeditor-row')[dir]();

              if (dir === 'prev' && $row.length === 0) {
                if ($button.data('drupal-ckeditor-type') === 'separator') {
                  $button.off().remove();
                  $activeButtons.find('.ckeditor-toolbar-group-buttons').eq(0).children().eq(0).children().trigger('focus');
                } else {
                    $availableButtons.prepend($button);
                  }
              } else {
                $row.find('.ckeditor-toolbar-group-buttons').eq(0).prepend($button);
              }
            }
        } else if (containerType === 'dividers') {
            if (_.indexOf([40, 63233], event.keyCode) > -1) {
              $button = $button.clone(true);
              $activeButtons.find('.ckeditor-toolbar-group-buttons').eq(0).prepend($button);
              $target = $button.children();
            }
          }

        view = this;
        Drupal.ckeditor.registerButtonMove(this, $button, function (result) {
          if (!result && $originalGroup) {
            $originalGroup.find('.ckeditor-buttons').append($button);
          }

          $target.trigger('focus');
        });
        event.preventDefault();
        event.stopPropagation();
      }
    },
    onPressGroup: function onPressGroup(event) {
      var upDownKeys = [38, 63232, 40, 63233];
      var leftRightKeys = [37, 63234, 39, 63235];

      if (event.keyCode === 13) {
        var view = this;
        window.setTimeout(function () {
          Drupal.ckeditor.openGroupNameDialog(view, $(event.currentTarget));
        }, 0);
        event.preventDefault();
        event.stopPropagation();
      }

      if (_.indexOf(_.union(upDownKeys, leftRightKeys), event.keyCode) > -1) {
        var $group = $(event.currentTarget);
        var $container = $group.parent();
        var $siblings = $container.children();
        var index;
        var dir;

        if (_.indexOf(leftRightKeys, event.keyCode) > -1) {
          index = $siblings.index($group);

          if (_.indexOf([37, 63234], event.keyCode) > -1) {
            if (index > 0) {
              $group.insertBefore($siblings.eq(index - 1));
            } else {
                var $rowChildElement = $container.closest('.ckeditor-row').prev().find('.ckeditor-toolbar-groups').children().eq(-1);
                $group.insertBefore($rowChildElement);
              }
          } else if (_.indexOf([39, 63235], event.keyCode) > -1) {
              if (!$siblings.eq(index + 1).hasClass('placeholder')) {
                $group.insertAfter($container.children().eq(index + 1));
              } else {
                  $container.closest('.ckeditor-row').next().find('.ckeditor-toolbar-groups').prepend($group);
                }
            }
        } else if (_.indexOf(upDownKeys, event.keyCode) > -1) {
            dir = _.indexOf([38, 63232], event.keyCode) > -1 ? 'prev' : 'next';
            $group.closest('.ckeditor-row')[dir]().find('.ckeditor-toolbar-groups').eq(0).prepend($group);
          }

        Drupal.ckeditor.registerGroupMove(this, $group);
        $group.trigger('focus');
        event.preventDefault();
        event.stopPropagation();
      }
    }
  });
})(jQuery, Drupal, Backbone, _);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, Backbone, CKEDITOR, _) {
  Drupal.ckeditor.ControllerView = Backbone.View.extend({
    events: {},
    initialize: function initialize() {
      this.getCKEditorFeatures(this.model.get('hiddenEditorConfig'), this.disableFeaturesDisallowedByFilters.bind(this));
      this.model.listenTo(this.model, 'change:activeEditorConfig', this.model.sync);
      this.listenTo(this.model, 'change:isDirty', this.parseEditorDOM);
    },
    parseEditorDOM: function parseEditorDOM(model, isDirty, options) {
      if (isDirty) {
        var currentConfig = this.model.get('activeEditorConfig');
        var rows = [];
        this.$el.find('.ckeditor-active-toolbar-configuration').children('.ckeditor-row').each(function () {
          var groups = [];
          $(this).find('.ckeditor-toolbar-group').each(function () {
            var $group = $(this);
            var $buttons = $group.find('.ckeditor-button');

            if ($buttons.length) {
              var group = {
                name: $group.attr('data-drupal-ckeditor-toolbar-group-name'),
                items: []
              };
              $group.find('.ckeditor-button, .ckeditor-multiple-button').each(function () {
                group.items.push($(this).attr('data-drupal-ckeditor-button-name'));
              });
              groups.push(group);
            }
          });

          if (groups.length) {
            rows.push(groups);
          }
        });
        this.model.set('activeEditorConfig', rows);
        this.model.set('isDirty', false);

        if (options.broadcast !== false) {
          var prev = this.getButtonList(currentConfig);
          var next = this.getButtonList(rows);

          if (prev.length !== next.length) {
            this.$el.find('.ckeditor-toolbar-active').trigger('CKEditorToolbarChanged', [prev.length < next.length ? 'added' : 'removed', _.difference(_.union(prev, next), _.intersection(prev, next))[0]]);
          }
        }
      }
    },
    getCKEditorFeatures: function getCKEditorFeatures(CKEditorConfig, callback) {
      var getProperties = function getProperties(CKEPropertiesList) {
        return _.isObject(CKEPropertiesList) ? _.keys(CKEPropertiesList) : [];
      };

      var convertCKERulesToEditorFeature = function convertCKERulesToEditorFeature(feature, CKEFeatureRules) {
        for (var i = 0; i < CKEFeatureRules.length; i++) {
          var CKERule = CKEFeatureRules[i];
          var rule = new Drupal.EditorFeatureHTMLRule();
          var tags = getProperties(CKERule.elements);
          rule.required.tags = CKERule.propertiesOnly ? [] : tags;
          rule.allowed.tags = tags;
          rule.required.attributes = getProperties(CKERule.requiredAttributes);
          rule.allowed.attributes = getProperties(CKERule.attributes);
          rule.required.styles = getProperties(CKERule.requiredStyles);
          rule.allowed.styles = getProperties(CKERule.styles);
          rule.required.classes = getProperties(CKERule.requiredClasses);
          rule.allowed.classes = getProperties(CKERule.classes);
          rule.raw = CKERule;
          feature.addHTMLRule(rule);
        }
      };

      var hiddenCKEditorID = 'ckeditor-hidden';

      if (CKEDITOR.instances[hiddenCKEditorID]) {
        CKEDITOR.instances[hiddenCKEditorID].destroy(true);
      }

      var hiddenEditorConfig = this.model.get('hiddenEditorConfig');

      if (hiddenEditorConfig.drupalExternalPlugins) {
        var externalPlugins = hiddenEditorConfig.drupalExternalPlugins;
        Object.keys(externalPlugins || {}).forEach(function (pluginName) {
          CKEDITOR.plugins.addExternal(pluginName, externalPlugins[pluginName], '');
        });
      }

      CKEDITOR.inline($("#".concat(hiddenCKEditorID)).get(0), CKEditorConfig);
      CKEDITOR.once('instanceReady', function (e) {
        if (e.editor.name === hiddenCKEditorID) {
          var CKEFeatureRulesMap = {};
          var rules = e.editor.filter.allowedContent;
          var rule;
          var name;

          for (var i = 0; i < rules.length; i++) {
            rule = rules[i];
            name = rule.featureName || ':(';

            if (!CKEFeatureRulesMap[name]) {
              CKEFeatureRulesMap[name] = [];
            }

            CKEFeatureRulesMap[name].push(rule);
          }

          var features = {};
          var buttonsToFeatures = {};
          Object.keys(CKEFeatureRulesMap).forEach(function (featureName) {
            var feature = new Drupal.EditorFeature(featureName);
            convertCKERulesToEditorFeature(feature, CKEFeatureRulesMap[featureName]);
            features[featureName] = feature;
            var command = e.editor.getCommand(featureName);

            if (command) {
              buttonsToFeatures[command.uiItems[0].name] = featureName;
            }
          });
          callback(features, buttonsToFeatures);
        }
      });
    },
    getFeatureForButton: function getFeatureForButton(button) {
      if (button === '-') {
        return false;
      }

      var featureName = this.model.get('buttonsToFeatures')[button.toLowerCase()];

      if (!featureName) {
        featureName = button.toLowerCase();
      }

      var featuresMetadata = this.model.get('featuresMetadata');

      if (!featuresMetadata[featureName]) {
        featuresMetadata[featureName] = new Drupal.EditorFeature(featureName);
        this.model.set('featuresMetadata', featuresMetadata);
      }

      return featuresMetadata[featureName];
    },
    disableFeaturesDisallowedByFilters: function disableFeaturesDisallowedByFilters(features, buttonsToFeatures) {
      this.model.set('featuresMetadata', features);
      this.model.set('buttonsToFeatures', buttonsToFeatures);
      this.broadcastConfigurationChanges(this.$el);
      var existingButtons = [];

      var buttonGroups = _.flatten(this.model.get('activeEditorConfig'));

      for (var i = 0; i < buttonGroups.length; i++) {
        var buttons = buttonGroups[i].items;

        for (var k = 0; k < buttons.length; k++) {
          existingButtons.push(buttons[k]);
        }
      }

      existingButtons = _.unique(existingButtons);

      for (var n = 0; n < existingButtons.length; n++) {
        var button = existingButtons[n];
        var feature = this.getFeatureForButton(button);

        if (feature === false) {
          continue;
        }

        if (Drupal.editorConfiguration.featureIsAllowedByFilters(feature)) {
          this.$el.find('.ckeditor-toolbar-active').trigger('CKEditorToolbarChanged', ['added', existingButtons[n]]);
        } else {
          $(".ckeditor-toolbar-active li[data-drupal-ckeditor-button-name=\"".concat(button, "\"]")).detach().appendTo('.ckeditor-toolbar-disabled > .ckeditor-toolbar-available > ul');
          this.model.set({
            isDirty: true
          }, {
            broadcast: false
          });
        }
      }
    },
    broadcastConfigurationChanges: function broadcastConfigurationChanges($ckeditorToolbar) {
      var view = this;
      var hiddenEditorConfig = this.model.get('hiddenEditorConfig');
      var getFeatureForButton = this.getFeatureForButton.bind(this);
      var getCKEditorFeatures = this.getCKEditorFeatures.bind(this);
      $ckeditorToolbar.find('.ckeditor-toolbar-active').on('CKEditorToolbarChanged.ckeditorAdmin', function (event, action, button) {
        var feature = getFeatureForButton(button);

        if (feature === false) {
          return;
        }

        var configEvent = action === 'added' ? 'addedFeature' : 'removedFeature';
        Drupal.editorConfiguration[configEvent](feature);
      }).on('CKEditorPluginSettingsChanged.ckeditorAdmin', function (event, settingsChanges) {
        Object.keys(settingsChanges || {}).forEach(function (key) {
          hiddenEditorConfig[key] = settingsChanges[key];
        });
        getCKEditorFeatures(hiddenEditorConfig, function (features) {
          var featuresMetadata = view.model.get('featuresMetadata');
          Object.keys(features || {}).forEach(function (name) {
            var feature = features[name];

            if (featuresMetadata.hasOwnProperty(name) && !_.isEqual(featuresMetadata[name], feature)) {
              Drupal.editorConfiguration.modifiedFeature(feature);
            }
          });
          view.model.set('featuresMetadata', features);
        });
      });
    },
    getButtonList: function getButtonList(config) {
      var buttons = [];
      config = _.flatten(config);
      config.forEach(function (group) {
        group.items.forEach(function (button) {
          buttons.push(button);
        });
      });
      return _.without(buttons, '-');
    }
  });
})(jQuery, Drupal, Backbone, CKEDITOR, _);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function (Drupal, Backbone, $, Sortable) {
  Drupal.ckeditor.VisualView = Backbone.View.extend({
    events: {
      'click .ckeditor-toolbar-group-name': 'onGroupNameClick',
      'click .ckeditor-groupnames-toggle': 'onGroupNamesToggleClick',
      'click .ckeditor-add-new-group button': 'onAddGroupButtonClick'
    },
    initialize: function initialize() {
      this.listenTo(this.model, 'change:isDirty change:groupNamesVisible', this.render);
      $(Drupal.theme('ckeditorButtonGroupNamesToggle')).prependTo(this.$el.find('#ckeditor-active-toolbar').parent());
      this.render();
    },
    render: function render(model, value, changedAttributes) {
      this.insertPlaceholders();
      this.applySorting();
      var groupNamesVisible = this.model.get('groupNamesVisible');

      if (changedAttributes && changedAttributes.changes && changedAttributes.changes.isDirty) {
        this.model.set({
          groupNamesVisible: true
        }, {
          silent: true
        });
        groupNamesVisible = true;
      }

      this.$el.find('[data-toolbar="active"]').toggleClass('ckeditor-group-names-are-visible', groupNamesVisible);
      this.$el.find('.ckeditor-groupnames-toggle').text(groupNamesVisible ? Drupal.t('Hide group names') : Drupal.t('Show group names')).attr('aria-pressed', groupNamesVisible);
      return this;
    },
    onGroupNameClick: function onGroupNameClick(event) {
      var $group = $(event.currentTarget).closest('.ckeditor-toolbar-group');
      Drupal.ckeditor.openGroupNameDialog(this, $group);
      event.stopPropagation();
      event.preventDefault();
    },
    onGroupNamesToggleClick: function onGroupNamesToggleClick(event) {
      this.model.set('groupNamesVisible', !this.model.get('groupNamesVisible'));
      event.preventDefault();
    },
    onAddGroupButtonClick: function onAddGroupButtonClick(event) {
      function insertNewGroup(success, $group) {
        if (success) {
          $group.appendTo($(event.currentTarget).closest('.ckeditor-row').children('.ckeditor-toolbar-groups'));
          $group.trigger('focus');
        }
      }

      Drupal.ckeditor.openGroupNameDialog(this, $(Drupal.theme('ckeditorToolbarGroup')), insertNewGroup);
      event.preventDefault();
    },
    endGroupDrag: function endGroupDrag(event) {
      var $item = $(event.item);
      Drupal.ckeditor.registerGroupMove(this, $item);
    },
    startButtonDrag: function startButtonDrag(event) {
      this.$el.find('a:focus').trigger('blur');
      this.model.set('groupNamesVisible', true);
    },
    endButtonDrag: function endButtonDrag(event) {
      var $item = $(event.item);
      Drupal.ckeditor.registerButtonMove(this, $item, function (success) {
        $item.find('a').trigger('focus');
      });
    },
    applySorting: function applySorting() {
      var _this = this;

      Array.prototype.forEach.call(this.el.querySelectorAll('.ckeditor-buttons:not(.js-sortable)'), function (buttons) {
        buttons.classList.add('js-sortable');
        Sortable.create(buttons, {
          ghostClass: 'ckeditor-button-placeholder',
          group: 'ckeditor-buttons',
          onStart: _this.startButtonDrag.bind(_this),
          onEnd: _this.endButtonDrag.bind(_this)
        });
      });
      Array.prototype.forEach.call(this.el.querySelectorAll('.ckeditor-toolbar-groups:not(.js-sortable)'), function (buttons) {
        buttons.classList.add('js-sortable');
        Sortable.create(buttons, {
          ghostClass: 'ckeditor-toolbar-group-placeholder',
          onEnd: _this.endGroupDrag.bind(_this)
        });
      });
      Array.prototype.forEach.call(this.el.querySelectorAll('.ckeditor-multiple-buttons:not(.js-sortable)'), function (buttons) {
        buttons.classList.add('js-sortable');
        Sortable.create(buttons, {
          group: {
            name: 'ckeditor-buttons',
            pull: 'clone'
          },
          onEnd: _this.endButtonDrag.bind(_this)
        });
      });
    },
    insertPlaceholders: function insertPlaceholders() {
      this.insertPlaceholderRow();
      this.insertNewGroupButtons();
    },
    insertPlaceholderRow: function insertPlaceholderRow() {
      var $rows = this.$el.find('.ckeditor-row');

      if (!$rows.eq(-1).hasClass('placeholder')) {
        this.$el.find('.ckeditor-toolbar-active').children('.ckeditor-active-toolbar-configuration').append(Drupal.theme('ckeditorRow'));
      }

      $rows = this.$el.find('.ckeditor-row');
      var len = $rows.length;
      $rows.filter(function (index, row) {
        if (index + 1 === len) {
          return false;
        }

        return $(row).find('.ckeditor-toolbar-group').not('.placeholder').length === 0;
      }).remove();
    },
    insertNewGroupButtons: function insertNewGroupButtons() {
      this.$el.find('.ckeditor-row').each(function () {
        var $row = $(this);
        var $groups = $row.find('.ckeditor-toolbar-group');
        var $button = $row.find('.ckeditor-add-new-group');

        if ($button.length === 0) {
          $row.children('.ckeditor-toolbar-groups').append(Drupal.theme('ckeditorNewButtonGroup'));
        } else if (!$groups.eq(-1).hasClass('ckeditor-add-new-group')) {
            $button.appendTo($row.children('.ckeditor-toolbar-groups'));
          }
      });
    }
  });
})(Drupal, Backbone, jQuery, Sortable);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, drupalSettings, _) {
  Drupal.behaviors.ckeditorStylesComboSettings = {
    attach: function attach(context) {
      var $context = $(context);
      var $ckeditorActiveToolbar = $context.find('.ckeditor-toolbar-configuration').find('.ckeditor-toolbar-active');
      var previousStylesSet = drupalSettings.ckeditor.hiddenCKEditorConfig.stylesSet;
      var that = this;
      $context.find('[name="editor[settings][plugins][stylescombo][styles]"]').on('blur.ckeditorStylesComboSettings', function () {
        var styles = $.trim($(this).val());

        var stylesSet = that._generateStylesSetSetting(styles);

        if (!_.isEqual(previousStylesSet, stylesSet)) {
          previousStylesSet = stylesSet;
          $ckeditorActiveToolbar.trigger('CKEditorPluginSettingsChanged', [{
            stylesSet: stylesSet
          }]);
        }
      });
    },
    _generateStylesSetSetting: function _generateStylesSetSetting(styles) {
      var stylesSet = [];
      styles = styles.replace(/\r/g, '\n');
      var lines = styles.split('\n');

      for (var i = 0; i < lines.length; i++) {
        var style = $.trim(lines[i]);

        if (style.length === 0) {
          continue;
        }

        if (style.match(/^ *[a-zA-Z0-9]+ *(\.[a-zA-Z0-9_-]+ *)*\| *.+ *$/) === null) {
          continue;
        }

        var parts = style.split('|');
        var selector = parts[0];
        var label = parts[1];
        var classes = selector.split('.');
        var element = classes.shift();
        stylesSet.push({
          attributes: {
            class: classes.join(' ')
          },
          element: element,
          name: label
        });
      }

      return stylesSet;
    }
  };
  Drupal.behaviors.ckeditorStylesComboSettingsSummary = {
    attach: function attach() {
      $('[data-ckeditor-plugin-id="stylescombo"]').drupalSetSummary(function (context) {
        var styles = $.trim($('[data-drupal-selector="edit-editor-settings-plugins-stylescombo-styles"]').val());

        if (styles.length === 0) {
          return Drupal.t('No styles configured');
        }

        var count = $.trim(styles).split('\n').length;
        return Drupal.t('@count styles configured', {
          '@count': count
        });
      });
    }
  };
})(jQuery, Drupal, drupalSettings, _);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal) {
  Drupal.behaviors.ckeditorLanguageSettingsSummary = {
    attach: function attach() {
      $('#edit-editor-settings-plugins-language').drupalSetSummary(function (context) {
        return $('#edit-editor-settings-plugins-language-language-list-type option:selected').text();
      });
    }
  };
})(jQuery, Drupal);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.ckeditorDrupalImageSettingsSummary = {
    attach: function attach() {
      $('[data-ckeditor-plugin-id="drupalimage"]').drupalSetSummary(function (context) {
        var root = 'input[name="editor[settings][plugins][drupalimage][image_upload]';
        var $status = $("".concat(root, "[status]\"]"));
        var $maxFileSize = $("".concat(root, "[max_size]\"]"));
        var $maxWidth = $("".concat(root, "[max_dimensions][width]\"]"));
        var $maxHeight = $("".concat(root, "[max_dimensions][height]\"]"));
        var $scheme = $("".concat(root, "[scheme]\"]:checked"));
        var maxFileSize = $maxFileSize.val() ? $maxFileSize.val() : $maxFileSize.attr('placeholder');
        var maxDimensions = $maxWidth.val() && $maxHeight.val() ? "(".concat($maxWidth.val(), "x").concat($maxHeight.val(), ")") : '';

        if (!$status.is(':checked')) {
          return Drupal.t('Uploads disabled');
        }

        var output = '';
        output += Drupal.t('Uploads enabled, max size: @size @dimensions', {
          '@size': maxFileSize,
          '@dimensions': maxDimensions
        });

        if ($scheme.length) {
          output += "<br />".concat($scheme.attr('data-label'));
        }

        return output;
      });
    }
  };
})(jQuery, Drupal, drupalSettings);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal) {
  var states = {
    postponed: []
  };
  Drupal.states = states;

  function invert(a, invertState) {
    return invertState && typeof a !== 'undefined' ? !a : a;
  }

  function _compare2(a, b) {
    if (a === b) {
      return typeof a === 'undefined' ? a : true;
    }

    return typeof a === 'undefined' || typeof b === 'undefined';
  }

  function ternary(a, b) {
    if (typeof a === 'undefined') {
      return b;
    }

    if (typeof b === 'undefined') {
      return a;
    }

    return a && b;
  }

  Drupal.behaviors.states = {
    attach: function attach(context, settings) {
      var $states = $(context).find('[data-drupal-states]');
      var il = $states.length;

      var _loop = function _loop(i) {
        var config = JSON.parse($states[i].getAttribute('data-drupal-states'));
        Object.keys(config || {}).forEach(function (state) {
          new states.Dependent({
            element: $($states[i]),
            state: states.State.sanitize(state),
            constraints: config[state]
          });
        });
      };

      for (var i = 0; i < il; i++) {
        _loop(i);
      }

      while (states.postponed.length) {
        states.postponed.shift()();
      }
    }
  };

  states.Dependent = function (args) {
    var _this = this;

    $.extend(this, {
      values: {},
      oldValue: null
    }, args);
    this.dependees = this.getDependees();
    Object.keys(this.dependees || {}).forEach(function (selector) {
      _this.initializeDependee(selector, _this.dependees[selector]);
    });
  };

  states.Dependent.comparisons = {
    RegExp: function RegExp(reference, value) {
      return reference.test(value);
    },
    Function: function Function(reference, value) {
      return reference(value);
    },
    Number: function Number(reference, value) {
      return typeof value === 'string' ? _compare2(reference.toString(), value) : _compare2(reference, value);
    }
  };
  states.Dependent.prototype = {
    initializeDependee: function initializeDependee(selector, dependeeStates) {
      var _this2 = this;

      this.values[selector] = {};
      Object.keys(dependeeStates).forEach(function (i) {
        var state = dependeeStates[i];

        if ($.inArray(state, dependeeStates) === -1) {
          return;
        }

        state = states.State.sanitize(state);
        _this2.values[selector][state.name] = null;
        $(selector).on("state:".concat(state), {
          selector: selector,
          state: state
        }, function (e) {
          _this2.update(e.data.selector, e.data.state, e.value);
        });
        new states.Trigger({
          selector: selector,
          state: state
        });
      });
    },
    compare: function compare(reference, selector, state) {
      var value = this.values[selector][state.name];

      if (reference.constructor.name in states.Dependent.comparisons) {
        return states.Dependent.comparisons[reference.constructor.name](reference, value);
      }

      return _compare2(reference, value);
    },
    update: function update(selector, state, value) {
      if (value !== this.values[selector][state.name]) {
        this.values[selector][state.name] = value;
        this.reevaluate();
      }
    },
    reevaluate: function reevaluate() {
      var value = this.verifyConstraints(this.constraints);

      if (value !== this.oldValue) {
        this.oldValue = value;
        value = invert(value, this.state.invert);
        this.element.trigger({
          type: "state:".concat(this.state),
          value: value,
          trigger: true
        });
      }
    },
    verifyConstraints: function verifyConstraints(constraints, selector) {
      var result;

      if ($.isArray(constraints)) {
        var hasXor = $.inArray('xor', constraints) === -1;
        var len = constraints.length;

        for (var i = 0; i < len; i++) {
          if (constraints[i] !== 'xor') {
            var constraint = this.checkConstraints(constraints[i], selector, i);

            if (constraint && (hasXor || result)) {
              return hasXor;
            }

            result = result || constraint;
          }
        }
      } else if ($.isPlainObject(constraints)) {
          for (var n in constraints) {
            if (constraints.hasOwnProperty(n)) {
              result = ternary(result, this.checkConstraints(constraints[n], selector, n));

              if (result === false) {
                return false;
              }
            }
          }
        }

      return result;
    },
    checkConstraints: function checkConstraints(value, selector, state) {
      if (typeof state !== 'string' || /[0-9]/.test(state[0])) {
        state = null;
      } else if (typeof selector === 'undefined') {
        selector = state;
        state = null;
      }

      if (state !== null) {
        state = states.State.sanitize(state);
        return invert(this.compare(value, selector, state), state.invert);
      }

      return this.verifyConstraints(value, selector);
    },
    getDependees: function getDependees() {
      var cache = {};
      var _compare = this.compare;

      this.compare = function (reference, selector, state) {
        (cache[selector] || (cache[selector] = [])).push(state.name);
      };

      this.verifyConstraints(this.constraints);
      this.compare = _compare;
      return cache;
    }
  };

  states.Trigger = function (args) {
    $.extend(this, args);

    if (this.state in states.Trigger.states) {
      this.element = $(this.selector);

      if (!this.element.data("trigger:".concat(this.state))) {
        this.initialize();
      }
    }
  };

  states.Trigger.prototype = {
    initialize: function initialize() {
      var _this3 = this;

      var trigger = states.Trigger.states[this.state];

      if (typeof trigger === 'function') {
        trigger.call(window, this.element);
      } else {
        Object.keys(trigger || {}).forEach(function (event) {
          _this3.defaultTrigger(event, trigger[event]);
        });
      }

      this.element.data("trigger:".concat(this.state), true);
    },
    defaultTrigger: function defaultTrigger(event, valueFn) {
      var oldValue = valueFn.call(this.element);
      this.element.on(event, $.proxy(function (e) {
        var value = valueFn.call(this.element, e);

        if (oldValue !== value) {
          this.element.trigger({
            type: "state:".concat(this.state),
            value: value,
            oldValue: oldValue
          });
          oldValue = value;
        }
      }, this));
      states.postponed.push($.proxy(function () {
        this.element.trigger({
          type: "state:".concat(this.state),
          value: oldValue,
          oldValue: null
        });
      }, this));
    }
  };
  states.Trigger.states = {
    empty: {
      keyup: function keyup() {
        return this.val() === '';
      }
    },
    checked: {
      change: function change() {
        var checked = false;
        this.each(function () {
          checked = $(this).prop('checked');
          return !checked;
        });
        return checked;
      }
    },
    value: {
      keyup: function keyup() {
        if (this.length > 1) {
          return this.filter(':checked').val() || false;
        }

        return this.val();
      },
      change: function change() {
        if (this.length > 1) {
          return this.filter(':checked').val() || false;
        }

        return this.val();
      }
    },
    collapsed: {
      collapsed: function collapsed(e) {
        return typeof e !== 'undefined' && 'value' in e ? e.value : !this.is('[open]');
      }
    }
  };

  states.State = function (state) {
    this.pristine = state;
    this.name = state;
    var process = true;

    do {
      while (this.name.charAt(0) === '!') {
        this.name = this.name.substring(1);
        this.invert = !this.invert;
      }

      if (this.name in states.State.aliases) {
        this.name = states.State.aliases[this.name];
      } else {
        process = false;
      }
    } while (process);
  };

  states.State.sanitize = function (state) {
    if (state instanceof states.State) {
      return state;
    }

    return new states.State(state);
  };

  states.State.aliases = {
    enabled: '!disabled',
    invisible: '!visible',
    invalid: '!valid',
    untouched: '!touched',
    optional: '!required',
    filled: '!empty',
    unchecked: '!checked',
    irrelevant: '!relevant',
    expanded: '!collapsed',
    open: '!collapsed',
    closed: 'collapsed',
    readwrite: '!readonly'
  };
  states.State.prototype = {
    invert: false,
    toString: function toString() {
      return this.name;
    }
  };
  var $document = $(document);
  $document.on('state:disabled', function (e) {
    if (e.trigger) {
      $(e.target).prop('disabled', e.value).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggleClass('form-disabled', e.value).find('select, input, textarea').prop('disabled', e.value);
    }
  });
  $document.on('state:required', function (e) {
    if (e.trigger) {
      if (e.value) {
        var label = "label".concat(e.target.id ? "[for=".concat(e.target.id, "]") : '');
        var $label = $(e.target).attr({
          required: 'required',
          'aria-required': 'true'
        }).closest('.js-form-item, .js-form-wrapper').find(label);

        if (!$label.hasClass('js-form-required').length) {
          $label.addClass('js-form-required form-required');
        }
      } else {
        $(e.target).removeAttr('required aria-required').closest('.js-form-item, .js-form-wrapper').find('label.js-form-required').removeClass('js-form-required form-required');
      }
    }
  });
  $document.on('state:visible', function (e) {
    if (e.trigger) {
      $(e.target).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggle(e.value);
    }
  });
  $document.on('state:checked', function (e) {
    if (e.trigger) {
      $(e.target).prop('checked', e.value);
    }
  });
  $document.on('state:collapsed', function (e) {
    if (e.trigger) {
      if ($(e.target).is('[open]') === e.value) {
        $(e.target).find('> summary').trigger('click');
      }
    }
  });
})(jQuery, Drupal);;
