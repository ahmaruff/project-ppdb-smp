<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($title)) :?>
        <title><?= $title ?></title>
    <?php else : ?>
        <title>Berkas PPDB</title>
    <?php endif ?>
</head>
<body>
    <div id="data" data-url="<?= $file_path.'/'.$berkas ?>" data-mime="<?= $mime ?>"></div>
    <?php if($mime == 'application/pdf') :?>
        <canvas id="the-canvas"></canvas>
    <?php else : ?>
        <div><img src="<?= $file_path.'/'.$berkas ?>" alt=""></div>
        <canvas id="the-canvas d-none"></canvas>
    <?php endif ?>
</body>
<script src="/assets/libs/pdfjs-3.3.122/build/pdf.js"></script>

<script>
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '/assets/libs/pdfjs-3.3.122/build/pdf.worker.js';

var data = document.getElementById('data');
var url = data.dataset.url;
var mime = data.dataset.mime;

if(mime == 'application/pdf') {
    // Asynchronous download PDF
//
const loadingTask = pdfjsLib.getDocument(url);
(async () => {
const pdf = await loadingTask.promise;
//
// Fetch the first page
//
const page = await pdf.getPage(1);
const scale = 1.5;
const viewport = page.getViewport({ scale });
// Support HiDPI-screens.
const outputScale = window.devicePixelRatio || 1;

//
// Prepare canvas using PDF page dimensions
//
const canvas = document.getElementById('the-canvas');
const context = canvas.getContext("2d");

canvas.width = Math.floor(viewport.width * outputScale);
canvas.height = Math.floor(viewport.height * outputScale);
canvas.style.width = Math.floor(viewport.width) + "px";
canvas.style.height = Math.floor(viewport.height) + "px";

const transform = outputScale !== 1 
    ? [outputScale, 0, 0, outputScale, 0, 0] 
    : null;

//
// Render PDF page into canvas context
//
const renderContext = {
    canvasContext: context,
    transform,
    viewport,
};

page.render(renderContext);
})();
}
</script>

</html>