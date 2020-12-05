function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function sortById(arr) {
    arr.sort((a, b) => a.id > b.id ? 1 : -1);
}