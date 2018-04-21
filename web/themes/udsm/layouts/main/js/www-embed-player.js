(function(){var k,n=this;function p(a){return void 0!==a}
function q(a,b,c){a=a.split(".");c=c||n;a[0]in c||!c.execScript||c.execScript("var "+a[0]);for(var d;a.length&&(d=a.shift());)!a.length&&p(b)?c[d]=b:c[d]?c=c[d]:c=c[d]={}}
function r(a,b){a=a.split(".");b=b||n;for(var c;c=a.shift();)if(null!=b[c])b=b[c];else return null;return b}
function t(){}
function aa(){throw Error("unimplemented abstract method");}
function ba(a){a.getInstance=function(){return a.Ja?a.Ja:a.Ja=new a}}
function ca(a){var b=typeof a;if("object"==b)if(a){if(a instanceof Array)return"array";if(a instanceof Object)return b;var c=Object.prototype.toString.call(a);if("[object Window]"==c)return"object";if("[object Array]"==c||"number"==typeof a.length&&"undefined"!=typeof a.splice&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("splice"))return"array";if("[object Function]"==c||"undefined"!=typeof a.call&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("call"))return"function"}else return"null";
else if("function"==b&&"undefined"==typeof a.call)return"object";return b}
function da(a){return"array"==ca(a)}
function ea(a){var b=ca(a);return"array"==b||"object"==b&&"number"==typeof a.length}
function u(a){return"string"==typeof a}
function fa(a){return"function"==ca(a)}
function ga(a){var b=typeof a;return"object"==b&&null!=a||"function"==b}
function ia(a){return a[ja]||(a[ja]=++ka)}
var ja="closure_uid_"+(1E9*Math.random()>>>0),ka=0;function la(a,b,c){return a.call.apply(a.bind,arguments)}
function ma(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}}
function w(a,b,c){w=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?la:ma;return w.apply(null,arguments)}
function na(a,b){var c=Array.prototype.slice.call(arguments,1);return function(){var b=c.slice();b.push.apply(b,arguments);return a.apply(this,b)}}
function oa(a,b){for(var c in b)a[c]=b[c]}
var x=Date.now||function(){return+new Date};
function y(a,b){function c(){}
c.prototype=b.prototype;a.B=b.prototype;a.prototype=new c;a.prototype.constructor=a;a.gc=function(a,c,f){for(var d=Array(arguments.length-2),e=2;e<arguments.length;e++)d[e-2]=arguments[e];return b.prototype[c].apply(a,d)}}
;function pa(a){if(Error.captureStackTrace)Error.captureStackTrace(this,pa);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}
y(pa,Error);pa.prototype.name="CustomError";var qa;function ra(a){return/^[\s\xa0]*$/.test(a)}
var sa=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")};
function ta(a,b){return a<b?-1:a>b?1:0}
function ua(a){for(var b=0,c=0;c<a.length;++c)b=31*b+a.charCodeAt(c)>>>0;return b}
;var va=Array.prototype.indexOf?function(a,b,c){return Array.prototype.indexOf.call(a,b,c)}:function(a,b,c){c=null==c?0:0>c?Math.max(0,a.length+c):c;
if(u(a))return u(b)&&1==b.length?a.indexOf(b,c):-1;for(;c<a.length;c++)if(c in a&&a[c]===b)return c;return-1},z=Array.prototype.forEach?function(a,b,c){Array.prototype.forEach.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=u(a)?a.split(""):a,f=0;f<d;f++)f in e&&b.call(c,e[f],f,a)},wa=Array.prototype.filter?function(a,b,c){return Array.prototype.filter.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=[],f=0,g=u(a)?a.split(""):a,l=0;l<d;l++)if(l in g){var h=g[l];
b.call(c,h,l,a)&&(e[f++]=h)}return e},xa=Array.prototype.map?function(a,b,c){return Array.prototype.map.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=Array(d),f=u(a)?a.split(""):a,g=0;g<d;g++)g in f&&(e[g]=b.call(c,f[g],g,a));
return e},ya=Array.prototype.some?function(a,b,c){return Array.prototype.some.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=u(a)?a.split(""):a,f=0;f<d;f++)if(f in e&&b.call(c,e[f],f,a))return!0;
return!1};
function za(a,b){a:{for(var c=a.length,d=u(a)?a.split(""):a,e=0;e<c;e++)if(e in d&&b.call(void 0,d[e],e,a)){b=e;break a}b=-1}return 0>b?null:u(a)?a.charAt(b):a[b]}
function Da(a,b){return 0<=va(a,b)}
function Ea(a,b){b=va(a,b);0<=b&&Array.prototype.splice.call(a,b,1)}
function Fa(a){return Array.prototype.concat.apply(Array.prototype,arguments)}
function Ga(a){var b=a.length;if(0<b){for(var c=Array(b),d=0;d<b;d++)c[d]=a[d];return c}return[]}
function Ha(a,b){for(var c=1;c<arguments.length;c++){var d=arguments[c];if(ea(d)){var e=a.length||0,f=d.length||0;a.length=e+f;for(var g=0;g<f;g++)a[e+g]=d[g]}else a.push(d)}}
function Ia(a,b,c,d){return Array.prototype.splice.apply(a,Ja(arguments,1))}
function Ja(a,b,c){return 2>=arguments.length?Array.prototype.slice.call(a,b):Array.prototype.slice.call(a,b,c)}
;function Ka(a,b){for(var c in a)b.call(void 0,a[c],c,a)}
function La(a){var b=Ma,c;for(c in b)if(a.call(void 0,b[c],c,b))return c}
function Na(){var a=Oa,b;for(b in a)return!1;return!0}
function Pa(a,b){if(null!==a&&b in a)throw Error('The object already contains the key "'+b+'"');a[b]=!0}
function Qa(a){var b={},c;for(c in a)b[c]=a[c];return b}
var Ra="constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" ");function Sa(a,b){for(var c,d,e=1;e<arguments.length;e++){d=arguments[e];for(c in d)a[c]=d[c];for(var f=0;f<Ra.length;f++)c=Ra[f],Object.prototype.hasOwnProperty.call(d,c)&&(a[c]=d[c])}}
;var A;a:{var Ta=n.navigator;if(Ta){var Ua=Ta.userAgent;if(Ua){A=Ua;break a}}A=""}function B(a){return-1!=A.indexOf(a)}
;function Va(){return(B("Chrome")||B("CriOS"))&&!B("Edge")}
;function Wa(){this.b="";this.f=Xa}
Wa.prototype.va=!0;Wa.prototype.ua=function(){return this.b};
function Ya(a){return a instanceof Wa&&a.constructor===Wa&&a.f===Xa?a.b:"type_error:SafeUrl"}
var Za=/^(?:(?:https?|mailto|ftp):|[^&:/?#]*(?:[/?#]|$))/i;function $a(a){if(a instanceof Wa)return a;a=a.va?a.ua():String(a);Za.test(a)||(a="about:invalid#zClosurez");return ab(a)}
var Xa={};function ab(a){var b=new Wa;b.b=a;return b}
ab("about:blank");function bb(){this.b="";this.f=cb}
bb.prototype.va=!0;bb.prototype.ua=function(){return this.b};
var cb={};function db(){this.b=""}
db.prototype.va=!0;db.prototype.ua=function(){return this.b};
function eb(a){var b=new db;b.b=a;return b}
eb("<!DOCTYPE html>");eb("");eb("<br>");function fb(a,b){b=b instanceof Wa?b:$a(b);a.href=Ya(b)}
function gb(a,b){a.rel="stylesheet";a.href=b instanceof bb&&b.constructor===bb&&b.f===cb?b.b:"type_error:TrustedResourceUrl"}
;function hb(a,b,c){a&&(a.dataset?a.dataset[ib(b)]=c:a.setAttribute("data-"+b,c))}
function C(a,b){return a?a.dataset?a.dataset[ib(b)]:a.getAttribute("data-"+b):null}
function jb(a,b){a&&(a.dataset?delete a.dataset[ib(b)]:a.removeAttribute("data-"+b))}
var kb={};function ib(a){return kb[a]||(kb[a]=String(a).replace(/\-([a-z])/g,function(a,c){return c.toUpperCase()}))}
;function lb(a){n.setTimeout(function(){throw a;},0)}
var mb;
function nb(){var a=n.MessageChannel;"undefined"===typeof a&&"undefined"!==typeof window&&window.postMessage&&window.addEventListener&&!B("Presto")&&(a=function(){var a=document.createElement("IFRAME");a.style.display="none";a.src="";document.documentElement.appendChild(a);var b=a.contentWindow,a=b.document;a.open();a.write("");a.close();var c="callImmediate"+Math.random(),d="file:"==b.location.protocol?"*":b.location.protocol+"//"+b.location.host,a=w(function(a){if(("*"==d||a.origin==d)&&a.data==
c)this.port1.onmessage()},this);
b.addEventListener("message",a,!1);this.port1={};this.port2={postMessage:function(){b.postMessage(c,d)}}});
if("undefined"!==typeof a&&!B("Trident")&&!B("MSIE")){var b=new a,c={},d=c;b.port1.onmessage=function(){if(p(c.next)){c=c.next;var a=c.Ha;c.Ha=null;a()}};
return function(a){d.next={Ha:a};d=d.next;b.port2.postMessage(0)}}return"undefined"!==typeof document&&"onreadystatechange"in document.createElement("SCRIPT")?function(a){var b=document.createElement("SCRIPT");
b.onreadystatechange=function(){b.onreadystatechange=null;b.parentNode.removeChild(b);b=null;a();a=null};
document.documentElement.appendChild(b)}:function(a){n.setTimeout(a,0)}}
;function ob(a,b,c){this.i=c;this.g=a;this.j=b;this.f=0;this.b=null}
ob.prototype.get=function(){var a;0<this.f?(this.f--,a=this.b,this.b=a.next,a.next=null):a=this.g();return a};
function pb(a,b){a.j(b);a.f<a.i&&(a.f++,b.next=a.b,a.b=b)}
;function qb(){this.f=this.b=null}
var sb=new ob(function(){return new rb},function(a){a.reset()},100);
qb.prototype.remove=function(){var a=null;this.b&&(a=this.b,this.b=this.b.next,this.b||(this.f=null),a.next=null);return a};
function rb(){this.next=this.scope=this.b=null}
rb.prototype.set=function(a,b){this.b=a;this.scope=b;this.next=null};
rb.prototype.reset=function(){this.next=this.scope=this.b=null};function tb(a,b){ub||vb();wb||(ub(),wb=!0);var c=xb,d=sb.get();d.set(a,b);c.f?c.f.next=d:c.b=d;c.f=d}
var ub;function vb(){var a=n.Promise;if(-1!=String(a).indexOf("[native code]")){var b=a.resolve(void 0);ub=function(){b.then(yb)}}else ub=function(){var a=yb;
!fa(n.setImmediate)||n.Window&&n.Window.prototype&&!B("Edge")&&n.Window.prototype.setImmediate==n.setImmediate?(mb||(mb=nb()),mb(a)):n.setImmediate(a)}}
var wb=!1,xb=new qb;function yb(){for(var a;a=xb.remove();){try{a.b.call(a.scope)}catch(b){lb(b)}pb(sb,a)}wb=!1}
;function D(){this.f=this.f;this.K=this.K}
D.prototype.f=!1;D.prototype.dispose=function(){this.f||(this.f=!0,this.A())};
function zb(a,b){a.f?p(void 0)?b.call(void 0):b():(a.K||(a.K=[]),a.K.push(p(void 0)?w(b,void 0):b))}
D.prototype.A=function(){if(this.K)for(;this.K.length;)this.K.shift()()};
function Ab(a){a&&"function"==typeof a.dispose&&a.dispose()}
function Bb(a){for(var b=0,c=arguments.length;b<c;++b){var d=arguments[b];ea(d)?Bb.apply(null,d):Ab(d)}}
;function E(a){D.call(this);this.j=1;this.g=[];this.i=0;this.b=[];this.H={};this.w=!!a}
y(E,D);k=E.prototype;k.subscribe=function(a,b,c){var d=this.H[a];d||(d=this.H[a]=[]);var e=this.j;this.b[e]=a;this.b[e+1]=b;this.b[e+2]=c;this.j=e+3;d.push(e);return e};
k.unsubscribe=function(a,b,c){if(a=this.H[a]){var d=this.b;if(a=za(a,function(a){return d[a+1]==b&&d[a+2]==c}))return this.T(a)}return!1};
k.T=function(a){var b=this.b[a];if(b){var c=this.H[b];0!=this.i?(this.g.push(a),this.b[a+1]=t):(c&&Ea(c,a),delete this.b[a],delete this.b[a+1],delete this.b[a+2])}return!!b};
k.N=function(a,b){var c=this.H[a];if(c){for(var d=Array(arguments.length-1),e=1,f=arguments.length;e<f;e++)d[e-1]=arguments[e];if(this.w)for(e=0;e<c.length;e++){var g=c[e];Cb(this.b[g+1],this.b[g+2],d)}else{this.i++;try{for(e=0,f=c.length;e<f;e++)g=c[e],this.b[g+1].apply(this.b[g+2],d)}finally{if(this.i--,0<this.g.length&&0==this.i)for(;c=this.g.pop();)this.T(c)}}return 0!=e}return!1};
function Cb(a,b,c){tb(function(){a.apply(b,c)})}
k.clear=function(a){if(a){var b=this.H[a];b&&(z(b,this.T,this),delete this.H[a])}else this.b.length=0,this.H={}};
k.ba=function(a){if(a){var b=this.H[a];return b?b.length:0}a=0;for(b in this.H)a+=this.ba(b);return a};
k.A=function(){E.B.A.call(this);this.clear();this.g.length=0};var Db=window.yt&&window.yt.config_||window.ytcfg&&window.ytcfg.data_||{};q("yt.config_",Db,void 0);q("yt.tokens_",window.yt&&window.yt.tokens_||{},void 0);var Eb=window.yt&&window.yt.msgs_||r("window.ytcfg.msgs")||{};q("yt.msgs_",Eb,void 0);function Fb(a){Gb(Db,arguments)}
function F(a,b){return a in Db?Db[a]:b}
function G(a,b){fa(a)&&(a=Hb(a));return window.setTimeout(a,b)}
function Ib(a){window.clearTimeout(a)}
function Hb(a){return a&&window.yterr?function(){try{return a.apply(this,arguments)}catch(b){Jb(b)}}:a}
function Jb(a,b){var c=r("yt.logging.errors.log");c?c(a,b,void 0,void 0,void 0):(c=F("ERRORS",[]),c.push([a,b,void 0,void 0,void 0]),Fb("ERRORS",c))}
function Gb(a,b){if(1<b.length){var c=b[0];a[c]=b[1]}else for(c in b=b[0],b)a[c]=b[c]}
var Kb=window.performance&&window.performance.timing&&window.performance.now?function(){return window.performance.timing.navigationStart+window.performance.now()}:function(){return(new Date).getTime()},Lb="Microsoft Internet Explorer"==navigator.appName;var Mb=r("yt.pubsub.instance_")||new E;E.prototype.subscribe=E.prototype.subscribe;E.prototype.unsubscribeByKey=E.prototype.T;E.prototype.publish=E.prototype.N;E.prototype.clear=E.prototype.clear;q("yt.pubsub.instance_",Mb,void 0);var Nb=r("yt.pubsub.subscribedKeys_")||{};q("yt.pubsub.subscribedKeys_",Nb,void 0);var Ob=r("yt.pubsub.topicToKeys_")||{};q("yt.pubsub.topicToKeys_",Ob,void 0);var Pb=r("yt.pubsub.isSynchronous_")||{};q("yt.pubsub.isSynchronous_",Pb,void 0);
var Qb=r("yt.pubsub.skipSubId_")||null;q("yt.pubsub.skipSubId_",Qb,void 0);function Rb(a,b,c){var d=Sb();if(d){var e=d.subscribe(a,function(){if(!Qb||Qb!=e){var d=arguments,g;g=function(){Nb[e]&&b.apply(c||window,d)};
try{Pb[a]?g():G(g,0)}catch(l){Jb(l)}}},c);
Nb[e]=!0;Ob[a]||(Ob[a]=[]);Ob[a].push(e);return e}return 0}
function Tb(a){var b=Sb();b&&("number"==typeof a?a=[a]:"string"==typeof a&&(a=[parseInt(a,10)]),z(a,function(a){b.unsubscribeByKey(a);delete Nb[a]}))}
function Ub(a,b){var c=Sb();return c?c.publish.apply(c,arguments):!1}
function Vb(a){Ob[a]&&(a=Ob[a],z(a,function(a){Nb[a]&&delete Nb[a]}),a.length=0)}
function Wb(a){var b=Sb();if(b)if(b.clear(a),a)Vb(a);else for(var c in Ob)Vb(c)}
function Sb(){return r("yt.pubsub.instance_")}
;function Xb(a,b){if(window.spf){var c="";if(a){var d=a.indexOf("jsbin/"),e=a.lastIndexOf(".js"),f=d+6;-1<d&&-1<e&&e>f&&(c=a.substring(f,e),c=c.replace(Yb,""),c=c.replace(Zb,""),c=c.replace("debug-",""),c=c.replace("tracing-",""))}spf.script.load(a,c,b)}else $b(a,b)}
function $b(a,b){var c=ac(a),d=document.getElementById(c),e=d&&C(d,"loaded"),f=d&&!e;e?b&&b():(b&&(e=Rb(c,b),b=""+ia(b),bc[b]=e),f||(d=cc(a,c,function(){C(d,"loaded")||(hb(d,"loaded","true"),Ub(c),G(na(Wb,c),0))})))}
function cc(a,b,c){var d=document.createElement("script");d.id=b;d.onload=function(){c&&setTimeout(c,0)};
d.onreadystatechange=function(){switch(d.readyState){case "loaded":case "complete":d.onload()}};
d.src=a;a=document.getElementsByTagName("head")[0]||document.body;a.insertBefore(d,a.firstChild);return d}
function dc(a,b){a&&b&&(a=""+ia(b),(a=bc[a])&&Tb(a))}
function ac(a){var b=document.createElement("a");fb(b,a);a=b.href.replace(/^[a-zA-Z]+:\/\//,"//");return"js-"+ua(a)}
var Yb=/\.vflset|-vfl[a-zA-Z0-9_+=-]+/,Zb=/-[a-zA-Z]{2,3}_[a-zA-Z]{2,3}(?=(\/|$))/,bc={};var ec=null;function fc(){var a=F("BG_I",null),b=F("BG_IU",null),c=F("BG_P",void 0);b?Xb(b,function(){ec=new botguard.bg(c)}):a&&(eval(a),ec=new botguard.bg(c))}
function gc(){return null!=ec}
function hc(){return ec?ec.invoke():null}
;function ic(a){if(!a)return"";a=a.split("#")[0].split("?")[0];a=a.toLowerCase();0==a.indexOf("//")&&(a=window.location.protocol+a);/^[\w\-]*:\/\//.test(a)||(a=window.location.href);var b=a.substring(a.indexOf("://")+3),c=b.indexOf("/");-1!=c&&(b=b.substring(0,c));a=a.substring(0,a.indexOf("://"));if("http"!==a&&"https"!==a&&"chrome-extension"!==a&&"file"!==a&&"android-app"!==a)throw Error("Invalid URI scheme in origin");var c="",d=b.indexOf(":");if(-1!=d){var e=b.substring(d+1),b=b.substring(0,d);
if("http"===a&&"80"!==e||"https"===a&&"443"!==e)c=":"+e}return a+"://"+b+c}
;function jc(){function a(){e[0]=1732584193;e[1]=4023233417;e[2]=2562383102;e[3]=271733878;e[4]=3285377520;v=m=0}
function b(a){for(var b=g,c=0;64>c;c+=4)b[c/4]=a[c]<<24|a[c+1]<<16|a[c+2]<<8|a[c+3];for(c=16;80>c;c++)a=b[c-3]^b[c-8]^b[c-14]^b[c-16],b[c]=(a<<1|a>>>31)&4294967295;a=e[0];for(var d=e[1],f=e[2],h=e[3],l=e[4],m,v,c=0;80>c;c++)40>c?20>c?(m=h^d&(f^h),v=1518500249):(m=d^f^h,v=1859775393):60>c?(m=d&f|h&(d|f),v=2400959708):(m=d^f^h,v=3395469782),m=((a<<5|a>>>27)&4294967295)+m+l+v+b[c]&4294967295,l=h,h=f,f=(d<<30|d>>>2)&4294967295,d=a,a=m;e[0]=e[0]+a&4294967295;e[1]=e[1]+d&4294967295;e[2]=e[2]+f&4294967295;
e[3]=e[3]+h&4294967295;e[4]=e[4]+l&4294967295}
function c(a,c){if("string"===typeof a){a=unescape(encodeURIComponent(a));for(var d=[],e=0,g=a.length;e<g;++e)d.push(a.charCodeAt(e));a=d}c||(c=a.length);d=0;if(0==m)for(;d+64<c;)b(a.slice(d,d+64)),d+=64,v+=64;for(;d<c;)if(f[m++]=a[d++],v++,64==m)for(m=0,b(f);d+64<c;)b(a.slice(d,d+64)),d+=64,v+=64}
function d(){var a=[],d=8*v;56>m?c(l,56-m):c(l,64-(m-56));for(var g=63;56<=g;g--)f[g]=d&255,d>>>=8;b(f);for(g=d=0;5>g;g++)for(var h=24;0<=h;h-=8)a[d++]=e[g]>>h&255;return a}
for(var e=[],f=[],g=[],l=[128],h=1;64>h;++h)l[h]=0;var m,v;a();return{reset:a,update:c,digest:d,mb:function(){for(var a=d(),b="",c=0;c<a.length;c++)b+="0123456789ABCDEF".charAt(Math.floor(a[c]/16))+"0123456789ABCDEF".charAt(a[c]%16);return b}}}
;/*
 gapi.loader.OBJECT_CREATE_TEST_OVERRIDE &&*/
var kc=window,lc=document,mc=kc.location;function oc(){}
var pc=/\[native code\]/;function H(a,b,c){return a[b]=a[b]||c}
function qc(a){for(var b=0;b<this.length;b++)if(this[b]===a)return b;return-1}
function rc(a){a=a.sort();for(var b=[],c=void 0,d=0;d<a.length;d++){var e=a[d];e!=c&&b.push(e);c=e}return b}
function I(){var a;if((a=Object.create)&&pc.test(a))a=a(null);else{a={};for(var b in a)a[b]=void 0}return a}
var sc=H(kc,"gapi",{});function tc(a){return/^\s*$/.test(a)?!1:/^[\],:{}\s\u2028\u2029]*$/.test(a.replace(/\\["\\\/bfnrtu]/g,"@").replace(/(?:"[^"\\\n\r\u2028\u2029\x00-\x08\x0a-\x1f]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)[\s\u2028\u2029]*(?=:|,|]|}|$)/g,"]").replace(/(?:^|:|,)(?:[\s\u2028\u2029]*\[)+/g,""))}
function uc(a){a=String(a);if(tc(a))try{return eval("("+a+")")}catch(b){}throw Error("Invalid JSON string: "+a);}
function vc(a){return eval("("+a+")")}
function wc(a){var b=[];xc(new yc,a,b);return b.join("")}
function yc(){}
function xc(a,b,c){if(null==b)c.push("null");else{if("object"==typeof b){if(da(b)){var d=b;b=d.length;c.push("[");for(var e="",f=0;f<b;f++)c.push(e),e=d[f],xc(a,e,c),e=",";c.push("]");return}if(b instanceof String||b instanceof Number||b instanceof Boolean)b=b.valueOf();else{c.push("{");f="";for(d in b)Object.prototype.hasOwnProperty.call(b,d)&&(e=b[d],"function"!=typeof e&&(c.push(f),zc(d,c),c.push(":"),xc(a,e,c),f=","));c.push("}");return}}switch(typeof b){case "string":zc(b,c);break;case "number":c.push(isFinite(b)&&
!isNaN(b)?String(b):"null");break;case "boolean":c.push(String(b));break;case "function":c.push("null");break;default:throw Error("Unknown type: "+typeof b);}}}
var Ac={'"':'\\"',"\\":"\\\\","/":"\\/","\b":"\\b","\f":"\\f","\n":"\\n","\r":"\\r","\t":"\\t","\x0B":"\\u000b"},Bc=/\uffff/.test("\uffff")?/[\\\"\x00-\x1f\x7f-\uffff]/g:/[\\\"\x00-\x1f\x7f-\xff]/g;function zc(a,b){b.push('"',a.replace(Bc,function(a){var b=Ac[a];b||(b="\\u"+(a.charCodeAt(0)|65536).toString(16).substr(1),Ac[a]=b);return b}),'"')}
;function Cc(a,b){this.width=a;this.height=b}
k=Cc.prototype;k.aspectRatio=function(){return this.width/this.height};
k.isEmpty=function(){return!(this.width*this.height)};
k.ceil=function(){this.width=Math.ceil(this.width);this.height=Math.ceil(this.height);return this};
k.floor=function(){this.width=Math.floor(this.width);this.height=Math.floor(this.height);return this};
k.round=function(){this.width=Math.round(this.width);this.height=Math.round(this.height);return this};function Dc(a){this.b=a||{cookie:""}}
var Ec=/\s*;\s*/;k=Dc.prototype;k.isEnabled=function(){return navigator.cookieEnabled};
k.set=function(a,b,c,d,e,f){if(/[;=\s]/.test(a))throw Error('Invalid cookie name "'+a+'"');if(/[;\r\n]/.test(b))throw Error('Invalid cookie value "'+b+'"');p(c)||(c=-1);e=e?";domain="+e:"";d=d?";path="+d:"";f=f?";secure":"";c=0>c?"":0==c?";expires="+(new Date(1970,1,1)).toUTCString():";expires="+(new Date(x()+1E3*c)).toUTCString();this.b.cookie=a+"="+b+e+d+c+f};
k.get=function(a,b){for(var c=a+"=",d=(this.b.cookie||"").split(Ec),e=0,f;f=d[e];e++){if(0==f.lastIndexOf(c,0))return f.substr(c.length);if(f==a)return""}return b};
k.remove=function(a,b,c){var d=p(this.get(a));this.set(a,"",0,b,c);return d};
k.isEmpty=function(){return!this.b.cookie};
k.ba=function(){return this.b.cookie?(this.b.cookie||"").split(Ec).length:0};
k.clear=function(){for(var a=(this.b.cookie||"").split(Ec),b=[],c=[],d,e,f=0;e=a[f];f++)d=e.indexOf("="),-1==d?(b.push(""),c.push(e)):(b.push(e.substring(0,d)),c.push(e.substring(d+1)));for(a=b.length-1;0<=a;a--)this.remove(b[a])};
var Fc=new Dc("undefined"==typeof document?null:document);Fc.f=3950;function Gc(a){a.prototype.then=a.prototype.then;a.prototype.$goog_Thenable=!0}
;function Hc(a,b){var c=Ic;return Object.prototype.hasOwnProperty.call(c,a)?c[a]:c[a]=b(a)}
;function Jc(){}
Jc.prototype.set=aa;Jc.prototype.get=aa;Jc.prototype.remove=aa;function Kc(a){this.type="";this.state=this.source=this.data=this.currentTarget=this.relatedTarget=this.target=null;this.charCode=this.keyCode=0;this.shiftKey=this.ctrlKey=this.altKey=!1;this.clientY=this.clientX=0;this.changedTouches=null;if(a=a||window.event){this.event=a;for(var b in a)b in Lc||(this[b]=a[b]);(b=a.target||a.srcElement)&&3==b.nodeType&&(b=b.parentNode);this.target=b;if(b=a.relatedTarget)try{b=b.nodeName?b:null}catch(c){b=null}else"mouseover"==this.type?b=a.fromElement:"mouseout"==
this.type&&(b=a.toElement);this.relatedTarget=b;this.clientX=void 0!=a.clientX?a.clientX:a.pageX;this.clientY=void 0!=a.clientY?a.clientY:a.pageY;this.keyCode=a.keyCode?a.keyCode:a.which;this.charCode=a.charCode||("keypress"==this.type?this.keyCode:0);this.altKey=a.altKey;this.ctrlKey=a.ctrlKey;this.shiftKey=a.shiftKey}}
Kc.prototype.preventDefault=function(){this.event&&(this.event.returnValue=!1,this.event.preventDefault&&this.event.preventDefault())};
Kc.prototype.stopPropagation=function(){this.event&&(this.event.cancelBubble=!0,this.event.stopPropagation&&this.event.stopPropagation())};
Kc.prototype.stopImmediatePropagation=function(){this.event&&(this.event.cancelBubble=!0,this.event.stopImmediatePropagation&&this.event.stopImmediatePropagation())};
var Lc={stopImmediatePropagation:1,stopPropagation:1,preventMouseEvent:1,preventManipulation:1,preventDefault:1,layerX:1,layerY:1,scale:1,rotation:1,webkitMovementX:1,webkitMovementY:1};function Mc(a,b,c){this.b=a;this.g=b;this.f=c}
var Nc=1;function Oc(a){var b={};void 0!==a.b?b.trackingParams=a.b:(b.veType=a.g,null!=a.f&&(b.veCounter=a.f));return b}
;var Pc=null;"undefined"!=typeof XMLHttpRequest?Pc=function(){return new XMLHttpRequest}:"undefined"!=typeof ActiveXObject&&(Pc=function(){return new ActiveXObject("Microsoft.XMLHTTP")});
function Qc(a){switch(a&&"status"in a?a.status:-1){case 200:case 201:case 202:case 203:case 204:case 205:case 206:case 304:return!0;default:return!1}}
;function Rc(a){this.b=a}
Rc.prototype.set=function(a,b){p(b)?this.b.set(a,wc(b)):this.b.remove(a)};
Rc.prototype.get=function(a){var b;try{b=this.b.get(a)}catch(c){return}if(null!==b)try{return uc(b)}catch(c){throw"Storage: Invalid value was encountered";}};
Rc.prototype.remove=function(a){this.b.remove(a)};function J(a){return F("EXPERIMENT_FLAGS",{})[a]}
;function Sc(){return{apiaryHost:F("APIARY_HOST",void 0),Fa:F("APIARY_HOST_FIRSTPARTY",void 0),gapiHintOverride:F("GAPI_HINT_OVERRIDE"),gapiHintParams:F("GAPI_HINT_PARAMS",void 0),innertubeApiKey:F("INNERTUBE_API_KEY",void 0),innertubeApiVersion:F("INNERTUBE_API_VERSION",void 0),vb:F("INNERTUBE_CONTEXT_CLIENT_NAME","WEB"),innertubeContextClientVersion:F("INNERTUBE_CONTEXT_CLIENT_VERSION",void 0),xb:F("INNERTUBE_CONTEXT_HL",void 0),wb:F("INNERTUBE_CONTEXT_GL",void 0),Xb:F("XHR_APIARY_HOST",void 0)}}
function Tc(a){a={client:{hl:a.xb,gl:a.wb,clientName:a.vb,clientVersion:a.innertubeContextClientVersion}};F("DELEGATED_SESSION_ID")&&(a.user={onBehalfOfUser:F("DELEGATED_SESSION_ID")});return a}
;var K;K=H(kc,"___jsl",I());H(K,"I",0);H(K,"hel",10);function Uc(){var a=mc.href,b;if(K.dpo)b=K.h;else{b=K.h;var c=/([#].*&|[#])jsh=([^&#]*)/g,d=/([?#].*&|[?#])jsh=([^&#]*)/g;if(a=a&&(c.exec(a)||d.exec(a)))try{b=decodeURIComponent(a[2])}catch(e){}}return b}
function Vc(a){var b=H(K,"PQ",[]);K.PQ=[];var c=b.length;if(0===c)a();else for(var d=0,e=function(){++d===c&&a()},f=0;f<c;f++)b[f](e)}
function Wc(a){return H(H(K,"H",I()),a,I())}
;function Xc(){return B("iPhone")&&!B("iPod")&&!B("iPad")}
;function Yc(a){this.b=a}
y(Yc,Rc);function Zc(a){this.data=a}
function $c(a){return!p(a)||a instanceof Zc?a:new Zc(a)}
Yc.prototype.set=function(a,b){Yc.B.set.call(this,a,$c(b))};
Yc.prototype.f=function(a){a=Yc.B.get.call(this,a);if(!p(a)||a instanceof Object)return a;throw"Storage: Invalid value was encountered";};
Yc.prototype.get=function(a){if(a=this.f(a)){if(a=a.data,!p(a))throw"Storage: Invalid value was encountered";}else a=void 0;return a};var ad=/^(?:([^:/?#.]+):)?(?:\/\/(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?=[/#?]|$))?([^?#]+)?(?:\?([^#]*))?(?:#([\s\S]*))?$/;function L(a){return a.match(ad)}
function bd(a){return a?decodeURI(a):a}
function cd(a){if(a[1]){var b=a[0],c=b.indexOf("#");0<=c&&(a.push(b.substr(c)),a[0]=b=b.substr(0,c));c=b.indexOf("?");0>c?a[1]="?":c==b.length-1&&(a[1]=void 0)}return a.join("")}
function dd(a,b,c){if(da(b))for(var d=0;d<b.length;d++)dd(a,String(b[d]),c);else null!=b&&c.push("&",a,""===b?"":"=",encodeURIComponent(String(b)))}
function ed(a,b,c){for(c=c||0;c<b.length;c+=2)dd(b[c],b[c+1],a);return a}
function fd(a,b){for(var c in b)dd(c,b[c],a);return a}
function gd(a){a=fd([],a);a[0]="";return a.join("")}
function hd(a,b){return cd(2==arguments.length?ed([a],arguments[1],0):ed([a],arguments,1))}
;function id(a,b,c){var d=[],e=[];if(1==(da(c)?2:1))return e=[b,a],z(d,function(a){e.push(a)}),jd(e.join(" "));
var f=[],g=[];z(c,function(a){g.push(a.key);f.push(a.value)});
c=Math.floor((new Date).getTime()/1E3);e=0==f.length?[c,b,a]:[f.join(":"),c,b,a];z(d,function(a){e.push(a)});
a=jd(e.join(" "));a=[c,a];0==g.length||a.push(g.join(""));return a.join("_")}
function jd(a){var b=jc();b.update(a);return b.mb().toLowerCase()}
;var kd=H(K,"perf",I());H(kd,"g",I());var ld=H(kd,"i",I());H(kd,"r",[]);I();I();function md(a,b,c){b&&0<b.length&&(b=nd(b),c&&0<c.length&&(b+="___"+nd(c)),28<b.length&&(b=b.substr(0,28)+(b.length-28)),c=b,b=H(ld,"_p",I()),H(b,c,I())[a]=(new Date).getTime(),b=kd.r,"function"===typeof b?b(a,"_p",c):b.push([a,"_p",c]))}
function nd(a){return a.join("__").replace(/\./g,"_").replace(/\-/g,"_").replace(/\,/g,"_")}
;function od(a){if(a.classList)return a.classList;a=a.className;return u(a)&&a.match(/\S+/g)||[]}
function pd(a,b){return a.classList?a.classList.contains(b):Da(od(a),b)}
function qd(a,b){a.classList?a.classList.add(b):pd(a,b)||(a.className+=0<a.className.length?" "+b:b)}
function td(a,b){a.classList?a.classList.remove(b):pd(a,b)&&(a.className=wa(od(a),function(a){return a!=b}).join(" "))}
function ud(a,b,c){c?qd(a,b):td(a,b)}
;function vd(a){this.b=a}
y(vd,Yc);vd.prototype.set=function(a,b,c){if(b=$c(b)){if(c){if(c<x()){vd.prototype.remove.call(this,a);return}b.expiration=c}b.creation=x()}vd.B.set.call(this,a,b)};
vd.prototype.f=function(a,b){var c=vd.B.f.call(this,a);if(c){if(b=!b){b=c.creation;var d=c.expiration;b=!!d&&d<x()||!!b&&b>x()}if(b)vd.prototype.remove.call(this,a);else return c}};function wd(a){"?"==a.charAt(0)&&(a=a.substr(1));a=a.split("&");for(var b={},c=0,d=a.length;c<d;c++){var e=a[c].split("=");if(1==e.length&&e[0]||2==e.length){var f=decodeURIComponent((e[0]||"").replace(/\+/g," ")),e=decodeURIComponent((e[1]||"").replace(/\+/g," "));f in b?da(b[f])?Ha(b[f],e):b[f]=[b[f],e]:b[f]=e}}return b}
function xd(a,b){var c=a.split("#",2);a=c[0];var c=1<c.length?"#"+c[1]:"",d=a.split("?",2);a=d[0];var d=wd(d[1]||""),e;for(e in b)d[e]=b[e];return cd(fd([a],d))+c}
;var yd=I(),zd=[];function Ad(a){throw Error("Bad hint"+(a?": "+a:""));}
zd.push(["jsl",function(a){for(var b in a)if(Object.prototype.hasOwnProperty.call(a,b)){var c=a[b];"object"==typeof c?K[b]=H(K,b,[]).concat(c):H(K,b,c)}if(b=a.u)a=H(K,"us",[]),a.push(b),(b=/^https:(.*)$/.exec(b))&&a.push("http:"+b[1])}]);
var Bd=/^(\/[a-zA-Z0-9_\-]+)+$/,Cd=/^[a-zA-Z0-9\-_\.,!]+$/,Dd=/^gapi\.loaded_[0-9]+$/,Ed=/^[a-zA-Z0-9,._-]+$/;function Fd(a,b,c,d){var e=a.split(";"),f=e.shift(),g=yd[f],l=null;g?l=g(e,b,c,d):Ad("no hint processor for: "+f);l||Ad("failed to generate load url");b=l;c=b.match(Gd);(d=b.match(Hd))&&1===d.length&&Id.test(b)&&c&&1===c.length||Ad("failed sanity: "+a);return l}
function Jd(a,b,c,d){function e(a){return encodeURIComponent(a).replace(/%2C/g,",")}
a=Kd(a);Dd.test(c)||Ad("invalid_callback");b=Ld(b);d=d&&d.length?Ld(d):null;return[encodeURIComponent(a.Lb).replace(/%2C/g,",").replace(/%2F/g,"/"),"/k=",e(a.version),"/m=",e(b),d?"/exm="+e(d):"","/rt=j/sv=1/d=1/ed=1",a.Ea?"/am="+e(a.Ea):"",a.Ra?"/rs="+e(a.Ra):"",a.Za?"/t="+e(a.Za):"","/cb=",e(c)].join("")}
function Kd(a){"/"!==a.charAt(0)&&Ad("relative path");for(var b=a.substring(1).split("/"),c=[];b.length;){a=b.shift();if(!a.length||0==a.indexOf("."))Ad("empty/relative directory");else if(0<a.indexOf("=")){b.unshift(a);break}c.push(a)}a={};for(var d=0,e=b.length;d<e;++d){var f=b[d].split("="),g=decodeURIComponent(f[0]),l=decodeURIComponent(f[1]);2==f.length&&g&&l&&(a[g]=a[g]||l)}b="/"+c.join("/");Bd.test(b)||Ad("invalid_prefix");c=Md(a,"k",!0);d=Md(a,"am");e=Md(a,"rs");a=Md(a,"t");return{Lb:b,version:c,
Ea:d,Ra:e,Za:a}}
function Ld(a){for(var b=[],c=0,d=a.length;c<d;++c){var e=a[c].replace(/\./g,"_").replace(/-/g,"_");Ed.test(e)&&b.push(e)}return b.join(",")}
function Md(a,b,c){a=a[b];!a&&c&&Ad("missing: "+b);if(a){if(Cd.test(a))return a;Ad("invalid: "+b)}return null}
var Id=/^https?:\/\/[a-z0-9_.-]+\.google\.com(:\d+)?\/[a-zA-Z0-9_.,!=\-\/]+$/,Hd=/\/cb=/g,Gd=/\/\//g;function Nd(){var a=Uc();if(!a)throw Error("Bad hint");return a}
yd.m=function(a,b,c,d){(a=a[0])||Ad("missing_hint");return"https://apis.google.com"+Jd(a,b,c,d)};
var Od=decodeURI("%73cript"),Pd=/^[-+_0-9\/A-Za-z]+={0,2}$/;function Qd(a,b){for(var c=[],d=0;d<a.length;++d){var e=a[d];e&&0>qc.call(b,e)&&c.push(e)}return c}
function Rd(){var a=K.nonce;if(void 0!==a)return a&&a===String(a)&&a.match(Pd)?a:K.nonce=null;var b=H(K,"us",[]);if(!b||!b.length)return K.nonce=null;for(var c=lc.getElementsByTagName(Od),d=0,e=c.length;d<e;++d){var f=c[d];if(f.src&&(a=String(f.getAttribute("nonce")||"")||null)){for(var g=0,l=b.length;g<l&&b[g]!==f.src;++g);if(g!==l&&a&&a===String(a)&&a.match(Pd))return K.nonce=a}}return null}
function Sd(a){if("loading"!=lc.readyState)Td(a);else{var b=Rd(),c="";null!==b&&(c=' nonce="'+b+'"');lc.write("<"+Od+' src="'+encodeURI(a)+'"'+c+"></"+Od+">")}}
function Td(a){var b=lc.createElement(Od);b.setAttribute("src",a);a=Rd();null!==a&&b.setAttribute("nonce",a);b.async="true";(a=lc.getElementsByTagName(Od)[0])?a.parentNode.insertBefore(b,a):(lc.head||lc.body||lc.documentElement).appendChild(b)}
function Ud(a,b){var c=b&&b._c;if(c)for(var d=0;d<zd.length;d++){var e=zd[d][0],f=zd[d][1];f&&Object.prototype.hasOwnProperty.call(c,e)&&f(c[e],a,b)}}
function Vd(a,b,c){Wd(function(){var c;c=b===Uc()?H(sc,"_",I()):I();c=H(Wc(b),"_",c);a(c)},c)}
function Xd(a,b){var c=b||{};"function"==typeof b&&(c={},c.callback=b);Ud(a,c);b=a?a.split(":"):[];var d=c.h||Nd(),e=H(K,"ah",I());if(e["::"]&&b.length){a=[];for(var f=null;f=b.shift();){var g=f.split("."),g=e[f]||e[g[1]&&"ns:"+g[0]||""]||d,l=a.length&&a[a.length-1]||null,h=l;l&&l.hint==g||(h={hint:g,features:[]},a.push(h));h.features.push(f)}var m=a.length;if(1<m){var v=c.callback;v&&(c.callback=function(){0==--m&&v()})}for(;b=a.shift();)Yd(b.features,c,b.hint)}else Yd(b||[],c,d)}
function Yd(a,b,c){function d(a,b){if(Aa)return 0;kc.clearTimeout(v);rd.push.apply(rd,ha);var d=((sc||{}).config||{}).update;d?d(f):f&&H(K,"cu",[]).push(f);if(b){md("me0",a,nc);try{Vd(b,c,m)}finally{md("me1",a,nc)}}return 1}
a=rc(a)||[];var e=b.callback,f=b.config,g=b.timeout,l=b.ontimeout,h=b.onerror,m=void 0;"function"==typeof h&&(m=h);var v=null,Aa=!1;if(g&&!l||!g&&l)throw"Timeout requires both the timeout parameter and ontimeout parameter to be set";var h=H(Wc(c),"r",[]).sort(),rd=H(Wc(c),"L",[]).sort(),nc=[].concat(h);0<g&&(v=kc.setTimeout(function(){Aa=!0;l()},g));
var ha=Qd(a,rd);if(ha.length){var ha=Qd(a,h),Ba=H(K,"CP",[]),Ca=Ba.length;Ba[Ca]=function(a){function b(){var a=Ba[Ca+1];a&&a()}
function c(b){Ba[Ca]=null;d(ha,a)&&Vc(function(){e&&e();b()})}
if(!a)return 0;md("ml1",ha,nc);0<Ca&&Ba[Ca-1]?Ba[Ca]=function(){c(b)}:c(b)};
if(ha.length){var sd="loaded_"+K.I++;sc[sd]=function(a){Ba[Ca](a);sc[sd]=null};
a=Fd(c,ha,"gapi."+sd,h);h.push.apply(h,ha);md("ml0",ha,nc);b.sync||kc.___gapisync?Sd(a):Td(a)}else Ba[Ca](oc)}else d(ha)&&e&&e()}
function Wd(a,b){if(K.hee&&0<K.hel)try{return a()}catch(c){b&&b(c),K.hel--,Xd("debug_error",function(){try{window.___jsl.hefn(c)}catch(d){throw c;}})}else try{return a()}catch(c){throw b&&b(c),c;
}}
sc.load=function(a,b){return Wd(function(){return Xd(a,b)})};var Zd="StopIteration"in n?n.StopIteration:{message:"StopIteration",stack:""};function $d(){}
$d.prototype.next=function(){throw Zd;};
$d.prototype.U=function(){return this};
function ae(a){if(a instanceof $d)return a;if("function"==typeof a.U)return a.U(!1);if(ea(a)){var b=0,c=new $d;c.next=function(){for(;;){if(b>=a.length)throw Zd;if(b in a)return a[b++];b++}};
return c}throw Error("Not implemented");}
function be(a,b){if(ea(a))try{z(a,b,void 0)}catch(c){if(c!==Zd)throw c;}else{a=ae(a);try{for(;;)b.call(void 0,a.next(),void 0,a)}catch(c){if(c!==Zd)throw c;}}}
function ce(a){if(ea(a))return Ga(a);a=ae(a);var b=[];be(a,function(a){b.push(a)});
return b}
;function M(a,b){this.l=p(a)?a:0;this.o=p(b)?b:0}
M.prototype.equals=function(a){return a instanceof M&&(this==a?!0:this&&a?this.l==a.l&&this.o==a.o:!1)};
M.prototype.ceil=function(){this.l=Math.ceil(this.l);this.o=Math.ceil(this.o);return this};
M.prototype.floor=function(){this.l=Math.floor(this.l);this.o=Math.floor(this.o);return this};
M.prototype.round=function(){this.l=Math.round(this.l);this.o=Math.round(this.o);return this};var de=B("Opera"),N=B("Trident")||B("MSIE"),ee=B("Edge"),fe=B("Gecko")&&!(-1!=A.toLowerCase().indexOf("webkit")&&!B("Edge"))&&!(B("Trident")||B("MSIE"))&&!B("Edge"),ge=-1!=A.toLowerCase().indexOf("webkit")&&!B("Edge"),he=B("Windows");function ie(){var a=n.document;return a?a.documentMode:void 0}
var je;a:{var ke="",le=function(){var a=A;if(fe)return/rv\:([^\);]+)(\)|;)/.exec(a);if(ee)return/Edge\/([\d\.]+)/.exec(a);if(N)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(ge)return/WebKit\/(\S+)/.exec(a);if(de)return/(?:Version)[ \/]?(\S+)/.exec(a)}();
le&&(ke=le?le[1]:"");if(N){var me=ie();if(null!=me&&me>parseFloat(ke)){je=String(me);break a}}je=ke}var ne=je,Ic={};
function O(a){return Hc(a,function(){for(var b=0,c=sa(String(ne)).split("."),d=sa(String(a)).split("."),e=Math.max(c.length,d.length),f=0;0==b&&f<e;f++){var g=c[f]||"",l=d[f]||"";do{g=/(\d*)(\D*)(.*)/.exec(g)||["","","",""];l=/(\d*)(\D*)(.*)/.exec(l)||["","","",""];if(0==g[0].length&&0==l[0].length)break;b=ta(0==g[1].length?0:parseInt(g[1],10),0==l[1].length?0:parseInt(l[1],10))||ta(0==g[2].length,0==l[2].length)||ta(g[2],l[2]);g=g[3];l=l[3]}while(0==b)}return 0<=b})}
var oe;var pe=n.document;oe=pe&&N?ie()||("CSS1Compat"==pe.compatMode?parseInt(ne,10):5):void 0;!fe&&!N||N&&9<=Number(oe)||fe&&O("1.9.1");var qe=N&&!O("9");function re(a){se();var b=new bb;b.b=a;return b}
var se=t;function te(a){this.b=a}
y(te,vd);function ue(){}
y(ue,Jc);ue.prototype.ba=function(){var a=0;be(this.U(!0),function(){a++});
return a};
ue.prototype.U=aa;ue.prototype.clear=function(){var a=ce(this.U(!0)),b=this;z(a,function(a){b.remove(a)})};var ve=B("Firefox"),we=Xc()||B("iPod"),xe=B("iPad"),ye=B("Android")&&!(Va()||B("Firefox")||B("Opera")||B("Silk")),ze=Va(),Ae=B("Safari")&&!(Va()||B("Coast")||B("Opera")||B("Edge")||B("Silk")||B("Android"))&&!(Xc()||B("iPad")||B("iPod"));function Be(a){return a?new Ce(De(a)):qa||(qa=new Ce)}
function Ee(a){var b=document;return u(a)?b.getElementById(a):a}
function Fe(a){var b=document;return b.querySelectorAll&&b.querySelector?b.querySelectorAll("."+a):Ge(a)}
function Ge(a){var b,c,d,e;b=document;if(b.querySelectorAll&&b.querySelector&&a)return b.querySelectorAll(""+(a?"."+a:""));if(a&&b.getElementsByClassName){var f=b.getElementsByClassName(a);return f}f=b.getElementsByTagName("*");if(a){e={};for(c=d=0;b=f[c];c++){var g=b.className;"function"==typeof g.split&&Da(g.split(/\s+/),a)&&(e[d++]=b)}e.length=d;return e}return f}
function He(a){a=a.document;a=Ie(a)?a.documentElement:a.body;return new Cc(a.clientWidth,a.clientHeight)}
function Je(a){var b=a.scrollingElement?a.scrollingElement:!ge&&Ie(a)?a.documentElement:a.body||a.documentElement;a=a.parentWindow||a.defaultView;return N&&O("10")&&a.pageYOffset!=b.scrollTop?new M(b.scrollLeft,b.scrollTop):new M(a.pageXOffset||b.scrollLeft,a.pageYOffset||b.scrollTop)}
function Ie(a){return"CSS1Compat"==a.compatMode}
function Ke(a){for(var b;b=a.firstChild;)a.removeChild(b)}
function Le(a){if(!a)return null;if(a.firstChild)return a.firstChild;for(;a&&!a.nextSibling;)a=a.parentNode;return a?a.nextSibling:null}
function Me(a){if(!a)return null;if(!a.previousSibling)return a.parentNode;for(a=a.previousSibling;a&&a.lastChild;)a=a.lastChild;return a}
function De(a){return 9==a.nodeType?a:a.ownerDocument||a.document}
function Ne(a,b){if("textContent"in a)a.textContent=b;else if(3==a.nodeType)a.data=b;else if(a.firstChild&&3==a.firstChild.nodeType){for(;a.lastChild!=a.firstChild;)a.removeChild(a.lastChild);a.firstChild.data=b}else Ke(a),a.appendChild(De(a).createTextNode(String(b)))}
var Oe={SCRIPT:1,STYLE:1,HEAD:1,IFRAME:1,OBJECT:1},Pe={IMG:" ",BR:"\n"};function Qe(a){if(qe&&null!==a&&"innerText"in a)a=a.innerText.replace(/(\r\n|\r|\n)/g,"\n");else{var b=[];Re(a,b,!0);a=b.join("")}a=a.replace(/ \xAD /g," ").replace(/\xAD/g,"");a=a.replace(/\u200B/g,"");qe||(a=a.replace(/ +/g," "));" "!=a&&(a=a.replace(/^\s*/,""));return a}
function Re(a,b,c){if(!(a.nodeName in Oe))if(3==a.nodeType)c?b.push(String(a.nodeValue).replace(/(\r\n|\r|\n)/g,"")):b.push(a.nodeValue);else if(a.nodeName in Pe)b.push(Pe[a.nodeName]);else for(a=a.firstChild;a;)Re(a,b,c),a=a.nextSibling}
function Se(a){var b=Te.bb;return b?Ue(a,function(a){return!b||u(a.className)&&Da(a.className.split(/\s+/),b)},!0,void 0):null}
function Ue(a,b,c,d){a&&!c&&(a=a.parentNode);for(c=0;a&&(null==d||c<=d);){if(b(a))return a;a=a.parentNode;c++}return null}
function Ce(a){this.b=a||n.document||document}
Ce.prototype.getElementsByTagName=function(a,b){return(b||this.b).getElementsByTagName(String(a))};
Ce.prototype.createElement=function(a){return this.b.createElement(String(a))};
Ce.prototype.isElement=function(a){return ga(a)&&1==a.nodeType};
Ce.prototype.contains=function(a,b){if(!a||!b)return!1;if(a.contains&&1==b.nodeType)return a==b||a.contains(b);if("undefined"!=typeof a.compareDocumentPosition)return a==b||!!(a.compareDocumentPosition(b)&16);for(;b&&a!=b;)b=b.parentNode;return b==a};function P(a,b){this.b=0;this.D=void 0;this.i=this.f=this.g=null;this.j=this.w=!1;if(a!=t)try{var c=this;a.call(b,function(a){Ve(c,2,a)},function(a){Ve(c,3,a)})}catch(d){Ve(this,3,d)}}
function We(){this.next=this.context=this.f=this.g=this.b=null;this.i=!1}
We.prototype.reset=function(){this.context=this.f=this.g=this.b=null;this.i=!1};
var Xe=new ob(function(){return new We},function(a){a.reset()},100);
function Ye(a,b,c){var d=Xe.get();d.g=a;d.f=b;d.context=c;return d}
function Ze(a){if(a instanceof P)return a;var b=new P(t);Ve(b,2,a);return b}
function $e(a){return new P(function(b,c){c(a)})}
P.prototype.then=function(a,b,c){return af(this,fa(a)?a:null,fa(b)?b:null,c)};
Gc(P);P.prototype.cancel=function(a){0==this.b&&tb(function(){var b=new bf(a);cf(this,b)},this)};
function cf(a,b){if(0==a.b)if(a.g){var c=a.g;if(c.f){for(var d=0,e=null,f=null,g=c.f;g&&(g.i||(d++,g.b==a&&(e=g),!(e&&1<d)));g=g.next)e||(f=g);e&&(0==c.b&&1==d?cf(c,b):(f?(d=f,d.next==c.i&&(c.i=d),d.next=d.next.next):df(c),ef(c,e,3,b)))}a.g=null}else Ve(a,3,b)}
function ff(a,b){a.f||2!=a.b&&3!=a.b||gf(a);a.i?a.i.next=b:a.f=b;a.i=b}
function af(a,b,c,d){var e=Ye(null,null,null);e.b=new P(function(a,g){e.g=b?function(c){try{var e=b.call(d,c);a(e)}catch(m){g(m)}}:a;
e.f=c?function(b){try{var e=c.call(d,b);!p(e)&&b instanceof bf?g(b):a(e)}catch(m){g(m)}}:g});
e.b.g=a;ff(a,e);return e.b}
P.prototype.G=function(a){this.b=0;Ve(this,2,a)};
P.prototype.K=function(a){this.b=0;Ve(this,3,a)};
function Ve(a,b,c){if(0==a.b){a===c&&(b=3,c=new TypeError("Promise cannot resolve to itself"));a.b=1;var d;a:{var e=c,f=a.G,g=a.K;if(e instanceof P)ff(e,Ye(f||t,g||null,a)),d=!0;else{var l;if(e)try{l=!!e.$goog_Thenable}catch(m){l=!1}else l=!1;if(l)e.then(f,g,a),d=!0;else{if(ga(e))try{var h=e.then;if(fa(h)){hf(e,h,f,g,a);d=!0;break a}}catch(m){g.call(a,m);d=!0;break a}d=!1}}}d||(a.D=c,a.b=b,a.g=null,gf(a),3!=b||c instanceof bf||jf(a,c))}}
function hf(a,b,c,d,e){function f(a){l||(l=!0,d.call(e,a))}
function g(a){l||(l=!0,c.call(e,a))}
var l=!1;try{b.call(a,g,f)}catch(h){f(h)}}
function gf(a){a.w||(a.w=!0,tb(a.J,a))}
function df(a){var b=null;a.f&&(b=a.f,a.f=b.next,b.next=null);a.f||(a.i=null);return b}
P.prototype.J=function(){for(var a;a=df(this);)ef(this,a,this.b,this.D);this.w=!1};
function ef(a,b,c,d){if(3==c&&b.f&&!b.i)for(;a&&a.j;a=a.g)a.j=!1;if(b.b)b.b.g=null,kf(b,c,d);else try{b.i?b.g.call(b.context):kf(b,c,d)}catch(e){lf.call(null,e)}pb(Xe,b)}
function kf(a,b,c){2==b?a.g.call(a.context,c):a.f&&a.f.call(a.context,c)}
function jf(a,b){a.j=!0;tb(function(){a.j&&lf.call(null,b)})}
var lf=lb;function bf(a){pa.call(this,a)}
y(bf,pa);bf.prototype.name="cancel";function mf(a){this.b=a}
y(mf,ue);k=mf.prototype;k.isAvailable=function(){if(!this.b)return!1;try{return this.b.setItem("__sak","1"),this.b.removeItem("__sak"),!0}catch(a){return!1}};
k.set=function(a,b){try{this.b.setItem(a,b)}catch(c){if(0==this.b.length)throw"Storage mechanism: Storage disabled";throw"Storage mechanism: Quota exceeded";}};
k.get=function(a){a=this.b.getItem(a);if(!u(a)&&null!==a)throw"Storage mechanism: Invalid value was encountered";return a};
k.remove=function(a){this.b.removeItem(a)};
k.ba=function(){return this.b.length};
k.U=function(a){var b=0,c=this.b,d=new $d;d.next=function(){if(b>=c.length)throw Zd;var d=c.key(b++);if(a)return d;d=c.getItem(d);if(!u(d))throw"Storage mechanism: Invalid value was encountered";return d};
return d};
k.clear=function(){this.b.clear()};
k.key=function(a){return this.b.key(a)};function nf(){var a=null;try{a=window.localStorage||null}catch(b){}this.b=a}
y(nf,mf);function of(){var a=null;try{a=window.sessionStorage||null}catch(b){}this.b=a}
y(of,mf);var pf=r("yt.dom.getNextId_");if(!pf){pf=function(){return++qf};
q("yt.dom.getNextId_",pf,void 0);var qf=0}function rf(){var a=document,b;ya(["fullscreenElement","webkitFullscreenElement","mozFullScreenElement","msFullscreenElement"],function(c){b=a[c];return!!b});
return b}
;function sf(a){this.b=a||Sc();tf||(tf=uf(this.b))}
var tf=null;function uf(a){return(new P(function(b){try{var c={gapiHintOverride:a.gapiHintOverride,_c:{jsl:{h:a.gapiHintParams}},callback:b},d=fa(c)?{callback:c}:c||{};d._c&&d._c.jsl&&d._c.jsl.h||Sa(d,{_c:{jsl:{h:F("GAPI_HINT_PARAMS",void 0)}}});if(d.gapiHintOverride||F("GAPI_HINT_OVERRIDE")){var e;var f=document.location.href;if(-1!=f.indexOf("?")){var f=(f||"").split("#")[0],g=f.split("?",2);e=wd(1<g.length?g[1]:g[0])}else e={};var l=e.gapi_jsh;l&&Sa(d,{_c:{jsl:{h:l}}})}Xd("client",d)}catch(h){Jb(h)}})).then(function(){})}
sf.prototype.i=function(){var a=r("gapi.config.update");a("googleapis.config/auth/useFirstPartyAuth",!0);var b=this.b.apiaryHost;ra(null==b?"":String(b))||a("googleapis.config/root",(-1==b.indexOf("://")?"//":"")+b);b=this.b.Fa;ra(null==b?"":String(b))||a("googleapis.config/root-1p",(-1==b.indexOf("://")?"//":"")+b);a("googleapis.config/sessionIndex",F("SESSION_INDEX"));r("gapi.client.setApiKey")(this.b.innertubeApiKey)};
sf.prototype.f=function(){return{context:Tc(this.b)}};
sf.prototype.g=function(a,b,c){var d,e=!1;0<c.timeout&&(d=G(function(){e||(e=!0,c.R&&c.R())},c.timeout));
vf(this,a,b,function(a){if(!e)if(e=!0,d&&Ib(d),a)c.F&&c.F(a);else if(c.onError)c.onError()})};
function vf(a,b,c,d){var e={path:"/youtubei/"+a.b.innertubeApiVersion+"/"+b,headers:{"X-Goog-Visitor-Id":F("VISITOR_DATA")},method:"POST",body:wc(c)},f=w(a.i,a);tf.then(function(){f();r("gapi.client.request")(e).execute(d||t)})}
;var Ma=r("yt.events.listeners_")||{};q("yt.events.listeners_",Ma,void 0);var wf=r("yt.events.counter_")||{count:0};q("yt.events.counter_",wf,void 0);function xf(a,b,c,d){a.addEventListener&&("mouseenter"!=b||"onmouseenter"in document?"mouseleave"!=b||"onmouseenter"in document?"mousewheel"==b&&"MozBoxSizing"in document.documentElement.style&&(b="MozMousePixelScroll"):b="mouseout":b="mouseover");return La(function(e){return e[0]==a&&e[1]==b&&e[2]==c&&e[4]==!!d})}
function Q(a,b,c,d){if(!a||!a.addEventListener&&!a.attachEvent)return"";d=!!d;var e=xf(a,b,c,d);if(e)return e;var e=++wf.count+"",f=!("mouseenter"!=b&&"mouseleave"!=b||!a.addEventListener||"onmouseenter"in document),g;g=f?function(d){d=new Kc(d);if(!Ue(d.relatedTarget,function(b){return b==a},!0))return d.currentTarget=a,d.type=b,c.call(a,d)}:function(b){b=new Kc(b);
b.currentTarget=a;return c.call(a,b)};
g=Hb(g);a.addEventListener?("mouseenter"==b&&f?b="mouseover":"mouseleave"==b&&f?b="mouseout":"mousewheel"==b&&"MozBoxSizing"in document.documentElement.style&&(b="MozMousePixelScroll"),a.addEventListener(b,g,d)):a.attachEvent("on"+b,g);Ma[e]=[a,b,c,g,d];return e}
function yf(a){a&&("string"==typeof a&&(a=[a]),z(a,function(a){if(a in Ma){var b=Ma[a],d=b[0],e=b[1],f=b[3],b=b[4];d.removeEventListener?d.removeEventListener(e,f,b):d.detachEvent&&d.detachEvent("on"+e,f);delete Ma[a]}}))}
;var zf={log_event:"events",log_interaction:"interactions"},Af={},Bf={},Cf=0,Oa=r("yt.logging.transport.logsQueue_")||{};q("yt.logging.transport.logsQueue_",Oa,void 0);function Df(a,b){Oa[a.endpoint]=Oa[a.endpoint]||[];var c=Oa[a.endpoint];c.push(a.Oa);Bf[a.endpoint]=b;c.length>=(Number(J("web_logging_max_batch")||0)||20)?Ef():Ff()}
function Ef(){Ib(Cf);if(!Na()){for(var a in Oa){var b=Af[a];if(!b){b=Bf[a];if(!b)continue;b=new b;Af[a]=b}var c=b.f();c.requestTimeMs=Math.round(Kb());c[zf[a]]=Oa[a];b.g(a,c,{});delete Oa[a]}Na()||Ff()}}
function Ff(){Ib(Cf);Cf=G(Ef,F("LOGGING_BATCH_TIMEOUT",1E4))}
;function Gf(a,b,c,d,e,f,g){function l(){4==(h&&"readyState"in h?h.readyState:0)&&b&&Hb(b)(h)}
var h=Pc&&Pc();if(!("open"in h))return null;"onloadend"in h?h.addEventListener("loadend",l,!1):h.onreadystatechange=l;c=(c||"GET").toUpperCase();d=d||"";h.open(c,a,!0);f&&(h.responseType=f);g&&(h.withCredentials=!0);f="POST"==c;if(e=Hf(a,e))for(var m in e)h.setRequestHeader(m,e[m]),"content-type"==m.toLowerCase()&&(f=!1);f&&h.setRequestHeader("Content-Type","application/x-www-form-urlencoded");h.send(d);return h}
function Hf(a,b){b=b||{};var c;c||(c=window.location.href);var d=L(a)[1]||null,e=bd(L(a)[3]||null);d&&e?(d=c,c=L(a),d=L(d),c=c[3]==d[3]&&c[1]==d[1]&&c[4]==d[4]):c=e?bd(L(c)[3]||null)==e&&(Number(L(c)[4]||null)||null)==(Number(L(a)[4]||null)||null):!0;for(var f in If){if((e=d=F(If[f]))&&!(e=c)){var e=f,g=F("CORS_HEADER_WHITELIST")||{},l=bd(L(a)[3]||null);e=l?(g=g[l])?Da(g,e):!1:!0}e&&(b[f]=d)}return b}
function Jf(a,b){b.method="POST";b.C||(b.C={});Kf(a,b)}
function Lf(a,b){var c=F("XSRF_FIELD_NAME",void 0),d;b.headers&&(d=b.headers["Content-Type"]);return!b.ic&&(!bd(L(a)[3]||null)||b.withCredentials||bd(L(a)[3]||null)==document.location.hostname)&&"POST"==b.method&&(!d||"application/x-www-form-urlencoded"==d)&&!(b.C&&b.C[c])}
function Kf(a,b){var c=b.format||"JSON";b.ub&&(a=document.location.protocol+"//"+document.location.hostname+(document.location.port?":"+document.location.port:"")+a);var d=F("XSRF_FIELD_NAME",void 0),e=F("XSRF_TOKEN",void 0),f=b.xa;f&&(f[d]&&delete f[d],a=xd(a,f||{}));var g=b.postBody||"",f=b.C;Lf(a,b)&&(f||(f={}),f[d]=e);f&&u(g)&&(d=wd(g),Sa(d,f),g=b.Pa&&"JSON"==b.Pa?JSON.stringify(d):gd(d));var l=!1,h,m=Gf(a,function(a){if(!l){l=!0;h&&Ib(h);var d=Qc(a),e=null;if(d||400<=a.status&&500>a.status)e=
Mf(c,a,b.hc);if(d)a:if(204==a.status)d=!0;else{switch(c){case "XML":d=0==parseInt(e&&e.return_code,10);break a;case "RAW":d=!0;break a}d=!!e}var e=e||{},f=b.context||n;d?b.F&&b.F.call(f,a,e):b.onError&&b.onError.call(f,a,e);b.wa&&b.wa.call(f,a,e)}},b.method,g,b.headers,b.responseType,b.withCredentials);
b.R&&0<b.timeout&&(h=G(function(){l||(l=!0,m.abort(),Ib(h),b.R.call(b.context||n,m))},b.timeout))}
function Mf(a,b,c){var d=null;switch(a){case "JSON":a=b.responseText;b=b.getResponseHeader("Content-Type")||"";a&&0<=b.indexOf("json")&&(d=vc(a));break;case "XML":if(b=(b=b.responseXML)?Nf(b):null)d={},z(b.getElementsByTagName("*"),function(a){d[a.tagName]=Of(a)})}c&&Pf(d);
return d}
function Pf(a){if(ga(a))for(var b in a){var c;(c="html_content"==b)||(c=b.length-5,c=0<=c&&b.indexOf("_html",c)==c);if(c){c=b;var d;d=eb(a[b]);a[c]=d}else Pf(a[b])}}
function Nf(a){return a?(a=("responseXML"in a?a.responseXML:a).getElementsByTagName("root"))&&0<a.length?a[0]:null:null}
function Of(a){var b="";z(a.childNodes,function(a){b+=a.nodeValue});
return b}
var If={"X-YouTube-Client-Name":"INNERTUBE_CONTEXT_CLIENT_NAME","X-YouTube-Client-Version":"INNERTUBE_CONTEXT_CLIENT_VERSION","X-Youtube-Identity-Token":"ID_TOKEN","X-YouTube-Page-CL":"PAGE_CL","X-YouTube-Page-Label":"PAGE_BUILD_LABEL","X-YouTube-Variants-Checksum":"VARIANTS_CHECKSUM"};function Qf(){if(!Rf&&!Sf||!window.JSON)return null;var a;try{a=Rf.get("yt-player-two-stage-token")}catch(b){}if(!u(a))try{a=Sf.get("yt-player-two-stage-token")}catch(b){}if(!u(a))return null;try{a=JSON.parse(a,void 0)}catch(b){}return a}
var Sf,Tf=new nf;Sf=Tf.isAvailable()?new te(Tf):null;var Rf,Uf=new of;Rf=Uf.isAvailable()?new te(Uf):null;function Vf(a,b,c){var d=Wf,e={};e.eventTimeMs=Math.round(c||Kb());e[a]=b;Df({endpoint:"log_event",Oa:e},d)}
;function Wf(){this.b=Sc();Xf||(Xf=Yf(this.b))}
var Xf=null;function Yf(a){return(new P(function(b){Xb(F("GAPI_LOADER_URL",void 0),function(){try{r("yt.gapi.load")("client",{gapiHintOverride:a.gapiHintOverride,_c:{jsl:{h:a.gapiHintParams}},callback:b})}catch(c){Jb(c)}})})).then(function(){})}
Wf.prototype.i=function(){var a=r("gapi.config.update");a("googleapis.config/auth/useFirstPartyAuth",!0);var b=this.b.apiaryHost;ra(null==b?"":String(b))||a("googleapis.config/root",(-1==b.indexOf("://")?"//":"")+b);b=this.b.Fa;ra(null==b?"":String(b))||a("googleapis.config/root-1p",(-1==b.indexOf("://")?"//":"")+b);a("googleapis.config/sessionIndex",F("SESSION_INDEX"));r("gapi.client.setApiKey")(this.b.innertubeApiKey)};
Wf.prototype.f=function(){return{context:Tc(this.b)}};
Wf.prototype.g=function(a,b,c){var d,e=!1;0<c.timeout&&(d=G(function(){e||(e=!0,c.R&&c.R())},c.timeout));
Zf(this,a,b,function(a){if(!e)if(e=!0,d&&Ib(d),a)c.F&&c.F(a);else if(c.onError)c.onError()})};
function Zf(a,b,c,d){var e={path:"/youtubei/"+a.b.innertubeApiVersion+"/"+b,headers:{"X-Goog-Visitor-Id":F("VISITOR_DATA")},method:"POST",body:wc(c)},f=w(a.i,a);Xf.then(function(){f();r("gapi.client.request")(e).execute(d||t)})}
;function $f(){this.b=Sc()}
$f.prototype.f=function(){return{context:Tc(this.b)}};
$f.prototype.g=function(a,b,c){b={headers:{"Content-Type":"application/json","X-Goog-Visitor-Id":F("VISITOR_DATA")},C:b,Pa:"JSON",R:c.R,F:c.F,onError:c.onError,timeout:c.timeout,withCredentials:!0};a:{c=[];var d=ic(String(n.location.href)),e=n.__OVERRIDE_SID;null==e&&(e=(new Dc(document)).get("SID"));if(e&&(d=(e=0==d.indexOf("https:")||0==d.indexOf("chrome-extension:"))?n.__SAPISID:n.__APISID,null==d&&(d=(new Dc(document)).get(e?"SAPISID":"APISID")),d)){var e=e?"SAPISIDHASH":"APISIDHASH",f=String(n.location.href);
c=f&&d&&e?[e,id(ic(f),d,c||null)].join(" "):null;break a}c=null}c&&(b.headers.Authorization=c,b.headers["X-Goog-AuthUser"]=F("SESSION_INDEX",0));Jf("//"+this.b.Xb+("/youtubei/"+this.b.innertubeApiVersion+"/"+a)+"?alt=json&key="+this.b.innertubeApiKey,b)};function ag(){if(null==r("_lact",window)){var a=parseInt(F("LACT"),10),a=isFinite(a)?x()-Math.max(a,0):-1;q("_lact",a,window);-1==a&&bg();Q(document,"keydown",bg);Q(document,"keyup",bg);Q(document,"mousedown",bg);Q(document,"mouseup",bg);Rb("page-mouse",bg);Rb("page-scroll",bg);Rb("page-resize",bg)}}
function bg(){null==r("_lact",window)&&(ag(),r("_lact",window));var a=x();q("_lact",a,window);Ub("USER_ACTIVE")}
function cg(){var a=r("_lact",window);return null==a?-1:Math.max(x()-a,0)}
;var dg={},eg=0;function fg(a,b,c){gg(hg(),{attachChild:{csn:a,parentVisualElement:Oc(b),visualElements:[Oc(c)]}},void 0)}
function ig(a,b){var c=hg();b=xa(b,function(a){return Oc(a)});
gg(c,{visibilityUpdate:{csn:a,visualElements:b}})}
function gg(a,b,c){b.eventTimeMs=Math.round(Kb());b.lactMs=cg();c&&(b.clientData=jg(c));Df({endpoint:"log_interaction",Oa:b},a)}
function jg(a){var b={};a.analyticsChannelData&&(b.analyticsDatas=xa(a.analyticsChannelData,function(a){return{tabName:a.tabName,cardName:a.cardName,isChannelScreen:a.isChannelScreen,insightId:a.insightId,externalChannelId:a.externalChannelId,externalContentOwnerId:a.externalContentOwnerId}}));
return{playbackData:{clientPlaybackNonce:a.clientPlaybackNonce},analyticsChannelData:b,externalLinkData:a.externalLinkData}}
;function hg(){return J("enable_youtubei_innertube")?$f:sf}
;function kg(){var a=F("ROOT_VE_TYPE",void 0);return a?new Mc(void 0,a,void 0):null}
function lg(){var a=F("client-screen-nonce",void 0);a||(a=F("EVENT_ID",void 0));return a}
;function mg(a,b){isNaN(b)&&(b=void 0);var c=r("yt.scheduler.instance.addJob");return c?c(a,1,b):void 0===b?(a(),NaN):G(a,b||0)}
;var ng=[],og=!1;function pg(){function a(){og=!0;"google_ad_status"in window?Fb("DCLKSTAT",1):Fb("DCLKSTAT",2)}
Xb("//static.doubleclick.net/instream/ad_status.js",a);ng.push(mg(function(){og||"google_ad_status"in window||(dc("//static.doubleclick.net/instream/ad_status.js",a),Fb("DCLKSTAT",3))},5E3))}
function qg(){return parseInt(F("DCLKSTAT",0),10)}
;var rg=x().toString();function sg(a,b,c){var d=F("EVENT_ID");d&&(b||(b={}),b.ei||(b.ei=d));if(b){var d=a,e=F("VALID_SESSION_TEMPDATA_DOMAINS",[]),f=bd(L(window.location.href)[3]||null);f&&e.push(f);f=bd(L(d)[3]||null);if(Da(e,f)||!f&&0==d.lastIndexOf("/",0)){J("autoescape_tempdata_url")&&(e=document.createElement("a"),fb(e,d),d=e.href);var f=L(d),d=f[5],e=f[6],f=f[7],g="";d&&(g+=d);e&&(g+="?"+e);f&&(g+="#"+f);d=g;e=d.indexOf("#");if(d=0>e?d:d.substr(0,e))J("enable_more_related_ve_logging")&&(b.itct||b.ved)&&(b.csn=b.csn||
lg()),d="ST-"+ua(d).toString(36),e=b?gd(b):"",Fc.set(""+d,e,5,"/","youtube.com"),b&&(b=b.itct||b.ved,d=r("yt.logging.screen.storeParentElement"),b&&d&&d(new Mc(b)))}}if(c)return!1;(window.ytspf||{}).enabled?spf.navigate(a):(c=window.location,a=cd(fd([a],{}))+"",a=a instanceof Wa?a:$a(a),c.href=Ya(a));return!0}
;function tg(a){a=a||{};this.url=a.url||"";this.urlV9As2=a.url_v9as2||"";this.args=a.args||Qa(ug);this.assets=a.assets||{};this.attrs=a.attrs||Qa(vg);this.params=a.params||Qa(wg);this.minVersion=a.min_version||"8.0.0";this.fallback=a.fallback||null;this.fallbackMessage=a.fallbackMessage||null;this.html5=!!a.html5;this.disable=a.disable||{};this.loaded=!!a.loaded;this.messages=a.messages||{}}
var ug={enablejsapi:1},vg={},wg={allowscriptaccess:"always",allowfullscreen:"true",bgcolor:"#000000"};function xg(a){a instanceof tg||(a=new tg(a));return a}
function yg(a){var b=new tg,c;for(c in a)if(a.hasOwnProperty(c)){var d=a[c];b[c]="object"==ca(d)?Qa(d):d}return b}
;function zg(a,b,c,d){this.top=a;this.right=b;this.bottom=c;this.left=d}
k=zg.prototype;k.getHeight=function(){return this.bottom-this.top};
k.contains=function(a){return this&&a?a instanceof zg?a.left>=this.left&&a.right<=this.right&&a.top>=this.top&&a.bottom<=this.bottom:a.l>=this.left&&a.l<=this.right&&a.o>=this.top&&a.o<=this.bottom:!1};
k.ceil=function(){this.top=Math.ceil(this.top);this.right=Math.ceil(this.right);this.bottom=Math.ceil(this.bottom);this.left=Math.ceil(this.left);return this};
k.floor=function(){this.top=Math.floor(this.top);this.right=Math.floor(this.right);this.bottom=Math.floor(this.bottom);this.left=Math.floor(this.left);return this};
k.round=function(){this.top=Math.round(this.top);this.right=Math.round(this.right);this.bottom=Math.round(this.bottom);this.left=Math.round(this.left);return this};function Ag(a,b,c,d){this.left=a;this.top=b;this.width=c;this.height=d}
Ag.prototype.contains=function(a){return a instanceof M?a.l>=this.left&&a.l<=this.left+this.width&&a.o>=this.top&&a.o<=this.top+this.height:this.left<=a.left&&this.left+this.width>=a.left+a.width&&this.top<=a.top&&this.top+this.height>=a.top+a.height};
Ag.prototype.ceil=function(){this.left=Math.ceil(this.left);this.top=Math.ceil(this.top);this.width=Math.ceil(this.width);this.height=Math.ceil(this.height);return this};
Ag.prototype.floor=function(){this.left=Math.floor(this.left);this.top=Math.floor(this.top);this.width=Math.floor(this.width);this.height=Math.floor(this.height);return this};
Ag.prototype.round=function(){this.left=Math.round(this.left);this.top=Math.round(this.top);this.width=Math.round(this.width);this.height=Math.round(this.height);return this};function Bg(a,b){var c=De(a);return c.defaultView&&c.defaultView.getComputedStyle&&(a=c.defaultView.getComputedStyle(a,null))?a[b]||a.getPropertyValue(b)||"":""}
function Cg(a,b){return Bg(a,b)||(a.currentStyle?a.currentStyle[b]:null)||a.style&&a.style[b]}
function Dg(a){var b;try{b=a.getBoundingClientRect()}catch(c){return{left:0,top:0,right:0,bottom:0}}N&&a.ownerDocument.body&&(a=a.ownerDocument,b.left-=a.documentElement.clientLeft+a.body.clientLeft,b.top-=a.documentElement.clientTop+a.body.clientTop);return b}
function Eg(a,b){"number"==typeof a&&(a=(b?Math.round(a):a)+"px");return a}
function Fg(a){var b=Gg;if("none"!=Cg(a,"display"))return b(a);var c=a.style,d=c.display,e=c.visibility,f=c.position;c.visibility="hidden";c.position="absolute";c.display="inline";a=b(a);c.display=d;c.position=f;c.visibility=e;return a}
function Gg(a){var b=a.offsetWidth,c=a.offsetHeight,d=ge&&!b&&!c;return p(b)&&!d||!a.getBoundingClientRect?new Cc(b,c):(a=Dg(a),new Cc(a.right-a.left,a.bottom-a.top))}
function Hg(a,b){if(/^\d+px?$/.test(b))return parseInt(b,10);var c=a.style.left,d=a.runtimeStyle.left;a.runtimeStyle.left=a.currentStyle.left;a.style.left=b;b=a.style.pixelLeft;a.style.left=c;a.runtimeStyle.left=d;return+b}
function Ig(a,b){return(b=a.currentStyle?a.currentStyle[b]:null)?Hg(a,b):0}
var Jg={thin:2,medium:4,thick:6};function Kg(a,b){if("none"==(a.currentStyle?a.currentStyle[b+"Style"]:null))return 0;b=a.currentStyle?a.currentStyle[b+"Width"]:null;return b in Jg?Jg[b]:Hg(a,b)}
;function Lg(){this.g=this.f=this.b=0;this.i="";var a=r("window.navigator.plugins"),b=r("window.navigator.mimeTypes"),a=a&&a["Shockwave Flash"],b=b&&b["application/x-shockwave-flash"],b=a&&b&&b.enabledPlugin&&a.description||"";if(a=b){var c=a.indexOf("Shockwave Flash");0<=c&&(a=a.substr(c+15));for(var c=a.split(" "),d="",a="",e=0,f=c.length;e<f;e++)if(d)if(a)break;else a=c[e];else d=c[e];d=d.split(".");c=parseInt(d[0],10)||0;d=parseInt(d[1],10)||0;e=0;if("r"==a.charAt(0)||"d"==a.charAt(0))e=parseInt(a.substr(1),
10)||0;a=[c,d,e]}else a=[0,0,0];this.i=b;b=a;this.b=b[0];this.f=b[1];this.g=b[2];if(0>=this.b){var g,l,h,m;if(Lb)try{g=new ActiveXObject("ShockwaveFlash.ShockwaveFlash")}catch(v){g=null}else h=document.body,m=document.createElement("object"),m.setAttribute("type","application/x-shockwave-flash"),g=h.appendChild(m);if(g&&"GetVariable"in g)try{l=g.GetVariable("$version")}catch(v){l=""}h&&m&&h.removeChild(m);(g=l||"")?(g=g.split(" ")[1].split(","),g=[parseInt(g[0],10)||0,parseInt(g[1],10)||0,parseInt(g[2],
10)||0]):g=[0,0,0];this.b=g[0];this.f=g[1];this.g=g[2]}}
ba(Lg);function Mg(a,b,c,d){b="string"==typeof b?b.split("."):[b,c,d];b[0]=parseInt(b[0],10)||0;b[1]=parseInt(b[1],10)||0;b[2]=parseInt(b[2],10)||0;return a.b>b[0]||a.b==b[0]&&a.f>b[1]||a.b==b[0]&&a.f==b[1]&&a.g>=b[2]}
;function Ng(a){if(window.spf){var b=a.match(Og);spf.style.load(a,b?b[1]:"",void 0)}else Pg(a)}
function Pg(a){var b=Qg(a),c=document.getElementById(b),d=c&&C(c,"loaded");d||c&&!d||(c=Rg(a,b,function(){C(c,"loaded")||(hb(c,"loaded","true"),Ub(b),G(na(Wb,b),0))}))}
function Rg(a,b,c){var d=document.createElement("link");d.id=b;d.onload=function(){c&&setTimeout(c,0)};
a=re(a);gb(d,a);(document.getElementsByTagName("head")[0]||document.body).appendChild(d);return d}
function Qg(a){var b=document.createElement("a");fb(b,a);a=b.href.replace(/^[a-zA-Z]+:\/\//,"//");return"css-"+ua(a)}
var Og=/cssbin\/(?:debug-)?([a-zA-Z0-9_-]+?)(?:-2x|-web|-rtl|-vfl|.css)/;var Sg;var Tg=A,Tg=Tg.toLowerCase();if(-1!=Tg.indexOf("android")){var Ug=Tg.match(/android\D*(\d\.\d)[^\;|\)]*[\;\)]/);if(Ug)Sg=Number(Ug[1]);else{var Vg={cupcake:1.5,donut:1.6,eclair:2,froyo:2.2,gingerbread:2.3,honeycomb:3,"ice cream sandwich":4,jellybean:4.1},Wg=[],Xg=0,Yg;for(Yg in Vg)Wg[Xg++]=Yg;var Zg=Tg.match("("+Wg.join("|")+")");Sg=Zg?Vg[Zg[0]]:0}}else Sg=void 0;var $g=['video/mp4; codecs="avc1.42001E, mp4a.40.2"','video/webm; codecs="vp8.0, vorbis"'],ah=['audio/mp4; codecs="mp4a.40.2"'];N&&O("9");!ge||O("528");fe&&O("1.9b")||N&&O("8")||de&&O("9.5")||ge&&O("528");fe&&!O("8")||N&&O("9");var bh;var ch=A,dh=ch.match(/\((iPad|iPhone|iPod)( Simulator)?;/);if(!dh||2>dh.length)bh=void 0;else{var eh=ch.match(/\((iPad|iPhone|iPod)( Simulator)?; (U; )?CPU (iPhone )?OS (\d+_\d)[_ ]/);bh=eh&&6==eh.length?Number(eh[5].replace("_",".")):0}0<=bh&&0<=A.search("Safari")&&A.search("Version");function fh(a){D.call(this);this.b=[];this.g=a||this}
y(fh,D);function gh(a,b,c,d){d=Hb(w(d,a.g));d={target:b,name:c,qa:d};b.addEventListener(c,d.qa,void 0);a.b.push(d)}
function hh(a){for(;a.b.length;){var b=a.b.pop();b.target.removeEventListener(b.name,b.qa)}}
fh.prototype.A=function(){hh(this);fh.B.A.call(this)};function R(a,b){this.version=a;this.args=b}
function ih(a){if(!a.Wa){var b={};a.call(b);a.Wa=b.version}return a.Wa}
function jh(a,b){function c(){a.apply(this,b.args)}
if(!b.args||!b.version)throw Error("yt.pubsub2.Data.deserialize(): serializedData is incomplete.");var d;try{d=ih(a)}catch(e){}if(!d||b.version!=d)throw Error("yt.pubsub2.Data.deserialize(): serializedData version is incompatible.");c.prototype=a.prototype;try{return new c}catch(e){throw e.message="yt.pubsub2.Data.deserialize(): "+e.message,e;}}
function S(a,b){this.topic=a;this.b=b}
S.prototype.toString=function(){return this.topic};var kh=window.performance||window.mozPerformance||window.msPerformance||window.webkitPerformance||{};function lh(a){R.call(this,1,arguments)}
y(lh,R);var mh=new S("timing-sent",lh);var nh=r("yt.pubsub2.instance_")||new E;E.prototype.subscribe=E.prototype.subscribe;E.prototype.unsubscribeByKey=E.prototype.T;E.prototype.publish=E.prototype.N;E.prototype.clear=E.prototype.clear;q("yt.pubsub2.instance_",nh,void 0);var oh=r("yt.pubsub2.subscribedKeys_")||{};q("yt.pubsub2.subscribedKeys_",oh,void 0);var ph=r("yt.pubsub2.topicToKeys_")||{};q("yt.pubsub2.topicToKeys_",ph,void 0);var qh=r("yt.pubsub2.isAsync_")||{};q("yt.pubsub2.isAsync_",qh,void 0);q("yt.pubsub2.skipSubKey_",null,void 0);
function T(a,b){var c=rh();c&&c.publish.call(c,a.toString(),a,b)}
function U(a,b,c){var d=rh();if(!d)return 0;var e=d.subscribe(a.toString(),function(d,g){if(!window.yt.pubsub2.skipSubKey_||window.yt.pubsub2.skipSubKey_!=e){var f=function(){if(oh[e])try{if(g&&a instanceof S&&a!=d)try{g=jh(a.b,g)}catch(h){throw h.message="yt.pubsub2 cross-binary conversion error for "+a.toString()+": "+h.message,h;}b.call(c||window,g)}catch(h){Jb(h)}};
qh[a.toString()]?r("yt.scheduler.instance")?mg(f,void 0):G(f,0):f()}});
oh[e]=!0;ph[a.toString()]||(ph[a.toString()]=[]);ph[a.toString()].push(e);return e}
function sh(a){var b=rh();b&&("number"==typeof a&&(a=[a]),z(a,function(a){b.unsubscribeByKey(a);delete oh[a]}))}
function rh(){return r("yt.pubsub2.instance_")}
;var th={},uh=0;function vh(a){var b=new Image,c=""+uh++;th[c]=b;b.onload=b.onerror=function(){delete th[c]};
b.src=a}
;function wh(a,b,c){D.call(this);this.b=a;this.j=b||0;this.g=c;this.i=w(this.ob,this)}
y(wh,D);k=wh.prototype;k.ca=0;k.A=function(){wh.B.A.call(this);this.stop();delete this.b;delete this.g};
k.start=function(a){this.stop();var b=this.i;a=p(a)?a:this.j;if(!fa(b))if(b&&"function"==typeof b.handleEvent)b=w(b.handleEvent,b);else throw Error("Invalid listener argument");this.ca=2147483647<Number(a)?-1:n.setTimeout(b,a||0)};
k.stop=function(){this.isActive()&&n.clearTimeout(this.ca);this.ca=0};
k.isActive=function(){return 0!=this.ca};
k.ob=function(){this.ca=0;this.b&&this.b.call(this.g)};var xh={vc:!0},yh={ad_at:"adType",cpn:"clientPlaybackNonce",csn:"clientScreenNonce",yt_lt:"loadType",yt_ad:"isMonetized",yt_ad_pr:"prerollAllowed",yt_red:"isRedSubscriber",yt_vis:"isVisible"},zh=["isMonetized","prerollAllowed","isRedSubscriber","isVisible"],Ah=w(kh.clearResourceTimings||kh.webkitClearResourceTimings||kh.mozClearResourceTimings||kh.msClearResourceTimings||kh.oClearResourceTimings||t,kh);
function Bh(a,b){if(!b&&"_"!=a[0]){var c=a;kh.mark&&(0==c.lastIndexOf("mark_",0)||(c="mark_"+c),kh.mark(c))}var c=Ch(),d=b||Kb();c[a]&&(c["_"+a]=c["_"+a]||[c[a]],c["_"+a].push(d));c[a]=d;(Dh()["tick_"+a]=b)||Kb();J("csi_on_gel")?(c=Eh(),"_start"==a?Vf("latencyActionBaselined",{clientActionNonce:c},b):Vf("latencyActionTicked",{tickName:a,clientActionNonce:c},b),a=!0):a=!1;a||(a=!!r("yt.timing.pingSent_")&&!!J("navigation_only_csi_reset"));if(!a&&(b=F("TIMING_ACTION",void 0),a=Ch(),r("yt.timing.ready_")&&
b&&a._start&&Fh())){b=!0;c=F("TIMING_WAIT",[]);if(c.length)for(var d=0,e=c.length;d<e;++d)if(!(c[d]in a)){b=!1;break}b&&Gh()}}
function Hh(){var a=Ih().info.yt_lt="hot_bg";Dh().info_yt_lt=a;if(J("csi_on_gel"))if("yt_lt"in yh){var b={},c=yh.yt_lt;Da(zh,c)&&(a=!!a);b[c]=a;a=Eh();b.clientActionNonce=a;Vf("latencyActionInfo",b)}else Jb(Error("Unknown label yt_lt logged with GEL CSI."))}
function Fh(){var a=Ch();if(a.aft)return a.aft;for(var b=F("TIMING_AFT_KEYS",["ol"]),c=b.length,d=0;d<c;d++){var e=a[b[d]];if(e)return e}return NaN}
function Gh(){if(!J("csi_on_gel")){var a=Ch(),b=Ih().info,c=a._start,d;for(d in a)if(0==d.lastIndexOf("_",0)&&da(a[d])){var e=d.slice(1);if(e in xh){var f=xa(a[d],function(a){return Math.round(a-c)});
b["all_"+e]=f.join()}delete a[d]}e=!!b.ap;if(f=r("yt.timing.reportbuilder_")){if(f=f(a,b,void 0))Jh(f,e),Kh(),Ah(),Lh(!1,void 0)}else{var g=F("CSI_SERVICE_NAME","youtube"),f={v:2,s:g,action:F("TIMING_ACTION",void 0)},l=b.srt;delete b.srt;void 0===a.srt&&(l||0===l||(l=kh.timing||{},l=Math.max(0,l.responseStart-l.navigationStart),isNaN(l)&&b.pt&&(l=b.pt)),l||0===l)&&(b.srt=Math.round(l));if(b.h5jse){var h=window.location.protocol+r("ytplayer.config.assets.js");(h=kh.getEntriesByName?kh.getEntriesByName(h)[0]:
null)?b.h5jse=Math.round(b.h5jse-h.responseEnd):delete b.h5jse}a.aft=Fh();Mh()&&"youtube"==g&&(Hh(),g=a.vc,h=a.pbs,delete a.aft,b.aft=Math.round(h-g));for(var m in b)"_"!=m.charAt(0)&&(f[m]=b[m]);a.ps=Kb();b={};m=[];for(d in a)"_"!=d.charAt(0)&&(g=Math.round(a[d]-c),b[d]=g,m.push(d+"."+g));f.rt=m.join(",");(a=r("ytdebug.logTiming"))&&a(f,b);J("navigation_only_csi_reset")||(Kh(),Ah(),Lh(!1,void 0));Jh(f,e,void 0);T(mh,new lh(b.aft+(l||0)))}}}
function Jh(a,b,c){if(J("debug_csi_data")){var d=r("yt.timing.csiData");d||(d=[],q("yt.timing.csiData",d,void 0));d.push({page:location.href,time:new Date,args:a})}var d="",e;for(e in a)d+="&"+e+"="+a[e];a="/csi_204?"+d.substring(1);if(window.navigator&&window.navigator.sendBeacon&&b)try{window.navigator&&window.navigator.sendBeacon&&window.navigator.sendBeacon(a,"")||a&&vh(a)}catch(f){a&&vh(a)}else a&&vh(a);Lh(!0,c)}
function Eh(){var a=Ih().nonce;if(!a){var b;a:{if(window.crypto&&window.crypto.getRandomValues)try{var c=Array(16),d=new Uint8Array(16);window.crypto.getRandomValues(d);for(a=0;a<c.length;a++)c[a]=d[a];b=c;break a}catch(e){}b=Array(16);for(c=0;16>c;c++){d=x();for(a=0;a<d%23;a++)b[c]=Math.random();b[c]=Math.floor(256*Math.random())}if(rg)for(c=1,d=0;d<rg.length;d++)b[c%16]=b[c%16]^b[(c-1)%16]/4^rg.charCodeAt(d),c++}c=[];for(d=0;d<b.length;d++)c.push("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_".charAt(b[d]&
63));a=c.join("");Ih().nonce=a}return a}
function Ch(){return Ih().tick}
function Dh(){var a=Ih();"gel"in a||(a.gel={});return a.gel}
function Ih(){return r("ytcsi.data_")||Kh()}
function Kh(){var a={tick:{},info:{}};q("ytcsi.data_",a,void 0);return a}
function Lh(a,b){q("yt.timing."+(b||"")+"pingSent_",a,void 0)}
function Mh(){var a=Ch(),b=a.pbr,c=a.vc,a=a.pbs;return b&&c&&a&&b<c&&c<a&&1==Ih().info.yt_pvis}
;new wh(Nh,1E3);function Nh(){Bh("vptl",0);Bh("vpl",0)}
;var Oh={"api.invalidparam":2,auth:150,"drm.auth":150,"heartbeat.net":150,"heartbeat.servererror":150,"heartbeat.stop":150,"html5.unsupportedads":5,"fmt.noneavailable":5,"fmt.decode":5,"fmt.unplayable":5,"html5.missingapi":5,"html5.unsupportedlive":5,"drm.unavailable":5};function Ph(a,b){D.call(this);this.D=this.w=a;this.$=b;this.G=!1;this.g={};this.ga=this.Z=null;this.aa=new E;zb(this,na(Ab,this.aa));this.j={};this.L=this.ha=this.i=this.pa=this.b=null;this.da=!1;this.O=this.J=this.X=this.Y=null;this.ia={};this.ib=["onReady"];this.ea=new fh(this);zb(this,na(Ab,this.ea));this.na=null;this.Ca=NaN;this.fa={};Qh(this);this.M("onDetailedError",w(this.Db,this));this.M("onTabOrderChange",w(this.lb,this));this.M("onTabAnnounce",w(this.Da,this));this.M("WATCH_LATER_VIDEO_ADDED",
w(this.Eb,this));this.M("WATCH_LATER_VIDEO_REMOVED",w(this.Fb,this));ve||(this.M("onMouseWheelCapture",w(this.Bb,this)),this.M("onMouseWheelRelease",w(this.Cb,this)));this.M("onAdAnnounce",w(this.Da,this));this.P=new fh(this);zb(this,na(Ab,this.P));this.oa=!1;this.ma=null}
y(Ph,D);var Rh=["drm.unavailable","fmt.noneavailable","html5.missingapi","html5.unsupportedads","html5.unsupportedlive"];k=Ph.prototype;k.ya=function(a,b){this.f||(Sh(this,a),Th(this,b),this.G&&Uh(this))};
function Sh(a,b){a.pa=b;a.b=yg(b);a.i=a.b.attrs.id||a.i;"video-player"==a.i&&(a.i=a.$,a.b.attrs.id=a.$);a.D.id==a.i&&(a.i+="-player",a.b.attrs.id=a.i);a.b.args.enablejsapi="1";a.b.args.playerapiid=a.$;a.ha||(a.ha=Vh(a,a.b.args.jsapicallback||"onYouTubePlayerReady"));a.b.args.jsapicallback=null;if(b=a.b.attrs.width)a.D.style.width=Eg(Number(b)||b,!0);if(b=a.b.attrs.height)a.D.style.height=Eg(Number(b)||b,!0)}
k.rb=function(){return this.pa};
function Uh(a){a.b.loaded||(a.b.loaded=!0,"0"!=a.b.args.autoplay?a.g.loadVideoByPlayerVars(a.b.args):a.g.cueVideoByPlayerVars(a.b.args))}
function Wh(a){if(!p(a.b.disable.flash)){var b=a.b.disable,c;c=Mg(Lg.getInstance(),a.b.minVersion);b.flash=!c}return!a.b.disable.flash}
function Xh(a,b){if((!b||(5!=(Oh[b.errorCode]||5)?0:-1!=Rh.indexOf(b.errorCode)))&&Wh(a)){(b=Yh(a))&&b.stopVideo&&b.stopVideo();var c=a.b;b&&b.getUpdatedConfigurationData&&(b=b.getUpdatedConfigurationData(),c=xg(b));c.args.autoplay=1;c.args.html5_unavailable="1";Sh(a,c);Th(a,"flash")}}
function Th(a,b){if(!a.f){if(!b){if(!(b=!a.b.html5&&Wh(a))){if(!p(a.b.disable.html5)){var c;b=!0;void 0!=a.b.args.deviceHasDisplay&&(b=a.b.args.deviceHasDisplay);if(2.2==Sg)c=!0;else{a:{var d=b;b=r("yt.player.utils.videoElement_");b||(b=document.createElement("VIDEO"),q("yt.player.utils.videoElement_",b,void 0));try{if(b.canPlayType)for(var d=d?$g:ah,e=0;e<d.length;e++)if(b.canPlayType(d[e])){c=null;break a}c="fmt.noneavailable"}catch(f){c="html5.missingapi"}}c=!c}c&&(c=Zh(a)||a.b.assets.js);a.b.disable.html5=
!c;c||(a.b.args.html5_unavailable="1")}b=!!a.b.disable.html5}b=b?Wh(a)?"flash":"unsupported":"html5"}("flash"==b?a.Vb:a.Wb).call(a)}}
function Zh(a){var b=!0,c=Yh(a);c&&a.b&&(a=a.b,b=C(c,"version")==a.assets.js);return b&&!!r("yt.player.Application.create")}
k.Wb=function(){if(!this.da){var a=Zh(this);a&&"html5"==$h(this)?(this.L="html5",this.G||this.W()):(ai(this),this.L="html5",a&&this.X?(this.w.appendChild(this.X),this.W()):(this.b.loaded=!0,this.Y=w(function(){var a=this.w,c=yg(this.b);r("yt.player.Application.create")(a,c);this.W()},this),this.da=!0,a?this.Y():(Xb(this.b.assets.js,this.Y),Ng(this.b.assets.css))))}};
k.Vb=function(){var a=yg(this.b);if(!this.J){var b=Yh(this);b&&(this.J=document.createElement("SPAN"),this.J.tabIndex=0,gh(this.ea,this.J,"focus",this.Ka),this.O=document.createElement("SPAN"),this.O.tabIndex=0,gh(this.ea,this.O,"focus",this.Ka),b.parentNode&&b.parentNode.insertBefore(this.J,b),b.parentNode&&b.parentNode.insertBefore(this.O,b.nextSibling))}a.attrs.width=a.attrs.width||"100%";a.attrs.height=a.attrs.height||"100%";if("flash"==$h(this))this.L="flash",this.G||this.W();else{ai(this);this.L=
"flash";this.b.loaded=!0;var b=Lg.getInstance(),c=(-1<b.i.indexOf("Gnash")&&-1==b.i.indexOf("AVM2")||9==b.b&&1==b.f||9==b.b&&0==b.f&&1==b.g?0:9<=b.b)||-1<navigator.userAgent.indexOf("Sony/COM2")&&!Mg(b,9,1,58)?a.url:a.urlV9As2;window!=window.top&&document.referrer&&(a.args.framer=document.referrer.substring(0,128));b=this.w;if(c){var b=u(b)?Ee(b):b,d=Qa(a.attrs);d.tabindex=0;var e=Qa(a.params);e.flashvars=gd(a.args);if(Lb){d.classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000";e.movie=c;var a=document.createElement("object"),
f;for(f in d)a.setAttribute(f,d[f]);for(f in e)d=document.createElement("param"),d.setAttribute("name",f),d.setAttribute("value",e[f]),a.appendChild(d)}else{d.type="application/x-shockwave-flash";d.src=c;a=document.createElement("embed");a.setAttribute("name",d.id);for(f in d)a.setAttribute(f,d[f]);for(f in e)a.setAttribute(f,e[f])}f=document.createElement("div");f.appendChild(a);b.innerHTML=f.innerHTML}this.W()}};
k.Ka=function(){Yh(this).focus()};
function Yh(a){var b=Ee(a.i);!b&&a.D&&a.D.querySelector&&(b=a.D.querySelector("#"+a.i));return b}
k.W=function(){if(!this.f){var a=Yh(this),b=!1;try{a&&a.getApiInterface&&a.getApiInterface()&&(b=!0)}catch(f){}if(b)if(this.da=!1,a.isNotServable&&a.isNotServable(this.b.args.video_id))Xh(this);else{Qh(this);this.G=!0;a=Yh(this);a.addEventListener&&(this.Z=bi(this,a,"addEventListener"));a.removeEventListener&&(this.ga=bi(this,a,"removeEventListener"));for(var b=a.getApiInterface(),b=b.concat(a.getInternalApiInterface()),c=0;c<b.length;c++){var d=b[c];this.g[d]||(this.g[d]=bi(this,a,d))}for(var e in this.j)this.Z(e,
this.j[e]);Uh(this);this.ha&&this.ha(this.g);this.aa.N("onReady",this.g)}else this.Ca=G(w(this.W,this),50)}};
function bi(a,b,c){var d=b[c];return function(){try{return a.na=null,d.apply(b,arguments)}catch(e){"Bad NPObject as private data!"!=e.message&&"sendAbandonmentPing"!=c&&(e.message+=" ("+c+")",a.na=e,Jb(e,"WARNING"))}}}
function Qh(a){a.G=!1;if(a.ga)for(var b in a.j)a.ga(b,a.j[b]);for(var c in a.fa)Ib(parseInt(c,10));a.fa={};a.Z=null;a.ga=null;for(var d in a.g)a.g[d]=null;a.g.addEventListener=w(a.M,a);a.g.removeEventListener=w(a.Nb,a);a.g.destroy=w(a.dispose,a);a.g.getLastError=w(a.sb,a);a.g.getPlayerType=w(a.tb,a);a.g.getCurrentVideoConfig=w(a.rb,a);a.g.loadNewVideoConfig=w(a.ya,a);a.g.isReady=w(a.Yb,a)}
k.Yb=function(){return this.G};
k.M=function(a,b){if(!this.f&&(b=Vh(this,b))){if(!Da(this.ib,a)&&!this.j[a]){var c=ci(this,a);this.Z&&this.Z(a,c)}this.aa.subscribe(a,b);"onReady"==a&&this.G&&G(na(b,this.g),0)}};
k.Nb=function(a,b){this.f||(b=Vh(this,b))&&this.aa.unsubscribe(a,b)};
function Vh(a,b){var c=b;if("string"==typeof b){if(a.ia[b])return a.ia[b];c=function(){var a=r(b);a&&a.apply(n,arguments)};
a.ia[b]=c}return c?c:null}
function ci(a,b){var c="ytPlayer"+b+a.$;a.j[b]=c;n[c]=function(c){var d=G(function(){if(!a.f){a.aa.N(b,c);var e=a.fa,g=String(d);g in e&&delete e[g]}},0);
Pa(a.fa,String(d))};
return c}
k.lb=function(a){a=a?Me:Le;for(var b=a(document.activeElement);b&&(1!=b.nodeType||b==this.J||b==this.O||(b.focus(),b!=document.activeElement));)b=a(b)};
k.Da=function(a){Ub("a11y-announce",a)};
k.Db=function(a){Xh(this,a)};
k.Eb=function(a){Ub("WATCH_LATER_VIDEO_ADDED",a)};
k.Fb=function(a){Ub("WATCH_LATER_VIDEO_REMOVED",a)};
k.Bb=function(){this.oa||(ze?(this.ma=Je(document),gh(this.P,window,"scroll",this.Kb),gh(this.P,this.w,"touchmove",this.Ib)):(gh(this.P,this.w,"mousewheel",this.Na),gh(this.P,this.w,"wheel",this.Na)),this.oa=!0)};
k.Cb=function(){hh(this.P);this.oa=!1};
k.Na=function(a){a=a||window.event;a.returnValue=!1;a.preventDefault&&a.preventDefault()};
k.Kb=function(){window.scrollTo(this.ma.l,this.ma.o)};
k.Ib=function(a){a.preventDefault()};
k.tb=function(){return this.L||$h(this)};
k.sb=function(){return this.na};
function $h(a){return(a=Yh(a))?"div"==a.tagName.toLowerCase()?"html5":"flash":null}
function ai(a){Bh("dcp");a.cancel();Qh(a);a.L=null;a.b&&(a.b.loaded=!1);var b=Yh(a);"html5"==$h(a)?a.X=b:b&&b.destroy&&b.destroy();Ke(a.w);hh(a.ea);a.J=null;a.O=null}
k.cancel=function(){this.Y&&dc(this.b.assets.js,this.Y);Ib(this.Ca);this.da=!1};
k.A=function(){ai(this);if(this.X&&this.b)try{this.X.destroy()}catch(b){Jb(b)}this.ia=null;for(var a in this.j)n[this.j[a]]=null;this.pa=this.b=this.g=null;delete this.w;delete this.D;Ph.B.A.call(this)};var di={},ei="player_uid_"+(1E9*Math.random()>>>0);function fi(a,b){a=u(a)?Ee(a):a;b=xg(b);var c=ei+"_"+ia(a),d=di[c];if(d)return d.ya(b),d.g;d=new Ph(a,c);di[c]=d;Ub("player-added",d.g);zb(d,na(gi,d));G(function(){d.ya(b)},0);
return d.g}
function gi(a){di[a.$]=null}
function hi(a){a=Ee(a);if(!a)return null;var b=ei+"_"+ia(a),c=di[b];c||(c=new Ph(a,b),di[b]=c);return c.g}
;var ii=r("yt.abuse.botguardInitialized")||gc;q("yt.abuse.botguardInitialized",ii,void 0);var ji=r("yt.abuse.invokeBotguard")||hc;q("yt.abuse.invokeBotguard",ji,void 0);var ki=r("yt.abuse.dclkstatus.checkDclkStatus")||qg;q("yt.abuse.dclkstatus.checkDclkStatus",ki,void 0);var li=r("yt.player.exports.navigate")||sg;q("yt.player.exports.navigate",li,void 0);var mi=r("yt.player.embed")||fi;q("yt.player.embed",mi,void 0);var ni=r("yt.player.getPlayerByElement")||hi;q("yt.player.getPlayerByElement",ni,void 0);
var oi=r("yt.util.activity.init")||ag;q("yt.util.activity.init",oi,void 0);var pi=r("yt.util.activity.getTimeSinceActive")||cg;q("yt.util.activity.getTimeSinceActive",pi,void 0);var qi=r("yt.util.activity.setTimestamp")||bg;q("yt.util.activity.setTimestamp",qi,void 0);function ri(a){R.call(this,1,arguments);this.b=a}
y(ri,R);function V(a){R.call(this,1,arguments);this.b=a}
y(V,R);function si(a,b,c){R.call(this,3,arguments);this.g=a;this.f=b;this.b=null!=c?!!c:null}
y(si,R);function ti(a,b,c,d,e){R.call(this,2,arguments);this.f=a;this.b=b;this.i=c||null;this.g=d||null;this.source=e||null}
y(ti,R);function ui(a,b,c){R.call(this,1,arguments);this.b=a;this.subscriptionId=b}
y(ui,R);function vi(a,b,c,d,e,f,g){R.call(this,1,arguments);this.f=a;this.subscriptionId=b;this.b=c;this.j=d||null;this.i=e||null;this.g=f||null;this.source=g||null}
y(vi,R);
var wi=new S("subscription-batch-subscribe",ri),xi=new S("subscription-batch-unsubscribe",ri),yi=new S("subscription-subscribe",ti),zi=new S("subscription-subscribe-loading",V),Ai=new S("subscription-subscribe-loaded",V),Bi=new S("subscription-subscribe-success",ui),Ci=new S("subscription-subscribe-external",ti),Di=new S("subscription-unsubscribe",vi),Ei=new S("subscription-unsubscirbe-loading",V),Fi=new S("subscription-unsubscribe-loaded",V),Gi=new S("subscription-unsubscribe-success",V),Hi=new S("subscription-external-unsubscribe",
vi),Ii=new S("subscription-enable-ypc",V),Ji=new S("subscription-disable-ypc",V),Ki=new S("subscription-prefs",si),Li=new S("subscription-prefs-success",si),Mi=new S("subscription-prefs-failure",si);function Ni(a,b){var c=document.location.protocol+"//"+document.domain+"/post_login";b&&(c=hd(c,"mode",b));b=hd("/signin?context=popup","next",c);b=hd(b,"feature","sub_button");if(b=window.open(b,"loginPopup","width=375,height=440,resizable=yes,scrollbars=yes",!0))c=Rb("LOGGED_IN",function(b){Tb(F("LOGGED_IN_PUBSUB_KEY",void 0));Fb("LOGGED_IN",!0);a(b)}),Fb("LOGGED_IN_PUBSUB_KEY",c),b.moveTo((screen.width-375)/2,(screen.height-440)/2)}
q("yt.pubsub.publish",Ub,void 0);function Oi(){var a=F("PLAYER_CONFIG");return a&&a.args&&void 0!==a.args.authuser?!0:!(!F("SESSION_INDEX")&&!F("LOGGED_IN"))}
;function Pi(){var a=rf();return a?a:null}
;function Qi(a,b){(a=Ee(a))&&a.style&&(a.style.display=b?"":"none",ud(a,"hid",!b))}
function Ri(a){z(arguments,function(a){!ea(a)||a instanceof Element?Qi(a,!0):z(a,function(a){Ri(a)})})}
function Si(a){z(arguments,function(a){!ea(a)||a instanceof Element?Qi(a,!1):z(a,function(a){Si(a)})})}
;var Ti={},Ui="ontouchstart"in document;function Vi(a,b,c){var d;switch(a){case "mouseover":case "mouseout":d=3;break;case "mouseenter":case "mouseleave":d=9}return Ue(c,function(a){return pd(a,b)},!0,d)}
function W(a){var b="mouseover"==a.type&&"mouseenter"in Ti||"mouseout"==a.type&&"mouseleave"in Ti,c=a.type in Ti||b;if("HTML"!=a.target.tagName&&c){if(b){var b="mouseover"==a.type?"mouseenter":"mouseleave",c=Ti[b],d;for(d in c.H){var e=Vi(b,d,a.target);e&&!Ue(a.relatedTarget,function(a){return a==e},!0)&&c.N(d,e,b,a)}}if(b=Ti[a.type])for(d in b.H)(e=Vi(a.type,d,a.target))&&b.N(d,e,a.type,a)}}
Q(document,"blur",W,!0);Q(document,"change",W,!0);Q(document,"click",W);Q(document,"focus",W,!0);Q(document,"mouseover",W);Q(document,"mouseout",W);Q(document,"mousedown",W);Q(document,"keydown",W);Q(document,"keyup",W);Q(document,"keypress",W);Q(document,"cut",W);Q(document,"paste",W);Ui&&(Q(document,"touchstart",W),Q(document,"touchend",W),Q(document,"touchcancel",W));function Wi(a){this.j=a;this.g={};this.ka=[];this.i=[]}
function X(a,b){return"yt-uix"+(a.j?"-"+a.j:"")+(b?"-"+b:"")}
Wi.prototype.register=aa;Wi.prototype.unregister=function(){Tb(this.ka);this.ka.length=0;sh(this.i);this.i.length=0};
Wi.prototype.init=t;Wi.prototype.dispose=t;function Xi(a,b,c){a.i.push(U(b,c,a))}
function Yi(a,b,c){var d=X(a,void 0),e=w(c,a);b in Ti||(Ti[b]=new E);Ti[b].subscribe(d,e);a.g[c]=e}
function Zi(a,b,c){if(b in Ti){var d=Ti[b];d.unsubscribe(X(a,void 0),a.g[c]);0>=d.ba()&&(d.dispose(),delete Ti[b])}delete a.g[c]}
function $i(a,b){hb(a,"tooltip-text",b)}
;function aj(){Wi.call(this,"tooltip");this.b=0;this.f={}}
y(aj,Wi);ba(aj);k=aj.prototype;k.register=function(){Yi(this,"mouseover",this.ja);Yi(this,"mouseout",this.S);Yi(this,"focus",this.Ia);Yi(this,"blur",this.Ga);Yi(this,"click",this.S);Yi(this,"touchstart",this.Va);Yi(this,"touchend",this.la);Yi(this,"touchcancel",this.la)};
k.unregister=function(){Zi(this,"mouseover",this.ja);Zi(this,"mouseout",this.S);Zi(this,"focus",this.Ia);Zi(this,"blur",this.Ga);Zi(this,"click",this.S);Zi(this,"touchstart",this.Va);Zi(this,"touchend",this.la);Zi(this,"touchcancel",this.la);this.dispose();aj.B.unregister.call(this)};
k.dispose=function(){for(var a in this.f)this.S(this.f[a]);this.f={}};
k.ja=function(a){if(!(this.b&&1E3>x()-this.b)){var b=parseInt(C(a,"tooltip-hide-timer"),10);b&&(jb(a,"tooltip-hide-timer"),Ib(b));var b=w(function(){bj(this,a);jb(a,"tooltip-show-timer")},this),c=parseInt(C(a,"tooltip-show-delay"),10)||0,b=G(b,c);
hb(a,"tooltip-show-timer",b.toString());a.title&&($i(a,cj(a)),a.title="");b=ia(a).toString();this.f[b]=a}};
k.S=function(a){var b=parseInt(C(a,"tooltip-show-timer"),10);b&&(Ib(b),jb(a,"tooltip-show-timer"));b=w(function(){if(a){var b=Ee(dj(this,a));b&&(ej(b),b&&b.parentNode&&b.parentNode.removeChild(b),jb(a,"content-id"));(b=Ee(dj(this,a,"arialabel")))&&b.parentNode&&b.parentNode.removeChild(b)}jb(a,"tooltip-hide-timer")},this);
b=G(b,50);hb(a,"tooltip-hide-timer",b.toString());if(b=C(a,"tooltip-text"))a.title=b;b=ia(a).toString();delete this.f[b]};
k.Ia=function(a){this.b=0;this.ja(a)};
k.Ga=function(a){this.b=0;this.S(a)};
k.Va=function(a,b,c){c.changedTouches&&(this.b=0,a=Vi(b,X(this),c.changedTouches[0].target),this.ja(a))};
k.la=function(a,b,c){c.changedTouches&&(this.b=x(),a=Vi(b,X(this),c.changedTouches[0].target),this.S(a))};
function fj(a,b){$i(a,b);a=C(a,"content-id");(a=Ee(a))&&Ne(a,b)}
function cj(a){return C(a,"tooltip-text")||a.title}
function bj(a,b){if(b){var c=cj(b);if(c){var d=Ee(dj(a,b));if(!d){d=document.createElement("div");d.id=dj(a,b);d.className=X(a,"tip");var e=document.createElement("div");e.className=X(a,"tip-body");var f=document.createElement("div");f.className=X(a,"tip-arrow");var g=document.createElement("div");g.setAttribute("aria-hidden","true");g.className=X(a,"tip-content");var l=gj(a,b),h=dj(a,b,"content");g.id=h;hb(b,"content-id",h);e.appendChild(g);l&&d.appendChild(l);d.appendChild(e);d.appendChild(f);var m=
Qe(b),h=dj(a,b,"arialabel"),f=document.createElement("div");qd(f,X(a,"arialabel"));f.id=h;m=b.hasAttribute("aria-label")?b.getAttribute("aria-label"):"rtl"==document.body.getAttribute("dir")?c+" "+m:m+" "+c;Ne(f,m);b.setAttribute("aria-labelledby",h);h=Pi()||document.body;h.appendChild(f);h.appendChild(d);fj(b,c);(c=parseInt(C(b,"tooltip-max-width"),10))&&e.offsetWidth>c&&(e.style.width=c+"px",qd(g,X(a,"normal-wrap")));g=pd(b,X(a,"reverse"));hj(a,b,d,e,l,g)||hj(a,b,d,e,l,!g);var v=X(a,"tip-visible");
G(function(){qd(d,v)},0)}}}}
function hj(a,b,c,d,e,f){var g;ud(c,X(a,"tip-reverse"),f);var l=0;f&&(l=1);a=Fg(b);f=new M((a.width-10)/2,f?a.height:0);var h=De(b);g=new M(0,0);var m;m=h?De(h):document;m=!N||9<=Number(oe)||Ie(Be(m).b)?m.documentElement:m.body;b!=m&&(m=Dg(b),h=Je(Be(h).b),g.l=m.left+h.l,g.o=m.top+h.o);f=new M(g.l+f.l,g.o+f.o);f=new M(f.l,f.o);g=(l&8&&"rtl"==Cg(c,"direction")?l^4:l)&-9;l=Fg(c);h=new Cc(l.width,l.height);f=new M(f.l,f.o);h=new Cc(h.width,h.height);0!=g&&(g&4?f.l-=h.width+0:g&2&&(f.l-=h.width/2),g&
1&&(f.o-=h.height+0));g=new Ag(0,0,0,0);g.left=f.l;g.top=f.o;g.width=h.width;g.height=h.height;f=g;g=0;if(!(g&496||(g=f,h=new M(g.left,g.top),h instanceof M?(g=h.l,h=h.o):(g=h,h=void 0),c.style.left=Eg(g,!1),c.style.top=Eg(h,!1),h=new Cc(f.width,f.height),l==h||l&&h&&l.width==h.width&&l.height==h.height)))if(l=h,g=Ie(Be(De(c)).b),!N||O("10")||g&&O("8"))f=c.style,fe?f.MozBoxSizing="border-box":ge?f.WebkitBoxSizing="border-box":f.boxSizing="border-box",f.width=Math.max(l.width,0)+"px",f.height=Math.max(l.height,
0)+"px";else if(f=c.style,g){if(N){g=Ig(c,"paddingLeft");h=Ig(c,"paddingRight");m=Ig(c,"paddingTop");var v=Ig(c,"paddingBottom");g=new zg(m,h,v,g)}else g=Bg(c,"paddingLeft"),h=Bg(c,"paddingRight"),m=Bg(c,"paddingTop"),v=Bg(c,"paddingBottom"),g=new zg(parseFloat(m),parseFloat(h),parseFloat(v),parseFloat(g));if(!N||9<=Number(oe))h=Bg(c,"borderLeftWidth"),m=Bg(c,"borderRightWidth"),v=Bg(c,"borderTopWidth"),Aa=Bg(c,"borderBottomWidth"),h=new zg(parseFloat(v),parseFloat(m),parseFloat(Aa),parseFloat(h));
else{h=Kg(c,"borderLeft");m=Kg(c,"borderRight");var v=Kg(c,"borderTop"),Aa=Kg(c,"borderBottom"),h=new zg(v,m,Aa,h)}f.pixelWidth=l.width-h.left-g.left-g.right-h.right;f.pixelHeight=l.height-h.top-g.top-g.bottom-h.bottom}else f.pixelWidth=l.width,f.pixelHeight=l.height;f=He(window);1==c.nodeType?(c=Dg(c),h=new M(c.left,c.top)):(c=c.changedTouches?c.changedTouches[0]:c,h=new M(c.clientX,c.clientY));c=Fg(d);m=Math.floor(c.width/2);l=!!(f.height<h.o+a.height);a=!!(h.o<a.height);g=!!(h.l<m);f=!!(f.width<
h.l+m);h=(c.width+3)/-2- -5;b=C(b,"force-tooltip-direction");if("left"==b||g)h=-5;else if("right"==b||f)h=20-c.width-3;b=Math.floor(h)+"px";d.style.left=b;e&&(e.style.left=b,e.style.height=c.height+"px",e.style.width=c.width+"px");return!(l||a)}
function dj(a,b,c){a=X(a);var d=b.__yt_uid_key;d||(d=pf(),b.__yt_uid_key=d);b=a+d;c&&(b+="-"+c);return b}
function gj(a,b){var c=null;he&&pd(b,X(a,"masked"))&&((c=Ee("yt-uix-tooltip-shared-mask"))?(c.parentNode.removeChild(c),Ri(c)):(c=document.createElement("iframe"),c.src='javascript:""',c.id="yt-uix-tooltip-shared-mask",c.className=X(a,"tip-mask")));return c}
function ej(a){var b=Ee("yt-uix-tooltip-shared-mask"),c=b&&Ue(b,function(b){return b==a},!1,2);
b&&c&&(b.parentNode.removeChild(b),Si(b),document.body.appendChild(b))}
;function ij(){Wi.call(this,"subscription-button")}
y(ij,Wi);ba(ij);ij.prototype.register=function(){Yi(this,"click",this.ra);Xi(this,zi,this.Ma);Xi(this,Ai,this.La);Xi(this,Bi,this.Hb);Xi(this,Ei,this.Ma);Xi(this,Fi,this.La);Xi(this,Gi,this.Jb);Xi(this,Ii,this.Ab);Xi(this,Ji,this.zb)};
ij.prototype.unregister=function(){Zi(this,"click",this.ra);ij.B.unregister.call(this)};
var Te={za:"hover-enabled",$a:"yt-uix-button-subscribe",ab:"yt-uix-button-subscribed",Zb:"ypc-enabled",bb:"yt-uix-button-subscription-container",cb:"yt-subscription-button-disabled-mask-container"},jj={$b:"channel-external-id",eb:"subscriber-count-show-when-subscribed",fb:"subscriber-count-tooltip",gb:"subscriber-count-title",ac:"href",cc:"insecure",Aa:"is-subscribed",dc:"parent-url",ec:"clicktracking",hb:"style-type",Ba:"subscription-id",fc:"target",jb:"ypc-enabled"};k=ij.prototype;
k.ra=function(a){var b=C(a,"href"),c=C(a,"insecure"),d=Oi(),c=c&&!0;if(b)a=C(a,"target")||"_self",window.open(b,a);else if(!c)if(d){b=C(a,"channel-external-id");d=C(a,"clicktracking");if(C(a,"ypc-enabled"))var c=C(a,"ypc-item-type"),e=C(a,"ypc-item-id"),c={itemType:c,itemId:e,subscriptionElement:a};else c=null;e=C(a,"parent-url");if(C(a,"is-subscribed")){var f=C(a,"subscription-id");T(Di,new vi(b,f,c,a,d,e))}else T(yi,new ti(b,c,d,e))}else kj(this,a)};
k.Ma=function(a){this.V(a.b,this.Ta,!0)};
k.La=function(a){this.V(a.b,this.Ta,!1)};
k.Hb=function(a){this.V(a.b,this.Ua,!0,a.subscriptionId)};
k.Jb=function(a){this.V(a.b,this.Ua,!1)};
k.Ab=function(a){this.V(a.b,this.pb)};
k.zb=function(a){this.V(a.b,this.nb)};
k.Ua=function(a,b,c){b?(hb(a,jj.Aa,"true"),c&&hb(a,jj.Ba,c)):(jb(a,jj.Aa),jb(a,jj.Ba));lj(a)};
k.Ta=function(a,b){var c;c=Se(a);ud(c,Te.cb,b);a.setAttribute("aria-busy",b?"true":"false");a.disabled=b};
function lj(a){var b=C(a,jj.hb),c=!!C(a,"is-subscribed"),b="-"+b,d=Te.ab+b;ud(a,Te.$a+b,!c);ud(a,d,c);C(a,jj.fb)&&!C(a,jj.eb)&&(b=X(aj.getInstance()),ud(a,b,!c),a.title=c?"":C(a,jj.gb));c?G(function(){qd(a,Te.za)},1E3):td(a,Te.za)}
k.pb=function(a){var b=!!C(a,"ypc-item-type"),c=!!C(a,"ypc-item-id");!C(a,"ypc-enabled")&&b&&c&&(qd(a,"ypc-enabled"),hb(a,jj.jb,"true"))};
k.nb=function(a){C(a,"ypc-enabled")&&(td(a,"ypc-enabled"),jb(a,"ypc-enabled"))};
function mj(a,b){return wa(Fe(X(a)),function(a){return b==C(a,"channel-external-id")},a)}
k.kb=function(a,b,c){var d=Ja(arguments,2);z(a,function(a){b.apply(this,Fa(a,d))},this)};
k.V=function(a,b,c){var d=mj(this,a);this.kb.apply(this,Fa([d],Ja(arguments,1)))};
function kj(a,b){a=w(function(a){a.discoverable_subscriptions&&Fb("SUBSCRIBE_EMBED_DISCOVERABLE_SUBSCRIPTIONS",a.discoverable_subscriptions);this.ra(b)},a);
Ni(a,"subscribe")}
;var nj=window.yt&&window.yt.uix&&window.yt.uix.widgets_||{};q("yt.uix.widgets_",nj,void 0);function oj(a){return(0==a.search("cue")||0==a.search("load"))&&"loadModule"!=a}
function pj(a,b,c){u(a)&&(a={mediaContentUrl:a,startSeconds:b,suggestedQuality:c});b=/\/([ve]|embed)\/([^#?]+)/.exec(a.mediaContentUrl);a.videoId=b&&b[2]?b[2]:null;return qj(a)}
function qj(a,b,c){if(ga(a)){b="endSeconds startSeconds mediaContentUrl suggestedQuality videoId two_stage_token".split(" ");c={};for(var d=0;d<b.length;d++){var e=b[d];a[e]&&(c[e]=a[e])}return c}return{videoId:a,startSeconds:b,suggestedQuality:c}}
function rj(a,b,c,d){if(ga(a)&&!da(a)){b="playlist list listType index startSeconds suggestedQuality".split(" ");c={};for(d=0;d<b.length;d++){var e=b[d];a[e]&&(c[e]=a[e])}return c}c={index:b,startSeconds:c,suggestedQuality:d};u(a)&&16==a.length?c.list="PL"+a:c.playlist=a;return c}
function sj(a){var b=a.video_id||a.videoId;if(u(b)){var c=Qf()||{},d=Qf()||{};p(void 0)?d[b]=void 0:delete d[b];var e=x()+3E5,f=Sf;if(f&&window.JSON){u(d)||(d=JSON.stringify(d,void 0));try{f.set("yt-player-two-stage-token",d,e)}catch(g){f.remove("yt-player-two-stage-token")}}(b=c[b])&&(a.two_stage_token=b)}}
;var tj=null,uj=[];function vj(a){return{externalChannelId:a.externalChannelId,yb:!!a.isChannelPaid,source:a.source,subscriptionId:a.subscriptionId}}
function wj(a){xj(vj(a))}
function xj(a){Oi()?(T(yi,new ti(a.externalChannelId,a.yb?{itemType:"U",itemId:a.externalChannelId}:null)),(a="/gen_204?"+gd({event:"subscribe",source:a.source}))&&vh(a)):yj(a)}
function yj(a){Ni(function(b){b.subscription_ajax&&xj(a)},null)}
function zj(a){a=vj(a);T(Di,new vi(a.externalChannelId,a.subscriptionId,null));(a="/gen_204?"+gd({event:"unsubscribe",source:a.source}))&&vh(a)}
function Aj(a){tj&&tj.channelSubscribed(a.b,a.subscriptionId)}
function Bj(a){tj&&tj.channelUnsubscribed(a.b)}
;function Cj(a){D.call(this);this.g=a;this.g.subscribe("command",this.Qa,this);this.i={};this.j=!1}
y(Cj,D);k=Cj.prototype;k.start=function(){this.j||this.f||(this.j=!0,Dj(this.g,"RECEIVING"))};
k.Xa=aa;k.addEventListener=aa;k.removeEventListener=aa;k.Qa=function(a,b){if(this.j&&!this.f){var c=b||{};switch(a){case "addEventListener":u(c.event)&&(a=c.event,a in this.i||(b=w(this.Pb,this,a),this.i[a]=b,this.addEventListener(a,b)));break;case "removeEventListener":u(c.event)&&Ej(this,c.event);break;default:this.Xa(a,b)}}};
k.Pb=function(a,b){this.j&&!this.f&&Dj(this.g,a,this.sa(a,b))};
k.sa=function(a,b){if(null!=b)return{value:b}};
function Ej(a,b){b in a.i&&(a.removeEventListener(b,a.i[b]),delete a.i[b])}
k.A=function(){this.g.unsubscribe("command",this.Qa,this);this.g=null;for(var a in this.i)Ej(this,a);Cj.B.A.call(this)};function Fj(a,b){Cj.call(this,b);this.b=a;this.start()}
y(Fj,Cj);k=Fj.prototype;k.addEventListener=function(a,b){this.b.addEventListener(a,b)};
k.removeEventListener=function(a,b){this.b.removeEventListener(a,b)};
k.Xa=function(a,b){this.b.isReady()&&this.b[a]&&(b=Gj(a,b||{}),b=this.b[a].apply(this.b,b),(b=Hj(a,b))&&this.j&&!this.f&&Dj(this.g,a,b))};
function Gj(a,b){switch(a){case "loadVideoById":return b=qj(b),sj(b),[b];case "cueVideoById":return b=qj(b),sj(b),[b];case "loadVideoByPlayerVars":return sj(b),[b];case "cueVideoByPlayerVars":return sj(b),[b];case "loadPlaylist":return b=rj(b),sj(b),[b];case "cuePlaylist":return b=rj(b),sj(b),[b];case "seekTo":return[b.seconds,b.allowSeekAhead];case "playVideoAt":return[b.index];case "setVolume":return[b.volume];case "setPlaybackQuality":return[b.suggestedQuality];case "setPlaybackRate":return[b.suggestedRate];
case "setLoop":return[b.loopPlaylists];case "setShuffle":return[b.shufflePlaylist];case "getOptions":return[b.module];case "getOption":return[b.module,b.option];case "setOption":return[b.module,b.option,b.value];case "handleGlobalKeyDown":return[b.keyCode,b.shiftKey]}return[]}
function Hj(a,b){switch(a){case "isMuted":return{muted:b};case "getVolume":return{volume:b};case "getPlaybackRate":return{playbackRate:b};case "getAvailablePlaybackRates":return{availablePlaybackRates:b};case "getVideoLoadedFraction":return{videoLoadedFraction:b};case "getPlayerState":return{playerState:b};case "getCurrentTime":return{currentTime:b};case "getPlaybackQuality":return{playbackQuality:b};case "getAvailableQualityLevels":return{availableQualityLevels:b};case "getDuration":return{duration:b};
case "getVideoUrl":return{videoUrl:b};case "getVideoEmbedCode":return{videoEmbedCode:b};case "getPlaylist":return{playlist:b};case "getPlaylistIndex":return{playlistIndex:b};case "getOptions":return{options:b};case "getOption":return{option:b}}}
k.sa=function(a,b){switch(a){case "onReady":return;case "onStateChange":return{playerState:b};case "onPlaybackQualityChange":return{playbackQuality:b};case "onPlaybackRateChange":return{playbackRate:b};case "onError":return{errorCode:b}}return Fj.B.sa.call(this,a,b)};
k.A=function(){Fj.B.A.call(this);delete this.b};function Ij(a,b,c,d){D.call(this);this.i=b||null;this.G="*";this.j=c||null;this.b=null;this.channel=d||null;this.O=!!a;this.L=w(this.P,this);window.addEventListener("message",this.L)}
y(Ij,D);Ij.prototype.P=function(a){if(!("*"!=this.j&&a.origin!=this.j||this.i&&a.source!=this.i)&&u(a.data)){var b;try{b=uc(a.data)}catch(c){return}null!=b&&(this.O&&(this.b&&this.b!=b.id||this.channel&&this.channel!=b.channel)||b&&this.J(a,b))}};
Ij.prototype.J=aa;Ij.prototype.sendMessage=function(a,b){if(b=b||this.i){this.b&&(a.id=this.b);this.channel&&(a.channel=this.channel);try{var c=wc(a);b.postMessage(c,this.G)}catch(d){Jb(d,"WARNING")}}};
Ij.prototype.A=function(){window.removeEventListener("message",this.L);Ij.B.A.call(this)};function Jj(a,b,c){Ij.call(this,a,b,c||F("POST_MESSAGE_ORIGIN",void 0)||window.document.location.protocol+"//"+window.document.location.hostname,"widget");this.D=this.g=this.w=null}
y(Jj,Ij);Jj.prototype.J=function(a,b){switch(b.event){case "listening":"null"!=a.origin?this.j=this.G=a.origin:Jb(Error("MessageEvent origin is null"),"WARNING");this.i=a.source;this.b=b.id;this.g&&(this.g(),this.g=null);break;case "command":this.w&&(this.D&&!Da(this.D,b.func)||this.w(b.func,b.args))}};function Kj(){var a=this.f=new Jj(!!F("WIDGET_ID_ENFORCE")),b=w(this.Mb,this);a.w=b;a.D=null;this.f.channel="widget";if(a=F("WIDGET_ID"))this.f.b=a;this.i=[];this.w=!1;this.j={}}
k=Kj.prototype;k.Mb=function(a,b){"addEventListener"==a&&b?(a=b[0],this.j[a]||"onReady"==a||(this.addEventListener(a,Lj(this,a)),this.j[a]=!0)):this.Ya(a,b)};
k.Ya=function(){};
function Lj(a,b){return w(function(a){this.sendMessage(b,a)},a)}
k.addEventListener=function(){};
k.qb=function(){this.w=!0;this.sendMessage("initialDelivery",this.ta());this.sendMessage("onReady");z(this.i,this.Sa,this);this.i=[]};
k.ta=function(){return null};
function Mj(a,b){a.sendMessage("infoDelivery",b)}
k.Sa=function(a){this.w?this.f.sendMessage(a):this.i.push(a)};
k.sendMessage=function(a,b){this.Sa({event:a,info:void 0==b?null:b})};
k.dispose=function(){this.f=null};function Nj(a){Kj.call(this);this.b=a;this.g=[];this.addEventListener("onReady",w(this.Gb,this));this.addEventListener("onVideoProgress",w(this.Tb,this));this.addEventListener("onVolumeChange",w(this.Ub,this));this.addEventListener("onApiChange",w(this.Ob,this));this.addEventListener("onPlaybackQualityChange",w(this.Qb,this));this.addEventListener("onPlaybackRateChange",w(this.Rb,this));this.addEventListener("onStateChange",w(this.Sb,this))}
y(Nj,Kj);k=Nj.prototype;k.Ya=function(a,b){if(this.b[a]){b=b||[];if(0<b.length&&oj(a)){var c;c=b;if(ga(c[0])&&!da(c[0]))c=c[0];else{var d={};switch(a){case "loadVideoById":case "cueVideoById":d=qj.apply(window,c);break;case "loadVideoByUrl":case "cueVideoByUrl":d=pj.apply(window,c);break;case "loadPlaylist":case "cuePlaylist":d=rj.apply(window,c)}c=d}sj(c);b.length=1;b[0]=c}this.b[a].apply(this.b,b);oj(a)&&Mj(this,this.ta())}};
k.Gb=function(){var a=w(this.qb,this);this.f.g=a};
k.addEventListener=function(a,b){this.g.push({eventType:a,listener:b});this.b.addEventListener(a,b)};
k.ta=function(){if(!this.b)return null;var a=this.b.getApiInterface();Ea(a,"getVideoData");for(var b={apiInterface:a},c=0,d=a.length;c<d;c++){var e=a[c],f=e;if(0==f.search("get")||0==f.search("is")){var f=e,g=0;0==f.search("get")?g=3:0==f.search("is")&&(g=2);f=f.charAt(g).toLowerCase()+f.substr(g+1);try{var l=this.b[e]();b[f]=l}catch(h){}}}b.videoData=this.b.getVideoData();b.currentTimeLastUpdated_=x()/1E3;return b};
k.Sb=function(a){a={playerState:a,currentTime:this.b.getCurrentTime(),duration:this.b.getDuration(),videoData:this.b.getVideoData(),videoStartBytes:0,videoBytesTotal:this.b.getVideoBytesTotal(),videoLoadedFraction:this.b.getVideoLoadedFraction(),playbackQuality:this.b.getPlaybackQuality(),availableQualityLevels:this.b.getAvailableQualityLevels(),videoUrl:this.b.getVideoUrl(),playlist:this.b.getPlaylist(),playlistIndex:this.b.getPlaylistIndex(),currentTimeLastUpdated_:x()/1E3,playbackRate:this.b.getPlaybackRate(),
mediaReferenceTime:this.b.getMediaReferenceTime()};this.b.getProgressState&&(a.progressState=this.b.getProgressState());this.b.getStoryboardFormat&&(a.storyboardFormat=this.b.getStoryboardFormat());Mj(this,a)};
k.Qb=function(a){Mj(this,{playbackQuality:a})};
k.Rb=function(a){Mj(this,{playbackRate:a})};
k.Ob=function(){for(var a=this.b.getOptions(),b={namespaces:a},c=0,d=a.length;c<d;c++){var e=a[c],f=this.b.getOptions(e);b[e]={options:f};for(var g=0,l=f.length;g<l;g++){var h=f[g],m=this.b.getOption(e,h);b[e][h]=m}}this.sendMessage("apiInfoDelivery",b)};
k.Ub=function(){Mj(this,{muted:this.b.isMuted(),volume:this.b.getVolume()})};
k.Tb=function(a){a={currentTime:a,videoBytesLoaded:this.b.getVideoBytesLoaded(),videoLoadedFraction:this.b.getVideoLoadedFraction(),currentTimeLastUpdated_:x()/1E3,playbackRate:this.b.getPlaybackRate(),mediaReferenceTime:this.b.getMediaReferenceTime()};this.b.getProgressState&&(a.progressState=this.b.getProgressState());Mj(this,a)};
k.dispose=function(){Nj.B.dispose.call(this);for(var a=0;a<this.g.length;a++){var b=this.g[a];this.b.removeEventListener(b.eventType,b.listener)}this.g=[]};function Oj(){D.call(this);this.b=new E;zb(this,na(Ab,this.b))}
y(Oj,D);Oj.prototype.subscribe=function(a,b,c){return this.f?0:this.b.subscribe(a,b,c)};
Oj.prototype.unsubscribe=function(a,b,c){return this.f?!1:this.b.unsubscribe(a,b,c)};
Oj.prototype.T=function(a){return this.f?!1:this.b.T(a)};
Oj.prototype.N=function(a,b){return this.f?!1:this.b.N.apply(this.b,arguments)};function Pj(a,b,c){Oj.call(this);this.g=a;this.i=b;this.j=c}
y(Pj,Oj);function Dj(a,b,c){if(!a.f){var d=a.g;d.f||a.i!=d.b||(a={id:a.j,command:b},c&&(a.data=c),d.b.postMessage(wc(a),d.i))}}
Pj.prototype.A=function(){this.i=this.g=null;Pj.B.A.call(this)};function Qj(a,b,c){D.call(this);this.b=a;this.i=c;this.j=Q(window,"message",w(this.w,this));this.g=new Pj(this,a,b);zb(this,na(Ab,this.g))}
y(Qj,D);Qj.prototype.w=function(a){var b;if(b=!this.f)if(b=a.origin==this.i)a:{b=this.b;do{var c;b:{c=a.source;do{if(c==b){c=!0;break b}if(c==c.parent)break;c=c.parent}while(null!=c);c=!1}if(c){b=!0;break a}b=b.opener}while(null!=b);b=!1}if(b&&(a=a.data,u(a))){try{a=uc(a)}catch(d){return}a.command&&(b=this.g,b.f||b.N("command",a.command,a.data))}};
Qj.prototype.A=function(){yf(this.j);this.b=null;Qj.B.A.call(this)};var Rj=document,Y=window;var Sj=!1,Tj="";function Uj(a){a=a.match(/[\d]+/g);if(!a)return"";a.length=3;return a.join(".")}
(function(){if(navigator.plugins&&navigator.plugins.length){var a=navigator.plugins["Shockwave Flash"];if(a&&(Sj=!0,a.description)){Tj=Uj(a.description);return}if(navigator.plugins["Shockwave Flash 2.0"]){Sj=!0;Tj="2.0.0.11";return}}if(navigator.mimeTypes&&navigator.mimeTypes.length&&(a=navigator.mimeTypes["application/x-shockwave-flash"],Sj=!(!a||!a.enabledPlugin))){Tj=Uj(a.enabledPlugin.description);return}try{var b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");Sj=!0;Tj=Uj(b.GetVariable("$version"));
return}catch(c){}try{b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");Sj=!0;Tj="6.0.21";return}catch(c){}try{b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"),Sj=!0,Tj=Uj(b.GetVariable("$version"))}catch(c){}})();
var Vj=Sj,Wj=Tj;function Xj(a){return(a=a.exec(A))?a[1]:""}
(function(){if(ve)return Xj(/Firefox\/([0-9.]+)/);if(N||ee||de)return ne;if(ze)return Xj(/Chrome\/([0-9.]+)/);if(Ae&&!(Xc()||B("iPad")||B("iPod")))return Xj(/Version\/([0-9.]+)/);if(we||xe){var a=/Version\/(\S+).*Mobile\/(\S+)/.exec(A);if(a)return a[1]+"."+a[2]}else if(ye)return(a=Xj(/Android\s+([0-9.]+)/))?a:Xj(/Version\/([0-9.]+)/);return""})();(function(){var a=!1;try{var b=Object.defineProperty({},"passive",{get:function(){a=!0}});
window.addEventListener("test",null,b)}catch(c){}return a})();function Yj(a){Zj();this.enabled=Math.random()<a;this.events=[]}
var Zj=n.performance&&n.performance.now?w(n.performance.now,n.performance):x;function ak(a){Yj.call(this,a)}
y(ak,Yj);new ak(1E-4);var bk=(new Date).getTime();function ck(){var a=Qa(dk);return new P(function(b,c){a.F=function(a){Qc(a)?b(a):c(new ek("Request failed, status="+a.status,"net.badstatus"))};
a.onError=function(){c(new ek("Unknown request error","net.unknown"))};
a.R=function(){c(new ek("Request timed out","net.timeout"))};
Kf("//googleads.g.doubleclick.net/pagead/id",a)})}
function ek(a,b){pa.call(this,a+", errorCode="+b);this.errorCode=b}
y(ek,pa);ek.prototype.name="PromiseAjaxError";function fk(a){pa.call(this,a.message||a.description||a.name);this.b=a instanceof bf}
y(fk,pa);fk.prototype.name="BiscottiError";function gk(a,b){this.f=a;this.b=b}
gk.prototype.then=function(a,b,c){try{if(p(this.f))return a?Ze(a.call(c,this.f)):Ze(this.f);if(p(this.b)){if(!b)return $e(this.b);var d=b.call(c,this.b);return!p(d)&&this.b.b?$e(this.b):Ze(d)}throw Error("Invalid Result_ state");}catch(e){return $e(e)}};
Gc(gk);var dk={format:"RAW",method:"GET",timeout:5E3,withCredentials:!0},hk=null;function ik(a){a=a.responseText;if(0!=a.lastIndexOf(")]}'",0))return jk(""),hk=new gk(""),"";a=JSON.parse(a.substr(4)).id;jk(a);hk=new gk(a);kk(18E5,2);return a}
function lk(a,b){b=new fk(b);jk("");hk=new gk(void 0,b);0<a&&kk(12E4,a-1);throw b;}
function kk(a,b){G(function(){var a=w(lk,n,b),a=ck().then(ik,a);af(a,null,t,void 0)},a)}
function jk(a){q("yt.www.ads.biscotti.lastId_",a,void 0)}
;function mk(){}
function nk(){try{var a;try{var b=r("yt.www.ads.biscotti.getId_"),c;if(b)c=b();else{if(!hk){var d=w(lk,n,2);hk=ck().then(ik,d)}c=hk}a=c}catch(e){a=$e(e)}a.then(ok,mk);G(nk,18E5)}catch(e){Jb(e)}}
function ok(a){var b;a:{try{b=window.top.location.href}catch(v){b=2;break a}b=null!=b?b==window.document.location.href?0:1:2}b={dt:bk,flash:Wj||"0",frm:b};b.u_tz=-(new Date).getTimezoneOffset();var c;try{c=Y.history.length}catch(v){c=0}b.u_his=c;b.u_java=!!Y.navigator&&"unknown"!==typeof Y.navigator.javaEnabled&&!!Y.navigator.javaEnabled&&Y.navigator.javaEnabled();Y.screen&&(b.u_h=Y.screen.height,b.u_w=Y.screen.width,b.u_ah=Y.screen.availHeight,b.u_aw=Y.screen.availWidth,b.u_cd=Y.screen.colorDepth);
Y.navigator&&Y.navigator.plugins&&(b.u_nplug=Y.navigator.plugins.length);Y.navigator&&Y.navigator.mimeTypes&&(b.u_nmime=Y.navigator.mimeTypes.length);b.bid=a;b.ca_type=Vj?"flash":"image";if(J("enable_server_side_search_pyv")||J("enable_server_side_mweb_search_pyv")){var d;a=window;try{d=a.screenX;var e=a.screenY}catch(v){}try{var f=a.outerWidth,g=a.outerHeight}catch(v){}try{var l=a.innerWidth,h=a.innerHeight}catch(v){}d=[a.screenLeft,a.screenTop,d,e,a.screen?a.screen.availWidth:void 0,a.screen?a.screen.availTop:
void 0,f,g,l,h];var m;e=window.top||Y;try{m=e.document&&!e.document.body?new Cc(-1,-1):He(e||window).round()}catch(v){m=new Cc(-12245933,-12245933)}e=0;window.SVGElement&&document.createElementNS&&(e|=1);oa(b,{bc:e,bih:m.height,biw:m.width,brdim:d.join(),vis:{visible:1,hidden:2,prerender:3,preview:4}[Rj.webkitVisibilityState||Rj.mozVisibilityState||Rj.visibilityState||""]||0,wgl:!!Y.WebGLRenderingContext})}Jf("/ad_data_204",{ub:!0,C:b})}
;function pk(){this.b=F("ALT_PREF_COOKIE_NAME","PREF");var a;if(a=Fc.get(""+this.b,void 0)){a=unescape(a).split("&");for(var b=0;b<a.length;b++){var c=a[b].split("="),d=c[0];(c=c[1])&&(Z[d]=c.toString())}}}
ba(pk);var Z=r("yt.prefs.UserPrefs.prefs_")||{};q("yt.prefs.UserPrefs.prefs_",Z,void 0);function qk(a){if(/^f([1-9][0-9]*)$/.test(a))throw"ExpectedRegexMatch: "+a;}
function rk(a){if(!/^\w+$/.test(a))throw"ExpectedRegexMismatch: "+a;}
function sk(a){a=void 0!==Z[a]?Z[a].toString():null;return null!=a&&/^[A-Fa-f0-9]+$/.test(a)?parseInt(a,16):null}
pk.prototype.get=function(a,b){rk(a);qk(a);a=void 0!==Z[a]?Z[a].toString():null;return null!=a?a:b?b:""};
pk.prototype.set=function(a,b){rk(a);qk(a);if(null==b)throw"ExpectedNotNull";Z[a]=b.toString()};
pk.prototype.remove=function(a){rk(a);qk(a);delete Z[a]};
pk.prototype.clear=function(){Z={}};function tk(a){for(var b=0;b<a.length;b++){var c=a[b];"send_follow_on_ping_action"==c.name&&c.data&&c.data.follow_on_url&&(c=c.data.follow_on_url)&&vh(c)}}
;function uk(a){R.call(this,1,arguments);this.qa=a}
y(uk,R);function vk(a,b){R.call(this,2,arguments);this.f=a;this.b=b}
y(vk,R);function wk(a,b,c,d){R.call(this,1,arguments);this.b=b;this.f=c||null;this.itemId=d||null}
y(wk,R);function xk(a,b){R.call(this,1,arguments);this.f=a;this.b=b||null}
y(xk,R);function yk(a){R.call(this,1,arguments)}
y(yk,R);var zk=new S("ypc-core-load",uk),Ak=new S("ypc-guide-sync-success",vk),Bk=new S("ypc-purchase-success",wk),Ck=new S("ypc-subscription-cancel",yk),Dk=new S("ypc-subscription-cancel-success",xk),Ek=new S("ypc-init-subscription",yk);var Fk=!1,Gk=[],Hk=[];function Ik(a){a.b?Fk?T(Ci,a):T(zk,new uk(function(){T(Ek,new yk(a.b))})):Jk(a.f,a.i,a.g,a.source)}
function Kk(a){a.b?Fk?T(Hi,a):T(zk,new uk(function(){T(Ck,new yk(a.b))})):Lk(a.f,a.subscriptionId,a.i,a.g,a.source)}
function Mk(a){Nk(Ga(a.b))}
function Ok(a){Pk(Ga(a.b))}
function Qk(a){Rk(a.g,a.f,a.b)}
function Sk(a){var b=a.itemId,c=a.b.subscriptionId;b&&c&&T(Bi,new ui(b,c,a.b.channelInfo))}
function Tk(a){var b=a.b;Ka(a.f,function(a,d){T(Bi,new ui(d,a,b[d]))})}
function Uk(a){T(Gi,new V(a.f.itemId));a.b&&a.b.length&&(Vk(a.b,Gi),Vk(a.b,Ii))}
function Jk(a,b,c,d){var e=new V(a);T(zi,e);var f={};f.c=a;c&&(f.eurl=c);d&&(f.source=d);c={};(d=F("PLAYBACK_ID"))&&(c.plid=d);(d=F("EVENT_ID"))&&(c.ei=d);b&&Wk(b,c);Kf("/subscription_ajax?action_create_subscription_to_channel=1",{method:"POST",xa:f,C:c,F:function(b,c){b=c.response;T(Bi,new ui(a,b.id,b.channel_info));b.show_feed_privacy_dialog&&Ub("SHOW-FEED-PRIVACY-SUBSCRIBE-DIALOG",a);b.actions&&tk(b.actions)},
wa:function(){T(Ai,e)}})}
function Lk(a,b,c,d,e){var f=new V(a);T(Ei,f);var g={};d&&(g.eurl=d);e&&(g.source=e);d={};d.c=a;d.s=b;(a=F("PLAYBACK_ID"))&&(d.plid=a);(a=F("EVENT_ID"))&&(d.ei=a);c&&Wk(c,d);Kf("/subscription_ajax?action_remove_subscriptions=1",{method:"POST",xa:g,C:d,F:function(a,b){a=b.response;T(Gi,f);a.actions&&tk(a.actions)},
wa:function(){T(Fi,f)}})}
function Rk(a,b,c){if(a){var d={};d.channel_id=a;switch(b){case "receive-all-updates":d.receive_all_updates=!0;break;case "receive-no-updates":d.receive_no_updates=!0;d.receive_post_updates=!1;break;case "receive-highlight-updates":d.receive_all_updates=!1;d.receive_no_updates=!1;break;default:return}null===c||d.receive_no_updates||(d.receive_post_updates=c);var e=new si(a,b,c);Kf("/subscription_ajax?action_update_subscription_preferences=1",{method:"POST",C:d,onError:function(){T(Mi,e)},
F:function(){T(Li,e)}})}}
function Nk(a){if(a.length){var b=Ia(a,0,40);T("subscription-batch-subscribe-loading");Vk(b,zi);var c={};c.a=b.join(",");var d=function(){T("subscription-batch-subscribe-loaded");Vk(b,Ai)};
Kf("/subscription_ajax?action_create_subscription_to_all=1",{method:"POST",C:c,F:function(c,f){d();c=f.response;f=c.id;if(da(f)&&f.length==b.length){var e=c.channel_info_map;z(f,function(a,c){c=b[c];T(Bi,new ui(c,a,e[c]))});
a.length?Nk(a):T("subscription-batch-subscribe-finished")}},
onError:function(){d();T("subscription-batch-subscribe-failure")}})}}
function Pk(a){if(a.length){var b=Ia(a,0,40);T("subscription-batch-unsubscribe-loading");Vk(b,Ei);var c={};c.c=b.join(",");var d=function(){T("subscription-batch-unsubscribe-loaded");Vk(b,Fi)};
Kf("/subscription_ajax?action_remove_subscriptions=1",{method:"POST",C:c,F:function(){d();Vk(b,Gi);a.length&&Pk(a)},
onError:function(){d()}})}}
function Vk(a,b){z(a,function(a){T(b,new V(a))})}
function Wk(a,b){a=wd(a);oa(b,a)}
;var Xk=null,Yk=null,Zk=null,$k={};function al(a){var b=a.id;a=a.ve_type;var c=Nc++;a=new Mc(void 0,a,c);$k[b]=a;b=lg();c=kg();b&&c&&fg(b,c,a)}
function bl(a){var b=a.csn;a=a.root_ve_type;if(b&&a&&(Fb("client-screen-nonce",b),Fb("ROOT_VE_TYPE",a),a=kg()))for(var c in $k)fg(b,a,$k[c])}
function cl(a){$k[a.id]=new Mc(a.tracking_params)}
function dl(a){var b=lg();a=$k[a.id];b&&a&&gg(hg(),{click:{csn:b,visualElement:Oc(a)}},void 0)}
function el(a){a=a.ids;var b=lg();if(b){for(var c=[],d=0;d<a.length;d++){var e=$k[a[d]];e&&c.push(e)}c.length&&ig(b,c)}}
function fl(){var a=Xk.startInteractionLogging;a&&a()}
;q("yt.setConfig",Fb,void 0);q("yt.setMsg",function(a){Gb(Eb,arguments)},void 0);
q("yt.logging.errors.log",function(a,b,c,d,e){c={name:c||F("INNERTUBE_CONTEXT_CLIENT_NAME",1),version:d||F("INNERTUBE_CONTEXT_CLIENT_VERSION",void 0)};e=window&&window.yterr||e||!1;if(a&&e&&!(5<=eg)){e=a.stacktrace;d=a.columnNumber;var f=r("window.location.href");if(u(a))a={message:a,name:"Unknown error",lineNumber:"Not available",fileName:f,stack:"Not available"};else{var g,l,h=!1;try{g=a.lineNumber||a.jc||"Not available"}catch(Aa){g="Not available",h=!0}try{l=a.fileName||a.filename||a.sourceURL||
n.$googDebugFname||f}catch(Aa){l="Not available",h=!0}a=!h&&a.lineNumber&&a.fileName&&a.stack&&a.message&&a.name?a:{message:a.message||"Not available",name:a.name||"UnknownError",lineNumber:g,fileName:l,stack:a.stack||"Not available"}}e=e||a.stack;g=a.lineNumber.toString();isNaN(g)||isNaN(d)||(g=g+":"+d);if(!(dg[a.message]||0<=e.indexOf("/YouTubeCenter.js")||0<=e.indexOf("/mytube.js"))){b={xa:{a:"logerror",t:"jserror",type:a.name,msg:a.message.substr(0,1E3),line:g,level:b||"ERROR"},C:{url:F("PAGE_NAME",
window.location.href),file:a.fileName},method:"POST"};e&&(b.C.stack=e);for(var m in c)b.C["client."+m]=c[m];if(m=F("LATEST_ECATCHER_SERVICE_TRACKING_PARAMS",void 0))for(var v in m)b.C[v]=m[v];Kf("/error_204",b);dg[a.message]=!0;eg++}}},void 0);
q("writeEmbed",function(){var a=F("PLAYER_CONFIG",void 0);"1"!=a.privembed&&nk();"gvn"==a.args.ps&&(document.body.style.backgroundColor="transparent");var b=document.referrer,c=F("POST_MESSAGE_ORIGIN");window!=window.top&&b&&b!=document.URL&&(a.args.loaderUrl=b);F("LIGHTWEIGHT_AUTOPLAY")&&(a.args.autoplay="1");a.args.autoplay&&sj(a.args);Xk=b=fi("player",a);b.addEventListener("onScreenChanged",bl);b.addEventListener("onLogClientVeCreated",al);b.addEventListener("onLogServerVeCreated",cl);b.addEventListener("onLogVeClicked",
dl);b.addEventListener("onLogVesShown",el);b.addEventListener("onReady",fl);var d=F("POST_MESSAGE_ID","player");F("ENABLE_JS_API")?Zk=new Nj(b):F("ENABLE_POST_API")&&u(d)&&u(c)&&(Yk=new Qj(window.parent,d,c),Zk=new Fj(b,Yk.g));F("ENABLE_CAST_API")||(a.args.enablecastapi="0");F("BG_P")&&(F("BG_I")||F("BG_IU"))&&fc();pg();tj=b;tj.addEventListener("SUBSCRIBE",wj);tj.addEventListener("UNSUBSCRIBE",zj);uj.push(U(Bi,Aj),U(Gi,Bj))},void 0);
q("yt.www.watch.ads.restrictioncookie.spr",function(a){(a+="mac_204?action_fcts=1")&&vh(a);return!0},void 0);
var gl=Hb(function(){Bh("ol");Fk=!0;Hk.push(U(yi,Ik),U(Di,Kk));Fk||Hk.push(U(Ci,Ik),U(Hi,Kk),U(wi,Mk),U(xi,Ok),U(Ki,Qk),U(Bk,Sk),U(Dk,Uk),U(Ak,Tk));var a=pk.getInstance(),b=1<window.devicePixelRatio;if(!!((sk("f"+(Math.floor(119/31)+1))||0)&67108864)!=b){var c="f"+(Math.floor(119/31)+1),d=sk(c)||0,d=b?d|67108864:d&-67108865;0==d?delete Z[c]:Z[c]=d.toString(16).toString();var a=a.b,b=[],e;for(e in Z)b.push(e+"="+escape(Z[e]));Fc.set(""+a,b.join("&"),63072E3,"/","youtube.com")}}),hl=Hb(function(){var a=
Xk;
a&&a.sendAbandonmentPing&&a.sendAbandonmentPing();F("PL_ATT")&&(ec=null);for(var a=0,b=ng.length;a<b;a++){var c=ng[a];if(!isNaN(c)){var d=r("yt.scheduler.instance.cancelJob");d?d(c):Ib(c)}}ng.length=0;a=ac("//static.doubleclick.net/instream/ad_status.js");if(b=document.getElementById(a))Wb(a),b.parentNode.removeChild(b);og=!1;Fb("DCLKSTAT",0);Tb(Gk);Gk.length=0;sh(Hk);Hk.length=0;Fk=!1;tj&&(tj.removeEventListener("SUBSCRIBE",xj),tj.removeEventListener("UNSUBSCRIBE",zj));tj=null;sh(uj);uj.length=0;
Bb(Zk,Yk);if(a=Xk)a.removeEventListener("onScreenChanged",bl),a.removeEventListener("onLogClientVeCreated",al),a.removeEventListener("onLogServerVeCreated",cl),a.removeEventListener("onLogVeClicked",dl),a.removeEventListener("onLogVesShown",el),a.removeEventListener("onReady",fl),a.destroy();$k={}});
window.addEventListener?(window.addEventListener("load",gl),window.addEventListener("unload",hl)):window.attachEvent&&(window.attachEvent("onload",gl),window.attachEvent("onunload",hl));var il=ij.getInstance(),jl=X(il);jl in nj||(il.register(),il.ka.push(Rb("yt-uix-init-"+jl,il.init,il)),il.ka.push(Rb("yt-uix-dispose-"+jl,il.dispose,il)),nj[jl]=il);})();
