/*
 * Pixastic Lib - Core Functions - v0.1.2
 * Copyright (c) 2008 Jacob Seidelin, cupboy@gmail.com, http://blog.nihilogic.dk/
 * MIT License [http://www.opensource.org/licenses/mit-license.php]
 */

var Pixastic = (function() {


	function addEvent(el, event, handler) {
		if (el.addEventListener)
			el.addEventListener(event, handler, false); 
		else if (el.attachEvent)
			el.attachEvent("on" + event, handler); 
	}

	function onready(handler) {
		var handlerDone = false;
		var execHandler = function() {
			if (!handlerDone) {
				handlerDone = true;
				handler();
			}
		}
		document.write("<"+"script defer src=\"//:\" id=\"__onload_ie_sumbox__\"></"+"script>");
		var script = document.getElementById("__onload_ie_sumbox__");
		script.onreadystatechange = function() {
			if (script.readyState == "complete") {
				script.parentNode.removeChild(script);
				execHandler();
			}
		}
		if (document.addEventListener)
			document.addEventListener("DOMContentLoaded", execHandler, false); 
		addEvent(window, "load", execHandler);
	}

	function init() {
		if (!Pixastic.parseOnLoad) return;
		var imgEls = getElementsByClass("pixastic", null, "img");
		var canvasEls = getElementsByClass("pixastic", null, "canvas");
		var elements = imgEls.concat(canvasEls);
		for (var i=0;i<elements.length;i++) {
			(function() {

			var el = elements[i];
			var actions = [];
			var classes = el.className.split(" ");
			for (var c=0;c<classes.length;c++) {
				var cls = classes[c];
				if (cls.substring(0,9) == "pixastic-") {
					var actionName = cls.substring(9);
					if (actionName != "")
						actions.push(actionName);
				}
			}
			if (actions.length) {
				if (el.tagName.toLowerCase() == "img") {
					var dataImg = new Image();
					dataImg.src = el.src;
					if (dataImg.complete) {
						for (var a=0;a<actions.length;a++) {
							var res = Pixastic.applyAction(el, el, actions[a], null);
							if (res) 
								el = res;
						}
					} else {
						dataImg.onload = function() {
							for (var a=0;a<actions.length;a++) {
								var res = Pixastic.applyAction(el, el, actions[a], null)
								if (res) 
									el = res;
							}
						}
					}
				} else {
					setTimeout(function() {
						for (var a=0;a<actions.length;a++) {
							var res = Pixastic.applyAction(
								el, el, actions[a], null
							);
							if (res) 
								el = res;
						}
					},1);
				}
			}

			})();
		}
	}

	onready(init);

	// getElementsByClass by Dustin Diaz, http://www.dustindiaz.com/getelementsbyclass/
	function getElementsByClass(searchClass,node,tag) {
	        var classElements = new Array();
	        if ( node == null )
	                node = document;
	        if ( tag == null )
	                tag = '*';

	        var els = node.getElementsByTagName(tag);
	        var elsLen = els.length;
	        var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	        for (i = 0, j = 0; i < elsLen; i++) {
	                if ( pattern.test(els[i].className) ) {
	                        classElements[j] = els[i];
	                        j++;
	                }
	        }
	        return classElements;
	}

	var debugElement;

	function writeDebug(text, level) {
		if (!Pixastic.debug) return;
		try {
			switch (level) {
				case "warn" : 
					console.warn("Pixastic:", text);
					break;
				case "error" :
					console.error("Pixastic:", text);
					break;
				default:
					console.log("Pixastic:", text);
			}
		} catch(e) {
		}
		if (!debugElement) {
			
		}
	}


	return {

		parseOnLoad : false,

		debug : false,
		
		applyAction : function(img, dataImg, actionName, options) {

			options = options || {};

			var imageIsCanvas = (img.tagName.toLowerCase() == "canvas");
			if (imageIsCanvas && Pixastic.Client.isIE()) {
				if (Pixastic.debug) writeDebug("Tried to process a canvas element but browser is IE.");
				return false;
			}

			var canvas, ctx;
			if (Pixastic.Client.hasCanvas()) {
				canvas = document.createElement("canvas");
				ctx = canvas.getContext("2d");
			}

			var w = parseInt(img.offsetWidth);
			var h = parseInt(img.offsetHeight);

			if (actionName.indexOf("(") > -1) {
				var tmp = actionName;
				actionName = tmp.substr(0, tmp.indexOf("("));
				var arg = tmp.match(/\((.*?)\)/);
				if (arg[1]) {
					arg = arg[1].split(";");
					for (var a=0;a<arg.length;a++) {
						thisArg = arg[a].split("=");
						if (thisArg.length == 2) {
							if (thisArg[0] == "rect") {
								var rectVal = thisArg[1].split(",");
								options[thisArg[0]] = {
									left : parseInt(rectVal[0],10)||0,
									top : parseInt(rectVal[1],10)||0,
									width : parseInt(rectVal[2],10)||0,
									height : parseInt(rectVal[3],10)||0
								}
							} else {
								options[thisArg[0]] = thisArg[1];
							}
						}
					}
				}
			}

			if (!options.rect) {
				options.rect = {
					left : 0, top : 0, width : w, height : h
				};
			}
			var validAction = false;
			if (Pixastic.Actions[actionName] && typeof Pixastic.Actions[actionName].process == "function") {
				validAction = true;
			}
			if (!validAction) {
				if (Pixastic.debug) writeDebug("Invalid action \"" + actionName + "\". Maybe file not included?");
				return false;
			}
			if (!Pixastic.Actions[actionName].checkSupport()) {
				if (Pixastic.debug) writeDebug("Action \"" + actionName + "\" not supported by this browser.");
				return false;
			}

			if (Pixastic.Client.hasCanvas()) {
				canvas.width = w;
				canvas.height = h;
				canvas.style.width = w+"px";
				canvas.style.height = h+"px";
				ctx.drawImage(dataImg,0,0,w,h);

				if (!img.__pixastic_org_image) {
					canvas.__pixastic_org_image = img;
					canvas.__pixastic_org_width = w;
					canvas.__pixastic_org_height = h;
				} else {
					canvas.__pixastic_org_image = img.__pixastic_org_image;
					canvas.__pixastic_org_width = img.__pixastic_org_width;
					canvas.__pixastic_org_height = img.__pixastic_org_height;
				}

			} else if (Pixastic.Client.isIE() && typeof img.__pixastic_org_style == "undefined") {
				img.__pixastic_org_style = img.style.cssText;
			}

			var params = {
				image : img,
				canvas : canvas,
				width : w,
				height : h,
				useData : true,
				options : options
			}

			// Ok, let's do it!

			var res = Pixastic.Actions[actionName].process(params);

			if (!res) {
				return false;
			}

			if (Pixastic.Client.hasCanvas()) {
				if (params.useData) {
					if (Pixastic.Client.hasCanvasImageData()) {
						canvas.getContext("2d").putImageData(params.canvasData, options.rect.left, options.rect.top);

						// Opera doesn't seem to update the canvas until we draw something on it, lets draw a 0x0 rectangle.
						canvas.getContext("2d").fillRect(0,0,0,0);
					}
				}

				if (!options.leaveDOM) {
					// copy properties and stuff from the source image
					canvas.title = img.title;
					canvas.imgsrc = img.imgsrc;
					if (!imageIsCanvas) canvas.alt  = img.alt;
					if (!imageIsCanvas) canvas.imgsrc = img.src;
					canvas.className = img.className;
					canvas.style.cssText = img.style.cssText;
					canvas.name = img.name;
					canvas.tabIndex = img.tabIndex;
					canvas.id = img.id;
					if (img.parentNode && img.parentNode.replaceChild) {
						img.parentNode.replaceChild(canvas, img);
					}
				}

				options.resultCanvas = canvas;

				return canvas;
			}

			return img;
		},

		prepareData : function(params, getCopy) {
			var ctx = params.canvas.getContext("2d");
			var rect = params.options.rect;
			var dataDesc = ctx.getImageData(rect.left, rect.top, rect.width, rect.height);
			var data = dataDesc.data;
			if (!getCopy) params.canvasData = dataDesc;
			return data;
		},

		// load the image file
		process : function(img, actionName, options, callback)
		{
			if (img.tagName.toLowerCase() == "img") {
				var dataImg = new Image();
				dataImg.src = img.src;
				if (dataImg.complete) {
					var res = Pixastic.applyAction(img, dataImg, actionName, options);
					if (callback) callback(res);
					return res;
				} else {
					dataImg.onload = function() {
						var res = Pixastic.applyAction(img, dataImg, actionName, options)
						if (callback) callback(res);
					}
				}
			}
			if (img.tagName.toLowerCase() == "canvas") {
				var res = Pixastic.applyAction(img, img, actionName, options);
				if (callback) callback(res);
				return res;
			}
		},

		revert : function(img) {
			if (Pixastic.Client.hasCanvas()) {
				if (img.tagName.toLowerCase() == "canvas" && img.__pixastic_org_image) {
					img.width = img.__pixastic_org_width;
					img.height = img.__pixastic_org_height;
					img.getContext("2d").drawImage(img.__pixastic_org_image, 0, 0);

					if (img.parentNode && img.parentNode.replaceChild) {
						img.parentNode.replaceChild(img.__pixastic_org_image, img);
					}

					return img;
				}
			} else if (Pixastic.Client.isIE() && typeof img.__pixastic_org_style != "undefined") {
				img.style.cssText = img.__pixastic_org_style;
			}
		},

		Client : {
			hasCanvas : (function() {
				var c = document.createElement("canvas");
				var val = false;
				try {
					val = !!((typeof c.getContext == "function") && c.getContext("2d"));
				} catch(e) {}
				return function() {
					return val;
				}
			})(),

			hasCanvasImageData : (function() {
				var c = document.createElement("canvas");
				var val = false;
				var ctx;
				try {
					if (typeof c.getContext == "function" && (ctx = c.getContext("2d"))) {
						val = (typeof ctx.getImageData == "function");
					}
				} catch(e) {}
				return function() {
					return val;
				}
			})(),

			isIE : function() {
				return !!document.all && !!window.attachEvent && !window.opera;
			}
		},

		Actions : {}
	}


})();
/*
 * Pixastic Lib - Desaturation filter - v0.1.1
 * Copyright (c) 2008 Jacob Seidelin, jseidelin@nihilogic.dk, http://blog.nihilogic.dk/
 * MIT License [http://www.opensource.org/licenses/mit-license.php]
 */

