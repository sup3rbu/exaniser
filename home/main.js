window.onload = function () {
    var Years = document.getElementById("years");
    var currentYear = (new Date()).getFullYear();
    for (var i = 0; i <= 5; i++) {
        var j = currentYear + i
        var option = document.createElement("OPTION");
        option.innerHTML = j;
        option.value = j;
        Years.appendChild(option);
    }

    var Days = document.getElementById("days");
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Days.appendChild(option);
    }

    var Months = document.getElementById("months");
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Months.appendChild(option);
    }
    
    var Years = document.getElementById("years1");
    var currentYear = (new Date()).getFullYear();
    for (var i = 0; i <= 5; i++) {
        var j = currentYear + i
        var option = document.createElement("OPTION");
        option.innerHTML = j;
        option.value = j;
        Years.appendChild(option);
    }

    var Days = document.getElementById("days1");
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Days.appendChild(option);
    }

    var Months = document.getElementById("months1");
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Months.appendChild(option);
    }
    

    var Years2 = document.getElementById("years2");
    var currentYear = (new Date()).getFullYear();
    for (var i = 0; i <= 5; i++) {
        var j = currentYear + i
        var option = document.createElement("OPTION");
        option.innerHTML = j;
        option.value = j;
        Years2.appendChild(option);
    }

    var Days2 = document.getElementById("days2");
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Days2.appendChild(option);
    }

    var Months2 = document.getElementById("months2");
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Months2.appendChild(option);
    }
    var Years = document.getElementById("years3");
    var currentYear = (new Date()).getFullYear();
    for (var i = 0; i <= 5; i++) {
        var j = currentYear + i
        var option = document.createElement("OPTION");
        option.innerHTML = j;
        option.value = j;
        Years.appendChild(option);
    }

    var Days = document.getElementById("days3");
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Days.appendChild(option);
    }

    var Months = document.getElementById("months3");
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        Months.appendChild(option);
    }
};