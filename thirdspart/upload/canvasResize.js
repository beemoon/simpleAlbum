/*****************************
        Variables
*****************************/
    var imgWidth = 680,
        imgHeight = 280;
        

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

        //Passing an ArrayBuffer to the Blob constructor appears to be deprecated, 
        //so convert ArrayBuffer to DataView
        var dataView = new DataView(ab);
        var blob = new Blob([dataView], {type: mimeString});

        return blob;
}


/***************************** 
        Process FileList 
*****************************	
var processFiles = function(files) {
        if(files && typeof FileReader !== "undefined") {
                //process each files only if browser is supported
                for(var i=0; i<files.length; i++) {
                        readFile(files[i]);
                }
        } else {
                
        }
}
*/

/***************************** 
	Read the File Object
*****************************/	
var readFile = function(file) {
	if( (/image/i).test(file.type) ) {
		//define FileReader object
		var reader = new FileReader();
		
		//init reader onload event handlers
		reader.onload = function(e) {	
			var image = $('<img/>')
			.load(function() {
				//when image fully loaded
				var newimageurl = getCanvasImage(this);
				uploadToServer(dataURItoBlob(newimageurl));
			})
			.attr('src', e.target.result);	
		};
		
		//begin reader read operation
		reader.readAsDataURL(file);
		
		$('#err').text('');
	} else {
		//some message for wrong file format
		$('#err').text('*Selected file format not supported!');
	}
}
	
	
/***************************** 
        Get New Canvas Image URL
*****************************/	
var getCanvasImage = function(image) {
        
        if(image.height > imgHeight) {
                image.width *= imgHeight / image.height;
                image.height = imgHeight;
                
                imgWidth = image.width;
                imgHeight = image.height;
        }	

        //define canvas
        var canvas = document.createElement('canvas');
        
        var ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        canvas.width = imgWidth;
        canvas.height = imgHeight;
        ctx.drawImage(image, 0, 0, imgWidth, imgHeight);
	
        //convert canvas to jpeg url
        return canvas.toDataURL("image/jpeg");
}

/****************************
	Upload Image to Server
****************************/
var uploadToServer = function(newFile) {
	// prepare FormData
	var formData = new FormData();  
	//we still have to use back old file
	//since new file doesn't contains original file data
	formData.append('file', newFile); 
	
	/*			
	//submit formData using $.ajax			
	$.ajax({
		url: 'upload.php',
		type: 'POST',
		data: formData,
		processData: false,
		contentType: false,
		success: function(data) {
			console.log(data);
		}
	});
	*/
}
	