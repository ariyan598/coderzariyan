let container = document.querySelector('.application');
let seconds;

window.onresize = function() {
    if (window.innerWidth < 800) {
        let styleCss = document.querySelector('#style-css');
        styleCss.href = "mobile.css";
    } else {
        let styleCss = document.querySelector('#style-css');
        styleCss.href = "style.css";
    }
}
if (window.innerWidth < 800) {
    let styleCss = document.querySelector('#style-css');
    styleCss.href = "mobile.css";
} else {
    let styleCss = document.querySelector('#style-css');
    styleCss.href = "style.css";
}
$.ajax({
    url: "output.php", //the page containing php script
    type: "get", //request type
    success: function(result) {
        container.innerHTML = result;
        let statusContainer = document.querySelector('.status');
        statusContainer.style.width = container.clientWidth

    }
});
$.ajax({
    url: "predict.php", //the page containing php script
    type: "get", //request type
    success: function(result) {
        let predictionContainer = document.querySelector('.prediction-container');
        predictionContainer.innerHTML = result;
    }
});
$.ajax({
    url: "probability.php", //the page containing php script
    type: "get", //request type
    success: function(result) {
        let probabilityContainer = document.querySelector('.probability');
        probabilityContainer.innerHTML = result;
    }
});


function output() {
    work();
    if (seconds == "00" || seconds == "30" || seconds == "29" || seconds == "02" || seconds == "03" || seconds == "01") {
        $.ajax({
            url: "output.php", //the page containing php script
            type: "get", //request type
            success: function(result) {
                container.innerHTML = result;
                let statusContainer = document.querySelector('.status');
                statusContainer.style.width = container.clientWidth

            }
        });
        $.ajax({
            url: "predict.php", //the page containing php script
            type: "get", //request type
            success: function(result) {
                let predictionContainer = document.querySelector('.prediction-container');
                predictionContainer.innerHTML = result;
            }
        });
        $.ajax({
            url: "probability.php", //the page containing php script
            type: "get", //request type
            success: function(result) {
                let probabilityContainer = document.querySelector('.probability');
                probabilityContainer.innerHTML = result;
            }
        });
    }
}
output();

function showToast(text, type) {
    let bg;
    if (type == "success") {
        bg = "linear-gradient(to right, rgb(50,150,50), rgb(50, 100, 50))";
    } else {
        bg = "linear-gradient(to right, rgb(250,50,100), rgb(250, 50, 50))";

    }
    Toastify({
        text: text,
        className: type,
        duration: 3000,
        position: "center", // `left`, `center` or `right`
        style: {
            background: bg,
        }
    }).showToast();
}

function work() {

    let historyContainer = document.querySelector('.history-table');
    historyContainer.innerHTML = localStorage.getItem('table-data');
    let totalWins = document.querySelector('#t-win span');
    let totalLoss = document.querySelector('#t-loss span');
    totalWins.innerHTML = document.querySelectorAll('.success').length;
    totalLoss.innerHTML = document.querySelectorAll('.failure').length;

    if (seconds == "05") {
        let predictedColour = document.querySelector('#pr-color').value;
        localStorage.setItem('pr-color', predictedColour);
    }
    if (seconds == "01") {

        setTimeout(() => {

            let resColour = document.querySelector('#fn-color').value;
            let resTime = document.querySelector('#fn-time').value;
            let resNum = document.querySelector('#fn-num').value;
            let prColor = localStorage.getItem('pr-color');


            if (prColor == resColour) {

                showToast("Prediction Worked !", "success");
                let temp = localStorage.getItem('table-data');
                if (temp == null) { temp = ""; }
                localStorage.setItem('table-data', `<tr class="success">
          <td>1</td>
          <td>${resNum}</td>
          <td>${resTime}</td>
          <td>${prColor}</td>
          <td>${resColour}</td>
      </tr>` + temp);
            } else {
                showToast("Prediction Not Worked !", "failure");
                let temp = localStorage.getItem('table-data');
                if (temp == null) { temp = ""; }
                localStorage.setItem('table-data', `<tr class="failure">
                    <td>1</td>
                    <td>${resNum}</td>
                    <td>${resTime}</td>
                    <td>${prColor}</td>
                    <td>${resColour}</td>
                </tr>` + temp);
            }

        }, 1500)


    }
}

setInterval(output, 1000);


setInterval(function() {
    let span = document.querySelector('.countdown span');
    let date = new Date();
    seconds = date.getSeconds();
    if (seconds > 30) {
        seconds = 60 - seconds;
    } else {
        seconds = 30 - seconds;
    }
    if (seconds <= 30) { span.style.color = "green" }
    if (seconds < 20) { span.style.color = "#7F00FF" }
    if (seconds < 5) { span.style.color = "red" }
    if (seconds < 10) { seconds = "0" + seconds }

    span.innerHTML = seconds + 's';
}, 1000);