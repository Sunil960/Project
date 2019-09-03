<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<script src="http://fabricjs.com/lib/fabric.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>

	<body>
		
		<div class="wrapper" style="backgroundColor='green';float: left;display:block;">
			<div class="t-shirt">
				<canvas id="c" width="1000" height="800"></canvas>        
				
			</div>
			
		</div> 
			<div class="controls">
  <h3>Filters:</h3>
  <label>Use WebGl<input type="checkbox" id="webgl" checked=""></label>
  <div id="bench">720 x 1080px 0ms</div>
  <p>
    <label><span>Grayscale:</span> <input type="checkbox" id="grayscale"></label><br>
    <label><span>Avg.</span> <input type="radio" id="average" name="grayscale"></label>
    <label><span>Lum.</span> <input type="radio" id="lightness" name="grayscale"></label>
    <label><span>Light.</span> <input type="radio" id="luminosity" name="grayscale"></label>
  </p>
  <p>
    <label><span>Invert:</span> <input type="checkbox" id="invert"></label>
  </p>
  <p>
    <label>Colormatrix filters:</label>
  </p>
  <p>
    <label><span>Sepia:</span> <input type="checkbox" id="sepia"></label>
  </p>
  <p>
    <label><span>Black/White:</span> <input type="checkbox" id="blackwhite"></label>
  </p>
  <p>
    <label><span>Brownie:</span> <input type="checkbox" id="brownie"></label>
  </p>
  <p>
    <label><span>Vintage:</span> <input type="checkbox" id="vintage"></label>
  </p>
  <p>
    <label><span>Kodachrome:</span> <input type="checkbox" id="kodachrome"></label>
  </p>
  <p>
    <label><span>Technicolor:</span> <input type="checkbox" id="technicolor"></label>
  </p>
  <p>
    <label><span>Polaroid:</span> <input type="checkbox" id="polaroid"></label>
  </p>
  <p>
    <label><span>Remove color:</span> <input type="checkbox" id="remove-color"></label><br>
    <label>Color: <input type="color" id="remove-color-color" value="#00f900"></label><br>
    <br>
    <label>Distance: <input type="range" id="remove-color-distance" value="0.02" min="0" max="1" step="0.01"></label>
  </p>
  <p>
    <label><span>Brightness:</span> <input type="checkbox" id="brightness"></label>
    <br>
    <label>Value: <input type="range" id="brightness-value" value="0.1" min="-1" max="1" step="0.003921"></label>
  </p>
  <p>
    <label><span>Gamma:</span> <input type="checkbox" id="gamma"></label>
    <br>
    <label>Red: <input type="range" id="gamma-red" value="1" min="0.2" max="2.2" step="0.003921"></label>
    <br>
    <label>Green: <input type="range" id="gamma-green" value="1" min="0.2" max="2.2" step="0.003921"></label>
    <br>
    <label>Blue: <input type="range" id="gamma-blue" value="1" min="0.2" max="2.2" step="0.003921"></label>

  </p>
  <p>
    <label><span>Contrast:</span> <input type="checkbox" id="contrast"></label>
    <br>
    <label>Value: <input type="range" id="contrast-value" value="0" min="-1" max="1" step="0.003921"></label>
  </p>
  <p>
    <label><span>Saturation:</span> <input type="checkbox" id="saturation"></label>
    <br>
    <label>Value: <input type="range" id="saturation-value" value="0" min="-1" max="1" step="0.003921"></label>
  </p>
  <p>
    <label><span>Hue:</span> <input type="checkbox" id="hue"></label>
    <br>
    <label>Value: <input type="range" id="hue-value" value="0" min="-2" max="2" step="0.002"></label>
  </p>
  <p>
    <label><span>Noise:</span> <input type="checkbox" id="noise"></label>
    <br>
    <label>Value: <input type="range" id="noise-value" value="100" min="0" max="1000"></label>
  </p>
  <p>
    <label><span>Pixelate</span> <input type="checkbox" id="pixelate"></label>
    <br>
    <label>Value: <input type="range" id="pixelate-value" value="4" min="2" max="20"></label>
  </p>
  <p>
    <label><span>Blur:</span> <input type="checkbox" id="blur"></label>
    <br>
    <label>Value: <input type="range" id="blur-value" value="0.1" min="0" max="1" step="0.01"></label>
  </p>
  <p>
    <label><span>Sharpen:</span> <input type="checkbox" id="sharpen"></label>
  </p>
  <p>
    <label><span>Emboss:</span> <input type="checkbox" id="emboss"></label>
  </p>
  <p>
  <label><span>Blend Color:</span> <input type="checkbox" id="blend"></label>
  <br>
  <label>Mode:</label>
    <select id="blend-mode" name="blend-mode">
      <option selected="" value="add">Add</option>
      <option value="diff">Diff</option>
      <option value="subtract">Subtract</option>
      <option value="multiply">Multiply</option>
      <option value="screen">Screen</option>
      <option value="lighten">Lighten</option>
      <option value="darken">Darken</option>
      <option value="overlay">Overlay</option>
      <option value="exclusion">Exclusion</option>
      <option value="tint">Tint</option>
    </select>
    <br>
    <label>Color: <input type="color" id="blend-color" value="#00f900"></label><br>
    <label>Alpha: <input type="range" id="blend-alpha" min="0" max="1" value="1" step="0.01"></label><br>
  </p>
  <label><span>Blend Image:</span> <input type="checkbox" id="blend-image"></label>
  <br>
  <label>Mode:</label>
    <select id="blend-image-mode" name="blend-image-mode">
      <option selected="" value="multiply">Multiply</option>
      <option value="mask">Mask</option>
    </select>
    <br>
    <label>Alpha: <input type="range" id="blend-image-alpha" min="0" max="1" value="1" step="0.01"></label><br>
  <p></p>