Pixastic.Actions.desaturate = {

	process : function(params) {
		var useAverage = !!params.options.average;

		if (Pixastic.Client.hasCanvasImageData()) {
			var data = Pixastic.prepareData(params);
			var rect = params.options.rect;
			var w = rect.width;
			var h = rect.height;

			var p = w*h;
			var pix = p*4, pix1, pix2;

			if (useAverage) {
				while (p--) 
					data[pix-=4] = data[pix1=pix+1] = data[pix2=pix+2] = (data[pix]+data[pix1]+data[pix2])/3
			} else {
				while (p--)
					data[pix-=4] = data[pix1=pix+1] = data[pix2=pix+2] = (data[pix]*0.3 + data[pix1]*0.59 + data[pix2]*0.11);
			}
			return true;
		} else if (Pixastic.Client.isIE()) {
			params.image.style.filter += " gray";
			return true;
		}
	},
	checkSupport : function() {
		return (Pixastic.Client.hasCanvasImageData() || Pixastic.Client.isIE());
	}
}/*
 * Pixastic Lib - Glow - v0.1.0
 * Copyright (c) 2008 Jacob Seidelin, jseidelin@nihilogic.dk, http://blog.nihilogic.dk/
 * MIT License [http://www.opensource.org/licenses/mit-license.php]
 */


