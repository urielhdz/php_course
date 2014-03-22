var stage,box, CURRENT_VIEW = '#subir_logo';
var MAIN_SELECTOR = '#more_options';
var SELECTED_OBJECT;
var CURRENT_EVENT;
var base_url = 'http://localhost/c/';
// 
var IMAGE_TO_REMOVE;
$(document).ready(function(){
	if(!Modernizr.inputtypes.color){
		$('#font_color').hide();
		$('#old_color').show();
	}
	stage = new Canvas('c',$('#c').width(),$('#c').height());
	
	var background_url = $('#background').attr('src');
	console.log(background_url);
	stage.setBackground(background_url);
	document.getElementById('file_u').addEventListener('change', manipularImagen, false);
	box = document.getElementById('drag_drop');
	box.addEventListener('dragover',function(e){
		e.preventDefault();
		this.classList.add('over');
		return false;
	});
	box.addEventListener('dragleave',function(e){
		this.classList.remove('over');
	});
	$('#fuente').on('change',function(){
		var fuente = $('#fuente').val();
		$('#font_display').css('font-family',fuente);
		stage.setFont(fuente);
	});
	$('#to_color').on('click',function(){toColor(0)});
	$('#to_color_download').on('click',function(){toColor(1)});
	$('#c').on('click',function(evt){
		if(stage.tool == "fondo"){
			var container = document.getElementById("c");
			var coords = getMousePos(container,evt);
			$('#blackscreen').fadeIn('slow',function(){
				getSelectedColor(coords);	
			});
		}
	})
	
	box.addEventListener('drop',uploadFile);

	var position = $('#c').offset();
	position.left += 10;
	$('#blackscreen').css(position);
	$('#add_text').on('click',function(){
		var texto = $('#text').val();
		var config = {
			'size': $('#font_size').val(),
			'color': $('#font_color').val()
		}
		stage.addText(texto,config);
	});
	$('#rotar_tool').on("click",function(e){
		stage.tool = "rotar";
	});
	$('#redim_tool').on("click",function(e){
		stage.tool = "redim";
	});
	$('#cortar_tool').on("click",function(e){
		stage.tool = "cortar";
	});
	$('#mover_tool').on("click",function(e){
		stage.tool = "mover";
	});
	$('#subir_tool').on("click",function(e){
		stage.tool = "";
	});
	$('#fondo_tool').on("click",function(e){
		stage.tool = "fondo";
	});
	$('.close').on('click',function(e){
		$(this).parent().slideUp();
	});
	$('#monochrome').on('click',function(e){
		stage.toDataURL({
			callback: function(d){
				$("#hidden_image").attr("src", d);
				download_view();	
			}
		});
	});
	$('#download').on('click',function(e){
		stage.toDataURL({
			callback: function(d){
				var a = $("<a>").attr("href", d).attr("download", "img.png").appendTo("body");
				a[0].click();
				a.remove();
			}
		});
		
	});
	$('#rotator').on('change',rotate_element);
	$('#redimensioner').on('change',redim_element);
	$('.main_navigation li').on('click',switchView);
	
});
function manipularImagen(e){
	box.classList.remove('over');
	var file = e.target.files;
	var f = file[0];
	stage.drawLogo(URL.createObjectURL(f));
}
function uploadFile(e){
	e.preventDefault();
	var files = e.dataTransfer.files;
	var f = files[0];
	stage.drawLogo(URL.createObjectURL(f));
}
function switchView(e){
	$('#select_object_to_rotate').show();
	$('#rotar_controles').hide();
	$('#select_object_to_redim').show();
	$('#redim_controles').hide();
	var selector = $(this).data('selector');
	if(typeof selector == "undefined") return;
	var contenido = $(selector).html();
	console.log(selector);

	$(CURRENT_VIEW).slideUp('slow',function(){
		$(selector).slideDown('slow');	
		CURRENT_VIEW = selector;
	});
	
}
function displayImageToRotate(kinetic_image){
	$('#select_object_to_redim').show();
	$('#redim_controles').hide();
	$('#select_object_to_rotate').slideUp('slow');
	$('#rotar_controles').slideDown('slow');
	SELECTED_OBJECT = kinetic_image;
}
function displayImageToRedim(kinetic_image){
	$('#select_object_to_rotate').show();
	$('#rotar_controles').hide();
	$('#select_object_to_redim').slideUp('slow');
	$('#redim_controles').slideDown('slow');
	SELECTED_OBJECT = kinetic_image;
}
function displayImageToRemoveBackground(kinetic_image){
	IMAGE_TO_REMOVE = kinetic_image;

}
function rotate_element(){
	var radians = parseInt(this.value) * (Math.PI/180);
	SELECTED_OBJECT.setRotationDeg(parseInt(this.value));
	stage.draw();
}
function redim_element(){
	console.log(this.value);
	SELECTED_OBJECT.setScale(parseFloat(this.value));
	stage.draw();
}
function getMousePos(canvas,evt) {
	
	
	var rect = canvas.getBoundingClientRect();
	return {
		x: evt.clientX - rect.left,
		y: evt.clientY - rect.top
	};
}
function getSelectedColor(mousePos){
	stage.toDataURL({
		callback: function(d){
			var dstCanvas = document.createElement("canvas");
    		dstCanvas.width = stage.getWidth();
    		dstCanvas.height = stage.getHeight();
    		var dstContext = dstCanvas.getContext("2d");
    		var img = new Image();
    		img.src = d;
    		img.onload = function(){
    			dstContext.drawImage(this,0,0);
	    		var imageData = dstContext.getImageData(0, 0, stage.getWidth(),stage.getHeight());
			    var data = imageData.data;
			    var x = mousePos.x;
			    var y = mousePos.y;
			    var red = data[((stage.getWidth() * y) + x) * 4];
			    var green = data[((stage.getWidth() * y) + x) * 4 + 1];
			    var blue = data[((stage.getWidth() * y) + x) * 4 + 2];
				var color = 'rgb(' + red + ',' + green + ',' + blue + ')';				
				var color_obj = {
					r: red,
					g: green,
					b: blue
				};			
				stage.removeImage(IMAGE_TO_REMOVE);
				removeBackground(IMAGE_TO_REMOVE.getImage(),color_obj);
    		}
		}
	});	
}
function toColor(numero){
	var id = $('#color_picked').val();
	$.ajax({
		url: base_url+ 'colors/getRGB/'+id,
		dataType: 'JSON',
		success: function(e){
			toRed(e,numero);
		}
	});
}
function download_view(){
	$('#download_view').slideDown('slow');
}
function toRed(rgb_json,numero){
	var width = stage.getWidth();
	var height = stage.getHeight();
	var layers = stage.getLayersWithoutBackground();
	$("<div>").attr("id","hidden_canvas").attr("style","display:none").appendTo("body");
	var front_stage = new Canvas("hidden_canvas",stage.getWidth(),stage.getHeight());
	var background = stage.getBackgroundLayer();
	for(var i = 0;i<layers.length;i++){
		front_stage.add(layers[i]);
	}
	front_stage.draw();
	var srcCanvas = document.createElement("canvas");
	srcCanvas.width = stage.getWidth();
    srcCanvas.height = stage.getHeight();
    var srcContext = srcCanvas.getContext("2d");
    front_stage.toDataURL({
		callback: function(d){
	   		var img = new Image();
	   		img.src = d;
	   		img.onload = function(){
	   			srcContext.drawImage(this,0,0);
	    		var imageData = srcContext.getImageData(0, 0, stage.getWidth(),stage.getHeight());
			    var imageDataNew = srcContext.createImageData(stage.getWidth(),stage.getHeight());
			    
			    for (x = 0; x < stage.getWidth(); x++) {
    				for (y = 0; y < stage.getHeight(); y++) {
    					var rgba = getPixel(imageData,x,y);
    					
    					var rgb = [rgba[0],rgba[1],rgba[2]];
    					if(rgba[3] > 0){ 
    						rgb[0] = rgb_json['R'];
    						rgb[1] = rgb_json['G'];
    						rgb[2] = rgb_json['B'];
    						setPixel(imageDataNew,x,y,rgb,rgba[3]);
    					}
    				}
    			}
    			srcContext.putImageData(imageDataNew, 0, 0);
    			var img = new Image();
	    		img.src = srcCanvas.toDataURL("image/png");
	    		img.onload = function(){
	    			if(numero > 0)
	    				downloadNewCanvas(background,img);
	    			else
	    				drawNewCanvas(background,img);
	    		}
    			
	   		}
		}
	});
	
}
function downloadNewCanvas(fondo,img_color){
	var canvas = new Canvas("hidden_canvas",stage.getWidth(),stage.getHeight());
	canvas.add(fondo);
	setTimeout(function(){
		canvas.drawImage(img_color);
		canvas.toDataURL({
			callback: function(d){
				var a = $("<a>").attr("href", d).attr("download", "producto.png").appendTo("body");
				a[0].click();
				a.remove();
				restaurarCapas(canvas);
			}
		});
	},500);
}
function drawNewCanvas(fondo,img_color){
	var canvas = new Canvas("hidden_canvas",stage.getWidth(),stage.getHeight());
	canvas.add(fondo);
	setTimeout(function(){
		canvas.drawImage(img_color);
		canvas.toDataURL({
			callback: function(d){
				var a = $("#hidden_image").attr("src", d);
				restaurarCapas(canvas);
			}
		});
	},500);
	
}
function restaurarCapas(canvas){
	stage.setCapas(canvas.getCapas());
}
function setPixel(imageData, x, y, rgb, a) {
    index = (x + y * imageData.width) * 4;
    imageData.data[index+0] = rgb[0];
    imageData.data[index+1] = rgb[1];
    imageData.data[index+2] = rgb[2];
    imageData.data[index+3] = a;
};

