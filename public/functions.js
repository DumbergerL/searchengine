var allContentContainers = ["search_container", "add_site_container", "results_container"];
var requestedPage = findGetParameter("page");

switch (requestedPage) {
    case 'add':
        displaySpecificContainer("add_site_container");
        break;
    case 'main':
        displaySpecificContainer("search_container");
        break
    default:
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