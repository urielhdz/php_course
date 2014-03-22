function Canvas(selector,width,height){
	//this.container = document.getElementById(selector);
	Kinetic.Stage.call(this, {
		container: selector,
		height: height,
		width: width
	});
	this.font = "Arial";
	this.tool = "";
	this.logos = [];
	this.mainLayer = new Kinetic.Layer();
	this.logoLayer = new Kinetic.Layer();
	this.textLayer = new Kinetic.Layer();
	this.logo;
	this.add(this.mainLayer);
	this.add(this.logoLayer);
	this.add(this.textLayer);
	this.getCapas = function(){
		return this.getChildren();
	}
	this.setCapas = function(capas){
		for(var i = 0;i<capas.length;i++){
			var capa = capas[i];
			this.add(capa);
		}
	}
	this.getLayersWithoutBackground = function(){
		var layers = [];
		var children = this.getChildren();
		for(var i = 0;i<children.length;i++){
			if(children[i] != this.mainLayer){
				layers.push(children[i]);
			}
		}
		return layers;
	}
	this.reset = function(){
		var children = this.getChildren();
		for(var i = 0;i<children.length;i++){
			children[i].remove();
		}
	}
	this.getBackgroundLayer = function(){
		return this.mainLayer;
	}
	this.setBackground = function(url){
		var imageObj = new Image();
		var self = this;
		imageObj.onload = function(){
			var width,height;
			if(this.width > this.height){
				var ratio = this.width/this.height;
				width = self.getWidth();
				height = width / ratio;
				if(height > self.getHeight()) self.setHeight(height);
			}
			else{
				var ratio = this.height / this.width;
				height = self.getHeight();
				width = height / ratio;
				
			}
			var fondo = new Kinetic.Image({
				x: (self.getWidth() - width)/2,
				y: 0,
				image: imageObj,
				width: width,
				height: height,
				draggable: false,
				listening: false
			});
			self.mainLayer.add(fondo);
			self.draw();
		}
		imageObj.src = url;
	}

	this.drawLogo = function(url){
		var imageObj = new Image();
		var self = this;

		imageObj.onload = function(){
			var width,height;
			if(this.width> self.getWidth() || this.height > self.getHeight())
			{
				if(this.width > this.height){
					var ratio = this.width/this.height;
					width = self.getWidth();
					height = width / ratio;
					if(height > self.getHeight()) self.setHeight(height);
				}
				else{
					var ratio = this.height / this.width;
					height = self.getHeight();
					width = height / ratio;
					
				}
			}
			var image = new Kinetic.Image({
				x: this.width / 2,
				y: this.height / 2,
				image: imageObj,
				width: width,
				height: height,
				draggable: true,
				listening: true,
				offset: [this.width/2, this.height/2]
			});
			image.on("click",function(){
				var img = this;
				if(self.tool == "rotar"){
					displayImageToRotate(this);	
				}
				if(self.tool == "redim"){
					displayImageToRedim(this);	
				}
				else if(self.tool == "cortar"){
					console.log(img);
					this.remove();
					self.draw();
				}
				else if(self.tool == "fondo"){
					displayImageToRemoveBackground(img);	
				}				
			});
			self.logos.push([this.logo, imageObj.src]);
			var layer = new Kinetic.Layer();
			layer.add(image);
			self.add(layer);
			self.draw();
		}
		imageObj.src = url;

	}
	this.removeImage = function(image){
		image.remove();
	}
	this.drawImageWithoutBackground = function(imageObj){
		
		var self = this;
			var image = new Kinetic.Image({
				x: self.width / 2,
				y: self.height / 2,
				image: imageObj,
				width: imageObj.width,
				height: imageObj.height,
				draggable: true,
				listening: true,
				offset: [self.width/2, self.height/2]
			});
			image.on("click",function(){
				if(self.tool == "rotar"){
					displayImageToRotate(this);	
				}
				else if(self.tool == "cortar"){
					image.remove();
					logoLayer.draw();
				}
				else if(self.tool == "fondo"){
					displayImageToRemoveBackground(this);	
				}				
			});
			self.logoLayer.add(image);
			self.draw();
	}

	this.drawImage = function(imageObj){
		var self = this;
		var image = new Kinetic.Image({
			x: 0,
			y: 0,
			image: imageObj,
			width: imageObj.width,
			height: imageObj.height,
			draggable: true,
			listening: true,
			offset: [self.width/2, self.height/2]
		});
		var layer = new Kinetic.Layer();
		layer.add(image);
		self.add(layer);
		self.draw();	
	}

	this.changeTool = function(tool){
		this.tool = tool;
	}
	this.setFont = function(fuente){
		this.font = fuente;
	}
	this.addText = function(text,config){
		var texto = new Kinetic.Text({
			x: 0,
			y: 0,
			text: text,
			fontSize: config['size'],
			fontFamily: this.font,
			draggable: true,
			listening: true,
			fill: config['color']
		});
		var self = this;
		texto.on("click",function(){
				
				if(self.tool == "rotar"){
					displayImageToRotate(this);	
				}
				if(self.tool == "redim"){
					displayImageToRedim(this);	
				}
				else if(self.tool == "cortar"){
					this.remove();
					self.draw();
				}
			});
		var my_layer = new Kinetic.Layer();
		my_layer.add(texto);
		this.add(my_layer);
		this.draw();
	}
	this.getData = function(){
		var srcCanvas = document.createElement("canvas");
		srcCanvas.width = this.getWidth();
    	srcCanvas.height = this.getHeight();
    	var srcContext = srcCanvas.getContext("2d");
    	this.toDataURL({
			callback: function(d){
	    		var img = new Image();
	    		img.src = d;
	    		img.onload = function(){
	    			srcContext.drawImage(this,0,0);
		    		var imageData = srcContext.getImageData(0, 0, stage.getWidth(),stage.getHeight());
				    var data = imageData.data;
	    		}
			}
		});
	}

}
Canvas.prototype = Object.create(Kinetic.Stage.prototype);
