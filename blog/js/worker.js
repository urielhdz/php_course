self.addEventListener('message',function(e){
	var json = e.data;
	var pixels = json.pixels;
	var transparentColor = json.transparentColor;
	// iterate through pixel data (1 pixels consists of 4 ints in the array)
    for(var i = 0, len = pixels.data.length; i < len; i += 4){
        var r = pixels.data[i];
        var g = pixels.data[i+1];
        var b = pixels.data[i+2];

        // if the pixel matches our transparent color, set alpha to 0
        if(r == transparentColor.r && g == transparentColor.g && b == transparentColor.b){
        	console.log(":(");
            pixels.data[i+3] = 0;
        }
    }
    console.log('Im done');
	self.postMessage({pixels: pixels});
},false);