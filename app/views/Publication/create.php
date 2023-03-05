<?php $this->view('header', 'Cliquebait'); ?>

<h1>New Publication</h1>
<form action='' method='post' enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Insert your picture:<input class='form-control' type="file" name="picture" id="picture" /></label><img id='pic_preview' src='/images/insert_image.png' style="max-width:200px;max-height:200px" />
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Add a caption:<input class='form-control' type="text" name="caption" placeholder='Say something about your picture.' /></label>
	</div>
	<input type="submit" name="action" value="Publish" class='btn btn-primary' />
</form>

<a href='/'>Cancel</a>

<script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>
<?php $this->view('footer'); ?>