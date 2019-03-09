<?php include('header.php'); ?>
<?php
if(isset($_POST['submit'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail'];
	$rango = $_POST['rango'];
	$base64 = $_POST['files'];
    $rand = rand(0,100000).'.jpeg';
    $fin = file_put_contents($rand, file_get_contents($base64));
    copy($rand, 'images/'.$rand);
    unlink($rand);
	// $name = rand().'.'.pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
	// move_uploaded_file($_FILES['files']['tmp_name'], 'images/'.$name);
	mysqli_query($link, "INSERT INTO users (user,pass,mail,rango, img) VALUES ('$user','$pass','$mail','$rango','$rand')");
	echo '<script>window.location="users.php"</script>';
}
?>
				<form method="post" action="" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text" id="user" name="user" class="form-control" placeholder="Nombre de usuario">
					</div>
					<div class="form-group">
						<label for="pass">Contraseña</label>
						<input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña de usuario">
					</div>
					<div class="form-group">
						<label for="mail">Correo electrónico</label>
						<input type="mail" id="mail" name="mail" class="form-control" placeholder="Correo electrónico">
					</div>
					<label for="rango">Rango</label>
					<div class="radio">
						<label>
							<input type="radio" name="rango" value="administrador">
							Administrador
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="rango" value="editor">
							Editor
						</label>
					</div>

					<!-- div class="form-group">
			
			<div class="input-group">
				
				<input type="file" class="inputfile" name="files" multiple onchange="previewImage(this,[256],4);"> 
			
				<div class="imagePreview"></div>
				</div -->


//////////////////////////////////////////





/////////////////////////



				

<script>
/**
 * Created by ezgoing on 14/9/2014.
 */

YUI.add('crop-box', function (Y) {
    Y.CropBox = Y.Base.create('crop-box', Y.Base, [],
        {
            initializer: function (options)
            {
                this.options = options;
                this.state = {};
                this.render();
            },
            render: function ()
            {
                var self = this;
                this.imageBox = Y.one(this.options.imageBox);
                this.thumbBox = this.imageBox.one(this.options.thumbBox);
                this.spinner = this.imageBox.one(this.options.spinner);

                this.initObject();
                return this;
            },
            initObject: function()
            {
                var self = this;
                this.spinner.show();

                this.image = new Image();
                this.image.onload = function() {
                    self.spinner.hide();
                    self.setBackground();

                    //event handler
                    self.imageBox.on('mousedown', self.imgMouseDown, self);
                    self.imageBox.on('mousemove', self.imgMouseMove, self);
                    self.mouseup = Y.one('body').on('mouseup', self.imgMouseUp, self);

                    Y.UA.gecko > 0?
                        self.imageBox.on('DOMMouseScroll', self.zoomImage, self):
                        self.imageBox.on('mousewheel', self.zoomImage, self);
                };
                this.image.src = this.options.imgSrc;
            },
            setBackground: function()
            {
                if(!this.ratio) this.ratio = 1;

                var w =  parseInt(this.image.width)*this.ratio;
                var h =  parseInt(this.image.height)*this.ratio;

                var pw = (this.imageBox.get('clientWidth') - w) / 2;
                var ph = (this.imageBox.get('clientHeight') - h) / 2;

                this.imageBox.setAttribute('style',
                    'background-image: url(' + this.image.src + '); ' +
                    'background-size: ' + w +'px ' + h + 'px; ' +
                    'background-position: ' + pw + 'px ' + ph + 'px; ' +
                    'background-repeat: no-repeat');
            },
            imgMouseDown: function(e)
            {
                e.stopImmediatePropagation();
                this.state.dragable = true;
                this.state.mouseX = e.clientX;
                this.state.mouseY = e.clientY;
            },
            imgMouseMove: function(e)
            {
                e.stopImmediatePropagation();
                if (this.state.dragable)
                {
                    var x = e.clientX - this.state.mouseX;
                    var y = e.clientY - this.state.mouseY;

                    var bg = this.imageBox.getStyle('backgroundPosition').split(' ');

                    var bgX = x + parseInt(bg[0]);
                    var bgY = y + parseInt(bg[1]);

                    this.imageBox.setStyle('backgroundPosition', bgX +'px ' + bgY + 'px');

                    this.state.mouseX = e.clientX;
                    this.state.mouseY = e.clientY;
                }
            },
            imgMouseUp: function(e)
            {
                e.stopImmediatePropagation();
                this.state.dragable = false;
            },
            zoomImage: function(e)
            {
                e.wheelDelta > 0? this.ratio*=1.1 : this.ratio*=0.9;
                this.setBackground();
            },
            getAvatar: function ()
            {
                var self = this,
                    width = this.thumbBox.get('clientWidth'),
                    height = this.thumbBox.get('clientHeight'),
                    canvas = document.createElement("canvas"),
                    dim = this.imageBox.getStyle('backgroundPosition').split(' '),
                    size = this.imageBox.getStyle('backgroundSize').split(' '),
                    dx = parseInt(dim[0]) - this.imageBox.get('clientWidth')/2 + width/2,
                    dy = parseInt(dim[1]) - this.imageBox.get('clientHeight')/2 + height/2,
                    dw = parseInt(size[0]);
                    dh = parseInt(size[1]);
                    sh = parseInt(this.image.height);
                    sw = parseInt(this.image.width);

                canvas.width = width;
                canvas.height = height;
                var context = canvas.getContext("2d");
                context.drawImage(this.image, 0, 0, sw, sh, dx, dy, dw, dh);
                var imageData = canvas.toDataURL('image/jpeg');

                return imageData;
            },
            zoomIn: function ()
            {
                this.ratio*=1.1;
                this.setBackground();
            },
            zoomOut: function ()
            {
                this.ratio*=0.9;
                this.setBackground();
            },
            destructor: function ()
            {
                if (this.mouseup) this.mouseup.detach()
            }
        });
}, '1.0',
{
    requires: [ 'node', 'base' ]
});

</script>



    

<script type="text/javascript">
    YUI().use('node', 'crop-box', function(Y){
        var options =
        {
            imageBox: '.imageBox',
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: ''
        }
        var cropper;
        Y.one('#file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = new Y.CropBox(options);
            }
            reader.readAsDataURL(this.get('files')._nodes[0]);
            this.get('files')._nodes = [];
        })
        Y.one('#btnCrop').on('click', function(){
            var img = cropper.getAvatar()
            Y.one('.cropped').append('<input type="hidden" name="files" value="'+img+'">');
         })
        Y.one('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        })
        Y.one('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        })
    })




</script>


		
		</div>
					

					
				</form>
<?php include('footer.php'); ?>