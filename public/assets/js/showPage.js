 //---------------- camera-------------


 document.getElementById('captureButton').addEventListener('click', function() {
    html2canvas(document.documentElement).then(function(canvas) {
        var link = document.createElement('a');
        link.download = 'screenshot.jpg';
        link.href = canvas.toDataURL();
        link.click();

    });
});
document.getElementById('print').addEventListener('click', function() {
   window.print();
});

function hiddenElem(){
//    var hidd= document.getElementsByClassName('hiddenElem');
//    hidd.style.display = 'none';

    var print = document.getElementById('print');
    // var lastDate = document.getElementById('lastDate1');
    // var nextDate = document.getElementById('nextDate1');
    // var navShare = document.getElementById('navShare');
    var captureButton = document.getElementById('captureButton');
    // var homeButton = document.getElementById('homeButton');

    print.style.display = 'none';
    // lastDate.style.display = 'none';
    // nextDate.style.display = 'none';
    // navShare.style.display = 'none';
    captureButton.style.display = 'none';
    // homeButton.style.display = 'none';

    setTimeout(function() {
        // document.getElementsByClassName('hiddenElem').style.display = 'unset';
        // hidd.style.display = 'unset';

        print.style.display = 'unset';
        captureButton.style.display = 'unset';
        // navShare.style.display = 'unset';


    }, 3000);
}
function hiddenElem1(){

    var lastDate = document.getElementById('lastDate1');
    var nextDate = document.getElementById('nextDate1');
    var homeButton = document.getElementById('homeButton');
    var navShare = document.getElementById('navShare');

    lastDate.style.display = 'none';
    nextDate.style.display = 'none';
    homeButton.style.display = 'none';
    navShare.style.display = 'none';

    setTimeout(function() {



        lastDate.style.display = 'unset';
        nextDate.style.display = 'unset';
        homeButton.style.display = 'unset';
        navShare.style.display = 'unset';

    }, 3000);
}

 //---------------- camera-------------