Pixastic.Actions.glow = {
	process : function(params) {

		var amount = (parseFloat(params.options.amount)||0);
		var blurAmount = parseFloat(params.options.radius)||0;

		amount = Math.min(1,Math.max(0,amount));
		blurAmount = Math.min(5,Math.max(0,blurAmount));

		if (Pixastic.Client.hasCanvasImageData()) {
			var rect = params.options.rect;

			var blurCanvas = document.createElement("canvas");
			blurCanvas.width = params.width;
			blurCanvas.height = params.height;
			var blurCtx = blurCanvas.getContext("2d");
			blurCtx.drawImage(params.canvas,0,0);

			var scale = 2;
			var smallWidth = Math.round(params.width / scale);
			var smallHeight = Math.round(params.height / scale);

			var copy = document.createElement("canvas");
			copy.width = smallWidth;
			copy.height = smallHeight;

			var clear = true;
			var steps = Math.round(blurAmount * 20);

			var copyCtx = copy.getContext("2d");
			for (var i=0;i<steps;i++) {
				var scaledWidth = Math.max(1,Math.round(smallWidth - i));
				var scaledHeight = Math.max(1,Math.round(smallHeight - i));
	
				copyCtx.clearRect(0,0,smallWidth,smallHeight);
	
				copyCtx.drawImage(
					blurCanvas,
					0,0,params.width,params.height,
					0,0,scaledWidth,scaledHeight
				);
	
				blurCtx.clearRect(0,0,params.width,params.height);
	
				blurCtx.drawImage(
					copy,
					0,0,scaledWidth,scaledHeight,
					0,0,params.width,params.height
				);
			}

			var data = Pixastic.prepareData(params);
			var blurData = Pixastic.prepareData({canvas:blurCanvas,options:params.options});
			var w = rect.width;
			var h = rect.height;
			var w4 = w*4;
			var y = h;
			do {
				var offsetY = (y-1)*w4;
				var x = w;
				do {
					var offset = offsetY + (x*4-4);

					var r = data[offset] + amount * blurData[offset];
					var g = data[offset+1] + amount * blurData[offset+1];
					var b = data[offset+2] + amount * blurData[offset+2];
	
					if (r > 255) r = 255;
					if (g > 255) g = 255;
					if (b > 255) b = 255;
					if (r < 0) r = 0;
					if (g < 0) g = 0;
					if (b < 0) b = 0;

					data[offset] = r;
					data[offset+1] = g;
					data[offset+2] = b;

				} while (--x);
			} while (--y);

			return true;
		}
	},
	checkSupport : function() {
		return Pixastic.Client.hasCanvasImageData();
	}
}