function getPixel(imageData, x, y) {
    index = (x + y * imageData.width) * 4;
    return [imageData.data[index+0],
            imageData.data[index+1],
            imageData.data[index+2],
            imageData.data[index+3]
            ];
};
function Mix(k,x,y) {
  return (1-k)*x + k*y;
};
function removeBackground(img,transparentColor){
	var srcCanvas = document.createElement("canvas");
    srcCanvas.width = img.width;
    srcCanvas.height = img.height;

    // create a destination canvas. Here the altered image will be placed
    var dstCanvas = document.createElement("canvas");
    dstCanvas.width = img.width;
    dstCanvas.height = img.height;
    // get context to work with
    var srcContext = srcCanvas.getContext("2d");
    var dstContext = dstCanvas.getContext("2d");

    // draw the loaded image on the source canvas
    srcContext.drawImage(img, 0, 0);

    // read pixels from source
    var pixels = srcContext.getImageData(0, 0, img.width, img.height);
    // iterate through pixel data (1 pixels consists of 4 ints in the array)
    for(var i = 0, len = pixels.data.length; i < len; i += 4){
    	console.log(":O");
        var r = pixels.data[i];
        var g = pixels.data[i+1];
        var b = pixels.data[i+2];

        // if the pixel matches our transparent color, set alpha to 0
        if(r == transparentColor.r && g == transparentColor.g && b == transparentColor.b){
        	console.log(":(");
            pixels.data[i+3] = 0;
        }
    }

    // write pixel data to destination context
    dstContext.putImageData(pixels,0,0);
    var image = new Image();
    image.src = dstCanvas.toDataURL();

    stage.drawLogo(dstCanvas.toDataURL());	
    $('#blackscreen').fadeOut('slow');
}