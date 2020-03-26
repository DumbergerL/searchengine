var allContentContainers = ["search_container", "add_site_container", "results_container"];
var requestedPage = findGetParameter("page");

switch (requestedPage) {
    case 'add':
        document.getElementById("footer").style.position = 'block';
        displaySpecificContainer("add_site_container");
        break;
    case 'main':
        document.getElementById("footer").style.position = 'block';
        displaySpecificContainer("search_container");
        break;
    case 'result':
        document.getElementById("footer").style.position = 'static';
        displaySpecificContainer("results_container");
        break;
    case 'docs':
        document.getElementById("footer").style.position = 'static';
        break;
    default:
        document.getElementById("footer").style.position = 'block';
        displaySpecificContainer("search_container");
}

/**
 * see https://stackoverflow.com/questions/5448545/how-to-retrieve-get-parameters-from-javascript/
 * @param parameterName
 * @returns {*}
 */
function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

function displaySpecificContainer(containerName) {
    allContentContainers.forEach(function (selectedContainer) {
        if (currentContainer = document.getElementById(selectedContainer)) {
            currentContainer.style.display = "none";
        }
    });

    document.getElementById(containerName).style.display = "block";
}