</div>		
		<script>
			
		(function() {
  // manually initialize 2 filter backend to give ability to switch:
  var webglBackend;
  try {
    webglBackend = new fabric.WebglFilterBackend();
  } catch (e) {
    console.log(e)
  }
  var canvas2dBackend = new fabric.Canvas2dFilterBackend()

  fabric.filterBackend = fabric.initFilterBackend();
  fabric.Object.prototype.transparentCorners = false;
  var $ = function(id){return document.getElementById(id)};

  function applyFilter(index, filter) {
    var obj = canvas.getActiveObject();
    obj.filters[index] = filter;
    var timeStart = +new Date();
    obj.applyFilters();
    var timeEnd = +new Date();
    var dimString = canvas.getActiveObject().width + ' x ' +
      canvas.getActiveObject().height;
    $('bench').innerHTML = dimString + 'px ' +
      parseFloat(timeEnd-timeStart) + 'ms';
    canvas.renderAll();
  }

  function getFilter(index) {
    var obj = canvas.getActiveObject();
    return obj.filters[index];
  }

  function applyFilterValue(index, prop, value) {
    var obj = canvas.getActiveObject();
    if (obj.filters[index]) {
      obj.filters[index][prop] = value;
      var timeStart = +new Date();
      obj.applyFilters();
      var timeEnd = +new Date();
      var dimString = canvas.getActiveObject().width + ' x ' +
        canvas.getActiveObject().height;
      $('bench').innerHTML = dimString + 'px ' +
        parseFloat(timeEnd-timeStart) + 'ms';
      canvas.renderAll();
    }
  }

  fabric.Object.prototype.padding = 5;
  fabric.Object.prototype.transparentCorners = false;

  var canvas = this.__canvas = new fabric.Canvas('c'),
      f = fabric.Image.filters;

  canvas.on({
    'object:selected': function() {
      fabric.util.toArray(document.getElementsByTagName('input'))
                          .forEach(function(el){ el.disabled = false; })

      var filters = ['grayscale', 'invert', 'remove-color', 'sepia', 'brownie',
                      'brightness', 'contrast', 'saturation', 'noise', 'vintage',
                      'pixelate', 'blur', 'sharpen', 'emboss', 'technicolor',
                      'polaroid', 'blend-color', 'gamma', 'kodachrome',
                      'blackwhite', 'blend-image', 'hue', 'resize'];

      for (var i = 0; i < filters.length; i++) {
        $(filters[i]) && (
        $(filters[i]).checked = !!canvas.getActiveObject().filters[i]);
      }
    },
    'selection:cleared': function() {
      fabric.util.toArray(document.getElementsByTagName('input'))
                          .forEach(function(el){ el.disabled = true; })
    }
  });

  fabric.Image.fromURL('http://fabricjs.com/assets/pug.jpg', function(img) {
    var oImg = img.set({ left: 0, top: 0}).scale(0.25);
    canvas.add(oImg);
  }, { crossOrigin: 'anonymous' })
  fabric.Image.fromURL('http://fabricjs.com/assets/printio.png', function(img) {
    var oImg = img.set({ left: 150, top: 0}).scale(0.4);
    canvas.add(oImg);
  }, { crossOrigin: 'anonymous' })
  fabric.Image.fromURL('http://fabricjs.com/assets/dragon.jpg', function(img) {
    var oImg = img.set({ left: 0, top: 270}).scale(0.2);
    canvas.add(oImg);
  }, { crossOrigin: 'anonymous' })
  fabric.Image.fromURL('http://fabricjs.com/assets/dragon2.jpg', function(img) {
    var oImg = img.set({ left: 0, top: 500}).scale(0.2);
    canvas.add(oImg);
  }, { crossOrigin: 'anonymous' })
  var indexF;
  $('webgl').onclick = function() {
    if (this.checked) {
      fabric.filterBackend = webglBackend;
    } else {
      fabric.filterBackend = canvas2dBackend;
    }
  };
  $('brownie').onclick = function() {
    applyFilter(4, this.checked && new f.Brownie());
  };
  $('vintage').onclick = function() {
    applyFilter(9, this.checked && new f.Vintage());
  };
  $('technicolor').onclick = function() {
    applyFilter(14, this.checked && new f.Technicolor());
  };
  $('polaroid').onclick = function() {
    applyFilter(15, this.checked && new f.Polaroid());
  };
  $('kodachrome').onclick = function() {
    applyFilter(18, this.checked && new f.Kodachrome());
  };
  $('blackwhite').onclick = function() {
    applyFilter(19, this.checked && new f.BlackWhite());
  };
  $('grayscale').onclick = function() {
    applyFilter(0, this.checked && new f.Grayscale());
  };
  $('average').onclick = function() {
    applyFilterValue(0, 'mode', 'average');
  };
  $('luminosity').onclick = function() {
    applyFilterValue(0, 'mode', 'luminosity');
  };
  $('lightness').onclick = function() {
    applyFilterValue(0, 'mode', 'lightness');
  };
  $('invert').onclick = function() {
    applyFilter(1, this.checked && new f.Invert());
  };
  $('remove-color').onclick = function () {
    applyFilter(2, this.checked && new f.RemoveColor({
      distance: $('remove-color-distance').value,
      color: $('remove-color-color').value,
    }));
  };
  $('remove-color-color').onchange = function() {
    applyFilterValue(2, 'color', this.value);
  };
  $('remove-color-distance').oninput = function() {
    applyFilterValue(2, 'distance', this.value);
  };
  $('sepia').onclick = function() {
    applyFilter(3, this.checked && new f.Sepia());
  };
  $('brightness').onclick = function () {
    applyFilter(5, this.checked && new f.Brightness({
      brightness: parseFloat($('brightness-value').value)
    }));
  };
  $('brightness-value').oninput = function() {
    applyFilterValue(5, 'brightness', parseFloat(this.value));
  };
  $('gamma').onclick = function () {
    var v1 = parseFloat($('gamma-red').value);
    var v2 = parseFloat($('gamma-green').value);
    var v3 = parseFloat($('gamma-blue').value);
    applyFilter(17, this.checked && new f.Gamma({
      gamma: [v1, v2, v3]
    }));
  };
  $('gamma-red').oninput = function() {
    var current = getFilter(17).gamma;
    current[0] = parseFloat(this.value);
    applyFilterValue(17, 'gamma', current);
  };
  $('gamma-green').oninput = function() {
    var current = getFilter(17).gamma;
    current[1] = parseFloat(this.value);
    applyFilterValue(17, 'gamma', current);
  };
  $('gamma-blue').oninput = function() {
    var current = getFilter(17).gamma;
    current[2] = parseFloat(this.value);
    applyFilterValue(17, 'gamma', current);
  };
  $('contrast').onclick = function () {
    applyFilter(6, this.checked && new f.Contrast({
      contrast: parseFloat($('contrast-value').value)
    }));
  };
  $('contrast-value').oninput = function() {
    applyFilterValue(6, 'contrast', parseFloat(this.value));
  };
  $('saturation').onclick = function () {
    applyFilter(7, this.checked && new f.Saturation({
      saturation: parseFloat($('saturation-value').value)
    }));
  };
  $('saturation-value').oninput = function() {
    applyFilterValue(7, 'saturation', parseFloat(this.value));
  };
  $('noise').onclick = function () {
    applyFilter(8, this.checked && new f.Noise({
      noise: parseInt($('noise-value').value, 10)
    }));
  };
  $('noise-value').oninput = function() {
    applyFilterValue(8, 'noise', parseInt(this.value, 10));
  };
  $('pixelate').onclick = function() {
    applyFilter(10, this.checked && new f.Pixelate({
      blocksize: parseInt($('pixelate-value').value, 10)
    }));
  };
  $('pixelate-value').oninput = function() {
    applyFilterValue(10, 'blocksize', parseInt(this.value, 10));
  };
  $('blur').onclick = function() {
    applyFilter(11, this.checked && new f.Blur({
      value: parseFloat($('blur-value').value)
    }));
  };
  $('blur-value').oninput = function() {
    applyFilterValue(11, 'blur', parseFloat(this.value, 10));
  };
  $('sharpen').onclick = function() {
    applyFilter(12, this.checked && new f.Convolute({
      matrix: [  0, -1,  0,
                -1,  5, -1,
                 0, -1,  0 ]
    }));
  };
  $('emboss').onclick = function() {
    applyFilter(13, this.checked && new f.Convolute({
      matrix: [ 1,   1,  1,
                1, 0.7, -1,
               -1,  -1, -1 ]
    }));
  };
  $('blend').onclick= function() {
    applyFilter(16, this.checked && new f.BlendColor({
      color: document.getElementById('blend-color').value,
      mode: document.getElementById('blend-mode').value,
      alpha: document.getElementById('blend-alpha').value
    }));
  };

  $('blend-mode').onchange = function() {
    applyFilterValue(16, 'mode', this.value);
  };

  $('blend-color').onchange = function() {
    applyFilterValue(16, 'color', this.value);
  };

  $('blend-alpha').oninput = function() {
    applyFilterValue(16, 'alpha', this.value);
  };

  $('hue').onclick= function() {
    applyFilter(21, this.checked && new f.HueRotation({
      rotation: document.getElementById('hue-value').value,
    }));
  };

  $('hue-value').oninput = function() {
    applyFilterValue(21, 'rotation', this.value);
  };

  $('blend-image').onclick= function() {
    applyFilter(20, this.checked && new f.BlendImage({
      image: fImage,
    }));
  };

  $('blend-image-mode').onchange = function() {
    applyFilterValue(20, 'mode', this.value);
  };
  var imageElement = document.createElement('img');
  imageElement.crossOrigin = 'anonymous';
  imageElement.src = 'http://fabricjs.com/assets/printio.png';
  var fImage = new fabric.Image(imageElement);
  fImage.scaleX = 1;
  fImage.scaleY = 1;
  fImage.top = 15;
  fImage.left = 15;
})();
		
		
		</script>
	</body>
</html>




