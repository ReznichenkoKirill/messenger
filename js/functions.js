function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function sortById(arr) {
    arr.sort(function (a, b) {
        return a.id - b.id;
    });
}