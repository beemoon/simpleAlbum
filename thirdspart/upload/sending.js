/*
    //https://github.com/blueimp/JavaScript-Canvas-to-Blob
    //http://stackoverflow.com/questions/4998908/convert-data-uri-to-file-then-append-to-formdata
    //convert canvas to jpeg url
    function dataURItoBlob(dataURI) {
        // convert base64 to raw binary data held in a string
        // doesn't handle URLEncoded DataURIs
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);
    
        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]
    
        // write the bytes of the string to an ArrayBuffer
        var ab = new ArrayBuffer(byteString.length);
        var ia = new Uint8Array(ab);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
    
        // write the ArrayBuffer to a blob, and you're done
        var bb = new BlobBuilder();
        bb.append(ab);
        return bb.getBlob(mimeString);
    }
    */
    var reader = new FileReader();
    reader.onload = (
        function(file) {
            var image = new Image();
            image.src = file.target.result;
            
            image.onload = function() {
                
                var imgWidth = 680,
		imgHeight = 280;
                
                if(image.height > imgHeight) {
			image.width *= imgHeight / image.height;
			image.height = imgHeight;
			
			imgWidth = image.width;
			imgHeight = image.height;
		}
                
                
                //define canvas - generation de la nouvelle image
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		canvas.width = imgWidth;
		canvas.height = imgHeight;
		ctx.drawImage(image, 0, 0, imgWidth, imgHeight);
                var dataURL = canvas.toDataURL('image/jpeg',0.7);
                
                //formData.append('file', dataURL);
                
                //alert(this.width + "x" + this.height);
                return dataURL;
            };
        }
    );
    alert(dataURL);
                //xhr.send(formData); 
    canvas.toBlob(
                        function (blob) {
                            this.formData.append('file', blob);
                        },
                        'image/jpeg'
                    );
    
    //begin reader read operation
    reader.readAsDataURL(file);