/*
 * Pixastic Lib - Sepia filter - v0.1.0
 * Copyright (c) 2008 Jacob Seidelin, jseidelin@nihilogic.dk, http://blog.nihilogic.dk/
 * MIT License [http://www.opensource.org/licenses/mit-license.php]
 */

Pixastic.Actions.sepia = {

	process : function(params) {
		var mode = (parseInt(params.options.mode,10)||0);
		if (mode < 0) mode = 0;
		if (mode > 1) mode = 1;

		if (Pixastic.Client.hasCanvasImageData()) {
			var data = Pixastic.prepareData(params);
			var rect = params.options.rect;
			var w = rect.width;
			var h = rect.height;
			var w4 = w*4;
			var y = h;
			do {
				var offsetY = (y-1)*w4;
				var x = w;
				do {
					var offset = offsetY + (x-1)*4;

					if (mode) {
						// a bit faster, but not as good
						var d = data[offset] * 0.299 + data[offset+1] * 0.587 + data[offset+2] * 0.114;
						var r = (d + 39);
						var g = (d + 14);
						var b = (d - 36);
					} else {
						// Microsoft
						var or = data[offset];
						var og = data[offset+1];
						var ob = data[offset+2];
	
						var r = (or * 0.393 + og * 0.769 + ob * 0.189);
						var g = (or * 0.349 + og * 0.686 + ob * 0.168);
						var b = (or * 0.272 + og * 0.534 + ob * 0.131);
					}

					if (r < 0) r = 0; if (r > 255) r = 255;
					if (g < 0) g = 0; if (g > 255) g = 255;
					if (b < 0) b = 0; if (b > 255) b = 255;

					data[offset] = r;
					data[offset+1] = g;
					data[offset+2] = b;

				} while (--x);
			} while (--y);
			return true;
		}
	},
	checkSupport : function() {
		return Pixastic.Client.hasCanvasImageData();
	}
}